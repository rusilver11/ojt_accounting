<?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Neraca_Penjelasan_Pupuk-$tgl.xls");
?>
<head>

        <title>Neraca Penjelasan</title>

       
    </head>
   <body>
   <?php
   include 'all_function.php';
   $connect = mysqli_connect("localhost","root","","candabirawa");
    if (isset($_GET['tanggal']))
                        {
                          $tgl=$_GET['tanggal'];
                        }
                        else
                        {
                           $tgl=date("Y-m");
                        }
    ?>
                  
        <center>
       <h1>NERACA PENJELASAN <br/>PD. CANDA BIRAWA</h1><small>Jl. PANGLIMA SUDIRMAN NO.141 KEDIRI JAWA TIMUR</small>
    </center>
       
                                <?php
                                $query2 = "select tgl from transaksi LIMIT 1";
                                $result2 = mysqli_query($connect, $query2);
                                $row = mysqli_fetch_assoc($result2);
                                $date = date_parse_from_format("Y-m-d", $row['tgl']);
                                //output the bits
                                $tgl = "$date[year]";
                            ?>

                           <table border="1">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="100px">Kode Akun</th>
                                        <th class="text-center" colspan = "3">Uraian</th>
                                        <th class="text-center"><?php echo $tgl;?></th>
                                    </tr>
                                </thead>
                                
                                
                                
                                <tbody>
<?php
        $xend = 0;
            $querynamakat = "SELECT nokategori, UCASE(namakategori) as namakategori FROM kategori WHERE nokategori = '1';";
            $resultnamakat = mysqli_query($connect, $querynamakat);
            while($rownamakat = mysqli_fetch_assoc($resultnamakat)){
                $namakat = $rownamakat['namakategori'];
                $idkat = $rownamakat['nokategori'];
?>
            <tr>
                <td><?php echo $idkat;?></td>
                <td colspan ="2"><h5><?php echo $namakat;?></h5></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
            </tr>
<?php
                $xkata = 0;
                $xkat = 0;
                $querynamasub = "SELECT idkategori, idsubkategori, UCASE(subkategori) AS subkategori FROM subkategori WHERE  laporan = 'Neraca' AND  kategori = '$idkat' AND idkategori NOT IN (33) ORDER BY idsubkategori;";
                $resultnamasub = mysqli_query($connect, $querynamasub);
                while($rownamasub = mysqli_fetch_assoc($resultnamasub)){
                    $idsubkat = $rownamasub['idsubkategori'];
                    $subkat = $rownamasub['subkategori'];
                    $idsub = $rownamasub['idkategori'];
?>


            <tr>
                
                <td><?php echo $idsubkat;?></td>
                <td style="border-right:none;" width="6px"></td>
                <td><h5><?php echo $subkat;?></h5></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
            </tr>

        
<?php
                    $xsubkat = 0;
                    $queryakun = "SELECT * FROM akun WHERE neraca = '$idsub' ORDER BY kodeakun;";
                    $resultakun = mysqli_query($connect, $queryakun);
                    while($rowakun = mysqli_fetch_assoc($resultakun)){
                        $kodeakun = $rowakun['kodeakun'];
                        $namaakun = $rowakun['namaakun'];
                            if (isset($_GET['tanggal']))
                        {
                          $tgl=$_GET['tanggal'];
                        }
                        else
                        {
                           $tgl=date("Y-m");
                        }
                        $querytgl = "SELECT MAX(tgl) as tgl FROM bukubesar WHERE kodeakun = '$kodeakun' and tgl like '$tgl%%'";
                        $resultgl = mysqli_query($connect, $querytgl);
                        $rowtgl = mysqli_fetch_assoc($resultgl);
                        $tglcari = $rowtgl['tgl'];
                        
                        $querysaldo = "SELECT saldo FROM bukubesar WHERE tgl = '$tglcari%%' AND kodeakun = '$kodeakun' ORDER BY idbb DESC LIMIT 1";
                        $resultsaldo = mysqli_query($connect, $querysaldo);
                        $rowsaldo = mysqli_fetch_assoc($resultsaldo);
                        if($rowsaldo['saldo'] < 0){
                            $saldo = $rowsaldo['saldo']*(-1);
                        }else{
                            $saldo = $rowsaldo['saldo'];
                        }
?>
            <tr>
                <td><?php echo $kodeakun;?></td>
                <td style="border-right:none;" width="6px"></td>
                <td><h5><?php echo $namaakun;?></h5></td>
                <td class="text-right"></td>
                <td class="text-right"><h5><?php echo number_format($saldo)."";?></h5></td>
            </tr>
<?php
                        $xsubkat = $saldo+$xsubkat;
                    }
?>
            <tr>
                <td></td>
                <td style="border-right:none;" width="6px" bgcolor="#e1f5fe"></td>
                <td bgcolor="#e1f5fe"><h5>JUMLAH <?php echo $subkat;?></h5></td>
                <td class="text-right" bgcolor="#e1f5fe"></td>
                <td class="text-right" bgcolor="#e1f5fe"><h5><?php echo number_format($xsubkat)."";?></h5></td>
            </tr>
<?php
                    


                    $xkat = $xkat+$xsubkat;
                    if ($xkat < 0) {
                        $xkata = $xkat * -(1);
                        }else{
                            $xkata = $xkat;
                    }
                }
?>

            
            <tr>
                <td>4</td>
                <td style="border-right:none;" width="6px"></td>
                <td><h5>Persediaan</h5></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                </tr>
<?php
error_reporting(0);
                $query = "SELECT *  FROM tb_barang B JOIN tb_kategori_barang K ON B.kategori_id=K.kategori_id"; 
                $sql_kul = mysqli_query($connect,$query);
                
                while ($m = mysqli_fetch_assoc($sql_kul)) {

                        // $id = $m['kode_barang'];
                        // if(isset($_GET['tanggal'])){
                        //  $tgl = $_GET['tanggal'];
                        //  $sql = mysqli_query($connect,"SELECT qty FROM tb_detail_pembelian WHERE timestmp LIKE '$tgl%%' AND kode_barang = '$id'");
                        // }else{
                        // $sql = mysqli_query($connect,"SELECT qty FROM tb_detail_pembelian WHERE  kode_barang = '$id'");
                        // }
                        // $total = 0;
                        // while($data = mysqli_fetch_array($sql)){ 
                        //  $total = $total + $q['qty'];

                        if (isset($_GET['tanggal']))
                        {
                          $tgl=$_GET['tanggal'];
                        }
                        else
                        {
                           $tgl=date("Y-m");
                        }
                          
                                $stok_masuk = stok_masuk($m['kode_barang'],$tgl);
                                $stok_keluar = stok_keluar($m['kode_barang'],$tgl);
                                $stok_awal = stok_awal($m['kode_barang'],$tgl);
                                $total_stok = ($stok_awal + $stok_masuk) - $stok_keluar;
                                $harga = $m['harga_jual'];
                                if ($m['kode_barang'] == 'P05') {
                                    $hargaton = $harga * 25 ;
                                    $total = $hargaton * $total_stok;
                                }else{
                                    $hargaton = $harga * 20 ;
                                $total = $hargaton * $total_stok;
                                }
                                

                                $jumlah += $total;
                    
?>
            <tr>
                <td></td>
                <td style="border-right:none;" width="6px"><?php echo $m['kode_barang'];?></td>
                <td><h5><?php echo $m['nama_barang'];?> <?php echo $m['nama_kategori'];?></h5></td>
                <td><h5><?php echo $total_stok;?> TON &nbsp;&nbsp;&nbsp; X &nbsp;&nbsp;&nbsp; <?php echo number_format($hargaton)."";?></h5></td>
                <td class="text-right"><h5><?php echo number_format($total)."";?></h5></td>
            </tr>

            
<?php
                }
?>
            <tr>
                <td></td>
                <td colspan="2" bgcolor=#e1f5fe><h4>JUMLAH PERSEDIAAN</h4></td>
                <td class="text-center" bgcolor=#e1f5fe></td>
                <td class="text-right" bgcolor=#e1f5fe><h4><?php echo number_format($jumlah)."";?></h4></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="2" bgcolor="#6ad2eb"><h4>JUMLAH <?php echo $namakat;?></h4></td>
                <td class="text-center" bgcolor="#6ad2eb"></td>
                <td class="text-right" bgcolor="#6ad2eb"><h4><?php echo number_format($xkata)."";?></h4></td>
            </tr>
<?php
                $xend = $xkat-$xend;
            }

?>




<!---------------------------------------------KEWAJIBAN------------------------------------------>
<?php
        $xkewajibanend = 0;
            $querynamakat = "SELECT nokategori, UCASE(namakategori) as namakategori FROM kategori WHERE nokategori = '2';";
            $resultnamakat = mysqli_query($connect, $querynamakat);
            while($rownamakat = mysqli_fetch_assoc($resultnamakat)){
                $namakat = $rownamakat['namakategori'];
                $idkat = $rownamakat['nokategori'];
?>
            <tr>
                <td><?php echo $idkat;?></td>
                <td colspan ="3"><h5><?php echo $namakat;?></h5></td>
                <td class="text-center"></td>
                
            </tr>
<?php
                $xkewajibana = 0;
                $xkewajiban = 0;
                $querynamasub = "SELECT idkategori, idsubkategori, UCASE(subkategori) AS subkategori FROM subkategori WHERE laporan = 'Neraca' AND kategori = '$idkat' ORDER BY idsubkategori;";
                $resultnamasub = mysqli_query($connect, $querynamasub);
                while($rownamasub = mysqli_fetch_assoc($resultnamasub)){
                    $idsubkat = $rownamasub['idsubkategori'];
                    $subkat = $rownamasub['subkategori'];
                    $idsub = $rownamasub['idkategori'];
?>
            <tr>
                <td><?php echo $idsubkat;?></td>
                <td style="border-right:none;" width="6px"></td>
                <td td colspan ="2"><h5><?php echo $subkat;?></h5></td>
                <td class="text-center"></td>
            </tr>
<?php
                    $xsubkewajiban = 0;
                    $queryakun = "SELECT * FROM akun WHERE neraca = '$idsub' ORDER BY kodeakun;";
                    $resultakun = mysqli_query($connect, $queryakun);
                    while($rowakun = mysqli_fetch_assoc($resultakun)){
                        $kodeakun = $rowakun['kodeakun'];
                        $namaakun = $rowakun['namaakun'];
                        if (isset($_GET['tanggal']))
                        {
                          $tgl=$_GET['tanggal'];
                        }
                        else
                        {
                           $tgl=date("Y-m");
                        }
                        $querytgl = "SELECT MAX(tgl) as tgl FROM bukubesar WHERE kodeakun = '$kodeakun' and tgl like '$tgl%%'";
                        $resultgl = mysqli_query($connect, $querytgl);
                        $rowtgl = mysqli_fetch_assoc($resultgl);
                        $tgl = $rowtgl['tgl'];
                        
                        $querysaldo = "SELECT saldo FROM bukubesar WHERE tgl = '$tgl' AND kodeakun = '$kodeakun' ORDER BY idbb DESC LIMIT 1";
                        $resultsaldo = mysqli_query($connect, $querysaldo);
                        $rowsaldo = mysqli_fetch_assoc($resultsaldo);
                        if($rowsaldo['saldo'] < 0){
                            $saldo = $rowsaldo['saldo']*(-1);
                        }else{
                            $saldo = $rowsaldo['saldo'];
                        }
?>
            <tr>
                <td><?php echo $kodeakun;?></td>
                <td style="border-right:none;" width="6px"></td>
                <td td colspan ="2"><h5><?php echo $namaakun;?></h5></td>
                <td class="text-right"><h5><?php echo number_format($saldo)."";?></h5></td>
            </tr>
<?php
                        $xsubkewajiban = $saldo+$xsubkewajiban;
                    }
?>
            <tr>
                <td></td>
                <td style="border-right:none;" width="6px" bgcolor="#e1f5fe"></td>
                <td bgcolor="#e1f5fe"><h5>JUMLAH <?php echo $subkat;?></h5></td>
                <td class="text-center" bgcolor="#e1f5fe"></td>
                <td class="text-right" bgcolor="#e1f5fe"><h5><?php echo number_format($xsubkewajiban)."";?></h5></td>
            </tr>
<?php
                    


                    $xkewajiban = $xkewajiban+$xsubkewajiban;
                    if ($xkewajiban < 0) {
                        $xkewajibana = $xkewajiban ;
                        }else{
                            $xkewajibana = $xkewajiban;
                    }
                }
?>
            <tr>
                <td></td>
                <td colspan="2" bgcolor="#6ad2eb"><h4>JUMLAH <?php echo $namakat;?></h4></td>
                <td class="text-center" bgcolor="#6ad2eb"></td>
                <td class="text-right" bgcolor="#6ad2eb"><h4><?php echo number_format ($xkewajibana)."";?></h4></td>
            </tr>
<?php
                $xkewajibanend = $xkewajiban-$xkewajibanend;
            }

?>




                 </tbody>
                            </table>
                     </div>
                      
                    </div>
               
    </body>
</html>