<?php ob_start(); ?>
<style type="text/css">
table {  
    color: #333;
    font-family: Helvetica, Arial, sans-serif;
    font-size: 15px;
    width: 650px; 
    border-collapse: 
    collapse; border-spacing: 0; 
}

td, th {  
    border: 1px solid transparent; /* No more visible border */
    height: 30px; 
    width: 120px;
    transition: all 0.3s;  /* Simple transition for hover effect */
}

th {  
    background: #DFDFDF;  /* Darken header a bit */
    font-weight: bold;
}

td {  
    background: #FAFAFA;
}

/* Cells in even rows (2,4,6...) are one color */        
tr:nth-child(even) td { background: #F1F1F1; }   

/* Cells in odd rows (1,3,5...) are another (excludes header cells)  */        
tr:nth-child(odd) td { background: #FEFEFE; }  

tr td:hover { background: #666; color: #FFF; }  
/* Hover cell effect! */
</style>

<?php
function format_ribuan ($nilai){
return number_format ($nilai, 0, ',', '.');
}
?>

<?php
// Koneksi ke Database
$nim = $_REQUEST['nim'];
$idsoal = $_REQUEST['idsoal'];

$host="localhost";
$username="root"; 
$password="";
$database="asp2";
$con = mysqli_connect($host,$username,$password,$database);
$connect = mysqli_connect($host,$username,$password,$database);

?>
                            



                                <?php
                                $sql = "SELECT bukubesar.*, akun.namaakun FROM bukubesar, akun WHERE bukubesar.kodeakun = akun.kodeakun AND bukubesar.idsoal = '".$idsoal."' AND bukubesar.nim = '".$nim."' GROUP BY  bukubesar.kodeakun";
                                $no = 1;
                                $result = mysqli_query($connect, $sql);

                                        if($result->num_rows == null) {
                                         echo "0";;
                                         } else {
                        
                                while($row = mysqli_fetch_assoc($result)){
                                ?>
                                
                                    <br>
                                    <?php echo $row['skpd'];?>
                                    <br>
                                    <?php echo $row['kodeakun'];?>
                                    <br>
                                    <?php echo $row['namaakun'];?>
                                    <br>
                                    <br>
                                   

                                   <table >
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
$sqls = "SELECT * FROM bukubesar WHERE idsoal = '".$idsoal."' AND nim = '".$nim."' AND kodeakun = '".$row['kodeakun']."' ORDER BY tgl";
$results = mysqli_query($connect, $sqls);
while($rows = mysqli_fetch_assoc($results)){
if ($rows['kredit'] == 0 && $rows['debit'] > 0) {
    $kredit = 0;
    $debet = $rows['debit'];
}else if ($rows['debit'] == 0 && $rows['kredit'] > 0) {
    $kredit = $rows['kredit'];
    $debet = 0;
}
if ($rows['saldo'] < 0) {
    $saldo = $rows['saldo'] * -1;
	
}else{
    $saldo = $rows['saldo'];
}

?>                      
                                    <tr>
                                        <td class="text-center"><?php echo $rows['tgl'];?></td>
                                        <td class="text-center"><?php echo $rows['uraianbb'];?></td>
                                        <td class="text-center"><?php echo $rows['ref'];?></td>
                                        <td class="text-center"><?php echo number_format($debet);?></td>
                                        <td class="text-center"><?php echo number_format($kredit);?></td>
                                        <td class="text-center"><?php echo number_format($saldo);?></td>
                                    </tr>
<?php
}
?>                                    
                                         
                     </tbody>

                            </table>
                                <?php
                                $no++;
                                }
                                }
                                ?>          

                                

<?php
$html = ob_get_contents();
ob_end_clean();
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Buku_Besar_'.$nim.'.pdf','D');
?>
