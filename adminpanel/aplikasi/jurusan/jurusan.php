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

if ($pilih=='jurusan' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO ".$DB_KODE."_jurusan
				(nama_jurusan, deskripsi_jurusan)
				VALUES
				(	'$_POST[nama_jurusan]',
					'$_POST[deskripsi]')");
					
	gogo('../../jurusan.php?t='.$token.'');
}

elseif ($pilih=='jurusan' AND $untukdi=='edit'){
	mysql_query("UPDATE ".$DB_KODE."_jurusan SET 		nama_jurusan ='$_POST[nama_jurusan]',
											deskripsi_jurusan ='$_POST[deskripsi]'
											WHERE id_jurusan ='$id'");						
	gogo('../../jurusan.php?t='.$token.'');
}

elseif ($pilih=='jurusan' AND $untukdi=='hapus'){
	if ($id== 1){
	gogo('../../jurusan.php?t='.$token.'');
	}
	else {
	mysql_query("UPDATE ".$DB_KODE."_siswa SET id_jurusan=1 WHERE id_jurusan='$id'");
	mysql_query("DELETE FROM ".$DB_KODE."_jurusan WHERE id_jurusan ='$id'");
	gogo('../../jurusan.php?t='.$token.'');
	}
	}

elseif ($pilih=='jurusan' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	mysql_query("UPDATE ".$DB_KODE."_siswa SET id_jurusan=1 WHERE id_jurusan='$cek[$i]'");
	mysql_query("DELETE FROM ".$DB_KODE."_jurusan WHERE id_jurusan='$cek[$i]'");
	}
	gogo('../../jurusan.php?t='.$token.'');
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

