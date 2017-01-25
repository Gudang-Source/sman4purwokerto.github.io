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
if (isset($_GET['id'])){$id=ceknomor($_GET['id']);} if (isset($_POST['id'])){$id=ceknomor($_POST['id']);}
function meta() {
global $ns, $r;
$web=$ns['isi_pengaturan'];
$title='Foto Kegiatan';
$descx=strtolower($title).' ';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='Album '.$titlez;
$isi='';
$description=desc($isi,$descx);
$judul='';
$title=titx($judul,$title);
$title=$title.' - '.$web;
echo "<title>$title</title>
<meta name='description' content='$description'>
<meta name='keywords' content='$keywords'>
		
";
?>

<?php
}


function konten() {
if (isset($_GET['id'])){$id=ceknomor($_GET['id']);} if (isset($_POST['id'])){$id=ceknomor($_POST['id']);}
global $DB_KODE, $ns;
?>
<div id="konten">
<div id="lebar">
<?php    
$nama_album=mysql_query("SELECT * FROM ".$DB_KODE."_album WHERE id_album='$id'");
$tampilnama=mysql_fetch_array($nama_album);

$jmlfoto=mysql_query("SELECT * FROM ".$DB_KODE."_galeri WHERE id_album='$id'");
$hitung=mysql_num_rows($jmlfoto);
if ($hitung != 0){
?>
<h3>Foto Album <a href="">"&nbsp;<?php    echo "$tampilnama[nama_album]";?>&nbsp;"</a></h3>
<small><?php    echo "$tampilnama[tanggal_album]";?></small>
<p><?php    echo "$tampilnama[deskripsi_album]";?></p>

	<script type="text/javascript" src="adminpanel/js/slimbox2.js"></script>
	<link rel="stylesheet" href="adminpanel/css/slimbox2.css" type="text/css" media="screen" />
<div class="xgaleriDepan">
<ul class="gallery clearfix">    
<?php    
$galeri=mysql_query("SELECT * FROM ".$DB_KODE."_galeri WHERE id_album='$id'");
while ($r=mysql_fetch_array($galeri)){
?>
<li  style="height: 230px;width:200px;list-style: none;float: left;margin-right: 10px; margin-bottom: 10px;">
 <center>   <hr>
   <p class="thumb"><a id="thumb1" href="images/foto/galeri/<?php    echo "$r[nama_galeri]";?>" title="<?php    echo $r['judul'];?> | <?php    echo $r['deskripsi'];?>" class="highslide" onclick="return hs.expand(this)">

    <img style=""   src="images/foto/galeri/<?php    echo "$r[nama_galeri]";?>" alt="<?php    echo $r['judul'];?> "  title="Klik untuk memperbesar <?php    echo $r['judul'];?> | <?php    echo $r['deskripsi'];?>" width="150px"/></a>
<br><b><?php    echo $r['judul'];?> </b><br> <?php    echo $r['deskripsi'];?>	</p></center>	
</li><?php    } ?>
</ul>

</div>
<?php     }

else { ?>
<h3>Tidak ada foto dalam album "&nbsp;<?php    echo "$tampilnama[nama_album]";?>&nbsp;"</h3>
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
