<?php if(!isset($_SESSION)){session_start();}  include "../../konten/fungsi.php";
/* Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

error_reporting(0);
if (!isset($_SESSION['adminsh']))
{
	gogo('../../../../index.php');
	exit;
}
else{ 



if (isset($_GET['t'])){
	$t=$_GET['t'];
}elseif (isset($_POST['t'])){
	$t=$_POST['t'];
}


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
		$folder_modul=$_GET['ntm'];
		$nama_modul=$_POST['judul'];
		$pembuat=$_POST['pembuat'];
		$url_pembuat=$_POST['url'];
		$deskripsi=$_POST['deskripsi'];
		$tahun=$_POST['tahun'];
		$cok=$_POST['cookie'];
		$session=base64_encode($cok);
		mysql_query ("INSERT INTO ".$DB_KODE."_modul (id_modul, nama_modul, folder_modul, pembuat, url_pembuat, deskripsi, tahun, status, session) VALUES
		('', '$nama_modul', '$folder_modul', '$pembuat', '$url_pembuat', '$deskripsi', '$tahun', 0, '$session');"); 
		
		include "../../aplikasi/".$folder_modul."/".$folder_modul."_database.php";
		insertdata();
		if($_POST['contoh']==1){
				insertcontoh();
		}
	}elseif ($pilih=='uninstall'){
	
		$folder_modul=$_GET['ntm'];
		$id_modul=ceknomor($_GET['no']);
		mysql_query("DELETE FROM ".$DB_KODE."_modul WHERE id_modul ='$id_modul'");	
		
		include "../../aplikasi/".$folder_modul."/".$folder_modul."_database.php";
		deletedata();
	}elseif ($pilih=='aktifkan'){
		$id_modul=ceknomor($_GET['no']);
		mysql_query("UPDATE ".$DB_KODE."_modul SET status='1' WHERE id_modul='$id_modul'");

	}elseif ($pilih=='nonaktif'){
		$id_modul=ceknomor($_GET['no']);
		mysql_query("UPDATE ".$DB_KODE."_modul SET status='0' WHERE id_modul='$id_modul'");

	}
	
	
	//gogo('../../modul.php');
?>	
?>
<script language='JavaScript'>
self.location='../../modul.php?t=<?php echo $token; ?>';
</script>	

<center><br><br><img src="../../images/loading.gif" style="   vertical-align: middle;text-align: center;"> <br>Mohon ditunggu ..!</center>  
<?php 
	
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


 