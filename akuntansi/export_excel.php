<!DOCTYPE html>
<html>
<head>
	<title>COLI</title>
</head>
<body>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=exesp.xls");
	?>

	<center>
		<h1>ENTHU <br/>CROT </h1>
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
                                $sql = "SELECT noju FROM jurnalumum GROUP BY noju ORDER BY tgl";
                                //$sql = "SELECT * FROM akun";
                                $no = 1;
                                $result = mysqli_query($connect, $sql);
                            
                                while($row = mysqli_fetch_assoc($result)){
                                    $sqlrowspan = "SELECT COUNT(noju) as jumlah, tgl FROM jurnalumum WHERE noju = '".$row['noju']."'";
                                    $resultrowspan = mysqli_query($connect, $sqlrowspan);
                                    $rowofrowspan = mysqli_fetch_assoc($resultrowspan);
                                    $rowspan = $rowofrowspan['jumlah'];
                                    $tgl = $rowofrowspan['tgl'];
                                ?>
									<tr>
										<td class="text-center" rowspan="<?php echo $rowspan;?>"><?php echo $tgl;?></td>
                                    <?php
                                    $sqlall = "SELECT * FROM jurnalumum WHERE noju = '".$row['noju']."' ORDER by tgl ASC, nobukti";
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