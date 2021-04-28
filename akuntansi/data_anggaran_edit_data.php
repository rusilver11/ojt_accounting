<?php
include "koneksi.php";
$idanggaran = $_REQUEST["idanggaran"];
$kueri = mysqli_query($connect,"SELECT * FROM anggaran WHERE idanggaran='$idanggaran'");
$data = mysqli_fetch_array($kueri); 
$return=array("uraian"=>$data["kodeakun"],"nominal"=>$data["nominal"],"idanggaran"=>$data["idanggaran"]);
echo json_encode($return);
?>
