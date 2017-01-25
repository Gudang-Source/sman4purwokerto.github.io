<?php if(!isset($_SESSION)){session_start();}   error_reporting(0); include "../../konten/fungsi.php";
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
include "../../../konfigurasi/file_upload.php";

$pilih=$_GET['pilih'];
$untukdi=$_GET['untukdi'];

date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");


if ($pilih=='guru' AND $untukdi=='tambah'){

	mysql_query("INSERT INTO ".$DB_KODE."_guru_mapel
				(id_gurumapel, id_gurustaff, tahun_ajaran, id_mapel, id_jurusan, id_kelas, jumlah_jam, status, semester)
				VALUES
				(	'',
					'$_POST[id_guru]',
					'$_POST[tahun_ajaran]',
					'$_POST[mata_pelajaran]',
					'$_POST[jurusan]',
					'$_POST[kelas]',
					'$_POST[jam]',
					'$_POST[status]',
					'$_POST[semester]')");
					
	
	gogo('../../guru_staff.php?t='.$token.'');
}

elseif ($pilih=='guru' AND $untukdi=='edit'){

	mysql_query("UPDATE ".$DB_KODE."_guru_mapel SET 	id_gurustaff='$_POST[id_guru]',
											tahun_ajaran='$_POST[tahun_ajaran]',
											id_mapel='$_POST[mata_pelajaran]',
											id_jurusan='$_POST[jurusan]',
											id_kelas='$_POST[kelas]',
											jumlah_jam='$_POST[jam]',
											status='$_POST[status]',
											semester='$_POST[semester]'
											WHERE id_gurumapel ='$id'");
											
	
	gogo('../../guru_staff.php?t='.$token.'');
}





//Dibawah ini digunakan pada saat posisi tampil semua data guru
elseif ($pilih=='guru' AND $untukdi=='hapus'){
	$hapusfoto=mysql_query("SELECT * FROM ".$DB_KODE."_guru_mapel WHERE id_gurumapel='$id'");
	$hf=mysql_fetch_array($hapusfoto);
	if ($hf[foto]!= 'no_photo.jpg'){
	mysql_query("DELETE FROM ".$DB_KODE."_guru_mapel WHERE id_gurumapel ='$id'");
	unlink("../../../images/foto/guru/$hf[foto]");}
	else {
	mysql_query("DELETE FROM ".$DB_KODE."_guru_mapel WHERE id_gurumapel ='$id'");
	}
	gogo('../../guru_staff.php?t='.$token.'');} 

elseif ($pilih=='guru' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 $hapuskabeh=mysql_query("SELECT * FROM ".$DB_KODE."_guru_mapel WHERE id_gurumapel='$cek[$i]'");
	 $hk=mysql_fetch_array($hapuskabeh);
	 mysql_query("DELETE FROM ".$DB_KODE."_guru_mapel WHERE id_gurumapel='$cek[$i]'");
	
	}
	gogo('../../guru_staff.php?t='.$token.'');
}




?>
<center><br><br><img src="../../images/loading.gif" style="   vertical-align: middle;text-align: center;"> <br>Mohon ditunggu ..!</center>  
 
<?php   } }
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

