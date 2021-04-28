<?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Jurnal_Umum_Pupuk-$tgl.xls");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Jurnal Umum</title>
</head>
<body>

    <center>
       <h1>JURNAL UMUM <br/>PD. CANDA BIRAWA</h1><small>Jl. PANGLIMA SUDIRMAN NO.141 KEDIRI JAWA TIMUR</small>
    </center>

    <table border="1">
        <tr>
        <th>Tanggal</th>
        <th>No Bukti</th>
        <th>Kode Akun</th>
        <th>Uraian</th>
        <th>Ref</th>
        <th>Debit</th>
        <th>Kredit</th>
        </tr>
        
        <?php
        $connect = mysqli_connect("localhost","root","","candabirawa");
        $tgl=$_GET['tanggal'];
                                 
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
        
    </table>
</body>
</html>