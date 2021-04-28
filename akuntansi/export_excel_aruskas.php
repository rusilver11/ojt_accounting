<?php
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=Arus Kas-$tgl.xls");
?>
<!DOCTYPE html>

    <head>
       <title>Arus Kas</title>
    </head>
    
    <body>
  
        <center>
       <h1>Arus Kas <br/>PD. CANDA BIRAWA</h1><small>Jl. PANGLIMA SUDIRMAN NO.141 KEDIRI JAWA TIMUR</small>
    </center>                        
      
                      
                                
                                <?php
                                $query2 = "select tgl from transaksi LIMIT 1";
                                $result2 = mysqli_query($connect, $query2);
                                $row = mysqli_fetch_assoc($result2);
                                $date = date_parse_from_format("Y-m-d", $row['tgl']);
                                //output the bits
                                $tgl = "$date[year]";
                            ?>
                            

                          
                            
                            

                            <!-- All Products Content -->
                            <table border="1">
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
                                       $tgl=date("2019-05");
                                    }  

                             $tglcari = date('Y-m', strtotime(date($tgl) . '- 1 month'));

                             $querysaldoawal = "SELECT kodeakun,uraianbb,debit,kredit FROM bukubesar WHERE kodeakun='101' AND tgl LIKE '$tglcari%%' ORDER BY tgl";
                                                        $resultsaldoawal = mysqli_query($connect, $querysaldoawal);
                                                        while($as = mysqli_fetch_assoc($resultsaldoawal)){
                                                            $akode = $as['kodeakun'];
                                                            $anama = $as['uraianbb'];
                                                            $adebit = $as['debit'];
                                                             $akredit = $as['kredit'];

                                                            
                                                            $atot_debit += $adebit; 
                                                            $atot_kredit += $akredit; 

                                                            $saldo = 25413477;

                                                             $atotal_debit = $saldo + $atot_debit;

                                                             $saldo_awal = $atotal_debit - $atot_kredit;
                                
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
                                                               $tgl=date("Y-m");
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
                                                    <td class="text-right"><h5>Rp. <?php echo number_format($debit)."";?></h5></td>
                                                    <td class="text-right"><h5>Rp. <?php echo number_format($kredit)."";?></h5></td>
                                                </tr>

                                                
                                    <?php 
                                                          
                                                         
                                                 }          
                                     ?>
                                                        
                                                 <tr>
                                                   
                                                    <td bgcolor="#35a4e8"  style="border-right:none;" width="6px"></td>
                                                    <td bgcolor="#35a4e8">TOTAL</td>
                                                    <td bgcolor="#35a4e8" class="text-right"><h5>Rp. <?php echo number_format($total_debit)."";?></h5></td>
                                                    <td bgcolor="#35a4e8"class="text-right"><h5>Rp. <?php echo number_format($tot_kredit)."";?></h5></td>
                                                </tr>





                                    <?php 
                                    $saldo_akhir = $total_debit - $tot_kredit;

                                     ?>
                                    <tr>
                                        <td style="border-right:none;" bgcolor="#6ad2eb"></td>
                                        <td bgcolor="#6ad2eb" ><h4>Saldo Akhir</h4></td>
                                        <td class="text-center" bgcolor="#6ad2eb" colspan="2">Rp. <?php echo number_format($saldo_akhir)."";?></h4></td>
                                    </tr>

                     </tbody>
                    </table>
                            <!-- END All Products Content -->
                        
                        <!-- END All Products Block -->
                
    </body>
</html>
