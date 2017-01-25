<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */


if(!isset($_SESSION)){session_start();}  
error_reporting(0);
if (isset($_SESSION['adminsh']))
{
	header('location:index.php');
	exit;
}
else{ 
    if (!file_exists("../konfigurasi/koneksi.php")) {
	if(!isset($_SESSION)){session_start();}  
	$_SESSION['data'] == 'data';
	header ('location:../instalasi/index.php');
	}
	else {
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Login Admin Formulasi</title>
<link rel="stylesheet" type="text/css" href="css/gaya.css">
<script language="JavaScript" src="js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
</head>

<body style="text-align: center; background: url(css/img/bg_biru.jpg)" id="login" OnLoad="document.login.username.focus();">
<img src="images/logo_login.png" style="margin-top: 10%;">
<div id="kotakLogin">
<?php
if (!isset($_SESSION['log_adminsh'])){$_SESSION['log_adminsh']=0;}
$jml=$_SESSION['log_adminsh'];
//echo $jml;
if ($jml<5){
	
?>
	
	<form method="POST" action="valid.php" name="login" id="login">
	<table>
		<tr><td><small style="font-size: 11px;">Username</small><br><input type="text" name="username" class="login" title="Masukkan Username"></td>
			<td><small style="font-size: 11px;">Password</small><br><input type="password" name="password" class="login" title="Masukkan Password"></td></tr>
	<tr style="padding-top:0px"><td  style="padding-top:0px"><small><i>Masukkan kode berikut</i></small><br><img style="float: left" src="../kontenweb/captcha-login.php?date=<?php    echo date('YmdHis');?>" alt="security image" />&nbsp; &nbsp; <input type="text" name="formulasi" style="width: 65px" class="login"></td>
			<td  style="padding-top:0px"><small style="font-size: 11px;">&nbsp;</small><br><input type="submit" value="Login" class="gembok"></td></tr>
	</table>
	</form>
	<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("login");
			frmvalidator.addValidation("username","req","Anda belum memasukkan username");
			frmvalidator.addValidation("password","req","Anda belum memasukkan password");
			frmvalidator.addValidation("formulasi","req","Anda belum memasukkan kode keamanan");
			//]]>
	</script>
<?php
}else{
?>	
	<form method="POST" action="reset.php" name="login" id="login">
	<table>
		<tr><td><small style="font-size: 11px;">Email</small><br><input type="text" name="email" class="login" title="Masukkan email"></td>
			<td><b>RESET PASSWORD</b><small style="font-size: 11px;"><br>Untuk sementara akun anda kami tangguhkan demi keamanan, silahkan reset password bila lupa.</small></td></tr>
	<tr style="padding-top:0px"><td  style="padding-top:0px"><small><i>Masukkan kode berikut</i></small><br><img style="float: left" src="../kontenweb/captcha-login.php?date=<?php    echo date('YmdHis');?>" alt="security image" />&nbsp; &nbsp; <input type="text" name="formulasi" style="width: 65px" class="login"></td>
			<td  style="padding-top:0px"><small style="font-size: 11px;">&nbsp;</small><br><input type="submit" value="Reset" class="gembok"></td></tr>
	</table>
	</form>
	<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("login");
			frmvalidator.addValidation("email","req","Anda belum memasukkan username");
			frmvalidator.addValidation("email","email","masukkan format email dengan benar");
			frmvalidator.addValidation("formulasi","req","Anda belum memasukkan kode keamanan");
			//]]>
	</script>
<?php	
}
?>	
</div>
<br>
<?php    
date_default_timezone_set('Asia/Jakarta');
$tahun=date("Y");
?>
<font style="font-size:11px; color: #2e2e2e">&copy; <?php     echo "$tahun";?>, <a href="http://cms.formulasi.or.id">Formulasi</a> Opensource CMS <?php echo $_SESSION['Bsekolah']; ?></font>
</body>
</html>
<?php     } } ?>
<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

