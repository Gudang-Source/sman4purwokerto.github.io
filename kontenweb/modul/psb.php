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


function meta() {
global $ns, $r;
$web=$ns['isi_pengaturan'];
$title='Pendaftaran '.$_SESSION['Bsiswa'].' Baru';
$descx=strtolower($title).' ';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='psb '.$titlez;
$isi='';
$description=desc($isi,$descx);
$judul='';
$title=titx($judul,$title);
$title=$title.' - '.$web;
echo "<title>$title</title>
<meta name='description' content='$description'>
<meta name='keywords' content='$keywords'> ";
}

function konten() {
global $DB_KODE, $ns;
?>

<div id="konten">
<div id="lebar">
<h3>Pendaftaran <?php echo $_SESSION['Bsiswa'];?> Baru Online <a href=""><?php    echo "$ns[isi_pengaturan]";?></a></h3>
<?php    
$statuspsb=mysql_query("SELECT *FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan ='15'");
$r=mysql_fetch_array($statuspsb);
?>
<?php     echo "$r[isi_pengaturan]";?>
<?php    
if ($r['nama_pengaturan']==1){
?>
<br>
<p>Sekilas Informasi PSB Online 
<table style="width: 35%">
<?php    
$pendaftar=mysql_query("SELECT * FROM ".$DB_KODE."_psb");
$totalpendaftar=mysql_num_rows($pendaftar);

$laki=mysql_query("SELECT * FROM ".$DB_KODE."_psb WHERE jenkel='L'");
$pendaftarlaki=mysql_num_rows($laki);

$perempuan=mysql_query("SELECT * FROM ".$DB_KODE."_psb WHERE jenkel='P'");
$pendaftarperempuan=mysql_num_rows($perempuan);

$nem=mysql_query("SELECT * FROM ".$DB_KODE."_psb ORDER BY nem DESC");
$nemtertinggi=mysql_fetch_array($nem);
				
							$judul=$ns['isi_pengaturan'];
						    $judul = strtolower(preg_replace("/\s/","-",$judul));
			
?>
	<tr><td><b>Total Pendaftar</b></td><td><b><a href=""><?php    echo "$totalpendaftar"?></a></b></td></tr>
	<tr><td><b>Pendaftar Laki-laki</b></td><td><b><a href=""><?php    echo "$pendaftarlaki"?></a></b></td></tr>
	<tr><td><b>Pendaftar Perempuan</b></td><td><b><a href=""><?php    echo "$pendaftarperempuan"?></a></b></td></tr>
	<tr><td><b>NEM Tertinggi</b></td><td><b><a href=""><?php    echo "$nemtertinggi[nem]"?></a></b></td></tr>
</table>
<p>Silahkan Klik <a href="formulir-psb-penerimaan-siswa-baru-<?php   echo $judul;?>.html"><b>&raquo;disini&laquo;</b></a> untuk melakukan pendaftaran secara online, atau klik
<a href="data-psb-penerimaan-siswa-baru-<?php   echo $judul;?>.html"><b>&raquo;disini&laquo;</b></a> untuk melihat data pendaftar.</p>
<?php     } ?>
</div>
</div>

<?php    } ?>

<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>