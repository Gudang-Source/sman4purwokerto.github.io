<?php  if(!isset($_SESSION)){session_start();}   error_reporting(0); include "../../konten/fungsi.php"; 
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
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
date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
if ($pilih=='agenda' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO ".$DB_KODE."_agenda
				(judul_agenda, keterangan_agenda, tempat_agenda,tanggal_agenda, s_username)
				VALUES
				(	'$_POST[judul]',
					'$_POST[keterangan]',
					'$_POST[tempat]',
					'$_POST[tanggal]',
					'$_POST[s_username]')");
					
	gogo('../../agenda.php?t='.$token.'&');
}

elseif ($pilih=='agenda' AND $untukdi=='edit'){
	mysql_query("UPDATE ".$DB_KODE."_agenda SET 	judul_agenda='$_POST[judul]',
										keterangan_agenda='$_POST[keterangan]',
										tempat_agenda='$_POST[tempat]',
										tanggal_agenda='$_POST[tanggal]',
										s_username='masarie'
										WHERE id_agenda ='$id'");						
	gogo('../../agenda.php?t='.$token.'&');
}


elseif ($pilih=='agenda' AND $untukdi=='hapus'){
$id=ceknomor($_GET['id']);
	mysql_query("DELETE FROM ".$DB_KODE."_agenda WHERE id_agenda ='$id'");					
	gogo('../../agenda.php?t='.$token.'&');
}

elseif ($pilih=='agenda' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM ".$DB_KODE."_agenda WHERE id_agenda='$cek[$i]'");
	}
	gogo('../../agenda.php?t='.$token.'&');
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
