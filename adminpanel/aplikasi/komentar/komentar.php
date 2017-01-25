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

if ($pilih=='komentar' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO ".$DB_KODE."_komentar
				(id_berita, nama_komentar, email_komentar, isi_komentar, tanggal_komentar, status_terima)
				VALUES
				('$_POST[judul_berita]','$_POST[nama_kom]','$_POST[email_kom]','$_POST[isi_kom]','$_POST[tgl_kom]','$_POST[status_terima]')");
				
	gogo('../../komentar.php?t='.$token.'');
}

elseif ($pilih=='komentar' AND $untukdi=='edit'){
	mysql_query("UPDATE ".$DB_KODE."_komentar SET nama_komentar ='$_POST[nama_kom]',
										email_komentar ='$_POST[email_kom]',
										isi_komentar ='$_POST[isi_kom]',
										tanggal_komentar ='$_POST[tgl_kom]',
										status_terima ='$_POST[status_terima]',
										id_berita ='$_POST[judul_berita]'
										WHERE id_komentar ='$id'");
							
	gogo('../../komentar.php?t='.$token.'');
}

//Dibawah ini digunakan pada saat posisi di halaman semua data komentar
elseif ($pilih=='komentar' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM ".$DB_KODE."_komentar WHERE id_komentar ='$id'");			
	gogo('../../komentar.php?t='.$token.'');
}
elseif ($pilih=='komentar' AND $untukdi=='terima'){
	mysql_query("UPDATE ".$DB_KODE."_komentar SET status_terima='1' WHERE id_komentar='$id'");
	gogo('../../komentar.php?t='.$token.'');
}
elseif ($pilih=='komentar' AND $untukdi=='tolak'){
	mysql_query("UPDATE ".$DB_KODE."_komentar SET status_terima='0' WHERE id_komentar='$id'");
	gogo('../../komentar.php?t='.$token.'');
}
elseif ($pilih=='komentar' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM ".$DB_KODE."_komentar WHERE id_komentar='$cek[$i]'");
	}
	gogo('../../komentar.php?t='.$token.'');
}

//Dibawah ini digunakan pada saat posisi di halaman komentar diterima
elseif ($pilih=='terima' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM ".$DB_KODE."_komentar WHERE id_komentar ='$id'");			
	gogo('../../komentar.php?t='.$token.'&pilih=diterima');
}
elseif ($pilih=='terima' AND $untukdi=='tolak'){
	mysql_query("UPDATE ".$DB_KODE."_komentar SET status_terima='0' WHERE id_komentar='$id'");
	gogo('../../komentar.php?t='.$token.'&pilih=diterima');
}
elseif ($pilih=='terima' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM ".$DB_KODE."_komentar WHERE id_komentar='$cek[$i]'");
	}
	gogo('../../komentar.php?t='.$token.'&pilih=diterima');
}

//Dibawah ini digunakan pada saat posisi di halaman komentar ditolak
elseif ($pilih=='tolak' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM ".$DB_KODE."_komentar WHERE id_komentar ='$id'");			
	gogo('../../komentar.php?t='.$token.'&pilih=ditolak');
}
elseif ($pilih=='tolak' AND $untukdi=='terima'){
	mysql_query("UPDATE ".$DB_KODE."_komentar SET status_terima='1' WHERE id_komentar='$id'");
	gogo('../../komentar.php?t='.$token.'&pilih=ditolak');
}
elseif ($pilih=='tolak' AND $untukdi=='hapusbanyak'){
	$cek=$_POST['cek'];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM ".$DB_KODE."_komentar WHERE id_komentar='$cek[$i]'");
	}
	gogo('../../komentar.php?t='.$token.'&pilih=ditolak');
}
?>
 <center><br><br><img src="../../images/loading.gif" style="   vertical-align: middle;text-align: center;"> <br>Mohon ditunggu ..!</center>  
 

<?php

  } }
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>
