<?php
include "koneksi.php";
$idkategori = $_REQUEST["idkategori"];
$laporan = $_REQUEST["laporan"];
$kategori = $_REQUEST["kategori"];
$subkategori = $_REQUEST["subkategori"];

$kueris = mysqli_query($connect,"SELECT * FROM subkategori WHERE idkategori='$idkategori'");
while ($row = mysqli_fetch_array($kueris)){
	$kat = $row['kategori'];
	if($kat == $kategori){
		$idsub = $row['idsubkategori'];
	}else{
		



if($kategori == '3' && $laporan == 'Laporan Perubahan Ekuitas'){
	$kueri = mysqli_query($connect,"SELECT MAX(idsubkategori) as idsubkategori FROM subkategori WHERE laporan = '$laporan' AND kategori='$kategori'");
}else if($kategori == '3' && $laporan == 'Neraca'){
	$kueri = mysqli_query($connect,"SELECT MAX(idsubkategori) as idsubkategori FROM subkategori WHERE laporan = '$laporan' AND kategori='$kategori'");
}else{
	$kueri = mysqli_query($connect,"SELECT MAX(idsubkategori) as idsubkategori FROM subkategori WHERE kategori='$kategori'");
}

		while ($data = mysqli_fetch_array($kueri)){
			$idsub = $data['idsubkategori'];
			if($idsub != null || $idsub != ""){
				$max = substr($idsub, 1);
				$max = $max+1;
				$idsub = $kategori."".$max;
			}else{
				$idsub = $kategori."1";
			}
		}
	}
}
mysqli_query($connect, "UPDATE subkategori SET laporan='$laporan', idsubkategori = '$idsub', kategori='$kategori', subkategori='$subkategori' WHERE idkategori='$idkategori'");
//header('Location: dosen_data_dosen.php');
echo "Form Updated Succesfullya";
?>