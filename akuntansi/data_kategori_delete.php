<?php
include 'koneksi.php';
$idkategori = $_REQUEST['idkategori'];
mysqli_query($connect, "DELETE FROM subkategori WHERE idkategori='$idkategori'");
header('Location: data_kategori.php');
?>