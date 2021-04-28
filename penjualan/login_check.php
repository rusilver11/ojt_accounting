<?php
include"lib/conn.php";
$error=''; // Variabel untuk menyimpan pesan error
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Username or Password is invalid";
	}
	else
	{
		// Variabel username dan password
		$username=$_POST['username'];
		$password=$_POST['password'];

		$pass = md5($password);
		
		// Mencegah MySQLi injection 
		// $username = stripslashes($username);
		// $password = stripslashes($password);

		// $username = mysqli_real_escape_string($username);
		// $password = mysqli_real_escape_string($password);
		// SQL query untuk memeriksa apakah karyawan terdapat di database?
		$query = mysqli_query($conn,"SELECT * FROM tb_user WHERE passwd='$pass' AND usernm='$username'") or die(mysqli_error());
		$rows = mysqli_num_rows($query);

		if ($rows == 1) {
			$a = mysqli_fetch_assoc($query);

			$akses_master = explode(", ", $a['akses_master']);

			$_SESSION['login_user']=$username; // Membuat Sesi/session
			$_SESSION['login_id'] = $a['id_user'];
			$_SESSION['level'] = $a['level'];

			if($a['level'] == "user")
			{
				
				$_SESSION['pelanggan'] = in_array("pelanggan", $akses_master) ? "TRUE" : "FALSE";
				$_SESSION['supplier'] = in_array("supplier", $akses_master) ? "TRUE" : "FALSE";
				$_SESSION['kategori'] = in_array("kategori", $akses_master) ? "TRUE" : "FALSE";
				$_SESSION['barang'] = in_array("barang", $akses_master) ? "TRUE" : "FALSE";	
				$_SESSION['hapuspenjualan'] = in_array("hapuspenjualan", $akses_master) ? "TRUE" : "FALSE";	

				$_SESSION['pembelian'] = in_array("pembelian", $akses_master) ? "TRUE" : "FALSE";	
				$_SESSION['returpj'] = in_array("returpj", $akses_master) ? "TRUE" : "FALSE";	
				$_SESSION['returpemb'] = in_array("returpemb", $akses_master) ? "TRUE" : "FALSE";	
			}
			else
			{
				$_SESSION['pelanggan'] = "TRUE";
				$_SESSION['supplier'] = "TRUE";
				$_SESSION['kategori'] = "TRUE";
				$_SESSION['barang'] = "TRUE";
				$_SESSION['hapuspenjualan'] = "TRUE";

				$_SESSION['pembelian'] = "TRUE";
				$_SESSION['returpj'] = "TRUE";
				$_SESSION['returpemb'] = "TRUE";

			}
			

			mysqli_query("UPDATE tb_user SET last_login = NOW() WHERE id_user = '$a[id_user]'");

			// header("location: index.php"); // Mengarahkan ke halaman profil
			// echo "<script type='text/javascript'> window.location.href ='index.php'; </script>";
		} else {
			$error = "Username atau Password salah.";
		}
		mysqli_close($conn); // Menutup koneksi
	}
}
?>