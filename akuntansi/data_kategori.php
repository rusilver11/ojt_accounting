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
					var laporan = $("#tambah #laporan").val();
					var kategori = $("#tambah #kategori").val();
					var subkategori = $("#tambah #subkategori").val();
					var dataString = 'laporan='+ laporan + '&kategori='+ kategori + '&subkategori='+ subkategori;
					if(laporan==''||kategori==''||subkategori=='')
					{
						alert("Please Fill All Fields");
					}
					else
					{
						// AJAX Code To Submit Form.
						$.ajax({
						type: "POST",
						url: "data_kategori_tambah.php",
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
					var laporan = $("#edit #laporan").val();
					var kategori = $("#edit #kategori").val();
					var subkategori = $("#edit #subkategori").val();
					var idkategori = $("#edit #idkategori").val();
					var dataString = 'laporan='+ laporan + '&kategori='+ kategori + '&subkategori='+ subkategori + '&idkategori='+ idkategori;
					if(laporan==''||kategori==''||subkategori=='')
					{
						alert("Please Fill All Fields");
					}
					else
					{
						// AJAX Code To Submit Form.
						$.ajax({
						type: "POST",
						url: "data_kategori_edit_proses.php",
						data: dataString,
						cache: false,
						success: function(result){
							window.location=(window.location);
							alert(result);
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
                                    <i class=""></i>Data Kategori<br><small>Kelola Data Kategori</small>
								
                                </h1>
                            </div>
							</div>
							
						<ul class="breadcrumb breadcrumb-top">
                            
							<li>Data Kategori</li>
                            
                        </ul>
						
						
						
						
						
                        
                        <div class="block full">
                            <!-- All Products Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                </div>
                                <h2><strong>Tabel</strong> Kategori</h2>
                            </div>
                            <!-- END All Products Title -->


							
							<div class="table-responsive">
                            	<a href="#tambah" class="btn btn-primary" data-toggle="modal">Tambah Data Kategori</a>
							<br>
							<br>
							
								
							
                            <!-- All Products Content -->
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
										<th class="text-center">No</th>
                                        <th class="text-center">Jenis Laporan</th>
                                        <th class="text-center">Kategori</th>
										<th class="text-center">Sub Kategori</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
								
								
								
                                <tbody>
								<?php
								
								$sql = "SELECT kategori.`namakategori`, subkategori.* 
								FROM subkategori 
								JOIN kategori ON nokategori = kategori 
								";
								//$sql = "SELECT * FROM akun";
								$no = 1;
								$result = mysqli_query($connect, $sql);
							
								while($row = mysqli_fetch_assoc($result)){
								?>
									<tr>
										<td class="text-center"><?php echo $no;?></td>
                                        <td class="text-center"><?php echo $row['laporan'];?></td>
                                        <td class="text-center"><?php echo $row['namakategori'];?></td>
										<td class="text-center"><?php echo $row['subkategori'];?></td>
										<td class="text-center">
                                            <a data-href="data_kategori_edit_data.php?idkategori=<?php echo $row["idkategori"]; ?>" href="#edit" data-toggle="modal" title="Edit"  class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</i></a>
											<a href="data_kategori_delete.php?idkategori=<?php echo $row["idkategori"]; ?>" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</i></a>
										</td>
                                    </tr>
								<?php
								$no++;
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
                                                    <h3 class="modal-title">Tambah Kategori</h3>
                                                </div>
                                                <div class="modal-body">
							<form id="form-validation" method="get" class="form-horizontal form-bordered">

							<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Jenis Laporan</label>
                                            <div class="col-md-9">
                                                <select id="laporan" name="laporan" class="form-control">
													<option value="Neraca">Neraca</option>
													
													<!--<option value="Laporan Realisasi Anggaran">Laporan Realisasi Anggaran</option>
													<option value="Laporan Operasional">Laporan Operasional</option>-->
													<option value="Laporan Laba Rugi">Laba Rugi</option>
													<option value="Laporan Perubahan Ekuitas">Laporan Perubahan Ekuitas</option>
									
									
									<option value="Laporan Perubahan Ekuitas">Laporan Arus Kas</option>

												</select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nama Kategori</label>
                                            <div class="col-md-9">
												<select id="kategori" name="kategori" class="form-control">
													<?php
													$kat1 = "SELECT * FROM kategori";
													$results1 = mysqli_query($connect, $kat1);
												
													while($rows1 = mysqli_fetch_assoc($results1)){
													?>
													<option value="<?php echo $rows1['nokategori'];?>"><?php echo $rows1['namakategori'];?></option>
													<?php
													}
													?>
												</select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nama Sub Kategori</label>
                                            <div class="col-md-9">
												<input type="text" id="subkategori" name="subkategori" class="form-control" placeholder="Masukkan Nama Sub Kategori"  required="yes">
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
                                                    <h3 class="modal-title">Edit Data Kategori</h3>
                                                </div>
                                                <div class="modal-body">
							<form id="form-validation" method="post" class="form-horizontal form-bordered">

							<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Jenis Laporan</label>
                                            <div class="col-md-9">
                                                <select id="laporan" name="laporan" class="form-control">
													<option value="Neraca">Neraca</option>
													<option value="Neraca Saldo">Neraca Saldo</option>
													<option value="Laporan Realisasi Anggaran">Laporan Realisasi Anggaran</option>
													<option value="Laporan Laba Rugi">Laba Rugi</option>
													<option value="Laporan Perubahan Ekuitas">Laporan Perubahan Ekuitas</option>
												</select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nama Kategori</label>
                                            <div class="col-md-9">
												<select id="kategori" name="kategori" class="form-control">
													<?php
													$kat = "SELECT * FROM kategori";
													$results = mysqli_query($connect, $kat);
												
													while($rows = mysqli_fetch_assoc($results)){
													?>
													<option value="<?php echo $rows['nokategori'];?>"><?php echo $rows['namakategori'];?></option>
													<?php
													}
													?>
												</select>
												<input type="hidden" id="idkategori" name="idkategori" class="form-control">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nama Sub Kategori</label>
                                            <div class="col-md-9">
												<input type="text" id="subkategori" name="subkategori" class="form-control" placeholder="Masukkan Nama Sub Kategori"  required="yes">
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