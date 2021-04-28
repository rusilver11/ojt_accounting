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
					
					var posisi = $("#tambah #posisi").val();
					var kategori = $("#tambah #kategori").val();
					var dataString = 'idakun='+ idakun + '&namaakun='+ namaakun + '&idsoal='+ idsoal +'&posisi='+ posisi +'&kategori='+ kategori;
					if(idakun==''||namaakun=='')
					{
						alert("Please Fill All Fields");
					}
					else
					{
						// AJAX Code To Submit Form.
						$.ajax({
						type: "POST",
						url: "admin_data_akun_tambah.php",
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
						url: "admin_data_akun_edit_proses.php",
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
                                    <i class=""></i>EKUITAS<br><small>Lihat EKUITAS</small>
								<!--	<br>
									<br>
									<strong>Data admin</strong><br><small>Kelola Data admin</small> -->
                                </h1>
                            </div>
							</div>
							
						<ul class="breadcrumb breadcrumb-top">
                            
							<li>Data EKUITAS</li>
                            
                        </ul>
						
						
						
						
						
                        
                        <div class="block full">
                            <!-- All Products Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                </div>
                                <h2><strong>EKUITAS</strong></h2>
                            </div>
                            <!-- END All Products Title -->


							
							<div class="table-responsive">
                            	
                                <?php
								$query2 = "select tgl from transaksi LIMIT 1";
								$result2 = mysqli_query($connect, $query2);
								$row = mysqli_fetch_assoc($result2);
								$date = date_parse_from_format("Y-m-d", $row['tgl']);
								//output the bits
								$tgl = "$date[year]";
							?>
							
							
							<a href="export_PDF_EKUITAS.php" title="Download" class="btn btn alert-danger">
								<i class="fa fa-download"></i> CETAK EKUITAS</a>
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

<!--------------------------------------MODAL AWAL----------------------------------->
<!--------------------------------------MODAL AWAL----------------------------------->
<!--------------------------------------MODAL AWAL----------------------------------->
<!--------------------------------------MODAL AWAL----------------------------------->

<?php
		$xend = 0;
			$querynamakat = "SELECT nokategori, UCASE(namakategori) as namakategori FROM kategori WHERE nokategori = '7';";
			$resultnamakat = mysqli_query($connect, $querynamakat);
			while($rownamakat = mysqli_fetch_assoc($resultnamakat)){
				$namakat = $rownamakat['namakategori'];
				$idkat = $rownamakat['nokategori'];
?>
			
<?php
				$xkat = 0;
				$querynamasub = "SELECT idkategori, idsubkategori, UCASE(subkategori) AS subkategori FROM subkategori WHERE laporan = 'Laporan Perubahan Ekuitas' AND kategori = '$idkat' ORDER BY idsubkategori;";
				$resultnamasub = mysqli_query($connect, $querynamasub);
				while($rownamasub = mysqli_fetch_assoc($resultnamasub)){
					$idsubkat = $rownamasub['idsubkategori'];
					$subkat = $rownamasub['subkategori'];
					$idsub = $rownamasub['idkategori'];
?>
			
<?php
					$xsubkat = 0;
					$queryakun = "SELECT * FROM akun WHERE laporan = '$idsub' ORDER BY kodeakun;";
					$resultakun = mysqli_query($connect, $queryakun);
					while($rowakun = mysqli_fetch_assoc($resultakun)){
						$kodeakun = $rowakun['kodeakun'];
						$namaakun = $rowakun['namaakun'];
						$querytgl = "SELECT * FROM bukubesar WHERE kodeakun = '$kodeakun' ORDER BY tgl asc LIMIT 1";
						$resultgl = mysqli_query($connect, $querytgl);
						$rowtgl = mysqli_fetch_assoc($resultgl);
						$tgl = $rowtgl['tgl'];
						$saldo = $rowtgl['saldo']*(-1);
						

					$querytgllebih = "SELECT * FROM bukubesar WHERE kodeakun = '$kodeakun' ORDER BY tgl DESC LIMIT 1";
					$resultsaldolebih = mysqli_query($connect, $querytgllebih);
					$rowsaldolebih = mysqli_fetch_assoc($resultsaldolebih);
					$jmlsaldolebih = ($rowsaldolebih['saldo']*(-1)) - $saldo;
?>
			<tr>
				<td><?php echo $kodeakun;?></td>
				<td style="border-right:none;" width="6px"></td>
				<td><h5>Modal</h5></td>
				<td class="text-right"><h5><?php echo number_format($saldo)."";?></h5></td>	
			</tr>

			<tr>
				<td></td>
				<td style="border-right:none;" width="6px"></td>
				<td><h5>Tambah Setoran Modal</h5></td>
				
				<td class="text-right"><h5><?php echo number_format($jmlsaldolebih)."";?></h5></td>
			</tr>
<?php
						$xsubkat = $saldo+$jmlsaldolebih;
					}
?>
			
<?php
	}
		}
?>





<!-----------------------------LABA------------------------------------->
<!-----------------------------LABA------------------------------------->
<!-----------------------------LABA------------------------------------->
<!-----------------------------LABA------------------------------------->
<tr>
<?php
$queryidkat = "SELECT kategori FROM subkategori WHERE laporan = 'Laporan laba rugi' GROUP BY kategori;";
$resultidkat = mysqli_query($connect, $queryidkat);
$numrows1 = mysqli_num_rows($resultidkat);
	if($numrows1 > 0){
		$zend = 0;
		while($rowidkat = mysqli_fetch_assoc($resultidkat)){
			$idkat = $rowidkat['kategori'];
			$querynamakat = "SELECT nokategori, UCASE(namakategori) as namakategori FROM kategori WHERE nokategori = '$idkat';";
			$resultnamakat = mysqli_query($connect, $querynamakat);
			while($rownamakat = mysqli_fetch_assoc($resultnamakat)){
				$namakat = $rownamakat['namakategori'];
				$idkat = $rownamakat['nokategori'];

				$zkat = 0;
				$querynamasub = "SELECT idkategori, idsubkategori, UCASE(subkategori) AS subkategori FROM subkategori WHERE laporan = 'Laporan laba rugi' AND kategori = '$idkat' ORDER BY idsubkategori;";
				$resultnamasub = mysqli_query($connect, $querynamasub);
				while($rownamasub = mysqli_fetch_assoc($resultnamasub)){
					$idsubkat = $rownamasub['idsubkategori'];
					$subkat = $rownamasub['subkategori'];
					$idsub = $rownamasub['idkategori'];


					$zsubkat = 0;
					$queryakun = "SELECT * FROM akun WHERE laporan = '$idsub' ORDER BY kodeakun;";
					$resultakun = mysqli_query($connect, $queryakun);
					while($rowakun = mysqli_fetch_assoc($resultakun)){
						$kodeakun = $rowakun['kodeakun'];
						$namaakun = $rowakun['namaakun'];
						$querytgl = "SELECT MAX(tgl) as tgl FROM bukubesar WHERE kodeakun = '$kodeakun'";
						$resultgl = mysqli_query($connect, $querytgl);
						$rowtgl = mysqli_fetch_assoc($resultgl);
						$tgl = $rowtgl['tgl'];
						
						$querysaldo = "SELECT saldo FROM bukubesar WHERE tgl = '$tgl' AND kodeakun = '$kodeakun'";
						$resultsaldo = mysqli_query($connect, $querysaldo);
						$rowsaldo = mysqli_fetch_assoc($resultsaldo);
						if($rowsaldo['saldo'] < 0){
							$saldo = $rowsaldo['saldo']*(-1);
						}else{
							$saldo = $rowsaldo['saldo'];
						}

						$zsubkat = $saldo+$zsubkat;
					}

					$zkat = $zkat+$zsubkat;
				}

				$zend = $zkat-$zend;
				$zenda = $zend;
				if ($zenda < 0) {
					$zenda = $zenda *(-1) ; 
				}else{
					$zenda = $zenda; 
				}
				
			}
		}
?>
		<tr>
			<td></td>
			<td style="border-right:none;" width="6px"></td>
				<td><h5>Laba Bersih Usaha</h5></td>
			<td class="text-right" bgcolor=""><h5><?php echo number_format($zenda)."";?></h5></td>
		</tr>
<?php
	}
?>

</tr>





<!----------------------------------------------DEVIDEN---------------------------------------->

<?php
	
		$pxend = 0;
			$querynamakat = "SELECT nokategori, UCASE(namakategori) as namakategori FROM kategori WHERE nokategori = '8';";
			$resultnamakat = mysqli_query($connect, $querynamakat);
			while($rownamakat = mysqli_fetch_assoc($resultnamakat)){
				$namakat = $rownamakat['namakategori'];
				$idkat = $rownamakat['nokategori'];
			}
?>
<?php
				$pkatek = 0;
				$querynamasub = "SELECT idkategori, idsubkategori, UCASE(subkategori) AS subkategori FROM subkategori WHERE laporan = 'laporan Perubahan ekuitas' AND kategori = '$idkat' ORDER BY idsubkategori;";
				$resultnamasub = mysqli_query($connect, $querynamasub);
				while($rownamasub = mysqli_fetch_assoc($resultnamasub)){
					$idsubkat = $rownamasub['idsubkategori'];
					$subkat = $rownamasub['subkategori'];
					$idsub = $rownamasub['idkategori'];
				}
?>			
<?php
					$psaldo = 0 ;
					$psubkat = 0;
					$queryakun = "SELECT * FROM akun WHERE laporan = '$idsub' ORDER BY kodeakun;";
					$resultakun = mysqli_query($connect, $queryakun);
					$jmlekuitas = mysqli_num_rows($resultakun);
					
					while($rowakun = mysqli_fetch_assoc($resultakun)){
						$kodeakun = $rowakun['kodeakun'];
						$namaakun = $rowakun['namaakun'];
						$querytgl = "SELECT MAX(tgl) as tgl FROM bukubesar WHERE kodeakun = '$kodeakun'";
						$resultgl = mysqli_query($connect, $querytgl);
						$rowtgl = mysqli_fetch_assoc($resultgl);
						$tgl = $rowtgl['tgl'];
						
						$querysaldo = "SELECT saldo FROM bukubesar WHERE tgl = '$tgl' AND kodeakun = '$kodeakun'";
						$resultsaldo = mysqli_query($connect, $querysaldo);
						$prowsaldo = mysqli_fetch_assoc($resultsaldo);
						if($prowsaldo['saldo'] < 0){
							$psaldo = $prowsaldo['saldo'];
						}else{
							$psaldo = $prowsaldo['saldo'];
						}

						$psaldo = $psaldo *(-1);
					}

			$labaditahan = $zenda + $psaldo; 
?>


	<tr>
				<td></td>
				<td style="border-right:none;" width="6px"></td>
				<td><h5>Deviden</h5></td>
				<td class="text-right"><h5><?php echo number_format($psaldo)."";?></h5></td>	
			</tr>





<!------------------------------------------EKUITAS----------------------------------->
<!------------------------------------------EKUITAS----------------------------------->
<!------------------------------------------EKUITAS----------------------------------->
<!------------------------------------------EKUITAS----------------------------------->



<?php
		$hasil = 0;
		$axend = 0;
			$querynamakat = "SELECT nokategori, UCASE(namakategori) as namakategori FROM kategori WHERE nokategori = '3';";
			$resultnamakat = mysqli_query($connect, $querynamakat);
			$numrows2 = mysqli_num_rows($resultnamakat);
			while($rownamakat = mysqli_fetch_assoc($resultnamakat)){
				$namakat = $rownamakat['namakategori'];
				$idkat = $rownamakat['nokategori'];
?>
			
<?php
				$akatek = 0;
				$querynamasub = "SELECT idkategori, idsubkategori, UCASE(subkategori) AS subkategori FROM subkategori WHERE laporan = 'laporan Perubahan ekuitas' AND kategori = '$idkat' ORDER BY idsubkategori;";
				$resultnamasub = mysqli_query($connect, $querynamasub);
				while($rownamasub = mysqli_fetch_assoc($resultnamasub)){
					$idsubkat = $rownamasub['idsubkategori'];
					$subkat = $rownamasub['subkategori'];
					$idsub = $rownamasub['idkategori'];
?>
			
<?php
					$asubkat = 0;
					$queryakun = "SELECT * FROM akun WHERE laporan = '$idsub' ORDER BY kodeakun;";
					$resultakun = mysqli_query($connect, $queryakun);
					$jmlekuitas = mysqli_num_rows($resultakun);
					if($jmlekuitas == 0){
						echo "<td class='text-right'>0</td>";
					}
					while($rowakun = mysqli_fetch_assoc($resultakun)){
						$kodeakun = $rowakun['kodeakun'];
						$namaakun = $rowakun['namaakun'];
						$querytgl = "SELECT MAX(tgl) as tgl FROM bukubesar WHERE kodeakun = '$kodeakun'";
						$resultgl = mysqli_query($connect, $querytgl);
						$rowtgl = mysqli_fetch_assoc($resultgl);
						$tgl = $rowtgl['tgl'];
						
						$querysaldo = "SELECT saldo FROM bukubesar WHERE tgl = '$tgl' AND kodeakun = '$kodeakun'";
						$resultsaldo = mysqli_query($connect, $querysaldo);
						$rowsaldo = mysqli_fetch_assoc($resultsaldo);
						if($rowsaldo['saldo'] < 0){
							$saldo = $rowsaldo['saldo'];
						}else{
							$saldo = $rowsaldo['saldo'];
						}

						$saldo = $saldo *(-1);
?>



			<tr>
				<td><?php echo $kodeakun;?></td>
				<td style="border-right:none;" width="6px"></td>
				<td><h5><?php echo $namaakun;?></h5></td>
				<td class="text-right"><h5><?php echo number_format($saldo)."";?></h5></td>	
			</tr>



<?php
						$asubkat = $saldo+$asubkat;
					}
					$akatek = $akatek+$asubkat;//+$labarugi
					if ($akatek < 0) {
						$akateka = $akatek;
						}else{
							$akateka = $akatek;
					}



					$hasil = $akateka + $labaditahan + $xsubkat;
}
				}
?>
			<tr>

			<tr>
				<td></td>
				<td colspan="2" bgcolor="#6ad2eb"><h4>JUMLAH <?php echo $namakat;?> (MODAL)</h4></td>
				<td class="text-right" bgcolor="#6ad2eb"><h4><?php echo number_format($hasil)."";?></h4></td>
				<td></td>
				<!--
				<td class="text-right" bgcolor="#6ad2eb"><h4>lain= <?php echo number_format($akateka)."";?></h4></td>
				<td class="text-right" bgcolor="#6ad2eb"><h4>laba rugi =<?php echo number_format($zenda)."";?></h4></td>
				<td class="text-right" bgcolor="#6ad2eb"><h4>modal =<?php echo number_format($xsubkat)."";?></h4></td>
				-->
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