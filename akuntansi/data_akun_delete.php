<?php
include 'koneksi.php';
$idakun = $_REQUEST['idakun'];
mysqli_query($connect, "DELETE FROM akun WHERE idakun='$idakun' ");
header('Location: data_akun.php');
?>


