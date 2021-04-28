<?php session_start();
include 'koneksi.php';
if(empty(@$_SESSION['username'])){
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
                                    <i class=""></i>Neraca Lajur<br><small>Lihat Neraca Lajur dan Cetak</small>
                                <!--    <br>
                                    <br>
                                    <strong>Data Mahasiswa</strong><br><small>Kelola Data Mahasiswa</small> -->
                                </h1>
                            </div>
                            </div>
                            
                        <ul class="breadcrumb breadcrumb-top">
                            <li> Neraca Lajur</li>
                            
                        </ul>
                            
                        
                         <div class="block full">
                            <!-- All Products Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                </div>
                                <h2><strong>Neraca</strong> Lajur</h2>
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
                                <a href="export_excel_neracalajur.php?tanggal=<?php echo $tgl;?>" title="Download" class="btn btn alert-danger">
                                <i class="fa fa-download"></i> CETAK NERACA LAJUR</i></a>
                                <br>
                            <br> 
                            
                            
                            
                                
                            
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>                                
                                        
                                        <th class="text-center" colspan="2"></th>
                                        <th class="text-center" colspan="2">Neraca Awal</th>
                                        <th class="text-center" colspan="2">Mutasi</th>
                                        <th class="text-center" colspan="2">Neraca Percobaan</th>
                                        <th class="text-center" colspan="2">Neraca Penyesuaian</th>
                                        <th class="text-center" colspan="2">Neraca Saldo</th>
                                        <th class="text-center" colspan="2">Laba Rugi</th>
                                        <th class="text-center" colspan="2">Neraca Akhir</th>
                                    </tr>
                                
                                

                                
                                    <tr>                                
                                        
                                    
                                        <th class="text-center">Kode Akun</th>
                                        <th class="text-center">Uraian</th>
                                        <th class="text-center" >Debet</th>
                                        <th class="text-center" >Kredit</th>
                                         <th class="text-center" >Debet</th>
                                        <th class="text-center" >Kredit</th>
                                         <th class="text-center" >Debet</th>
                                        <th class="text-center" >Kredit</th>
                                         <th class="text-center" >Debet</th>
                                        <th class="text-center" >Kredit</th>
                                         <th class="text-center" >Debet</th>
                                        <th class="text-center" >Kredit</th>
                                         <th class="text-center" >Debet</th>
                                        <th class="text-center" >Kredit</th>
                                         <th class="text-center" >Debet</th>
                                        <th class="text-center" >Kredit</th>
                                        
                                    </tr>
                                
                                </thead>
                                
                                <tbody>

     
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

                                   // $tglcari = date('Y-m', strtotime(date($tgl) . '- 1 month


                               // <!--   AKUN BUKAN LABA RUGI --> 

                                $sql = " SELECT * FROM akun WHERE neraca NOT IN ('0') and kodeakun NOT IN('401','402','403','404')  ORDER BY kodeakun ASC";
                                  $result = mysqli_query($connect, $sql);
                                  while($row = mysqli_fetch_assoc($result)){

                                   $kodeakun = $row['kodeakun'];

                                     $sqlmutasi = "select kodeakun, sum(debit) as debit ,sum(kredit) as kredit from jurnalumum where tgl like '$tgl%%' and kodeakun='$kodeakun' ";
                                  $resultmutasi = mysqli_query($connect, $sqlmutasi);
                                  while($mutasi = mysqli_fetch_assoc($resultmutasi)){


                                      $sqlpenye = "select kodeakun, sum(debit) as debit ,sum(kredit) as kredit from jurnalpenyesuaian where tgl like '$tgl%%' and kodeakun='$kodeakun' ";
                                  $resultpenye = mysqli_query($connect, $sqlpenye);
                                   while($penye = mysqli_fetch_assoc($resultpenye)){


                                    //neraca awal

                                  //    $sqlawalm = "select kodeakun, sum(debit) as debit ,sum(kredit) as kredit from jurnalumum where tgl like '$tglcari%%' and kodeakun='$kodeakun' ";
                                  // $resultawalm = mysqli_query($connect, $sqlawalm);
                                  // while($awalm = mysqli_fetch_assoc($resultawalm)){


                                  //     $sqlawalp = "select kodeakun, sum(debit) as debit ,sum(kredit) as kredit from jurnalpenyesuaian where tgl like '$tglcari%%' and kodeakun='$kodeakun' ";
                                  // $resultawalp = mysqli_query($connect, $sqlawalp);
                                  //  while($awalp = mysqli_fetch_assoc($resultawalp)){


                                          $awalneraca = "select kodeakun, debit ,kredit from neracaawal where tgl like '$tgl%%' and kodeakun='$kodeakun' ";
                                  $resultawalneraca = mysqli_query($connect, $awalneraca);
                                   while($awal = mysqli_fetch_assoc($resultawalneraca)){


                                // $amutasid = $awalm['debit'];
                                // $amutasik = $awalm['kredit'];
                                // $awalnerd = $awalnera['debit'];
                                // $awalnerk = $awalnera['kredit'];
                                // // $aawald = 0 ;
                                // // $aawalk = 0;
                                // $apenyed= $awalp['debit'];
                                // $apenyek = $awalp['kredit'];
                                // $acobad= $awalnerd +$amutasid-$awalnerk-$amutasik;
                                // $acobak= $awalnerk+$amutasik-$amutasid;
                                // $asaldod= $acobad+$apenyed-$apenyek;
                                // $asaldok= $acobak+$apenyek-$apenyed;

                      

                                $mutasid = $mutasi['debit'];
                                $mutasik = $mutasi['kredit'];
                                $awald = $awal['debit'];
                                $awalk = $awal['kredit'];
                                $penyed= $penye['debit'];
                                $penyek = $penye['kredit'];
                                $cobad= $awald+$mutasid-$awalk-$mutasik;
                                $cobak= $awalk+$mutasik-$mutasid;
                                
        
                                $saldod= $cobad+$penyed-$penyek;
                                $saldok= $cobak+$penyek-$penyed;


                               

                                 if ($awalk <= 0) {
                                   $cobak = 0;

                                }else {
                                    $cobak = $cobak ;
                                }
                                if ($awald <= 0) {
                                   $cobad = 0;

                                }else {
                                    $cobad = $cobad ;
                                }



                                if ($cobad <= 0) {
                                   $saldod = 0;

                                }else {
                                    $saldod = $saldod ;
                                }
                                if ($cobak <= 0) {
                                   $saldok = 0;

                                }else {
                                    $saldok = $saldok ;
                                }
                            
                            




                                    $tot_mutasik += $mutasik;
                                    $tot_mutasid += $mutasid;
                                    $tot_awald += $awald;
                                    $tot_awalk += $awalk;
                                    $tot_cobad += $cobad;
                                    $tot_cobak += $cobak;
                                    $tot_penyed += $penyed;
                                    $tot_penyek += $penyek;
                                    $tot_saldok += $saldok;
                                    $tot_saldod += $saldod;



                                ?>


                                  <tr>                              
                                     <td class="text-center"><?php echo $row['kodeakun'];?></td>
                                       <!--  <td class="text-center"><?php echo $mutasi['kodeakun'];?></td> -->
                                        <td ><?php echo $row['namaakun'];?></td>
                                        <td class="text-center"><?php echo $awald; ?></td>
                                        <td class="text-center"><?php echo $awalk; ?></td>
                                        <td class="text-center"><?php echo $mutasi['debit'];?></td>
                                        <td class="text-center"><?php echo $mutasi['kredit'];?></td>
                                        <td class="text-center"><?php echo $cobad;?></td>
                                        <td class="text-center"><?php echo $cobak;?></td>
                                        <td class="text-center"><?php echo $penye['debit'];?></td>
                                        <td class="text-center"><?php echo $penye['kredit'];?></td> 
                                        <td class="text-center"><?php echo $saldod;?></td>
                                        <td class="text-center"><?php echo $saldok;?></td>
                                        <td class="text-center">0</td>
                                        <td class="text-center">0</td>
                                        <td class="text-center"><?php echo $saldod;?></td>
                                        <td class="text-center"><?php echo $saldok;?></td>

                                    </tr>

                                   
                                <?php
                                     }
                                  
                            }
                        }
                    }
                                ?>


                                    <tr>    
                                            <td class="text-center"></td>
                                            <td bgcolor="#6ec7ff" class="text-center">SUB TOTAL</td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $tot_awald;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $tot_awalk;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $tot_mutasid;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $tot_mutasik;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $tot_cobad;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $tot_cobak;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $tot_penyed;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $tot_penyek;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $tot_saldod;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $tot_saldok;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center">0</td>
                                            <td bgcolor="#6ec7ff" class="text-center">0</td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $tot_saldod;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $tot_saldok;?></td>

                                    </tr>




                         <!--   AKUN BANGUNAN DAN PERALATAN--> 
 <?php
                                $sqlbp = " SELECT * FROM akun WHERE neraca NOT IN ('0') and kodeakun  IN('401','402','403','404')  ORDER BY kodeakun ASC";
                                  $resultbp = mysqli_query($connect, $sqlbp);
                                  while($bp = mysqli_fetch_assoc($resultbp)){

                                   $kodebp = $bp['kodeakun'];

                                     $sqlmutasibp = "select kodeakun, sum(debit) as debit ,sum(kredit) as kredit from jurnalumum where tgl like '$tgl%%' and kodeakun='$kodebp' ";
                                  $resultmutasibp = mysqli_query($connect, $sqlmutasibp);
                                  while($mutasibp = mysqli_fetch_assoc($resultmutasibp)){


                                      $sqlpenyebp = "select kodeakun, sum(debit) as debit ,sum(kredit) as kredit from jurnalpenyesuaian where tgl like '$tgl%%' and kodeakun='$kodebp' ";
                                  $resultpenyebp = mysqli_query($connect, $sqlpenyebp);
                                   while($penyebp = mysqli_fetch_assoc($resultpenyebp)){


                                          $awalneracabp = "select kodeakun, debit ,kredit from neracaawal where tgl like '$tgl%%' and kodeakun='$kodebp' ";
                                  $resultawalneracabp = mysqli_query($connect, $awalneracabp);
                                   while($awalbp = mysqli_fetch_assoc($resultawalneracabp)){

                      

                                $bpmutasid = $mutasibp['debit'];
                                $bpmutasik = $mutasibp['kredit'];
                                $bpawald = $awalbp['debit'];
                                $bpawalk = $awalbp['kredit'];
                                $bppenyed= $penyebp['debit'];
                                $bppenyek = $penyebp['kredit'];
                                $bpcobad= $bpawald+$bpmutasid-$bpawalk-$bpmutasik;
                                $bpcobak= $bpawalk+$bpmutasik-$bpmutasid;
                                $bpsaldod= $bpcobad+$bppenyed-$bppenyek;
                                $bpsaldok= $bpcobak+$bppenyek-$bppenyed;


                                 if ($bpawalk <= 0) {
                                   $bpcobak = 0;

                                }else {
                                    $bpcobak = $bpcobak ;
                                }
                                if ($bpawald <= 0) {
                                   $bpcobad = 0;

                                }else {
                                    $bpcobad = $bpcobad ;
                                }



                                if ($bpcobad <= 0) {
                                   $bpsaldod = 0;

                                }else {
                                    $bpsaldod = $bpsaldod ;
                                }
                                if ($bpcobak <= 0) {
                                   $bpsaldok = 0;

                                }else {
                                    $bpsaldok = $bpsaldok ;
                                }




                                    // $tot_mutasik += $mutasik;
                                    // $tot_mutasid += $mutasid;
                                    // $tot_awald += $awald;
                                    // $tot_awalk += $awalk;
                                    // $tot_cobad += $cobad;
                                    // $tot_cobak += $cobak;
                                    // $tot_penyed += $penyed;
                                    // $tot_penyek += $penyek;
                                    // $tot_saldok += $saldok;
                                    // $tot_saldod += $


                               

                                ?>



                                  <tr>                              
                                     <td class="text-center"><?php echo $bp['kodeakun'];?></td>
                                       <!--  <td class="text-center"><?php echo $mutasi['kodeakun'];?></td> -->
                                        <td ><?php echo $bp['namaakun'];?></td>
                                        <td class="text-center"><?php echo $bpawald; ?></td>
                                        <td class="text-center"><?php echo $bpawalk; ?></td>
                                        <td class="text-center"><?php echo $mutasibp['debit'];?></td>
                                        <td class="text-center"><?php echo $mutasibp['kredit'];?></td>
                                        <td class="text-center"><?php echo $bpcobad;?></td>
                                        <td class="text-center"><?php echo $bpcobak;?></td>
                                        <td class="text-center"><?php echo $penyebp['debit'];?></td>
                                        <td class="text-center"><?php echo $penyebp['kredit'];?></td> 
                                        <td class="text-center"><?php echo $bpsaldod;?></td>
                                        <td class="text-center"><?php echo $bpsaldok;?></td>
                                        <td class="text-center">0</td>
                                        <td class="text-center">0</td>
                                        <td class="text-center"><?php echo $bpsaldod;?></td>
                                        <td class="text-center"><?php echo $bpsaldok;?></td>

                                    </tr>

                                   
                                <?php
                                     }
                                 
                            }
                        }
                    }


                       $querybp = "select  sum(debit) as debit ,SUM(kredit) AS kredit from neracaawal where tgl like '$tgl%%' and kodeakun IN('401','403')
                        union
                            SELECT SUM(debit) as debit ,SUM(kredit) AS kredit FROM neracaawal WHERE tgl LIKE '$tgl%%' AND kodeakun IN('402','404')
                        union
                            select  sum(debit) as debit ,sum(kredit) as kredit from jurnalumum where tgl like '$tgl%%' and kodeakun IN('401','403')
                        union
                            SELECT  SUM(debit) AS debit ,SUM(kredit) AS kredit FROM jurnalumum WHERE tgl LIKE '$tgl%%' AND kodeakun IN('402','404')
                        UNION
                            SELECT SUM(debit) AS debit ,SUM(kredit) AS kredit FROM jurnalpenyesuaian WHERE tgl LIKE '$tgl%%'AND  kodeakun IN('401','403')
                        UNION
                            SELECT SUM(debit) AS debit ,SUM(kredit) AS kredit FROM jurnalpenyesuaian WHERE tgl LIKE '$tgl%%' AND kodeakun IN('402','404')

                       ";
                                 
                                 
                                  $resultquerybp = mysqli_query($connect, $querybp);
                                   //$nilaibp = mysqli_fetch_assoc($resultquerybp);
                                  //NILAI AWAL
                                    $nilaibp = mysqli_fetch_row($resultquerybp);
                                    $asetd = $nilaibp[0];
                                    $asetk = $nilaibp[1];

                                    $nilaibp = mysqli_fetch_row($resultquerybp);
                                    $penyusutand = $nilaibp[0];
                                    $penyusutank = $nilaibp[1];

                                     $tot_aset_awald = $asetd - $penyusutand;
                                     $tot_aset_awalk = $asetk - $penyusutank;


                                     //NILAI MUTASI
                                    $nilaibp = mysqli_fetch_row($resultquerybp);
                                    $mutasi_asetd = $nilaibp[0];
                                    $mutasi_asetk = $nilaibp[1];

                                    $nilaibp = mysqli_fetch_row($resultquerybp);
                                    $mutasi_penyusutand = $nilaibp[0];
                                    $mutasi_penyusutank = $nilaibp[1];

                                    $tot_aset_mutasid = $mutasi_asetd - $mutasi_penyusutand;
                                    $tot_aset_mutasik = $mutasi_asetk - $mutasi_penyusutank;

                                    //NILAI PENYESUAIAN
                                     $nilaibp = mysqli_fetch_row($resultquerybp);
                                    $penyesuaian_asetd = $nilaibp[0];
                                    $penyesuaian_asetk = $nilaibp[1];

                                    $nilaibp = mysqli_fetch_row($resultquerybp);
                                    $penyesuaian_penyusutand = $nilaibp[0];
                                    $penyesuaian_penyusutank = $nilaibp[1];

                                    $tot_aset_penyesuaiand = $penyesuaian_asetd - $penyesuaian_penyusutand;
                                    $tot_aset_penyesuaiank = $penyesuaian_asetk - $penyesuaian_penyusutank;


                                    //NERACA PERCOBAAN
                                    // $a = $asetd-$penyusutand;
                                    // $A = $mutasi_asetd-$mutasi_penyusutand;
                                    // $b = $asetk-$penyusutank;
                                    // $B = $mutasi_asetk-$mutasi_penyusutank;
                                    $total_aset_percobaand = ($asetd-$penyusutand) + ($mutasi_asetd-$mutasi_penyusutand) - ($asetk-$penyusutank) - ($mutasi_asetk-$mutasi_penyusutank);

                                    // $total_aset_percobaand = $tot_aset_awald + $tot_aset_mutasid - $tot_aset_awalk - $tot_aset_mutasik;

                                    // $total_aset_percobaand = ($a+$A)-($b+$B);
                                
                                    $total_aset_percobaank =($asetk-$penyusutank) + ($mutasi_asetk-$mutasi_penyusutank) -($mutasi_asetd-$mutasi_penyusutand);


                                    //NERACA SALDO
                                    $total_neraca_saldo_asetd= $total_aset_percobaand + $tot_aset_penyesuaiand- $tot_penyesuaian_penyusutank;
                                    $total_neraca_saldo_asetk= $total_aset_percobaank + $tot_aset_penyesuaiank -$tot_penyesuaian_penyusutand; 
                                    // $bpsaldok= $bpcobak+$bppenyek-$bppenyed;
                                    
                                ?>


                                    <tr>    
                                            <td class="text-center"></td>
                                            <td bgcolor="#6ec7ff" class="text-center">SUB TOTAL</td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $tot_aset_awald;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $tot_aset_awalk;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $tot_aset_mutasid;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $tot_aset_mutasik;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $total_aset_percobaand ;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $total_aset_percobaank;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $tot_aset_penyesuaiand;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $tot_aset_penyesuaiank;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $total_neraca_saldo_asetd;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $total_neraca_saldo_asetk;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center">0</td>
                                            <td bgcolor="#6ec7ff" class="text-center">0</td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $total_neraca_saldo_asetd;?></td>
                                            <td bgcolor="#6ec7ff" class="text-center"><?php echo $total_neraca_saldo_asetk;?></td>

                                    </tr>

                                <?php  
                                        
                                 ?>















                      <!--   AKUN LABA RUGI -->

                                    <?php
                                        $sqlrl = "SELECT * FROM akun a JOIN subkategori s on a.laporan = s.idkategori where s.laporan IN ('Laporan Laba Rugi')  ORDER BY a.kodeakun ASC";
                                  $resultrl = mysqli_query($connect, $sqlrl);
                                  while($rl = mysqli_fetch_assoc($resultrl)){

                                        $kodelr = $rl['kodeakun'];

                                     $sqlmutasilr = "select kodeakun, sum(debit) as debit ,sum(kredit) as kredit from jurnalumum where tgl like '$tgl%%' and kodeakun='$kodelr' ";
                                  $resultmutasilr = mysqli_query($connect, $sqlmutasilr);
                                  while($mutasilr = mysqli_fetch_assoc($resultmutasilr)){


                                      $sqlpenyelr = "select kodeakun, sum(debit) as debit ,sum(kredit) as kredit from jurnalpenyesuaian where tgl like '$tgl%%' and kodeakun='$kodelr' ";
                                  $resultpenyelr = mysqli_query($connect, $sqlpenyelr);
                                   while($penyelr = mysqli_fetch_assoc($resultpenyelr)){


                                        //neraca awal

                                  //    $sqlawalmlr = "select kodeakun, sum(debit) as debit ,sum(kredit) as kredit from jurnalumum where tgl like '$tglcari%%' and kodeakun='$kodelr' ";
                                  // $resultawalmlr = mysqli_query($connect, $sqlawalmlr);
                                  // while($awalmlr = mysqli_fetch_assoc($resultawalmlr)){


                                  //     $sqlawalplr = "select kodeakun, sum(debit) as debit ,sum(kredit) as kredit from jurnalpenyesuaian where tgl like '$tglcari%%' and kodeakun='$kodelr' ";
                                  // $resultawalplr = mysqli_query($connect, $sqlawalplr);
                                  //  while($awalplr = mysqli_fetch_assoc($resultawalplr)){

                                      $awalneracalr = "select kodeakun, debit ,kredit from neracaawal where tgl like '$tgl%%' and  kodeakun='$kodelr' ";
                                  $resultawalneracalr = mysqli_query($connect, $awalneracalr);
                                   while($awallr = mysqli_fetch_assoc($resultawalneracalr)){



                                // $lramutasid = $awalmlr['debit'];
                                // $lramutasik = $awalmlr['kredit'];
                                // $lraawald = $awalneralr['debit'];
                                // $lraawalk= $awalneralr['kredit'];
                                // $lrapenyed= $awalplr['debit'];
                                // $lrapenyek = $awalplr['kredit'];
                                // $lracobad= $lraawald+$lramutasid-$lraawalk-$lramutasik;
                                // $lracobak= $lraawalk+$lramutasik-$lramutasid;
                                // $lrasaldod= $lracobad+$lrapenyed-$lrapenyek;
                                // $lrasaldok= $lracobak+$lrapenyek-$lrapenyed;

                                
                                // if ($lraawald <= 0) {
                                //    $lracobad = 0;

                                // }else {
                                //     $lracobad = $lracobad ;
                                // }

                                // if ($lraawalk <= 0) {
                                //    $lracobak = 0;

                                // }else {
                                //     $lracobak = $lracobak ;
                                // }



                                // if ($lracobad <= 0) {
                                //    $lrasaldod = 0;

                                // }else {
                                //     $lrasaldod = $lrasaldod ;
                                // }

                                // if ($lracobak <= 0) {
                                //    $lrasaldok = 0;

                                // }else {
                                //     $lrasaldok = $lrasaldok ;
                                // }




                                $lrmutasid = $mutasilr['debit'];
                                $lrmutasik = $mutasilr['kredit'];
                                $lrawald = $awallr['debit'];
                                $lrawalk = $awallr['kredit'];
                                $lrpenyed= $penyelr['debit'];
                                $lrpenyek = $penyelr['kredit'];
                                $lrcobad= $lrawald+$lrmutasid-$lrawalk-$lrmutasik;
                                $lrcobak= $lrawalk+$lrmutasik-$lrmutasid;
                                $lrsaldod= $lrcobad+$lrpenyed-$lrpenyek;
                                $lrsaldok= $lrcobak+$lrpenyek-$lrpenyed;

                                if ($lrawalk <= 0) {
                                   $lrcobak = 0;

                                }else {
                                    $lrcobak = $lrcobak ;
                                }
                                if ($lrawald <= 0) {
                                   $lrcobad = 0;

                                }else {
                                    $lrcobad = $lrcobad ;
                                }


                                if ($lrcobad <= 0) {
                                   $lrsaldod = 0;

                                }else {
                                    $lrsaldod = $lrsaldod ;
                                }
                                if ($lrcobak <= 0) {
                                   $lrsaldok = 0;

                                }else {
                                    $lrsaldok = $lrsaldok ;

                                }   

                                    $lrtot_mutasik += $lrmutasik;
                                    $lrtot_mutasid += $lrmutasid;
                                    $lrtot_awald += $lrawald;
                                    $lrtot_awalk += $lrawalk;
                                    $lrtot_cobad += $lrcobad;
                                    $lrtot_cobak += $lrcobak;
                                    $lrtot_penyed += $lrpenyed;
                                    $lrtot_penyek += $lrpenyek;
                                    $lrtot_saldok += $lrsaldok;
                                    $lrtot_saldod += $lrsaldod;
            
                   
                    ?>     
                    
                                <tr>
                                    <td class="text-center"><?php echo $rl['kodeakun'];?></td>
                                        <!-- <td class="text-center"><?php echo $mutasilr['kodeakun'];?></td> -->
                                        <td ><?php echo $rl['namaakun'];?></td>
                                        <td class="text-center"><?php echo $lrawald; ?></td>
                                        <td class="text-center"><?php echo $lrawalk; ?></td>
                                        <td class="text-center"><?php echo $mutasilr['debit'];?></td>
                                        <td class="text-center"><?php echo $mutasilr['kredit'];?></td>
                                        <td class="text-center"><?php echo $lrcobad;?></td>
                                        <td class="text-center"><?php echo $lrcobak;?></td>
                                        <td class="text-center"><?php echo $penyelr['debit'];?></td>
                                        <td class="text-center"><?php echo $penyelr['kredit'];?></td> 
                                        <td class="text-center"><?php echo $lrsaldod;?></td>
                                        <td class="text-center"><?php echo $lrsaldok;?></td>
                                   <!--      laba rugi -->
                                          <td class="text-center"><?php echo $lrsaldod;?></td>
                                          <td class="text-center"><?php echo $lrsaldok;?></td>
                                        <td class="text-center"><?php echo $lrsaldod;?></td>
                                        <td class="text-center"><?php echo $lrsaldok;?></td>
                                </tr>
                        
    
                                      
                        <?php
                                     }
                                  }
                                }
                            }
                            
                        ?>              
                                          <tr>    
                                            <td class="text-center"></td>
                                            <td bgcolor="#35a4e8" class="text-center"><strong>SUB TOTAL</strong></td>
                                            <td bgcolor="#35a4e8" class="text-center"><?php echo $lrtot_awald;?></td>
                                            <td bgcolor="#35a4e8" class="text-center"><?php echo $lrtot_awalk;?></td>
                                            <td bgcolor="#35a4e8" class="text-center"><?php echo $lrtot_mutasid;?></td>
                                            <td bgcolor="#35a4e8" class="text-center"><?php echo $lrtot_mutasik;?></td>
                                            <td bgcolor="#35a4e8" class="text-center"><?php echo $lrtot_cobad;?></td>
                                            <td bgcolor="#35a4e8" class="text-center"><?php echo $lrtot_cobak;?></td>
                                            <td bgcolor="#35a4e8" class="text-center"><?php echo $lrtot_penyed;?></td>
                                            <td bgcolor="#35a4e8" class="text-center"><?php echo $lrtot_penyek;?></td>
                                            <td bgcolor="#35a4e8" class="text-center"><?php echo $lrtot_saldod;?></td>
                                            <td bgcolor="#35a4e8" class="text-center"><?php echo $lrtot_saldok;?></td>
                                            <td bgcolor="#35a4e8" class="text-center"><?php echo $lrtot_saldod;?></td>
                                            <td bgcolor="#35a4e8" class="text-center"><?php echo $lrtot_saldok;?></td>
                                            <td bgcolor="#35a4e8" class="text-center"><?php echo $lrtot_saldod;?></td>
                                            <td bgcolor="#35a4e8" class="text-center"><?php echo $lrtot_saldok;?></td>

                                        </tr>

                                    
                                         <?php
                                                $jumlah_awald =    $lrtot_awald + $tot_awald +$tot_aset_awald;
                                                $jumlah_awalk =    $lrtot_awalk + $tot_awalk + $tot_aset_awalk;
                                                $jumlah_mutasik =    $lrtot_mutasik + $tot_mutasik +$tot_aset_mutasid;
                                                $jumlah_mutasid =    $lrtot_mutasid + $tot_mutasid +$tot_aset_mutasik;
                                                $jumlah_cobad =    $lrtot_cobad + $tot_cobad +$total_aset_percobaand;
                                                $jumlah_cobak =    $lrtot_cobak + $tot_cobak +$total_aset_percobaank;
                                                $jumlah_penyed =    $lrtot_penyed + $tot_penyed +$tot_aset_penyesuaiand;
                                                $jumlah_penyek =    $lrtot_penyek + $tot_penyek +$total_aset_percobaank;
                                                $jumlah_saldok =    $lrtot_saldok + $tot_saldok +$total_neraca_saldo_asetd;
                                                $jumlah_saldod =    $lrtot_saldod + $totsaldod +$total_neraca_saldo_asetk;
                                                $jumlah_lrd =    $lrtot_saldod;
                                                $jumlah_lrk =    $lrtot_saldok;

                                                              
                                        ?>

                                        <tr>    
                                            <td class="text-center"></td>
                                            <td bgcolor="#5ccc6e" class="text-center" ><strong>TOTAL</strong></td>
                                            <td bgcolor="#5ccc6e" class="text-center"><?php echo $jumlah_awald;?></td>
                                            <td bgcolor="#5ccc6e" class="text-center"><?php echo $jumlah_awalk;?></td>
                                            <td bgcolor="#5ccc6e" class="text-center"><?php echo $jumlah_mutasid;?></td>
                                            <td bgcolor="#5ccc6e" class="text-center"><?php echo $jumlah_mutasik;?></td>
                                            <td bgcolor="#5ccc6e" class="text-center"><?php echo $jumlah_cobad;?></td>
                                            <td bgcolor="#5ccc6e" class="text-center"><?php echo $jumlah_cobak;?></td>
                                            <td bgcolor="#5ccc6e" class="text-center"><?php echo $jumlah_penyed;?></td>
                                            <td bgcolor="#5ccc6e" class="text-center"><?php echo $jumlah_penyek;?></td>
                                            <td bgcolor="#5ccc6e" class="text-center"><?php echo $jumlah_saldod;?></td>
                                            <td bgcolor="#5ccc6e" class="text-center"><?php echo $jumlah_saldok;?></td>
                                            <td bgcolor="#5ccc6e" class="text-center"><?php echo $jumlah_lrd;?></td>
                                            <td bgcolor="#5ccc6e" class="text-center"><?php echo $jumlah_lrk;?></td>
                                            <td bgcolor="#5ccc6e" class="text-center"><?php echo $jumlah_saldod;?></td>
                                            <td bgcolor="#5ccc6e" class="text-center"><?php echo $jumlah_saldok;?></td>

                                        </tr>
                                         
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
       <!--  <script src="js/vendor/bootstrap.min.js"></script> -->
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