<?php session_start();
include 'koneksi.php';
if(empty(@$_SESSION['username'])){
		header("Location:login.php");
}else if (empty(@$_SESSION['id'])){
        header("Location:mahasiswa_kode_pertanyaan.php");
}else{
$nim = $_SESSION['username'];
$idsoal = $_SESSION['id'];
?>
<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>LAPORAN KEUANGAN UMKM</title>

        <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="img/favicon.png">
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
		<script>
			$(document).ready(function(){
				$("[data-href]").on("click",function(){
					var uri=$(this).attr("data-href");
					$.ajax({
						type: "get",
						url: uri,
						cache: false,
						dataType:"json",
						success: function(result){
							$.each(result,function(x,y){
								$("#edit [name='"+x+"']").val(y);
								//alert(x+"=>"+y);
							});
						}
					});
				});
				$("#submit").click(function(){
					var idakun = $("#tambah #idakun").val();
					var namaakun = $("#tambah #namaakun").val();
					var idsoal = $("#tambah #idsoal").val();
					var nim = $("#tambah #nim").val();
					var posisi = $("#tambah #posisi").val();
					var kategori = $("#tambah #kategori").val();
					var dataString = 'idakun='+ idakun + '&namaakun='+ namaakun + '&idsoal='+ idsoal +'&nim='+ nim +'&posisi='+ posisi +'&kategori='+ kategori;
					if(idakun==''||namaakun=='')
					{
						alert("Please Fill All Fields");
					}
					else
					{
						// AJAX Code To Submit Form.
						$.ajax({
						type: "POST",
						url: "mahasiswa_data_akun_tambah.php",
						data: dataString,
						cache: false,
						success: function(result){
							window.location=(window.location);
							//alert(result);
						}
					});
				}
				return false;
				});
				$("#update").click(function(){
					var idakun = $("#edit #idakun").val();
					var kodeakun = $("#edit #kodeakun").val();
					var namaakun = $("#edit #namaakun").val();
					var posisi = $("#edit #posisi").val();
					var kategori = $("#edit #kategori").val();
					var dataString ='namaakun='+ namaakun + '&idakun='+ idakun + '&kodeakun='+ kodeakun +'&posisi='+ posisi +'&kategori='+ kategori;
					if(namaakun==''||idakun==''||kodeakun==''||posisi=='')
					{
						alert("Please Fill All Fields");
					}
					else
					{
						// AJAX Code To Submit Form.
						$.ajax({
						type: "POST",
						url: "mahasiswa_data_akun_edit_proses.php",
						data: dataString,
						cache: false,
						success: function(result){
							window.location=(window.location);
							//alert(result);
						}
					});
				}
				return false;
				});
			});
		</script>
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
                                    <i class=""></i>Laporan Operasional<br><small>Lihat Laporan Operasional</small>
								<!--	<br>
									<br>
									<strong>Data Mahasiswa</strong><br><small>Kelola Data Mahasiswa</small> -->
                                </h1>
                            </div>
							</div>
							
						<ul class="breadcrumb breadcrumb-top">
                            
							<li>Data Operasional</li>
                            
                        </ul>
						
						
						
						
						
                        
                        <div class="block full">
                            <!-- All Products Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                </div>
                                <h2><strong>Laporan</strong> Operasional</h2>
                            </div>
                            <!-- END All Products Title -->


								<a href="export_PDF_lo.php?user=<?php echo base64_encode($nim);?>&id=<?php echo base64_encode($idsoal);?>" title="Download" class="btn btn alert-danger">
								<i class="fa fa-download"></i> CETAK LO</i></a>
								
								
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
										<th class="text-center" width="100px">Kode Akun</th>
										<th class="text-center" colspan = "2">Uraian</th>
                                        <th class="text-center"><?php echo $tgl;?></th>
                                    </tr>
                                </thead>
								
								
								
                                <tbody>
									<tr>
										<td></td>
										<td colspan ="2"><h4>KEGIATAN OPERASIONAL</h4></td>
										<td class="text-center"></td>
                                    </tr>
								<?php
$queryidkat = "SELECT kategori FROM subkategori WHERE laporan = 'Laporan Operasional' AND nim = '$nim' AND idsoal = '$idsoal' GROUP BY kategori;";
$resultidkat = mysqli_query($connect, $queryidkat);
$numrows1 = mysqli_num_rows($resultidkat);
	if($numrows1 > 0){
		$xend = 0;
		while($rowidkat = mysqli_fetch_assoc($resultidkat)){
			$idkat = $rowidkat['kategori'];
			$querynamakat = "SELECT nokategori, UCASE(namakategori) as namakategori FROM kategori WHERE nokategori = '$idkat';";
			$resultnamakat = mysqli_query($connect, $querynamakat);
			while($rownamakat = mysqli_fetch_assoc($resultnamakat)){
				$namakat = $rownamakat['namakategori'];
				$idkat = $rownamakat['nokategori'];
?>
			<tr>
				<td><?php echo $idkat;?></td>
				<td colspan ="2"><h5><?php echo $namakat;?></h5></td>
				<td class="text-center"></td>
            </tr>
<?php
				$xkat = 0;
				$querynamasub = "SELECT idkategori, idsubkategori, UCASE(subkategori) AS subkategori FROM subkategori WHERE laporan = 'Laporan Operasional' AND kategori = '$idkat' AND nim = '$nim' AND idsoal = '$idsoal' ORDER BY idsubkategori;";
				$resultnamasub = mysqli_query($connect, $querynamasub);
				while($rownamasub = mysqli_fetch_assoc($resultnamasub)){
					$idsubkat = $rownamasub['idsubkategori'];
					$subkat = $rownamasub['subkategori'];
					$idsub = $rownamasub['idkategori'];
?>
			<tr>
				<td><?php echo $idsubkat?></td>
				<td style="border-right:none;"></td>
				<td><h5><?php echo $subkat;?></h5></td>
				<td class="text-center"></td>
			</tr>
<?php
					$xsubkat = 0;
					$queryakun = "SELECT * FROM akun WHERE laporan = '$idsub' AND nim = '$nim' AND idsoal = '$idsoal' ORDER BY kodeakun;";
					$resultakun = mysqli_query($connect, $queryakun);
					while($rowakun = mysqli_fetch_assoc($resultakun)){
						$kodeakun = $rowakun['kodeakun'];
						$namaakun = $rowakun['namaakun'];
						$querytgl = "SELECT MAX(tgl) as tgl FROM bukubesar WHERE kodeakun = '$kodeakun' AND nim = '$nim' AND idsoal = '$idsoal'";
						$resultgl = mysqli_query($connect, $querytgl);
						$rowtgl = mysqli_fetch_assoc($resultgl);
						$tgl = $rowtgl['tgl'];
						
						$querysaldo = "SELECT saldo FROM bukubesar WHERE tgl = '$tgl' AND kodeakun = '$kodeakun' AND nim = '$nim' AND idsoal = '$idsoal'";
						$resultsaldo = mysqli_query($connect, $querysaldo);
						$rowsaldo = mysqli_fetch_assoc($resultsaldo);
						if($rowsaldo['saldo'] < 0){
							$saldo = $rowsaldo['saldo']*(-1);
						}else{
							$saldo = $rowsaldo['saldo'];
						}
?>
			<tr>
				<td><?php echo $kodeakun;?></td>
				<td style="border-right:none;"></td>
				<td><h5><?php echo $namaakun;?></h5></td>
				<td class="text-right"><h5><?php echo number_format($saldo)."";?></h5></td>
			</tr>
<?php
						$xsubkat = $saldo+$xsubkat;
					}
?>
			<tr>
				<td height="30px"></td>
				<td height="30px" style="border-right:none;"></td>
				<td height="30px"></td>
				<td height="30px"></td>
			</tr>
			<tr>
				<td></td>
				<td style="border-right:none;" bgcolor="#e1f5fe"></td>
				<td bgcolor="#e1f5fe"><h5>JUMLAH <?php echo $subkat;?></h5></td>
				<td class="text-right" bgcolor="#e1f5fe"><h5><?php echo number_format($xsubkat)."";?></h5></td>
			</tr>
<?php
					$xkat = $xkat+$xsubkat;
				}
?>
			<tr>
				<td height="30px"></td>
				<td height="30px" colspan="2"></td>
				<td height="30px"></td>
			</tr>
			<tr>
				<td></td>
				<td colspan="2" bgcolor="#6ad2eb"><h4>JUMLAH <?php echo $namakat;?></h4></td>
				<td class="text-right" bgcolor="#6ad2eb"><h4><?php echo number_format($xkat)."";?></h4></td>
			</tr>
			<tr>
				<td height="30px"></td>
				<td height="30px" colspan="2"></td>
				<td height="30px"></td>
			</tr>
<?php
				$xend = $xkat-$xend;
			}
		}
?>
		<tr>
			<td></td>
			<td colspan="2" bgcolor="#aad178"><h4>SURPLUS/DEFISIT-LO</h4></td>
			<td class="text-right" bgcolor="#aad178"><h4><?php echo number_format($xend)."";?></h4></td>
		</tr>
<?php
	}
?>
								       
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
					  
					
					
					
					 <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h3 class="modal-title">Tambah Akun</h3>
                                                </div>
                                                <div class="modal-body">
							<form id="form-validation" method="get" class="form-horizontal form-bordered">

							<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Kode Akun</label>
                                            <div class="col-md-9">
                                                <input type="text" id="idakun" name="idakun" class="form-control" placeholder="Masukkan Kode Akun"  required="yes"> 
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nama Akun</label>
                                            <div class="col-md-9">
                                                <input type="text" id="namaakun" name="namaakun" class="form-control" placeholder="Masukkan Nama Akun"  required="yes">
                                                <input type="hidden" value="<?php echo $idpertanyaan;?>" id="idsoal" name="idsoal">
                                                <input type="hidden" value="<?php echo $_SESSION['username'];?>" id="nim" name="nim">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Posisi Neraca Saldo</label>
                                            <div class="col-md-9">
												<select name="posisi" id="posisi" class="form-control">
													<option value="debit">Debet</option>
													<option value="kredit">Kredit</option>
												</select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Kategori Laporan</label>
                                            <div class="col-md-9">
												<select name="kategori" id="kategori" class="form-control">
												<option value="nolap">Tidak Masuk Laporan & Neraca</option>
												<?php
												$sqllap = "SELECT DISTINCT(laporan) as laporan FROM kategori WHERE idsoal = '".$idpertanyaan."' AND nim = '".$_SESSION['username']."'";
												$resultlap = mysqli_query($connect, $sqllap);
												$no = 1;
												while($rowlap = mysqli_fetch_assoc($resultlap)){
													$laporan = $rowlap['laporan'];
												?>
													<optgroup label="<?php echo $no.". ".$laporan;?>">
													<?php
													$sqlkat = "SELECT DISTINCT(kategori) as kategori FROM kategori WHERE laporan = '".$laporan."' AND idsoal = '".$idpertanyaan."' AND nim = '".$_SESSION['username']."'";
													$resultkat = mysqli_query($connect, $sqlkat);
													$no1 = 1;
													while($rowkat = mysqli_fetch_assoc($resultkat)){
													$kategori = $rowkat['kategori'];
													?>
														<optgroup label="<?php echo $no.".".$no1.". ".$kategori;?>">
														<?php
														$sqlsubkat = "SELECT idkategori, subkategori FROM kategori WHERE laporan = '".$laporan."' AND kategori = '".$kategori."' AND idsoal = '".$idpertanyaan."' AND nim = '".$_SESSION['username']."'";
														$resultsubkat = mysqli_query($connect, $sqlsubkat);
														$jumlah = mysqli_num_rows($resultsubkat);
														while($rowsubkat = mysqli_fetch_assoc($resultsubkat)){
														$subkategori = $rowsubkat['subkategori'];
														$idkat = $rowsubkat['idkategori'];
														?>
														<option value="<?php echo $idkat;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $subkategori;?></option>
														<?php
														}													
														?>
														</optgroup>
													<?php
													$no1++;
													}
													?>
													</optgroup>
												<?php
												$no++;
												}
												?>
												</select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                                    <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                                    <button id="submit" type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
                                                    </form>
                                                    
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
							
							 <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h3 class="modal-title">Edit Data Akun</h3>
                                                </div>
                                                <div class="modal-body">
							<form id="form-validation" method="post" class="form-horizontal form-bordered">

							<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Kode Akun</label>
                                            <div class="col-md-9">
                                                <input type="text" id="kodeakun" name="kodeakun" class="form-control" placeholder="Masukkan Kode Akun"> 
                                                <input type="hidden" id="idakun" name="idakun">
												<span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nama Akun</label>
                                            <div class="col-md-9">
                                                <input type="text" id="namaakun" name="namaakun" class="form-control" placeholder="Masukkan Nama Akun"  required="yes">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Posisi Neraca Saldo</label>
                                            <div class="col-md-9">
												<select name="posisi" id="posisi" class="form-control">
													<option value="debit">Debit</option>
													<option value="kredit">Kredit</option>
												</select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Kategori Laporan</label>
                                            <div class="col-md-9">
												<select name="kategori" id="kategori" class="form-control">
												<option value="nolap">Tidak Masuk Laporan & Neraca</option>
												<?php
												$sqllap = "SELECT DISTINCT(laporan) as laporan FROM kategori WHERE idsoal = '".$idpertanyaan."' AND nim = '".$_SESSION['username']."'";
												$resultlap = mysqli_query($connect, $sqllap);
												while($rowlap = mysqli_fetch_assoc($resultlap)){
													$laporan = $rowlap['laporan'];
												?>
													<optgroup label="<?php echo $laporan;?>">
													<?php
													$sqlkat = "SELECT DISTINCT(kategori) as kategori FROM kategori WHERE laporan = '".$laporan."' AND idsoal = '".$idpertanyaan."' AND nim = '".$_SESSION['username']."'";
													$resultkat = mysqli_query($connect, $sqlkat);
													while($rowkat = mysqli_fetch_assoc($resultkat)){
													$kategori = $rowkat['kategori'];
													?>
														<optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $kategori;?>">
														<?php
														$sqlsubkat = "SELECT idkategori, subkategori FROM kategori WHERE kategori = '".$kategori."' AND idsoal = '".$idpertanyaan."' AND nim = '".$_SESSION['username']."'";
														$resultsubkat = mysqli_query($connect, $sqlsubkat);
														while($rowsubkat = mysqli_fetch_assoc($resultsubkat)){
														$subkategori = $rowsubkat['subkategori'];
														$idkat = $rowsubkat['idkategori'];
														?>
															<option value="<?php echo $idkat;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $subkategori;?></option>
														<?php
														}
														?>
														</optgroup>
													<?php
													}
													?>
													
													</optgroup>
												<?php
												}
												?>
												</select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                                    <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                                    <button id="update" type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
                                                    </form>
                                                    
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
							
				
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
<div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header text-center">
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> Profil Setting</h2>
                    </div>
                    <!-- END Modal Header -->

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form action="index.html" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="example-text-input">Username</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static">16010020</p>
                                    </div>
                                </div>		
                            </fieldset>
							
							
							<fieldset>
							 <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Password</label>
                                            <div class="col-md-9">
                                               <input type="password" id="user-settings-password" name="user-settings-password" class="form-control" placeholder="Masukkan Password..">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
							</fieldset>
							<fieldset>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nama</label>
                                            <div class="col-md-9">
                                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama..">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
							</fieldset>
                            
                            <div class="form-group form-actions">
                                <div class="col-xs-12 text-right">
                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- END Modal Body -->
                </div>
            </div>
        </div>
					  
					
					
					
					 <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h3 class="modal-title">Tambah Dosen</h3>
                                                </div>
                                                <div class="modal-body">
                                    <form id="form-validation" action="data_dosen.html" method="post" class="form-horizontal form-bordered">
                                   
										<!-- <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Tanggal</label>
                                            <div class="col-md-9">
                                                <input type="text" id="tanggal" name="tanggal1" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" placeholder="Tanggal">
                                                <span class="help-block"></span>
                                            </div>
                                        </div> -->
										
																				
                                      
										
										
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Password</label>
                                            <div class="col-md-9">
                                               <input type="password" id="user-settings-password" name="user-settings-password" class="form-control" placeholder="Please choose a complex one..">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nama</label>
                                            <div class="col-md-9">
                                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Input nama">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    
                                                </div>
                                                <div class="modal-footer">
												<div class="col-md-8 col-md-offset-4">
                                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                                    <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                                    <button type="submit" name="submit1" class="btn btn-sm btn-primary">submit</button>
														<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>
												</div>
                                                    </form>
                                                    
                                                  
                                                </div>
                                            </div>
											</div>
                                    </div>
		
		
		
		
		

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