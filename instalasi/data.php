<?php if(!isset($_SESSION)){session_start();}  error_reporting(0);     
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */



//echo $_POST['install'];
if (isset($_POST['install']))
{
	$_SESSION['install'] = $_POST['install'];

 
} else{
	$_SESSION['install'] = '0';
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Langkah Setting Database</title>
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
	
	<div class="boxInformasi"><h2> Langkah 1</h2>
	<b>Langkah Pertama</b> adalah membuat koneksi dengan database yang telah anda buat. Silahkan isi data berikut dengan benar. 
	</div>
<?php  	

  if (!file_exists("../konfigurasi/koneksi.php")) {


function rx($length = 6) {
 $str = "";
 $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
 $max = count($characters) - 1;
 for ($i = 0; $i < $length; $i++) {
  $rand = mt_rand(0, $max);
  $str .= $characters[$rand];
 }
 return $str;
}
$DB_KODE=strtolower(rx());

?>
	<form method="POST" action="proses_db.php" name="pra" id="pra" style="float: left;">
	<table class="isian" style="margin-top: 5px;">
	
<tr><td colspan="2"><small>Pastikan database telah anda siapkan terlebih dahulu.</small></td><tr>
<tr>
<td class="isiankanan" width="125px">Host Database</td><td class="isian"  width="425px">
    <input  class="maksimal" name="dbhost" type="text" id="dbhost" value="<?php echo $SERVER;  ?>"> </td></tr>
    
<tr><td class="isiankanan" width="125px">Username Database</td><td class="isian">
    <input class="maksimal" name="dbuname" type="text" id="dbuname"  value="<?php echo $NAMAUSER;  ?>"></td></tr>
    
<tr><td class="isiankanan" width="125px">Password Database</td><td class="isian">
    <input class="maksimal" name="dbpass" type="password" id="dbpass" value="<?php echo $PASSWORDUSER;  ?>"></td></tr>
<tr><td class="isiankanan" width="125px">Nama Database</td><td class="isian">

    <input class="maksimal" name="dbname" type="text" id="dbname"  value="<?php echo $DATABASE;  ?>"></td></tr>
<tr><td class="isiankanan" width="125px">Prefix Database</td><td class="isian">
    <input class="maksimal" name="prefix" type="text" value="<?php echo $DB_KODE;  ?>" id="prefix">
	<br><small>silahkan masukkan huruf acak untuk keamanan data anda, atau gunakan acak huruf yang tersedia</small>
	</td></tr>

<?php  	
}else{
include "../konfigurasi/koneksi.php";
			if ($_SESSION['install']>0){
		?>
			<form method="POST" action="proses_upgrade.php" name="pra" id="pra" style="float: left;">
			<table class="isian" style="margin-top: 5px;">
			
		<tr><td colspan="2">file koneksi.php pada database anda telah ada</td><tr>
		<tr>
		<td class="isiankanan" width="125px">Host Database</td><td class="isian"  width="425px"><?php echo $SERVER;  ?></td></tr>
			
		<tr><td class="isiankanan" width="125px">Username Database</td><td class="isian"><?php echo $NAMAUSER;  ?></td></tr>
			
		<tr><td class="isiankanan" width="125px">Password Database</td><td class="isian">********</td></tr>
		<tr><td class="isiankanan" width="125px">Nama Database</td><td class="isian"><?php echo $DATABASE;  ?></td></tr>
		<tr><td class="isiankanan" width="125px">Prefix Database</td><td class="isian">
		<?php   echo $DB_KODE;  ?>
			</td></tr>
		<?php  
		}else{
?>
	<form method="POST" action="proses_db.php" name="pra" id="pra" style="float: left;">
	<table class="isian" style="margin-top: 5px;">
	
<tr><td colspan="2"><small>file koneksi.php pada database anda telah ada</small></td><tr>
<tr>
<td class="isiankanan" width="125px">Host Database</td><td class="isian"  width="425px">
    <input  class="maksimal" name="dbhost" type="hidden" id="dbhost" value="<?php echo $SERVER;  ?>">: <?php echo $SERVER;  ?></td></tr>
    
<tr><td class="isiankanan" width="125px">Username Database</td><td class="isian">
    <input class="maksimal" name="dbuname" type="hidden" id="dbuname"  value="<?php echo $NAMAUSER;  ?>">: <?php echo $NAMAUSER;  ?></td></tr>
    
<tr><td class="isiankanan" width="125px">Password Database</td><td class="isian">
    <input class="maksimal" name="dbpass" type="hidden" id="dbpass" value="<?php echo $PASSWORDUSER;  ?>">: ***************</td></tr>
<tr><td class="isiankanan" width="125px">Nama Database</td><td class="isian">

    <input class="maksimal" name="dbname" type="hidden" id="dbname"  value="<?php echo $DATABASE;  ?>">: <?php echo $DATABASE;  ?></td></tr>
<tr><td class="isiankanan" width="125px">Prefix Database</td><td class="isian">
    <input class="maksimal" name="prefix" type="hidden" value="<?php echo $DB_KODE;  ?>" id="prefix">: <?php echo $DB_KODE;  ?>
	</td></tr>
	<?php
		}

}

?>	



<tr><td class="isiankanan" width="125px"></td><td class="isian"><input type="reset" value="Reset" class="hapus">
    <input type="submit" name="Submit" value="Install" class="batal">
</td></tr>
	</table>
	</form>
	<div class="clear"></div>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("pra");
			frmvalidator.addValidation("dbhost","req","Host Database untuk server database harus diisi");
			frmvalidator.addValidation("dbuname","req","Username Database untuk server database harus diisi");			
			frmvalidator.addValidation("dbname","req","Nama Database untuk server database harus diisi");	
		
			frmvalidator.addValidation("prefix","req","Prefix Database untuk server database harus diisi, tulis kode rahasia untuk keamanan data anda, isi dengan kombinasi huruf dan angka");				
			frmvalidator.addValidation("setuju","shouldselchk=1","Maaf, jika anda tidak setuju maka instalasi tidak dapat dilanjutkan");
			

		</script>
</div>
<br>
<?php      

if (!isset($_SESSION['pra']))
{
	$_SESSION['data'] = 'pra';
 
} 

include ('../adminpanel/konten/footer.php');
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>