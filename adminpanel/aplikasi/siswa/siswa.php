<?php if(!isset($_SESSION)){session_start();}   //error_reporting(0); \

include "../../konten/fungsi.php";
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
if (isset($_GET['nis'])){$nis=ceknomor($_GET['nis']);} if (isset($_POST['nis'])){$nis=ceknomor($_POST['nis']);}
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


if ($pilih=='siswa' AND $untukdi=='tambah'){
$password = MD5($_POST['password']);
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
	if (!empty($lokasi_file)){
$extensionList = array("bmp", "jpg", "gif", "png", "BMP", "JPG", "GIF", "PNG", "Bmp", "Jpg", "Gif", "Png");
$namaDir = '../../../images/foto/siswa/';
	global $data;
	UploadFile($nama_file,$extensionList,$namaDir,$data);

	
if ($_SESSION['jenjang']>4){	
$jurusan= $_POST[jurusan];
}else{
$jurusan= '1';
}	
	mysql_query("INSERT INTO ".$DB_KODE."_siswa
				(nama_siswa,nis, foto, password, jenkel, tempat_lahir, tanggal_lahir, alamat, tahun_registrasi, sekolah_asal, email, telepon, status_siswa, id_kelas, nama_ortu, pekerjaan_ortu, id_jurusan, nisn)
				VALUES
				(	'$_POST[nama_siswa]',
					'$nis',
					'$nama_file',
					'$password',
					'$_POST[jk]',
					'$_POST[tempat_lahir]',
					'$_POST[tanggal_lahir]',
					'$_POST[alamat]',
					'$_POST[tahun_reg]',
					'$_POST[sekolah_asal]',
					'$_POST[email]',
					'$_POST[telepon]',
					'1',
					'$_POST[kelas]',
					'$_POST[nama_ortu]',
					'$_POST[pekerjaan_ortu]',
					'$jurusan',
					'$_POST[nisn]')
					");
	}else{
	mysql_query("INSERT INTO ".$DB_KODE."_siswa
				(nama_siswa,nis, foto, password, jenkel, tempat_lahir, tanggal_lahir, alamat, tahun_registrasi, sekolah_asal, email, telepon, status_siswa, id_kelas, nama_ortu, pekerjaan_ortu, id_jurusan, nisn)
				VALUES
				(	'$_POST[nama_siswa]',
					'$nis',
					'no_photo.jpg',
					'$password',
					'$_POST[jk]',
					'$_POST[tempat_lahir]',
					'$_POST[tanggal_lahir]',
					'$_POST[alamat]',
					'$_POST[tahun_reg]',
					'$_POST[sekolah_asal]',
					'$_POST[email]',
					'$_POST[telepon]',
					'1',
					'$_POST[kelas]',
					'$_POST[nama_ortu]',
					'$_POST[pekerjaan_ortu]',
					'$_POST[jurusan]',
					'$_POST[nisn]')
					");
}	
	gogo('../../siswa.php?t='.$token.'');
}

elseif ($pilih=='siswa' AND $untukdi=='edit'){
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
	if (!empty($lokasi_file)){
$extensionList = array("bmp", "jpg", "gif", "png", "BMP", "JPG", "GIF", "PNG", "Bmp", "Jpg", "Gif", "Png");
$namaDir = '../../../images/foto/siswa/';
	global $data;
	UploadFile($nama_file,$extensionList,$namaDir,$data);

	mysql_query("UPDATE ".$DB_KODE."_siswa SET 		nama_siswa ='$_POST[nama_siswa]',
											nis='$nis',
											foto='$nama_file',
											jenkel='$_POST[jk]',
											tempat_lahir='$_POST[tempat_lahir]',
											tanggal_lahir='$_POST[tanggal_lahir]',
											alamat='$_POST[alamat]',
											tahun_registrasi='$_POST[tahun_reg]',
											sekolah_asal='$_POST[sekolah_asal]',
											email='$_POST[email]',
											telepon='$_POST[telepon]',
											id_kelas='$_POST[kelas]',
											status_siswa='$_POST[status_siswa]',
											nama_ortu='$_POST[nama_ortu]',
											pekerjaan_ortu='$_POST[pekerjaan_ortu]',
											id_jurusan='$_POST[jurusan]',
											nisn='$_POST[nisn]'
											WHERE id_siswa ='$id'");}
	else {
	mysql_query("UPDATE ".$DB_KODE."_siswa SET 		nama_siswa ='$_POST[nama_siswa]',
											nis='$nis',
											jenkel='$_POST[jk]',
											tempat_lahir='$_POST[tempat_lahir]',
											tanggal_lahir='$_POST[tanggal_lahir]',
											alamat='$_POST[alamat]',
											tahun_registrasi='$_POST[tahun_reg]',
											sekolah_asal='$_POST[sekolah_asal]',
											email='$_POST[email]',
											telepon='$_POST[telepon]',
											id_kelas='$_POST[kelas]',
											nama_ortu='$_POST[nama_ortu]',
											status_siswa='$_POST[status_siswa]',
											pekerjaan_ortu='$_POST[pekerjaan_ortu]',
											id_jurusan='$_POST[jurusan]',
											nisn='$_POST[nisn]'
											WHERE id_siswa ='$id'");
	}
	gogo('../../siswa.php?t='.$token.'');
}
elseif ($pilih=='siswa' AND $untukdi=='gantipassword'){
$password = MD5($_POST['password']);
	mysql_query("UPDATE ".$DB_KODE."_siswa SET 	password='$password' WHERE id_siswa='$id'");
	gogo('../../siswa.php?t='.$token.'');
}

elseif ($pilih=='siswa' AND $untukdi=='naikkelas'){
$th=date('Y');
if (isset($_POST['semua'])=='Pindahkan Semua') {
	if(isset($_POST['kelas']) and isset($_POST['kelas_naik']) ){
		if($_POST['kelas_naik']==100000000){
		mysql_query("UPDATE ".$DB_KODE."_siswa SET 	id_kelas='100000000', status_siswa='3', tahun_lulus='$th'
												WHERE id_kelas='$_POST[kelas]'");		
		}elseif($_POST['kelas_naik']==10000000){
		mysql_query("UPDATE ".$DB_KODE."_siswa SET 	id_kelas='0', status_siswa='0', tahun_lulus='$th', status_oke='1'
												WHERE id_kelas='$_POST[kelas]'");		
		}elseif($_POST['kelas_naik']==1000000){
		mysql_query("UPDATE ".$DB_KODE."_siswa SET 	id_kelas='1000000', status_siswa='2', tahun_lulus='$th'
												WHERE id_kelas='$_POST[kelas]'");		
		}elseif ($_POST['kelas_naik']>0){

		mysql_query("UPDATE ".$DB_KODE."_siswa SET 	id_kelas='$_POST[kelas_naik]', status_siswa='1', tahun_lulus='0000'
												WHERE id_kelas='$_POST[kelas]'");	
		}
	}
}elseif(isset($_POST['tanda'])=='Pindahkan yang ditandai'){

	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
		if(isset($_POST['kelas']) and isset($_POST['kelas_naik']) ){
			if($_POST['kelas_naik']==100000000){
			mysql_query("UPDATE ".$DB_KODE."_siswa SET 	id_kelas='100000000', status_siswa='3', tahun_lulus='$th'
													WHERE id_siswa='$cek[$i]'");		
			
			}elseif($_POST['kelas_naik']==10000000){
			mysql_query("UPDATE ".$DB_KODE."_siswa SET 	id_kelas='0', status_siswa='0', tahun_lulus='$th'
													WHERE id_siswa='$cek[$i]'");		
			
			}elseif($_POST['kelas_naik']==1000000){
			mysql_query("UPDATE ".$DB_KODE."_siswa SET 	id_kelas='1000000', status_siswa='2', tahun_lulus='$th'
													WHERE id_siswa='$cek[$i]'");		
			
			}elseif ($_POST['kelas_naik']>0){

			mysql_query("UPDATE ".$DB_KODE."_siswa SET 	id_kelas='$_POST[kelas_naik]', status_siswa='1', tahun_lulus='0000'
													WHERE id_siswa='$cek[$i]'");	
			}
		}	
	
	// mysql_query("UPDATE ".$DB_KODE."_siswa WHERE id_siswa='$cek[$i]'");
	}
}	
	gogo('../../siswa.php?t='.$token.'&pilih=status');
}
	
//Dibawah ini digunakan pada saat posisi tampil semua data buku tamu
elseif ($pilih=='siswa' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM ".$DB_KODE."_siswa WHERE id_siswa ='$id'");					
	gogo('../../siswa.php?t='.$token.'');}
	
elseif ($pilih=='siswa' AND $untukdi=='hapusgambar'){
	$hapusfoto=mysql_query("SELECT * FROM ".$DB_KODE."_siswa WHERE id_siswa='$id'");
	$hf=mysql_fetch_array($hapusfoto);
	if ($hf[foto]!= 'no_photo.jpg'){
	unlink("../../../images/foto/siswa/$hf[foto]");
	mysql_query("UPDATE ".$DB_KODE."_siswa SET 	foto='no_photo.jpg' WHERE id_siswa='$id'");}
	gogo('../../siswa.php?t='.$token.'&pilih=edit&id='.$id);
}
elseif ($pilih=='siswa' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM ".$DB_KODE."_siswa WHERE id_siswa='$cek[$i]'");
	}
	gogo('../../siswa.php?t='.$token.'');
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