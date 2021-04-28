<?php
include "koneksi.php";
$idakun = $_REQUEST["idakun"];
$namaakun = $_REQUEST["namaakun"];
$kodeakun = $_REQUEST["kodeakun"];
$posisi = $_REQUEST["posisi"];
$laporan = $_REQUEST["kategori"];
$neraca = $_REQUEST["neraca"];
$aruskas = $_REQUEST["aruskas"];
$kueri = mysqli_query($connect,"SELECT * FROM akun WHERE idakun='$idakun'");
$data = mysqli_fetch_assoc($kueri);
$kode = $data['kodeakun'];
$nama = $data['namaakun'];



mysqli_query($connect, "UPDATE akun SET namaakun='$namaakun', kodeakun='$kodeakun', posisi='$posisi', laporan='$laporan', neraca='$neraca', aruskas='$aruskas' WHERE idakun='$idakun'");
mysqli_query($connect, "UPDATE transaksi SET idakun='$kodeakun' WHERE idakun='$kode'");
mysqli_query($connect, "UPDATE jurnalumum SET kodeakun='$kodeakun' WHERE kodeakun='$kode'");
mysqli_query($connect, "UPDATE bukubesar SET namaakun = '$namaakun', kodeakun='$kodeakun' WHERE kodeakun='$kode'");
mysqli_query($connect, "UPDATE bukubesar SET uraianbb = '$namaakun' WHERE uraianbb='$nama'");

mysqli_query($connect, "UPDATE neraca SET uraianbb = '$namaakun' WHERE uraianbb='$nama'");


//header('Location: dosen_data_dosen.php');
echo "Form Updated Succesfullya";
?>