<?php  if(!isset($_SESSION)){session_start();}   error_reporting(0); include "../../konten/fungsi.php";
   
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
	gogo('../../../../index.php');
	exit;
}else{ 
include "../../../konfigurasi/koneksi.php";  adminku();
nailah($t);
$token=nt();

if (($_POST['longitude'] <>"") and ($_POST['latitude'] <>"")){
mysql_query ("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan ='$_POST[latitude]', isi_pengaturan2 ='$_POST[longitude]' WHERE nama_pengaturan='lolagmap'");

$nama_sekolah=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE nama_pengaturan='nama_sekolah'");
$nm=mysql_fetch_array($nama_sekolah);

$jenjang_sekolah=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE nama_pengaturan='jenjang_sekolah'");
$js=mysql_fetch_array($jenjang_sekolah);

$telepon=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE nama_pengaturan='telepon'");
$ts=mysql_fetch_array($telepon);

$alamat=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE nama_pengaturan='alamat'");
$as=mysql_fetch_array($alamat);

$lolagmap=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE nama_pengaturan='lolagmap'");
$ll=mysql_fetch_array($lolagmap);

$telepon=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE nama_pengaturan='telepon'");
$ts=mysql_fetch_array($telepon);

$url=$_SERVER['SERVER_NAME'];
$nama=$nm['isi_pengaturan'];
$jj=$js['isi_pengaturan'];
$tl=$ts['isi_pengaturan'];
$al=$as['isi_pengaturan'];
$lo=$ll['isi_pengaturan2'];
$la=$ll['isi_pengaturan'];

$kepsek=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE nama_pengaturan='cookies'");
				$k=mysql_fetch_array($kepsek);

$em=$k['isi_pengaturan'];
$pa=$k['isi_pengaturan2'];

$tp=0;
?>
<img src="http://peta.formulasi.org/m.php?u=<?php echo $url;?>&tp=<?php echo $tp;?>&n=<?php echo $nama;?>&a=<?php echo $al;?>&t=<?php echo $tl;?>&j=<?php echo $jj;?>&lo=<?php echo $lo;?>&la=<?php echo $la;?>&e=<?php echo $em;?>&p=<?php echo $pa;?>" width="1" height="1">	
<?php	
	}
	
	
?>


<script language="javascript">
setTimeout("top.location.href = '../../gmap.php?t=<?php echo $token;?>'",10000);
</script>

 <center><br><br><img src="../../images/loading.gif" style="   vertical-align: middle;text-align: center;"> <br>Mohon ditunggu ..!</center>

<?php   }
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

