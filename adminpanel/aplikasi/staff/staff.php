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
if (isset($_GET['nip'])){$nip=ceknomor($_GET['nip']);} if (isset($_POST['nip'])){$nip=ceknomor($_POST['nip']);}

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

$password= md5($_POST[password]);
if ($pilih=='staff' AND $untukdi=='tambah'){
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
	if (!empty($lokasi_file)){
$extensionList = array("bmp", "jpg", "gif", "png", "BMP", "JPG", "GIF", "PNG", "Bmp", "Jpg", "Gif", "Png");
$namaDir = '../../../images/foto/guru/';
	global $data;
	UploadFile($nama_file,$extensionList,$namaDir,$data);

	mysql_query("INSERT INTO ".$DB_KODE."_guru_staff
				(nama_gurustaff, password, nip, posisi, foto, jenkel, id_jabatan, tempat_lahir, tanggal_lahir, alamat, status_kawin, tahun_masuk, pendidikan_terakhir, email, telepon, nuptk, id_pangkat)
				VALUES
				(	'$_POST[nama_staff]',
					'$password',
					'$nip',
					'$_POST[posisi]',
					'$nama_file',
					'$_POST[jk]',
					'$_POST[jabatan]',
					'$_POST[tempat_lahir]',
					'$_POST[tanggal_lahir]',
					'$_POST[alamat]',
					'$_POST[status_kawin]',
					'$_POST[tahun_masuk]',
					'$_POST[pendidikan]',
					'$_POST[email]',
					'$_POST[telepon]',
					'$_POST[nuptk]',
					'$_POST[id_pangkat]')");
					}
	else {
	mysql_query("INSERT INTO ".$DB_KODE."_guru_staff
				(nama_gurustaff, password, nip, posisi, foto, jenkel, id_jabatan, tempat_lahir, tanggal_lahir, alamat, status_kawin, tahun_masuk, pendidikan_terakhir, email, telepon, nuptk, id_pangkat)
				VALUES
				(	'$_POST[nama_staff]',
					'$password',
					'$nip',
					'$_POST[posisi]',
					'no_photo.jpg',
					'$_POST[jk]',
					'$_POST[jabatan]',
					'$_POST[tempat_lahir]',
					'$_POST[tanggal_lahir]',
					'$_POST[alamat]',
					'$_POST[status_kawin]',
					'$_POST[tahun_masuk]',
					'$_POST[pendidikan]',
					'$_POST[email]',
					'$_POST[telepon]',
					'$_POST[nuptk]',
					'$_POST[id_pangkat]')");
					}
	
	gogo('../../staff.php?t='.$token.'');
}

elseif ($pilih=='staff' AND $untukdi=='edit'){
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
	if (!empty($lokasi_file)){
$extensionList = array("bmp", "jpg", "gif", "png", "BMP", "JPG", "GIF", "PNG", "Bmp", "Jpg", "Gif", "Png");
$namaDir = '../../../images/foto/guru/';
	global $data;
	UploadFile($nama_file,$extensionList,$namaDir,$data);

	mysql_query("UPDATE ".$DB_KODE."_guru_staff SET 	nama_gurustaff='$_POST[nama_staff]',
											nip='$nip',											
											posisi='$_POST[posisi]',
											foto='$nama_file',
											jenkel='$_POST[jk]',
											id_jabatan='$_POST[jabatan]',
											tempat_lahir='$_POST[tempat_lahir]',
											tanggal_lahir='$_POST[tanggal_lahir]',
											alamat='$_POST[alamat]',
											status_kawin='$_POST[status_kawin]',
											tahun_masuk='$_POST[tahun_masuk]',
											pendidikan_terakhir='$_POST[pendidikan]',
											email='$_POST[email]',
											telepon='$_POST[telepon]',
											nuptk='$_POST[nuptk]',
											id_pangkat='$_POST[id_pangkat]'
											WHERE id_gurustaff ='$id'");}
	else{
	mysql_query("UPDATE ".$DB_KODE."_guru_staff SET 	nama_gurustaff='$_POST[nama_staff]',
											nip='$nip',											
											posisi='$_POST[posisi]',
											jenkel='$_POST[jk]',
											id_jabatan='$_POST[jabatan]',
											tempat_lahir='$_POST[tempat_lahir]',
											tanggal_lahir='$_POST[tanggal_lahir]',
											alamat='$_POST[alamat]',
											status_kawin='$_POST[status_kawin]',
											tahun_masuk='$_POST[tahun_masuk]',
											pendidikan_terakhir='$_POST[pendidikan]',
											email='$_POST[email]',
											telepon='$_POST[telepon]',
											nuptk='$_POST[nuptk]',
											id_pangkat='$_POST[id_pangkat]'
											WHERE id_gurustaff ='$id'");}
	
	gogo('../../staff.php?t='.$token.'');
}
elseif ($pilih=='staff' AND $untukdi=='gantipassword'){
	mysql_query("UPDATE ".$DB_KODE."_guru_staff SET 	password='$password' WHERE id_gurustaff='$id'");
	gogo('../../guru_staff.php');
}


elseif ($pilih=='staff' AND $untukdi=='hapusgambar'){
	$hapusfoto=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE id_gurustaff='$id'");
	$hf=mysql_fetch_array($hapusfoto);
	if ($hf[foto]!= 'no_photo.jpg'){
	unlink("../../../images/foto/guru/$hf[foto]");
	mysql_query("UPDATE ".$DB_KODE."_guru_staff SET 	foto='no_photo.jpg' WHERE id_gurustaff='$id'");}
	gogo('../../staff.php?t='.$token.'&pilih=edit&id='.$id);
}

//Dibawah ini digunakan pada saat posisi tampil semua data staff
elseif ($pilih=='staff' AND $untukdi=='hapus'){
	$hapusfoto=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE id_gurustaff='$id'");
	$hf=mysql_fetch_array($hapusfoto);
	if ($hf[foto]!= 'no_photo.jpg'){
	mysql_query("DELETE FROM ".$DB_KODE."_guru_staff WHERE id_gurustaff ='$id'");
	unlink("../../../images/foto/guru/$hf[foto]");}
	else {
	mysql_query("DELETE FROM ".$DB_KODE."_guru_staff WHERE id_gurustaff ='$id'");
	}
	gogo('../../staff.php?t='.$token.'');} 

elseif ($pilih=='staff' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 $hapuskabeh=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE id_gurustaff='$cek[$i]'");
	 $hk=mysql_fetch_array($hapuskabeh);
	 mysql_query("DELETE FROM ".$DB_KODE."_guru_staff WHERE id_gurustaff='$cek[$i]'");
	
	}
	gogo('../../staff.php?t='.$token.'');
}

//Dibawah ini digunakan pada saat posisi tampil data guru laki laki
elseif ($pilih=='laki' AND $untukdi=='hapus'){
	$hapusfoto=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE id_gurustaff='$id'");
	$hf=mysql_fetch_array($hapusfoto);
	if ($hf[foto]!= 'no_photo.jpg'){
	mysql_query("DELETE FROM ".$DB_KODE."_guru_staff WHERE id_gurustaff ='$id'");
	unlink("../../../images/foto/guru/$hf[foto]");}
	else {
	mysql_query("DELETE FROM ".$DB_KODE."_guru_staff WHERE id_gurustaff ='$id'");
	}
	gogo('../../staff.php?t='.$token.'&pilih=jenkel&kode=L');} 

elseif ($pilih=='laki' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 $hapuskabeh=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE id_gurustaff='$cek[$i]'");
	 $hk=mysql_fetch_array($hapuskabeh);
	 mysql_query("DELETE FROM ".$DB_KODE."_guru_staff WHERE id_gurustaff='$cek[$i]'");
	
	}
	gogo('../../staff.php?t='.$token.'&pilih=jenkel&kode=L');
}

//Dibawah ini digunakan pada saat posisi tampil data guru perempuan
elseif ($pilih=='perempuan' AND $untukdi=='hapus'){
	$hapusfoto=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE id_gurustaff='$id'");
	$hf=mysql_fetch_array($hapusfoto);
	if ($hf[foto]!= 'no_photo.jpg'){
	mysql_query("DELETE FROM ".$DB_KODE."_guru_staff WHERE id_gurustaff ='$id'");
	unlink("../../../images/foto/guru/$hf[foto]");}
	else {
	mysql_query("DELETE FROM ".$DB_KODE."_guru_staff WHERE id_gurustaff ='$id'");
	}
	gogo('../../staff.php?t='.$token.'&pilih=jenkel&kode=P');} 

elseif ($pilih=='perempuan' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 $hapuskabeh=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE id_gurustaff='$cek[$i]'");
	 $hk=mysql_fetch_array($hapuskabeh);
	 mysql_query("DELETE FROM ".$DB_KODE."_guru_staff WHERE id_gurustaff='$cek[$i]'");
	
	}
	gogo('../../staff.php?t='.$token.'&pilih=jenkel&kode=P');
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

