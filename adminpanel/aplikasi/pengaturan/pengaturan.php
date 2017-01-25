<?php if(!isset($_SESSION)){session_start();}   error_reporting(0); include "../../konten/fungsi.php";

/* Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
if (isset($_GET['t'])){
	$t=$_GET['t'];
}elseif (isset($_POST['t'])){
	$t=$_POST['t'];
}


if (isset($_GET['id'])){

$id=ceknomor($_GET['id']);
}
if (isset($_POST['id'])){

$id=ceknomor($_POST['id']);
}

if (!isset($_SESSION['adminsh']))
{
	gogo('../../../../index.php');
	exit;
}
else{ 
if (!isset($_POST['url']))
{
	gogo('../../../../index.php');
	exit;
}
else{ 


include "../../../konfigurasi/koneksi.php";  adminku();

nailah($t);
$token=nt();
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[url]' WHERE id_pengaturan='1'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[status_tambah_admin]' WHERE id_pengaturan='2'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[jml_data]' WHERE id_pengaturan='3'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[data_siswa_status]' WHERE id_pengaturan='4'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[data_alumni_status]' WHERE id_pengaturan='5'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[data_guru_status]' WHERE id_pengaturan='6'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[form_alumni_status]' WHERE id_pengaturan='7'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[buku_tamu]' WHERE id_pengaturan='16'");
	
	gogo('../../pengaturan.php?t='.$token.'');

?>
 <center><br><br><img src="../../images/loading.gif" style="   vertical-align: middle;text-align: center;"> <br>Mohon ditunggu ..!</center>  

<?php   }}
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

