<?php
session_start();
include "koneksi.php";
$uraian=$_POST['uraian'];
$nominal=$_POST['nominal'];
$idsoal = $_SESSION['id'];
$nim = $_SESSION['username'];

$querys = mysqli_query($connect, "SELECT * FROM anggaran WHERE kodeakun = '$uraian'");
$ada = mysqli_num_rows($querys);
if($ada > 0){
	echo "Maaf uraian yang anda masukkan mempunyai nominal anggaran";
}else{
	$query = mysqli_query($connect,"INSERT INTO anggaran (idanggaran, kodeakun, nominal, nim, idsoal) VALUES('','$uraian','$nominal','$nim','$idsoal')");
}
//echo "Form Submitted Succesfully";
?>