<?php
		function stok_masuk($id,$tgl)
	{
		include"koneksi.php";
		$sql = mysqli_query($connect,"SELECT qty FROM tb_detail_pembelian 
				join tb_pembelian ON tb_pembelian.no_faktur = tb_detail_pembelian.no_faktur 
				WHERE tb_pembelian.tgl_beli LIKE '$tgl%%' AND kode_barang = '$id'");
		$total = 0;
		while ($q = mysqli_fetch_assoc($sql)) {
			$total = $total + $q['qty'];
		}
		return $total;
	}

		function stok_keluar($id,$tgl)
	{
		include"koneksi.php";
		$sql = mysqli_query($connect,"SELECT qty FROM tb_detail_penjualan 
				join tb_penjualan ON tb_penjualan.no_transaksi = tb_detail_penjualan.no_transaksi 
				WHERE tb_penjualan.tgl_transaksi LIKE '$tgl%%' AND kode_barang = '$id'");
		$total = 0;
		while ($q = mysqli_fetch_assoc($sql)) {
			$total = $total + $q['qty'];
		}
		return $total;
	}

	function stok_awal($id,$tgl)
	{
		include"koneksi.php";
		$sql = mysqli_query($connect,"SELECT stok FROM tb_stok WHERE tanggal LIKE '$tgl%%' AND kode = '$id'");
		$total = 0;
		while ($q = mysqli_fetch_assoc($sql)) {
			$total = $total + $q['stok'];
		}
		return $total;
	}
?>