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

if ($pilih=='kelas' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO ".$DB_KODE."_kelas
				(nama_kelas, deskripsi_kelas, wali_kelas)
				VALUES
				(	'$_POST[nama_kelas]',
					'$_POST[deskripsi]',
					'$_POST[wali_kelas]')");
					
	gogo('../../kelas.php?t='.$token.'');
}

elseif ($pilih=='kelas' AND $untukdi=='edit'){
	mysql_query("UPDATE ".$DB_KODE."_kelas SET 		nama_kelas ='$_POST[nama_kelas]',
											deskripsi_kelas ='$_POST[deskripsi]',
											wali_kelas ='$_POST[wali_kelas]'
											WHERE id_kelas ='$id'");						
	gogo('../../kelas.php?t='.$token.'');
}

elseif ($pilih=='kelas' AND $untukdi=='hapus'){
	if ($id== 1){
	gogo('../../kelas.php?t='.$token.'');
	}
	else {
	mysql_query("UPDATE ".$DB_KODE."_siswa SET id_kelas=1 WHERE id_kelas='$id'");
	mysql_query("DELETE FROM ".$DB_KODE."_kelas WHERE id_kelas ='$id'");
	gogo('../../kelas.php?t='.$token.'');
	}
	}

elseif ($pilih=='kelas' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	mysql_query("UPDATE ".$DB_KODE."_siswa SET id_kelas=1 WHERE id_kelas='$cek[$i]'");
	mysql_query("DELETE FROM ".$DB_KODE."_kelas WHERE id_kelas='$cek[$i]'");
	}
	gogo('../../kelas.php?t='.$token.'');
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

