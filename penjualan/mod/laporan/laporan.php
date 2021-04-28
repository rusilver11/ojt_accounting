<?php
	include"lib/conn.php";
	if(!isset($_SESSION['login_user'])){
		header('location: ../../login.php'); // Mengarahkan ke Home Page
	}

	if(isset($_SESSION['kategori']) AND $_SESSION['kategori'] <> 'TRUE')
	{
		echo"<div class='w3-container w3-red'><p>Dilarang mengakses file ini.</p></div>";
		die();
	}

	//link buat paging
	$linkaksi = 'med.php?mod=laporan';

	if(isset($_GET['act']))
	{
		$act = $_GET['act'];
		$linkaksi .= '&act='.$act;
	}
	else
	{
		$act = '';
	}

	switch ($act) {
		case 'stokbarang':
			echo"<div class='w3-container w3-small w3-pale-green w3-leftbar w3-border-green'>
				<h4 style='margin-bottom:0;padding-bottom:0;'>Laporan Stok Barang</h4>
				<p style='margin-top:0;padding-top:0;'><i>Laporan sisa stok seluruh barang</i></p>
			</div>";

			echo"<table style='margin-top:12px;'>
				<tr>
					<td>
						<form class='w3-tiny' action='' method='GET'>	
							<input type='hidden' name='mod' value='laporan'>
							<input type='hidden' name='act' value='stokbarang'>
							<div class='w3-row'>
								<div class='w3-col s1'>
									<label class='w3-label'>Search</label>
								</div>
								<div class='w3-col s2'>
									<select name='field' class='w3-select w3-padding'>
										<option value=''>- Pilih -</option>
										<option value='nama_barang'>NAMA BARANG</option>
										<option value='tgl_input'>TGL INPUT</option>
										<option value='harga_beli'>HARGA BELI</option>
										<option value='harga_jual'>HARGA JUAL</option>
										<option value='jml_stok'>JML STOK</option>
									</select>
								</div>
								<div class='w3-col s4'>
									<input type='text' name='cari' class='w3-input' placeholder='cari ...'>
								</div>
								<div class='w3-col s1'>
									<button type='submit' class='w3-btn w3-tiny'><i class='fa fa-paper-plane'></i> GO</button>
								</div>
							</div>
						</form>
					</td>
					<td>BULAN</td>
					<td>
						<form method='POST' class='form-horizontal form-bordered'>
						
                            <div class='form-group'>
                            <div class='col-md-9'>
                            <input type='month' name='tanggal'>
                            <input type='submit' value='Pilih Bulan' class='w3-btn w3-tiny'>
                            </div>
                            </div>
                            </form>
					</td>	

					<td align='right'><a href='med.php?mod=laporan&act=stokbarang' class='w3-btn w3-dark-grey w3-small'><i class='fa fa-refresh'></i> Refresh</a>
					</td>
				</tr>
				
			</table>";

			echo"<div style='margin-top:12px;margin-bottom:12px;'>
			<table class='w3-table w3-striped w3-bordered w3-tiny w3-hoverable tbl'>
				<thead>
					<tr class='w3-yellow'>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th colspan='4'><center>STOK</center></th>
						
						
					</tr>
					<tr class='w3-yellow'>
						<th rowspan='2'>NO</th>
						<th rowspan='2'>KODE BARANG</th>
						<th rowspan='2'>NAMA BARANG</th>
						<th rowspan='2'>SATUAN</th>
						<th rowspan='2'>KATEGORI</th>
						<th>AWAL</th>
						<th>MASUK</th>
						<th>KELUAR</th>
						<th>TOTAL</th>
						
					</tr>
				</thead>
				<tbody>";

				$p      = new Paging;
				$batas  = 10;
			    if(isset($_GET['show']) && is_numeric($_GET['show']))
				{
					$batas = (int)$_GET['show'];
					$linkaksi .="&show=$_GET[show]";
				}

				$posisi = $p->cariPosisi($batas);

				$query = "SELECT * FROM tb_barang ";

				$q 	= "SELECT * FROM tb_barang";

				if(!empty($_GET['field']))
				{
					$hideinp = "<input type='hidden' name='field' value='$_GET[field]'>
								<input type='hidden' name='cari' value='$_GET[cari]'>";

					$linkaksi .= "&field=$_GET[field]&cari=$_GET[cari]";

					$query .= " WHERE $_GET[field] LIKE '%$_GET[cari]%'";
					$q .= " WHERE $_GET[field] LIKE '%$_GET[cari]%'";
				}

				$query .= " LIMIT $posisi, $batas";
				$q 	.= " ";
				

				 error_reporting(0);	
				 if (isset($_POST['tanggal']))
                                    {
                                      $tgl=$_POST['tanggal'];
                                    }
                                    else
                                    {
                                       $tgl=date("Y-m");
                                    }  
				

				$sql_kul = mysqli_query($conn,$query);
				$fd_kul = mysqli_num_rows($sql_kul);
				
				if($fd_kul > 0)
				{
					$no = $posisi + 1;
					while ($m = mysqli_fetch_assoc($sql_kul)) {
						$kode = $m['kode_barang'];




						$queryPembelian = "SELECT SUM(P.qty) as stok 
											FROM tb_detail_pembelian P
											JOIN tb_pembelian T ON P.no_faktur = T.no_faktur
						 					WHERE T.tgl_beli LIKE '$tgl%%' and P.kode_barang ='$kode' ";

								$resultPembelian= mysqli_query($conn, $queryPembelian);
								while($rowPembelian = mysqli_fetch_assoc($resultPembelian)){
								
									$stok_masuk = $rowPembelian['stok'];	
								

						$queryPendapatan = "SELECT SUM(P.qty) as stok
											FROM tb_detail_penjualan P
											JOIN tb_penjualan J ON P.no_transaksi = J.no_transaksi
						 					WHERE J.tgl_transaksi LIKE '$tgl%%' and P.kode_barang ='$kode' ";

								$resultPendapatan= mysqli_query($conn, $queryPendapatan);
								while($rowPendapatan = mysqli_fetch_assoc($resultPendapatan)){

										$stok_keluar = $rowPendapatan['stok'];				
									

						$queryawal = " SELECT SUM(S.stok) as stok FROM tb_stok S
 										WHERE tanggal LIKE '$tgl%%' and S.kode ='$kode'";

									$resultawal= mysqli_query($conn, $queryawal);
									while($rowawal = mysqli_fetch_assoc($resultawal)){

										$stok_awal = $rowawal['stok'];
									
										



						//$stok_masuk = stok_masuk($m['kode_barang'],$tgl);
						//$stok_keluar = stok_keluar($m['kode_barang'],$tgl);
						$total_stok = $stok_awal + $stok_masuk - $stok_keluar;

						$retur_jual = stok_retur_jual($m['kode_barang']);
						$retur_beli = stok_retur_beli($m['kode_barang']);

						$sisa = ($total_stok + $retur_jual) - $retur_beli;
						echo"<tr>
							<td>$no</td>
							<td>$m[kode_barang]</td>
							<td>$m[nama_barang]</td>
							<td>$m[satuan]</td>
							<td>".nama_kategori($m['kategori_id'])."</td>
							<td><center>".$stok_awal."</center></td>
							<td><center>".$stok_masuk."</center></td>
							<td><center>".$stok_keluar."</center></td>
							<td><center>".$total_stok."</center></td>
							
						</tr>";
						$no++;

					}
				}
			}
					}
	

					$jmldata = mysqli_num_rows(mysqli_query($conn,$q));

					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
		    		$linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman, $linkaksi);
				}
				else
				{
					echo"<tr>
						<td colspan='10'><div class='w3-center'><i>Data Barang Not Found.</i></div></td>
					</tr>";
				}
				

				echo"</tbody>

			</table></div>";

			echo"<div class='w3-row'>
				<div class='w3-col s1'>
					<form class='w3-tiny' action='' method='GET'>
						<input type='hidden' name='mod' value='laporan'>
						<input type='hidden' name='act' value='stokbarang'>";
						if(!empty($hideinp))
						{
							echo $hideinp;
						}
						echo"<select class='w3-select w3-border' name='show' onchange='submit()'>
							<option value=''>- Show -</option>";
							$i=10;
							while($i <= 100)
							{
								if(isset($_GET['show']) AND (int)$_GET['show'] == $i)
								{
									echo"<option value='$i' selected>$i</option>";	
								}
								else
								{
									echo"<option value='$i'>$i</option>";
								}

								$i+=10;
							}
						echo"</select>
					</form>
				</div>
				<div class='w3-col s11'>
					<ul class='w3-pagination w3-right w3-tiny'>
						$linkHalaman
					</ul>
				</div>
			</div>";
		break;

	}
?>