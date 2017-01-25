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

if ($pilih=='blok' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO ".$DB_KODE."_blok
				(nama_blok,deskripsi_blok,link_blok,folder,posisi,isi_blok,menu_blok,status,urutan )
				VALUES
				(	'$_POST[nama_blok]',
					'$_POST[deskripsi_blok]',
					'$_POST[link_blok]',  
					'$_POST[folder]',  
					'$_POST[posisi]',  
					'$_POST[isi_blok]',  
					'$_POST[menu_blok]', 
					'$_POST[status]',  
					'100'
					)");
					
	gogo('../../blok.php?t='.$token.'');
}

elseif ($pilih=='blok' AND $untukdi=='edit'){
	mysql_query("UPDATE ".$DB_KODE."_blok SET 	nama_blok ='$_POST[nama_blok]',
										posisi='$_POST[posisi]',  
										isi_blok='$_POST[isi_blok]',
										folder='$_POST[folder]',
										status='$_POST[status]',  
										urutan='$_POST[urutan]'										
										WHERE id_blok ='$id'");						
	gogo('../../blok.php?t='.$token.'');
}
elseif ($pilih=='status' AND $untukdi=='aktif'){
	mysql_query("UPDATE ".$DB_KODE."_blok SET status='1'	WHERE id_blok ='$id'");						
	gogo('../../blok.php?t='.$token.'');
}

elseif ($pilih=='status' AND $untukdi=='nonaktif'){
	mysql_query("UPDATE ".$DB_KODE."_blok SET status='0'	WHERE id_blok ='$id'");						
	gogo('../../blok.php?t='.$token.'');
}

elseif ($pilih=='posisi' AND $untukdi=='atas'){
	mysql_query("UPDATE ".$DB_KODE."_blok SET posisi='1'	WHERE id_blok ='$id'");						
	gogo('../../blok.php?t='.$token.'');
}
elseif ($pilih=='posisi' AND $untukdi=='bawah'){
	mysql_query("UPDATE ".$DB_KODE."_blok SET posisi='2'	WHERE id_blok ='$id'");						
	gogo('../../blok.php?t='.$token.'');
}
elseif ($pilih=='posisi' AND $untukdi=='kiri'){
	mysql_query("UPDATE ".$DB_KODE."_blok SET posisi='3'		WHERE id_blok ='$id'");						
	gogo('../../blok.php?t='.$token.'');
}
elseif ($pilih=='posisi' AND $untukdi=='kanan'){
	mysql_query("UPDATE ".$DB_KODE."_blok SET posisi='4'		WHERE id_blok ='$id'");						
	gogo('../../blok.php?t='.$token.'');
}
elseif ($pilih=='urutan' AND $untukdi=='naik'){
	mysql_query("UPDATE ".$DB_KODE."_blok SET urutan=urutan-1	WHERE id_blok ='$id'");						
	gogo('../../blok.php?t='.$token.'');
}

elseif ($pilih=='urutan' AND $untukdi=='turun'){
	mysql_query("UPDATE ".$DB_KODE."_blok SET urutan=urutan+1	WHERE id_blok ='$id'");						
	gogo('../../blok.php?t='.$token.'');
}

elseif ($pilih=='blok' AND $untukdi=='hapus'){
	if ($id== 1){					
	gogo('../../blok.php?t='.$token.'');
	}
	else {
	mysql_query("UPDATE ".$DB_KODE."_materi SET id_blok=1 WHERE id_blok='$id'");
	mysql_query("UPDATE ".$DB_KODE."_guru_staff SET id_blok=1 WHERE id_blok='$id'");
	mysql_query("DELETE FROM ".$DB_KODE."_blok WHERE id_blok ='$id'");					
	gogo('../../blok.php?t='.$token.'');
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

