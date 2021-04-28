<?php
include 'koneksi.php';
$kode = $_REQUEST['kode'];
mysqli_query($connect, "DELETE FROM kios WHERE kode='$kode'");
header('Location: data_kios.php');
?>