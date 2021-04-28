<?php
include "koneksi.php";
$username = base64_decode($_REQUEST["username"]);
$kueri = mysqli_query($connect,"SELECT * FROM admin WHERE username='$username'");
$data = mysqli_fetch_array($kueri); 
$return=array("username"=>$data["username"],"nama"=>$data["nama"],"password"=>$data["password"]);
echo json_encode($return);
?>
