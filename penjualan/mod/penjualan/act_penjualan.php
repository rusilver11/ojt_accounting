<link rel="stylesheet" type="text/css" href="../../css/pace.css">
<script src="../../js/pace.min.js"></script>
<?php
	date_default_timezone_set('Asia/Jakarta');
	session_start();
	include"../../lib/conn.php";
	include"../../lib/all_function.php";
	include"../../lib/fungsi_transaction.php";
	 $conn2 = new mysqli("localhost","root","","candabirawa");


	if(!isset($_SESSION['login_user'])){
		header('location: ../../login.php'); // Mengarahkan ke Home Page
	}

	if(isset($_GET['mod']) && isset($_GET['act']))
	{
		$mod = $_GET['mod'];
		$act = $_GET['act'];
	}
	else
	{
		$mod = "";
		$act = "";
	}

	if($mod == "penjualan" AND $act == "add")
	{
		$cek_barang = mysqli_query($conn,"SELECT * FROM tb_barang 
								WHERE kode_barang = '$_GET[id]'");

		if (mysqli_num_rows($cek_barang) > 0) {
			$disc = 0;
			if(!empty($_GET['disc']) AND is_numeric($_GET['disc']))
			{
				$disc = $_GET['disc'];
			}

			$b = mysqli_fetch_assoc($cek_barang);

			$cek_det_barang = mysqli_query($conn,"SELECT * FROM tb_detail_penjualan_tmp 
										WHERE kode_barang = '$_GET[id]' 
										AND petugas = '$_SESSION[login_id]'");
			if(mysqli_num_rows($cek_det_barang) > 0)
			{
				mysqli_query($conn,"UPDATE tb_detail_penjualan_tmp SET qty = qty +  $disc
							WHERE kode_barang = '$_GET[id]' 
							AND petugas = '$_SESSION[login_id]'");
			}
			else
			{
				mysqli_query($conn,"INSERT INTO tb_detail_penjualan_tmp (kode_barang,
																	no_do,
																	harga,
																	disc,
																	qty,
																	petugas,
																	timestmp)
															VALUES('$_GET[id]',
																	'$_GET[do]',
																	'$b[harga_jual]',
																	0,
																	$disc,
																	'$_SESSION[login_id]',
																	NOW())") ;
			}
				
				

			echo"<script>
				window.history.back();
			</script>";	
		}
		else
		{
			echo"Tidak barang!";
		}

	}

	elseif ($mod == "penjualan" AND $act == "edit") 
	{
		//variable input
		$kode_penjualan = trim($_POST['id']);
		$status= anti_inject($_POST['status']);
		$bayar= anti_inject($_POST['updatebayar']);

		

		mysqli_query($conn,"UPDATE tb_penjualan SET  
										status= '$status', 
										bayar= bayar + '$bayar' 
					WHERE no_transaksi = '$_POST[id]'") ;

		// flash('example_message', '<p>Berhasil mengubah data penjualan.</p>');

		echo"<script>
			window.history.go(-2);
		</script>";
	}

	elseif ($mod == "penjualan" AND $act == "batal") {
		mysqli_query($conn,"DELETE FROM tb_detail_penjualan_tmp 
					WHERE kode_barang = '$_GET[id]' 
					AND petugas = '$_SESSION[login_id]'") ;

		echo"<script>
			window.history.back();
		</script>";	
	}

	elseif($mod == "penjualan" AND $act == "simpan")
	{
		$qtmp = mysqli_query($conn,"SELECT * FROM tb_detail_penjualan_tmp 
							WHERE petugas = '$_SESSION[login_id]' 
							ORDER BY timestmp ASC");

		if (mysqli_num_rows($qtmp) > 0) {
			$no_transaksi = no_kwitansi_auto(); //no transaksi automatis
			$jmlbayar = $_POST['jmlbayar2'];
			
			$total_bayar = 0;

			$tgl = date('Y-m-d');
			while($tmp = mysqli_fetch_assoc($qtmp))
			{
				$chart[] = $tmp;

				//hitung total
				$harga_disc = $tmp['harga'] ;
				// - (($tmp['harga'] * $tmp['disc']) / 100);
				$sub_total = $harga_disc * (($tmp['qty']*1000) /50);

				$total_bayar =  $total_bayar + $sub_total;
			}

			if ($_POST['potongan2'] > 0) {
				$total_bayar = $total_bayar - $_POST['potongan2'];
			}
			else
			{
				$total_bayar = $total_bayar;
			}
			
			//print_r($chart);
			$qpel = mysqli_query($conn,"SELECT * FROM kios 
								WHERE kode = '".anti_inject($_POST['nama'])."'");
			if(mysqli_num_rows($qpel) > 0)
			{
				$p = mysqli_fetch_assoc($qpel);
				$kode_pel = $p['kode'];
				$nama_pelanggan = anti_inject($p['nama']);
			}
			else
			{
				$kode_pel = "$no_transaksi";
				$nama_pelanggan = anti_inject($_POST['nama']);
			}
			//echo $nama_pelanggan;

			//apakah pembayaran sudah cukup
			if (($total_bayar >= $jmlbayar) OR ($_POST['status'] == "HUTANG") OR ($_POST['status'] == "LUNAS")) {
				//start transaction
				start_transaction();

				//pembuatan header
				$qsimpanheader = mysqli_query($conn,"INSERT INTO tb_penjualan(no_transaksi,
																	
																		kode_pelanggan, 
																		nama_pelanggan, 
																		tgl_transaksi, 
																		petugas, 
																		status,
																		bayar, 
																		potongan, 
																		timestmp
																		)
																VALUES('$no_transaksi',
																		
																		'$kode_pel', 
																		'$nama_pelanggan',
																		'$tgl',  
																		'$_SESSION[login_id]',
																		'$_POST[status]', 
																		$jmlbayar, 
																		$_POST[potongan2], 
																		NOW())
																		");
				if (!$qsimpanheader) {
					rollback();
					// flash('example_message', '<p>Transaksi Gagal.</p>', 'w3-red');
					echo"<script>
						window.history.back();
					</script>";	
				}
				else
				{
					foreach ($chart as $row) {
						
						mysqli_query($conn2,"UPDATE barang SET  stok= stok - '$row[qty]'
											WHERE id = '$row[kode_barang]'") ;

						$qsimpandetail = mysqli_query($conn,"INSERT INTO tb_detail_penjualan(no_transaksi,
																						no_do,
																						kode_barang,
																						qty,
																						harga, 
																						disc, 
																						petugas, 
																						timestmp)
																				VALUES('$no_transaksi',
																						'$row[no_do]', 
																						'$row[kode_barang]', 
																						$row[qty], 
																						'$row[harga]', 
																						$row[disc], 
																						$row[petugas], 
																						'$row[timestmp]')");

							mysqli_query($conn,"DELETE FROM tb_detail_penjualan_tmp 
					WHERE kode_barang = '$row[kode_barang]'") ;



						if (!$qsimpandetail) {
							rollback();
							// flash('example_message', '<p>Transaksi gagal.</p>', 'w3-red' );
							echo"<script>
								window.history.back();
							</script>";	
						}
					}
					commit();
					echo "<script type='text/javascript'> window.location.href ='../../med.php?mod=penjualan&act=printout&id=$no_transaksi'; </script>";

					// header("location:../../med.php?mod=penjualan&act=printout&id=".$no_transaksi);
				}
				//commit();
			}
			else {
				// flash('example_message', '<p>Pembayaran tidak cukup!</p>', 'w3-yellow');
				echo"<script>
					window.history.back();
				</script>";	
			}

				
		}
		else
		{
			// flash('example_message', '<p>Tidak ada barang yang di jual!</p>', 'w3-red');
			echo"<script>
				window.history.back();
			</script>";	
		}
	}

	elseif ($mod == "penjualan" AND $act == "hapus") {
		if(isset($_SESSION['hapuspenjualan']) AND $_SESSION['hapuspenjualan'] <> 'TRUE')
		{
			echo"<div class='w3-container w3-red'><p>Dilarang mengakses file ini.</p></div>";
			die();
		}
		else
		{
			mysqli_query($conn,"DELETE FROM tb_penjualan WHERE no_transaksi = '$_GET[id]'") ;
			// flash('example_message', '<p>Berhasil menghapus data transaksi.</p>' );
			echo"<script>
				window.history.back();
			</script>";	
		}
			
	}

?>