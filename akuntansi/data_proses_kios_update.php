<?php
	include 'koneksi.php';
	if(isset($_POST["submit"])){
		$kode= $_POST["kodekios"];
		$alamat= $_POST["alamatkios"];
		$nama= $_POST["namakios"];
		//echo $username;
		
		$sql =  "UPDATE kios SET nama = '$nama', alamat = '$alamat' WHERE kode = '$kode'";
		mysqli_query($connect, $sql);
		
		
		echo "<script>alert('Data Berhasil Diperbarui');window.location.href='data_kios.php';</script>";
		//echo $sql;
		
		
		
		
	}
?>