<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
if(!isset($_SESSION)){session_start();}   error_reporting(0); include "../../konten/fungsi.php";
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

unset($_SESSION['salah']);

include "../../../konfigurasi/koneksi.php";  adminku();
nailah($t);
$token=nt();
include "../../../konfigurasi/file_upload.php";

$pilih=$_GET['pilih'];
$untukdi=$_GET['untukdi'];

date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");

if ($pilih=='album' AND $untukdi=='tambah'){
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
	if (!empty($lokasi_file)){
$extensionList = array("bmp", "jpg", "gif", "png", "BMP", "JPG", "GIF", "PNG", "Bmp", "Jpg", "Gif", "Png");
$namaDir = '../../../images/foto/galeri/album/';
	global $data;
	UploadFile($nama_file,$extensionList,$namaDir,$data);
		if ($data==1){	
			mysql_query("INSERT INTO ".$DB_KODE."_album
						(nama_album,tanggal_album, deskripsi_album, foto_album)
						VALUES
						(	'$_POST[nama_album]',
							'$tanggal',
							'$_POST[deskripsi]',
							'$nama_file')");
			
		}else{	
			mysql_query("INSERT INTO ".$DB_KODE."_album
						(nama_album,tanggal_album, deskripsi_album, foto_album)
						VALUES
						(	'$_POST[nama_album]',
							'$tanggal',
							'$_POST[deskripsi]',
							'no_image.jpg')");
		
		$_SESSION['salah']="<span style='color:red'><b>Anda tidak diperkenankan upload file jenis ini ..!</b></span><br>";		

		}	
	}else {
	mysql_query("INSERT INTO ".$DB_KODE."_album
				(nama_album,tanggal_album, deskripsi_album, foto_album)
				VALUES
				(	'$_POST[nama_album]',
					'$tanggal',
					'$_POST[deskripsi]',
					'no_image.jpg')");
					
	}
	gogo('../../album_galeri.php?t='.$token.'&');	

}

elseif ($pilih=='album' AND $untukdi=='edit'){
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
	if (!empty($lokasi_file)){
$extensionList = array("bmp", "jpg", "gif", "png", "BMP", "JPG", "GIF", "PNG", "Bmp", "Jpg", "Gif", "Png");
$namaDir = '../../../images/foto/galeri/album/';
	global $data;
	
		UploadFile($nama_file,$extensionList,$namaDir,$data);
		if($data==1){
		mysql_query("UPDATE ".$DB_KODE."_album SET 	nama_album ='$_POST[nama_album]',
											tanggal_album ='$tanggal',
											deskripsi_album ='$_POST[deskripsi]',
											foto_album ='$nama_file'
											WHERE id_album ='$id'");
		}else{
		UploadFile($nama_file,$extensionList,$namaDir,$data);
		mysql_query("UPDATE ".$DB_KODE."_album SET 	nama_album ='$_POST[nama_album]',
											tanggal_album ='$tanggal',
											deskripsi_album ='$_POST[deskripsi]'
											WHERE id_album ='$id'");
		$_SESSION['salah']="<span style='color:red'><b>Anda tidak diperkenankan upload file jenis ini ..!</b></span><br>";		
											
		}
	}
	else {
	mysql_query("UPDATE ".$DB_KODE."_album SET 	nama_album ='$_POST[nama_album]',
										tanggal_album ='$tanggal',
										deskripsi_album ='$_POST[deskripsi]'
										WHERE id_album ='$id'");
	
	}
	gogo('../../album_galeri.php?t='.$token.'&');
}


elseif ($pilih=='album' AND $untukdi=='hapus'){
$id=ceknomor($_GET['id']);
	$albumdata=mysql_query("SELECT * FROM ".$DB_KODE."_album WHERE id_album='$id'");
	$r=mysql_fetch_array($albumdata);
	if ($r[foto_album]!='no_image.jpg'){
	mysql_query("DELETE FROM ".$DB_KODE."_album WHERE id_album='$id'");
	mysql_query("DELETE FROM ".$DB_KODE."_galeri WHERE id_album='$id'");
	unlink("../../../images/foto/galeri/album/$r[foto_album]");
	
	$galeridata=mysql_query("SELECT * FROM ".$DB_KODE."_galeri WHERE id_album='$id'");
	while ($gd=mysql_fetch_array($galeridata)){
	unlink("../../../images/foto/galeri/$gd[nama_galeri]");}
	}
	else {
	mysql_query("DELETE FROM ".$DB_KODE."_album WHERE id_album='$id'");
	mysql_query("DELETE FROM ".$DB_KODE."_galeri WHERE id_album='$id'");
	$galeridata=mysql_query("SELECT * FROM ".$DB_KODE."_galeri WHERE id_album='$id' AND nama_galeri !='no_image.jpg'");
	while ($gd=mysql_fetch_array($galeridata)){
	unlink("../../../images/foto/galeri/$r[nama_galeri]");}
	}
	gogo('../../album_galeri.php?t='.$token.'&');
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

