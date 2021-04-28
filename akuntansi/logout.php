<?php
session_start();
if(session_destroy()) // Menghapus Sessions
{
	header("location: ../akuntansi/candabirawa.php"); // Langsung mengarah ke Home index.php
}
?>