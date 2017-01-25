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
if (!isset($_GET['pilih']))
{
	gogo('../../../../index.php');
	exit;
}
else{ 


include "../../../konfigurasi/koneksi.php";  adminku();

nailah($t);
$token=nt();


$pilih=$_GET['pilih'];
$untukdi=$_GET['untukdi'];

if ($pilih=='ym' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO ".$DB_KODE."_sidebar
				(jenis, status, nama, isi1)
				VALUES
				(	'ym',
					'1',
					'$_POST[nama_lengkap]',
					'$_POST[email]')");
					
	gogo('../../ym.php?t='.$token.'');
}

elseif ($pilih=='ym' AND $untukdi=='edit'){
	mysql_query("UPDATE ".$DB_KODE."_sidebar SET 	nama ='$_POST[nama_lengkap]',
										isi1 ='$_POST[email]'
										WHERE id_sidebar ='$id'");						
	gogo('../../ym.php?t='.$token.'');
}


elseif ($pilih=='ym' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM ".$DB_KODE."_sidebar WHERE id_sidebar ='$id'");					
	gogo('../../ym.php?t='.$token.'');
}

?>
 <center><br><br><img src="../../images/loading.gif" style="   vertical-align: middle;text-align: center;"> <br>Mohon ditunggu ..!</center> 
<?php   } }
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

