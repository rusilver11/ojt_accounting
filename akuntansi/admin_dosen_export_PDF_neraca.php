<?php ob_start(); ?>
<?php
$db_host = 'localhost';
$db_port = '3306';
$db_name = 'asp';
$db_user = 'root';
$db_pass = '';


try {
	$pdo = new PDO( 'mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name , $db_user, $db_pass, array(PDO::MYSQL_ATTR_LOCAL_INFILE => 1) );
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	$errMessage = 'Gagal terhubung dengan MySQL' . ' # MYSQL ERROR:' . $e->getMessage();
	die($errMessage);
}


$nim = $_REQUEST['username'];


$sql = "SELECT nim, idsoal, skpd, idakun, namaakun, tgl, uraianbb, SUM(debit) AS debit, SUM(kredit) AS kredit 
		FROM `bukubesar` where nim = '$nim'
		GROUP BY idakun, namaakun, tgl, uraianbb";
$stmt = $pdo->prepare($sql);
$stmt->execute();



include 'koneksi.php';
	$query = "select * " .
	"from mahasiswa where username = $nim";
	$result = mysqli_query($connect, $query);
	if ($result) {
		while ($row = mysqli_fetch_row($result)) {
			$username100 = $row[0];
			$password100 = $row[1];
			$nama100 = $row[2];
			}
		mysqli_free_result($result);
		}
	mysqli_close($connect);

echo '<html>
		<head>
			<title>Menghitung Total dan Sub Total Dengan PHP</title>
			<style>
				body {font-family:tahoma, arial}
				table {border-collapse: collapse}
				th, td {font-size: 13px; border: 1px solid #DEDEDE; padding: 3px 5px; color: #303030}
				th {background: #CCCCCC; font-size: 12px; border-color:#B0B0B0}
				.subtotal td {background: #F8F8F8}
				.right{text-align: right}
			</style>
		</head>
		<body>';
echo " NIM		: $nim <br>Nama		: $nama100 <br><br>" ;

function format_ribuan ($nilai){
	return number_format ($nilai, 0, ',', '.');
}

// Ubah hasil query menjadi associative array dan simpan kedalam variabel result
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<table align="center">
		<thead>
			<tr>
				<th>SKPD</th>
				<th>ID Akun</th>
				<th>Tgl</th>
				<th>Uraianbb</th>
				<th>debit</th>
				<th>kredit</th>
			</tr>
		</thead>
		<tbody>';
		
$subtotal_idakun = $subtotal_idakun2 = $debit = $kredit = 0;
foreach ($result as $key => $row)
{
	
	$subtotal_idakun += $row['debit'];
	$subtotal_idakun2 += $row['kredit'];
	echo '<tr>
			<td>'.$row['skpd'].'</td>
			<td>'.$row['idakun'].'</td>
			<td>'.$row['tgl'].'</td>
			<td>'.$row['uraianbb'].'</td>
			<td class="right">'.format_ribuan($row['debit']).'</td>
			<td class="right">'.format_ribuan($row['kredit']).'</td>
		</tr>';
		
	// SUB TOTAL per thn_br
	if (@$result[$key+1]['idakun'] != $row['idakun']) {
		echo '<tr class="subtotal">
			<td>SUB TOTAL ' . $row['idakun'] . '</td>
			<td></td>
			<td></td>
			<td></td>
			<td class="right">'.format_ribuan($subtotal_idakun).'</td>
			<td class="right">'.format_ribuan($subtotal_idakun2).'</td>
		</tr>';
		$subtotal_idakun = 0;
		$subtotal_idakun2 = 0;
	} 
	$debit += $row['debit'];
	$kredit += $row['kredit'];
}

echo '<tr class="total">
		<td>GRAND TOTAL</td>
		<td></td>
		<td></td>
		<td></td>
		<td class="right"> ' . format_ribuan($debit) . '</td>
		<td class="right"> ' . format_ribuan($kredit) . '</td>
	</tr>
	</tbody>
</table>
</body>
</html>';
$html = ob_get_contents();
ob_end_clean();
        
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Data Siswa.pdf', 'D');
?>
