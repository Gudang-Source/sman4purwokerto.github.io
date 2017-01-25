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
}
else{ 



include "../../../konfigurasi/koneksi.php";  adminku();

nailah($t);
$token=nt();

if (isset($_GET['id'])){
 $id=base64_decode($_GET['id']);
$id= ceking($id);
}else if (isset($_POST['id'])){
 $id=base64_decode($_POST['id']);
$id= ceking($id);
}

$pilih=$_GET['pilih'];
$untukdi=$_GET['untukdi'];
date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Ymd");
$sandi1=$_POST['password'];
$sandi2=MD5($sandi1);
$sandi3=base64_decode($sandi2);
$sandi4=MD5($sandi3);
$sandi5=base64_decode($sandi4);
$sandi=MD5($sandi5);

if ($pilih=='admin' AND $untukdi=='tambah'){
	$cekusername=mysql_query("SELECT * FROM ".$DB_KODE."_users WHERE namausers='$_POST[username]'");
	$cek=mysql_num_rows($cekusername);
	$cekemail=mysql_query("SELECT * FROM ".$DB_KODE."_users WHERE email_users='$_POST[email]'");
	$cek2=mysql_num_rows($cekemail);	
	if ($cek== 0){
	if ($cek2== 0){
	mysql_query("INSERT INTO ".$DB_KODE."_users
				(id_users, namausers, sandiusers, nama_lengkap_users, level_users, s_username, email_users)
				VALUES
				(	'$sandi',
					'$_POST[username]',
					'$sandi',
					'$_POST[nama_admin]',
					'$_POST[level_users]',
					'$_POST[username]$tanggal',
					'$_POST[email]')");
	} else {
	echo "<script>window.alert('Maaf, email tersebut sudah digunakan.');window.location=('../../admin.php?t=$token')</script>";
	}

	} else {
	echo "<script>window.alert('Maaf, username tersebut sudah digunakan.');window.location=('../../admin.php?t=$token')</script>";
	}
	gogo('../../admin.php?t='.$token.'');
}

elseif ($pilih=='admin' AND $untukdi=='edit'){
	mysql_query("UPDATE ".$DB_KODE."_users SET 	namausers='$_POST[username]',
										nama_lengkap_users='$_POST[nama_admin]',
										email_users='$_POST[email]',
										level_users='$_POST[level_users]'
										WHERE s_username ='$_POST[s_username]' and  id_users ='$id'");						
	gogo('../../admin.php?t='.$token.'');
}

elseif ($pilih=='admin' AND $untukdi=='editadmin'){
	
	mysql_query("UPDATE ".$DB_KODE."_users SET 	namausers='$_POST[username]',
										nama_lengkap_users='$_POST[nama_admin]',
										email_users='$_POST[email]'
										WHERE id_users ='$id'");						
	gogo('../../admin.php?t='.$token.'');
}

elseif ($pilih=='admin' AND $untukdi=='gantipassword'){

$sandi10=$_POST['password0'];
$sandi20=MD5($sandi10);
$sandi30=base64_decode($sandi20);
$sandi40=MD5($sandi30);
$sandi50=base64_decode($sandi40);
$sandi0=MD5(MD5($sandi50));

if ($sandi0==$_POST['kode']){
	mysql_query("UPDATE ".$DB_KODE."_users SET 	sandiusers='$sandi'
										WHERE id_users ='$id'");						
	gogo('../../admin.php?t='.$token.'');
}else{
	gogo('../../admin.php?t='.$token.'&pilih=edit&id='.$_POST['id']);

		$_SESSION['salah']="<span style='color:red'><b>Password Lama anda tidak cocok, silahkan ulangi</b></span>";
}
}


elseif ($pilih=='admin' AND $untukdi=='hapus'){

	$admincurrent=mysql_query("SELECT * FROM ".$DB_KODE."_users WHERE id_users='$id'");
	$ac=mysql_fetch_array($admincurrent);
	
	$adminsuper=mysql_query("SELECT * FROM ".$DB_KODE."_users WHERE level_users='0'");
	$r=mysql_fetch_array($adminsuper);
	
	mysql_query ("UPDATE ".$DB_KODE."_berita SET s_username = '$r[s_username]' WHERE s_username='$ac[s_username]'");
	mysql_query ("UPDATE ".$DB_KODE."_pengumuman SET s_username = '$r[s_username]' WHERE s_username='$ac[s_username]'");
	mysql_query ("UPDATE ".$DB_KODE."_agenda SET s_username = '$r[s_username]' WHERE s_username='$ac[s_username]'");
	if ($ac[level_users]=='0'){
	gogo('../../admin.php?t='.$token.'');
	}
	else {

	mysql_query("DELETE FROM ".$DB_KODE."_users WHERE id_users ='$id'");
	gogo('../../admin.php?t='.$token.'');}
}
elseif ($pilih=='status' AND $untukdi=='aktif'){
$id= ceknomor($_GET['id']);
$data = str_replace("_","88ops88",$_GET['op']);
$data=komen($data);
$parameter=str_replace("88ops88","_",$data);
	mysql_query("UPDATE ".$DB_KODE."_user_group SET 	$parameter='1'
										WHERE id_user_group ='$id'");						
	gogo('../../admin.php?t='.$token.'&pilih=level');
}
elseif ($pilih=='status' AND $untukdi=='nonaktif'){
$id= ceknomor($_GET['id']);
$data = str_replace("_","88ops88",$_GET['op']);
$data=komen($data);
$parameter=str_replace("88ops88","_",$data);
	mysql_query("UPDATE ".$DB_KODE."_user_group SET 	$parameter='0'
										WHERE id_user_group ='$id'");						
	gogo('../../admin.php?t='.$token.'&pilih=level');
}



?>
<center><br><br><img src="../../images/loading.gif" style="   vertical-align: middle;text-align: center;"> <br>Mohon ditunggu ..!</center>
<?php    } }
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 ?>

 