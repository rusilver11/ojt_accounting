<?php
include 'koneksi.php';
$kode = $_REQUEST['kode'];
mysqli_query($connect, "DELETE FROM piutang WHERE idpiutang='$kode'");
header('Location: data_piutang.php');
?>