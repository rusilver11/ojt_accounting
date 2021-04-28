<?php
session_start();
include 'koneksi.php';
if(empty(@$_SESSION['username'])){
        header("Location:login.php");
}else if (isset($_REQUEST["submit"])) {
//inisiasi variabel start
$kodekios = $_REQUEST["kodekios"];
$namakios = $_REQUEST["namakios"];
$alamatkios = $_REQUEST["alamatkios"];




//kueri insert 3 tabel start

$kueritrx = "INSERT INTO kios (kode,nama,alamat) VALUES('$kodekios','$namakios','$alamatkios')";
$prosestrx = mysqli_query($connect, $kueritrx);


//PROSES BUKU BESAR END

//header("Location: data_transaksi.php?b=".base64_encode($akun)."");
echo "<script type='text/javascript'>window.location.href='data_kios.php';</script>";
//echo "<script type='text/javascript'>window.location.href='data_transaksi.php?b='".base64_encode($akun)."';</script>";
}
?>
