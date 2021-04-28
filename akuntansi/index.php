<?php session_start();
include "koneksi.php";
if(@$_SESSION['username']) {
	$username1 = ($_SESSION['username']);

		$ceklogin = mysqli_query($connect, "SELECT * FROM admin WHERE username =
		'$username1'");
		$rows=mysqli_fetch_array($ceklogin);
		if($rows['username'] == $username1){
		  @$_SESSION["username"]=$rows['username'];
		  @$_SESSION["nama"]=$rows['nama'];
		  echo "<script type='text/javascript'> window.location.href ='index_admin.php'; </script>";
					
		  } 
						
			   	  else{
					  $ceklogin2 = mysqli_query($connect, "SELECT * FROM user WHERE username =
					  '$username1'");
					  $rows2=mysqli_fetch_array($ceklogin2);
					  if($rows2['username'] == $username1){
					   @$_SESSION["username"]=$rows2['username'];
					   @$_SESSION["nama"]=$rows2['nama'];
					   echo "<script type='text/javascript'> window.location.href ='mahasiswa_kode_pertanyaan.php'; </script>";
									
						}else{
						 ?>
						 <p align="center" style="color:#FF0004"><?php echo "<script>alert('Jangan coba-coba')</script>";?></p>
						 <?php
							 }
						
				}
	//header("Location:admin_data_mahasiswa.php");
}else{
?>
<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>PD. Canda Birawa</title>

        <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="img/logobar.png">
        <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
        <link rel="apple-touch-icon" href="img/icon180.png" sizes="180x180">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="css/main.css">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="js/vendor/modernizr.min.js"></script>
    </head>
    <body>
        <!-- Login Full Background -->
        <!-- For best results use an image with a resolution of 1280x1280 pixels (prefer a blurred image for smaller file size) -->
        <img src="img/placeholders/backgrounds/coy.jpg" alt="Login Full Background" class="full-bg animation-pulseSlow">
        <!-- END Login Full Background -->

        <!-- Login Container -->
        <div id="login-container" class="animation-fadeIn">
            <!-- Login Title -->
            <div class="login-title text-center">
                <h1><strong>APLIKASI AKUNTANSI</strong><br>
				<small>Unit Pupuk</small></h1>
            </div>
            <!-- END Login Title -->

            <!-- Login Block -->
            <div class="block push-bit">
                <!-- Login Form -->
                <form action="" method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                <input type="text" id="username" name="username" class="form-control input-lg" placeholder="Username" required="yes">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input type="password" id="password" name="password" class="form-control input-lg" placeholder="Password" required="yes">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">				
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-block btn-primary">Login </button>
                        </div>
                    </div>
					
					<?php
					  if (isset($_POST["submit"])) {
						include "koneksi.php";
						$username = ($_POST['username']);
						$pass = ($_POST['password']);
						

						$login = mysqli_query($connect, "SELECT * FROM admin WHERE username =
						'$username' AND password='$pass'");
						$row=mysqli_fetch_array($login);
						if($row['username'] == $username AND $row['password'] == $pass){
						  @$_SESSION["username"]=$row['username'];
						  @$_SESSION["nama"]=$row['nama'];
						  echo "<script type='text/javascript'> window.location.href ='index_admin.php'; </script>";
						
						} 
						
								else{

									  $login2 = mysqli_query($connect, "SELECT * FROM user WHERE username =
									  '$username' AND password='$pass'");
									  $row2=mysqli_fetch_array($login2);
									  if($row2['username'] == $username AND $row2['password'] == $pass){
									   @$_SESSION["username"]=$row2['username'];
									   @$_SESSION["nama"]=$row2['nama'];
									   echo "<script type='text/javascript'> window.location.href ='index_mahasiswa.php'; </script>";
									
									  }else{
										?>
										<p align="center" style="color:#FF0004"><?php echo "<script>alert('Username atau Password Salah')</script>";?></p>
										<?php
										}
									  }
						}
						
					?>
					
					
                </form>
                           
			
			</div>
            <!-- END Login Block -->
        </div>
        <!-- END Login Container -->
		<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        <script src="js/vendor/jquery.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/app.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="js/pages/login.js"></script>
        <script>$(function(){ Login.init(); });</script>
    </body>
</html>
<?php
}
?>