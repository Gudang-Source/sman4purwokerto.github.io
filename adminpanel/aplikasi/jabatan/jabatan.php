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

if ($pilih=='jabatan' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO ".$DB_KODE."_jabatan
				(nama_jabatan,deskripsi_jabatan )
				VALUES
				(	'$_POST[nama_jabatan]',
					'$_POST[deskripsi_jabatan]')");
					
	gogo('../../jabatan.php?t='.$token.'');
}

elseif ($pilih=='jabatan' AND $untukdi=='edit'){
	mysql_query("UPDATE ".$DB_KODE."_jabatan SET 	nama_jabatan ='$_POST[nama_jabatan]',
										deskripsi_jabatan ='$_POST[deskripsi_jabatan]'
										WHERE id_jabatan ='$id'");						
	gogo('../../jabatan.php?t='.$token.'');
}


elseif ($pilih=='jabatan' AND $untukdi=='hapus'){
	if ($id== 1){					
	gogo('../../jabatan.php?t='.$token.'');
	}
	else {
	mysql_query("UPDATE ".$DB_KODE."_guru_staff SET id_jabatan=1 WHERE id_jabatan ='$id'");
	mysql_query("DELETE FROM ".$DB_KODE."_jabatan WHERE id_jabatan ='$id'");					
	gogo('../../jabatan.php?t='.$token.'');
	}
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

