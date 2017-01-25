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

if ($pilih=='mapel' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO ".$DB_KODE."_mapel
				(nama_mapel,deskripsi_mapel )
				VALUES
				(	'$_POST[nama_mapel]',
					'$_POST[deskripsi_mapel]')");
					
	gogo('../../mata_pelajaran.php?t='.$token.'');
}

elseif ($pilih=='mapel' AND $untukdi=='edit'){
	mysql_query("UPDATE ".$DB_KODE."_mapel SET 	nama_mapel ='$_POST[nama_mapel]',
										deskripsi_mapel ='$_POST[deskripsi_mapel]'
										WHERE id_mapel ='$id'");						
	gogo('../../mata_pelajaran.php?t='.$token.'');
}


elseif ($pilih=='mapel' AND $untukdi=='hapus'){
	if ($id== 1){					
	gogo('../../mata_pelajaran.php?t='.$token.'');
	}
	else {
	mysql_query("UPDATE ".$DB_KODE."_materi SET id_mapel=1 WHERE id_mapel='$id'");
	mysql_query("UPDATE ".$DB_KODE."_guru_staff SET id_mapel=1 WHERE id_mapel='$id'");
	mysql_query("DELETE FROM ".$DB_KODE."_mapel WHERE id_mapel ='$id'");					
	gogo('../../mata_pelajaran.php?t='.$token.'');
	}
}

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

