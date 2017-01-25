<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */ 
if(!isset($_SESSION)){session_start();}   error_reporting(0); 

include "fungsi.php";
if (isset($_GET['x'])){
	$x=$_GET['x'];
}elseif (isset($_POST['x'])){
	$x=$_POST['x'];
}

 include "../adminpanel/konten/fungsi.php"; if (isset($_GET['id'])){$id=ceknomor($_GET['id']);} if (isset($_POST['id'])){$id=ceknomor($_POST['id']);}

 if (!isset($_SESSION['kontenisi'])){
header ('location:../index.php');
break;
}

 if (!isset($_POST['kode']))
{
	header('location:../index.php');
	exit;
}
else{ 

include "../konfigurasi/koneksi.php";

$x2=gett();

if ($x2==$x){
reft();

//include "../konfigurasi/image_psb.php";
date_default_timezone_set('Asia/Jakarta');
//$lokasi_files = $_FILES['fupload']['tmp_name'];
//$nama_file   = $_FILES['fupload']['name'];
$tanggal=date ("Y-m-d");

$codex="agas".$_POST['kode']."nailahlkjhgfdsa".$DB_KODE;
if(md5(base64_encode(md5($codex))) == $_SESSION['lkjhgfdsa'.$DB_KODE]){
function UploadPSBx($fupload_name){
   //direktori untuk foto PSB
  $vdir_upload = "../images/foto/psb/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

	if (!empty($lokasi_files)){
	//UploadPSBx($nama_file);
	
	}else{
	$nama_file   = "no_photo.jpg";
	}

	$nama_file   = "no_photo.jpg";
	
$nama=sensor(namanya(strip_tags($_POST['nama'])));
$jk=strip_tags($_POST['jk']);
$nem=namanya(strip_tags($_POST['nem']));
$sekolah_asal=namanya(strip_tags($_POST['sekolah_asal']));
$no_sttb=namanya(strip_tags($_POST['no_sttb']));
$tanggal_sttb=$tanggal;
$tempat_lahir=sensor(namanya(strip_tags($_POST['tempat_lahir'])));
$tanggal_lahir=strip_tags($_POST['tanggal_lahir']);
$bb=namanya(strip_tags($_POST['bb']));
$tb=namanya(strip_tags($_POST['tb']));
$nama_ortu=namanya(strip_tags($_POST['nama_ortu']));
$pekerjaan_ortu=strip_tags($_POST['pekerjaan_ortu']);
$alamat=sensor(namanya(strip_tags($_POST['alamat'])));
$polling=namanya(strip_tags($_POST['polling']));
$telepon=namanya(strip_tags($_POST['telepon']));
$email=namanya(strip_tags($_POST['email']));

if(!isset($_SESSION['no_sttb_psb'])){
		mysql_query("INSERT INTO ".$DB_KODE."_psb
						(nama_psb, foto, jenkel, nem, sekolah_asal, no_sttb, tanggal_sttb, tempat_lahir, tanggal_lahir, bb, tb, status_psb, tanggal_psb, nama_ortu, pekerjaan_ortu, alamat_psb, polling_psb, telepon, email)
						VALUES
						(	'$nama',
							'$nama_file',
							'$jk',
							'$nem',
							'$sekolah_asal',
							'$no_sttb',
							'$tanggal_sttb',
							'$tempat_lahir',
							'$tanggal_lahir',
							'$bb',
							'$tb',
							'0',
							'$tanggal',
							'$nama_ortu',
							'$pekerjaan_ortu',
							'$alamat',
							'$polling',
							'$telepon',
							'$email')");
		$_SESSION['nama_psb']=$nama;					
		$_SESSION['tmp_psb']=$tempat_lahir;				
		$_SESSION['tgl_psb']=$tanggal_lahir;			
		$_SESSION['tgldaf_psb']=$tanggal;				
		$_SESSION['jk_psb']=$jk;	
		$_SESSION['sekolah_asal_psb']=$sekolah_asal;	
		$_SESSION['email_psb']=$email;	
		$_SESSION['no_sttb_psb']=$no_sttb;		
		$_SESSION['foto_psb']=$nama_file;		
}else{

	if($_SESSION['no_sttb_psb']==$no_sttb){

	}else{
	unset($_SESSION['nama_psb']);
	unset($_SESSION['tmp_psb']);
	unset($_SESSION['tgl_psb']);
	unset($_SESSION['tgldaf_psb']);
	unset($_SESSION['jk_psb']);
	unset($_SESSION['sekolah_asal_psb']);
	unset($_SESSION['email_psb']);
	unset($_SESSION['no_sttb_psb']);
	unset($_SESSION['foto_psb']);

			mysql_query("INSERT INTO ".$DB_KODE."_psb
						(nama_psb, foto, jenkel, nem, sekolah_asal, no_sttb, tanggal_sttb, tempat_lahir, tanggal_lahir, bb, tb, status_psb, tanggal_psb, nama_ortu, pekerjaan_ortu, alamat_psb, polling_psb, telepon, email)
						VALUES
						(	'$nama',
							'$nama_file',
							'$jk',
							'$nem',
							'$sekolah_asal',
							'$no_sttb',
							'$tanggal_sttb',
							'$tempat_lahir',
							'$tanggal_lahir',
							'$bb',
							'$tb',
							'0',
							'$tanggal',
							'$nama_ortu',
							'$pekerjaan_ortu',
							'$alamat',
							'$polling',
							'$telepon',
							'$email')");
		$_SESSION['nama_psb']=$nama;					
		$_SESSION['tmp_psb']=$tempat_lahir;				
		$_SESSION['tgl_psb']=$tanggal_lahir;				
		$_SESSION['tgldaf_psb']=$tanggal;				
		$_SESSION['jk_psb']=$jk;	
		$_SESSION['sekolah_asal_psb']=$sekolah_asal;	
		$_SESSION['email_psb']=$email;	
		$_SESSION['no_sttb_psb']=$no_sttb;		
		$_SESSION['foto_psb']=$nama_file;		

	}
	
				
				

}			
header ('location:../index.php?p=selesaipsb');
}
else {
echo "<script>window.alert('Kode verifikasi yang anda masukkan salah. Silahkan ulangi kembali');window.history.back(); </script>";
}


}else{
reft();
echo "<script>window.alert('Mohon komentar diisi dengan baik. Silahkan ulangi kembali');window.history.back(); </script>";

}

?>

<?php   }
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>
