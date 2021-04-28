<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Neraca_Lajur-$tgl.xls");   
?>
<!DOCTYPE html>

    <head>
       

        <title>Neraca Lajur</title>

       
  
    </head>
  
  
  
  
    <body>
                 
      
             <?php
             $connect = mysqli_connect("localhost","root","","candabirawa");
 
                                if (isset($_GET['tanggal']))
                                    {
                                      $tgl=$_GET['tanggal'];
                                    }
                                    else
                                    {
                                       $tgl=date("Y-m");
                                    }
                                  header("Content-Disposition: attachment; filename=Neraca Lajur-$tgl.xls");    
                                  ?>    
                               <center>
       <h1>Neraca Lajur <br/>PD. CANDA BIRAWA</h1><small>Jl. PANGLIMA SUDIRMAN NO.141 KEDIRI JAWA TIMUR</small>
    </center>
                             <table border="1">
                                <thead>
                                    <tr>                                
                                        
                                        <th  colspan="2"></th>
                                        <th  colspan="2">Neraca Awal</th>
                                        <th  colspan="2">Mutasi</th>
                                        <th  colspan="2">Neraca Percobaan</th>
                                        <th  colspan="2">Neraca Penyesuaian</th>
                                        <th  colspan="2">Neraca Saldo</th>
                                        <th  colspan="2">Laba Rugi</th>
                                        <th  colspan="2">Neraca Akhir</th>
                                    </tr>
                                
                                

                                
                                    <tr>                                
                                        
                                    
                                        <th >Kode Akun</th>
                                        <th >Uraian</th>
                                        <th  >Debet</th>
                                        <th  >Kredit</th>
                                         <th  >Debet</th>
                                        <th  >Kredit</th>
                                         <th  >Debet</th>
                                        <th  >Kredit</th>
                                         <th  >Debet</th>
                                        <th  >Kredit</th>
                                         <th  >Debet</th>
                                        <th  >Kredit</th>
                                         <th  >Debet</th>
                                        <th  >Kredit</th>
                                         <th  >Debet</th>
                                        <th  >Kredit</th>
                                        
                                    </tr>
                                
                                </thead>
                                
                                <tbody>

      <!--   AKUN BUKAN LABA RUGI -->
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

                                $sql = " SELECT * FROM akun WHERE neraca NOT IN ('0')  ORDER BY kodeakun ASC";
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
                                     <td ><?php echo $row['kodeakun'];?></td>
                                       <!--  <td ><?php echo $mutasi['kodeakun'];?></td> -->
                                        <td ><?php echo $row['namaakun'];?></td>
                                        <td ><?php echo $awald; ?></td>
                                        <td ><?php echo $awalk; ?></td>
                                        <td ><?php echo $mutasi['debit'];?></td>
                                        <td ><?php echo $mutasi['kredit'];?></td>
                                        <td ><?php echo $cobad;?></td>
                                        <td ><?php echo $cobak;?></td>
                                        <td ><?php echo $penye['debit'];?></td>
                                        <td ><?php echo $penye['kredit'];?></td> 
                                        <td ><?php echo $saldod;?></td>
                                        <td ><?php echo $saldok;?></td>
                                        <td >0</td>
                                        <td >0</td>
                                        <td ><?php echo $saldod;?></td>
                                        <td ><?php echo $saldok;?></td>

                                    </tr>

                                   
                                <?php
                                     }
                                  
                            }
                        }
                    }
                                ?>


                                    <tr>    
                                            <td ></td>
                                            <td bgcolor="#6ec7ff" >SUB TOTAL</td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_awald;?></td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_awalk;?></td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_mutasid;?></td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_mutasik;?></td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_cobad;?></td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_cobak;?></td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_penyed;?></td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_penyek;?></td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_saldod;?></td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_saldok;?></td>
                                            <td bgcolor="#6ec7ff" >0</td>
                                            <td bgcolor="#6ec7ff" >0</td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_saldod;?></td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_saldok;?></td>

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



                                  <tr class="tbl-content" id="tdkonten">                              
                                     <td ><?php echo $bp['kodeakun'];?></td>
                                       <!--  <td ><?php echo $mutasi['kodeakun'];?></td> -->
                                        <td ><?php echo $bp['namaakun'];?></td>
                                        <td ><?php echo $bpawald; ?></td>
                                        <td ><?php echo $bpawalk; ?></td>
                                        <td ><?php echo $mutasibp['debit'];?></td>
                                        <td ><?php echo $mutasibp['kredit'];?></td>
                                        <td ><?php echo $bpcobad;?></td>
                                        <td ><?php echo $bpcobak;?></td>
                                        <td ><?php echo $penyebp['debit'];?></td>
                                        <td ><?php echo $penyebp['kredit'];?></td> 
                                        <td ><?php echo $bpsaldod;?></td>
                                        <td ><?php echo $bpsaldok;?></td>
                                        <td >0</td>
                                        <td >0</td>
                                        <td ><?php echo $bpsaldod;?></td>
                                        <td ><?php echo $bpsaldok;?></td>

                                    </tr>

                                   
                                <?php
                                     }
                                 
                            }
                        }
                    }

                       $querybp = "select  sum(debit) as debit ,kredit from neracaawal where tgl like '$tgl%%' and kodeakun IN('401','403')
                        union
                            SELECT SUM(debit) as debit ,kredit FROM neracaawal WHERE tgl LIKE '$tgl%%' AND kodeakun IN('402','404')
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
                                    $penyesuaian_asetd = $nilaibpp[0];
                                    $penyesuaian_asetk = $nilaibp[1];

                                    $nilaibp = mysqli_fetch_row($resultquerybp);
                                    $penyesuaian_penyusutand = $nilaibp[0];
                                    $penyesuaian_penyusutank = $nilaibp[1];

                                    $tot_aset_penyesuaiand = $penyesuaian_asetd - $penyesuaian_penyusutand;
                                    $tot_aset_penyesuaiank = $penyesuaian_asetk - $penyesuaian_penyusutank;
                                    

                                    //NILAI PERCOBAAN
                                    $total_aset_percobaand = ($asetd-$penyusutand) + ($mutasi_asetd-$mutasi_penyusutand) - ($asetk-$penyusutank) - ($mutasi_asetk-$mutasi_penyusutank);
                                
                                    $total_aset_percobaank =($asetk-$penyusutank) + ($mutasi_asetk-$mutasi_penyusutank) -($mutasi_asetd-$mutasi_penyusutand);

                                    //NILAI SALDO
                                    $tot_aset_saldod = $asetd - $penyusutand;
                                    $tot_aset_saldok = $asetk - $penyusutank;

                                    // $bpcobad= $bpawald+$bpmutasid-$bpawalk-$bpmutasik;
                                    // $bpcobak= $bpawalk+$bpmutasik-$bpmutasid;
                                ?>


                                    <tr class="tbl-content" id="tdkonten">    
                                            <td ></td>
                                            <td bgcolor="#6ec7ff" >SUB TOTAL</td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_aset_awald;?></td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_aset_awalk;?></td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_aset_mutasid;?></td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_aset_mutasik;?></td>
                                            <td bgcolor="#6ec7ff" ><?php echo $total_aset_percobaand ;?></td>
                                            <td bgcolor="#6ec7ff" ><?php echo $total_aset_percobaank;?></td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_aset_penyesuaiand;?></td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_aset_penyesuaiank;?></td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_aset_saldod;?></td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_aset_saldok;?></td>
                                            <td bgcolor="#6ec7ff" >0</td>
                                            <td bgcolor="#6ec7ff" >0</td>
                                            <td bgcolor="#6ec7ff" ><?php echo$tot_aset_saldod;?></td>
                                            <td bgcolor="#6ec7ff" ><?php echo $tot_aset_saldok;?></td>

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
                                    <td ><?php echo $rl['kodeakun'];?></td>
                                        <!-- <td ><?php echo $mutasilr['kodeakun'];?></td> -->
                                        <td ><?php echo $rl['namaakun'];?></td>
                                        <td ><?php echo $lrawald; ?></td>
                                        <td ><?php echo $lrawalk; ?></td>
                                        <td ><?php echo $mutasilr['debit'];?></td>
                                        <td ><?php echo $mutasilr['kredit'];?></td>
                                        <td ><?php echo $lrcobad;?></td>
                                        <td ><?php echo $lrcobak;?></td>
                                        <td ><?php echo $penyelr['debit'];?></td>
                                        <td ><?php echo $penyelr['kredit'];?></td> 
                                        <td ><?php echo $lrsaldod;?></td>
                                        <td ><?php echo $lrsaldok;?></td>
                                   <!--      laba rugi -->
                                          <td ><?php echo $lrsaldod;?></td>
                                          <td ><?php echo $lrsaldok;?></td>
                                        <td ><?php echo $lrsaldod;?></td>
                                        <td ><?php echo $lrsaldok;?></td>
                                </tr>
                        
    
                                      
                        <?php
                                     }
                                  }
                                }
                            }
                            
                        ?>              
                                          <tr>    
                                            <td ></td>
                                            <td bgcolor="#35a4e8" ><strong>SUB TOTAL</strong></td>
                                            <td bgcolor="#35a4e8" ><?php echo $lrtot_awald;?></td>
                                            <td bgcolor="#35a4e8" ><?php echo $lrtot_awalk;?></td>
                                            <td bgcolor="#35a4e8" ><?php echo $lrtot_mutasid;?></td>
                                            <td bgcolor="#35a4e8" ><?php echo $lrtot_mutasik;?></td>
                                            <td bgcolor="#35a4e8" ><?php echo $lrtot_cobad;?></td>
                                            <td bgcolor="#35a4e8" ><?php echo $lrtot_cobak;?></td>
                                            <td bgcolor="#35a4e8" ><?php echo $lrtot_penyed;?></td>
                                            <td bgcolor="#35a4e8" ><?php echo $lrtot_penyek;?></td>
                                            <td bgcolor="#35a4e8" ><?php echo $lrtot_saldod;?></td>
                                            <td bgcolor="#35a4e8" ><?php echo $lrtot_saldok;?></td>
                                            <td bgcolor="#35a4e8" ><?php echo $lrtot_saldod;?></td>
                                            <td bgcolor="#35a4e8" ><?php echo $lrtot_saldok;?></td>
                                            <td bgcolor="#35a4e8" ><?php echo $lrtot_saldod;?></td>
                                            <td bgcolor="#35a4e8" ><?php echo $lrtot_saldok;?></td>

                                        </tr>

                                    
                                         <?php
                                                $jumlah_awald =    $lrtot_awald + $tot_awald;
                                                $jumlah_awalk =    $lrtot_awalk + $tot_awalk;
                                                $jumlah_mutasik =    $lrtot_mutasik + $tot_mutasik;
                                                $jumlah_mutasid =    $lrtot_mutasid + $tot_mutasid;
                                                $jumlah_cobad =    $lrtot_cobad + $tot_cobad;
                                                $jumlah_cobak =    $lrtot_cobak + $tot_cobak;
                                                $jumlah_penyed =    $lrtot_penyed + $tot_penyed;
                                                $jumlah_penyek =    $lrtot_penyek + $tot_penyek;
                                                $jumlah_saldok =    $lrtot_saldok + $tot_saldok;
                                                $jumlah_saldod =    $lrtot_saldod + $totsaldod;
                                                $jumlah_lrd =    $lrtot_saldod;
                                                $jumlah_lrk =    $lrtot_saldok;

                                                            
                                        ?>

                                        <tr>    
                                            <td ></td>
                                            <td  ><strong>TOTAL</strong></td>
                                            <td ><?php echo $jumlah_awald;?></td>
                                            <td ><?php echo $jumlah_awalk;?></td>
                                            <td ><?php echo $jumlah_mutasid;?></td>
                                            <td ><?php echo $jumlah_mutasik;?></td>
                                            <td ><?php echo $jumlah_cobad;?></td>
                                            <td ><?php echo $jumlah_cobak;?></td>
                                            <td ><?php echo $jumlah_penyed;?></td>
                                            <td ><?php echo $jumlah_penyek;?></td>
                                            <td ><?php echo $jumlah_saldod;?></td>
                                            <td ><?php echo $jumlah_saldok;?></td>
                                            <td ><?php echo $jumlah_lrd;?></td>
                                            <td ><?php echo $jumlah_lrk;?></td>
                                            <td ><?php echo $jumlah_saldod;?></td>
                                            <td ><?php echo $jumlah_saldok;?></td>

                                        </tr>
                                         
                     </tbody>
                            </table>
                     </div>
                      
                    </div>
            
          
    </body>
</html>
