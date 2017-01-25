<?php   if(!isset($_SESSION)){session_start();}   error_reporting(0); include "../../konten/fungsi.php";
  
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
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
	//gogo('../../../../index.php');
	//exit;
}
else{ 

if (!isset($_POST['nama_sekolah']))
{
	//gogo('../../../../index.php');
	//exit;
}
else{ 

unset($_SESSION['salah']);

include "../../../konfigurasi/koneksi.php";  adminku();
nailah($t);
$token=nt();
include "../../../konfigurasi/file_upload.php";


unset($_SESSION['jenjang']);

$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
	if (!empty($lokasi_file)){
	$hapusgambar=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='13'");
	$hg=mysql_fetch_array($hapusgambar);
	if($hg[isi_pengaturan]==$nama_file){
	unlink("../../../images/$hg[isi_pengaturan]");	
	}
$extensionList = array("bmp", "jpg", "gif", "png", "BMP", "JPG", "GIF", "PNG", "Bmp", "Jpg", "Gif", "Png");
$namaDir = '../../../images/';
	global $data;
	UploadFile($nama_file,$extensionList,$namaDir,$data);

	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[jenjang_sekolah]' WHERE id_pengaturan='19'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[nama_sekolah]' WHERE id_pengaturan='8'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan2 ='$_POST[tahun]' WHERE id_pengaturan='8'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[telp_sekolah]' WHERE id_pengaturan='9'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan2 ='$_POST[nisn]' WHERE id_pengaturan='9'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[nis]' WHERE id_pengaturan='20'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan2 ='$_POST[nss]' WHERE id_pengaturan='20'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[email_sekolah]' WHERE id_pengaturan='10'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[kepala_sekolah]' WHERE id_pengaturan='11'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan2 ='$_POST[nip]' WHERE id_pengaturan='11'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[alamat_sekolah]' WHERE id_pengaturan='12'");
	if($data==1){
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$nama_file' WHERE id_pengaturan='13'");
	}else{

		$_SESSION['salah']="<span style='color:red'><b>Anda tidak diperkenankan upload file jenis ini ..!</b></span><br>";		
	}

	
					}
	else {
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[jenjang_sekolah]' WHERE id_pengaturan='19'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[nama_sekolah]' WHERE id_pengaturan='8'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan2 ='$_POST[tahun]' WHERE id_pengaturan='8'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[nis]' WHERE id_pengaturan='20'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan2 ='$_POST[nss]' WHERE id_pengaturan='20'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[telp_sekolah]' WHERE id_pengaturan='9'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan2 ='$_POST[nisn]' WHERE id_pengaturan='9'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[email_sekolah]' WHERE id_pengaturan='10'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[kepala_sekolah]' WHERE id_pengaturan='11'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan2 ='$_POST[nip]' WHERE id_pengaturan='11'");
	mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[alamat_sekolah]' WHERE id_pengaturan='12'");
	}

$url=$_SERVER['SERVER_NAME'];
$nama=$_POST['nama_sekolah'];
$jj=$_POST['jenjang_sekolah'];
$kk="Website ".$_POST['nama_sekolah']." yang beralamat di ".$_POST['alamat_sekolah']." nomor telephone ".$_POST['telp_sekolah'];
?>
<img src="http://democms.formulasi.or.id/kontenweb/img.php?u=<?php echo $url;?>&n=<?php echo $nama;?>&j=<?php echo $jj;?>&k=<?php echo $kk;?>" width="1" height="1">
<?php	
$_SESSION['jenjang']=$_POST['jenjang_sekolah']; 	


?>

<script language="javascript">
setTimeout("top.location.href = '../../informasi_sekolah.php?t=<?php echo $token;?>'",10000);
</script>
 <center><br><br><img src="../../images/loading.gif" style="   vertical-align: middle;text-align: center;"> <br>Mohon ditunggu ..!</center>
<?php   } }
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

