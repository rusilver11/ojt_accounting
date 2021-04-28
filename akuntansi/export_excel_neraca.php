<?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Neraca_Pupuk-$tgl.xls");
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>NERACA</title>
</head>
<body>

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
    
   <center>
       <h1>Neraca  <br/>PD. CANDA BIRAWA</h1><small>Jl. PANGLIMA SUDIRMAN NO.141 KEDIRI JAWA TIMUR</small>
    </center>

    <table border="1">
        <tr>
        <th>Kode Akun</th>
        <th colspan="2">Uraian</th>
       <th>Jumlah</th>
        </tr>
        
        <?php
        $connect = mysqli_connect("localhost","root","","candabirawa");
            ?>
            
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
            </tr>
<?php
                $xkata = 0;
                $xkat = 0;
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
                <td><h5><?php echo $subkat;?></h5></td>
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
                        $tgl = $rowtgl['tgl'];
                        
                        $querysaldo = "SELECT saldo FROM bukubesar WHERE tgl = '$tgl' AND kodeakun = '$kodeakun' ORDER BY idbb DESC LIMIT 1";
                        $resultsaldo = mysqli_query($connect, $querysaldo);
                        $rowsaldo = mysqli_fetch_assoc($resultsaldo);
                        if($rowsaldo['saldo'] < 0){
                            $saldo = $rowsaldo['saldo'];
                        }else{
                            $saldo = $rowsaldo['saldo'];
                        }
?>
            <!-- <tr>
                <td><?php echo $kodeakun;?></td>
                <td style="border-right:none;" width="6px"></td>
                <td><h5><?php echo $namaakun;?></h5></td>
                <td class="text-right"><h5><?php echo number_format($saldo)."";?></h5></td>
            </tr> -->
<?php
                        $xsubkat = $saldo+$xsubkat;
                    }
?>
            <tr>
                <td></td>
                <td style="border-right:none;" width="6px" bgcolor="#e1f5fe"></td>
                <td bgcolor="#e1f5fe"><h5>JUMLAH <?php echo $subkat;?></h5></td>
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
                <td></td>
                <td colspan="2" bgcolor="#6ad2eb"><h4>JUMLAH <?php echo $namakat;?></h4></td>
                <td class="text-right" bgcolor="#6ad2eb"><h4><?php echo number_format($xkata)."";?></h4></td>
            </tr>
<?php
                $xend = $xkat-$xend;
            }

?>




<!---------------------------------------------KEWAJIBAN------------------------------------------>
            <tr>
                <td></td>
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
                <td colspan ="2"><h5><?php echo $namakat;?></h5></td>
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
                <td><h5><?php echo $subkat;?></h5></td>
                <td class="text-center"></td>
            </tr>
<?php
                    $xsubkewajiban = 0;
                    $queryakun = "SELECT * FROM akun WHERE neraca = '$idsub' ORDER BY kodeakun;";
                    $resultakun = mysqli_query($connect, $queryakun);
                    while($rowakun = mysqli_fetch_assoc($resultakun)){
                        $kodeakun = $rowakun['kodeakun'];
                        $namaakun = $rowakun['namaakun'];
                        $querytgl = "SELECT MAX(tgl) as tgl FROM bukubesar WHERE kodeakun = '$kodeakun'";
                        $resultgl = mysqli_query($connect, $querytgl);
                        $rowtgl = mysqli_fetch_assoc($resultgl);
                        $tgl = $rowtgl['tgl'];
                        
                        $querysaldo = "SELECT saldo FROM bukubesar WHERE tgl = '$tgl' AND kodeakun = '$kodeakun' ORDER BY idbb DESC LIMIT 1";
                        $resultsaldo = mysqli_query($connect, $querysaldo);
                        $rowsaldo = mysqli_fetch_assoc($resultsaldo);
                        if($rowsaldo['saldo'] < 0){
                            $saldo = $rowsaldo['saldo']*(-1);
                        }else{
                            $saldo = $rowsaldo['saldo']*(-1);
                        }
?>
            <!-- <tr>
                <td><?php echo $kodeakun;?></td>
                <td style="border-right:none;" width="6px"></td>
                <td><h5><?php echo $namaakun;?></h5></td>
                <td class="text-right"><h5><?php echo number_format($saldo)."";?></h5></td>
            </tr> -->
<?php
                        $xsubkewajiban = $saldo+$xsubkewajiban;
                    }
?>
            <tr>
                <td></td>
                <td style="border-right:none;" width="6px" bgcolor="#e1f5fe"></td>
                <td bgcolor="#e1f5fe"><h5>JUMLAH <?php echo $subkat;?></h5></td>
                <td class="text-right" bgcolor="#e1f5fe"><h5><?php echo ($xsubkewajiban)."";?></h5></td>
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
<td></td>
                <td colspan="2" bgcolor="#6ad2eb"><h4>JUMLAH <?php echo $namakat;?></h4></td>
                <td class="text-right" bgcolor="#6ad2eb"><h4><?php echo ($xkewajibana)."";?></h4></td>
            </tr>
<?php
                $xkewajibanend = $xkewajiban-$xkewajibanend;
            }

?>
             
        
    </table>
</body>
</html>