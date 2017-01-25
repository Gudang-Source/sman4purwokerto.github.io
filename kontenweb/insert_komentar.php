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

date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");

if (isset($_GET['t'])){$t=ceking($_GET['t']);}else{$t='kosong';}
$codex="agas".$_POST['kode']."nailahlkjhgfdsa".$DB_KODE;
if(md5(base64_encode(md5($codex))) == $_SESSION['lkjhgfdsa'.$DB_KODE]){
$komen=komen($_POST['komentar']);
$komen=sensor($komen);
$nama=namanya($_POST['nama']);
$nama=sensor($nama);
$email=namanya($_POST['email']);

if (isset($_POST['url'])){
$url=cekurl($_POST['url']);
}else{$url='';}
if ($t=='berita'){
mysql_query("INSERT INTO ".$DB_KODE."_komentar (nama_komentar, email_komentar, isi_komentar, tanggal_komentar, id_berita, url)
			VALUES ('$nama','$email','$komen','$tanggal','$id', '$url')");
}elseif($t=='materi'){
mysql_query("INSERT INTO ".$DB_KODE."_komentar (nama_komentar, email_komentar, isi_komentar, tanggal_komentar, id_materi, url)
			VALUES ('$nama','$email','$komen','$tanggal','$id', '$url')");	
}elseif($t=='media'){
	mysql_query("INSERT INTO ".$DB_KODE."_komentar (nama_komentar, email_komentar, isi_komentar, tanggal_komentar, id_media, url)
			VALUES ('$nama','$email','$komen','$tanggal','$id', '$url')");
}elseif($t=='pbm'){
	mysql_query("INSERT INTO ".$DB_KODE."_komentar (nama_komentar, email_komentar, isi_komentar, tanggal_komentar, id_pbm, url)
			VALUES ('$nama','$email','$komen','$tanggal','$id', '$url')");
}elseif($t=='pengayaan'){
	mysql_query("INSERT INTO ".$DB_KODE."_komentar (nama_komentar, email_komentar, isi_komentar, tanggal_komentar, id_pengayaan, url)
			VALUES ('$nama','$email','$komen','$tanggal','$id', '$url')");
}elseif($t=='penugasan'){
	mysql_query("INSERT INTO ".$DB_KODE."_komentar (nama_komentar, email_komentar, isi_komentar, tanggal_komentar, id_penugasan, url)
			VALUES ('$nama','$email','$komen','$tanggal','$id', '$url')");
}elseif($t=='sumber'){
mysql_query("INSERT INTO ".$DB_KODE."_komentar (nama_komentar, email_komentar, isi_komentar, tanggal_komentar, id_sumber, url)
			VALUES ('$nama','$email','$komen','$tanggal','$id', '$url')");	
}elseif($t=='evaluasi'){

mysql_query("INSERT INTO ".$DB_KODE."_komentar (nama_komentar, email_komentar, isi_komentar, tanggal_komentar, id_evaluasi, url)
			VALUES ('$nama','$email','$komen','$tanggal','$id', '$url')");	
}

echo "<script>window.alert('Terimakasih telah memberi komentar. Komentar anda segera dimoderasi oleh Admin');window.history.back(); </script>";


}
else {
echo "<script>window.alert('Kode verifikasi yang anda masukkan salah. Silahkan ulangi kembali');window.history.back(); </script>";
}
}else{
reft();
echo "<script>window.alert('Mohon komentar diisi dengan baik. Silahkan ulangi kembali');window.history.back(); </script>";

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
