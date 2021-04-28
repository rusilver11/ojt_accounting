<?php
include"lib/conn.php";
	if(!isset($_SESSION['login_user'])){
		header('location: ../../login.php'); // Mengarahkan ke Home Page
	}

	//link buat paging
	$linkaksi = 'med.php?mod=penjualan';

	if(isset($_GET['act']))
	{
		$act = $_GET['act'];
		$linkaksi .= '&act='.$act;
	}
	else
	{
		$act = '';
	}

	$aksi = 'mod/penjualan/act_penjualan.php';

	switch ($act) {
		default:
			echo"<div class='w3-container w3-wi w3-blue w3-leftbar w3-border-blue'>
				<h4 style='margin-bottom:0;padding-bottom:0;'>Transaksi Penjualan</h4>
				<p style='margin-top:0;padding-top:0;'><i>Menu Transaksi Penjualan Barang</i></p>
			</div>";

			// flash('example_message');

			echo"<div class='w3-row-padding'>
				<div class='w3-col s15'>Data Barang
				<div style='border-bottom:1px dashed #ccc;'></div>";

					echo"<table style='margin-top:12px;'>
						<tr>
							<td>
								<form class='w3-tiny' action='' method='GET'>	
									<input type='hidden' name='mod' value='penjualan'>
									<div class='w3-row'>
										<div class='w3-col s1'>
											<label class='w3-label'>Search</label>
										</div>
										<div class='w3-col s2'>
											<select name='field' class='w3-select w3-padding'>
												<option value=''>- Pilih -</option>
												<option value='kode_barang'>KODE BARANG</option>
												<option value='nama_barang'>3 BARANG</option>
												<option value='harga_jual'>HARGA</option>
											</select>
										</div>
										<div class='w3-col s6'>
											<input type='text' name='cari' class='w3-input' placeholder='cari ...'>
										</div>
										<div class='w3-col s1'>
											<button type='submit' class='w3-btn w3-tiny'><i class='fa fa-paper-plane'></i>CARI</button>
										</div>
										<div class='w3-col s1'>
											<a href='med.php?mod=penjualan' class='w3-btn w3-dark-grey w3-tiny'><i class='fa fa-refresh'></i> REFRESH</a>
										</div>
									</div>
								</form>
							</td>
						</tr>
						
					</table>";

					echo"<div style='margin-top:12px;margin-bottom:12px;'>
					<table class='w3-table w3-striped w3-bordered w3-tiny w3-hoverable tbl'>
						<thead>
							<tr class='w3-yellow'>
								<th>NO</th>
								<th>KODE</th>
								<th>NAMA BARANG</th>
								<th>KATEGORI</th>
								<th>HARGA</th>
								
								<th>NOMER DO + JUMLAH</th>
							</tr>
						</thead>
						<tbody>";

						$p      = new Paging;
						$batas  = 5;
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

						$query .= "LIMIT $posisi, $batas";
						$q 	.= " ";

						$sql_kul = mysqli_query($conn,$query);
						$fd_kul = mysqli_num_rows($sql_kul);

						if($fd_kul > 0)
						{
							$no = $posisi + 1;
							while ($m = mysqli_fetch_assoc($sql_kul)) {
								echo"<tr>
									<td>$no</td>
									<td>$m[kode_barang]</td>
									<td>$m[nama_barang]</td>
									<td>$m[kategori_id]</td>
									<td>Rp. $m[harga_jual]</td>
									<td><form action='$aksi'>
										<input type='hidden' name='mod' value='penjualan'>
										<input type='hidden' name='act' value='add'>
										<input type='hidden' name='id' value='$m[kode_barang]'>
										
										<div class='w3-row'>
											<div class='w3-col s4'><input type='text' name='do' class='w3-input w3-tiny w3-border' maxlength='30' placeholder='Nomer DO'></div>			
											<div class='w3-col s4'><input type='text' name='disc' class='w3-input w3-tiny w3-border' maxlength='3' placeholder='jumlah'></div>
										</div>
										<div class='w3-col s8'><button type='submit' class='w3-btn w3-red w3-tiny'><i class='fa fa-cart-plus'></i> ADD</button>
											</div>
									</form>
									</td>
								
								</tr>";
								$no++;
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
						<div class='w3-col s2'>
							<form class='w3-tiny' action='' method='GET'>
								<input type='hidden' name='mod' value='penjualan'>";
								if(!empty($hideinp))
								{
									echo $hideinp;
								}
								echo"<select class='w3-select w3-border' name='show' onchange='submit()'>
									<option value=''>- Show -</option>
									<option value='5'>5</option>";
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
						<div class='w3-col s10'>
							<ul class='w3-pagination w3-right w3-tiny'>
								$linkHalaman
							</ul>
						</div>
					</div>


				</div>";


				echo"<div class='w3-col s15 w3-card'>Keranjang Penjualan
				<div style='border-bottom:1px dashed #ccc;'></div><br>";
					echo"<table class='w3-table w3-tiny w3-hoverable tbl'>
						<thead>
						<tr class='w3-blue'>
							<th>#</th>
							<th>Nomer DO</th>
							<th>BARANG</th>
							<th>HARGA</th>
							<th>JUMLAH</th>
							<th colspan='2'>SUB TOTAL</th>
						</tr>
						</thead>

						<tbody>";

						$sql_tmp = mysqli_query($conn,"SELECT a.no_do ,a.kode_barang, a.qty, a.harga, b.nama_barang, a.disc 
												FROM tb_detail_penjualan_tmp a, tb_barang b
												WHERE a.kode_barang = b.kode_barang 
												AND a.petugas = '$_SESSION[login_id]' 
												ORDER BY a.timestmp ASC");
						$no = 1;

						$sub_total = 0;
						$sub_total1 = 0;
						$sub_total2 = 0;
						$total_harga = 0;

						if(mysqli_num_rows($sql_tmp) > 0)
						{
							while ($b = mysqli_fetch_assoc($sql_tmp)) {

								if ($b['kode_barang'] == 'P05') {

								$harga_disc = $b['harga'] - (($b['harga'] * $b['disc']) / 100);
								$sub_total1 = $harga_disc * (($b['qty'] * 1000) / 40);
								
								echo"<tr style='border-bottom:1px dashed #ccc;'>
									<td>$no</td>
									<td>$b[no_do]</td>
									<td>$b[nama_barang]</td>
									<td>Rp. $b[harga]</td>
									<td>$b[qty]</td>
									<td>Rp. ".number_format($sub_total1)."</td>
									<td><a href='$aksi?mod=penjualan&act=batal&id=$b[kode_barang]' onclick=\"return confirm('Yakin ingin membatalkan?');\"><i class='fa fa-close w3-tiny w3-text-grey'></i></a></td>
								</tr>";

								$no++;
									
								}else{

								$harga_disc = $b['harga'] - (($b['harga'] * $b['disc']) / 100);
								$sub_total = $harga_disc * (($b['qty'] * 1000) / 50);
								$sub_total2 += $sub_total;
							

								echo"<tr style='border-bottom:1px dashed #ccc;'>
									<td>$no</td>
									<td>$b[no_do]</td>
									<td>$b[nama_barang]</td>
									<td>Rp. $b[harga]</td>
									<td>$b[qty]</td>
									<td>Rp. ".number_format($sub_total)."</td>
									<td><a href='$aksi?mod=penjualan&act=batal&id=$b[kode_barang]' onclick=\"return confirm('Yakin ingin membatalkan?');\"><i class='fa fa-close w3-tiny w3-text-grey'></i></a></td>
								</tr>";

								$no++;
								}
							}
								$total_harga = $sub_total1 + $sub_total2;
						}
							
						else
						{
							echo"<tr>
								<td colspan='5'><center><i>Keranjang Kosong</i></center></td>
							</tr>";
						}

						echo"</tbody>

						<tfoot>
						<tr>
							<td colspan='2'><b>TOTAL</b></td>
							<td colspan='4'><b class='w3-text-red w3-small w3-right'>Rp. ".number_format($total_harga)."</b></td>
						</tr>
						<tr>
							<td colspan='3'><b>POTONGAN HARGA (Rp.)<b></td>
							<td colspan='3'><input type='text' name='potongan' id='potongan' class='w3-input w3-border w3-tiny w3-right' value='0'></td>
						</tr>
						<tr style='border-top:1px dashed #ccc;'>
							<td colspan='2'><b class='w3-text-blue'>TOTAL BAYAR</b><td>
							<td colspan='4'><b class='w3-text-red w3-small w3-right'>Rp. <span id='tot'>0</span></b></td>
						</tr>
						</tfoot>


					</table><hr>

					<div class='w3-card-2 w3-light-blue'>
						<form action='$aksi?mod=penjualan&act=simpan' method='POST' class='w3-container'>
							<input type='hidden' name='potongan2' id='potongan2' value='0'>
							<input type='hidden' name='total' id='total' value='"?><?php echo isset($total_harga) ? $total_harga : 0; ?><?php echo"'>

							<input type='hidden' name='jmlbayar2' id='bayar2'>

							<label class='w3-label w3-text-black'>Kios :</label>
							<input type='text' name='nama' id='nama' class='w3-input w3-tiny w3-border-0' required>

							<label class='w3-label w3-text-black'>Bayar (Rp):</label>
							<input type='text' name='jmlbayar' id='bayar' class='w3-input w3-tiny w3-border-0' required>


							
							<label class='w3-label w3-text-black'>Status Pembayaran:</label>
							<div class='w3-row'>
								<div class='w3-col s6'>
									<input type='radio' class='w3-radio' name='status' value='LUNAS'>
									<label class='w3-validate'>LUNAS</label>
								</div>
								<div class='w3-col s6'>
									<input type='radio' class='w3-radio' name='status' value='PIUTANG'>
									<label class='w3-validate'>PIUTANG</label>
								</div>
							</div>


							<p><button class='w3-btn w3-green' onclick=\"return confirm('Klik OK untuk melanjutkan');\"><i class='fa fa-save'></i> Simpan Transaksi</button></p>
						</form>
					</div><br>";

				echo"</div>
			</div>";

		break;


		case "printout" :
				
			if(isset($_GET['id']))
			{
				echo"<div class='w3-container w3-small w3-pale-green w3-leftbar w3-border-green'>
					<h4 style='margin-bottom:0;padding-bottom:0;'>Printout Penjualan</h4>
					<p style='margin-top:0;padding-top:0;'><i>Data Penjualan Barang</i></p>
				</div><br>

				<div class='w3-container w3-padding-4 w3-tiny w3-pale-red'>
					<p><i>Jika terjadi kesalahan harap lapor Administrator.</i></p>
				</div>";

				$sqltrans = mysqli_query($conn,"SELECT * FROM tb_penjualan WHERE no_transaksi = '$_GET[id]'") or die(mysqli_error());
				$tra = mysqli_fetch_assoc($sqltrans);

				echo"<form action='$aksi?mod=penjualan&act=edit' method='POST' class='w3-container'>
					<table class='w3-table w3-tiny'>	
					<tr style='border-bottom:1px dashed #ccc;'>
						<td width='150px'>No. Transaksi</td>
						<td width='10px'>:</td>
						<input type='hidden' name='id' value='$tra[no_transaksi]'>
						<td ><b>$tra[no_transaksi]</b></td>
					</tr>

					<tr style='border-bottom:1px dashed #ccc;'>
						<td>Kios / Kode</td>
						<td>:</td>
						<td><b>$tra[nama_pelanggan] / "?><?php echo !empty($tra['kode_pelanggan']) ? $tra['kode_pelanggan'] : "-"; ?><?php echo"</b></td>
					</tr>

					<tr style='border-bottom:1px dashed #ccc;'>
						<td>Tanggal Transaksi</td>
						<td>:</td>
						<td><b>$tra[timestmp]</b></td>
					</tr>

					<tr style='border-bottom:1px dashed #ccc;'>
						<td>Status</td>
						<td>:</td>
						<td><b>$tra[status]</b></td>
					</tr>
					<tr>
					<td>Ubah Status</td>
					<td>:</td>
					<td>
						<div class='w3-row'>
						
									<input type='radio' class='w3-radio' name='status' value='LUNAS' >
									<label class='w3-validate'>LUNAS</label>
							
									<input type='radio' class='w3-radio' name='status' value='PIUTANG'>
									<label class='w3-validate'>PIUTANG</label>
						</div>			
							
							
					</td>
					</tr>
				</table>
				<div style='height:10px;'></div>";

				echo"<h4>Detail Barang</h4>
				<table class='w3-table w3-tiny w3-hoverable w3-bordered tbl'>
					<thead>
					<tr class='w3-blue'>
						<th>#</th>
						<th>NOMER DO</th>
						<th>KODE</th>
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
						<td>$p[no_do]</td>
						<td>$p[kode_barang]</td>
						<td>$p[nama_barang]</td>
						<td>Rp. $p[harga]</td>
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
						<td>$p[no_do]</td>
						<td>$p[kode_barang]</td>
						<td>$p[nama_barang]</td>
						<td>Rp. $p[harga]</td>
						<td>$p[qty] $p[satuan]</td>
						<td>Rp. ".number_format($sub_total)."</td>
					</tr>";

					$no++;
					}

					
					$total = $sub_total1 + $sub_total2;
				}

				$total_bayar = $total - $tra['potongan'];
				$sisa = $tra['bayar'] - $total_bayar;

				echo"</tbody>
					<tfoot>
					<tr class='w3-light-grey'>
						<td colspan='5'>Total Harga</b></td>
						<td><b></b></td>
						<td>Rp. ".number_format($total)."</td>
					</tr>
					<tr class='w3-light-grey'>
						<td colspan='5'>Potongan Harga</td>
						<td><b></b></td>
						<td>Rp. ".number_format($tra['potongan'])."</td>
					</tr>
					<tr class='w3-light-grey'>
						<td colspan='5'><b>Total Bayar</b></td>
						<td><b></b></td>
						<td colspan='5'><b>Rp. ".number_format($total_bayar)."</b></td>
					</tr>
					<tr class='w3-light-grey'>
						<td colspan='5'><b>Pembayaran</b></td>
						<td><b></b></td>
						<td><b> Rp. ".number_format($tra['bayar'])."</b>

						<input  type='text' name='updatebayar' id='updatebayar' class='w3-input w3-tiny w3-border-0' 
						placeholder='Inputkan Pembayaran' >
						</td>
					</tr>
					<tr class='w3-light-grey'>
						<td colspan='5'><b>Kembali</b></td>
						<td><b></b></td>
						<td><b>Rp. ".number_format($sisa)."</b></td>
					</tr>
					</tfoot>
				</table>
				<p><button class='w3-btn w3-green' onclick=\"return confirm('Klik OK untuk melanjutkan');\"><i class='fa fa-edit'></i> Update Transaksi</button></p>
					</form>

				<p>
					<button class='w3-btn w3-tiny' onclick=\"window.history.back()\"><i class='fa fa-mail-reply-all'></i> Back</button>
					<a href='med.php?mod=penjualan' class='w3-btn w3-red w3-tiny'><i class='fa fa-cart-plus'></i> Transaksi Baru</a>
					<a href='popup/popup.php?mod=cetakkwitansi&id=$_GET[id]' class='w3-btn w3-dark-grey w3-tiny' target='_blank'><i class='fa fa-print'></i> Cetak Kwitansi</a>
				</p>";

			}
		break;


		case "list":
			echo"<div class='w3-container w3-small w3-pale-green w3-leftbar w3-border-green'>
				<h4 style='margin-bottom:0;padding-bottom:0;'>Data Transaksi Penjualan</h4>
				<p style='margin-top:0;padding-top:0;'><i>Data Semua Transaksi Penjualan</i></p>
			</div>";

			// flash('example_message');

			echo"<table style='margin-top:12px;'>
				<tr>
					<td>
						<form class='w3-tiny' action='' method='GET'>	
							<input type='hidden' name='mod' value='penjualan'>
							<input type='hidden' name='act' value='list'>
							<div class='w3-row'>
								<div class='w3-col s1'>
									<label class='w3-label'>Search</label>
								</div>
								<div class='w3-col s2'>
									<select name='field' class='w3-select w3-padding'>
										<option value=''>- Pilih -</option>
										<option value='no_transaksi'>NO. TRANSAKSI</option>
										<option value='nama_pelanggan'>NAMA PELANGGAN</option>
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
					<td align='right'><a href='med.php?mod=penjualan&act=list' class='w3-btn w3-dark-grey w3-small'><i class='fa fa-refresh'></i> Refresh</a>
					</td>
				</tr>
				
			</table>";

			echo"<div style='margin-top:12px;margin-bottom:12px;'>
			<table class='w3-table w3-striped w3-bordered w3-tiny w3-hoverable tbl'>
				<thead>
					<tr class='w3-yellow'>
						<th>NO</th>
						<th>NO. TRANSAKSI</th>
						<th>KODE KIOS</th>
						<th>3 KIOS</th>
						<th>TGL. TRANSAKSI</th>
						<th>PETUGAS</th>
						<th>TOTAL</th>
						<th>POTONGAN</th>
						<th>STATUS</th>
						<th>#</th>
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

				$query = "SELECT * FROM tb_penjualan ";

				$q 	= "SELECT * FROM tb_penjualan";

				if(!empty($_GET['field']))
				{
					$hideinp = "<input type='hidden' name='field' value='$_GET[field]'>
								<input type='hidden' name='cari' value='$_GET[cari]'>";

					$linkaksi .= "&field=$_GET[field]&cari=$_GET[cari]";

					$query .= " WHERE $_GET[field] LIKE '%$_GET[cari]%'";
					$q .= " WHERE $_GET[field] LIKE '%$_GET[cari]%'";
				}

				$query .= " ORDER BY timestmp DESC LIMIT $posisi, $batas";
				$q 	.= " ORDER BY timestmp DESC";
				

				$sql_kul = mysqli_query($conn,$query);
				$fd_kul = mysqli_num_rows($sql_kul);

				if($fd_kul > 0)
				{
					$no = $posisi + 1;
					while ($m = mysqli_fetch_assoc($sql_kul)) {
						echo"<tr>
							<td>$no</td>
							<td><a class='w3-text-blue w3-hover-text-red' href='med.php?mod=penjualan&act=printout&id=$m[no_transaksi]'>$m[no_transaksi]</a></td>
							<td>$m[kode_pelanggan]</td>
							<td>$m[nama_pelanggan]</td>
							<td>$m[timestmp]</td>
							<td>".nama_petugas($m['petugas'])."</td>
							<td>Rp. ".number_format($m['bayar'])."</td>
							<td>Rp. ".number_format($m['potongan'])."</td>
							<td>$m[status]</td>
							<td><a href='$aksi?mod=penjualan&act=hapus&id=$m[no_transaksi]' onclick=\"return confirm('Yakin hapus data');\"><i class='fa fa-trash w3-large w3-text-red'></i></a>
							</td>
						
						</tr>";
						$no++;
					}
	

					$jmldata = mysqli_num_rows(mysqli_query($conn,$q));

					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
		    		$linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman, $linkaksi);
				}
				else
				{
					echo"<tr>
						<td colspan='8'><div class='w3-center'><i>Data Transaksi Not Found.</i></div></td>
					</tr>";
				}
				

				echo"</tbody>

			</table></div>";

			echo"<div class='w3-row'>
				<div class='w3-col s1'>
					<form class='w3-tiny' action='' method='GET'>
						<input type='hidden' name='mod' value='penjualan'>
						<input type='hidden' name='act' value='list'>";
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

<script type="text/javascript">
	$(function(){
		$("#bayar").number(true);
		$("#potongan").number(true);

		$('#bayar').keyup(function(){
			var bayar = $('#bayar').val();
			$('#bayar2').val(bayar);
		});

		$('#potongan').keyup(function(){
			var potongan = $('#potongan').val();
			$('#potongan2').val(potongan);

			var total = $("#total").val();
			var pot = $("#potongan2").val();
			
			var tot_bayar = total - pot;
			if (tot_bayar > 0) {
				$("#tot").text(tot_bayar).number(true);
			}
			else
			{
				$("#tot").text(0);
			}
			console.log(tot_bayar);
		});
		
		<?php
			$sqlTags = mysqli_query($conn,"SELECT * FROM kios
								ORDER BY kode ASC") or die(mysqli_error());

			$tags = array();
			while($t = mysqli_fetch_assoc($sqlTags))
			{
				$tags[] = '{label : "'.$t['nama'].' - '.$t['alamat'].'", value : "'.$t['kode'].'"}';
			}
		?>
		var availableTags = [<?php echo implode(", \n\t\t\t", $tags); ?>];
	    $( "#nama" ).autocomplete({
	    	source: availableTags,
	    	select:function(event, ui) {
	    		$("#bayar").focus();
	    		console.log(ui.item.label);
	    	}
	    });
	});
</script>