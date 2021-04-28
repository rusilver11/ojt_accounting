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

        <title>AKUNTANSI SEKTOR PUBLIK</title>

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
		
    </head>
	
	
	
	
    <body>
        <div id="page-wrapper">
            
            <div class="preloader themed-background">
                <h1 class="push-top-bottom text-light text-center"><strong>AA</strong>UI</h1>
                <div class="inner">
                    <h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>
                    <div class="preloader-spinner hidden-lt-ie10"></div>
                </div>
            </div>
           
		   
		   
            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
				<?php
					include "sidebar/sidebar_admin.php"
					?>		
                
				
				<div id="main-container">                
				   <?php
					include "sidebar/header.php";
					?>
                <div id="page-content">
				<div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class=""></i>Data Mahasiswa<br><small>Kelola Data Mahasiswa</small>
								<!--	<br>
									<br>
									<strong>Data Dosen</strong><br><small>Kelola Data Dosen</small> -->
                                </h1>
                            </div>
							</div>
							
						<ul class="breadcrumb breadcrumb-top">
                            <li><a href="index_admin.php">Dashboard</a></li>
							<li>Data Mahasiswa</li>
                            
                        </ul>
						
						<div class="block full">
                            <!-- All Products Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                </div>
                                <h2><strong>Table</strong> Mahasiswa</h2>
                            </div>
                            <!-- END All Products Title -->

							
							<div class="table-responsive">
                            	<a href="#tambah" class="btn btn-primary" data-toggle="modal">Tambah Data Mahasiswa</a>
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
								$sql = "SELECT * FROM mahasiswa";
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
                                            <a data-href="admin_data_mahasiswa_edit_data.php?username=<?php echo base64_encode($row["username"]); ?>" href="#edit" data-toggle="modal" title="Edit"  class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</i></a>	
											<a href="admin_data_mahasiswa_delete.php?username=<?php echo $row["username"]; ?>" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Delete</i></a>
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
                                                    <h3 class="modal-title">Tambah Mahasiswa</h3>
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
                                                    <h3 class="modal-title">Edit Data Mahasiswa</h3>
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
	
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

        <!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->

        <!-- END User Settings -->
			  
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