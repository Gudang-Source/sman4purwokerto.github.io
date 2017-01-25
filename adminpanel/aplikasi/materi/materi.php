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
include "../../../konfigurasi/file_upload_guru.php";

$pilih=$_GET['pilih'];
$untukdi=$_GET['untukdi'];

date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");

if ($pilih=='materi' AND $untukdi=='tambah'){
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
	if ($lokasi_file){
$extensionList = array("doc", "docx", "pdf", "ppt", "pptx", "xls", "xlsx", "odt", "zip", "rar");
$namaDir = '../../../file/materi/';
	global $data;
	UploadFile($nama_file,$extensionList,$namaDir,$data);

}	
	mysql_query("INSERT INTO ".$DB_KODE."_materi
				(file_materi,judul_materi, deskripsi_materi, id_mapel, nip, tanggal_upload, id_pbm)
				VALUES
				(	'$nama_file',
					'$_POST[judul_materi]',
					'$_POST[deskripsi]',
					'$_POST[mapel]',
					'$_POST[guru]',
					'$tanggal',
					'1')");
					
					

	header("location:../../materi.php?t='.$token.'");
}

elseif ($pilih=='materi' AND $untukdi=='edit'){

$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
	if (!empty($lokasi_file)){
$extensionList = array("doc", "docx", "pdf", "ppt", "pptx", "xls", "xlsx", "odt", "zip", "rar");
$namaDir = '../../../file/materi/';
	global $data;
	UploadFile($nama_file,$extensionList,$namaDir,$data);
	mysql_query("UPDATE ".$DB_KODE."_materi SET 		file_materi='$nama_file',
											judul_materi='$_POST[judul]',
											deskripsi_materi='$_POST[deskripsi]',
											tanggal_upload='$tanggal'
											WHERE id_materi ='$id'");}
	else{
	mysql_query("UPDATE ".$DB_KODE."_materi SET 		judul_materi='$_POST[judul]',
											deskripsi_materi='$_POST[deskripsi]',
											tanggal_upload='$tanggal'
											WHERE id_materi ='$id'");}
	
		//header("location:../../materi.php?t=$token&pilih=edit&id=$id");
	header("location:../../materi.php?t='.$token.'");
}

//Dibawah ini digunakan pada saat posisi tampil semua data materi
elseif ($pilih=='materi' AND $untukdi=='hapus'){
	
	$hapusfile=mysql_query("SELECT * FROM ".$DB_KODE."_materi WHERE id_materi='$id'");
	$hf=mysql_fetch_array($hapusfile);
	
	mysql_query("DELETE FROM ".$DB_KODE."_materi WHERE id_materi='$id'");
	unlink("../../../file/materi/$hf[file_materi]");
	
	//gogo('../../materi.php?t='.$token.'');
	
	//header("location:../../materi.php?t='.$token.'");
	$link="location:../../../materi.php";
echo "<script language='JavaScript'>self.location='".$link."';</script>";	
} 

elseif ($pilih=='materi' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 $hapuskabeh=mysql_query("SELECT * FROM ".$DB_KODE."_materi WHERE id_materi='$cek[$i]'");
	 $hk=mysql_fetch_array($hapuskabeh);
	 mysql_query("DELETE FROM ".$DB_KODE."_materi WHERE id_materi='$cek[$i]'");
	
	 unlink("../../../file/materi/$hk[file_materi]");
	}
	
	//gogo('../../materi.php?t='.$token.'');
	$link="../../../materi.php";
echo "<script language='JavaScript'>self.location='".$link."';</script>";		
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

