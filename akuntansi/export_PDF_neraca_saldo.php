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


                            $nim = base64_decode($_GET['user']);
                            $idsoal = base64_decode($_GET['id']);
                            $dbname = "asp2";
                            $host = "localhost";
                            $username = "root";
                            $password = "";
                            $conn = mysqli_connect($host, $username, $password,$dbname);
                            if (mysqli_connect_errno()) {
                            echo "Koneksi ke server gagal dilakukan.";
                            exit();
                            }
                            


							
							
                            
?>
<?php                           
echo"idsoal = $idsoal";
echo"<br>";
echo"nim = $nim";
?>


                                <table border="1" align="center">
                                <thead>
                                    <tr>
                                        <th class='text-center'>No</th>
                                        <th class='text-center'>ID Akun</th>
                                        <th class='text-center'>Uraianbb</th>
                                        <th class='text-center'>kredit</th>
                                        <th class='text-center'>debit</th>
                                    </tr>
                                </thead>
                                                        
                                                        
                                                        
                                <tbody>
                                <?php
                                                        $sql = "  SELECT t.namaakun, t.kodeakun, t.namaakun, t.tgl, t.saldo,
                                                        @k:=IF(akun.posisi='kredit',t.saldo,0) AS kredit,
                                                        @d:=IF(akun.posisi='debit',t.saldo,0) AS debit 
                                                        FROM bukubesar t
                                                        INNER JOIN (
                                                            SELECT kodeakun, MAX(tgl) AS MaxTanggal
                                                            FROM bukubesar
                                                            GROUP BY kodeakun ASC
                                                        ) tm ON t.kodeakun = tm.kodeakun AND t.tgl = tm.MaxTanggal 
                                                        JOIN akun ON akun.kodeakun = t.kodeakun
                                                        where t.nim = '".$nim."' and t.idsoal = '".$idsoal."' GROUP BY kodeakun ASC";

                                                        //$sql = "SELECT * FROM akun";
                                                        $no = 1;
                                                        $result = mysqli_query($conn, $sql);


                                                        $sql2 = " SELECT SUM(t.saldo) AS jumlahkredit
                                                        FROM bukubesar t
                                                        INNER JOIN (
                                                            SELECT kodeakun, MAX(tgl) AS MaxTanggal
                                                            FROM bukubesar
                                                            GROUP BY kodeakun ASC
                                                        ) tm ON t.kodeakun = tm.kodeakun AND t.tgl = tm.MaxTanggal 
                                                        JOIN akun ON akun.kodeakun = t.kodeakun
                                                        WHERE akun.posisi = 'kredit'
                                                        AND t.nim = '".$nim."' and t.idsoal = '".$idsoal."';";
                                                        //$sql = "SELECT * FROM akun";
                                                        $result2 = mysqli_query($conn, $sql2);

                                                        $sql3 = " SELECT SUM(t.saldo) AS jumlahdebit
                                                        FROM bukubesar t
                                                        INNER JOIN (
                                                            SELECT kodeakun, MAX(tgl) AS MaxTanggal
                                                            FROM bukubesar
                                                            GROUP BY kodeakun ASC
                                                        ) tm ON t.kodeakun = tm.kodeakun AND t.tgl = tm.MaxTanggal 
                                                        JOIN akun ON akun.kodeakun = t.kodeakun
                                                        WHERE akun.posisi = 'debit'
                                                         AND t.nim = '".$nim."' and t.idsoal = '".$idsoal."';";

                                                        //$sql = "SELECT * FROM akun";
                                                        $result3 = mysqli_query($conn, $sql3);


                                while($row = mysqli_fetch_assoc($result)){
                                                        ?>
                                                        <tr>
                                        <td class="text-center"><?php echo $no;?></td>
                                        <td class="text-center"><?php echo $row['kodeakun'];?></td>
                                        <td class="text-center"><?php echo $row['namaakun'];?></td>
                                        <td class="text-center"><?php echo number_format($row['kredit'] * -1) ;?></td>
                                        <td class="text-center"><?php echo number_format($row['debit']);?></td>
                                </tr>
                                    <?php
                                                        $no++;
                                                        }
                            
                                                        ?>

                                                        <?php
                                                        $row2 = mysqli_fetch_assoc($result2);
                                                        $row3 = mysqli_fetch_assoc($result3);
                                                        ?>
                                                        <tr>
                                                               <td colspan="3" class="text-center">Grand Total</td>
                                                               <td class="text-center"><?php echo $row2['jumlahkredit'] * -1 ;?></td>
                                                               <td class="text-center"><?php echo $row3['jumlahdebit'];?></td>
                                                        </tr>
                                                        


                     </tbody>
                            </table>

<?php
$html = ob_get_contents();
ob_end_clean();
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output("Neraca Saldo_$nim.pdf", "D");
echo "<script type='text/javascript'> window.location.href ='mahasiswa_data_akun.php'; </script>";
?>