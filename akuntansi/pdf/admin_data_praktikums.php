<?php session_start();
include 'koneksi.php';
if(empty(@$_SESSION['nama'])){
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
					var dataString = 'idakun='+ idakun + '&namaakun='+ namaakun + '&idsoal='+ idsoal +'&nim='+ nim;
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
					var kodeakun = $("#edit #kodeakun").val();
					var nobukti = $("#edit #nobukti").val();
					var tgl = $("#edit #tgl").val();
					var uraianjurnal = $("#edit #uraianjurnal").val();
					var uraianbb = $("#edit #uraianbb").val();
					var ref = $("#edit #ref").val();
					var debit = $("#edit #debit").val();
					var kredit = $("#edit #kredir").val();
					var dataString ='kodeakun='+ kodeakun + '&nobukti='+ nobukti + '&tgl='+ tgl + '&uraianjurnal='+ uraianjurnal + '&uraianbb='+ uraianbb + '&ref='+ ref + '&debit='+ debit + '&kredit='+ kredit;
					if(tgl==''||kodeakun==''||uraianjurnal=='')
					{
						alert("Please Fill All Fields");
					}
					else
					{
						// AJAX Code To Submit Form.
						$.ajax({
						type: "POST",
						url: "mahasiswa_data_transaksi_edit_proses.php",
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
                                    <i class=""></i>Data Praktikum<br><small>Hasil Pekerjaan Mahasiswa</small>
								<!--	<br>
									<br>
									<strong>Data Mahasiswa</strong><br><small>Kelola Data Mahasiswa</small> -->
                                </h1>
                            </div>
							</div>
							
						<ul class="breadcrumb breadcrumb-top">
                            <li>Data Praktikum</li>
							
                            
                        </ul>
							
						
						 <div class="block full">
                            <!-- All Products Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                </div>
                                <h2><strong>Tabel</strong> Data Praktikum Mahasiswa</h2>
                            </div>
							
							<div class="table-responsive">
                        
							<br>
							
								
							
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
										
										<th class="text-center">Tanggal</th>
                                        <th class="text-center">NIM</th>
                                        <th class="text-center">Nama</th>
										<th class="text-center">Kode Soal</th>
                                        <th class="text-center">Hasil Praktikum</th>
								    </tr>
                                </thead>
								
								
								
                                <tbody>
							
									<tr>
										<?php
										$nim = $_SESSION['username'];
										$kueri = mysqli_query($connect, "SELECT mahasiswa.*, pertanyaan.*, riwayatpraktikum.* FROM riwayatpraktikum, mahasiswa, pertanyaan 
											WHERE riwayatpraktikum.nim = mahasiswa.username AND pertanyaan.idpertanyaan = riwayatpraktikum.idsoal
											ORDER BY riwayatpraktikum.idsoal");
										while($row = mysqli_fetch_assoc($kueri)){
										?>
                                        <td class="text-center"><?php echo $row['tgl'];?></td>
                                        <td class="text-center"><?php echo $row['nim'];?></td>
                                        <td class="text-center"><?php echo $row['nama'];?></td>
                                        <td class="text-center"><?php echo $row['idsoal'];?></td>
                                        <td class="text-center">
                                            <!--  -->
											<a href="admin_data_export_PDF_neraca_saldo.php?nim=<?php echo $row['nim'];?>&idsoal=<?php echo $row['idsoal'];?>" title="Download" class="btn btn-sm alert-info"><i class="fa fa-download"></i> NERACA SALDO</i></a>
											<a href="export_PDF_neraca.php?nim=<?php echo $row['nim'];?>&idsoal=<?php echo $row['idsoal'];?>" title="Download" class="btn btn-sm alert-info"><i class="fa fa-download"></i> NERACA</i></a>
											<a href="export_PDF_ekuitas.php?nim=<?php echo $row['nim'];?>&idsoal=<?php echo $row['idsoal'];?>" title="Download" class="btn btn-sm alert-info"><i class="fa fa-download"></i> Ekuitas</i></a>
											<a href="export_PDF_bb.php?nim=<?php echo $row['nim'];?>&idsoal=<?php echo $row['idsoal'];?>" title="Download" class="btn btn-sm alert-info"><i class="fa fa-download"></i> BB</i></a>
											<a href="export_PDF_ju.php?nim=<?php echo $row['nim'];?>&idsoal=<?php echo $row['idsoal'];?>" title="Download" class="btn btn-sm alert-info"><i class="fa fa-download"></i> Jurnal Umum</i></a>

											
                                        </td>
										<?php
										}
										?>
                                    </tr>
								        
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