<?php
	session_start();
	include"../../lib/conn.php";
	include"../../lib/all_function.php";
	
	if(!isset($_SESSION['login_user'])){
		header('location: ../../login.php'); // Mengarahkan ke Home Page
	}

	if(isset($_SESSION['barang']) AND $_SESSION['barang'] <> 'TRUE')
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

	if($mod == "barang" AND $act == "simpan")
	{
		//variable input
		$kode_barang = $_POST['id'];
		$nama_barang= anti_inject($_POST['nama_barang']);
		$deskripsi= anti_inject($_POST['deskripsi']);
		$tgl_input= anti_inject($_POST['tgl_input']);
		$harga_beli= anti_inject($_POST['harga_beli']);
		$harga_jual= anti_inject($_POST['harga_jual']);
		$kategori_id= anti_inject($_POST['kategori_id']);
		$jml_stok= anti_inject($_POST['jml_stok']);
		$satuan= anti_inject($_POST['satuan']);


		if(empty($kode_barang)) {
			$q = mysqli_query($conn,"SELECT MAX(RIGHT(kode_barang,5)) AS kodebrg
				FROM tb_barang") or die(mysqli_error());
			$kode = mysqli_fetch_assoc($q);

			if($kode['kodebrg'] <> NULL)
			{
				$kd = number_format($kode['kodebrg'],0) + 1;
				if(strlen($kd) == 1)
				{
					$kode_barang = "AD0000".$kd;
				}
				elseif (strlen($kd) == 2) {
					$kode_barang = "AD000".$kd;
				}
				elseif (strlen($kd) == 3) {
					$kode_barang = "AD00".$kd;
				}
				elseif (strlen($kd) == 4) {
					$kode_barang = "AD0".$kd;
				}
				else {
					$kode_barang = "AD".$kd;
				}
			}
			else
			{
				$kode_barang = "AD00001";
			}
		}

		$sql_kategori = mysqli_query($conn,"SELECT * FROM tb_kategori_barang where kategori_id='$kategori_id'");
								$k = mysqli_fetch_assoc($sql_kategori);
									$kategori = $k[nama_kategori];

	

		mysqli_query($conn,"INSERT INTO tb_barang(kode_barang, 
										nama_barang, 
										deskripsi, 
										tgl_input, 
										harga_beli, 
										harga_jual, 
										kategori_id, 
										jml_stok, 
										satuan)
									VALUES ('$kode_barang', 
										'$nama_barang', 
										'$deskripsi', 
										'$tgl_input', 
										'$harga_beli', 
										'$harga_jual', 
										'$kategori_id', 
										'$jml_stok', 
										'$satuan')");
		// flash('example_message', '<p>Berhasil menambah data biaya.</p>' );

		echo"<script>
			window.history.go(-2);
		</script>";
	}

	elseif ($mod == "barang" AND $act == "edit") 
	{
		//variable input
		$kode_barang = trim($_POST['id']);
		$nama_barang= anti_inject($_POST['nama_barang']);
		$deskripsi= anti_inject($_POST['deskripsi']);
		$tgl_input= anti_inject($_POST['tgl_input']);
		$harga_beli= anti_inject($_POST['harga_beli']);
		$harga_jual= anti_inject($_POST['harga_jual']);
		$kategori_id= anti_inject($_POST['kategori_id']);
		$jml_stok= anti_inject($_POST['jml_stok']);
		$satuan= anti_inject($_POST['satuan']);

		mysqli_query($conn,"INSERT INTO tb_stok(kode,  
										stok, 
										tanggal)
									VALUES ('$kode_barang', 
										'$jml_stok', 									 
										'$tgl_input')");

		mysqli_query($conn,"UPDATE tb_barang SET nama_barang= '$nama_barang', 
										deskripsi= '$deskripsi', 
										tgl_input= '$tgl_input', 
										harga_beli= '$harga_beli', 
										harga_jual= '$harga_jual', 
										kategori_id= '$kategori_id', 
										jml_stok= '$jml_stok', 
										satuan= '$satuan' 
					WHERE kode_barang = '$_POST[id]'") or die(mysqli_error());

		// flash('example_message', '<p>Berhasil mengubah data pupuk.</p>');

		echo"<script>
			window.history.go(-2);
		</script>";
	}

	elseif ($mod == "barang" AND $act == "hapus") 
	{
		mysqli_query($conn,"DELETE FROM tb_barang WHERE kode_barang = '$_GET[id]'");
		// flash('example_message', '<p>Berhasil menghapus data pupuk.</p>' );
		echo"<script>
			window.history.back();
		</script>";	
	}

?>