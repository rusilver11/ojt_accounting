<?php
	
	// Include file koneksi
	include"lib/conn.php";
	
	session_start();// Memulai Session
	// Menyimpan Session
	$user_check = $_SESSION['login_user'];
	// Ambil nama karyawan berdasarkan username karyawan dengan mysqli_fetch_assoc
	$ses_sql=mysqli_query($conn,"select nama_lengkap from tb_user where usernm = '$user_check'");
	$row = mysqli_fetch_assoc($ses_sql);
	$login_session = $row['nama_lengkap'];

	if(!isset($login_session)){
		mysqli_close($conn); // Menutup koneksi
		header('location: login.php'); // Mengarahkan ke Home Page
	}
?>