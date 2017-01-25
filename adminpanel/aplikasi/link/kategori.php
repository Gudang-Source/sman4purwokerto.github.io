<?php  if(!isset($_SESSION)){session_start();}   error_reporting(0); include "../../konten/fungsi.php";
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

if ($pilih=='kategori' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO ".$DB_KODE."_kategori
				(nama_kategori, deskripsi_kategori)
				VALUES
				('$_POST[nama_kat]','$_POST[deskripsi_kat]')");
				
	gogo('../../kategori.php?t='.$token.'');
}

elseif ($pilih=='kategori' AND $untukdi=='edit'){
	mysql_query("UPDATE ".$DB_KODE."_kategori SET nama_kategori ='$_POST[nama_kat]',
										deskripsi_kategori ='$_POST[deskripsi_kat]'
										WHERE id_kategori ='$id'");
							
	gogo('../../kategori.php?t='.$token.'');
}
elseif ($pilih=='kategori' AND $untukdi=='hapus'){
	$kategori=mysql_query("SELECT * FROM ".$DB_KODE."_kategori WHERE id_kategori='$id'");
	$r=mysql_fetch_array($kategori);
	
	if ($r[id_kategori]==1){
	gogo('../../kategori.php?t='.$token.'');
	}
	else {
	mysql_query("DELETE FROM ".$DB_KODE."_kategori WHERE id_kategori ='$id'");
	mysql_query("UPDATE ".$DB_KODE."_berita SET id_kategori='1' WHERE id_kategori='$id'");				
	gogo('../../kategori.php?t='.$token.'');}
}


}  } 
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>
<center><br><br><img src="../../images/loading.gif" style="   vertical-align: middle;text-align: center;"> <br>Mohon ditunggu ..!</center>  
 
