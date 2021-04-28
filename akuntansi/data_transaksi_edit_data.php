<?php
include "koneksi.php";
$nobukti = $_REQUEST["nobukti"];
$kueri = mysqli_query($connect,"SELECT transaksi.*, akun.* FROM transaksi, akun WHERE transaksi.idakun = akun.kodeakun AND nobukti='$nobukti'");
$data = mysqli_fetch_array($kueri);
$tgl = date('d/m/Y', strtotime($data['tgl']));
$return=array("nobukti"=>$data["nobukti"],"kodeakun"=>$data["kodeakun"],"idakun"=>$data["kodeakun"],"namaakun"=>$data["namaakun"],"tgl"=>$tgl,"uraianjurnal"=>$data["uraianjurnal"],"uraianbb"=>$data["uraianbb"],"ref"=>$data["ref"],"debit"=>$data["debit"],"kredit"=>$data["kredit"]);
echo json_encode($return);
?>
