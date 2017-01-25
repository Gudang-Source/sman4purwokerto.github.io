<?php  
if(!isset($_SESSION)){session_start();}   error_reporting(0); include "../adminpanel/konten/fungsi.php"; if (isset($_GET['id'])){$id=ceknomor($_GET['id']);} if (isset($_POST['id'])){$id=ceknomor($_POST['id']);}
 if (!isset($_SESSION['kontenisi'])){
header ('location:../index.php');
break;
}
 
if (isset($_SESSION['siswa']) OR isset($_SESSION['guru']) OR isset($_SESSION['adminsh'])){

include "../konfigurasi/koneksi.php";

$dir= "../file/penugasan/";
mysql_query("UPDATE ".$DB_KODE."_penugasan SET download=download+1 WHERE id_penugasan='$id'");
$file=mysql_query("SELECT * FROM ".$DB_KODE."_penugasan WHERE id_penugasan='$id'");
$r=mysql_fetch_array($file);
$filename=$r[file_penugasan];

  header("Content-Type: octet/stream");
  header("Pragma: private"); 
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  header("Cache-Control: private",false); 
  header("Content-Type: $ctype");
  header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
  header("Content-Transfer-Encoding: binary");
  header("Content-Length: ".filesize($dir.$filename));
  readfile("$dir$filename");
  
    exit();  
}else{
header ('location:../index.php');
} 
?>