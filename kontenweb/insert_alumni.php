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

$nama_alumni=sensor(namanya(strip_tags($_POST['nama_alumni'])));
$email=namanya(strip_tags($_POST['email']));
$alamat=sensor(komen(strip_tags($_POST['alamat'])));
$jk=strip_tags($_POST['jk']);
$tempat_lahir=namanya(strip_tags($_POST['tempat_lahir']));
$tanggal_lahir=strip_tags($_POST['tanggal_lahir']);
$tahun_lulus=namanya(strip_tags($_POST['tahun_lulus']));
$telepon=namanya(strip_tags($_POST['telepon']));
$pekerjaan_sekarang=sensor(komen(strip_tags($_POST['pekerjaan_sekarang'])));
$info_tambahan=sensor(komen(strip_tags($_POST['info_tambahan'])));

$codex="agas".$_POST['kode']."nailahlkjhgfdsa".$DB_KODE;
if(md5(base64_encode(md5($codex))) == $_SESSION['lkjhgfdsa'.$DB_KODE]){
	mysql_query("INSERT INTO ".$DB_KODE."_siswa
				(nama_siswa, jenkel, tempat_lahir, tanggal_lahir, alamat, tahun_lulus, email, telepon, status_siswa, pekerjaan_sekarang, info_tambahan)
				VALUES
				(	'$nama_alumni',
					'$jk',
					'$tempat_lahir',
					'$tanggal_lahir',
					'$alamat',
					'$tahun_lulus',
					'$email',
					'$telepon',
					'0',
					'$pekerjaan_sekarang',
					'$info_tambahan')");
					
header ('location:../index.php?p=alumni');
}
else {
echo "<script>window.alert('Kode verifikasi yang anda masukkan salah. Silahkan ulangi kembali');window.history.back(); </script>";
}


}else{
reft();
echo "<script>window.alert('Mohon  diisi dengan baik. Silahkan ulangi kembali');window.history.back(); </script>";

}

?>

<?php    }
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>