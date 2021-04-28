<?php session_start();
include 'koneksi.php';
include 'all_function.php';
if(empty(@$_SESSION['username'])){
         echo "<script>window.location.href='login.php'</script>";
}else{
?>
<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

       <title>PD. Canda Birawa</title>

        <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="img/logobar.png">
        <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
        <link rel="apple-touch-icon" href="img/icon180.png" sizes="180x180">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="css/main.css">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="js/vendor/modernizr.min.js"></script>
		<script src="js/vendor/jquery.min.js"></script>
		
    </head>


 <body>
        <!-- Page Wrapper -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
            Available classes:

            'page-loading'      enables page preloader
        -->
        <div id="page-wrapper">
            
            <div class="preloader themed-background">
                <h1 class="push-top-bottom text-light text-center"><strong>AA</strong>UI</h1>
                <div class="inner">
                    <h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>
                    <div class="preloader-spinner hidden-lt-ie10"></div>
                </div>
            </div>
           

		   
		   
		   
            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
			
<!-- Sidebar --><!-- Sidebar --><!-- Sidebar --><!-- Sidebar --><!-- Sidebar --><!-- Sidebar --><!-- Sidebar --><!-- Sidebar --><!-- Sidebar --><!-- Sidebar -->
                 <?php
                include "sidebar/sidebar_mahasiswa.php";
				?>
                				
                <div id="main-container">
<!-- Header --><!-- Header --><!-- Header --><!-- Header --><!-- Header --><!-- Header --><!-- Header --><!-- Header --><!-- Header --><!-- Header -->                    
                   
                  <?php
					include "sidebar/header.php";
					?>
                    <!-- END Header -->

<!-- Page content --><!-- Page content --><!-- Page content --><!-- Page content --><!-- Page content --><!-- Page content --><!-- Page content -->
                  <div id="page-content">
					<div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class=""></i>Laporan Laba Rugi<br><small>Lihat Laporan Laba Rugi</small>
								
                                </h1>
                            </div>

							</div>
							
						<ul class="breadcrumb breadcrumb-top">
                            
							<li>Data Laba Rugi</li>
                            
                        </ul>
						
						</ul>

				
						
						
						
                        
                        <div class="block full">
                            <!-- All Products Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                </div>
                                <h2><strong>Laporan</strong> Laba Rugi</h2>
                            </div>
                            <!-- END All Products Title -->

							<form method="get" class="form-horizontal form-bordered">
                           	<div class="form-group">
							<label class="col-md-3 control-label " for="example-text-input" style="text-align:right;" > BULAN</label>
							<div class="col-md-9">
							<input type="month" name="tanggal">
							<input type="submit" value="Cari" class="btn btn-sm btn-primary">
							</div>
                        	</div>
							</form>
							<?php
 
                                if (isset($_GET['tanggal']))
                                    {
                                      $tgl=$_GET['tanggal'];
                                    }
                                    else
                                    {
                                       $tgl=date("Y-m");
                                    }     
						          ?>	
								<a href="export_excel_labarugi.php?tanggal=<?php echo $tgl;?>" title="Download" class="btn btn alert-danger">
								<i class="fa fa-download"></i> CETAK LABA RUGI</i></a>
						
								
							<div class="table-responsive">
                            	
                                <?php
								$query2 = "select tgl from transaksi LIMIT 1";
								$result2 = mysqli_query($connect, $query2);
								$row = mysqli_fetch_assoc($result2);
								$date = date_parse_from_format("Y-m-d", $row['tgl']);
								//output the bits
								$tgl = "$date[year]";
							?>
							<br>
							<br>
							
								
							
                            <!-- All Products Content -->
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
										<th style="border-right:none;">No.</th>
										<th class="text-center" colspan = "3">Uraian</th>

                                        <th class="text-center"><?php echo $tgl;?></th>
                                    </tr>
                                </thead>
								
								
								
                                <tbody>
									<!--<tr>
										<td></td>
										<td colspan ="2"><h4>KEGIATAN Laba Rugi</h4></td>
										<td class="text-center"></td>
                                    </tr>-->

	
			<tr>
				<td>A</td>
				<td colspan ="2"><h5><strong>PENDAPATAN</strong></h5></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
            </tr>

			<tr>
				<td>1</td>
				<td style="border-right:none;"></td>
				<td><h5>PENJUALAN PUPUK</h5></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				
			</tr>
			
<?php
error_reporting(0);
					if (isset($_GET['tanggal']))
						{
						  $tgl=$_GET['tanggal'];
						}
						else
						{
						   $tgl=date("Y-m");
						}
				
						$queryPendapatan = "SELECT P.kode_barang, B.nama_barang, K.nama_kategori, SUM(P.qty) as stok , P.harga
					FROM tb_detail_penjualan P
					JOIN tb_barang B ON P.kode_barang = B.kode_barang
					JOIN tb_kategori_barang K ON K.kategori_id = B.kategori_id
					JOIN tb_penjualan J ON P.no_transaksi = J.no_transaksi
 					WHERE J.tgl_transaksi LIKE '$tgl%%' GROUP BY harga";

					$resultPendapatan= mysqli_query($connect, $queryPendapatan);
					while($rowPendapatan = mysqli_fetch_assoc($resultPendapatan)){
						$kode = $rowPendapatan['kode_barang'];
						$nama = $rowPendapatan['nama_barang'];
						$kategori = $rowPendapatan['nama_kategori'];
						$stok = $rowPendapatan['stok'];
						$harga = $rowPendapatan['harga'];


						//$total = $rowPendapatan['Total']; ,((P.harga * 20) * (SUM(P.qty))) as Total
							if ($kode == 'P05') {
									$hargaton = $harga * 25;
									$total = $hargaton * $stok; 
							}else{
									$hargaton = $harga * 20;
									$total = $hargaton * $stok; 
							}

						$jumlah_penjualan += $total

?>
			<tr>
				<td></td>
				<td style="border-right:none;"><?php echo $kode;?></td>
				<td><h5><?php echo $nama;?> <?php echo $kategori;?></h5></td>
				<td><h5> <?php echo $stok;?> TON &nbsp;&nbsp;&nbsp; x &nbsp;&nbsp;&nbsp;<?php echo number_format($hargaton)."";?> </h5></td>
				<td class="text-right"><h5> Rp. <?php echo number_format($total)."";?></h5></td>
			</tr>

<?php 
	}


 ?>
		

			<!-- <tr>
				<td></td>
				<td height="30px"></td>
				<td height="30px" style="border-right:none;"></td>
				<td height="30px"></td>
				<td height="30px"></td>
			</tr> -->
			

			<tr>
				<td>
				<td style="border-right:none;" bgcolor="#e1f5fe">
				<td  bgcolor="#e1f5fe"><h5>JUMLAH PENJUALAN PUPUK</h5></td>
				<td bgcolor="#e1f5fe"></td>
				<td class="text-right" bgcolor="#e1f5fe"><h5>Rp. <?php echo number_format($jumlah_penjualan)."";?></h5></td>
				</td>
				</td>
			</tr>

<?php 
		$jumlah_pendapatan = $jumlah_penjualan;
 ?>
			
			<tr>
				<td></td>
				<td colspan="3" bgcolor="#6ad2eb"><h4><strong>JUMLAH PENDAPATAN</strong></h4></td>
				
				<td class="text-right" bgcolor="#6ad2eb"><h4>Rp. <?php echo number_format($jumlah_pendapatan)."";?></h4></td>
			</tr>
			<tr>
				<td height="30px"></td>
				<td height="30px"></td>
				<td height="30px" colspan="2"></td>
				<td height="30px"></td>
			</tr>


			<tr>
				<td>B</td>
				<td colspan ="2"><h5><strong>PENGELUARAN</strong></h5></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
            </tr>


            <tr>
				<td>1</td>
				<td style="border-right:none;"></td>
				<td><h5>PERSEDIAAN AWAL PUPUK</h5></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				
			</tr>
			
<?php
error_reporting(0);
					if (isset($_GET['tanggal']))
						{
						  $tgl=$_GET['tanggal'];
						}
						else
						{
						   $tgl=date("Y-m");
						}
				
						$queryawal = " SELECT S.kode,B.nama_barang,K.nama_kategori,B.harga_jual,S.stok,S.tanggal FROM tb_stok S
 						JOIN tb_barang B ON  S.kode = B.kode_barang
 						JOIN tb_kategori_barang K ON K.kategori_id = B.kategori_id
 						WHERE tanggal LIKE '$tgl%%' ORDER BY kode";

					$resultawal= mysqli_query($connect, $queryawal);
					while($rowawal = mysqli_fetch_assoc($resultawal)){
						$akode = $rowawal['kode'];
						$anama = $rowawal['nama_barang'];
						$akategori = $rowawal['nama_kategori'];
						$astok = $rowawal['stok'];
						$aharga = $rowawal['harga_jual'];


						//$total = $rowPendapatan['Total']; ,((P.harga * 20) * (SUM(P.qty))) as Total
							if ($akode == 'P05') {
									$ahargaton = $aharga * 25;
									$atotal = $ahargaton * $astok; 
							}else{
									$ahargaton = $aharga * 20;
									$atotal = $ahargaton * $astok; 
							}

						$jumlah_awal += $atotal

?>
			<tr>
				<td></td>
				<td style="border-right:none;"><?php echo $akode;?></td>
				<td><h5><?php echo $anama;?> <?php echo $akategori;?></h5></td>
				<td><h5> <?php echo $astok;?> TON &nbsp;&nbsp;&nbsp; x &nbsp;&nbsp;&nbsp;<?php echo number_format($ahargaton)."";?> </h5></td>
				<td class="text-right"><h5> Rp. <?php echo number_format($atotal)."";?></h5></td>
			</tr>

<?php 
	}
	// $jumlahtotal = $ajumlah + $jumlah
 ?>
		

			<tr>
				<td>
				<td style="border-right:none;" bgcolor="#e1f5fe">
				<td  bgcolor="#e1f5fe"><h5>JUMLAH PERSEDIAAN AWAL PUPUK</h5></td>
				<td bgcolor="#e1f5fe"></td>
				<td class="text-right" bgcolor="#e1f5fe"><h5>Rp. <?php echo number_format($jumlah_awal)."";?></h5></td>
				</td>
				</td>
			</tr>
			



			<tr>
				<td>2</td>
				<td style="border-right:none;"></td>
				<td><h5>PEMBELIAN PUPUK</h5></td>
				<td class="text-center"></td>
				<td class="text-center"></td>				
			</tr>
<?php
			if (isset($_GET['tanggal']))
						{
						  $tgl=$_GET['tanggal'];
						}
						else
						{
						   $tgl=date("Y-m");
						}		
		$queryPembelian = "SELECT P.kode_barang, B.nama_barang, K.nama_kategori, SUM(P.qty) as stok , P.harga_beli  as harga
					FROM tb_detail_pembelian P
					JOIN tb_barang B ON P.kode_barang = B.kode_barang
					JOIN tb_kategori_barang K ON K.kategori_id = B.kategori_id
					JOIN tb_pembelian T ON P.no_faktur = T.no_faktur
 					WHERE T.tgl_beli LIKE '$tgl%%' GROUP BY P.harga_beli";

					$resultPembelian= mysqli_query($connect, $queryPembelian);
					while($rowPembelian = mysqli_fetch_assoc($resultPembelian)){
						$kode = $rowPembelian['kode_barang'];
						$nama = $rowPembelian['nama_barang'];
						$kategori = $rowPembelian['nama_kategori'];
						$stok = $rowPembelian['stok'];
						$harga = $rowPembelian['harga'];
						//$total = $rowPembelian['Total'];
						if ($kode == 'P05') {
									$hargaton = $harga * 25;
									$total = $hargaton * $stok; 
							}else{
									$hargaton = $harga * 20;
									$total = $hargaton * $stok; 
							}

						
						$jumlah_pembelian += $total

?>
				<tr>
					<td></td>
					<td style="border-right:none;"><?php echo $kode;?></td>
					<td><h5><?php echo $nama;?> <?php echo $kategori;?></h5></td>
					<td><h5> <?php echo $stok;?> TON  &nbsp;&nbsp;&nbsp; x &nbsp;&nbsp;&nbsp; <?php echo number_format($hargaton)."";?></h5></td>
					
					<td class="text-right"><h5> Rp. <?php echo number_format($total)."";?></h5></td>
				</tr>

				
<?php
	}
?>
			<tr>
				<td>
				<td style="border-right:none;" bgcolor="#e1f5fe">
				<td  bgcolor="#e1f5fe"><h5>JUMLAH PEMBELIAN PUPUK</h5></td>
				<td bgcolor="#e1f5fe"></td>
				<td class="text-right" bgcolor="#e1f5fe"><h5>Rp. <?php echo number_format($jumlah_pembelian)."";?></h5></td>
				</td>
				</td>
			
<?php
	$jumlah_awal_beli = $jumlah_pembelian+$jumlah_awal;
?>
			<tr>
				<td></td>
				<td colspan="3" bgcolor="#6ad2eb"><h4><strong>JUMLAH PERSEDIAAN AWAL + PEMBELIAN PUPUK </strong></h4></td>
				
				<td class="text-right" bgcolor="#6ad2eb"><h4>Rp. <?php echo number_format($jumlah_awal_beli)."";?></h4></td>
			</tr>
			<tr>
				<td height="30px"></td>
				<td height="30px"></td>
				<td height="30px" colspan="2"></td>
				<td height="30px"></td>
			</tr>





			<tr>
				<td>3</td>
				<td style="border-right:none;" width="6px"></td>
				<td><h5>PERSEDIAAN AKHIR PUPUK</h5></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				</tr>
<?php
error_reporting(0);
				$query = "SELECT *  FROM tb_barang B JOIN tb_kategori_barang K ON B.kategori_id=K.kategori_id";	
				$sql_kul = mysqli_query($connect,$query);
				
				while ($m = mysqli_fetch_assoc($sql_kul)) {

						// $id = $m['kode_barang'];
						// if(isset($_GET['tanggal'])){
						// 	$tgl = $_GET['tanggal'];
						// 	$sql = mysqli_query($connect,"SELECT qty FROM tb_detail_pembelian WHERE timestmp LIKE '$tgl%%' AND kode_barang = '$id'");
						// }else{
						// $sql = mysqli_query($connect,"SELECT qty FROM tb_detail_pembelian WHERE  kode_barang = '$id'");
						// }
						// $total = 0;
						// while($data = mysqli_fetch_array($sql)){ 
						// 	$total = $total + $q['qty'];

						if (isset($_GET['tanggal']))
						{
						  $tgl=$_GET['tanggal'];
						}
						else
						{
						   $tgl=date("Y-m");
						}
						  
								$stok_masuk = stok_masuk($m['kode_barang'],$tgl);
								$stok_keluar = stok_keluar($m['kode_barang'],$tgl);
								$stok_awal = stok_awal($m['kode_barang'],$tgl);
								$total_stok = ($stok_awal + $stok_masuk) - $stok_keluar;
								$harga = $m['harga_jual'];
								if ($m['kode_barang'] == 'P05') {
									$hargaton = $harga * 25 ;
									$total = $hargaton * $total_stok;
								}else{
									$hargaton = $harga * 20 ;
								$total = $hargaton * $total_stok;
								}
								

								$jumlah_akhir += $total;
					
?>
			<tr>
				<td></td>
				<td style="border-right:none;" width="6px"><?php echo $m['kode_barang'];?></td>
				<td><h5><?php echo $m['nama_barang'];?> <?php echo $m['nama_kategori'];?></h5></td>
				<td><h5><?php echo $total_stok;?> TON &nbsp;&nbsp;&nbsp; X &nbsp;&nbsp;&nbsp; <?php echo number_format($hargaton)."";?></h5></td>
				<td class="text-right"><h5><?php echo number_format($total)."";?></h5></td>
			</tr>

			
<?php
				}
?>

			<tr>
				<td></td>
				<td style="border-right:none;" bgcolor="#e1f5fe">
				<td  bgcolor=#e1f5fe><h5>JUMLAH PERSEDIAAN AKHIR PUPUK</h5></td>
				<td class="text-center" bgcolor=#e1f5fe></td>
				<td class="text-right" bgcolor=#e1f5fe><h5><?php echo number_format($jumlah_akhir)."";?></h5></td>
			</tr>

<?php
	$hpp = $jumlah_awal_beli - $jumlah_akhir;
?>

			<tr>
				<td></td>
				<td colspan="3" bgcolor="#6ad2eb"><h4><strong> HARGA POKOK PENJUALAN </strong></h4></td>
				
				<td class="text-right" bgcolor="#6ad2eb"><h4>Rp. <?php echo number_format($hpp)."";?></h4></td>
			</tr>
			<tr>
				<td height="30px"></td>
				<td height="30px"></td>
				<td height="30px" colspan="2"></td>
				<td height="30px"></td>
			</tr>

<?php
	$lr_kotor =  $jumlah_pendapatan - $hpp ;
?>
			<tr>
				<td></td>
				<td colspan="3" bgcolor="#6ad2eb"><h4><strong> LABA (RUGI) KOTOR </strong></h4></td>
				
				<td class="text-right" bgcolor="#6ad2eb"><h4>Rp. <?php echo number_format($lr_kotor)."";?></h4></td>
			</tr>
			<tr>
				<td height="30px"></td>
				<td height="30px"></td>
				<td height="30px" colspan="2"></td>
				<td height="30px"></td>
			</tr>



			<tr>
				<td>3</td>
				<td style="border-right:none;"></td>
				<td><h5>BIAYA</h5></td>
				<td class="text-center"></td>
				<td class="text-center"></td>				
			</tr>
<?php
					$xsubkewajiban = 0;
					$queryakun = "SELECT * FROM akun WHERE laporan = '41' and kodeakun not in('505') ORDER BY kodeakun;";
					$resultakun = mysqli_query($connect, $queryakun);
					while($rowakun = mysqli_fetch_assoc($resultakun)){
						$kodeakun = $rowakun['kodeakun'];
						$namaakun = $rowakun['namaakun'];

						if (isset($_GET['tanggal']))
						{
						  $tgl=$_GET['tanggal'];
						}
						else
						{
						   $tgl=date("Y-m");
						}
						$querytgl = "SELECT MAX(tgl) as tgl FROM bukubesar WHERE kodeakun = '$kodeakun' and tgl like '$tgl%%'";
						$resultgl = mysqli_query($connect, $querytgl);
						$rowtgl = mysqli_fetch_assoc($resultgl);
						$tglcari = $rowtgl['tgl'];
						
						$querysaldo = "SELECT saldo FROM bukubesar WHERE tgl = '$tglcari%%' AND kodeakun = '$kodeakun' ORDER BY idbb DESC LIMIT 1";
						$resultsaldo = mysqli_query($connect, $querysaldo);
						$rowsaldo = mysqli_fetch_assoc($resultsaldo);
						if($rowsaldo['saldo'] < 0){
							$saldo = $rowsaldo['saldo']*(-1);
						}else{
							$saldo = $rowsaldo['saldo']*(1);
						}
?>
			<tr>
				<td></td>
				<td style="border-right:none;" width="6px"><?php echo $kodeakun;?></td>
				<td><h5><?php echo $namaakun;?></h5></td>
				<td></td>
				<td class="text-right"><h5>Rp. <?php echo number_format($saldo)."";?></h5></td>
			</tr>
<?php 
						$biaya += $saldo;
					}			
 ?>

			<tr>
				<td>
				<td style="border-right:none;" bgcolor="#e1f5fe">
				<td  bgcolor="#e1f5fe"><h5>JUMLAH BIAYA</h5></td>
				<td bgcolor="#e1f5fe"></td>
				<td class="text-right" bgcolor="#e1f5fe"><h5>Rp. <?php echo number_format($biaya)."";?></h5></td>
				</td>
				</td>
			</tr>

<?php 
						$total_keluar = $biaya ;
							
 ?>
		
			<tr>
				<td></td>
				<td colspan="3" bgcolor="#6ad2eb"><h4><strong>JUMLAH PENGELUARAN</strong></h4></td>
				
				<td class="text-right" bgcolor="#6ad2eb"><h4>Rp. <?php echo number_format($total_keluar)."";?></h4></td>
			</tr>

<?php 
						$labarugi_bersih =  $lr_kotor - $biaya;
							
 ?>		<tr>
				<td height="30px"></td>
				<td height="30px"></td>
				<td height="30px" colspan="2"></td>
				<td height="30px"></td>
			</tr>	
		<tr>
			<td></td>
			<td colspan="3" bgcolor="#aad178"><h4>
			Laba (Rugi) Bersih </h4></td>
			
			<td class="text-right" bgcolor="#aad178"><h4>Rp. <?php echo number_format($labarugi_bersih)."";?></h4></td>
		</tr>
			       
                     </tbody>
                    </table>
                            <!-- END All Products Content -->
                        </div>
                        <!-- END All Products Block -->
                    </div>
						
				
				</div>
				
				
				 <?php
					include "sidebar/footer.php";
					?>
				
				
										<!-- 
					
					
					MODAL
					
					
					-->
					  
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

        <!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->

        <!-- END User Settings -->
		
		
		
<!-- MODAL	--><!-- MODAL	--><!-- MODAL	--><!-- MODAL	--><!-- MODAL	--><!-- MODAL	--><!-- MODAL	--><!-- MODAL	--><!-- MODAL	--><!-- MODAL	--><!-- MODAL	--><!-- MODAL	-->


        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        <script src="js/vendor/jquery.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/app.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
    </body>
</html>
<?php
}
?>