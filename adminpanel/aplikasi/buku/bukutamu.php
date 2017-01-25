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
$pilih=$_GET['pilih'];
$untukdi=$_GET['untukdi'];

if ($pilih=='bukutamu' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO ".$DB_KODE."_buku_tamu
				(nama_bukutamu, subjek, isi_pesan, email, tanggal_kirim, status)
				VALUES
				(	'$_POST[nama_pengirim]',
					'$_POST[subjek]',
					'$_POST[isi_pesan]',
					'$_POST[email]',
					'$_POST[tanggal_kirim]',
					'$_POST[status_buku]')");
					
	gogo('../../buku_tamu.php?t='.$token.'');
}

elseif ($pilih=='bukutamu' AND $untukdi=='edit'){
	mysql_query("UPDATE ".$DB_KODE."_buku_tamu SET 	nama_bukutamu ='$_POST[nama_pengirim]',
											subjek ='$_POST[subjek]',
											isi_pesan ='$_POST[isi_pesan]',
											email ='$_POST[email]',
											tanggal_kirim ='$_POST[tanggal_kirim]',
											status ='$_POST[status_buku]'
											WHERE id_bukutamu ='$id'");						
	gogo('../../buku_tamu.php?t='.$token.'');
}

//Dibawah ini digunakan pada saat posisi tampil semua data buku tamu
elseif ($pilih=='bukutamu' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM ".$DB_KODE."_buku_tamu WHERE id_bukutamu ='$id'");					
	gogo('../../buku_tamu.php?t='.$token.'');}

elseif ($pilih=='bukutamu' AND $untukdi=='tolak'){
	mysql_query("UPDATE ".$DB_KODE."_buku_tamu SET status='0' WHERE id_bukutamu ='$id'");					
	gogo('../../buku_tamu.php?t='.$token.'');}

elseif ($pilih=='bukutamu' AND $untukdi=='terima'){
	mysql_query("UPDATE ".$DB_KODE."_buku_tamu SET status='1' WHERE id_bukutamu ='$id'");					
	gogo('../../buku_tamu.php?t='.$token.'');
}

elseif ($pilih=='bukutamu' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM ".$DB_KODE."_buku_tamu WHERE id_bukutamu='$cek[$i]'");
	}
	gogo('../../buku_tamu.php?t='.$token.'');
}

//Dibawah ini digunakan pada saat posisi tampil data buku yang diterima
elseif ($pilih=='terima' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM ".$DB_KODE."_buku_tamu WHERE id_bukutamu ='$id'");					
	gogo('../../buku_tamu.php?t='.$token.'&pilih=terima');}

elseif ($pilih=='terima' AND $untukdi=='tolak'){
	mysql_query("UPDATE ".$DB_KODE."_buku_tamu SET status='0' WHERE id_bukutamu ='$id'");					
	gogo('../../buku_tamu.php?t='.$token.'&pilih=terima');}

elseif ($pilih=='terima' AND $untukdi=='terima'){
	mysql_query("UPDATE ".$DB_KODE."_buku_tamu SET status='1' WHERE id_bukutamu ='$id'");					
	gogo('../../buku_tamu.php?t='.$token.'&pilih=terima');
}

elseif ($pilih=='terima' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM ".$DB_KODE."_buku_tamu WHERE id_bukutamu='$cek[$i]'");
	}
	gogo('../../buku_tamu.php?t='.$token.'&pilih=terima');
}

//Dibawah ini digunakan pada saat posisi tampil data buku yang ditolak
elseif ($pilih=='tolak' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM ".$DB_KODE."_buku_tamu WHERE id_bukutamu ='$id'");					
	gogo('../../buku_tamu.php?t='.$token.'&pilih=tolak');}

elseif ($pilih=='tolak' AND $untukdi=='tolak'){
	mysql_query("UPDATE ".$DB_KODE."_buku_tamu SET status='0' WHERE id_bukutamu ='$id'");					
	gogo('../../buku_tamu.php?t='.$token.'&pilih=tolak');}

elseif ($pilih=='tolak' AND $untukdi=='terima'){
	mysql_query("UPDATE ".$DB_KODE."_buku_tamu SET status='1' WHERE id_bukutamu ='$id'");					
	gogo('../../buku_tamu.php?t='.$token.'&pilih=tolak');
}

elseif ($pilih=='tolak' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM ".$DB_KODE."_buku_tamu WHERE id_bukutamu='$cek[$i]'");
	}
	gogo('../../buku_tamu.php?t='.$token.'&pilih=tolak');
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

