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

$codex="agas".$_POST['kode']."nailahlkjhgfdsa".$DB_KODE;
if(md5(base64_encode(md5($codex))) == $_SESSION['lkjhgfdsa'.$DB_KODE]){
$nama=namanya($_POST['nama']);
$nama=sensor($nama);
$email=namanya($_POST['email']);
$subjek=strip_tags($_POST['subjek']);
$subjek=komen($subjek);
$subjek=sensor($subjek);
$pesan=strip_tags($_POST['pesan']);
$pesan=komen($pesan);
$pesan=sensor($pesan);
mysql_query("INSERT into ".$DB_KODE."_buku_tamu (nama_bukutamu, subjek, isi_pesan, email, tanggal_kirim)
			VALUES ('$nama','$subjek','$pesan','$email]','$tanggal')");
echo "<script>window.alert('Terimakasih telah mengisi buku tamu kami, pesan anda akan dimoderasi oleh admin');window.history.back(); </script>";
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