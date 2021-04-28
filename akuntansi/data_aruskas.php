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
                                    <i class=""></i>Arus Kas<br><small>Lihat Arus Kas</small>
								<!--	<br>
									<br>
									<strong>Data Mahasiswa</strong><br><small>Kelola Data Mahasiswa</small> -->
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

                              <form method="get" class="form-horizontal form-bordered">
                            <div class="form-group">
                            <label class="col-md-3 control-label " for="example-text-input" style="text-align:right;" > BULAN</label>
                            <div class="col-md-9">
                            <input type="month" name="tanggal">
                            <input type="submit" value="Cari" class="btn btn-sm btn-primary">
                            </div>
                            </div>
                            </form>
							
							 <a href="export_excel_aruskas.php?tanggal=<?php echo $tgl;?>" title="Download" class="btn btn alert-danger">
                                <i class="fa fa-download"></i> CETAK ARUS KAS</i></a>
							<br>
							<br>
							
							

                            <!-- All Products Content -->
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
										<th class="text-left" width="100px">KODE</th>
										<th class="text-left" >NAMA AKUN</th>
										<th class="text-right">PENERIMAAN</th>
                                        <th class="text-right">PENGELURAN</th>
                                    </tr>
                                </thead>
								
								<?php
                                     error_reporting(0);
                                 if (isset($_GET['tanggal']))
                                    {
                                      $tgl=$_GET['tanggal'];
                                    }
                                    else
                                    {
                                       $tgl=date("yyyy-mm");
                                    }  

                            // $tglcari = date('Y-m', strtotime(date($tgl) . '- 1 month'));

                             $querysaldoawal = "SELECT * from neracaawal where tgl like '$tgl%%' and kodeakun = '001'";
                                                        $resultsaldoawal = mysqli_query($connect, $querysaldoawal);
                                                        while($as = mysqli_fetch_assoc($resultsaldoawal)){
                                                            $saldo_awal = $as['debit'];
                                                            
                                                            
                                     }
                                  
                                ?>
								
                                <tbody>
              <!--  <?php
                                    $querytgl = "SELECT MAX(tgl) as tgl FROM bukubesar WHERE kodeakun = '101' and tgl like '$tgl%%'";
                        $resultgl = mysqli_query($connect, $querytgl);
                        $rowtgl = mysqli_fetch_assoc($resultgl);
                        $tglmax = $rowtgl['tgl'];
                        
                        $querysaldo = "SELECT saldo FROM bukubesar WHERE tgl = '$tglmax' AND kodeakun = '101' ORDER BY idbb DESC LIMIT 1";
                        $resultsaldo = mysqli_query($connect, $querysaldo);
                        $rowsaldo = mysqli_fetch_assoc($resultsaldo);
                        if($rowsaldo['saldo'] < 0){
                            $saldo = $rowsaldo['saldo'] *(-1);
                        }else{
                            $saldo = $rowsaldo['saldo'];
                        }
                 ?> -->
                                	
                                    <tr>
                                                   
                                                    <td style="border-right:none;" width="6px"></td>
                                                    <td ><h5 style="font-weight: bold;">Saldo Awal </h5></td>
                                                    <td class="text-right"><h5>Rp. <?php echo number_format($saldo_awal)."";?></h5></td>
                                                    <td class="text-right"><h5>Rp. 0</h5></td>
                                                </tr>

                                	<?php
                                    error_reporting(0);
                                                        // $xsubkewajiban = 0;
                                                        // $queryakun = "SELECT * FROM akun WHERE aruskas = 'Penerimaan' ORDER BY kodeakun;";
                                                        // $resultakun = mysqli_query($connect, $queryakun);
                                                        // while($rowakun = mysqli_fetch_assoc($resultakun)){
                                                        //     $kodeakun = $rowakun['kodeakun'];
                                                        //     $namaakun = $rowakun['namaakun'];

                                                        //     if (isset($_GET['tanggal']))
                                                        //     {
                                                        //       $tgl=$_GET['tanggal'];
                                                        //     }
                                                        //     else
                                                        //     {
                                                        //        $tgl=date("Y-m");
                                                        //     }
                                                        //     $querytgl = "SELECT MAX(tgl) as tgl FROM bukubesar WHERE kodeakun = '$kodeakun' and tgl like '$tgl%%'";
                                                        //     $resultgl = mysqli_query($connect, $querytgl);
                                                        //     $rowtgl = mysqli_fetch_assoc($resultgl);
                                                        //     $tglcari = $rowtgl['tgl'];
                                                            
                                                        //     $querysaldo = "SELECT saldo FROM bukubesar WHERE tgl = '$tglcari%%' AND kodeakun = '$kodeakun' ORDER BY idbb DESC LIMIT 1";
                                                        //     $resultsaldo = mysqli_query($connect, $querysaldo);
                                                        //     $rowsaldo = mysqli_fetch_assoc($resultsaldo);
                                                        //     if($rowsaldo['saldo'] < 0){
                                                        //         $saldo1 = $rowsaldo['saldo']*(-1);
                                                        //     }else{
                                                        //         $saldo1 = $rowsaldo['saldo']*(1);
                                                        //     }

                                                          if (isset($_GET['tanggal']))
                                                            {
                                                              $tgl=$_GET['tanggal'];
                                                            }
                                                            else
                                                            {
                                                               $tgl=date("yyyy-mm");
                                                            }


                                                    $queryakun = "SELECT kodeakun,uraianbb,debit,kredit FROM bukubesar WHERE kodeakun='101' AND tgl LIKE '$tgl%%' ORDER BY tgl";
                                                        $resultakun = mysqli_query($connect, $queryakun);
                                                        while($row = mysqli_fetch_assoc($resultakun)){
                                                            $kode = $row['kodeakun'];
                                                            $nama = $row['uraianbb'];
                                                            $debit = $row['debit'];
                                                             $kredit = $row['kredit'];

                                                            
                                                            $tot_debit += $debit; 
                                                            $tot_kredit += $kredit; 

                                                             $total_debit = $saldo_awal + $tot_debit;


                                    ?>
        

                                                <tr>
                                                   
                                                    <td style="border-right:none;" width="6px"><?php echo $kode;?></td>
                                                    <td><h5><?php echo $nama;?></h5></td>
                                                    <td class="text-right"><h5>Rp. <?php echo ($debit)."";?></h5></td>
                                                    <td class="text-right"><h5>Rp. <?php echo ($kredit)."";?></h5></td>
                                                </tr>

                                                
                                    <?php 
                                                          
                                                         
                                                 }          
                                     ?>
                                                        
                                                 <tr>
                                                   
                                                    <td bgcolor="#35a4e8"  style="border-right:none;" width="6px"></td>
                                                    <td bgcolor="#35a4e8">TOTAL</td>
                                                    <td bgcolor="#35a4e8" class="text-right"><h5>Rp. <?php echo ($total_debit)."";?></h5></td>
                                                    <td bgcolor="#35a4e8"class="text-right"><h5>Rp. <?php echo ($tot_kredit)."";?></h5></td>
                                                </tr>





									<?php 
									$saldo_akhir = $total_debit - $tot_kredit;

									 ?>
									<tr>
										<td style="border-right:none;" bgcolor="#6ad2eb"></td>
										<td bgcolor="#6ad2eb" ><h4>Saldo Akhir</h4></td>
										<td class="text-center" bgcolor="#6ad2eb" colspan="2">Rp. <?php echo ($saldo_akhir)."";?></h4></td>
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