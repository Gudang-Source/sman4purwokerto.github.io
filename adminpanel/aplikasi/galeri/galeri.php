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

unset($_SESSION['salah']);

include "../../../konfigurasi/koneksi.php";  adminku();
nailah($t);
$token=nt();
include "../../../konfigurasi/file_upload.php";

$pilih=$_GET['pilih'];
$untukdi=$_GET['untukdi'];

date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");

if ($pilih=='galeri' AND $untukdi=='tambah'){
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
	if (!empty($lokasi_file)){
$extensionList = array("bmp", "jpg", "gif", "png", "BMP", "JPG", "GIF", "PNG", "Bmp", "Jpg", "Gif", "Png");
$namaDir = '../../../images/foto/galeri/';
	global $data;	
	UploadFile($nama_file,$extensionList,$namaDir,$data);
		if ($data==1){	
		mysql_query("INSERT INTO ".$DB_KODE."_galeri
					(nama_galeri,tanggal_galeri, id_album, judul, deskripsi)
					VALUES
					(	'$nama_file',
						'$tanggal',
						'$_POST[album_galeri]',
						'$_POST[judul]',
						'$_POST[deskripsi]'
						)");	
					
		}else{
		mysql_query("INSERT INTO ".$DB_KODE."_galeri
					(nama_galeri,tanggal_galeri, id_album, judul, deskripsi)
					VALUES
					(	'no_image.jpg',
						'$tanggal',
						'$_POST[album_galeri]',
						'$_POST[judul]',
						'$_POST[deskripsi]'
						)");
				$_SESSION['salah']="<span style='color:red'><b>Anda tidak diperkenankan upload file jenis ini ..!</b></span><br>";		
			
		}
	}else{
		mysql_query("INSERT INTO ".$DB_KODE."_galeri
					(nama_galeri,tanggal_galeri, id_album, judul, deskripsi)
					VALUES
					(	'no_image.jpg',
						'$tanggal',
						'$_POST[album_galeri]',
						'$_POST[judul]',
						'$_POST[deskripsi]'
						)");
				$_SESSION['salah']="<span style='color:red'><b>Anda tidak diperkenankan upload file jenis ini ..!</b></span><br>";		
			
		}
	gogo('../../galeri_foto.php?t='.$token.'');
}

elseif ($pilih=='galeri' AND $untukdi=='edit'){
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
	if (!empty($lokasi_file)){
$extensionList = array("bmp", "jpg", "gif", "png", "BMP", "JPG", "GIF", "PNG", "Bmp", "Jpg", "Gif", "Png");
$namaDir = '../../../images/foto/galeri/';
	global $data;
	
		UploadFile($nama_file,$extensionList,$namaDir,$data);
		if($data==1){
		mysql_query("UPDATE ".$DB_KODE."_galeri SET 	nama_galeri ='$nama_file',
											tanggal_galeri ='$tanggal',
										judul ='$_POST[judul]',
										deskripsi='$_POST[deskripsi]',
											id_album ='$_POST[album]'
											WHERE id_galeri ='$id'");
		}else{
		UploadFile($nama_file,$extensionList,$namaDir,$data);
		mysql_query("UPDATE ".$DB_KODE."_galeri SET 	
											tanggal_galeri ='$tanggal',
										judul ='$_POST[judul]',
										deskripsi='$_POST[deskripsi]',
											id_album ='$_POST[album]'
											WHERE id_galeri ='$id'");
			$_SESSION['salah']="<span style='color:red'><b>Anda tidak diperkenankan upload file jenis ini ..!</b></span><br>";		
											
		}
	}
	else {
	mysql_query("UPDATE ".$DB_KODE."_galeri SET 	tanggal_galeri ='$tanggal',
										judul ='$_POST[judul]',
										deskripsi='$_POST[deskripsi]',
										id_album ='$_POST[album]'
										WHERE id_galeri ='$id'");
	
	}
	gogo('../../galeri_foto.php?t='.$token.'');
}

//Dibawah ini digunakan pada saat posisi di halaman semua data galeri
elseif ($pilih=='galeri' AND $untukdi=='hapus'){
	$galeridata=mysql_query("SELECT * FROM ".$DB_KODE."_galeri WHERE id_galeri='$id'");
	$r=mysql_fetch_array($galeridata);
	if ($r[gambar_kecil]!='no_image.jpg'){
	mysql_query("DELETE FROM ".$DB_KODE."_galeri WHERE id_galeri='$id'");
	unlink("../../../images/foto/galeri/$r[nama_galeri]");
	}
	else {
	mysql_query("DELETE FROM ".$DB_KODE."_galeri WHERE id_galeri='$id'");
	}
	gogo('../../galeri_foto.php?t='.$token.'');
}

elseif ($pilih=='galeri' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM ".$DB_KODE."_galeri WHERE id_galeri='$cek[$i]'");
	}
	gogo('../../galeri_foto.php?t='.$token.'');
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

