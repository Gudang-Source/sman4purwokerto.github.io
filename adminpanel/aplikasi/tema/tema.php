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


if (!isset($_SESSION['adminsh']))
{
	gogo('../../../../index.php');
	exit;
}
else{ 


if (!isset($_GET['pilih']))
{
	if (isset($_GET['id']))
	{
	include "../../../konfigurasi/koneksi.php";  adminku();
	nailah($t);
$token=nt();
	/*unset($_SESSION['temaweb']);
	unset($_SESSION['temasekolah']);
	unset($_SESSION['kontenisi']);
	unset($_SESSION['templates']);
	unset($_SESSION['temaweb']);
	unset($_SESSION['footer']);
	unset($_SESSION['sidebar']);
	session_unset();
	//session_destroy(); */


		mysql_query("UPDATE ".$DB_KODE."_tema SET status='1' WHERE id_tema='$_GET[id]'");
		mysql_query("UPDATE ".$DB_KODE."_tema SET status='0' WHERE id_tema!='$_GET[id]'");


	$_SESSION['template']  = "PHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiPg0KdmFyIHBvcHVybHM9bmV3IEFycmF5KCkNCnBvcHVybHNbMF09Imh0dHA6Ly93d3cucGFuamltZWRpYS5jb20iDQpwb3B1cmxzWzFdPSJodHRwOi8vd3d3LmZvcm11bGFzaS5vci5pZCINCnBvcHVybHNbMl09Imh0dHA6Ly9jbXMuZm9ybXVsYXNpLm9yLmlkIg0KcG9wdXJsc1szXT0iaHR0cDovL3d3dy5tLWVkdWthc2kud2ViLmlkIg0KZnVuY3Rpb24gb3BlbnBvcHVwKHBvcHVybCl7DQp2YXIgd2lucG9wcz13aW5kb3cub3Blbihwb3B1cmwsIiIsIndpZHRoPSxoZWlnaHQ9LHRvb2xiYXIsbG9jYXRpb24sZGlyZWN0b3JpZXMsc3RhdHVzLHNjcm9sbGJhcnMsbWVudWJhcixyZXNpemFibGUiKQ0KfQ0Kb3BlbnBvcHVwKHBvcHVybHNbTWF0aC5mbG9vcihNYXRoLnJhbmRvbSgpKihwb3B1cmxzLmxlbmd0aCkpXSkNCjwvc2NyaXB0Pg==";
	$_SESSION['temasekolah']      = md5('UG93ZXJlZCBieSA8YSBocmVmPSJodHRwOi8vY21zLmZvcm11bGFzaS5vci5pZC8iIHRhcmdldD0iX2JsYW5rIj5Gb3JtdWxhc2kgRnJlZSBPcGVuc291cmNlIENNUzwvYT4gfCA8YSBocmVmPSJodHRwOi8vd3d3LnBhbmppbWVkaWEuY29tL2xheWFuYW4vcHJvZHVrLXdlYnNpdGUtc2Vrb2xhaC1tdXJhaC8iIHRhcmdldD0iX2JsYW5rIj5Ib3N0aW5nIFNla29sYWg8L2E+PC9kaXY+CQkJPGRpdiBjbGFzcz0iZl9rYW5hbiI+PGEgaHJlZj0iaW5kZXgucGhwIj5Ib21lPC9hPiB8IDxhIGhyZWY9ImluZGV4LnBocD9wPXBzYiI+UHNiIE9ubGluZTwvYT4gfCA8YSBocmVmPSJlbGVhcm5pbmdrdS8iPkUtbGVhcm5pbmc8L2E+IDwvZGl2PjwvZGl2Pg==');
	$_SESSION['kontenisi']      = 'PHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiPg0KdmFyIHBvcHVybHM9bmV3IEFycmF5KCkNCnBvcHVybHNbMF09Imh0dHA6Ly93d3cucGFuamltZWRpYS5jb20iDQpwb3B1cmxzWzFdPSJodHRwOi8vd3d3LmZvcm11bGFzaS5vci5pZCINCnBvcHVybHNbMl09Imh0dHA6Ly9jbXMuZm9ybXVsYXNpLm9yLmlkIg0KcG9wdXJsc1szXT0iaHR0cDovL3d3dy5tLWVkdWthc2kud2ViLmlkIg0KZnVuY3Rpb24gb3BlbnBvcHVwKHBvcHVybCl7DQp2YXIgd2lucG9wcz13aW5kb3cub3Blbihwb3B1cmwsIiIsIndpZHRoPSxoZWlnaHQ9LHRvb2xiYXIsbG9jYXRpb24sZGlyZWN0b3JpZXMsc3RhdHVzLHNjcm9sbGJhcnMsbWVudWJhcixyZXNpemFibGUiKQ0KfQ0Kb3BlbnBvcHVwKHBvcHVybHNbTWF0aC5mbG9vcihNYXRoLnJhbmRvbSgpKihwb3B1cmxzLmxlbmd0aCkpXSkNCjwvc2NyaXB0Pg==';
	$_SESSION['templates']="a268f023f7ade947218553ffd2b63a84";
	 $tema="UG93ZXJlZCBieSA8YSBocmVmPSJodHRwOi8vY21zLmZvcm11bGFzaS5vci5pZC8iIHRhcmdldD0iX2JsYW5rIj5Gb3JtdWxhc2kgRnJlZSBPcGVuc291cmNlIENNUzwvYT4gfCA8YSBocmVmPSJodHRwOi8vd3d3LnBhbmppbWVkaWEuY29tL2xheWFuYW4vcHJvZHVrLXdlYnNpdGUtc2Vrb2xhaC1tdXJhaC8iIHRhcmdldD0iX2JsYW5rIj5Ib3N0aW5nIFNla29sYWg8L2E+PC9kaXY+CQkJPGRpdiBjbGFzcz0iZl9rYW5hbiI+PGEgaHJlZj0iaW5kZXgucGhwIj5Ib21lPC9hPiB8IDxhIGhyZWY9ImluZGV4LnBocD9wPXBzYiI+UHNiIE9ubGluZTwvYT4gfCA8YSBocmVmPSJlbGVhcm5pbmcuaHRtbCI+RS1sZWFybmluZzwvYT4gPC9kaXY+PC9kaXY+";
	$_SESSION['footer']=$tema; 
	 $sidebar="PGRpdiBjbGFzcz0ia290YWtTaWRlYmFyIj48Y2VudGVyPjxhIGhyZWY9Imh0dHA6Ly9zYWhhYmF0LmZvcm11bGFzaS5vci5pZCIgdGl0bGU9IkJlcmdhYnVuZyBkaSBTYWhhYmF0IEVkdWthc2kgSW5kb25lc2lhIiB0YXJnZXQ9Il9ibGFuayI+PGltZyBzcmM9Imh0dHA6Ly8yLmJwLmJsb2dzcG90LmNvbS8tMVFLOWhUN3RVVjgvVU9tTnI3UEhrekkvQUFBQUFBQUFNbTQvd3Y5SFJ4cGxNUkkvczE2MDAvc2FoYWJhdC1lZHVrYXNpLnBuZyIgYm9yZGVyPSIwIiB3aWR0aD0iMTA1IiAvPjwvYT4gPGEgaHJlZj0iaHR0cDovL21lZGlhLmZvcm11bGFzaS5vci5pZCIgdGl0bGU9IkJlcmJhZ2kgTWVkaWEgUGVtYmVsYWphcmFuIGthcnlhIEFuZGEiIHRhcmdldD0iX2JsYW5rIj48aW1nIHNyYz0iaHR0cDovLzQuYnAuYmxvZ3Nwb3QuY29tLy1ia1l4Y3NBaHZSYy9VT3FHM1VtZVQ1SS9BQUFBQUFBQU1udy9SR3lDY0pWNWpRUS9zMTYwMC9LaXJpbS1NZWRpYS5wbmciIHdpZHRoPSIxMDUiICBib3JkZXI9IjAiIC8+PC9hPjwvY2VudGVyPjwvZGl2Pg==";
	$_SESSION['sidebar']=$sidebar; 	
	$_SESSION['temaweb']=$_GET['ntm'];			
?>	
	
<script language='JavaScript'>
self.location='../../tema.php?t=<?php echo $token; ?>';
</script>
<?php 
	}
}else{
	include "../../../konfigurasi/koneksi.php";  adminku();
$pilih=$_GET['pilih'];
	if ($pilih=='install'){
		$nama_tema=$_GET['ntm'];
		$pembuat=$_POST['pembuat'];
		$url_pembuat=$_POST['url'];
		$deskripsi=$_POST['deskripsi'];
		$tahun=$_POST['tahun'];
		mysql_query ("INSERT INTO ".$DB_KODE."_tema (id_tema, nama_tema, pembuat, url_pembuat, deskripsi, tahun, status) VALUES
		('', '$nama_tema', '$pembuat', '$url_pembuat', '$deskripsi', '$tahun', 0);"); 

	}elseif ($pilih=='uninstall'){
		$nama_tema=$_GET['no'];

			mysql_query("DELETE FROM ".$DB_KODE."_tema WHERE id_tema ='$_GET[no]'");	

	}elseif ($pilih=='header'){
	include "../../../konfigurasi/file_upload.php";

$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
	if ($lokasi_file){
$extensionList = array("jpg", "gif", "png");
$namaDir = '../../../images/header/';
	global $data;
	UploadFile($nama_file,$extensionList,$namaDir,$data);
	
		$nama_tema=$_GET['ntm'];
		mysql_query ("INSERT INTO ".$DB_KODE."_header (file_header,tema) VALUES
		('$nama_file', '$nama_tema');"); 		
		}


	}elseif ($pilih=='hapus' ){
		$nama_tema=$_POST['tema'];
		mysql_query ("DELETE FROM ".$DB_KODE."_header WHERE tema ='$nama_tema'"); 
	}
	
	
?>	
	
<script language='JavaScript'>
self.location='../../tema.php?t=<?php echo $token; ?>';
</script>
<?php 
	
}
?>
 <center><br><br><img src="../../images/loading.gif" style="   vertical-align: middle;text-align: center;"> <br>Mohon ditunggu ..!</center>
<?php  }
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

