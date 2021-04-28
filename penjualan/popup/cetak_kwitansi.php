<?php
// include"lib/conn.php";
 $conn = new mysqli("localhost","root","","candabirawa");
	date_default_timezone_set("Asia/Jakarta");
	$sqltrans = mysqli_query($conn,"SELECT * FROM tb_penjualan WHERE no_transaksi = '$_GET[id]'");
	$tra = mysqli_fetch_assoc($sqltrans);
?>
<h4 class="w3-text-blue" style="padding-bottom:0;margin-bottom:0;"><b>PD. CANDA BIRAWA</b></h4>
<div class="w3-row">
	<div class="w3-col s6 w3-tiny">Jl. Panglima Sudirman No. 141<br>
		Telp. 687439 - Kediri
	</div>
	<div class="w3-col s6 w3-tiny">
		<span class="w3-right">
	<br>
		</span>
	</div>
</div>
<div style="border-bottom:3px solid #ccc;"></div>
<center><h5>FAKTUR PENJUALAN</h5></center>
<?php
// include"lib/conn.php";
 $conn = new mysqli("localhost","root","","candabirawa");
	echo"<div class='w3-tiny'>
	<b>NO : #$tra[no_transaksi]</b><br>
	Kepada Yth, <br>
	$tra[nama_pelanggan] / "?><?php echo !empty($tra['kode_pelanggan']) ? $tra['kode_pelanggan'] : "-"; ?>
	<?php echo"</div>
	<div style='height:5px;'></div>";

	echo"<table class='w3-table w3-tiny w3-hoverable w3-bordered tbl' cellpadding='0'>
		<thead>
		<tr class='w3-dark-grey'>
			<th>#</th>
			
			<th>KODE</th>
			<th>NOMER DO</th>
			<th>BARANG</th>
			<th>HARGA</th>
			<th>JUMLAH</th>
			<th colspan='2'>SUB TOTAL</th>
			
		</tr>
		</thead>

		<tbody>";
	
	$sql = mysqli_query($conn,"SELECT a.*, b.nama_barang, b.satuan 
						FROM tb_detail_penjualan a LEFT JOIN tb_barang b 
						ON a.kode_barang = b.kode_barang
						WHERE a.no_transaksi = '$_GET[id]'");
	$sub_total = 0;
	$sub_total1 = 0;
	$sub_total2 = 0;
	$total = 0;
	$no = 1;
	while($p = mysqli_fetch_assoc($sql))
	{
		if ($p['kode_barang'] == 'P05') {

				$harga_disc = $p['harga'] - (($p['harga'] * $p['disc']) / 100);
				$sub_total1 = $harga_disc * (($p['qty']*1000)/40);

		
			echo"<tr>
			<td>$no</td>
			
			<td>$p[kode_barang]</td>
			<td>$p[no_do]</td>
			<td>$p[nama_barang]</td>
			<td>Rp. $p[harga] </td>
			<td>$p[qty] $p[satuan]</td>
			<td>Rp. ".number_format($sub_total1)."</td>
			
		</tr>";
		$no++;
			
		}else{

		$harga_disc = $p['harga'] - (($p['harga'] * $p['disc']) / 100);
		$sub_total = $harga_disc * (($p['qty']*1000)/50);
		$sub_total2 += $sub_total;
		
		echo"<tr>
			<td>$no</td>
			
			<td>$p[kode_barang]</td>
			<td>$p[no_do]</td>
			<td>$p[nama_barang]</td>
			<td>Rp. $p[harga] </td>
			<td>$p[qty] $p[satuan]</td>
			<td>Rp. ".number_format($sub_total)."</td>
			
		</tr>";
		$no++;

		}
	}
	$total = $sub_total1 + $sub_total2;
	$total_bayar = $total - $tra['potongan'];
	$sisa = $tra['bayar'] - $total_bayar;

	echo"</tbody>
		<tfoot>
		<tr class='w3-light-grey'>
			<td colspan='5'>Total Harga</b></td>
			<td></td>
			<td>Rp. ".number_format($total)."</td>
		</tr>
		<tr class='w3-light-grey'>
			<td colspan='5'>Potongan Harga</td>
			<td></td>
			<td>Rp. ".number_format($tra['potongan'])."</td>
		</tr>
		<tr class='w3-light-grey'>
			<td colspan='5'><b>Total Bayar</b></td>
			<td></td>
			<td><b>Rp. ".number_format($total_bayar)."</b></td>
		</tr>
		<tr class='w3-light-grey'>
			<td colspan='5'><b>Pembayaran</b></td>
			<td></td>
			<td><b>Rp. ".number_format($tra['bayar'])."</b></td>
		</tr>
		<tr class='w3-light-grey'>
			<td colspan='5'><b>Kembali</b></td>
			<td></td>
			<td><b>Rp. ".number_format($sisa)."</b></td>
		</tr>
		</tfoot>
	</table>";

?>
<br>
<div class="w3-row-padding w3-tiny">
	<div class="w3-col s4 w3-center">
		<br>
		<p>Tanda Terima,</p>
		<br>
		<br>

		<p>( _________________________ )</p>
	</div>

	<div class="w3-col s4">
		<div class="w3-border w3-padding" style="font-size:8px;text-align:justify;">
				* Barang yang sudah dibeli tidak dapat dikembalikan<br>
				* Barang-barang yang diservice, apabila tidak diambil dalam jangka 3 bulan, resiko kehilangan bukan menjadi tanggung jawab kami
			<br>
			
		</div>

	</div>

	<div class="w3-col s4 w3-center">
		<p>Kediri, <?php echo date('d-m-Y', strtotime($tra['tgl_transaksi'])); ?>
		<br>Hormat Kami,</p>
		<br>
		<br>

		<p>( _________________________ )</p>
	</div>

</div>