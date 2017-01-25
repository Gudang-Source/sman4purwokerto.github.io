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

if (isset($_GET['nip'])){$nip=ceknomor($_GET['nip']);} if (isset($_POST['nip'])){$nip=ceknomor($_POST['nip']);}
function meta() {
global $DB_KODE, $ns, $nip;
	$detaildata=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='6'");
	$dd=mysql_fetch_array($detaildata);
		if (isset($dd['isi_pengaturan']) > 0){
$detailguru=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff, ".$DB_KODE."_mapel WHERE ".$DB_KODE."_guru_staff.id_mapel=".$DB_KODE."_mapel.id_mapel AND nip='$nip'");
$r=mysql_fetch_array($detailguru);

$web=$ns['isi_pengaturan'];
$title=$r['nama_gurustaff'];
$titlez=$r['nama_gurustaff'];
$keyw1 = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw2 = strtolower(preg_replace("/\s/",", nama ",$titlez));
$keyw=$keyw1.' '.$keyw2;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$keywords=$keywords.', '.$titlez;
$isi='';
$desc='profil guru '.$title.' mata pelajaran '.$r['nama_mapel'].' di '. $web.' nip '.$_GET['nip'] ;
$description=desc($isi,$desc);
$judul='';
$title=titx($judul,$title);
$title='Profil '.$title.' - Guru '.$web;
echo "<title>$title</title>
<meta name='description' content='$description'>
<meta name='keywords' content='$keywords'> ";
}
}

function konten() {if (isset($_GET['nip'])){$nip=ceknomor($_GET['nip']);} if (isset($_POST['nip'])){$nip=ceknomor($_POST['nip']);}
global $DB_KODE, $ns, $dd;
?>
<div id="konten">
<div id="lebar">
<?php    
	$detaildata=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='6'");
	$dd=mysql_fetch_array($detaildata);
		if (isset($dd['isi_pengaturan']) > 0){
$detailguru=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff, ".$DB_KODE."_mapel WHERE ".$DB_KODE."_guru_staff.id_mapel=".$DB_KODE."_mapel.id_mapel AND nip='$nip'");
$r=mysql_fetch_array($detailguru);
?>
<h3>Detail Guru <a href=""><?php    echo "$ns[isi_pengaturan]";?></a></h3>
<table style="margin-top: 20px">
<tr><td rowspan="7" width="160px"><?php    echo "<img src='images/foto/guru/$r[foto]' width='150px' style='padding: 5px; border: 1px solid #dcdcdc; background: #fff;'>";?></td></tr>
<tr><td width="130px">Nama Guru</td><td>:</td><td><b><?php    echo $r['nama_gurustaff']?></b></td></tr>
<tr><td>Jenis Kelamin</td><td>:</td><td><b><?php    echo $r['jenkel']?></b></td></tr>
<tr><td>Mengajar</td><td>:</td><td><b><?php    echo $r['nama_mapel']?></b></td></tr>
<tr><td>Pendidikan Terakhir</td><td>:</td><td><b><?php    echo $r['pendidikan_terakhir']?></b></td></tr>
<tr><td>Tahun Masuk</td><td>:</td><td><b><?php    echo $r['tahun_masuk']?></b></td></tr>
<tr><td>Alamat</td><td>:</td><td><b><?php    echo $r['alamat']?></b></td></tr>
<tr><td colspan="4"><input type="button" class="tombol" value="Kembali" onclick="self.history.back()"></td></tr>
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
