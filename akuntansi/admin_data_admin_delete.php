<?php
include "koneksi.php";
$username = $_REQUEST['username'];
$sql = "DELETE FROM admin WHERE username = '$username'";
mysqli_query($connect, $sql);
header('Location: admin_data_admin.php');
?>