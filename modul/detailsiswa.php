<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 if (!isset($_SESSION['kontenisi'])){
header ('location:../../index.php');
break;
}

if (isset($_GET['nis'])){$nis=ceknomor($_GET['nis']);} if (isset($_POST['nis'])){$nis=ceknomor($_POST['nis']);}

function meta() {
if (isset($_GET['nis'])){$nis=ceknomor($_GET['nis']);} if (isset($_POST['nis'])){$nis=ceknomor($_POST['nis']);}
global $DB_KODE, $ns;
	$detaildata=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='4'");
	$dd=mysql_fetch_array($detaildata);
		if (isset($dd['isi_pengaturan']) > 0){
$detailsiswa=mysql_query("SELECT * FROM ".$DB_KODE."_siswa, ".$DB_KODE."_kelas WHERE ".$DB_KODE."_siswa.id_kelas=".$DB_KODE."_kelas.id_kelas AND nis='$nis'");
$r=mysql_fetch_array($detailsiswa);


$web=$ns['isi_pengaturan'];
$title=$r['nama_siswa'];
$titlez=$r['nama_siswa'];
$keyw1 = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw2 = strtolower(preg_replace("/\s/",", nama ",$titlez));
$keyw=$keyw1.' '.$keyw2;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$keywords=$keywords.', '.$titlez;
$isi='';
$desc='Data siswa '.$title.' kelas '.$r['nama_kelas'].' di '. $web.' nis '.$_GET['nis'] ;
$description=desc($isi,$desc);
$judul='';
$title=titx($judul,$title);
$title='Data '.$title.' - Siswa '.$web;
echo "<title>$title</title>
<meta name='description' content='$description'>
<meta name='keywords' content='$keywords'> ";
}
}

function konten() {if (isset($_GET['nis'])){$nis=ceknomor($_GET['nis']);} if (isset($_POST['nis'])){$nis=ceknomor($_POST['nis']);}
global $DB_KODE, $ns;
?>

<div id="konten">
<div id="lebar">
<?php    
	$detaildata=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='4'");
	$dd=mysql_fetch_array($detaildata);
		if (isset($dd['isi_pengaturan']) > 0){
$detailsiswa=mysql_query("SELECT * FROM ".$DB_KODE."_siswa, ".$DB_KODE."_kelas WHERE ".$DB_KODE."_siswa.id_kelas=".$DB_KODE."_kelas.id_kelas AND nis='$nis'");
$r=mysql_fetch_array($detailsiswa);
?>
<h3>Detail Siswa <a href=""><?php    echo "$ns[isi_pengaturan]";?></a></h3>
<table style="margin-top: 20px">
<tr><td rowspan="7" width="160px"><?php    echo "<img src='images/foto/siswa/$r[foto]' width='150px' style='padding: 5px; border: 1px solid #dcdcdc; background: #fff;'>";?></td></tr>
<tr><td width="130px">Nama Siswa</td><td width="5px">:</td><td><b><?php    echo $r['nama_siswa']?></b></td></tr>
<tr><td>Jenis Kelamin</td><td>:</td><td><b><?php    echo $r['jenkel']?></b></td></tr>
<tr><td>Kelas</td><td>:</td><td><b><?php    echo $r['nama_kelas']?></b></td></tr>
<tr><td>Tahun Masuk</td><td>:</td><td><b><?php    echo $r['tahun_registrasi']?></b></td></tr>
<tr><td>Alamat</td><td>:</td><td><b><?php    echo $r['alamat']?></b></td></tr>
<tr><td colspan="3"><input type="button" class="tombol" value="Kembali" onclick="self.history.back()"></td></tr>
</table>
<?php     } ?>
</div>
</div>
<?php     } ?>
<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

