<?php if(!isset($_SESSION)){session_start();}  error_reporting(0); 
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 
if (isset($_POST['LANJUT'])) {
   $_SESSION['data'] = 'data';
}

if (isset($_POST['BATAL'])) {
	//echo "<script>window.location=('info.php')</script>";
	?>
<script type="text/javascript">
<!--
window.location = "info.php"
//-->
</script>	
	<?php
exit;
}

if (!isset($_SESSION['data']))
{
	//echo "<script>window.alert('Anda sudah dihalaman ini sebelumnya.');window.location=('info.php')</script>";
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Langkah Setting Database</title>

<link rel="Shortcut Icon" href="http://www.formulasi.or.id/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="../adminpanel/css/gaya.css">
<script language="JavaScript" src="../adminpanel/js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
</head>
<body style="text-align: center; background: url(../adminpanel/css/img/bg_biru.jpg)" >

<div id="instalkotak"  style="-webkit-border-bottom-right-radius: 20px;-webkit-border-bottom-left-radius: 20px;-moz-border-radius-bottomright: 20px;-moz-border-radius-bottomleft: 20px;border-bottom-right-radius: 20px;border-bottom-left-radius: 20px;box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);    -moz-box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);    -webkit-box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);"  style="-webkit-border-bottom-right-radius: 20px;-webkit-border-bottom-left-radius: 20px;-moz-border-radius-bottomright: 20px;-moz-border-radius-bottomleft: 20px;border-bottom-right-radius: 20px;border-bottom-left-radius: 20px;box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);    -moz-box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);    -webkit-box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);">
	<div class="judulbox">
	<center>Input Database &raquo; <font color="b4b4b4">Input data admin &raquo; Input Data Web &raquo; Instalasi Selesai</font></center>
	</div><br>
	<center><img src="logo_atas.jpg"></center>
	
	<div class="boxInformasi"><h2> Pilihan Instalasi</h2>
	<b>Selamat datang</b> pada tahap awal instalasi <a href="http://cms.formulasi.or.id" target="_blank" title ="Situs resmi Formulasi CMS">Formulasi CMS</a>.  Silahkan lengkapi form di bawah ini untuk mengawali instalasi, jika anda
	belum memahami aturan penggunaannya, direkomendasikan membaca terlebih dahulu <a href="../aturan-dan-petunjuk.html" target="_blank"><b>dokumen</b></a> aturan penggunaannya.
	
	</div>
	
	
	<form method="POST" action="index.php" name="pra" id="pra" style="float: left;">
	<table class="isian" style="margin-top: 5px;">
	
<tr><td ><b>Apakah anda benar-benar akan melakukan instalasi?<br> karena file koneksi.php telah ada.. !<br>
jika ingin meneruskan instalasi silahkan klik lanjut</b></td><tr>



<tr><td class="isian">
    <input type="submit" name="LANJUT" value="LANJUT" />
    <input type="submit" name="BATAL" value="BATAL" />
</td></tr>
	</table>
	</form>
	
	<div class="clear"></div>
</div>
<br>
<?php	
	
}
else{
unset($_SESSION['install']);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Langkah Setting Database</title>
<link rel="stylesheet" type="text/css" href="../adminpanel/css/gaya.css">
<script language="JavaScript" src="../adminpanel/js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
</head>
<body style="text-align: center; background: url(../adminpanel/css/img/bg_biru.jpg)" >

<div id="instalkotak"  style="-webkit-border-bottom-right-radius: 20px;-webkit-border-bottom-left-radius: 20px;-moz-border-radius-bottomright: 20px;-moz-border-radius-bottomleft: 20px;border-bottom-right-radius: 20px;border-bottom-left-radius: 20px;box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);    -moz-box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);    -webkit-box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);"  style="-webkit-border-bottom-right-radius: 20px;-webkit-border-bottom-left-radius: 20px;-moz-border-radius-bottomright: 20px;-moz-border-radius-bottomleft: 20px;border-bottom-right-radius: 20px;border-bottom-left-radius: 20px;box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);    -moz-box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);    -webkit-box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);">
	<div class="judulbox">
	<center>Input Database &raquo; <font color="b4b4b4">Input data admin &raquo; Input Data Web &raquo; Instalasi Selesai</font></center>
	</div><br>
	<center><img src="logo_atas.jpg"></center>
	
	<div class="boxInformasi"><h2> Pilihan Instalasi</h2>
	<b>Selamat datang</b> pada tahap awal instalasi <a href="http://cms.formulasi.or.id" target="_blank" title ="Situs resmi Formulasi CMS">Formulasi CMS</a>.  Silahkan lengkapi form di bawah ini untuk mengawali instalasi, jika anda
	belum memahami aturan penggunaannya, direkomendasikan membaca terlebih dahulu <a href="../aturan-dan-petunjuk.html" target="_blank"><b>dokumen</b></a> aturan penggunaannya.
	
	</div>
	
	
	<form method="POST" action="data.php" name="pra" id="pra" style="float: left;">
	<table class="isian" style="margin-top: 5px;">
	
<tr><td colspan="2"><center><b>Pilihlah Jenis Instalasi</b></td></tr>
<tr>

<tr><td class="isiankanan" width="125px" style="text-align: right">Pilihan</td><td class="isian">
<select name="install">
  <option value="0">Instalasi Baru</option>
  <option value="203">Update dari versi 2.0.3 s.d 2.0.5</option>
  <option value="206">Update dari versi 2.0.6</option>
  <option value="207">Update dari versi 2.0.7</option>
</select> 
</td></tr>
<tr>


			<tr><td class="isiankanan" width="125px" style="text-align: right"><input type="checkbox" name="setuju" value="1"></td><td class="isian">
			<p style="color:">Saya telah membaca <a href="../aturan-dan-petunjuk.html" target="_blank"><b>aturan dalam penggunaan Formulasi CMS</b></a> dan saya setuju.
			</td></tr>
<tr><td class="isiankanan" width="125px"></td><td class="isian"><input type="reset" value="Reset" class="hapus">
    <input type="submit" name="Submit" value="Install" class="batal">
</td></tr>
	</table>
	</form>
	<div class="clear"></div>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("pra");

			frmvalidator.addValidation("install","req","Prefix Database untuk server database harus diisi, tulis kode rahasia untuk keamanan data anda, isi dengan kombinasi huruf dan angka");				
			frmvalidator.addValidation("setuju","shouldselchk=1","Maaf, jika anda tidak setuju maka instalasi tidak dapat dilanjutkan");
			

		</script>
</div>
<br>
<?php     } 
include ('../adminpanel/konten/footer.php');
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>