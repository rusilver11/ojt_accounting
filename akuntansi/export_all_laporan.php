<?php
session_start();
require('fpdf17/fpdf.php');
include 'koneksi.php';

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

$idsoal = $_SESSION['id'];
$nim = $_SESSION['username'];

$query1 = mysqli_query($connect, "SELECT bukubesar.tgl, UCASE(pertanyaan.skpd) AS skpd, mahasiswa.nama FROM bukubesar, pertanyaan, mahasiswa WHERE bukubesar.idsoal = pertanyaan.idpertanyaan AND bukubesar.nim = mahasiswa.username AND pertanyaan.idpertanyaan = '$idsoal' AND mahasiswa.username = '$nim' LIMIT 1;");
$row1 = mysqli_fetch_assoc($query1);
$skpd = $row1["skpd"];
$date = date_parse_from_format("Y-m-d", $row1['tgl']);
$tahun = "$date[year]";

$nama = $row1['nama'];
$column_skpd = $column_skpd.$skpd."\n";
$column_tahun = $column_tahun.$tahun."\n";



//Create a new PDF file
 //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
//$pdf->Image('../foto/logo.png',10,10,-175);

$pdf->SetFont('Arial','',10);
$pdf->SetY(10);
$pdf->SetX(15);
$pdf->Cell(60,10,"NIM : ".$nim,0,0,'C');
$pdf->SetY(10);
$pdf->SetX(75);
$pdf->Cell(60,10,"Nama : ".$nama,0,0,'C');
$pdf->SetY(10);
$pdf->SetX(135);
$pdf->Cell(60,10,"Jurusan : Akuntansi",0,0,'C');

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

$pdf->SetFont('Arial','',10);

$o = 0;
$p = 0;
$query3 = "select UCASE(kategori) as kategori1, kategori from kategori where laporan = 'Laporan Realisasi Anggaran' AND nim = '$nim' AND idsoal = '$idsoal' GROUP BY kategori ORDER BY idkategori";
$result3 = mysqli_query($connect, $query3);
while($row3 = mysqli_fetch_assoc($result3)){
    $kategori = $row3["kategori1"];
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
	
	$n = 0;
	$s = 0;
	$query4 = "select idkategori,  UCASE(subkategori) as subkategori from kategori where laporan = 'Laporan Realisasi Anggaran' AND kategori = '$kategori' AND nim = '$nim' AND idsoal = '$idsoal'";
	$result4 = mysqli_query($connect, $query4);
	while($row4 = mysqli_fetch_assoc($result4)){
		$subkategori = $row4['subkategori'];
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
		
		$idkat = $row4['idkategori'];
		$m = 0;
		$k = 0;
		$query5 = "SELECT akun.*, bukubesar.* FROM bukubesar, akun, kategori WHERE akun.`idkategori` = '$idkat' AND akun.kodeakun = bukubesar.kodeakun AND akun.nim = '$nim' AND akun.idsoal = '$idsoal' GROUP BY bukubesar.tgl";
		$result5 = mysqli_query($connect, $query5);
		while($row5 = mysqli_fetch_assoc($result5)){
			$kodeakun = $row5['kodeakun'];
			$tgl = $row5['tgl'];
			$namaakun = $row5['namaakun'];
			$column_namaakun = $namaakun."\n";
			
			$pdf->SetY($Y_Table_Position);
			$pdf->SetX(15);
			$pdf->Cell(100,6,'   '.$column_namaakun,1,'L');
			
			$query16 = mysqli_query($connect, "SELECT * FROM anggaran WHERE kodeakun = '$kodeakun'");
			$row16 = mysqli_fetch_assoc($query16);
			$nominal = $row16['nominal'];
			$idanggaran = $row16['idanggaran'];
			if($nominal == 0){
				$nominals = "";
			}else{
				$nominals = number_format($nominal)."";
			}
			$column_anggaran = $nominals."\n";
			
			$pdf->SetY($Y_Table_Position);
			$pdf->SetX(115);
			$pdf->Cell(40,6,$column_anggaran,1,'R');
			
			$nominalk = $nominal+$k;
			$k = $nominalk;
			if($k == 0){
				$kk = "";
			}else{
				$kk = number_format($k)."";
			}
			$query51 = "SELECT MAX(tgl), saldo FROM bukubesar WHERE tgl = '$tgl' AND kodeakun = '$kodeakun' AND nim = '$nim' AND idsoal = '$idsoal'";
			$result51 = mysqli_query($connect, $query51);
			$row51 = mysqli_fetch_assoc($result51);
			if($row51['saldo'] < 0){
				$saldo = $row51['saldo']*(-1);
			}else{
				$saldo = $row51['saldo'];
			}
			$saldoformat = number_format($saldo)."";
			$column_saldo = $saldoformat."\n";
			
			$pdf->SetY($Y_Table_Position);
			$pdf->SetX(155);
			$pdf->Cell(40,6,$column_saldo,1,0,'R');
			
			$pdf->Ln();
			
			$Y_Table_Position = $Y_Table_Position+6;
			
			$saldom = $saldo+$m;
			$m = $saldom;
			$r = number_format($m)."";
		}
		$column_jumlahsaldosubkategori = $r."\n";
		$column_jumlahanggaransubkategori = $kk."\n";
		
		$pdf->SetFillColor(225,245,254);
		
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
		
		$jml = $m+$n;
		$n = $jml;
		$jmls = $k+$s;
		$s = $jmls;
		if($s == 0){
			$sk = "";
		}else{
			$sk = number_format($s)."";
		}
		$q = number_format($n)."";
	}
	$column_jumlahsaldokategori = $q."\n";
	$column_jumlahanggarankategori = $sk."\n";
	
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
	
	$jmlakhir = $n-$o;
	$o = $jmlakhir;
	$jmlp = $s-$p;
	$p = $jmlp;
	if($p == 0){
		$ps = "";
	}else{
		$ps = number_format($p)."";
	}
	$t = number_format($o)."";
}
$column_surplussaldo = $t."\n";
$column_surplusanggaran = $ps."\n";

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

//Now show the columns




$lo = new FPDF('P','mm', 'A4');

$idsoal = $_SESSION['id'];
$nim = $_SESSION['username'];

$query1 = mysqli_query($connect, "SELECT bukubesar.tgl, UCASE(pertanyaan.skpd) AS skpd, mahasiswa.nama FROM bukubesar, pertanyaan, mahasiswa WHERE bukubesar.idsoal = pertanyaan.idpertanyaan AND bukubesar.nim = mahasiswa.username AND pertanyaan.idpertanyaan = '$idsoal' AND mahasiswa.username = '$nim' LIMIT 1;");
$row1 = mysqli_fetch_assoc($query1);
$skpd = $row1["skpd"];
$date = date_parse_from_format("Y-m-d", $row1['tgl']);
$tahun = "$date[year]";

$nama = $row1['nama'];
$column_skpd = $column_skpd.$skpd."\n";
$column_tahun = $column_tahun.$tahun."\n";



//Create a new PDF file
 //L For Landscape / P For Portrait
$lo->AddPage();

//Menambahkan Gambar
//$lo->Image('../foto/logo.png',10,10,-175);

$lo->SetFont('Arial','',10);
$lo->SetY(10);
$lo->SetX(15);
$lo->Cell(60,10,"NIM : ".$nim,0,0,'C');
$lo->SetY(10);
$lo->SetX(75);
$lo->Cell(60,10,"Nama : ".$nama,0,0,'C');
$lo->SetY(10);
$lo->SetX(135);
$lo->Cell(60,10,"Jurusan : Akuntansi",0,0,'C');

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

$lo->SetFont('Arial','',10);

$o = 0;
$query3 = "select UCASE(kategori) as kategori1, kategori from kategori where laporan = 'Laporan Operasional' AND nim = '$nim' AND idsoal = '$idsoal' GROUP BY kategori ORDER BY idkategori";
$result3 = mysqli_query($connect, $query3);
while($row3 = mysqli_fetch_assoc($result3)){
    $kategori = $row3["kategori1"];
    $column_kategori = $kategori."\n";
	
	$lo->SetY($Y_Table_Position);
	$lo->SetX(15);
	$lo->Cell(130,6,$column_kategori,1,'L');

	$lo->SetY($Y_Table_Position);
	$lo->SetX(145);
	$lo->Cell(50,6,"",1,'R');
	
	$Y_Table_Position = $Y_Table_Position+6;
	
	$n = 0;
	$query4 = "select idkategori,  UCASE(subkategori) as subkategori from kategori where laporan = 'Laporan Operasional' AND kategori = '$kategori' AND nim = '$nim' AND idsoal = '$idsoal'";
	$result4 = mysqli_query($connect, $query4);
	while($row4 = mysqli_fetch_assoc($result4)){
		$subkategori = $row4['subkategori'];
		$column_subkategori = $subkategori."\n";

		$lo->SetY($Y_Table_Position);
		$lo->SetX(15);
		$lo->Cell(130,6,'   '.$column_subkategori,1,'L');

		$lo->SetY($Y_Table_Position);
		$lo->SetX(145);
		$lo->Cell(50,6,"",1,'R');
		
		$Y_Table_Position = $Y_Table_Position+6;
		
		$idkat = $row4['idkategori'];
		$m = 0;
		$query5 = "SELECT akun.*, bukubesar.* FROM bukubesar, akun, kategori WHERE akun.`idkategori` = '$idkat' AND akun.kodeakun = bukubesar.kodeakun AND akun.nim = '$nim' AND akun.idsoal = '$idsoal' GROUP BY bukubesar.tgl";
		$result5 = mysqli_query($connect, $query5);
		while($row5 = mysqli_fetch_assoc($result5)){
			$kodeakun = $row5['kodeakun'];
			$tgl = $row5['tgl'];
			$namaakun = $row5['namaakun'];
			$column_namaakun = $namaakun."\n";
			
			$lo->SetY($Y_Table_Position);
			$lo->SetX(15);
			$lo->Cell(130,6,'   '.$column_namaakun,1,'L');
			
			$query51 = "SELECT MAX(tgl), saldo FROM bukubesar WHERE tgl = '$tgl' AND kodeakun = '$kodeakun' AND nim = '$nim' AND idsoal = '$idsoal'";
			$result51 = mysqli_query($connect, $query51);
			$row51 = mysqli_fetch_assoc($result51);
			if($row51['saldo'] < 0){
				$saldo = $row51['saldo']*(-1);
			}else{
				$saldo = $row51['saldo'];
			}
			$saldoformat = number_format($saldo)."";
			$column_saldo = $saldoformat."\n";
			
			$lo->SetY($Y_Table_Position);
			$lo->SetX(145);
			$lo->Cell(50,6,$column_saldo,1,0,'R');
			
			$lo->Ln();
			
			$Y_Table_Position = $Y_Table_Position+6;
			
			$saldom = $saldo+$m;
			$m = $saldom;
			$r = number_format($m)."";
		}
		$column_jumlahsaldosubkategori = $r."\n";
		
		$lo->SetFillColor(225,245,254);
		
		$lo->SetY($Y_Table_Position);
		$lo->SetX(15);
		$lo->Cell(130,6,'   JUMLAH '.$column_subkategori,1,0,'L',1);
		
		$lo->SetY($Y_Table_Position);
		$lo->SetX(145);
		$lo->Cell(50,6,$column_jumlahsaldosubkategori,1,0,'R',1);
		$lo->Ln();
		
		$Y_Table_Position = $Y_Table_Position+6;
		
		$jml = $m+$n;
		$n = $jml;
		$q = number_format($n)."";
	}
	$column_jumlahsaldokategori = $q."\n";
	
	$lo->SetFillColor(106,210,235);
	
	$lo->SetY($Y_Table_Position);
	$lo->SetX(15);
	$lo->Cell(130,6,'JUMLAH '.$column_kategori,1,0,'L',1);

	$lo->SetY($Y_Table_Position);
	$lo->SetX(145);
	$lo->Cell(50,6,$column_jumlahsaldokategori,1,0,'R',1);
	$lo->Ln();
	
	$Y_Table_Position = $Y_Table_Position+6;
	
	$jmlakhir = $n-$o;
	$o = $jmlakhir;
	$t = number_format($o)."";
}
$column_surplussaldo = $t."\n";

$lo->SetFillColor(170,209,120);

$lo->SetY($Y_Table_Position);
$lo->SetX(15);
$lo->Cell(130,6,"SURPLUS/DEFISIT-LRA",1,0,'L',1);

$lo->SetY($Y_Table_Position);
$lo->SetX(145);
$lo->Cell(50,6,$column_surplussaldo,1,0,'R',1);
$lo->Ln();

$ekuitas->AddPage();

//Menambahkan Gambar
//$ekuitas->Image('../foto/logo.png',10,10,-175);

$ekuitas->SetFont('Arial','',10);
$ekuitas->SetY(10);
$ekuitas->SetX(15);
$ekuitas->Cell(60,10,"NIM : ".$nim,0,0,'C');
$ekuitas->SetY(10);
$ekuitas->SetX(75);
$ekuitas->Cell(60,10,"Nama : ".$nama,0,0,'C');
$ekuitas->SetY(10);
$ekuitas->SetX(135);
$ekuitas->Cell(60,10,"Jurusan : Akuntansi",0,0,'C');

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

$ekuitas->SetFont('Arial','',10);

$m = 0;
		$query4 = "select idkategori,  UCASE(subkategori) as subkategori from kategori where laporan = 'Neraca' AND kategori LIKE '%ekuitas%' AND nim = '$nim' AND idsoal = '$idsoal' ORDER BY subkategori";
		$result4 = mysqli_query($connect, $query4);
		while($row4 = mysqli_fetch_assoc($result4)){
		$subkategori = $row4['subkategori'];
		$column_subkategori = $subkategori."\n";

		$ekuitas->SetY($Y_Table_Position);
		$ekuitas->SetX(15);
		$ekuitas->Cell(130,6,$column_subkategori,1,'L');
		
		$idkat = $row4['idkategori'];
		$query5 = "SELECT akun.*, bukubesar.* FROM bukubesar, akun, kategori WHERE akun.`idkategori` = '$idkat' AND akun.kodeakun = bukubesar.kodeakun AND akun.nim = '$nim' AND akun.idsoal = '$idsoal' ORDER BY bukubesar.tgl DESC LIMIT 1";
		$result5 = mysqli_query($connect, $query5);
		$row5 = mysqli_fetch_assoc($result5);
		$kodeakun = $row5['kodeakun'];
		$tgl = $row5['tgl'];
		if($kodeakun != ""){
			$query51 = "SELECT MAX(tgl), saldo FROM bukubesar WHERE tgl = '$tgl' AND kodeakun = '$kodeakun' AND nim = '$nim' AND idsoal = '$idsoal'";
			$result51 = mysqli_query($connect, $query51);
			$row51 = mysqli_fetch_assoc($result51);
			if($row51['saldo'] < 0){
				$saldo = $row51['saldo']*(-1);
			}else{
				$saldo = $row51['saldo'];
			}
		}else{
			$saldo = 0;
		}
			$saldoformat = number_format($saldo)."";
			$column_saldo = $saldoformat."\n";
			
			$ekuitas->SetY($Y_Table_Position);
			$ekuitas->SetX(145);
			$ekuitas->Cell(50,6,$column_saldo,1,0,'R');
			
			$ekuitas->Ln();
			
			$Y_Table_Position = $Y_Table_Position+6;
			
			$saldom = $saldo+$m;
			$m = $saldom;
			$r = number_format($m)."";
		}
		$column_jumlahsaldosubkategori = $r."\n";
		
		$ekuitas->SetFillColor(170,209,120);
		
		$ekuitas->SetY($Y_Table_Position);
		$ekuitas->SetX(15);
		$ekuitas->Cell(130,6,'JUMLAH EKUITAS',1,0,'L',1);
		
		$ekuitas->SetY($Y_Table_Position);
		$ekuitas->SetX(145);
		$ekuitas->Cell(50,6,$column_jumlahsaldosubkategori,1,0,'R',1);
		$ekuitas->Ln();

//Now show the columns
$pdf->Output('pdf/Laporan Realisasi Anggaran_'.$nim.'.pdf','F');
$lo->Output('pdf/Laporan Operasional_'.$nim.'.pdf','F');
$ekuitas->Output('pdf/Laporan Perubahan Ekuitas_'.$nim.'.pdf','F');

	if(file_exists('zip/Laporan_'.$nim.'.zip')){
		unlink('zip/Laporan_'.$nim.'.zip');
	}
    $zip = new ZipArchive();
    $filename = "zip/Laporan_".$nim.".zip";

    if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
        exit("cannot open <$filename>\n");
    }

    $dir = 'pdf/';

    // Create zip
    createZip($zip,$dir);

    $zip->close();

// Create zip
function createZip($zip,$dir){
    if (is_dir($dir)){

        if ($dh = opendir($dir)){
            while (($file = readdir($dh)) !== false){
                
                // If file
                if (is_file($dir.$file)) {
                    if($file != '' && $file != '.' && $file != '..'){
                        
                        $zip->addFile($dir.$file);
                    }
                }else{
                    // If directory
                    if(is_dir($dir.$file) ){

                        if($file != '' && $file != '.' && $file != '..'){

                            // Add empty directory
                            $zip->addEmptyDir($dir.$file);

                            $folder = $dir.$file.'/';
                            
                            // Read data of the folder
                            createZip($zip,$folder);
                        }
                    }
                    
                }
                    
            }
            closedir($dh);
        }
    }
}

// Download Created Zip file

    if (file_exists($filename)) {
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="'.basename($filename).'"');
        header('Content-Length: ' . filesize($filename));

        flush();
        readfile($filename);
        // delete file
		unlink('pdf/Laporan Operasional_'.$nim.'.pdf');
		unlink('pdf/Laporan Realisasi Anggaran_'.$nim.'.pdf');
		unlink('pdf/Laporan Perubahan Ekuitas'.$nim.'.pdf');
    }
?>