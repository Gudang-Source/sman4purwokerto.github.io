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

date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
if ($pilih=='profil' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO ".$DB_KODE."_info_sekolah
				(nama_info,isi_info, tanggal_info, posisi_menu, status_terbit )
				VALUES
				(	'$_POST[nama_info]',
					'$_POST[isi_info]',
					'$tanggal',
					'$_POST[posisi_menu]',
					'1')");
					
	gogo('../../profil.php?t='.$token.'');
}

elseif ($pilih=='profil' AND $untukdi=='edit'){
	mysql_query("UPDATE ".$DB_KODE."_info_sekolah SET 	nama_info ='$_POST[nama_info]',
												isi_info ='$_POST[isi_info]',
												tanggal_info ='$tanggal',
												posisi_menu ='$_POST[posisi_menu]'
												WHERE id_info ='$id'");
							
	gogo('../../profil.php?t='.$token.'');
}


elseif ($pilih=='profil' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM ".$DB_KODE."_info_sekolah WHERE id_info ='$id'");					
	gogo('../../profil.php?t='.$token.'');
}

elseif ($pilih=='profil' AND $untukdi=='batalkan'){
	mysql_query("UPDATE ".$DB_KODE."_info_sekolah SET status_terbit=0 WHERE id_info ='$id'");					
	gogo('../../profil.php?t='.$token.'');
}

elseif ($pilih=='profil' AND $untukdi=='terbitkan'){
	mysql_query("UPDATE ".$DB_KODE."_info_sekolah SET status_terbit=1 WHERE id_info ='$id'");					
	gogo('../../profil.php?t='.$token.'');
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
 
