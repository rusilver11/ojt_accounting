<?php
include 'koneksi.php';
$idanggaran = base64_decode($_REQUEST['idanggaran']);
mysqli_query($connect, "DELETE FROM anggaran WHERE idanggaran='$idanggaran'");
header('Location: data_laporan_realisasi_anggaran.php');
?>