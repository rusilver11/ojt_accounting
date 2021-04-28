<script src="js/chart/canvasjs.min.js"></script>
<script src="js/chart/jquery.canvasjs.min.js"></script>

<?php
include"lib/conn.php";
	date_default_timezone_set('Asia/Jakarta');

	if(!isset($_SESSION['login_user'])){
		header('location: login.php'); // Mengarahkan ke Home Page
	}

?>
<div class="w3-row-padding" style="margin-top: 20px;">
	<div class="w3-col s8">
		<span style="display: inherit; background: #21a626; color: #fff; padding: 10px;">Dashboard</span>
		<div style="border-bottom:1px dashed #ccc;"></div><br>

		<?php
		include"lib/conn.php";
			$jmlsup = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tb_supplier"));
			$jmlpel = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kios"));
			$jmlpj = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tb_penjualan"));
			$jmlbrg = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tb_barang"));
		?>

		<div class="w3-row-padding">
			<div class="w3-col s9">
				<div class="w3-card-4 w3-green w3-leftbar w3-border-blue" style="width:100%;"><h3><b><i class="fa fa-cubes"></i><?php echo $jmlbrg; ?></b></h3>
				<span class="w3-tiny">Data Barang</span></div>
			</div>

			<div class="w3-col s9">
				<div class="w3-card-4 w3-yellow w3-leftbar w3-border-red" style="width:100%;"><h3><b><i class="fa fa-user"></i> <?php echo $jmlsup; ?></b></h3>
				<span class="w3-tiny">Data Supplier</span></div>
			</div>

			<div class="w3-col s9">
				<div class="w3-card-4 w3-indigo w3-leftbar w3-border-red" style="width:100%;"><h3><b><i class="fa fa-group"></i> <?php echo $jmlpel; ?></b></h3>
				<span class="w3-tiny">Data Pelanggan</span></div>
			</div>


			<div class="w3-col s9">
				<div class="w3-card-4 w3-blue w3-leftbar w3-border-red" style="width:100%;"><h3><b><i class="fa fa-shopping-cart"></i> <?php echo $jmlpj; ?></b></h3>
				<span>Transaksi Penjualan</span></div>
			</div>
		</div>
	</div>
	<div class="w3-col s4 w3-card">
		<?php
		include"lib/conn.php";
		if(isset($_SESSION['level']) AND ($_SESSION['level'] == "admin")) :
		?>
		Aktifitas Transaksi
		<div style="border-bottom:1px solid #ccc;"></div><br>
		<table class='w3-table w3-tiny w3-striped'>
		<?php
			$rlog = mysqli_query($conn,"SELECT * FROM tb_log 
									ORDER BY id_log DESC LIMIT 10");
			$no = 1;
			while ($l = mysqli_fetch_assoc($rlog)) {
				echo"<tr style='border-bottom:1px dashed #ccc;'>
					<td>$no.</td>
					<td><i>$l[timestmp] - ".$l['deskripsi']."</i></td>
				</tr>";

				$no++;
			}

		?>
		</table><br>
		<?php
		endif;
		?>
	</div>
</div>