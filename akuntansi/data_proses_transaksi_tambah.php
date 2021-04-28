<?php
session_start();
include 'koneksi.php';
if(empty(@$_SESSION['username'])){
        header("Location:login.php");
}else if (isset($_REQUEST["submit"])) {
//inisiasi variabel start
$namakun = $_REQUEST["namakun"];
$tanggal = $_REQUEST["tanggal"];
$uraianju = $_REQUEST["uraianju"];
$uraianbb = $_REQUEST["uraianbb"];
$ref = $_REQUEST["ref"];
$debet = $_REQUEST["debit"];
$kredit =$_REQUEST["kredit"];
$cektgl = $_REQUEST["cektgl"];


$i = 0;
for($i;$i<(count($namakun)-1);$i++){
		//echo $namakun[$i];
		if($cektgl[$i] == "no"){
			//build a date
			$date = date_parse_from_format("d/m/Y", $tanggal[$i]);
			//output the bits
			$tgl = "$date[year]-$date[month]-$date[day]";
		}else{
			$tgl = date('Y-m-d', strtotime($tanggal[$i]));
		}
		
		$notrxget = "SELECT MAX(notrx) AS maxnotrx FROM transaksi WHERE tgl = '".$tgl."'";
		$resultnotrx = mysqli_query($connect, $notrxget);
		$rownotrx = mysqli_fetch_assoc($resultnotrx);
		if ($rownotrx['maxnotrx'] == "") {
			$notrxget1 = "SELECT MAX(notrx) AS maxnotrx FROM transaksi";
			$resultnotrx1 = mysqli_query($connect, $notrxget1);
			$rownotrx1 = mysqli_fetch_assoc($resultnotrx1);
			if ($rownotrx1['maxnotrx'] == "") {
				$notrx = 1;
			}else{
				$notrx = $rownotrx1['maxnotrx'] + 1;
			}
		}else{
			$notrx = $rownotrx['maxnotrx'];
		}

//kueri insert 3 tabel start

$subtrxget = "SELECT MAX(nosubtrx) AS maxsubtrx FROM transaksi WHERE notrx = '".$notrx."'";
$resultsubtrx = mysqli_query($connect, $subtrxget);
$rowsubtrx = mysqli_fetch_assoc($resultsubtrx);
if ($rowsubtrx['maxsubtrx'] == null) {
	$subtrx = 1;
}else{
	$subtrx = $rowsubtrx['maxsubtrx'] + 1;
}

//ambil namaakun
$ambilnamaakun = "SELECT namaakun FROM akun WHERE kodeakun = '$namakun[$i]'";
$resultkun = mysqli_query($connect, $ambilnamaakun);
$rowkun = mysqli_fetch_row($resultkun);
$akun = $rowkun[0];
//ambil namaakun


//cek uraianbb start
if($uraianbb[$i] == ""){
//ambil nilai nama akun
$uraianbb[$i] = $akun;
//ambil nilai nama akun
}
//cek uraianbb end

$kueritrx = "INSERT INTO transaksi (idakun,notrx,nosubtrx,tgl,uraianjurnal,uraianbb,ref,debit,kredit,jurnal) VALUES('$namakun[$i]','$notrx','$subtrx','$tgl','$uraianju[$i]','$uraianbb[$i]','$ref[$i]','$debet[$i]','$kredit[$i]','umum')";
$prosestrx = mysqli_query($connect, $kueritrx);

$idtrxget = "SELECT MAX(nobukti) AS idtrx FROM transaksi";
$resultidtrx = mysqli_query($connect, $idtrxget);
$rowidtrx = mysqli_fetch_assoc($resultidtrx);
$idtrx = $rowidtrx['idtrx'];

$kueriju = "INSERT INTO jurnalumum (kodeakun,noju,nosubju,tgl,uraianjurnal,nobukti,ref,debit,kredit,idtrx) VALUES('$namakun[$i]','$notrx','$subtrx','$tgl','$uraianju[$i]','','$ref[$i]','$debet[$i]','$kredit[$i]','$idtrx')";
$prosesju = mysqli_query($connect, $kueriju);


//PROSES BUKU BESAR START
$saldos = "SELECT saldo FROM bukubesar WHERE kodeakun = '$namakun[$i]' AND tgl = '$tgl' ORDER BY idbb DESC LIMIT 1";
$resultdos = mysqli_query($connect, $saldos);
$rowdos = mysqli_fetch_row($resultdos);
if($rowdos[0] == ""){
	//ambil nilai saldo start
	$cektgldb = "SELECT saldo FROM bukubesar WHERE kodeakun = '$namakun[$i]' AND tgl < '$tgl' ORDER BY idbb DESC LIMIT 1";
	$resulttgldb = mysqli_query($connect, $cektgldb);
	
	$row = mysqli_fetch_row($resulttgldb);
	
	
	
	$saldosebelumnya = $row[0];
}else{
	$saldosebelumnya = $rowdos[0];
}
//ambil nilai saldo end


//proses kalkulasi saldo start
if ($kredit[$i] > 0) {
	$saldo = $saldosebelumnya - $kredit[$i];
}else{
	$saldo = $saldosebelumnya + $debet[$i];
}
//proses kalkulasi saldo end

//ambil nilai skpd start
$skpd = "Dinas Pendapatan Daerah";
//ambil nilai skpd end


//proses input bb start
$kueribb = "INSERT INTO bukubesar (kodeakun,skpd,tgl,namaakun,uraianbb,ref,debit,kredit,saldo,idtrx) VALUES('$namakun[$i]','$skpd','$tgl','$akun','$uraianbb[$i]','$ref[$i]','$debet[$i]','$kredit[$i]','$saldo','$idtrx')";
$prosesbb = mysqli_query($connect, $kueribb);
//proses input bb end

$saldoupdate = "SELECT idbb, saldo FROM bukubesar WHERE kodeakun = '$namakun[$i]' AND tgl >'$tgl' ORDER BY tgl";
$resultdodate = mysqli_query($connect, $saldoupdate);
while($rowdate = mysqli_fetch_row($resultdodate)){
	$saldoupdates = $rowdate[1];
	$idbb = $rowdate[0];
	if ($kredit[$i] > 0) {
	$saldoup = $saldoupdates - $kredit[$i];
	}else{
	$saldoup = $saldoupdates + $debet[$i];
	}
	$kueribbup = "UPDATE bukubesar SET saldo = '$saldoup' WHERE idbb = '$idbb'";
	$prosesbbup = mysqli_query($connect, $kueribbup);
}

//PROSES BUKU BESAR END
}
//header("Location: data_transaksi.php?b=".base64_encode($akun)."");
echo "<script type='text/javascript'>window.location.href='data_transaksi.php';</script>";
//echo "<script type='text/javascript'>window.location.href='data_transaksi.php?b='".base64_encode($akun)."';</script>";
}
?>
