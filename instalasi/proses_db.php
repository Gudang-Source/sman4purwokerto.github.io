<?php if(!isset($_SESSION)){session_start();}  error_reporting(0); ?>
<center><p><p><img src="../images/loader.gif"><br>Mohon Tunggu ..!</center>
<?php

  if (!file_exists("../konfigurasi/koneksi.php")) {
	}else{
$old = '../konfigurasi/koneksi.php';
$today = date("Ymd");
$new = '../konfigurasi/koneksi.php-'.$today.'.bak';
if (copy($old, $new)) {
  unlink($old);
}
 }
mysql_connect ($_POST["dbhost"], $_POST["dbuname"], $_POST["dbpass"]) or die ("<h1>Tidak terkoneksi ke server</h1>");
mysql_select_db ($_POST["dbname"]) or die ("<meta http-equiv='refresh' content='5; URL=index.php'><h1>Database tidak ditemukan</h1>"); 
IF (ISSET($_POST["Submit"])) {

$string = '<?php 
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 
//****Silahkan atur konfigurasi database sesuai dengan kebutuhan dan keadaan server dan sistem****//

//Silahkan ganti nama server dibawah ini sesuai dengan nama server anda//
//Default untuk server lokal komputer adalah "localhost";
$SERVER = "'.$_POST["dbhost"].'";


//Silahkan ganti nama user atau username dibawah ini sesuai dengan nama user pada server anda//
//Default untuk nama user pada localhost atau server komputer lokal adalah "root"//
$NAMAUSER = "'.$_POST["dbuname"].'";

//Silahkan isi password username anda, apabila tidak ada password kosongkan saja//
//Default password pada instalasi server lokal pertama adalah "Tidak ada" atau "kosong"//
$PASSWORDUSER = "'.$_POST["dbpass"].'";

//Silahkan isi database sesuai dengan databse yang taelah adan buat pada server anda//
$DATABASE = "'.$_POST["dbname"].'";

$DB_KODE="'.$_POST["prefix"].'";



//Dibawah ini akan dipanggil deklarasi dalam koneksi ke server dan databasa//
//Jika anda tidak paham atau tidak mengerti pemrograman php, saya sarankan jangan mengganti sedikitpun kode dibawah ini//
//mysql_connect ($SERVER, $NAMAUSER, $PASSWORDUSER) or die ("<h1>Tidak terkoneksi ke server</h1>");
//mysql_select_db ($DATABASE) or die ("<h1>Database tidak ditemukan</h1>");
$mysql_link = mysql_connect($SERVER, $NAMAUSER, $PASSWORDUSER);
//mysql_set_charset("utf8", $mysql_link);
mysql_select_db($DATABASE, $mysql_link) or die ("<h1>Database tidak ditemukan</h1>");

$KD_token=md5($DB_KODE);
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */


?>';
 
$fp = FOPEN("../konfigurasi/koneksi.php", "w");
FWRITE($fp, $string);
FCLOSE($fp);
 

 

unset($_SESSION['pra']);
$_SESSION['seo'] = seo;
//header('location:awal.php'); 
?>
<script language="javascript">
setTimeout("top.location.href = 'awal.php'",5000);
</script>
<?php
}

 
?>
 
