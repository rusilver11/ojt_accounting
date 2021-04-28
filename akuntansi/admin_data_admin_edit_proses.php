<?php
include "koneksi.php";
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];
$nama = $_REQUEST["nama"];
mysqli_query($connect, "UPDATE admin SET nama='$nama', password='$password' WHERE username='$username'");
//header('Location: admin_data_admin.php');
echo "Form Updated Succesfullya";
?>