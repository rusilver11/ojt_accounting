<?php
session_start();
if(session_destroy()) // Menghapus Sessions
{
	header("location:candabirawa.php"); // Langsung mengarah ke Home index.php
}
?>