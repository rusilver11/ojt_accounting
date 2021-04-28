<?php
	session_start();
	include"../../lib/conn.php";
	include"../../lib/all_function.php";


	if(!isset($_SESSION['login_user'])){
		header('location: ../../login.php'); // Mengarahkan ke Home Page
	}

	if(isset($_SESSION['pelanggan']) AND $_SESSION['pelanggan'] <> 'TRUE')
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

	if($mod == "pelanggan" AND $act == "simpan")
	{
		//variable input
		$kode = trim($_POST['kode']);
		$nama= anti_inject($_POST['nama']);
		$alamat= anti_inject($_POST['alamat']);

		mysqli_query($conn,"INSERT INTO kios(kode, 
										nama,  
										alamat)
									VALUES ('$kode', 
										'$nama', 
										'$alamat')") ;
		// flash('example_message', '<p>Berhasil menambah data kios.</p>' );

		echo"<script>
			window.history.go(-2);
		</script>";
	}

	elseif ($mod == "pelanggan" AND $act == "edit") 
	{
		//variable input
		$kode = trim($_POST['kode']);
		$nama= anti_inject($_POST['nama']);
		$alamat= anti_inject($_POST['alamat']);

		mysqli_query($conn,"UPDATE kios SET 
										nama= '$nama', 
										alamat= '$alamat' 
					WHERE kode = '$_POST[kode]'");

		// flash('example_message', '<p>Berhasil mengubah data kios.</p>');

		echo"<script>
			window.history.go(-2);
		</script>";
	}

	elseif ($mod == "pelanggan" AND $act == "hapus") 
	{
		mysqli_query($conn,"DELETE FROM kios WHERE id = '$_GET[id]'");
		// flash('example_message', '<p>Berhasil menghapus data kios.</p>' );
		echo"<script>
			window.history.back();
		</script>";	
	}

?>