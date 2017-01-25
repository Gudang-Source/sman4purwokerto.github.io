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

if (isset($_GET['id'])){$id_sidebar=ceknomor($_GET['id']);} if (isset($_POST['id'])){$id_sidebar=ceknomor($_POST['id']);}

function meta() {
if (isset($_GET['id'])){$id_sidebar=ceknomor($_GET['id']);} if (isset($_POST['id'])){$id_sidebar=ceknomor($_POST['id']);}
global $DB_KODE, $ns;
	$detaildata=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='4'");
	$dd=mysql_fetch_array($detaildata);
		if (isset($dd['isi_pengaturan']) > 0){
$detaillink=mysql_query("SELECT * FROM ".$DB_KODE."_sidebar, ".$DB_KODE."_kategori WHERE ".$DB_KODE."_sidebar.kategori=".$DB_KODE."_kategori.id_kategori AND jenis='link' AND id_sidebar='$id_sidebar'");
$r=mysql_fetch_array($detaillink);


$web=$ns['isi_pengaturan'];
$title=$r['nama'];
$titlez=$r['nama'].' '.$r['isi2'].' '.$r['isi1'];
$keyw1 = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw2 = strtolower(preg_replace("/\s/",", web ",$titlez));
$keyw=$keyw1.' '.$keyw2;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$keywords=$keywords.', '.$titlez;
$isi='';
$desc='Data link '.$title.' kategori '.$r['nama_kategori'].' di '. $web.' tukar link ' ;
$description=desc($isi,$desc);
$judul='';
$title=titx($judul,$title);
$title='Tukar Link '.$title.' - '.$web;
echo "<title>$title</title>
<meta name='description' content='$description'>
<meta name='keywords' content='$keywords'> ";
}
}

function konten() {if (isset($_GET['id'])){$id_sidebar=ceknomor($_GET['id']);} if (isset($_POST['id'])){$id_sidebar=ceknomor($_POST['id']);}
global $DB_KODE, $ns;
?>

<div id="konten">
<div id="lebar">
<?php    
	$detaildata=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='4'");
	$dd=mysql_fetch_array($detaildata);
		if (isset($dd['isi_pengaturan']) > 0){
$detaillink=mysql_query("SELECT * FROM ".$DB_KODE."_sidebar, ".$DB_KODE."_kategori WHERE ".$DB_KODE."_sidebar.kategori=".$DB_KODE."_kategori.id_kategori AND id_sidebar='$id_sidebar'");
$r=mysql_fetch_array($detaillink);
$link="$r[isi1]";

		mysql_query("UPDATE ".$DB_KODE."_sidebar SET stat=stat+1 WHERE id_sidebar='$r[id_sidebar]'");
?>
	<script type="text/javascript" src="http://www.websnapr.com/js/websnapr.js"></script>
<form method="POST" action="cari-link.html" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol" style="margin-bottom: 20px" value="Cari">  <input type="button" class="tombol"  value="Kirim link" onclick="window.location.href='tambah-tukar-link.html';">
</form>	
<h3>Detail Link <a href=""><?php    echo "$ns[isi_pengaturan]";?></a></h3>
<table style="margin-top: 20px">
<tr><td width="130px">Judul</td><td width="5px">:</td><td><b><?php    echo $r['nama']?></b></td></tr>
<tr><td>Keterangan</td><td>:</td><td><b><?php    echo $r['isi2']?></b></td></tr>
<tr><td>Kategori</td><td>:</td><td><b><?php    echo $r['nama_kategori']?></b></td></tr>
<tr><td>Url</td><td>:</td><td><b><?php    echo $r['isi1']?></b></td></tr>


<form method="POST" target="_blank" action="weblink.html">
<input type="hidden" class="pencarian" name="id" value="<?php    echo $r['id_sidebar']?>">
<input type="hidden" class="pencarian" name="url" value="<?php    echo $link;?>">
			
<tr><td colspan="3"><input type="button" class="tombol" value="Kembali" onclick="self.history.back()"> <input type="submit" class="tombol"  value="Kunjungi" ></td></tr>
</form>
<tr><td colspan="3"><a target="_blank" href="http://<?php    echo $link;?>"><script type="text/javascript">wsr_snapshot('http://<?php    echo $link;?>', 'JFo8544j58VL', 'Size');</script></a></td></tr>

</table>
<?php     } ?>

<hr>

<div  style="float:left">
<div style="width: 200px; float: right"><ul>
<?php
$nok=1;
$kategori=mysql_query("SELECT * FROM ".$DB_KODE."_kategori WHERE fungsi='link' and sub=0 ORDER BY id_kategori");
$hitungkat=mysql_num_rows($kategori);
$tt=$hitungkat/2;
$tt2=ceil(($tt)+1);
while($k=mysql_fetch_array($kategori)){
$link=mysql_query("SELECT * FROM ".$DB_KODE."_sidebar, ".$DB_KODE."_kategori WHERE  ".$DB_KODE."_sidebar.kategori=".$DB_KODE."_kategori.id_kategori  AND  ".$DB_KODE."_sidebar.kategori=$k[id_kategori] AND ".$DB_KODE."_sidebar.jenis='link' AND ".$DB_KODE."_sidebar.status='1' ORDER BY ".$DB_KODE."_sidebar.id_sidebar ASC ");
$hitunglink=mysql_num_rows($link);
if ($nok==$tt2){echo "</ul></div><div style='width: 300px; float: right' ><ul>";}
						$judul=$k['nama_kategori'];							
						$judul = strtolower(preg_replace("/\s/","9a9z9",$judul));
						$judul = preg_replace('#\W#', '', $judul);								
						$judul = str_replace("9a9z9","-",$judul);
						$klink = "kategori-link-".$k['id_kategori']."-".$judul.".html";
?>

<br><li><a href="<?php echo "$klink";?>"><b><?php    echo "$k[nama_kategori]";?> </b></a>(<?php    echo "$hitunglink";?>)
<?php
$kategori2=mysql_query("SELECT * FROM ".$DB_KODE."_kategori WHERE fungsi='link' and sub=$k[id_kategori] ORDER BY id_kategori");
$hitungkat2=mysql_num_rows($kategori2);
	if ($hitungkat2>0){
		
?>
<ul>
<?php
	while($k2=mysql_fetch_array($kategori2)){
$link=mysql_query("SELECT * FROM ".$DB_KODE."_sidebar, ".$DB_KODE."_kategori WHERE   ".$DB_KODE."_sidebar.kategori=".$DB_KODE."_kategori.id_kategori  AND  ".$DB_KODE."_sidebar.kategori=$k2[id_kategori] AND ".$DB_KODE."_sidebar.jenis='link' AND ".$DB_KODE."_sidebar.status='1' ORDER BY ".$DB_KODE."_sidebar.id_sidebar ASC ");
$hitunglink2=mysql_num_rows($link);
		
							$judul=$k2['nama_kategori'];							
							$judul = strtolower(preg_replace("/\s/","9a9z9",$judul));
							$judul = preg_replace('#\W#', '', $judul);								
							$judul = str_replace("9a9z9","-",$judul);
							$klink2 = "kategori-link-".$k2['id_kategori']."-".$judul.".html";
	?>
	<li><a href="<?php echo "$klink2";?>"><b><?php    echo "$k2[nama_kategori]";?> </b></a>(<?php    echo "$hitunglink2";?>)
	<?php	
	}
?>
</ul>
<?php	
}
?>
</li>


<?php  $nok++;   } ?>
</ul></div>
</div>

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

