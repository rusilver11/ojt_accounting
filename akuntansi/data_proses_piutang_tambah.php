<?php
session_start();
include 'koneksi.php';
if(empty(@$_SESSION['username'])){
        header("Location:login.php");
}else if (isset($_REQUEST["submit"])) {
//inisiasi variabel start
$kode = $_REQUEST["nama"];
$tanggalfak = $_REQUEST["tanggalfak"];
$nofaktur = $_REQUEST["nofaktur"];
$ton = $_REQUEST["ton"];
$totaluang = $_REQUEST["totaluang"];
$piutang = $_REQUEST["piutang"];
$sisa = $_REQUEST["sisa"];

$querykios = "SELECT * FROM kios WHERE kode = '$kode'";
$proses = mysqli_query($connect, $querykios);
while($kios = mysqli_fetch_assoc($proses)){
$nama = $kios['nama'];
//kueri insert 3 tabel start

$kueritrx = "INSERT INTO piutang (tglfaktur,nofaktur,ton,totaluang,kios,piutang,sisa) VALUES('$tanggalfak','$nofaktur','$ton','$totaluang','$nama','$piutang','$sisa')";
$prosestrx = mysqli_query($connect, $kueritrx);

}

//PROSES BUKU BESAR END

//header("Location: data_transaksi.php?b=".base64_encode($akun)."");
echo "<script type='text/javascript'>window.location.href='data_piutang.php';</script>";
//echo "<script type='text/javascript'>window.location.href='data_transaksi.php?b='".base64_encode($akun)."';</script>";
}
?>
