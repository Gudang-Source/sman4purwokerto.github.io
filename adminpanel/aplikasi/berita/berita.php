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
include "../../../konfigurasi/file_upload.php";

$pilih=$_GET['pilih'];
$untukdi=$_GET['untukdi'];

date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");

if ($pilih=='berita' AND $untukdi=='tambah'){
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
	if (!empty($lokasi_file)){
$extensionList = array("bmp", "jpg", "gif", "png", "BMP", "JPG", "GIF", "PNG", "Bmp", "Jpg", "Gif", "Png");
$namaDir = '../../../images/';
	global $data;
	UploadFile($nama_file,$extensionList,$namaDir,$data);

	mysql_query("INSERT INTO ".$DB_KODE."_berita
				(judul_berita,isi_berita, tanggal_posting, gambar_kecil, status_terbit,status_komentar, status_headline, s_username, id_kategori)
				VALUES
				(	'$_POST[judul_berita]',
					'$_POST[isi_berita]',
					'$tanggal',
					'$nama_file',
					'1',
					'$_POST[status_komentar]',
					'$_POST[status_headline]',
					'$_POST[s_username]',
					'$_POST[kategori]')");
					}
	else {
	mysql_query("INSERT INTO ".$DB_KODE."_berita
				(judul_berita,isi_berita, tanggal_posting, gambar_kecil, status_terbit,status_komentar, status_headline, s_username, id_kategori)
				VALUES
				(	'$_POST[judul_berita]',
					'$_POST[isi_berita]',
					'$tanggal',
					'no_image.jpg',
					'1',
					'$_POST[status_komentar]',
					'$_POST[status_headline]',
					'$_POST[s_username]',
					'$_POST[kategori]')");
	}
	
	gogo('../../berita.php?t='.$token.'&');
}

elseif ($pilih=='berita' AND $untukdi=='edit'){
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
	if (!empty($lokasi_file)){
$extensionList = array("bmp", "jpg", "gif", "png", "BMP", "JPG", "GIF", "PNG", "Bmp", "Jpg", "Gif", "Png");
$namaDir = '../../../images/';
	global $data;
	UploadFile($nama_file,$extensionList,$namaDir,$data);

	mysql_query("UPDATE ".$DB_KODE."_berita SET 	judul_berita ='$_POST[judul_berita]',
										isi_berita ='$_POST[isi_berita]',
										tanggal_posting ='$tanggal',
										gambar_kecil ='$nama_file',
										status_terbit ='1',
										status_komentar ='$_POST[status_komentar]',
										status_headline ='$_POST[status_headline]',
										id_kategori ='$_POST[kategori]'
										WHERE id_berita ='$id'");
							}
	else {
	mysql_query("UPDATE ".$DB_KODE."_berita SET 	judul_berita ='$_POST[judul_berita]',
										isi_berita ='$_POST[isi_berita]',
										tanggal_posting ='$tanggal',
										status_terbit ='1',
										status_komentar ='$_POST[status_komentar]',
										status_headline ='$_POST[status_headline]',
										id_kategori ='$_POST[kategori]'
										WHERE id_berita ='$id'");
	
	}
	gogo('../../berita.php?t='.$token.'&');
}

//Dibawah ini digunakan pada saat posisi di halaman semua data berita
elseif ($pilih=='berita' AND $untukdi=='hapus'){
	$beritadata=mysql_query("SELECT * FROM ".$DB_KODE."_berita WHERE id_berita='$id'");
	$r=mysql_fetch_array($beritadata);
	if ($r[gambar_kecil]!='no_image.jpg'){
	mysql_query("DELETE FROM ".$DB_KODE."_berita WHERE id_berita='$id'");
	mysql_query("DELETE FROM ".$DB_KODE."_komentar WHERE id_berita='$id'");
	unlink("../../../images/$r[gambar_kecil]");
	}
	else {
	mysql_query("DELETE FROM ".$DB_KODE."_berita WHERE id_berita='$id'");
	mysql_query("DELETE FROM ".$DB_KODE."_komentar WHERE id_berita='$id'");
	}
	gogo('../../berita.php?t='.$token.'&');
}

elseif ($pilih=='berita' AND $untukdi=='hapusgambar'){
	$beritadata=mysql_query("SELECT * FROM ".$DB_KODE."_berita WHERE id_berita='$id'");
	$r=mysql_fetch_array($beritadata);
	if ($r[gambar_kecil]!='no_image.jpg'){
	unlink("../../../images/$r[gambar_kecil]");
	mysql_query("UPDATE ".$DB_KODE."_berita SET gambar_kecil='no_image.jpg' WHERE id_berita='$id'");
	}
	gogo('../../berita.php?t='.$token.'&pilih=edit&id='.$id);
}

elseif ($pilih=='berita' AND $untukdi=='terbitkan'){
	mysql_query("UPDATE ".$DB_KODE."_berita SET status_terbit='1' WHERE id_berita='$id'");
	gogo('../../berita.php?t='.$token.'&');
}

elseif ($pilih=='berita' AND $untukdi=='batalkan'){
	mysql_query("UPDATE ".$DB_KODE."_berita SET status_terbit='0' WHERE id_berita='$id'");
	gogo('../../berita.php?t='.$token.'&');
}

elseif ($pilih=='berita' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM ".$DB_KODE."_berita WHERE id_berita='$cek[$i]'");
	 mysql_query("DELETE FROM ".$DB_KODE."_komentar WHERE id_berita='$cek[$i]'");
	}
	gogo('../../berita.php?t='.$token.'&');
}


//Dibawah ini digunakan pada saat posisi di halaman berita terbit
elseif ($pilih=='terbit' AND $untukdi=='hapus'){
	$beritadata=mysql_query("SELECT * FROM ".$DB_KODE."_berita WHERE id_berita='$id'");
	$r=mysql_fetch_array($beritadata);
	if ($r[gambar_kecil]!='no_image.jpg'){
	mysql_query("DELETE FROM ".$DB_KODE."_berita WHERE id_berita='$id'");
	mysql_query("DELETE FROM ".$DB_KODE."_komentar WHERE id_berita='$id'");
	unlink("../../../images/$r[gambar_kecil]");
	}
	else {
	mysql_query("DELETE FROM ".$DB_KODE."_berita WHERE id_berita='$id'");
	mysql_query("DELETE FROM ".$DB_KODE."_komentar WHERE id_berita='$id'");
	}
	gogo('../../berita.php?t='.$token.'&pilih=terbit');
}

elseif ($pilih=='terbit' AND $untukdi=='batalkan'){
	mysql_query("UPDATE ".$DB_KODE."_berita SET status_terbit='0' WHERE id_berita='$id'");
	gogo('../../berita.php?t='.$token.'&pilih=terbit');
}

elseif ($pilih=='terbit' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM ".$DB_KODE."_berita WHERE id_berita='$cek[$i]'");
	 mysql_query("DELETE FROM ".$DB_KODE."_komentar WHERE id_berita='$cek[$i]'");
	}
	gogo('../../berita.php?t='.$token.'&pilih=terbit');
}

//Dibawah ini digunakan pada saat posisi di halaman berita konsep
elseif ($pilih=='konsep' AND $untukdi=='hapus'){
	$beritadata=mysql_query("SELECT * FROM ".$DB_KODE."_berita WHERE id_berita='$id'");
	$r=mysql_fetch_array($beritadata);
	if ($r[gambar_kecil]!='no_image.jpg'){
	mysql_query("DELETE FROM ".$DB_KODE."_berita WHERE id_berita='$id'");
	mysql_query("DELETE FROM ".$DB_KODE."_komentar WHERE id_berita='$id'");
	unlink("../../../images/$r[gambar_kecil]");
	}
	else {
	mysql_query("DELETE FROM ".$DB_KODE."_berita WHERE id_berita='$id'");
	mysql_query("DELETE FROM ".$DB_KODE."_komentar WHERE id_berita='$id'");
	}
	gogo('../../berita.php?t='.$token.'&pilih=konsep');
}

elseif ($pilih=='konsep' AND $untukdi=='terbitkan'){
	mysql_query("UPDATE ".$DB_KODE."_berita SET status_terbit='1' WHERE id_berita='$id'");
	gogo('../../berita.php?t='.$token.'&pilih=konsep');
}

elseif ($pilih=='konsep' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM ".$DB_KODE."_berita WHERE id_berita='$cek[$i]'");
	 mysql_query("DELETE FROM ".$DB_KODE."_komentar WHERE id_berita='$cek[$i]'");
	}
	gogo('../../berita.php?t='.$token.'&pilih=konsep');
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

