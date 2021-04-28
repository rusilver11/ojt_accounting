<?php
session_start();
include 'koneksi.php';
$idsoal = $_SESSION['id'];
$kodeakun = $_REQUEST["kodeakun"];
$tgl = $_REQUEST["tgl"];
$uraianjurnal = $_REQUEST["uraianjurnal"];
$uraianbb = $_REQUEST["uraianbb"];
$ref = $_REQUEST["ref"];
$debit = $_REQUEST['debit'];
$kredit = $_REQUEST['kredit'];
$nobukti = $_REQUEST["nobukti"];
$kueri = mysqli_query($connect,"SELECT transaksi.*, bukubesar.* FROM transaksi, bukubesar WHERE transaksi.nobukti = bukubesar.idtrx AND transaksi.nobukti='$nobukti' AND transaksi.idsoal = '$idsoal'");
$data = mysqli_fetch_assoc($kueri);
$debitold = $data['debit'];
$kreditold = $data['kredit'];
$idbb = $data['idbb'];
$kodeakundb = $data['kodeakun'];
$saldodb = $data['saldo'];
//CEK PERUBAHAN TANGGAL START
$date = date_parse_from_format("d/m/Y", $tgl);
			//output the bits
$tglinput = "$date[year]-$date[month]-$date[day]";
$tgl2 = $data['tgl'];
$date2 = date_parse_from_format("Y-m-d", $tgl2);
$tgldb = "$date2[year]-$date2[month]-$date2[day]";

$ambilnotrx = mysqli_query($connect,"SELECT notrx FROM transaksi WHERE tgl = '$tglinput' AND idsoal = '$idsoal' LIMIT 1");
$rownotrx = mysqli_fetch_assoc($ambilnotrx);
if($rownotrx['notrx'] == 0){
	$notrx = 1;
}else{
	$notrx = $rownotrx['notrx'];
}
		
$ambilnosubtrx = mysqli_query($connect,"SELECT MAX(nosubtrx) as nosubtrx FROM transaksi WHERE notrx = '$notrx' AND tgl = '$tglinput' AND idsoal = '$idsoal'");
$rownosubtrx = mysqli_fetch_assoc($ambilnosubtrx);
$nosubtrx = $rownosubtrx['nosubtrx'] + 1;


		
$updatetrx = mysqli_query($connect, "UPDATE transaksi SET notrx = '$notrx', nosubtrx = '$nosubtrx',tgl = '$tglinput', idakun = '$kodeakun', uraianjurnal = '$uraianjurnal', uraianbb = '$uraianbb', ref = '$ref', kredit = '$kredit', debit = '$debit' WHERE nobukti = '$nobukti'");
		
		
$updateju = mysqli_query($connect, "UPDATE jurnalumum SET noju = '$notrx', nosubju = '$nosubtrx', tgl = '$tglinput', kodeakun = '$kodeakun', uraianjurnal = '$uraianjurnal', ref = '$ref', kredit = '$kredit', debit = '$debit' WHERE nobukti = '$nobukti'");


if($kodeakun != $kodeakundb){
//before
	$cektgl2 = mysqli_query($connect, "SELECT idbb,saldo FROM bukubesar WHERE idsoal = '$idsoal' AND kodeakun = '$kodeakundb' AND tgl <= '$tgldb' AND idbb < '$idbb' ORDER BY tgl DESC LIMIT 1");
		$num = mysqli_num_rows($cektgl2);
		$rowtglsama2=mysqli_fetch_assoc($cektgl2);
		if($num > 0){
			$sal = $rowtglsama2['saldo'];
		}else{
			$sal = 0;
		}
		
		$tgls = "SELECT * FROM bukubesar WHERE idsoal = '$idsoal' AND kodeakun = '$kodeakundb' AND tgl >= '$tgldb' AND idbb > '$idbb' ORDER BY tgl ASC";
		$restgl3 = mysqli_query($connect, $tgls);
		$cekadatglsama24 = mysqli_num_rows($restgl3);
		if($cekadatglsama24 > 0){
		while($rowtgl3=mysqli_fetch_assoc($restgl3)){
			$idbbfirsts = $rowtgl3['idbb'];
			$kueribbupp0 = mysqli_query($connect, "UPDATE bukubesar SET saldo = '0' WHERE idbb = '$idbbfirsts'");
			$kreditup = $rowtgl3['kredit'];
			$debitup = $rowtgl3['debit'];
			if($debitup > 0){
				$sal = $sal + $debitup;
			}else{
				$sal = $sal - $kreditup;
			}
			
			echo $sal;
			$kueribbupp = mysqli_query($connect, "UPDATE bukubesar SET saldo = '$sal' WHERE idbb = '$idbbfirsts'");
		}
		}
//after
	
	
}
if($tglinput != $tgldb){
	if($debitold > 0){
		$cektglbeforeupdateall = mysqli_query($connect,"SELECT idbb, saldo FROM bukubesar WHERE idsoal = '$idsoal' AND kodeakun = '$kodeakundb' AND tgl = '$tgldb' AND idbb > '$idbb' ORDER BY tgl");
		while($ceksametgl = mysqli_fetch_assoc($cektglbeforeupdateall)){
			if($ceksametgl['saldo'] != ""){
				$saldosamenow = $ceksametgl['saldo'] - $debitold;
				$idbbsame = $ceksametgl['idbb'];
				$updatesametgl = mysqli_query($connect,"UPDATE bukubesar SET saldo = '$saldosamenow' WHERE idbb = '$idbbsame'");
			}
		}
		$ambilsaldoall = mysqli_query($connect,"SELECT idbb, saldo FROM bukubesar WHERE kodeakun = '$kodeakundb' AND  idsoal = '$idsoal' AND tgl > '$tgldb' ORDER BY tgl");
		while($saldoall = mysqli_fetch_assoc($ambilsaldoall)){
			if($saldoall['saldo'] != ""){
				$saldoallnow = $saldoall['saldo'] - $debitold;
				$saldoallidbb = $saldoall['idbb'];
				$updatesaldoall = mysqli_query($connect,"UPDATE bukubesar SET saldo = '$saldoallnow' WHERE idbb = '$saldoallidbb'");
			}
		}
	}else{
		$cektglbeforeupdateall = mysqli_query($connect,"SELECT idbb, saldo FROM bukubesar WHERE idsoal = '$idsoal' AND kodeakun = '$kodeakundb' AND tgl = '$tgldb' AND idbb > '$idbb' ORDER BY tgl");
		while($ceksametgl = mysqli_fetch_assoc($cektglbeforeupdateall)){
			if($ceksametgl['saldo'] != ""){
				$saldosamenow = $ceksametgl['saldo'] + $kreditold;
				$idbbsame = $ceksametgl['idbb'];
				$updatesametgl = mysqli_query($connect,"UPDATE bukubesar SET saldo = '$saldosamenow' WHERE idbb = '$idbbsame'");
			}
		}
		$ambilsaldoall = mysqli_query($connect,"SELECT idbb, saldo FROM bukubesar WHERE kodeakun = '$kodeakundb' AND  idsoal = '$idsoal' AND tgl > '$tgldb' ORDER BY tgl");
		while($saldoall = mysqli_fetch_assoc($ambilsaldoall)){
			if($saldoall['saldo'] != ""){
				$saldoallnow = $saldoall['saldo'] + $kreditold;
				$saldoallidbb = $saldoall['idbb'];
				$updatesaldoall = mysqli_query($connect,"UPDATE bukubesar SET saldo = '$saldoallnow' WHERE idbb = '$saldoallidbb'");
			}
		}
	}
	$saldoss = "SELECT saldo FROM bukubesar WHERE idsoal = '$idsoal' AND kodeakun = '$kodeakundb' AND tgl = '$tglinput' ORDER BY idbb DESC LIMIT 1";
	$resultdoss = mysqli_query($connect, $saldoss);
	$rowdos = mysqli_fetch_row($resultdoss);
	if($rowdos[0] == ""){
	//ambil nilai saldo start
		$cektgldb = "SELECT idbb,tgl,saldo FROM bukubesar WHERE idsoal = '$idsoal' AND kodeakun = '$kodeakundb' AND tgl < '$tglinput' GROUP by tgl ORDER BY idbb DESC";
		$resulttgldb = mysqli_query($connect, $cektgldb);
		$count = mysqli_num_rows($resulttgldb);
		if($count > 1){
			$saldovalue = "SELECT saldo FROM bukubesar WHERE idsoal = '$idsoal' AND kodeakun = '$kodeakundb' AND tgl < '$tglinput' AND idbb != '$idbb' ORDER BY tgl DESC, idbb DESC LIMIT 1";
		}else{
			$saldovalue = "SELECT saldo FROM bukubesar WHERE idsoal = '$idsoal' AND kodeakun = '$kodeakundb' AND tgl < '$tglinput' ORDER BY idbb DESC LIMIT 1";
		}
		$resultdo = mysqli_query($connect, $saldovalue);
		$row = mysqli_fetch_row($resultdo);
		$saldosebelumnya = $row[0];
	}else{
		$saldosebelumnya = $rowdos[0];
	}
	if ($kredit > 0) {
		$saldo = $saldosebelumnya - $kredit;
	}else{
		$saldo = $saldosebelumnya + $debit;
	}

	//proses input bb start
	$kueribbs = "UPDATE bukubesar SET tgl = '$tglinput', uraianbb = '$uraianbb', ref='$ref', debit = '$debit', kredit = '$kredit', saldo = '$saldo' WHERE idbb = '$idbb'";
	$prosesbbs = mysqli_query($connect, $kueribbs);
	//proses input bb end

	$saldoupdate = "SELECT idbb, saldo FROM bukubesar WHERE idsoal = '$idsoal' AND kodeakun = '$kodeakundb' AND tgl > '$tglinput' ORDER BY tgl";
	$resultdodate = mysqli_query($connect, $saldoupdate);
	while($rowdate = mysqli_fetch_row($resultdodate)){
		if($rowdate['1'] != ""){
			$saldoupdates = $rowdate[1];
			$idbbdown = $rowdate[0];
			if ($kredit > 0) {
			$saldoup = $saldoupdates - $kredit;
			}else{
			$saldoup = $saldoupdates + $debit;
			}
			$kueribbup = "UPDATE bukubesar SET saldo = '$saldoup' WHERE idbb = '$idbbdown'";
			$prosesbbup = mysqli_query($connect, $kueribbup);
		}
	}
}elseif($tglinput == $tgldb){
	$ambilsaldosblm = mysqli_query($connect, "SELECT saldo FROM bukubesar WHERE kodeakun = '$kodeakun' AND idsoal = '$idsoal' AND tgl = '$tglinput' AND idbb != '$idbb' ORDER BY tgl DESC, idbb DESC");
	$cek = mysqli_num_rows($ambilsaldosblm);
	$rowambil = mysqli_fetch_assoc($ambilsaldosblm);
	if($cek > 0){
		$ambilsaldosblm2 = mysqli_query($connect, "SELECT saldo FROM bukubesar WHERE kodeakun = '$kodeakun' AND idsoal = '$idsoal' AND tgl = '$tglinput' AND idbb < '$idbb' ORDER BY tgl DESC, idbb DESC LIMIT 1");
	}else{
		$ambilsaldosblm2 = mysqli_query($connect, "SELECT saldo FROM bukubesar WHERE kodeakun = '$kodeakun' AND idsoal = '$idsoal' AND tgl < '$tglinput' AND idbb != '$idbb' ORDER BY tgl DESC, idbb DESC LIMIT 1");
	}
	$rowambil2 = mysqli_fetch_assoc($ambilsaldosblm2);
	if($rowambil2['saldo'] == ""){
		$saldobefore = 0;
	}else{
		$saldobefore = $rowambil2['saldo'];
	}
	
	if($debit > 0){
		$saldosekarang = $saldobefore + $debit;
	}else{
		$saldosekarang = $saldobefore - $kredit;
	}
	
	$kueribb = "UPDATE bukubesar SET uraianbb = '$uraianbb', ref='$ref', debit = '$debit', kredit = '$kredit', saldo = '$saldosekarang' WHERE idbb = '$idbb'";
	$prosesbb = mysqli_query($connect, $kueribb);
	
	$saldoar = $saldosekarang;
	$saldoars = $saldosekarang;
	
	$cektgl = mysqli_query($connect, "SELECT * FROM bukubesar WHERE idsoal = '$idsoal' AND kodeakun = '$kodeakundb' AND tgl = '$tglinput' AND idbb > '$idbb' ORDER BY tgl");
	$cekadatglsama = mysqli_num_rows($cektgl);
	if($cekadatglsama > 0){
		while($rowtglsama = mysqli_fetch_assoc($cektgl)){
			$idbbcektgl = $rowtglsama['idbb'];
			
			$kuerizero = mysqli_query($connect, "UPDATE bukubesar SET saldo = '0' WHERE idbb = '$idbbcektgl'");

			$debit1 = $rowtglsama['debit'];
			$kredit1 = $rowtglsama['kredit'];
			
			if($debit1 > 0){
				$saldok = $saldoar + $debit1;
			}else{
				$saldok = $saldoar - $kredit1;
			}
			
			$idbbcektgl = $rowtglsama['idbb'];
			$kueribbup = "UPDATE bukubesar SET saldo = '$saldok' WHERE idbb = '$idbbcektgl'";
			$prosesbbup = mysqli_query($connect, $kueribbup);
			$saldoar = $saldok;
		}
	}

	$saldoupdate = "SELECT * FROM bukubesar WHERE idsoal = '$idsoal' AND kodeakun = '$kodeakundb' AND tgl > '$tglinput' ORDER BY tgl";
	$resultdodate = mysqli_query($connect, $saldoupdate);
	while($rowdate = mysqli_fetch_assoc($resultdodate)){
		$saldoes = $rowdate['saldo'];
		$idbbdoes = $rowdate['idbb'];
		$kuerizeros = mysqli_query($connect, "UPDATE bukubesar SET saldo = '0' WHERE idbb = '$idbbdoes'");

		$debit2 = $rowdate['debit'];
		$kredit2 = $rowdate['kredit'];
		if($debit2 > 0){
			$saldoks = $saldoars + $debit2;
		}else{
			$saldoks = $saldoars - $kredit2;
		}
		$kueribbupmore = "UPDATE bukubesar SET saldo = '$saldoks' WHERE idbb = '$idbbdoes'";
		$prosesbbupmore = mysqli_query($connect, $kueribbupmore);
		$saldoars = $saldoks;
	}
}
//CEK PERUBAHAN TANGGAL END
//header('Location: dosen_data_dosen.php');
//echo "Form Updated Succesfullya";
?>