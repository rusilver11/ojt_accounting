<?php
 header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Buku_Besar_Pupuk-$tgl.xls");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Buku Besar</title>
</head>
<body>

    <center>
        <h1>BUKU BESAR <br/>PD. CANDA BIRAWA</h1><small>Jl. PANGLIMA SUDIRMAN NO.141 KEDIRI JAWA TIMUR</small>
    </center>
        
        <?php
        $connect = mysqli_connect("localhost","root","","candabirawa");
            ?>
          
                            
                            
<?php
$sql = "SELECT bukubesar.*, akun.namaakun FROM bukubesar, akun WHERE bukubesar.kodeakun = akun.kodeakun GROUP BY  bukubesar.kodeakun";
$result = mysqli_query($connect, $sql);
while($row = mysqli_fetch_assoc($result)){
    ?>

                        <h4><tr>
                            <td>PD </td>
                            <td>:</td>
                            <td><!--<?php echo $row['skpd'];?>--> Canda Birawa</td>
                        </tr>   


                        <br>
                        <tr>
                            <td>Kode Akun</strong></td>
                            <td>:</strong></td>
                            <td><?php echo $row['kodeakun'];?></td>
                        
                        </tr>
                        <br>    
                        <tr>
                            <td>Nama Akun</td>
                            <td>:</td>
                            <td><?php echo $row['namaakun'];?></td>
                        
                        </tr></h4>   
                          
                             <div >
                           
                            <div>
                            <table border="1">
                                <thead>
                                    <tr>
                                    
                                        <th>Tanggal</th>                             
                                        <th>Uraian</th>
                                        <th>Ref</th>
                                        <th>Debit</th>
                                        <th>Kredit</th>
                                        <th>Saldo</th>
                                    </tr>
                                </thead>
                                
                                
                                
                                <tbody>
<?php
$tgl=$_GET['tanggal'];
$sqls = "SELECT * FROM bukubesar WHERE kodeakun = '".$row['kodeakun']."' AND tgl LIKE '$tgl%%' ORDER BY tgl";
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
                                        <td><?php echo $rows['tgl'];?></td>
                                        <td><?php echo $rows['uraianbb'];?></td>
                                        <td><?php echo $rows['ref'];?></td>
                                        <td><?php echo $debet;?></td>
                                        <td><?php echo $kredit;?></td>
                                        <td><?php echo $saldo;?></td>
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
<!--  </table> -->
</body>
</html>