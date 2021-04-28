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
					var username = $("#tambah #username").val();
					var password = $("#tambah #password").val();
					var nama = $("#tambah #nama").val();
					var dataString = 'nama='+ nama + '&username='+ username + '&password='+ password;
					if(nama==''||username==''||password=='')
					{
						alert("Please Fill All Fields");
					}
					else
					{
						// AJAX Code To Submit Form.
						$.ajax({
						type: "POST",
						url: "admin_data_Admin_tambah.php",
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
					var username = $("#edit #username").val();
					var password = $("#edit #password").val();
					var nama = $("#edit #nama").val();
					var dataString ='nama='+ nama + '&password='+ password + '&username='+ username;
					if(nama==''||password==''||username=='')
					{
						alert("Please Fill All Fields");
					}
					else
					{
						// AJAX Code To Submit Form.
						$.ajax({
						type: "POST",
						url: "admin_data_Admin_edit_proses.php",
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
                                    <i class=""></i>Data Admin<br><small>Kelola Data Admin</small>
								<!--	<br>
									<br>
									<strong>Data Dosen</strong><br><small>Kelola Data Dosen</small> -->
                                </h1>
                            </div>
							</div>
							
						<ul class="breadcrumb breadcrumb-top">
                            <li><a href="index_admin.php">Dashboard</a></li>
							<li>Data Admin</li>
                            
                        </ul>
							
						
						<div class="block full">
                            <!-- All Products Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                </div>
                                <h2><strong>Tabel</strong> Admin</h2>
                            </div>
                            <!-- END All Products Title -->

							
							<div class="table-responsive">
                            	<a href="#tambah" class="btn btn-primary" data-toggle="modal">Tambah Data Admin</a>
							<br>
							<br>
							
								
							
                            <!-- All Products Content -->
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
										<th class="text-center">No</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Password</th>
										<th class="text-center">Nama</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
								
								
								
                                <tbody>
								<?php
								$sql = "SELECT * FROM Admin";
								$no = 1;
								$result = mysqli_query($connect, $sql);
								while($row = mysqli_fetch_assoc($result)){
								?>
									<tr>
										<td class="text-center"><?php echo $no;?></td>
                                        <td class="text-center"><?php echo $row['username'];?></td>
                                        <td class="text-center"><?php echo md5($row['password']);?></td>
                                        <td class="text-center"><?php echo $row['nama'];?></td>
										<td class="text-center">
                                            <a data-href="admin_data_Admin_edit_data.php?username=<?php echo base64_encode($row["username"]); ?>" href="#edit" data-toggle="modal" title="Edit"  class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</i></a>	
											<a href="admin_data_Admin_delete.php?username=<?php echo $row["username"]; ?>" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Delete</i></a>
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
						
				
				</div><!-- Page-Content -->
					
                    <?php
					include "sidebar/footer.php"
					?>
					
                </div><!-- Main-Container -->
            </div><!-- Page-Container -->
        </div><!-- Page Wrapper -->
					
					
					
		 <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h3 class="modal-title">Tambah Admin</h3>
                                                </div>
                                                <div class="modal-body">
							<form id="form-validation" method="get" class="form-horizontal form-bordered">

							<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Username</label>
                                            <div class="col-md-9">
                                                <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan Username"  required="yes"> 
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Password</label>
                                            <div class="col-md-9">
                                                <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password"  required="yes">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nama</label>
                                            <div class="col-md-9">
                                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama" required="yes">
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
                                                    <h3 class="modal-title">Edit Data Admin</h3>
                                                </div>
                                                <div class="modal-body">
							<form id="form-validation" method="post" class="form-horizontal form-bordered">

							<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Username</label>
                                            <div class="col-md-9">
                                                <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan Username"  readonly="yes"> 
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Password</label>
                                            <div class="col-md-9">
                                                <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password"  required="yes">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nama</label>
                                            <div class="col-md-9">
                                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama" required="yes">
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
                                                    <h3 class="modal-title">Tambah Admin</h3>
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