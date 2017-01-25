<?php 
session_start();//error_reporting(0); 
include "../../konfigurasi/koneksi.php";

include "../../adminpanel/konten/fungsi.php";
if (isset($_GET['nip'])){$nip=ceknomor($_GET['nip']);} if (isset($_POST['nip'])){$nip=ceknomor($_POST['nip']);}


if (isset($_GET['nis'])){$nis=ceknomor($_GET['nis']);} if (isset($_POST['nis'])){$nis=ceknomor($_POST['nis']);}
if (isset($_GET['id'])){$id=ceknomor($_GET['id']);} if (isset($_POST['id'])){$id=ceknomor($_POST['id']);}
if (isset($_SESSION['siswa']) OR isset($_SESSION['guru']))
{
if (isset($_GET['pilih'])){
$pilih=$_GET['pilih'];
$untukdi=$_GET['untukdi'];
date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
//$sandi=MD5(isset($_POST['password']));



//echo $pilih;

//echo $untukdi;

							global $ns;
							if ($pilih=='siswa'){
							$siswa=$_SESSION['namasiswa'].'9a9z9'.$ns['isi_pengaturan'];							
						    $siswa = strtolower(preg_replace("/\s/","9a9z9",$siswa));
							$siswa = preg_replace('#\W#', '', $siswa);								
							$siswa = str_replace("9a9z9","-",$siswa);
							$url_siswa = "../../edit-profil-".isset($_POST['nis'])."-".$siswa.".html";
							}
							if ($pilih=='guru'){
							$guru=$_SESSION['namaguru'].'9a9z9'.$ns['isi_pengaturan'];							
						    $guru = strtolower(preg_replace("/\s/","9a9z9",$guru));
							$guru = preg_replace('#\W#', '', $guru);								
							$guru = str_replace("9a9z9","-",$guru);
							$url_guru = "../../edit-profil-".isset($_POST['nip'])."-".$guru.".html";
							}
//echo $url_guru;						
if ($pilih=='siswa' AND $untukdi=='edit'){
	mysql_query("UPDATE ".$DB_KODE."_siswa SET 	alamat='$_POST[alamat]',
										email='$_POST[email]',
										telepon='$_POST[telepon]'
										WHERE nis ='$nis'");						
	//echo "<script>window.alert('Profil anda berhasil di update.');window.location=($url_siswa)</script>";
			header('location:'.$url_siswa);
			exit;
}


elseif ($pilih=='guru' AND $untukdi=='edit'){
	mysql_query("UPDATE ".$DB_KODE."_guru_staff SET 	alamat='$_POST[alamat]',
											email='$_POST[email]',
											telepon='$_POST[telepon]'
											WHERE nip ='$nip'");						
	//echo "<script>window.alert('Profil anda berhasil di update.');window.location=($url_guru)</script>";
		header('location:'.$url_guru);
			exit;
}

elseif ($pilih=='siswa' AND $untukdi=='gantipassword'){
if (isset($_POST['password'])){
$sandi= md5($_POST['password']);
	mysql_query("UPDATE ".$DB_KODE."_siswa SET 	password='$sandi'
										WHERE nis ='$nis'");						
	//echo "<script>window.alert('Password anda berhasil di update.');window.location=($url_siswa)</script>";
				header('location:'.$url_siswa);
			exit;
	}else{
				header('location:'.$url_siswa);
			exit;

}	
}


elseif ($pilih=='guru' AND $untukdi=='gantipassword'){
	mysql_query("UPDATE ".$DB_KODE."_guru_staff	 SET 	password='$sandi'
										 WHERE 	nip ='$nip'");						
	//echo "<script>window.alert('Password anda berhasil di update.');window.location=($url_guru)</script>";
		header('location:'.$url_guru);
			exit;
}


elseif ($pilih=='guru' AND $untukdi=='upload'){

//include "../../adminpanel/konten/fungsi.php";
include "../../konfigurasi/file_upload_guru.php";
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
	if ($lokasi_file){
$extensionList = array("doc", "docx", "pdf", "ppt", "pptx", "xls", "xlsx", "odt", "zip", "rar");
$namaDir = '../../file/materi/';
	global $data;
	UploadFile($nama_file,$extensionList,$namaDir,$data);

}
	mysql_query("INSERT INTO ".$DB_KODE."_materi
				(file_materi,judul_materi, deskripsi_materi, id_mapel, nip, tanggal_upload)
				VALUES
				(	'$nama_file',
					'$_POST[judul_materi]',
					'$_POST[deskripsi]',
					'$_POST[mapel]',
					'$_POST[guru]',
					'$tanggal')");
	header('location:../../elearning-upload.html');
}


}else{
	header('location:../../index.php');
	exit;
}

}else{
	header('location:../../index.php');
	exit;
}
  
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */


 ?>				
