<?php if(!isset($_SESSION)){session_start();}  error_reporting(0); include "../../konten/fungsi.php";
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
}else{
	include "../../../konfigurasi/koneksi.php";  adminku();
	nailah($t);
$token=nt();
$pilih=$_GET['pilih'];
	if ($pilih=='install'){
		$folder_plugin=$_GET['ntm'];
		$nama_plugin=$_POST['judul'];
		$pembuat=$_POST['pembuat'];
		$url_pembuat=$_POST['url'];
		$deskripsi=$_POST['deskripsi'];
		$tahun=$_POST['tahun'];
		$cok=$_POST['cookie'];
		$session=base64_encode($cok);
		mysql_query ("INSERT INTO ".$DB_KODE."_plugin (id_plugin, nama_plugin, folder_plugin, pembuat, url_pembuat, deskripsi, tahun, status, session) VALUES
		('', '$nama_plugin', '$folder_plugin', '$pembuat', '$url_pembuat', '$deskripsi', '$tahun', 0, '$session');"); 
		
		include "../../plugin/".$folder_plugin."/".$folder_plugin."_database.php";

		insertdata();
		
		if($_POST['contoh']==1){
				insertcontoh();
		}
		
	}elseif ($pilih=='uninstall'){
	
		$folder_plugin=$_GET['ntm'];
		$id_plugin=ceknomor($_GET['no']);
		mysql_query("DELETE FROM ".$DB_KODE."_plugin WHERE id_plugin ='$id_plugin'");	
		
		include "../../plugin/".$folder_plugin."/".$folder_plugin."_database.php";
		deletedata();
	}elseif ($pilih=='aktifkan'){
		$id_plugin=ceknomor($_GET['no']);
		mysql_query("UPDATE ".$DB_KODE."_plugin SET status='1' WHERE id_plugin='$id_plugin'");

	}elseif ($pilih=='nonaktif'){
		$id_plugin=ceknomor($_GET['no']);
		mysql_query("UPDATE ".$DB_KODE."_plugin SET status='0' WHERE id_plugin='$id_plugin'");

	}
	
	
	//gogo('../../plugin.php');
?>	
?>	
<script language='JavaScript'>
self.location='../../plugin.php?t=<?php echo $token; ?>';
</script>
<?php 
	
}
?>
<center><br><br><img src="../../images/loading.gif" style="   vertical-align: middle;text-align: center;"> <br>Mohon ditunggu ..!</center>  
<?php   }
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>


 