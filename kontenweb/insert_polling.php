<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */ 
if(!isset($_SESSION)){session_start();}   //error_reporting(0); 

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



  if (!isset($_POST['poll']))
{
	header('location:../index.php');
	exit;
}
else{ 
include "../konfigurasi/koneksi.php";

$x2=gett();

if ($x2==$x){
reft();

	function ceknomorxx($string){
	$string = preg_replace('/[^0-9]/', '', $string);
	return $string;
	}
	$pool=ceknomorxx($_POST['poll']);
	global $DB_KODE;
	mysql_query("UPDATE ".$DB_KODE."_sidebar SET isi1 =isi1+1 WHERE id_sidebar='$pool'");
	echo "<script>window.alert('Terimakasih telah mengikuti polling kami');window.history.back(); </script>";


}else{
reft();
echo "<script>window.alert('Mohon diisi dengan baik. Silahkan ulangi kembali');window.history.back(); </script>";

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