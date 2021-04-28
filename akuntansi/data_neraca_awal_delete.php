<?php
include 'koneksi.php';
$kode = $_REQUEST['kode'];
mysqli_query($connect, "DELETE FROM neracaawal WHERE id='$kode'");
header('Location: data_neraca_awal.php');
?>