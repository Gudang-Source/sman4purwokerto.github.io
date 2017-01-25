<?php if(!isset($_SESSION)){session_start();}  error_reporting(0);    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
include "../konfigurasi/koneksi.php";


if (!isset($_SESSION['seo']))
{
	echo "<script>window.alert('Anda sudah dihalaman ini sebelumnya.');window.location=('admin.php')</script>";
	exit;
}
else{
    if (!file_exists("../konfigurasi/koneksi.php")) {

unset($_SESSION['seo']);
	$_SESSION['pra'] = 'pra';
	//header ('location: index.php');
	?>
<script language="javascript">
setTimeout("top.location.href = 'index.php'",10000);
</script>
<?php
	}
	
	else {

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Langkah Konfigurasi Database</title>
<link rel="stylesheet" type="text/css" href="../adminpanel/css/gaya.css">
<link rel="Shortcut Icon" href="http://www.formulasi.or.id/favicon.ico" type="image/x-icon" />
<script language="JavaScript" src="../adminpanel/js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
</head>


<body style="text-align: center; background: url(../adminpanel/css/img/bg_biru.jpg)" >
<div id="instalkotak"  style="-webkit-border-bottom-right-radius: 20px;-webkit-border-bottom-left-radius: 20px;-moz-border-radius-bottomright: 20px;-moz-border-radius-bottomleft: 20px;border-bottom-right-radius: 20px;border-bottom-left-radius: 20px;box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);    -moz-box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);    -webkit-box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);">
	<div class="judulbox">
	<center>Input Database &raquo; <font color="b4b4b4">Input data admin &raquo; Input Data Web &raquo; Instalasi Selesai</font></center>
	</div><br>
	<center><img src="logo_atas.jpg"></center>
	
	<div class="boxInformasi"><h2> Langkah 2</h2>
	<b>koneksi.php</b> pada folder <b>konfigurasi</b> telah berhasi anda buat. <br>
	silahkan pilih jenis Web yang akan di install.
	</div>
	
	<form method="POST" action="proses_awal.php" name="pra" id="pra" style="float: left;">
	<table class="isian" style="margin-top: 10px;">
	
<tr><td colspan="2"><center><b>Pilihlah Peruntukan Website</b></td></tr>
<tr>

<tr><td class="isiankanan" width="125px" style="text-align: right">Pilihan </td><td class="isian">
<select name="jenisweb">
  <option value="1">WEBSITE SEKOLAH</option>
  <option value="2">WEBSITE PONDOK PESANTREN</option>
  <option value="3">WEBSITE PERGURUAN TINGGI</option>
  <option value="4">INSTANSI/KANTOR/LEMBAGA</option>
  <option value="5">PERUSAHAAN</option>
  <option value="6">KOMUNITAS</option>  
  <option value="7">BLOG PRIBADI</option>
</select> 
</td></tr>
<tr><td class="isiankanan" width="125px"></td><td class="isian"><input type="reset" value="Reset" class="hapus">
    <input type="submit" name="Submit" value="LANJUT" class="batal"></td></tr>

<tr><td colspan="2">	
	<br><small>Bila terjadi kesalahan database tidak terkoneksi maka ulangi langkah awal dengan cara menghapus file <b>koneksi.php</b> pada folder <b>/konfigurasi</b>
	agar anda dapat mengulangi proses instalasi dari awal.</small>
</td></tr>

	</table>
	</form>
	<div class="clear"></div>

</div>
<br>
<?php     } 
}

  
include ('../adminpanel/konten/footer.php');
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>