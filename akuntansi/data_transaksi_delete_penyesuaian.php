<?php
session_start();
include 'koneksi.php';
$nobukti = base64_decode($_REQUEST['nobukti']);

$ambildata = mysqli_query($connect, "SELECT * FROM bukubesar WHERE idtrx = '$nobukti'");
$rowambil = mysqli_fetch_assoc($ambildata);
$kodeakun = $rowambil['kodeakun'];
$tgl = $rowambil['tgl'];
$idbb = $rowambil['idbb'];
$idsoal = $_SESSION['id'];
$debit = $rowambil['debit'];
$kredit = $rowambil['kredit'];

$deletetrx = mysqli_query($connect, "DELETE FROM transaksi WHERE nobukti = '$nobukti'");

$deletejp = mysqli_query($connect, "DELETE FROM jurnalpenyesuaian WHERE idtrx = '$nobukti'");

$cektglsm = mysqli_query($connect, "SELECT * FROM bukubesar WHERE kodeakun = '$kodeakun' AND tgl = '$tgl' AND idbb > '$idbb' ORDER BY idbb");
$cek = mysqli_num_rows($cektglsm);
if($cek > 0){
	while($rowcek = mysqli_fetch_assoc($cektglsm)){
		$saldosm = $rowcek['saldo'];
		$idbbsm = $rowcek['idbb'];
		if($debit > 0){
			$saldosm = $saldosm - $debit;
		}else{
			$saldosm = $saldosm + $kredit;
		}
		$updatetglsm = mysqli_query($connect, "UPDATE bukubesar SET saldo = '$saldosm' WHERE idbb = '$idbbsm'");
	}
}
$tglstlh = mysqli_query($connect, "SELECT * FROM bukubesar WHERE kodeakun = '$kodeakun' AND tgl > '$tgl' ORDER BY tgl");	
while($rowstlh = mysqli_fetch_assoc($tglstlh)){
	$saldostlh = $rowstlh['saldo'];
	$idbbstlh = $rowstlh['idbb'];
	if($debit > 0){
		$saldostlh = $saldostlh - $debit;
	}else{
		$saldostlh = $saldostlh + $kredit;
	}
	$updatetglsm = mysqli_query($connect, "UPDATE bukubesar SET saldo = '$saldostlh' WHERE idbb = '$idbbstlh'");
}

$deletebb = mysqli_query($connect, "DELETE FROM bukubesar WHERE idtrx = '$nobukti'");

header('Location: data_transaksi_penyesuaian.php');
?>