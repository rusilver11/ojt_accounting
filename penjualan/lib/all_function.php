<?php
	date_default_timezone_set('Asia/Jakarta');

	function nama_m($id)
	{
		include"conn.php";
		$sql = mysqli_query($conn,"SELECT * FROM menu WHERE id_menu = '$id'") ;
		$m = mysqli_fetch_assoc($sql);

		return $m['nama_menu'];
	}

	function total_pembelian($no_faktur)
	{
		include"conn.php";
		$sqlbeli = mysqli_query($conn,"SELECT * FROM tb_detail_pembelian WHERE no_faktur = '$no_faktur'");
		$total = 0;
		while ($b = mysqli_fetch_assoc($sqlbeli)) {
			$sub_total = $b['harga_beli'] * (($b['qty']*1000)/50);

			$total = $total + $sub_total;
		}

		$rtotal = "Rp. ".number_format($total,0);
		return $rtotal;
	}

	function total_penjualan($no_transaksi)
	{
		include"conn.php";
		$sqljual = mysqli_query($conn,"SELECT * FROM tb_detail_penjualan WHERE no_transaksi = '$no_transaksi'");
		$total = 0;
		while ($b = mysqli_fetch_assoc($sqljual)) {
			$harga_disc = $b['harga'] - (($b['harga'] * $b['disc']) / 100);
			$sub_total = $harga_disc * $b['qty'];

			$total = $total + $sub_total;
		}

		$rtotal = "Rp. ".number_format($total,0);
		return $rtotal;
	}

	function nama_petugas($id)
	{
		include"conn.php";
		$sql = mysqli_query($conn,"SELECT * FROM user WHERE id_user = '$id'") ;
		$m = mysqli_fetch_assoc($sql);

		return $m['nama'];
	}

	function nama_kategori($id)
	{
		include"conn.php";
		$sql = mysqli_query($conn,"SELECT nama_kategori FROM tb_kategori_barang 
							WHERE kategori_id = '$id'");
		$m = mysqli_fetch_assoc($sql);

		return $m['nama_kategori'];
	}

	function no_kwitansi_auto()
	{
		include"conn.php";
		$sql = mysqli_query($conn,"SELECT MAX(RIGHT(no_transaksi,5)) AS notrans 
							FROM tb_penjualan WHERE tgl_transaksi = '".date('Y-m-d')."'");
		$m = mysqli_fetch_assoc($sql);

		$no = 0;
		if($m['notrans'] <> NULL)
		{
			$kd = number_format($m['notrans'],0) + 1;
			if(strlen($kd) == 1)
			{
				$no = "CA".date('dmy')."0000".$kd;
			}
			elseif (strlen($kd) == 2) {
				$no = "CA".date('dmy')."000".$kd;
			}
			elseif (strlen($kd) == 3) {
				$no = "CA".date('dmy')."00".$kd;
			}
			elseif (strlen($kd) == 4) {
				$no = "CA".date('dmy')."0".$kd;
			}
			else {
				$no = "CA".date('dmy').$kd;
			}
		}
		else
		{
			$no = "CA".date('dmy')."00001";
		}

		return $no;
	}

	function stok_masuk($id)
	{
		include"conn.php";
		$sql = mysqli_query($conn,"SELECT qty FROM tb_detail_pembelian WHERE kode_barang = '$id'");
		$total = 0;
		while ($q = mysqli_fetch_assoc($sql)) {
			$total = $total + $q['qty'];
		}
		return $total;
	}

	function stok_keluar($id)
	{
		include"conn.php";
		$sql = mysqli_query($conn,"SELECT qty FROM tb_detail_penjualan WHERE kode_barang = '$id'");
		$total = 0;
		while ($q = mysqli_fetch_assoc($sql)) {
			$total = $total + $q['qty'];
		}
		return $total;
	}

	function stok_retur_jual($id)
	{
		include"conn.php";
		$sql = mysqli_query($conn,"SELECT qty FROM tb_retur_penjualan WHERE kode_barang = '$id'");
		$total = 0;
		while ($q = mysqli_fetch_assoc($sql)) {
			$total = $total + $q['qty'];
		}
		return $total;
	}

	function stok_retur_beli($id)
	{
		include"conn.php";
		$sql = mysqli_query($conn,"SELECT qty FROM tb_retur_pembelian WHERE kode_barang = '$id'");
		$total = 0;
		while ($q = mysqli_fetch_assoc($sql)) {
			$total = $total + $q['qty'];
		}
		return $total;
	}

	function anti_inject($data)
	{
		$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
		return $filter_sql;
	}



?>