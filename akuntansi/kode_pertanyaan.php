<?php session_start();
include 'koneksi.php';
if(empty(@$_SESSION['username'])){
		header("Location:login.php");
}else if(@$_SESSION['id'] != null){
        header("Location:mahasiswa_data_akun.php");
}else{
?>
<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

      <title>LAPORAN KEUANGAN UMKM</title>

        <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="img/favicon.png">
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
        <!-- Page Wrapper -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
            Available classes:

            'page-loading'      enables page preloader
        -->
        <div id="page-wrapper">
            <!-- Preloader -->
            <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
            <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
            <div class="preloader themed-background">
                <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
                <div class="inner">
                    <h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>
                    <div class="preloader-spinner hidden-lt-ie10"></div>
                </div>
            </div>
          
                <div id="main-container">
                  
                    <?php
					include "sidebar/header.php";
					?>
                    <!-- END Header -->

                    <!-- Page content -->
                    <div id="page-content">
					
                       
					   <div class="content-header content-header-media">
                             <div class="header-section">
                                <div class="row">
                                    <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                        <h1>Selamat Datang !!<br><strong> Mahasiswa</strong></h1>
                                    </div>      
                                </div>
                            </div>
                            <img src="img/63944451-f5b9-4682-aea8-4c8976ddd8d1.jpg" alt="header image" class="animation-pulseSlow">
                        </div>
						
						
                        <div class="block">
                            <!-- Progress Bars Wizard Title -->
                            <div class="block-title">
                                <h2><strong>Pertanyaan</strong> </h2>
                            </div>
                            <!-- END Progress Bar Wizard Title -->

                            <!-- Progress Bar Wizard Content -->
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-1">
                                    <div class="block-section">
                                        <h3 class="sub-header text-center"><strong>Silahkan Isi Kode Pertanyaan</strong></h3>
                                        <p class="clearfix" style="text-align:center"><span class="text-success"><strong>KODE PERTANYAAN</strong></span></p>
                                        <p>
                                        
                                            <form action="" method="post" class="form-horizontal form-bordered" >
                                           

										   <div class="form-group">
                                                <label class="col-md-4 control-label" for="example-email"></label>
                                                <div class="col-md-4">
                                                    <input type="text" id="idpertanyaan" name="idpertanyaan" class="form-control" placeholder="xxxxx">
                                         
                                                    <br>
                                                    
                                                    <button type="submit" name="submit" id="submit" class="btn btn-block btn-primary">Submit</button>
                                                </div>
                                            </div>
											
											
											
											
											
					
											
                                         </form>
                                         
                                         
                                         
                                         <?php
										 if (isset($_POST["submit"])) {
										 $idpertanyaan = $_POST['idpertanyaan'];
										 $query2 = "SELECT pertanyaan FROM pertanyaan WHERE idpertanyaan = '$idpertanyaan' and status = 'aktif'";
						  				 $result2 = mysqli_query($connect, $query2);
										 if($result2->num_rows == 0) {
     									 echo "<p align='center' style='color:red'>Pertanyaan Tidak Aktif </p>";
										 echo "<p align='center' class='text-success'>Harap Menghubungi Admin atau Dosen </p>";
										 } else {
     								     echo "<script type='text/javascript'> window.location = 'mahasiswa_data_proses_idsoal.php?a=$idpertanyaan'</script>";
}
										 }
										 ?>
                                         
                                         
                                         
                                        
                                    </div>
                                </div>
                                
                            </div>
                            <!-- END Progress Bar Wizard Content -->
                        </div>
                       
                    </div>
                    <!-- END Page Content -->

                    <!-- Footer -->
                    <footer class="clearfix">
                        <div class="pull-right">
                            Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>
                        </div>
                        <div class="pull-left">
                            <span id="year-copy"></span> &copy; <a href="http://goo.gl/TDOSuC" target="_blank">ProUI 3.8</a>
                        </div>
                    </footer>
                    <!-- END Footer -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

        <!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
        <div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header text-center">
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> Settings</h2>
                    </div>
                    <!-- END Modal Header -->

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form action="index.html" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
                            <fieldset>
                                <legend>Vital Info</legend>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Username</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static">Admin</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-email">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" id="user-settings-email" name="user-settings-email" class="form-control" value="admin@example.com">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-notifications">Email Notifications</label>
                                    <div class="col-md-8">
                                        <label class="switch switch-primary">
                                            <input type="checkbox" id="user-settings-notifications" name="user-settings-notifications" value="1" checked>
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Password Update</legend>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-password">New Password</label>
                                    <div class="col-md-8">
                                        <input type="password" id="user-settings-password" name="user-settings-password" class="form-control" placeholder="Please choose a complex one..">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-repassword">Confirm New Password</label>
                                    <div class="col-md-8">
                                        <input type="password" id="user-settings-repassword" name="user-settings-repassword" class="form-control" placeholder="..and confirm it!">
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group form-actions">
                                <div class="col-xs-12 text-right">
                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- END Modal Body -->
                </div>
            </div>
        </div>
        <!-- END User Settings -->

        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        <script src="js/vendor/jquery.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/app.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="js/pages/formsWizard.js"></script>
        <script>$(function(){ FormsWizard.init(); });</script>
    </body>
</html>
<?php
}
?>