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
<meta name='keywords' content='$keywords'> ";
}

function konten() {
global $DB_KODE, $ns;
?>
<div id="konten">
<div id="lebar">
<h3>Album Galeri <a href=""><?php    echo "$ns[isi_pengaturan]";?></a></h3>
<?php    
$album=mysql_query("SELECT * FROM ".$DB_KODE."_album ORDER BY id_album DESC");
$cek_album=mysql_num_rows($album);
if($cek_album > 0){
while($r=mysql_fetch_array($album)){

$jmlfoto=mysql_query("SELECT * FROM ".$DB_KODE."_galeri WHERE id_album='$r[id_album]'");
$hitung=mysql_num_rows($jmlfoto);

if($hitung > 0 ){
							$judul = strtolower(preg_replace("/\s/","-",$r['nama_album']));
							$url_link = "album-foto-".$r['id_album']."-".$judul.".html";
?>
<div class="albumgaleri">
<p class="thumb"><a href="<?php    echo $url_link;?>"><img src="images/foto/galeri/album/<?php    echo "$r[foto_album]";?>" width="200px"></a></p><br>
<p><?php    echo "<b>$r[nama_album]</b>";?><br>
<?php     echo "<small>$r[tanggal_album]</small>";?><br>
<?php    
echo "Jumlah Foto ($hitung)";
?></p>
</div>
<?php     } } }

else { ?>
<b>Data album galeri belum tersedia</b>
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
