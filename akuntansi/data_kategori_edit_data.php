<?php
include "koneksi.php";
$idkategori = $_REQUEST["idkategori"];
$kueri = mysqli_query($connect,"SELECT * FROM subkategori WHERE idkategori='$idkategori'");
$data = mysqli_fetch_array($kueri); 
$return=array("idkategori"=>$data["idkategori"],"laporan"=>$data["laporan"],"kategori"=>$data["kategori"],"subkategori"=>$data["subkategori"]);
echo json_encode($return);
?>
