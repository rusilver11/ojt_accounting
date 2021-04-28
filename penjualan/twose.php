<!DOCTYPE html>
<html>
<title>TWOSE MENU</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/pace.css">
<style>
body {
  background: url(images/bg4.jpg) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.w3-theme {color:#fff !important;background-color:#4CAF50 !important;}
.w3-btn {background-color:#4CAF50 ;margin-bottom:4px;}
.w3-code{border-left:4px solid #4CAF50}
@media only screen and (max-width: 601px) {.w3-top{position:static;} #main{margin-top:0px !important}}
</style>

<script src="js/pace.min.js"></script>
<body class='w3-grey'>

<div style="margin-top:200px;"></div>

<div class="w3-row-padding">
  <div class="w3-col s9" style="width: 500px">&nbsp;</div>

  <div class="w3-col s3 w3-card-2 w3-light-grey">
 
    <div class="w3-container w3-blue">
      <h2>LINK LINK</h2>
    </div>

<!--     <form id="form-login" name="login" class="w3-container">

      <p><button class="w3-btn w3-blue w3-large" name="Transaksi" href="login.php">Transaksi</button>
        <button class="w3-btn w3-red w3-large" href="#">Akutansi</button></p>
     
    </form> -->
     <form method="get" target="_blank" class="w3-container">
        <p> <button class="w3-btn w3-blue w3-large" onclick="window.location.href = 'login.php';" type="submit">Transaksi</button>
          <button class="w3-btn w3-red w3-large" onclick="window.location.href = 'http://localhost/PA/public/login';" type="submit">Akutansi</button></p>
      </form>

  </div>
</div>

<div class="w3-bottom">
  <div class="w3-navbar w3-light-grey w3-small w3-card-4" style="height:10px;"></div>
</div>


</body>
</html> 