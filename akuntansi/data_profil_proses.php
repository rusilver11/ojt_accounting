<?php
	include 'koneksi.php';
	if(isset($_POST["submit"])){
		$username= $_POST["username"];
		$password= $_POST["password"];
		$nama= $_POST["nama"];
		//echo $username;
		
		$sql =  "UPDATE user SET password = '$password', nama = '$nama' WHERE username = '$username'";
		mysqli_query($connect, $sql);
		
		
		echo "<script>alert('Data Berhasil Diperbarui');window.location.href='index_mahasiswa.php';</script>";
		//echo $sql;
		
		
		
		
	}
?>