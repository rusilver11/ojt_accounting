<?php
session_start();
include "koneksi.php";
$laporan=$_POST['laporan'];
$kategori=$_POST['kategori'];
$subkategori=$_POST['subkategori'];

if($kategori == '3' && $laporan == 'Laporan Perubahan Ekuitas'){
	$kueri = mysqli_query($connect,"SELECT MAX(idsubkategori) as idsubkategori FROM subkategori WHERE laporan = '$laporan' AND kategori='$kategori'");
}else if($kategori == '3' && $laporan == 'Neraca'){
	$kueri = mysqli_query($connect,"SELECT MAX(idsubkategori) as idsubkategori FROM subkategori WHERE laporan = '$laporan' AND kategori='$kategori'");
}else{
	$kueri = mysqli_query($connect,"SELECT MAX(idsubkategori) as idsubkategori FROM subkategori WHERE kategori='$kategori'");
}

while ($data = mysqli_fetch_array($kueri)){
	
	$idsub = $data['idsubkategori'];
	if($idsub != "" || $idsub != 0 || $idsub!= null){
		$max = substr($idsub, 1);
		$max = $max+1;
		$idsub = $kategori."".$max;
	}else{
		$idsub = $kategori."1";
	}
}

$query = mysqli_query($connect,"INSERT INTO subkategori (laporan,kategori,idsubkategori,subkategori) VALUES('$laporan','$kategori','$idsub','$subkategori')");
//echo "Form Submitted Succesfully";
?>