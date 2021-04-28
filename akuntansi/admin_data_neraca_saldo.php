<?php session_start();
include 'koneksi.php';
if(empty(@$_SESSION['username'])){
        header("Location:login.php");
}else{
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
					var dataString = 'idakun='+ idakun + '&namaakun='+ namaakun + '&idsoal='+ idsoal;
					if(idakun==''||namaakun=='')
					{
						alert("Please Fill All Fields");
					}
					else
					{
						// AJAX Code To Submit Form.
						$.ajax({
						type: "POST",
						url: "data_akun_tambah.php",
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
					var namaakun = $("#edit #namaakun").val();
					var dataString ='namaakun='+ namaakun + '&idakun='+ idakun;
					if(namaakun==''||idakun=='')
					{
						alert("Please Fill All Fields");
					}
					else
					{
						// AJAX Code To Submit Form.
						$.ajax({
						type: "POST",
						url: "data_akun_edit_proses.php",
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
                include "sidebar/sidebar_admin.php";
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
                                    <i class=""></i>Data Neraca Saldo<br><small>Kelola Data Neraca Saldo</small>
								
                                </h1>
                            </div>
							</div>
							
						<ul class="breadcrumb breadcrumb-top">
                            <li><a href="data_akun.php">Data Akun</a></li>
							<li>Data Neraca Saldo</li>
                            
                        </ul>
							
						
						 <div class="block full">
                            <!-- All Products Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                </div>
                                <h2><strong>Tabel</strong> Neraca Saldo</h2>
                            </div>
                           
						   
						   <a href="export_PDF_neraca_saldo.php?user=<?php echo base64_encode($_SESSION['username']);?>&id=<?php echo base64_encode($_SESSION['id']);?>" title="Download" class="btn btn alert-danger">
								<i class="fa fa-download"></i> CETAK NERACA SALDO</i></a>
							
							<br>
							<br>
							
								
							
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                    	<th class="text-center">No</th>
										<th class="text-center">ID Akun</th>
                                        <th class="text-center">Uraianbb</th>
                                        <th class="text-center">Debit</th>
                                        <th class="text-center">Kredit</th>
                                    </tr>
                                </thead>
								
																
                                <tbody>
                                <?php
								$jumlahdebit = 0;
								$jumlahkredit = 0;
								$no = 1;
								
								$sqlakun = "SELECT * FROM akun";
								$queryakun = mysqli_query($connect, $sqlakun);
								
								while($resultakun = mysqli_fetch_assoc($queryakun)){
									$kodeakun = $resultakun['kodeakun'];
									$namaakun = $resultakun['namaakun'];
									$posisiakun = $resultakun['posisi'];
									
									$sqlambilsaldoakhir = "SELECT * FROM bukubesar WHERE kodeakun = '".$kodeakun."' ORDER BY idbb DESC LIMIT 1";
									$queryambilsaldoakhir = mysqli_query($connect, $sqlambilsaldoakhir);
									$resultambilsaldoakhir = mysqli_fetch_assoc($queryambilsaldoakhir);
									
									$saldo = $resultambilsaldoakhir['saldo'];
									
									if($posisiakun == 'debit'){
										$debit = $saldo;
										$jumlahdebit = $jumlahdebit+$debit;
										$kredit = 0;
									}else if($posisiakun == 'kredit'){
										$kredit = $saldo*(-1);
										$jumlahkredit = $jumlahkredit+$kredit;
										$debit = 0;
									}
								

                                /*$sqlcek = "SELECT COUNT(kodeakun) as jumlah FROM bukubesar";
                                $querycek = mysqli_query($connect, $sqlcek);
                                $resultcek = mysqli_fetch_assoc($querycek);

                                if($resultcek['jumlah'] > 0){ 
								
								$username = $_SESSION['username'];
								$sql = "  SELECT DISTINCT kodeakun FROM bukubesar";
								$no = 1;
								$result = mysqli_query($connect, $sql);

								$jumlahdebit = 0;
								$jumlahkredit = 0;

                                while($row = mysqli_fetch_assoc($result)){
                                	$kodeakun = $row['kodeakun'];
									$sql2 = " SELECT bukubesar.kodeakun, akun.namaakun, @k:=IF(akun.posisi='kredit',bukubesar.saldo,0) AS kredit, @d:=IF(akun.posisi='debit',bukubesar.saldo,0) AS debit
									FROM bukubesar
									join akun on akun.kodeakun = bukubesar.kodeakun 
									WHERE  bukubesar.kodeakun = '$kodeakun' 
									ORDER BY bukubesar.tgl DESC LIMIT 1";

									$result2 = mysqli_query($connect, $sql2);

									$sql3 = " SELECT SUM(bukubesar.saldo)
									FROM bukubesar
									JOIN akun ON akun.kodeakun = bukubesar.kodeakun 
									WHERE bukubesar.kodeakun = '$kodeakun' 
									AND akun.`posisi` = 'debit'
									ORDER BY bukubesar.idbb DESC LIMIT 1";

									$result3 = mysqli_query($connect, $sql3);

										while($row2= mysqli_fetch_assoc($result2)){
											if($row2['kredit'] < 0){
												$kredit = $row2['kredit']*-1;
											}else{
												$kredit = $row2['kredit'];
											}

											if($row2['debit'] < 0){
												$debit = $row2['debit']*-1;
											}else{
												$debit = $row2['debit'];
											}

										$jumlahdebit = $debit+$jumlahdebit;
										$jumlahkredit = $kredit+$jumlahkredit;*/

								?>
								<tr>
										<td class="text-center"><?php echo $no;?></td>
                                        <td class="text-center"><?php echo $kodeakun;?></td>
                                        <td class="text-center"><?php echo $namaakun;?></td>
                                        <td class="text-center"><?php echo number_format($debit)."";?></td>
                                        <td class="text-center"><?php echo number_format($kredit)."";?></td>
                                </tr>
                                    <?php
									$no++;
								}
								/*
								}
								}
								*/
                            
								?>

								<?php
								//$row2 = mysqli_fetch_assoc($result2);
								//$row3 = mysqli_fetch_assoc($result3);
								//$jmlkredit = $row2['jumlahkredit']*(-1);
								?>
								<tr>
									<td colspan="3" bgcolor="#aad178" class="text-center"><h5>Grand Total</h5></td>
									<td bgcolor="#aad178" class="text-center"><h5><?php echo number_format($jumlahdebit)."";?></h5></td>
									<td bgcolor="#aad178" class="text-center"><h5><?php echo number_format($jumlahkredit)."";?></h5></td>
								</tr>
								<?php
								?>
								


                     </tbody>
                            </table>
                     </div>
                
						
				
				</div><!-- Page-Content -->
					
                    <?php
					include "sidebar/footer.php";
					?>
					
                </div><!-- Main-Container -->
            </div><!-- Page-Container -->
        </div><!-- Page Wrapper -->
		
		
		
		
		
		
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

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
                                            <label class="col-md-3 control-label" for="example-text-input">ID Akun</label>
                                            <div class="col-md-9">
                                                <input type="text" id="idakun" name="idakun" class="form-control" placeholder="Masukkan ID Akun"  readonly="yes"> 
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