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
$column_tgl = "";
$column_nobukti = "";
$column_uraian = "";
$column_kodeakun = "";
$column_ref = "";
$column_debet = "";
$column_kredit = "";
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
$lo->Cell(30,10,'JURNAL UMUM',0,0,'C');
$lo->Ln();
$lo->Ln();

//Fields Name positions
$Y_Fields_Name_position = 65;

//First create each Field Name
//Gray color filling each Field Name box
$lo->SetFillColor(110,180,130);
//Bold Font for Field Name
$lo->SetFont('Arial','B',10);
$lo->SetY($Y_Fields_Name_position);
$lo->SetX(10);
	$lo->Cell(20,8,'Tgl',1,0,'C',1);
$lo->SetX(30);
	$lo->Cell(15,8,'No Bukti',1,0,'C',1);
$lo->SetX(45);
	$lo->Cell(20,8,'Kode Akun',1,0,'C',1);
$lo->SetX(65);
	$lo->Cell(75,8,'Uraian',1,0,'C',1);
$lo->SetX(140);
	$lo->Cell(10,8,'Ref',1,0,'C',1);
$lo->SetX(150);
	$lo->Cell(25,8,'Debit',1,0,'C',1);
$lo->SetX(175);
	$lo->Cell(25,8,'Kredit',1,0,'C',1);
$lo->Ln();

//Table position, under Fields Name
$Y_Table_Position = 73;
                                $sql = "SELECT noju FROM jurnalumum WHERE idsoal = '".$idsoal."' AND nim = '".$nim."' GROUP BY noju ORDER BY tgl";
                                //$sql = "SELECT * FROM akun";
                                $no = 1;
                                $result = mysqli_query($connect, $sql);
                            
                                while($row = mysqli_fetch_assoc($result)){
                                    $sqlrowspan = "SELECT COUNT(noju) as jumlah, tgl FROM jurnalumum WHERE idsoal = '".$idsoal."' AND nim = '".$nim."' AND noju = '".$row['noju']."'";
                                    $resultrowspan = mysqli_query($connect, $sqlrowspan);
                                    $rowofrowspan = mysqli_fetch_assoc($resultrowspan);
                                    $rowspan = $rowofrowspan['jumlah'];

                                    $date = date_parse_from_format("Y-m-d", $rowofrowspan['tgl']);
									$tgl = $rowofrowspan['tgl'];

									//"$date[year]"

                                    $sqlalls = "SELECT * FROM jurnalumum WHERE idsoal = '".$idsoal."' AND nim = '".$nim."' AND noju = '".$row['noju']."' ORDER by tgl ASC, nobukti";
                                    $resultalls = mysqli_query($connect, $sqlalls);
                                    $jml = mysqli_num_rows($resultalls);

                                    $column_tgl = $tgl."\n";

                                    $jmlend = 6*$jml;

                                    $lo->SetFont('Arial','',10);
									$lo->SetY($Y_Table_Position);
									$lo->SetX(10);
									$lo->Cell(20,$jmlend,$column_tgl,1,'L');


                                    $sqlall = "SELECT * FROM jurnalumum WHERE idsoal = '".$idsoal."' AND nim = '".$nim."' AND noju = '".$row['noju']."' ORDER by tgl ASC, nobukti";
                                    $resultall = mysqli_query($connect, $sqlall);
                                    $i = 1;
                                    while ($rowall = mysqli_fetch_assoc($resultall)) {
										$kredit = number_format($rowall['kredit'])."";
										$debet = number_format($rowall['debit'])."";
										$nobukti = $rowall['nobukti'];
										$kodeakun = $rowall['kodeakun'];
										$ref = $rowall['ref'];
                                        if($rowall['kredit'] > 0){
                                            $uraian =  "   ".$rowall['uraianjurnal'];
                                        }else{
                                            $uraian =  $rowall['uraianjurnal'];
                                        }

                                    $column_nobukti = $nobukti."\n";
                                    $column_kodeakun = $kodeakun."\n";
                                    $column_uraian = $uraian."\n";
                                    $column_ref = $ref."\n";
                                    $column_debet = $debet."\n";
                                    $column_kredit = $kredit."\n";

                                    $lo->SetX(30);
									$lo->Cell(15,6,$column_nobukti,1,'L');
									$lo->SetX(45);
									$lo->Cell(20,6,$column_kodeakun,1,'L');
									$lo->SetX(65);
									$lo->Cell(75,6,$column_uraian,1,'L');
									$lo->SetX(140);
									$lo->Cell(10,6,$column_ref,1,'L');
									$lo->SetX(150);
									$lo->Cell(25,6,$column_debet,1,'L');
									$lo->SetX(175);
									$lo->Cell(25,6,$column_kredit,1,'L');
									$lo->Ln();

									$Y_Table_Position = $Y_Table_Position+6;
                                }
                                }


		//kolom surplus start

			// $column_surplussaldo = $xend."\n";

			// $lo->SetFillColor(170,209,120);

			// $lo->SetY($Y_Table_Position);
			// $lo->SetX(15);
			// $lo->Cell(130,6,"SURPLUS/DEFISIT-LRA",1,0,'L',1);

			// $lo->SetY($Y_Table_Position);
			// $lo->SetX(145);
			// $lo->Cell(50,6,$column_surplussaldo,1,0,'R',1);
			// $lo->Ln();

			//kolom surplus end
			

//Now show the columns



	$lo->Output('Jurnal Umum_'.$nim.'.pdf','D');
	}else{
		$lo->AddPage();
		$lo->SetFont('Arial','B',10);
		$lo->SetY(10);
		$lo->SetX(15);
		$lo->Cell(45,10,"Data Tidak Tersedia",0,0,'C');
		$lo->Output('Jurnal_Umum_'.$nim.'.pdf','D');
	}


}
?>