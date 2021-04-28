<?php
include "koneksi.php";
$idakun=$_POST['idakun'];
$namaakun=$_POST['namaakun'];
$posisi=$_POST['posisi'];
$kategori=$_POST['kategori'];
$neraca=$_POST['neraca'];

$query = mysqli_query($connect,"INSERT INTO akun (idakun,kodeakun,namaakun, posisi, laporan, neraca) VALUES('','$idakun','$namaakun', '$posisi', '$kategori', '$neraca')");
//echo "Form Submitted Succesfully";
?>