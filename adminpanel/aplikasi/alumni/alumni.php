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

if ($pilih=='alumni' AND $untukdi=='tambah'){
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
	if (!empty($lokasi_file)){
$extensionList = array("bmp", "jpg", "gif", "png", "BMP", "JPG", "GIF", "PNG", "Bmp", "Jpg", "Gif", "Png");
$namaDir = '../../../images/foto/siswa/';
	global $data;
	UploadFile($nama_file,$extensionList,$namaDir,$data);

	mysql_query("INSERT INTO ".$DB_KODE."_siswa
				(nama_siswa, foto, jenkel, tempat_lahir, tanggal_lahir, alamat, tahun_lulus, email, telepon, status_siswa, pekerjaan_sekarang, info_tambahan, status_oke,id_jurusan)
				VALUES
				(	'$_POST[nama_alumni]',
					'$nama_file',
					'$_POST[jk]',
					'$_POST[tempat_lahir]',
					'$_POST[tanggal_lahir]',
					'$_POST[alamat]',
					'$_POST[tahun_lulus]',
					'$_POST[email]',
					'$_POST[telepon]',
					'0',
					'$_POST[pekerjaan_sekarang]',
					'$_POST[info_tambahan]',
					'1',
					'1')");

	}else{
	mysql_query("INSERT INTO ".$DB_KODE."_siswa
				(nama_siswa, foto, jenkel, tempat_lahir, tanggal_lahir, alamat, tahun_lulus, email, telepon, status_siswa, pekerjaan_sekarang, info_tambahan, status_oke,id_jurusan)
				VALUES
				(	'$_POST[nama_alumni]',
					'no_photo.jpg',
					'$_POST[jk]',
					'$_POST[tempat_lahir]',
					'$_POST[tanggal_lahir]',
					'$_POST[alamat]',
					'$_POST[tahun_lulus]',
					'$_POST[email]',
					'$_POST[telepon]',
					'0',
					'$_POST[pekerjaan_sekarang]',
					'$_POST[info_tambahan]',
					'1',
					'1')");
	}
	gogo('../../alumni.php?t='.$token.'&');
}

elseif ($pilih=='alumni' AND $untukdi=='edit'){
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
	if (!empty($lokasi_file)){
$extensionList = array("bmp", "jpg", "gif", "png", "BMP", "JPG", "GIF", "PNG", "Bmp", "Jpg", "Gif", "Png");
$namaDir = '../../../images/foto/siswa/';
	global $data;
	UploadFile($nama_file,$extensionList,$namaDir,$data);

	mysql_query("UPDATE ".$DB_KODE."_siswa SET 		nama_siswa ='$_POST[nama_alumni]',
											foto='$nama_file',
											jenkel='$_POST[jk]',
											tempat_lahir='$_POST[tempat_lahir]',
											tanggal_lahir='$_POST[tanggal_lahir]',
											alamat='$_POST[alamat]',
											tahun_lulus='$_POST[tahun_lulus]',
											email='$_POST[email]',
											telepon='$_POST[telepon]',
											pekerjaan_sekarang='$_POST[pekerjaan_sekarang]',
											info_tambahan='$_POST[info_tambahan]',
											status_oke='$_POST[status_oke]'
											WHERE id_siswa ='$id'");
	} else {
	mysql_query("UPDATE ".$DB_KODE."_siswa SET 		nama_siswa ='$_POST[nama_alumni]',
											jenkel='$_POST[jk]',
											tempat_lahir='$_POST[tempat_lahir]',
											tanggal_lahir='$_POST[tanggal_lahir]',
											alamat='$_POST[alamat]',
											tahun_lulus='$_POST[tahun_lulus]',
											email='$_POST[email]',
											telepon='$_POST[telepon]',
											pekerjaan_sekarang='$_POST[pekerjaan_sekarang]',
											info_tambahan='$_POST[info_tambahan]',
											status_oke='$_POST[status_oke]'
											WHERE id_siswa ='$id'");
	
	}
	gogo('../../alumni.php?t='.$token.'&');
}


elseif ($pilih=='alumni' AND $untukdi=='hapus'){
$id=ceknomor($_GET['id']);
	mysql_query("DELETE FROM ".$DB_KODE."_siswa WHERE id_siswa ='$id'");					
	gogo('../../alumni.php?t='.$token.'&');}
	

elseif ($pilih=='alumni' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM ".$DB_KODE."_siswa WHERE id_siswa='$cek[$i]'");
	}
	gogo('../../alumni.php?t='.$token.'&');
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
 
