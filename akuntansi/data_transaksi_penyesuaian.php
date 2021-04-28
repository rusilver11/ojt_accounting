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

        <title>PD. Cand Birawa</title>

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
					var dataString = 'idakun='+ idakun + '&namaakun='+ namaakun;
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
					var nobukti = $("#edit #nobukti").val();
					var tgl = $("#edit #tgl").val();
					var kodeakun = $("#edit #kodeakun").val();
					var uraianjurnal = $("#edit #uraianjurnal").val();
					var uraianbb = $("#edit #uraianbb").val();
					var ref = $("#edit #ref").val();
					var debit = $("#edit #debit").val();
					var kredit = $("#edit #kredit").val();
					var dataString ='nobukti='+ nobukti + '&kodeakun='+ kodeakun + '&tgl='+ tgl + '&uraianjurnal='+ uraianjurnal + '&uraianbb='+ uraianbb + '&ref='+ ref + '&debit='+ debit + '&kredit='+ kredit;
					if(tgl==''||uraianjurnal=='')
					{
						alert("Please Fill All Fields");
					}
					else
					{
						// AJAX Code To Submit Form.
						$.ajax({
						type: "POST",
						url: "data_transaksi_edit_proses.php",
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
                                    <i class=""></i>Data Transaksi Penyesuaian<br><small>Kelola Data Transaksi Penyesuaian</small>
								
                                </h1>
                            </div>
							</div>
							
						<ul class="breadcrumb breadcrumb-top">
                            <li><a href="data_akun.php">Data Akun</a></li>
							<li>Data Transaksi Penyesuaian</li>
                            
                        </ul>
							
						
						 <div class="block full">
                            <!-- All Products Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                </div>
                                <h2><strong>Tabel</strong> Transaksi Penyesuaian</h2>
                            </div>
							
							<div class="table-responsive">
                                <a href="data_transaksi_form_tambah_penyesuaian.php" class="btn btn-primary">+ Transaksi Penyesuaian</a>
							<br>
							<br>
							
								
							
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
										<th class="text-center">No</th>
										<th class="text-center">Tanggal</th>
                                        <th class="text-center">No Bukti</th>
                                        <th class="text-center">Uraian JU</th>
										<th class="text-center">Uraian BB</th>
                                        <th class="text-center">Ref</th>
										<th class="text-center">Debet</th>
                                        <th class="text-center">Kredit</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
								
								
								
                                <tbody>
								<?php
								$sql = "SELECT * FROM transaksi where jurnal = 'penyesuaian' ORDER BY tgl ASC";
								//$sql = "SELECT * FROM akun";
								$no = 1;
								$result = mysqli_query($connect, $sql);
                                if($result){
								while($row = mysqli_fetch_assoc($result)){
								if($row['kredit'] > 0){
                                    $uraian =  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['uraianjurnal'];
                                }else{
                                    $uraian =  $row['uraianjurnal'];
                                }
                                if ($row['kredit'] == 0 && $row['debit'] > 0) {
                                    $kredit = 0;
                                    $debet = $row['debit'];
                                }else if ($row['debit'] == 0 && $row['kredit'] > 0) {
                                    $kredit = $row['kredit'];
                                    $debet = 0;
                                }else{
									$debet = 0;
									$kredit = 0;
								}
								?>
									<tr>
										<td class="text-center"><?php echo $no;?></td>
                                        <td class="text-center"><?php echo $row['tgl'];?></td>
                                        <td class="text-center"><?php echo $row['nobukti'];?></td>
                                        <td class="text-center"><?php echo $uraian;?></td>
                                        <td class="text-center"><?php echo $row['uraianbb'];?></td>
                                        <td class="text-center"><?php echo $row['ref'];?></td>
                                        <td class="text-center"><?php echo number_format($debet)."";?></td>
                                        <td class="text-center"><?php echo number_format($kredit)."";?></td>
										<td class="text-center">
                                            
											<a href="data_transaksi_delete_penyesuaian.php?nobukti=<?php echo base64_encode($row["nobukti"]); ?>" onclick="return confirm('Yakin akan Hapus')" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</i></a>
                                        </td>
                                    </tr>
								<?php
								$no++;
								}
                            }
								?>          
                     </tbody>
                            </table>
                     </div>
                      
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
                                                    <h3 class="modal-title">Edit Data Transaksi Penyesuaian</h3>
                                                </div>
                                                <div class="modal-body">
							<form id="form-validation" method="post" class="form-horizontal form-bordered">
							
									 <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Kode Akun</label>
                                            <div class="col-md-9">
                                                    <input name="idakun" id="idakun" type="text" class="form-control" readonly="yes">
                                                <span class="help-block"></span>
												<input type="hidden" id="nobukti" name="nobukti">
												<input type="hidden" id="kodeakun" name="kodeakun">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nama Akun</label>
                                            <div class="col-md-9">
                                                    <input name="namaakun" id="namaakun" type="text" class="form-control" readonly="yes">
                                                <span class="help-block"></span>
												<input type="hidden" id="nobukti" name="nobukti">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Tanggal</label>
                                            <div class="col-md-9"> 
                                                <input type="text" id="tgl" name="tgl" class="form-control input-datepicker" data-date-format='dd/mm/yyyy' placeholder="Masukkan Tanggal"  required="yes">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>  
									<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Uraian Jurnal</label>
                                            <div class="col-md-9">
                                                <input type="text" id="uraianjurnal" name="uraianjurnal" class="form-control" placeholder="Masukkan Uraian Jurnal"  required="yes">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>    
									<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Uraian Buku Besar</label>
                                            <div class="col-md-9">
                                                <input type="text" id="uraianbb" name="uraianbb" class="form-control" placeholder="Masukkan Buku Besar"  required="yes">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>    
									<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Ref</label>
                                            <div class="col-md-9">
                                                <input type="text" id="ref" name="ref" class="form-control" placeholder="Masukkan Ref"  required="yes">
                                                <span class="help-block"></span>
                                            </div>
                                        </div> 
									<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Debit</label>
                                            <div class="col-md-9">
                                                <input type="text" id="debit" name="debit" class="form-control" placeholder="Masukkan Debit"  required="yes">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>   
									<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Kredit</label>
                                            <div class="col-md-9">
                                                <input type="text" id="kredit" name="kredit" class="form-control" placeholder="Masukkan Kredit"  required="yes">
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