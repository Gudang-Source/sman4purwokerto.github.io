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

if (isset($_GET['id'])){

$id=ceknomor($_GET['id']);
}
if (isset($_POST['id'])){

$id=ceknomor($_POST['id']);
}
include "../../../konfigurasi/koneksi.php";  adminku();

nailah($t);
$token=nt();
$pilih=$_GET['pilih'];
$untukdi=$_GET['untukdi'];
date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
if ($pilih=='pengumuman' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO ".$DB_KODE."_pengumuman
				(judul_pengumuman, isi_pengumuman, tanggal_pengumuman, s_username)
				VALUES
				(	'$_POST[judul_pengumuman]',
					'$_POST[isi_pengumuman]',
					'$tanggal',
					'$_POST[s_username]')");
					
	gogo('../../pengumuman.php?t='.$token.'');
}

elseif ($pilih=='pengumuman' AND $untukdi=='edit'){
	mysql_query("UPDATE ".$DB_KODE."_pengumuman SET 	judul_pengumuman='$_POST[judul_pengumuman]',
											isi_pengumuman='$_POST[isi_pengumuman]'
										WHERE id_pengumuman ='$id'");						
	gogo('../../pengumuman.php?t='.$token.'');
}


elseif ($pilih=='pengumuman' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM ".$DB_KODE."_pengumuman WHERE id_pengumuman ='$id'");					
	gogo('../../pengumuman.php?t='.$token.'');
}

elseif ($pilih=='pengumuman' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM ".$DB_KODE."_pengumuman WHERE id_pengumuman='$cek[$i]'");
	}
	gogo('../../pengumuman.php?t='.$token.'');
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

