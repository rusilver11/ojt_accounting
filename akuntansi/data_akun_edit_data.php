<?php
include "koneksi.php";
$idakun = $_REQUEST["idakun"];
$kueri = mysqli_query($connect,"SELECT * FROM akun WHERE idakun='$idakun'");
$data = mysqli_fetch_array($kueri); 
$return=array("idakun"=>$data["idakun"],"namaakun"=>$data["namaakun"],"kodeakun"=>$data["kodeakun"],"posisi"=>$data["posisi"],"kategori"=>$data["laporan"],"neraca"=>$data["neraca"],"aruskas"=>$data['aruskas']);
echo json_encode($return);
?>
