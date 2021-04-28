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
$column_kategori = "";
$column_subkategori = "";
$column_namaakun = "";
$column_jumlahsaldosubkategori = "";
$column_jumlahsaldokategori = "";
$column_surplussaldo = "";
$column_saldo = "";
$column_anggaran = "";
$column_jumlahanggaransubkategori = "";
$column_jumlahanggarankategori = "";
$column_surplusanggaran = "";

$pdf = new FPDF('P','mm', 'A4');

$query36 = "select UCASE(kategori) as kategori1, kategori from kategori natural join subkategori where subkategori.laporan = 'Laporan Realisasi Anggaran' AND subkategori.nim = '$nim' AND subkategori.idsoal = '$idsoal' GROUP BY subkategori.kategori ORDER BY subkategori.idkategori LIMIT 1";
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
$pdf->AddPage();

//Menambahkan Gambar
//$pdf->Image('../foto/logo.png',10,10,-175);

$pdf->SetFont('Arial','B',10);
$pdf->SetY(10);
$pdf->SetX(15);
$pdf->Cell(45,10,"NIM : ".$nim,0,0,'C');
$pdf->SetY(10);
$pdf->SetX(60);
$pdf->Cell(45,10,"Nama : ".$nama,0,0,'C');
$pdf->SetY(10);
$pdf->SetX(105);
$pdf->Cell(45,10,"Kelas : ".$kelas,0,0,'C');
$pdf->SetY(10);
$pdf->SetX(150);
$pdf->Cell(45,10,"ID Soal : ".$idsoal,0,0,'C');

$pdf->SetDrawColor('Black');
$pdf->Line(10, 20, 210-10, 20);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,$column_skpd,0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'LAPORAN REALISASI ANGGARAN',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'Untuk Periode yang Berakhir pada 31 Desember '.$column_tahun,0,0,'C');
$pdf->Ln();
$pdf->Ln();

//Fields Name position
$Y_Fields_Name_position = 65;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,130);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(15);
$pdf->Cell(100,8,'URAIAN',1,0,'C',1);
$pdf->SetX(115);
$pdf->Cell(40,8,'ANGGARAN '.$column_tahun,1,0,'C',1);
$pdf->SetX(155);
$pdf->Cell(40,8,'REALISASI '.$column_tahun,1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 73;

$queryidkat = "SELECT kategori FROM subkategori WHERE laporan = 'Laporan Realisasi Anggaran' AND nim = '$nim' AND idsoal = '$idsoal' GROUP BY kategori;";
$resultidkat = mysqli_query($connect, $queryidkat);
$numrows1 = mysqli_num_rows($resultidkat);
	if($numrows1 > 0){
		$xend = 0;
		$xangend = 0;
		while($rowidkat = mysqli_fetch_assoc($resultidkat)){
			$idkat = $rowidkat['kategori'];
			$querynamakat = "SELECT nokategori, UCASE(namakategori) as namakategori FROM kategori WHERE nokategori = '$idkat';";
			$resultnamakat = mysqli_query($connect, $querynamakat);
			while($rownamakat = mysqli_fetch_assoc($resultnamakat)){
				$namakat = $rownamakat['namakategori'];
				$idkat = $rownamakat['nokategori'];

				//kolom kategori start

				$pdf->SetFont('Arial','',10);
			    $kategori = $namakat;
			    $column_kategori = $kategori."\n";
				
				$pdf->SetY($Y_Table_Position);
				$pdf->SetX(15);
				$pdf->Cell(100,6,$column_kategori,1,'L');

				$pdf->SetY($Y_Table_Position);
				$pdf->SetX(115);
				$pdf->Cell(40,6,"",1,'R');

				$pdf->SetY($Y_Table_Position);
				$pdf->SetX(155);
				$pdf->Cell(40,6,"",1,'R');
				
				$Y_Table_Position = $Y_Table_Position+6;

				//kolom kategori end

				$xkat = 0;
				$xangkat = 0;
				$querynamasub = "SELECT idkategori, idsubkategori, UCASE(subkategori) AS subkategori FROM subkategori WHERE laporan = 'Laporan Realisasi Anggaran' AND kategori = '$idkat' AND nim = '$nim' AND idsoal = '$idsoal' ORDER BY idsubkategori;";
				$resultnamasub = mysqli_query($connect, $querynamasub);
				while($rownamasub = mysqli_fetch_assoc($resultnamasub)){
					$idsubkat = $rownamasub['idsubkategori'];
					$subkat = $rownamasub['subkategori'];
					$idsub = $rownamasub['idkategori'];

					//kolom subkategori start

					$subkategori = $subkat;
					$pdf->SetFont('Arial','',10);
					$column_subkategori = $subkategori."\n";

					$pdf->SetY($Y_Table_Position);
					$pdf->SetX(15);
					$pdf->Cell(100,6,'   '.$column_subkategori,1,'L');

					$pdf->SetY($Y_Table_Position);
					$pdf->SetX(115);
					$pdf->Cell(40,6,"",1,'R');

					$pdf->SetY($Y_Table_Position);
					$pdf->SetX(155);
					$pdf->Cell(40,6,"",1,'R');
					
					$Y_Table_Position = $Y_Table_Position+6;

					//kolom subkategori end

					$xsubkat = 0;
					$xangsub = 0;
					$queryakun = "SELECT * FROM akun WHERE laporan = '$idsub' AND nim = '$nim' AND idsoal = '$idsoal' ORDER BY kodeakun;";
					$resultakun = mysqli_query($connect, $queryakun);
					while($rowakun = mysqli_fetch_assoc($resultakun)){
						$kodeakun = $rowakun['kodeakun'];
						$namaakun = $rowakun['namaakun'];
						$querytgl = "SELECT MAX(tgl) as tgl FROM bukubesar WHERE kodeakun = '$kodeakun' AND nim = '$nim' AND idsoal = '$idsoal'";
						$resultgl = mysqli_query($connect, $querytgl);
						$rowtgl = mysqli_fetch_assoc($resultgl);
						$tgl = $rowtgl['tgl'];
						
						$queryanggaran = "SELECT idanggaran, nominal FROM anggaran WHERE kodeakun = '$kodeakun' AND nim = '$nim' AND idsoal = '$idsoal'";
						$resultanggaran = mysqli_query($connect, $queryanggaran);
						$rowanggaran = mysqli_fetch_assoc($resultanggaran);
						$anggaran = $rowanggaran['nominal'];
						$idanggaran = $rowanggaran['idanggaran'];
						
						$querysaldo = "SELECT saldo FROM bukubesar WHERE tgl = '$tgl' AND kodeakun = '$kodeakun' AND nim = '$nim' AND idsoal = '$idsoal'";
						$resultsaldo = mysqli_query($connect, $querysaldo);
						$rowsaldo = mysqli_fetch_assoc($resultsaldo);
						if($rowsaldo['saldo'] < 0){
							$saldo = $rowsaldo['saldo']*(-1);
						}else{
							$saldo = $rowsaldo['saldo'];
						}

						//kolom akun start

						$column_namaakun = $namaakun."\n";
			
						$pdf->SetY($Y_Table_Position);
						$pdf->SetX(15);
						$pdf->Cell(100,6,'   '.$column_namaakun,1,'L');

						//kolom akun end

						//kolom anggaran start

						$column_anggaran = $anggaran."\n";
			
						$pdf->SetY($Y_Table_Position);
						$pdf->SetX(115);
						$pdf->Cell(40,6,$column_anggaran,1,'R');

						//kolom anggaran end

						//kolom saldo start

						$column_saldo = $saldo."\n";
			
						$pdf->SetY($Y_Table_Position);
						$pdf->SetX(155);
						$pdf->Cell(40,6,$column_saldo,1,0,'R');
						
						$pdf->Ln();
						
						$Y_Table_Position = $Y_Table_Position+6;

						//kolom saldo end

						$xsubkat = $saldo+$xsubkat;
						$xangsub = $anggaran+$xangsub;
					}

					//kolom jumlas subkategori start

					if ($xangsub > 0) {
						$column_jumlahanggaransubkategori = $xangsub."\n";
					}else{
						$column_jumlahanggaransubkategori = null."\n";
					}

					$column_jumlahsaldosubkategori = $xsubkat."\n";
					
					$pdf->SetFillColor(225,245,254);
					$pdf->SetFont('Arial','B',10);
					$pdf->SetY($Y_Table_Position);
					$pdf->SetX(15);
					$pdf->Cell(100,6,'   JUMLAH '.$column_subkategori,1,0,'L',1);

					$pdf->SetY($Y_Table_Position);
					$pdf->SetX(115);
					$pdf->Cell(40,6,$column_jumlahanggaransubkategori,1,0,'R',1);

					$pdf->SetY($Y_Table_Position);
					$pdf->SetX(155);
					$pdf->Cell(40,6,$column_jumlahsaldosubkategori,1,0,'R',1);
					$pdf->Ln();
					
					$Y_Table_Position = $Y_Table_Position+6;

					//kolom jumlah subkategori end

					$xkat = $xkat+$xsubkat;
					$xangkat = $xangkat+$xangsub;
				}

				//kolom jumlah kategori start

				if ($xangkat > 0) {
					$column_jumlahanggarankategori = $xangkat."\n";
				}else{
					$column_jumlahanggarankategori = null."\n";
				}

				$column_jumlahsaldokategori = $xkat."\n";
				
				$pdf->SetFillColor(106,210,235);
				$pdf->SetY($Y_Table_Position);
				$pdf->SetX(15);
				$pdf->Cell(100,6,'JUMLAH '.$column_kategori,1,0,'L',1);

				$pdf->SetY($Y_Table_Position);
				$pdf->SetX(115);
				$pdf->Cell(40,6,$column_jumlahanggarankategori,1,0,'R',1);

				$pdf->SetY($Y_Table_Position);
				$pdf->SetX(155);
				$pdf->Cell(40,6,$column_jumlahsaldokategori,1,0,'R',1);
				$pdf->Ln();
				
				$Y_Table_Position = $Y_Table_Position+6;

				//kolom jumlah kategori end

				$xend = $xkat-$xend;
				$xangend = $xangkat-$xangend*-1;
			}
		}

		//kolom surplus start

		if ($xangend > 0) {
			$column_surplusanggaran = $xangend."\n";
		}else{
			$column_surplusanggaran = null."\n";
		}

		$column_surplussaldo = $xend."\n";

		$pdf->SetFillColor(170,209,120);

		$pdf->SetY($Y_Table_Position);
		$pdf->SetX(15);
		$pdf->Cell(100,6,"SURPLUS/DEFISIT-LRA",1,0,'L',1);

		$pdf->SetY($Y_Table_Position);
		$pdf->SetX(115);
		$pdf->Cell(40,6,$column_surplusanggaran,1,0,'R',1);

		$pdf->SetY($Y_Table_Position);
		$pdf->SetX(155);
		$pdf->Cell(40,6,$column_surplussaldo,1,0,'R',1);
		$pdf->Ln();

		//kolom surplus end
	}

//Now show the columns

	$pdf->Output('Laporan Realisasi Anggaran_'.$nim.'.pdf','D');
	}else{
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',10);
		$pdf->SetY(10);
		$pdf->SetX(15);
		$pdf->Cell(45,10,"Data Tidak Tersedia",0,0,'C');
		$pdf->Output('Laporan Realisasi Anggaran_'.$nim.'.pdf','D');
	}
}
?>