
<?php
error_reporting(0);
session_start();
include 'koneksi.php';
if(empty(@$_SESSION['username'])){
        header("Location:login.php");
}else if (isset($_REQUEST["submit"])) {
//inisiasi variabel start
$kodeakun = $_REQUEST["namaakun"];
$tanggal = $_REQUEST["tanggal"]; 
$debit = $_REQUEST["debit"];
$kredit = $_REQUEST["kredit"];


$queryakun = "SELECT * FROM akun WHERE kodeakun = '$kodeakun'";
$proses = mysqli_query($connect, $queryakun);
while($akun = mysqli_fetch_assoc($proses)){
$nama = $akun['namaakun'];

$query = "INSERT INTO neracaawal (kodeakun,namaakun,debit,kredit,tgl) VALUES('$kodeakun','$nama','$debit','$kredit','$tanggal')";
$insert = mysqli_query($connect, $query);


}


//header("Location: data_transaksi.php?b=".base64_encode($akun)."");
echo "<script type='text/javascript'>window.location.href='data_neraca_awal.php';</script>";
//echo "<script type='text/javascript'>window.location.href='data_transaksi.php?b='".base64_encode($akun)."';</script>";
}
?>
