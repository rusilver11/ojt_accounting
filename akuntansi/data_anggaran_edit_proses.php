<?php
include "koneksi.php";
$uraian = $_REQUEST["uraian"];
$nominal = $_REQUEST["nominal"];
$idanggaran = $_REQUEST["idanggaran"];
mysqli_query($connect, "UPDATE anggaran SET kodeakun='$uraian', nominal='$nominal' WHERE idanggaran='$idanggaran'");
//header('Location: dosen_data_dosen.php');
echo "Form Updated Succesfullya";
?>