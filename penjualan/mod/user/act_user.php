<?php
	session_start();
	include"../../lib/conn.php";

	if(!isset($_SESSION['login_user'])){
		header('location: ../../login.php'); // Mengarahkan ke Home Page
	}

	if(isset($_SESSION['level']) AND $_SESSION['level'] <> 'admin')
	{
		echo"<div class='w3-container w3-red'><p>Dilarang mengakses file ini.</p></div>";
		die();
	}

	if(isset($_GET['mod']) && isset($_GET['act']))
	{
		$mod = $_GET['mod'];
		$act = $_GET['act'];
	}
	else
	{
		$mod = "";
		$act = "";
	}

	if ($mod == "user" AND $act == "edit") {
		if(isset($_POST['master']))
		{
			$master = implode(", ", $_POST['master']);	
		}
		else
		{
			$master = "";
		}

		if(empty($_POST['passwd']))
		{
			mysqli_query($conn,"UPDATE tb_user SET nama_lengkap = '$_POST[nama_lengkap]',
										usernm = '$_POST[usernm]',
										level = '$_POST[level]',
										akses_master = '$master'
						WHERE id_user = '$_POST[id]'") ;
			// flash('example_message', '<p>Berhasil menambah data user.</p>' );

			echo"<script>
				window.history.go(-2);
			</script>";
		}
		else
		{
			if ($_POST['passwd'] == $_POST['rpasswd']) {
				$pass = md5($_POST['passwd']);
				mysqli_query($conn,"UPDATE tb_user SET nama_lengkap = '$_POST[nama_lengkap]',
										usernm = '$_POST[usernm]',
										passwd = '$pass',
										level = '$_POST[level]',
										akses_master = '$master'
						WHERE id_user = '$_POST[id]'") ;
				// flash('example_message', '<p>Berhasil mengubah data user.</p>' );

				echo"<script>
					window.history.go(-2);
				</script>";
			}
			else
			{
				// flash('example_class', '<p>Password tidak sama..</p>', 'w3-red');

				echo"<script>
					window.history.back();
				</script>";
			}
		}
	}
	elseif($mod == "user" AND $act == "simpan")
	{
		if(!empty($_POST['passwd']))
		{
			if ($_POST['passwd'] == $_POST['rpasswd']) {
				$pass = md5($_POST['passwd']);
				mysqli_query($conn,"INSERT INTO tb_user(nama_lengkap,
										usernm,
										passwd,
										level)
									VALUES('$_POST[nama_lengkap]',
											'$_POST[usernm]',
											'$pass',
											'$_POST[level]')") ;
				// flash('example_message', '<p>Berhasil menambah data user.</p>' );

				echo"<script>
					window.history.go(-2);
				</script>";
			}
			else
			{
				// flash('example_class', '<p>Password tidak sama..</p>', 'w3-red');

				echo"<script>
					window.history.back();
				</script>";
			}
		}
		else
		{
			// flash('example_class', '<p>Password Kosong</p>', 'w3-yellow');

			echo"<script>
				window.history.back();
			</script>";
		}
		
	}
	elseif ($mod == "user" AND $act == "hapus") 
	{
		mysqli_query($conn,"DELETE FROM tb_user WHERE id_user = '$_GET[id]'");
		// flash('example_message', '<p>Berhasil menghapus data biaya kuliah.</p>' );
		echo"<script>
			window.history.back();
		</script>";	
	}

?>