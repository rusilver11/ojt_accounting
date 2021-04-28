<?php
include "koneksi.php";
$nama=$_POST['nama'];
$username=$_POST['username'];
$password=$_POST['password'];

$query = mysqli_query($connect,"INSERT INTO user (username,password,nama) VALUES('$username','$password','$nama')");
//echo "Form Submitted Succesfully";
?>