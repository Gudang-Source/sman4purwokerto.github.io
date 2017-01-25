<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
if(!isset($_SESSION)){session_start();}  
if (!isset($_SESSION['ketiga']))
{
	echo "<script>window.alert('Anda sudah dihalaman ini sebelumnya.');window.location=('akhir.php')</script>";
	exit;
}
else{
 ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Langkah Ketiga</title>
<link rel="stylesheet" type="text/css" href="../adminpanel/css/gaya.css">
</head>

<body style="text-align: center">
<div id="instalkotak">
	<div class="judulbox">
	<center><font color="b4b4b4">Input data admin &raquo; Input Data Web &raquo; Instal System</font> &raquo; Instalasi Tahap Ahir </center>
	</div><br>
	<center><img src="logo_atas.jpg"></center>
<!--	<form method="POST" action="../kontenweb/hapus_dir.php"> -->
<form method="POST" action="proses_ahir.php"> 
	<table>
	<tr><th style="text-align:center;">Install System Anda</th></tr>
	<tr><th style="text-align:center;"><input type="submit" value="Login &raquo;" class="batal"></th></tr>
	</table>
	</form>
</div>
</body>
</html>
<?php   
}
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

 ?>