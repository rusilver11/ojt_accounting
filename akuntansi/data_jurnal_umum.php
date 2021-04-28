<?php session_start();
include 'koneksi.php';
if(empty(@$_SESSION['username'])){
        // header("Location:login.php");
        echo "<script>window.location.href='login.php'</script>";
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
                include "sidebar/sidebar_mahasiswa.php";
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
                                    <i class=""></i>Jurnal Umum<br><small>Lihat Jurnal Umum dan Cetak</small>
								<!--	<br>
									<br>
									<strong>Data Mahasiswa</strong><br><small>Kelola Data Mahasiswa</small> -->
                                </h1>
                            </div>
							</div>
							
						<ul class="breadcrumb breadcrumb-top">
							<li> Jurnal Umum</li>
                            
                        </ul>
							
						
						 <div class="block full">
                            <!-- All Products Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                </div>
                                <h2><strong>Jurnal</strong> Umum</h2>
                            </div>
                            
						
							
							<div class="table-responsive">
								<form method="get" class="form-horizontal form-bordered">
                            <div class="form-group">
                            <label class="col-md-3 control-label " for="example-text-input" style="text-align:right;" > BULAN</label>
                            <div class="col-md-9">
                            <input type="month" name="tanggal">
                            <input type="submit" value="Cari" class="btn btn-sm btn-primary">
                            </div>
                            </div>
                            </form>
                              <?php
 
                                if (isset($_GET['tanggal']))
                                    {
                                      $tgl=$_GET['tanggal'];
                                    }
                                    else
                                    {
                                       $tgl=date("Y-m");
                                    }     
                                  ?>    
                            	<a href="export_excel_jurnalumum.php?tanggal=<?php echo $tgl;?>" title="Download" class="btn btn alert-danger">
								<i class="fa fa-download"></i> CETAK JURNAL UMUM</i></a>
								<br>
							<br> 
							
							
							
								
							
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>								
										<th class="text-center">Tanggal</th>
                                        <th class="text-center">No Bukti</th>
										<th class="text-center">Kode Akun</th>
                                        <th class="text-center">Uraian</th>
                                        <th class="text-center">Ref</th>
										<th class="text-center">Debit</th>
                                        <th class="text-center">Kredit</th>
                                    </tr>
                                </thead>
								
								
								
                                <tbody>
                                <?php

                                if (isset($_GET['tanggal']))
                                    {
                                      $tgl=$_GET['tanggal'];
                                    }
                                    else
                                    {
                                       $tgl=date("Y-m");
                                    }       
                                    
                                $sql = "SELECT noju FROM jurnalumum GROUP BY noju ORDER BY tgl";
                                //$sql = "SELECT * FROM akun";
                                $no = 1;
                                $result = mysqli_query($connect, $sql);
                                  while($row = mysqli_fetch_assoc($result)){
                                    $sqlall = "SELECT * FROM jurnalumum WHERE noju = '".$row['noju']."' AND tgl LIKE '$tgl%%' ORDER by tgl ASC, nobukti";
                                    $resultall = mysqli_query($connect, $sqlall);
                                    $i = 1;
                                    while ($rowall = mysqli_fetch_assoc($resultall)) {
										$kredit = $rowall['kredit'];
										$debet = $rowall['debit'];
                                        if($rowall['kredit'] > 0){
                                            $uraian =  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rowall['uraianjurnal'];
                                        }else{
                                            $uraian =  $rowall['uraianjurnal'];
                                        }
                                        
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $rowall['tgl'];?></td>
                                        <td class="text-center"><?php echo $rowall['nobukti'];?></td>
                                        <td class="text-center"><?php echo $rowall['kodeakun'];?></td>
										<td><?php echo $uraian;?></td>
										<td class="text-center"><?php echo $rowall['ref'];?></td>
										<td class="text-center"><?php echo number_format($debet)."";?></td>
										<td class="text-center"><?php echo number_format($kredit)."";?></td>
                                    </tr>
                                <?php
                                }
                                }
                                ?>
								         
                     </tbody>
                            </table>
                     </div>
                      
                    </div>
						
				
				</div><!-- Page-Content -->
					
                    <?php
					include "sidebar/footer.php";
					?>
					
                </div><!-- Main-Container -->
            </div><!-- Page-Container -->
        </div><!-- Page Wrapper -->
		
		
		
		
		
		
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

					 <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h3 class="modal-title">Edit Data Akun</h3>
                                                </div>
                                                <div class="modal-body">
							<form id="form-validation" method="post" class="form-horizontal form-bordered">

							<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">ID Akun</label>
                                            <div class="col-md-9">
                                                <input type="text" id="idakun" name="idakun" class="form-control" placeholder="Masukkan ID Akun"  readonly="yes"> 
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nama Akun</label>
                                            <div class="col-md-9">
                                                <input type="text" id="namaakun" name="namaakun" class="form-control" placeholder="Masukkan Nama Akun"  required="yes">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>                      
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                                    <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                                    <button id="update" type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
                                                    </form>
                                                    
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
					
					
		
		
		
		

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