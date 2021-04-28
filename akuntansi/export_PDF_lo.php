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

$lo = new FPDF('P','mm', 'A4');

$query36 = "select UCASE(kategori) as kategori1, kategori from kategori natural join subkategori where subkategori.laporan = 'Laporan Operasional' AND subkategori.nim = '$nim' AND subkategori.idsoal = '$idsoal' GROUP BY subkategori.kategori ORDER BY subkategori.idkategori LIMIT 1";
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
$lo->AddPage();

//Menambahkan Gambar
//$lo->Image('../foto/logo.png',10,10,-175);

$lo->SetFont('Arial','B',10);
$lo->SetY(10);
$lo->SetX(15);
$lo->Cell(45,10,"NIM : ".$nim,0,0,'C');
$lo->SetY(10);
$lo->SetX(60);
$lo->Cell(45,10,"Nama : ".$nama,0,0,'C');
$lo->SetY(10);
$lo->SetX(105);
$lo->Cell(45,10,"Kelas : ".$kelas,0,0,'C');
$lo->SetY(10);
$lo->SetX(150);
$lo->Cell(45,10,"ID Soal : ".$idsoal,0,0,'C');

$lo->SetDrawColor('Black');
$lo->Line(10, 20, 210-10, 20);
$lo->Ln();
$lo->Ln();

$lo->SetFont('Arial','B',13);
$lo->Cell(80);
$lo->Cell(30,10,$column_skpd,0,0,'C');
$lo->Ln();
$lo->Cell(80);
$lo->Cell(30,10,'LAPORAN OPERASIONAL',0,0,'C');
$lo->Ln();
$lo->Cell(80);
$lo->Cell(30,10,'Untuk Periode yang Berakhir pada 31 Desember '.$column_tahun,0,0,'C');
$lo->Ln();
$lo->Ln();

//Fields Name position
$Y_Fields_Name_position = 65;

//First create each Field Name
//Gray color filling each Field Name box
$lo->SetFillColor(110,180,130);
//Bold Font for Field Name
$lo->SetFont('Arial','B',10);
$lo->SetY($Y_Fields_Name_position);
$lo->SetX(15);
$lo->Cell(130,8,'URAIAN',1,0,'C',1);
$lo->SetX(145);
$lo->Cell(50,8,$column_tahun,1,0,'C',1);
$lo->Ln();

//Table position, under Fields Name
$Y_Table_Position = 73;

$queryidkat = "SELECT kategori FROM subkategori WHERE laporan = 'Laporan Operasional' AND nim = '$nim' AND idsoal = '$idsoal' GROUP BY kategori;";
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

				//kolom kategori start

			    $column_kategori = $namakat."\n";
				
				$lo->SetFont('Arial','',10);
				
				$lo->SetY($Y_Table_Position);
				$lo->SetX(15);
				$lo->Cell(130,6,$column_kategori,1,'L');

				$lo->SetY($Y_Table_Position);
				$lo->SetX(145);
				$lo->Cell(50,6,"",1,'R');
	
				$Y_Table_Position = $Y_Table_Position+6;

				//kolom kategori end

				$xkat = 0;
				$querynamasub = "SELECT idkategori, idsubkategori, UCASE(subkategori) AS subkategori FROM subkategori WHERE laporan = 'Laporan Operasional' AND kategori = '$idkat' AND nim = '$nim' AND idsoal = '$idsoal' ORDER BY idsubkategori;";
				$resultnamasub = mysqli_query($connect, $querynamasub);
				while($rownamasub = mysqli_fetch_assoc($resultnamasub)){
					$idsubkat = $rownamasub['idsubkategori'];
					$subkat = $rownamasub['subkategori'];
					$idsub = $rownamasub['idkategori'];

					//kolom subkategori start

					$column_subkategori = $subkat."\n";
		
					$lo->SetFont('Arial','',10);

					$lo->SetY($Y_Table_Position);
					$lo->SetX(15);
					$lo->Cell(130,6,'   '.$column_subkategori,1,'L');

					$lo->SetY($Y_Table_Position);
					$lo->SetX(145);
					$lo->Cell(50,6,"",1,'R');
					
					$Y_Table_Position = $Y_Table_Position+6;

					//kolom subkategori end

					$xsubkat = 0;
					$queryakun = "SELECT * FROM akun WHERE laporan = '$idsub' AND nim = '$nim' AND idsoal = '$idsoal' ORDER BY kodeakun;";
					$resultakun = mysqli_query($connect, $queryakun);
					while($rowakun = mysqli_fetch_assoc($resultakun)){
						$kodeakun = $rowakun['kodeakun'];
						$namaakun = $rowakun['namaakun'];
						$querytgl = "SELECT MAX(tgl) as tgl FROM bukubesar WHERE kodeakun = '$kodeakun' AND nim = '$nim' AND idsoal = '$idsoal'";
						$resultgl = mysqli_query($connect, $querytgl);
						$rowtgl = mysqli_fetch_assoc($resultgl);
						$tgl = $rowtgl['tgl'];
						
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
			
						$lo->SetY($Y_Table_Position);
						$lo->SetX(15);
						$lo->Cell(130,6,'   '.$column_namaakun,1,'L');

						//kolom akun end

						//kolom saldo start

						$saldoformat = number_format($saldo)."";
						$column_saldo = $saldoformat."\n";
						
						$lo->SetY($Y_Table_Position);
						$lo->SetX(145);
						$lo->Cell(50,6,$column_saldo,1,0,'R');
						
						$lo->Ln();
						
						$Y_Table_Position = $Y_Table_Position+6;

						//kolom saldo end

						$xsubkat = $saldo+$xsubkat;
					}

					//kolom jumlah subkategori start

					$column_jumlahsaldosubkategori = $xsubkat."\n";
		
					$lo->SetFillColor(225,245,254);
					$lo->SetFont('Arial','B',10);
					$lo->SetY($Y_Table_Position);
					$lo->SetX(15);
					$lo->Cell(130,6,'   JUMLAH '.$column_subkategori,1,0,'L',1);
					
					$lo->SetY($Y_Table_Position);
					$lo->SetX(145);
					$lo->Cell(50,6,$column_jumlahsaldosubkategori,1,0,'R',1);
					$lo->Ln();
					
					$Y_Table_Position = $Y_Table_Position+6;

					//kolom jumlah subkategori end

					$xkat = $xkat+$xsubkat;
				}

				//kolom jumlah kategori start

				$column_jumlahsaldokategori = $xkat."\n";
	
				$lo->SetFillColor(106,210,235);
				
				$lo->SetY($Y_Table_Position);
				$lo->SetX(15);
				$lo->Cell(130,6,'JUMLAH '.$column_kategori,1,0,'L',1);

				$lo->SetY($Y_Table_Position);
				$lo->SetX(145);
				$lo->Cell(50,6,$column_jumlahsaldokategori,1,0,'R',1);
				$lo->Ln();
				
				$Y_Table_Position = $Y_Table_Position+6;
				
				//kolom jumlah kategori end

				$xend = $xkat-$xend;
			}
		}

		//kolom surplus start

			$column_surplussaldo = $xend."\n";

			$lo->SetFillColor(170,209,120);

			$lo->SetY($Y_Table_Position);
			$lo->SetX(15);
			$lo->Cell(130,6,"SURPLUS/DEFISIT-LRA",1,0,'L',1);

			$lo->SetY($Y_Table_Position);
			$lo->SetX(145);
			$lo->Cell(50,6,$column_surplussaldo,1,0,'R',1);
			$lo->Ln();

			//kolom surplus end
			
	}

//Now show the columns



	$lo->Output('Laporan Operasional_'.$nim.'.pdf','D');
	}else{
		$lo->AddPage();
		$lo->SetFont('Arial','B',10);
		$lo->SetY(10);
		$lo->SetX(15);
		$lo->Cell(45,10,"Data Tidak Tersedia",0,0,'C');
		$lo->Output('Laporan Operasional_'.$nim.'.pdf','D');
	}


}
?>