<link rel="stylesheet" type="text/css" href="../../css/pace.css">
<script src="../../js/pace.min.js"></script>
<?php
	date_default_timezone_set('Asia/Jakarta');
	session_start();
	include"../../lib/conn.php";
	include"../../lib/all_function.php";
	// include"../../lib/fungsi_transaction.php";
	$conn2 = new mysqli("localhost","root","","umkm");


	if(!isset($_SESSION['login_user'])){
		header('location: ../../login.php'); // Mengarahkan ke Home Page
	}

	if(isset($_SESSION['pembelian']) AND $_SESSION['pembelian'] <> 'TRUE')
	{
		echo"<div class='w3-container w3-red'><p>Dilarang mengakses file ini.</p></div>";
		die();
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

	if($mod == "pembelian" AND $act == "add")
	{
		$cek_barang = mysqli_query($conn,"SELECT * FROM tb_barang 
								WHERE kode_barang = '$_POST[barang]'");

		if (mysqli_num_rows($cek_barang) > 0) {
			$cek_det_barang = mysqli_query($conn,"SELECT * FROM tb_detail_pembelian_tmp 
										WHERE kode_barang = '$_POST[barang]' 
										AND petugas = '$_SESSION[login_id]'");
			if(mysqli_num_rows($cek_det_barang) > 0)
			{
				mysqli_query($conn,"UPDATE tb_detail_pembelian_tmp SET qty = qty + $_POST[qty] 
							WHERE kode_barang = '$_POST[barang]' 
							AND petugas = '$_SESSION[login_id]'") ;

				echo"<script>
					window.history.back();
				</script>";
			}
			else
			{
				mysqli_query($conn,"INSERT INTO tb_detail_pembelian_tmp (kode_barang,
																	harga_beli,
																	qty,
																	petugas,
																	timestmp)
															VALUES('$_POST[barang]',
																	'$_POST[harga]',
																	$_POST[qty],
																	'$_SESSION[login_id]',
																	NOW())");

				echo"<script>
					window.history.back();
				</script>";
			}
		}
		else
		{
			echo"barang tidak ditemukan!";
		}

	}

	elseif ($mod == "pembelian" AND $act == "batal") {
		mysqli_query($conn,"DELETE FROM tb_detail_pembelian_tmp 
					WHERE kode_barang = '$_GET[id]' 
					AND petugas = '$_SESSION[login_id]'");

		echo"<script>
			window.history.back();
		</script>";	
	}

	elseif ($mod == "pembelian" AND $act == "simpan") {
		$sql_tmp = mysqli_query($conn,"SELECT * FROM tb_detail_pembelian_tmp ORDER BY timestmp ASC");
		$temukan = mysqli_num_rows($sql_tmp);

		if ($temukan > 0) {
			$qsup = mysqli_query($conn,"SELECT * FROM tb_supplier 
								WHERE kode_supplier = '$_POST[supplier]'") ;
			if(mysqli_num_rows($qsup) > 0)
			{
				$sup = mysqli_fetch_assoc($qsup);
				$kodesup = $sup['kode_supplier'];
				$nama_toko = $sup['nama_toko'];
			}
			else
			{
				$kodesup = "";
				$nama_toko = "";
			}

			// start_transaction();

			$resPembelian = mysqli_query($conn,"INSERT INTO tb_pembelian(no_faktur, 
																	kode_supplier, 
																	nama_toko, 
																	tgl_beli, 
																	nama_kasir, 
																	petugas, 
																	timestmp)
															VALUES('$_POST[no_faktur]', 
																	'$kodesup', 
																	'$nama_toko', 
																	'$_POST[tglbeli]', 
																	'$_POST[kasir]', 
																	'$_SESSION[login_id]', 
																	NOW())");

			while ($b = mysqli_fetch_assoc($sql_tmp)) {

				mysqli_query($conn2,"UPDATE barang SET  stok= stok + '$b[qty]'
											WHERE id = '$b[kode_barang]'") ;

				$resDetail = mysqli_query($conn,"INSERT INTO tb_detail_pembelian(no_faktur, 
																			kode_barang, 
																			harga_beli, 
																			qty, 
																			petugas, 
																			timestmp)
																	VALUES('$_POST[no_faktur]', 
																			'$b[kode_barang]', 
																			'$b[harga_beli]', 
																			'$b[qty]', 
																			'$_SESSION[login_id]', 
																			NOW())");
				if (!$resDetail) {
					// rollback();
					echo"Gagal transaksi";
					echo"<script>
					window.history.back();
				</script>";



				}
			}

			if (!$resPembelian) {
				// rollback();
				echo"Gagal transaksi";
				echo"<script>
					window.history.back();
				</script>";
			}
			else
			{
				// commit();
				echo"Berhasil transaksi!";
				echo"<script>
					window.history.back();
				</script>";

			}
		}
		else
		{
			echo "Tidak data barang yang di beli!";
		}
	}

	elseif ($mod == "pembelian" AND $act == "hapus") {
		mysqli_query($conn,"DELETE FROM tb_pembelian WHERE no_faktur = '$_GET[id]'");
		// flash('example_message', '<p>Berhasil menghapus data transaksi.</p>' );
		echo"<script>
			window.history.back();
		</script>";	
	}

?>