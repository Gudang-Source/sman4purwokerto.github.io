<?php if(!isset($_SESSION)){session_start();}  error_reporting(0);
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

 ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Instalasi Sukses</title>
<link rel="stylesheet" type="text/css" href="../adminpanel/css/gaya.css">
<link rel="Shortcut Icon" href="http://www.formulasi.or.id/favicon.ico" type="image/x-icon" />
</head>


<body style="text-align: center; background: url(../adminpanel/css/img/bg_biru.jpg)" >
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1&appId=331287640227769";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="instalkotak"  style="-webkit-border-bottom-right-radius: 20px;-webkit-border-bottom-left-radius: 20px;-moz-border-radius-bottomright: 20px;-moz-border-radius-bottomleft: 20px;border-bottom-right-radius: 20px;border-bottom-left-radius: 20px;box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);    -moz-box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);    -webkit-box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);">
	<div class="judulbox">
	<center><font color="b4b4b4">Input data admin &raquo; Input Data Web &raquo; </font>Instalasi Selesai</center>
	</div><br>
	<center><img src="logo_atas.jpg"></center>
<!--	<form method="POST" action="../kontenweb/hapus_dir.php"> 
<form method="POST" action="../adminpanel"> -->
<?php
$url=$_SERVER['SERVER_NAME'];
$nama=$_SESSION['nama'];
$jj=$_SESSION['jenjang'];
?>
<img src="http://democms.formulasi.or.id/kontenweb/img.php?u=<?php echo $url;?>&n=<?php echo $nama;?>&j=<?php echo $jj;?>" width="1" height="1">
<form method="POST" action="../kontenweb/hapus_dir.php">
	<table>
<?php 	if($_SESSION['install']>0){


 ?>
	<tr><th style="text-align:center;">Selamat! Anda telah berhasil melakukan <b>Update</b> Formulasi CMS  </th></tr>
<?php  }else{ ?>
	<tr><th style="text-align:center;">Selamat! Anda telah berhasil melakukan <b>instalasi</b> Formulasi CMS</th></tr>		
<?php  } ?>	
	<tr><th style="text-align:center;">Terimakasih jempol anda (like) sebagai bentuk dukungan anda, supaya kami dapat terus mengembangkan CMS Formulasi agar menjadi lebih baik lagi<div class="fb-like" data-href="http://cms.formulasi.or.id" data-send="true" data-width="450" data-show-faces="true"></div>
	<!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-size="medium" data-annotation="inline" data-width="300" data-href="http://cms.formulasi.or.id/"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
	</th></tr>
	<tr><th style="text-align:center;">Klik button dibawah untuk login di halaman administrator</th></tr>
	<tr><th style="text-align:center;"><input type="submit" value="S E L E S A I &raquo;" class="batal"></th></tr>
	<tr><th style="text-align:center;">Untuk keamanan data anda silahkan hapus foder <b>/instalasi</b> 
	setelah proses instalasi ini selesai</th></tr>	
	</table>
	</form>

			
</div>
<br>
<?php   
session_unset();
session_destroy();
$_SESSION['temaweb']='respons';
include ('../adminpanel/konten/footer.php');
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

 ?>
 <center>
	<object type="application/x-shockwave-flash" data="http://www.pdkjateng.go.id/modules/mod_simplemp3bar/player1.swf" height="20" width="200">
	<param name="wmode" value="transparent">
	<param name="movie" value="http://www.pdkjateng.go.id/modules/mod_simplemp3bar/player1.swf">
	<param name="FlashVars" value="mp3=http://www.pdkjateng.go.id//upload/bagimunegeri64bit.mp3&amp;autoplay=1&amp;loop=0&amp;showstop=1&amp;showvolume=1&amp;bgcolor1=696969&amp;bgcolor2=0c0c0c&amp;slidercolor1=cccccc&amp;slidercolor2=999999&amp;buttonovercolor=efea1b&amp;sliderovercolor=efea1b;">
	</object>	
</center>