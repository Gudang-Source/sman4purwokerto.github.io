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

if ($pilih=='menu' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO ".$DB_KODE."_menu
				(menu_id, judul, url, urutan, status )
				VALUES
				(	'$_POST[menu_id]',
					'$_POST[judul]',
					'$_POST[url]',  
					'100',
					'$_POST[status]'
					)");
					
	gogo('../../menu.php?t='.$token.'');
}

elseif ($pilih=='menu' AND $untukdi=='edit'){
	mysql_query("UPDATE ".$DB_KODE."_menu SET 	
										menu_id='$_POST[menu_id]',
										judul ='$_POST[judul]',
										url='$_POST[url]',  
										urutan='$_POST[urutan]',
										status='$_POST[status]' 										
										WHERE id_menu ='$id'");						
	gogo('../../menu.php?t='.$token.'');
}
elseif ($pilih=='status' AND $untukdi=='aktif'){
	mysql_query("UPDATE ".$DB_KODE."_menu SET status='1'	WHERE id_menu ='$id'");						
	gogo('../../menu.php?t='.$token.'');
}

elseif ($pilih=='status' AND $untukdi=='nonaktif'){
	mysql_query("UPDATE ".$DB_KODE."_menu SET status='0'	WHERE id_menu ='$id'");						
	gogo('../../menu.php?t='.$token.'');
}


elseif ($pilih=='urutan' AND $untukdi=='naik'){
	mysql_query("UPDATE ".$DB_KODE."_menu SET urutan=urutan-1	WHERE id_menu ='$id'");						
	gogo('../../menu.php?t='.$token.'');
}

elseif ($pilih=='urutan' AND $untukdi=='turun'){
	mysql_query("UPDATE ".$DB_KODE."_menu SET urutan=urutan+1	WHERE id_menu ='$id'");						
	gogo('../../menu.php?t='.$token.'');
}

elseif ($pilih=='menu' AND $untukdi=='hapus'){
	if ($id== 1){					
	gogo('../../menu.php?t='.$token.'');
	}
	else {
	mysql_query("UPDATE ".$DB_KODE."_materi SET id_menu=1 WHERE id_menu='$id'");
	mysql_query("UPDATE ".$DB_KODE."_guru_staff SET id_menu=1 WHERE id_menu='$id'");
	mysql_query("DELETE FROM ".$DB_KODE."_menu WHERE id_menu ='$id'");					
	gogo('../../menu.php?t='.$token.'');
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
 
