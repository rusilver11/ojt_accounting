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

<script type="text/javascript" src="js/jquery.js"></script>

        <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="js/maskMoney.js"></script>
		
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
                                    <i class=""></i>Data Piutang<br><small>Kelola Data Piutang</small>
								
                                </h1>
                            </div>
							</div>

						<ul class="breadcrumb breadcrumb-top">
                            <li><a href="data_akun.php">Data Akun</a></li>
							<li><a href="data_piutang.php">Data Piutang</a></li>
							<li>Data Piutang Tambah</li>

                        </ul>


						  <div class="block full">
                            <!-- All Products Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                </div>
                                <h2><strong>Tambah</strong> Piutang</h2>
                            </div>
                            <!-- END All Products Title -->


							<div class="table-responsive">

							<div id="edit" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-body">

								<?php /*
								$query = "select * from admin where username = '".$_SESSION['username']."'";
								$result = mysqli_query($connect, $query);
								if($result) {
									while ($row = mysqli_fetch_row($result)){
										$username = $row[0];
										$password = $row[1];
										$nama = $row[2];
								*/
								?>
							<form action="data_proses_piutang_tambah.php" method="post" class="form-horizontal form-bordered">

						              <h4><strong>Tambah Data Piutang</strong></h4>
                                      <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input" style="text-align:left;">Kode Kios</label>
                                            <div class="col-md-9">
                                                <select name="nama" class="form-control">
                                <?php
                                include 'koneksi.php';
                                $sql = "SELECT * FROM kios";
                                $no = 1;
                                $result = mysqli_query($connect, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                ?>
                                                    <option value="<?php echo $row['kode'];?>"><?php echo $row['alamat'];?> | <?php echo $row['nama'];?></option>
                                <?php
                                }
                                ?>
                                                </select>
                                                <span class="help-block"></span>
                                                <input type="hidden" id="nama1" name="nama1">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input" style="text-align:left;">Tanggal Faktur</label>
                                            <div class="col-md-9">
                                               <input type='text' id='tanggalfak' name='tanggalfak' class='form-control input-datepicker' data-date-format='yyyy/mm/dd' placeholder='tanggal/bulan/tahun' required='yes'>
                                                <span class="help-block"></span>
                                                <input type="hidden" name="cektglfak" value="no">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input" style="text-align:left;">No Faktur</label>
                                            <div class="col-md-9">
                                                <input type="text" id="nofaktur" name="nofaktur" class="form-control" placeholder="Masukkan No Faktur" required="yes">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input" style="text-align:left;">Jumlah/ TON</label>
                                            <div class="col-md-9">
                                                <input type="text" id="ton" name="ton" class="form-control" placeholder="Masukkan Jumlah/ Ton" required="yes">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input" style="text-align:left;">Total Uang</label>
                                            <div class="col-md-9">
                                                <input type="text" id="totaluang" name="totaluang" class="form-control" placeholder="Masukkan Total Uang" required="yes">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input" style="text-align:left;">Piutang</label>
                                            <div class="col-md-9">
                                                <input type="text" id="piutang" name="piutang" class="form-control" placeholder="Masukkan Piutang" required="yes">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input" style="text-align:left;">Sisa</label>
                                            <div class="col-md-9">
                                                <input type="text" id="sisa" name="sisa" class="form-control" placeholder="Masukkan Sisa" readonly="">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        


                                        <br>



                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                                    
                                                    <button id="submit" type="submit" name="submit" class="btn btn-sm btn-primary">Simpan</button>
                                                    </form>
                                                </div>
                                            </div>


                            <!-- All Products Content -->

                            <!-- END All Products Content -->
                        </div>
                        <!-- END All Products Block -->
                    </div>


				</div><!-- Page-Content -->
        </div>
                
                    <?php
					include "sidebar/footer.php";
					?>

                </div><!-- Main-Container -->
            </div><!-- Page-Container -->


        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

        <!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->

        <!-- END User Settings -->



<!-- MODAL	--><!-- MODAL	--><!-- MODAL	--><!-- MODAL	--><!-- MODAL	--><!-- MODAL	--><!-- MODAL	--><!-- MODAL	--><!-- MODAL	--><!-- MODAL	--><!-- MODAL	--><!-- MODAL	-->



<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
<script>
	function tandaPemisahTitik(b){
var _minus = false;
if (b<0) _minus = true;
b = b.toString();
b=b.replace(".","");
b=b.replace("-","");
c = "";
panjang = b.length;
j = 0;
for (i = panjang; i > 0; i--){
j = j + 1;
if (((j % 3) == 1) && (j != 1)){
c = b.substr(i-1,1) + "." + c;
} else {
c = b.substr(i-1,1) + c;
}
}
if (_minus) c = "-" + c ;
return c;
}

function numbersonly(ini, e){
if (e.keyCode>=49){
if(e.keyCode<=57){
a = ini.value.toString().replace(".","");
b = a.replace(/[^\d]/g,"");
b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
ini.value = tandaPemisahTitik(b);
return false;
}
else if(e.keyCode<=105){
if(e.keyCode>=96){
//e.keycode = e.keycode - 47;
a = ini.value.toString().replace(".","");
b = a.replace(/[^\d]/g,"");
b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
ini.value = tandaPemisahTitik(b);
//alert(e.keycode);
return false;
}
else {return false;}
}
else {
return false; }
}else if (e.keyCode==48){
a = ini.value.replace(".","") + String.fromCharCode(e.keyCode);
b = a.replace(/[^\d]/g,"");
if (parseFloat(b)!=0){
ini.value = tandaPemisahTitik(b);
return false;
} else {
return false;
}
}else if (e.keyCode==95){
a = ini.value.replace(".","") + String.fromCharCode(e.keyCode-48);
b = a.replace(/[^\d]/g,"");
if (parseFloat(b)!=0){
ini.value = tandaPemisahTitik(b);
return false;
} else {
return false;
}
}else if (e.keyCode==8 || e.keycode==46){
a = ini.value.replace(".","");
b = a.replace(/[^\d]/g,"");
b = b.substr(0,b.length -1);
if (tandaPemisahTitik(b)!=""){
ini.value = tandaPemisahTitik(b);
} else {
ini.value = "";
}

return false;
} else if (e.keyCode==9){
return true;
} else if (e.keyCode==17){
return true;
} else {
//alert (e.keyCode);
return false;
}

}
		</script>
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
