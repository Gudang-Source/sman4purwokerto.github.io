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

if ($pilih=='contoh' AND $untukdi=='input'){
	mysql_query("INSERT INTO ".$DB_KODE."_contoh
				(nama_contoh,deskripsi_contoh )
				VALUES
				(	'$_POST[nama_contoh]',
					'$_POST[deskripsi_contoh]')");
					
	gogo('../../contoh.php?t='.$token.'');
}

elseif ($pilih=='contoh' AND $untukdi=='output'){
	mysql_query("UPDATE ".$DB_KODE."_contoh SET 	nama_contoh ='$_POST[nama_contoh]',
										deskripsi_contoh ='$_POST[deskripsi_contoh]'
										WHERE id_contoh ='$id'");						
	gogo('../../contoh.php?t='.$token.'');
}


elseif ($pilih=='contoh' AND $untukdi=='hapus'){
	if ($id== 1){					
	gogo('../../contoh.php?t='.$token.'');
	}
	else {
	mysql_query("UPDATE ".$DB_KODE."_materi SET id_contoh=1 WHERE id_contoh='$id'");
	mysql_query("UPDATE ".$DB_KODE."_guru_staff SET id_contoh=1 WHERE id_contoh='$id'");
	mysql_query("DELETE FROM ".$DB_KODE."_contoh WHERE id_contoh ='$id'");					
	gogo('../../contoh.php?t='.$token.'');
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
