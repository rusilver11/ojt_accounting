<?php
session_start();
require('fpdf17/fpdf.php');
include 'koneksi.php';
if(empty(@$_SESSION['username'])){
		header("Location:login.php");
}else{
$nim = base64_decode($_GET['user']);
$idsoal = base64_decode($_GET['id']);

//Inisiasi untuk membuat header kolom
$column_skpd = "";
$column_tahun = "";
$column_subkategori = "";
$column_jumlahsaldosubkategori = "";
$column_saldo = "";
$column_jumlahanggaransubkategori = "";

$ekuitas = new FPDF('P','mm', 'A4');


$query36 = "select UCASE(kategori) as kategori1, kategori from kategori natural join subkategori where subkategori.laporan = 'Laporan Perubahan Ekuitas' AND subkategori.nim = '$nim' AND subkategori.idsoal = '$idsoal' GROUP BY subkategori.kategori ORDER BY subkategori.idkategori LIMIT 1";
$result36 = mysqli_query($connect, $query36);
$numrows = mysqli_num_rows($result36);
if($numrows > 0){

$query1 = mysqli_query($connect, "SELECT bukubesar.tgl, UCASE(pertanyaan.skpd) AS skpd, mahasiswa.nama, mahasiswa.kelas FROM bukubesar, pertanyaan, mahasiswa WHERE bukubesar.idsoal = pertanyaan.idpertanyaan AND bukubesar.nim = mahasiswa.username AND pertanyaan.idpertanyaan = '$idsoal' AND mahasiswa.username = '$nim' LIMIT 1;");
$row1 = mysqli_fetch_assoc($query1);
$skpd = $row1["skpd"];
$date = date_parse_from_format("Y-m-d", $row1['tgl']);
$tahun = "$date[year]";

$nama = $row1['nama'];
$kelas = $row1['kelas'];
$column_skpd = $column_skpd.$skpd."\n";
$column_tahun = $column_tahun.$tahun."\n";



//Create a new PDF file
 //L For Landscape / P For Portrait
$ekuitas->AddPage();

//Menambahkan Gambar
//$ekuitas->Image('../foto/logo.png',10,10,-175);

$ekuitas->SetFont('Arial','B',10);
$ekuitas->SetY(10);
$ekuitas->SetX(15);
$ekuitas->Cell(45,10,"NIM : ".$nim,0,0,'C');
$ekuitas->SetY(10);
$ekuitas->SetX(60);
$ekuitas->Cell(45,10,"Nama : ".$nama,0,0,'C');
$ekuitas->SetY(10);
$ekuitas->SetX(105);
$ekuitas->Cell(45,10,"Kelas : ".$kelas,0,0,'C');
$ekuitas->SetY(10);
$ekuitas->SetX(150);
$ekuitas->Cell(45,10,"ID Soal : ".$idsoal,0,0,'C');

$ekuitas->SetDrawColor('Black');
$ekuitas->Line(10, 20, 210-10, 20);
$ekuitas->Ln();
$ekuitas->Ln();

$ekuitas->SetFont('Arial','B',13);
$ekuitas->Cell(80);
$ekuitas->Cell(30,10,$column_skpd,0,0,'C');
$ekuitas->Ln();
$ekuitas->Cell(80);
$ekuitas->Cell(30,10,'LAPORAN PERUBAHAN EKUITAS',0,0,'C');
$ekuitas->Ln();
$ekuitas->Cell(80);
$ekuitas->Cell(30,10,'Per 31 Desember '.$column_tahun,0,0,'C');
$ekuitas->Ln();
$ekuitas->Ln();

//Fields Name position
$Y_Fields_Name_position = 65;

//First create each Field Name
//Gray color filling each Field Name box
$ekuitas->SetFillColor(110,180,130);
//Bold Font for Field Name
$ekuitas->SetFont('Arial','B',10);
$ekuitas->SetY($Y_Fields_Name_position);
$ekuitas->SetX(15);
$ekuitas->Cell(130,8,'URAIAN',1,0,'C',1);
$ekuitas->SetX(145);
$ekuitas->Cell(50,8,$column_tahun,1,0,'C',1);
$ekuitas->Ln();

//Table position, under Fields Name
$Y_Table_Position = 73;

$queryidkat = "SELECT kategori FROM subkategori WHERE laporan = 'Laporan Perubahan Ekuitas' AND nim = '$nim' AND idsoal = '$idsoal' GROUP BY kategori;";
$resultidkat = mysqli_query($connect, $queryidkat);
$numrows1 = mysqli_num_rows($resultidkat);
	if($numrows1 > 0){
		$xend = 0;
		while($rowidkat = mysqli_fetch_assoc($resultidkat)){
			$idkat = $rowidkat['kategori'];
			$querynamakat = "SELECT nokategori, UCASE(namakategori) as namakategori FROM kategori WHERE nokategori = '$idkat';";
			$resultnamakat = mysqli_query($connect, $querynamakat);
			while($rownamakat = mysqli_fetch_assoc($resultnamakat)){
				$namakat = $rownamakat['namakategori'];
				$idkat = $rownamakat['nokategori'];

				//tidak ada pengambilan kategori

				$xkat = 0;
				$querynamasub = "SELECT idkategori, idsubkategori, UCASE(subkategori) AS subkategori FROM subkategori WHERE laporan = 'Laporan Perubahan Ekuitas' AND kategori = '$idkat' AND nim = '$nim' AND idsoal = '$idsoal' ORDER BY idsubkategori;";
				$resultnamasub = mysqli_query($connect, $querynamasub);
				while($rownamasub = mysqli_fetch_assoc($resultnamasub)){
					$idsubkat = $rownamasub['idsubkategori'];
					$subkat = $rownamasub['subkategori'];
					$idsub = $rownamasub['idkategori'];

					//kolom subkategori start

					$column_subkategori = $subkat."\n";

					$ekuitas->SetY($Y_Table_Position);
					$ekuitas->SetX(15);
					$ekuitas->Cell(130,6,$column_subkategori,1,'L');

					//kolom subkategori end

					$xsubkat = 0;
					$queryakun = "SELECT * FROM akun WHERE laporan = '$idsub' AND nim = '$nim' AND idsoal = '$idsoal' ORDER BY kodeakun;";
					$resultakun = mysqli_query($connect, $queryakun);
					$jmlekuitas = mysqli_num_rows($resultakun);
					if($jmlekuitas == 0){
						//kolom saldo start

						$saldoformat = number_format(0)."";
						$column_saldo = $saldoformat."\n";
						
						$ekuitas->SetY($Y_Table_Position);
						$ekuitas->SetX(145);
						$ekuitas->Cell(50,6,$column_saldo,1,0,'R');
						
						$ekuitas->Ln();
						
						$Y_Table_Position = $Y_Table_Position+6;

						//kolom saldo end
					}else{
						while($rowakun = mysqli_fetch_assoc($resultakun)){
						$kodeakun = $rowakun['kodeakun'];
						$namaakun = $rowakun['namaakun'];
						$querytgl = "SELECT MAX(tgl) as tgl FROM bukubesar WHERE kodeakun = '$kodeakun' AND nim = '$nim' AND idsoal = '$idsoal'";
						$resultgl = mysqli_query($connect, $querytgl);
						$rowtgl = mysqli_fetch_assoc($resultgl);
						$tgl = $rowtgl['tgl'];

						//tidak ada pengambilan akun
							
						$querysaldo = "SELECT saldo FROM bukubesar WHERE tgl = '$tgl' AND kodeakun = '$kodeakun' AND nim = '$nim' AND idsoal = '$idsoal'";
						$resultsaldo = mysqli_query($connect, $querysaldo);
						$rowsaldo = mysqli_fetch_assoc($resultsaldo);
						if($rowsaldo['saldo'] < 0){
							$saldo = $rowsaldo['saldo']*(-1);
						}else{
							$saldo = $rowsaldo['saldo'];
						}

						//kolom saldo start

						$saldoformat = number_format($saldo)."";
						$column_saldo = $saldoformat."\n";
						
						$ekuitas->SetY($Y_Table_Position);
						$ekuitas->SetX(145);
						$ekuitas->Cell(50,6,$column_saldo,1,0,'R');
						
						$ekuitas->Ln();
						
						$Y_Table_Position = $Y_Table_Position+6;

						//kolom saldo end

						$xsubkat = $saldo+$xsubkat;
						}
					}
					

					//tidak ada penjumlahan per sub kategori

					$xkat = $xkat+$xsubkat;
				}

				//kolom jumlah ekuitas start

				$jumkat = number_format($xkat)."";

				$column_jumlahsaldosubkategori = $jumkat."\n";
		
				$ekuitas->SetFillColor(170,209,120);
				
				$ekuitas->SetFont('Arial','B',10);
				$ekuitas->SetY($Y_Table_Position);
				$ekuitas->SetX(15);
				$ekuitas->Cell(130,6,'JUMLAH EKUITAS',1,0,'L',1);
				
				$ekuitas->SetY($Y_Table_Position);
				$ekuitas->SetX(145);
				$ekuitas->Cell(50,6,$column_jumlahsaldosubkategori,1,0,'R',1);
				$ekuitas->Ln();

				//kolom jumlah ekuitas end

			}
		}
	}

//Now show the columns

	$ekuitas->Output('Laporan Perubahan Ekuitas_'.$nim.'.pdf','D');
	}else{
		$ekuitas->AddPage();
		$ekuitas->SetFont('Arial','B',10);
		$ekuitas->SetY(10);
		$ekuitas->SetX(15);
		$ekuitas->Cell(45,10,"Data Tidak Tersedia",0,0,'C');
		$ekuitas->Output('Laporan Perubahan Ekuitas_'.$nim.'.pdf','D');
	}

}
?>