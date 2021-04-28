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
                                    <i class=""></i>Buku Besar<br><small>Lihat Buku Besar dan Cetak</small>
                                <!--    <br>
                                    <br>
                                    <strong>Data admin</strong><br><small>Kelola Data admin</small> -->
                                </h1>
                            </div>
                            </div>
                            
                        <ul class="breadcrumb breadcrumb-top">
                            <li>Buku Besar</li>
                            
							
							
							
                        </ul>
                            
							<div class="block full">
							<a href="export_PDF_bb.php" title="Download" class="btn btn alert-danger">
                                <i class="fa fa-download"></i> CETAK Buku Besar</i></a>
							</div>
							
							
							
							
<?php
$sql = "SELECT bukubesar.*, akun.namaakun FROM bukubesar, akun WHERE bukubesar.kodeakun = akun.kodeakun GROUP BY  bukubesar.kodeakun";
$result = mysqli_query($connect, $sql);
while($row = mysqli_fetch_assoc($result)){
?>
                         <div class="block full">
                           
                            <div class="table-responsive">

                        <tr>
                            <td><strong>SKPD</strong></td>
                            <td><strong>:</strong></td>
                            <td><strong><?php echo $row['skpd'];?></strong></td>
                        </tr>   
                        <br>
                        <tr>
                            <td><strong>Kode Akun</strong></td>
                            <td><strong>:</strong></td>
                            <td><strong><?php echo $row['kodeakun'];?></strong></td>
                        
                        </tr>
                        <br>    
                        <tr>
                            <td><strong>Nama Akun</strong></td>
                            <td><strong>:</strong></td>
                            <td><strong><?php echo $row['namaakun'];?></strong></td>
                        
                        </tr>   
                            
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                    
                                        <th class="text-center">Tanggal</th>                             
                                        <th class="text-center">Uraian</th>
                                        <th class="text-center">Ref</th>
                                        <th class="text-center">Debit</th>
                                        <th class="text-center">Kredit</th>
                                        <th class="text-center">Saldo</th>
                                    </tr>
                                </thead>
                                
                                
                                
                                <tbody>
<?php
$sqls = "SELECT * FROM bukubesar WHERE kodeakun = '".$row['kodeakun']."' ORDER BY tgl";
$results = mysqli_query($connect, $sqls);
while($rows = mysqli_fetch_assoc($results)){

$debet = $rows['debit'];
$kredit = $rows['kredit'];
	
if($rows['saldo'] < 0){
    $saldo = $rows['saldo']*(-1);
}else{
	$saldo = $rows['saldo'];
}
?>                      
                                    <tr>
                                        <td class="text-center"><?php echo $rows['tgl'];?></td>
                                        <td class="text-center"><?php echo $rows['uraianbb'];?></td>
                                        <td class="text-center"><?php echo $rows['ref'];?></td>
                                        <td class="text-center"><?php echo number_format($debet)."";?></td>
                                        <td class="text-center"><?php echo number_format($kredit)."";?></td>
                                        <td class="text-center"><?php echo number_format($saldo)."<br>";?></td>
                                    </tr>
<?php
}
?>                                    
                                         
                     </tbody>

                            </table>

                     </div>
                         </div>
<?php
}
?>


                                              
                         
                         
                         
                         
                         
                    
                
                </div><!-- Page-Content -->
                    
                    <?php
                    include "sidebar/footer.php"
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
       
    </body>
</html>
<?php
}
?>