<?php session_start();
include 'koneksi.php';
if(empty(@$_SESSION['username'])){
		header("Location:login.php");

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
		<script src="js/vendor/jquery.min.js"></script>
		
    </head>
	
	
	
	
    <body>
        <!-- Page Wrapper -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
            Available classes:

            'page-loading'      enables page preloader
        -->
        <div id="page-wrapper">
            
            <div class="preloader themed-background">
                <h1 class="push-top-bottom text-light text-center"><strong>AA</strong>UI</h1>
                <div class="inner">
                    <h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>
                    <div class="preloader-spinner hidden-lt-ie10"></div>
                </div>
            </div>
           

		   
		   
		   
            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
			
<!-- Sidebar --><!-- Sidebar --><!-- Sidebar --><!-- Sidebar --><!-- Sidebar --><!-- Sidebar --><!-- Sidebar --><!-- Sidebar --><!-- Sidebar --><!-- Sidebar -->
                 <?php
                include "sidebar/sidebar_admin.php";
				?>
                				
                <div id="main-container">
<!-- Header --><!-- Header --><!-- Header --><!-- Header --><!-- Header --><!-- Header --><!-- Header --><!-- Header --><!-- Header --><!-- Header -->                    
                   
                  <?php
					include "sidebar/header.php";
					?>
                    <!-- END Header -->

<!-- Page content --><!-- Page content --><!-- Page content --><!-- Page content --><!-- Page content --><!-- Page content --><!-- Page content -->
                  <div id="page-content">
					<div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class=""></i>Arus Kas<br><small>Lihat Arus Kas</small>
								<!--	<br>
									<br>
									<strong>Data admin</strong><br><small>Kelola Data admin</small> -->
                                </h1>
                            </div>
							</div>
							
						<ul class="breadcrumb breadcrumb-top">
                            
							<li>Data Arus Kas</li>
                            
                        </ul>
						
						
						
						
						
                        
                        <div class="block full">
                            <!-- All Products Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                </div>
                                <h2><strong>Arus Kas</strong></h2>
                            </div>
                            <!-- END All Products Title -->


							
							<div class="table-responsive">
                            	
                                <?php
								$query2 = "select tgl from transaksi LIMIT 1";
								$result2 = mysqli_query($connect, $query2);
								$row = mysqli_fetch_assoc($result2);
								$date = date_parse_from_format("Y-m-d", $row['tgl']);
								//output the bits
								$tgl = "$date[year]";
							?>
							
							
							<a href="export_PDF_neraca.php" title="Download" class="btn btn alert-danger">
								<i class="fa fa-download"></i> CETAK Arus Kas</a>
							<br>
							<br>
							
								
							
                            <!-- All Products Content -->
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
										<th class="text-left" width="100px"></th>
										<th class="text-left" colspan="2"></th>
										<th class="text-right"></th>
                                    </tr>
                                </thead>
								
								
								
                                <tbody>
                                	<tr>
                                		<td></td>
                                		<td class="text-left" colspan="2"><h5 style="font-weight: bold;">Arus Kas dari Aktivitas Operasional</h5></td>
                                		<td></td>
                                	</tr>

                                	<?php
                                	$waw1 = 0;
                                	$sqlakun1 = "SELECT * FROM akun WHERE aruskas = 'operasional'";
                                	$queryakun1 = mysqli_query($connect, $sqlakun1);
                                	while ($rowakun1 = mysqli_fetch_assoc($queryakun1)) {
                                		$kodeakun1 = $rowakun1['kodeakun'];
                                		$namaakun1 = $rowakun1['namaakun'];

                                		$querytgl1 = "SELECT MAX(tgl) as tgl FROM bukubesar WHERE kodeakun = '$kodeakun1'";
										$resultgl1 = mysqli_query($connect, $querytgl1);
										$rowtgl1 = mysqli_fetch_assoc($resultgl1);
										$tgl1 = $rowtgl1['tgl'];
										
										$querysaldo1 = "SELECT saldo FROM bukubesar WHERE tgl = '$tgl1' AND kodeakun = '$kodeakun1'";
										$resultsaldo1 = mysqli_query($connect, $querysaldo1);
										$rowsaldo1 = mysqli_fetch_assoc($resultsaldo1);
										$saldo1 = $rowsaldo1['saldo'];

                                	?>
                                	<tr>
                                		<td><?php echo $kodeakun1;?></td>
                                		<td class="text-left" colspan="2"><h5><?php echo $namaakun1;?></h5></td>
                                		<td class="text-right"><h5><?php echo number_format($saldo1)."";?></h5></td>
                                	</tr>
									                                	 
                                	<?php

                                	$waw1 = $saldo1 +$waw1;
                                	}
                                	?>

						                                	<tr>
										<td style="border-right:none;" width="6px" bgcolor="#e1f5fe"></td>
										<td bgcolor="#e1f5fe" colspan="2"><h5>Arus Kas bersih dari aktivitas Operasional</h5></td>
										<td class="text-right" bgcolor="#e1f5fe"><h5><?php echo number_format($waw1)."";?></h5></td>
									</tr>






                                	<tr>
                                		<td></td>
                                		<td class="text-left" colspan="2"><h5 style="font-weight: bold;">Arus Kas dari Aktivitas Investasi</h5></td>
                                		<td></td>
                                	</tr>
                                	<?php
                                	$waw2 = 0;
                                	$sqlakun2 = "SELECT * FROM akun WHERE aruskas = 'investasi'";
                                	$queryakun2 = mysqli_query($connect, $sqlakun2);
                                	while ($rowakun2 = mysqli_fetch_assoc($queryakun2)) {
                                		$kodeakun2 = $rowakun2['kodeakun'];
                                		$namaakun2 = $rowakun2['namaakun'];

                                		$querytgl2 = "SELECT MAX(tgl) as tgl FROM bukubesar WHERE kodeakun = '$kodeakun2'";
										$resultgl2 = mysqli_query($connect, $querytgl2);
										$rowtgl2 = mysqli_fetch_assoc($resultgl2);
										$tgl2 = $rowtgl2['tgl'];
										
										$querysaldo2 = "SELECT saldo FROM bukubesar WHERE tgl = '$tgl2' AND kodeakun = '$kodeakun2'";
										$resultsaldo2 = mysqli_query($connect, $querysaldo2);
										$rowsaldo2 = mysqli_fetch_assoc($resultsaldo2);
										$saldo2 = $rowsaldo2['saldo'];
                                	?>
									<tr>
                                		<td><?php echo $kodeakun2;?></td>
                                		<td class="text-left" colspan="2"><h5><?php echo $namaakun2;?></h5></td>
                                		<td class="text-right"><h5><?php echo number_format($saldo2)."";?></h5></td>
                                	</tr>
                                	<?php

                                	$waw2 = $saldo2 +$waw2;
                                	}
                                	?>

                                	<tr>
										<td style="border-right:none;" width="6px" bgcolor="#e1f5fe"></td>
										<td bgcolor="#e1f5fe" colspan="2"><h5>Arus Kas bersih dari aktivitas Investasi</h5></td>
										<td class="text-right" bgcolor="#e1f5fe"><h5><?php echo number_format($waw2)."";?></h5></td>
									</tr>
                                	<tr>
                                		<td></td>




										<td class="text-left" colspan="2"><h5 style="font-weight: bold;">Arus Kas dari Aktivitas Pendanaan</h5></td>
                                		<td></td>
                                	</tr>
                                	<?php
                                	$waw3 = 0;
                                	$sqlakun3 = "SELECT * FROM akun WHERE aruskas = 'pendanaan'";
                                	$queryakun3 = mysqli_query($connect, $sqlakun3);
                                	while ($rowakun3 = mysqli_fetch_assoc($queryakun3)) {
                                		$kodeakun3 = $rowakun3['kodeakun'];
                                		$namaakun3 = $rowakun3['namaakun'];

                                		$querytgl3 = "SELECT MAX(tgl) as tgl FROM bukubesar WHERE kodeakun = '$kodeakun3'";
										$resultgl3 = mysqli_query($connect, $querytgl3);
										$rowtgl3 = mysqli_fetch_assoc($resultgl3);
										$tgl3 = $rowtgl3['tgl'];
										
										$querysaldo3 = "SELECT saldo FROM bukubesar WHERE tgl = '$tgl3' AND kodeakun = '$kodeakun3'";
										$resultsaldo3 = mysqli_query($connect, $querysaldo3);
										$rowsaldo3 = mysqli_fetch_assoc($resultsaldo3);
										$saldo3 = $rowsaldo3['saldo'];
                                	?>
									<tr>
                                		<td><?php echo $kodeakun3;?></td>
                                		<td class="text-left" colspan="2"><h5><?php echo $namaakun3;?></h5></td>
                                		<td class="text-right"><h5><?php echo number_format($saldo3)."";?></h5></td>
                                	</tr>
                                	<?php

                                	$waw3 = $saldo3 +$waw3;
                                	}
                                	?>

                                	<tr>
										<td style="border-right:none;" bgcolor="#e1f5fe"></td>
										<td bgcolor="#e1f5fe" colspan="2"><h5>Arus Kas bersih dari aktivitas Pendanaan</h5></td>
										<td class="text-right" bgcolor="#e1f5fe"><h5><h4><?php echo number_format($waw3)."";?></h5></td>
									</tr>


									<?php 
									$hasil = $waw1 + $waw2 + $waw3;

									 ?>
									<tr>
										<td style="border-right:none;" bgcolor="#6ad2eb"></td>
										<td bgcolor="#6ad2eb" colspan="2"><h4>Saldo</h4></td>
										<td class="text-right" bgcolor="#6ad2eb"><?php echo number_format($hasil)."";?></h4></td>
									</tr>

                     </tbody>
                    </table>
                            <!-- END All Products Content -->
                        </div>
                        <!-- END All Products Block -->
                    </div>
				</div>
				
				
				 <?php
					include "sidebar/footer.php";
					?>
				
				
							
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>


        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        <script src="js/vendor/jquery.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/app.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
    </body>
</html>
<?php
}
?>