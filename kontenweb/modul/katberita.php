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

global $DB_KODE, $ns, $nk;
$nama_kategori=mysql_query("SELECT * FROM ".$DB_KODE."_kategori WHERE id_kategori='$id'");
$nk=mysql_fetch_array($nama_kategori);
function meta() {
global $ns, $r, $nk;
$web=$ns['isi_pengaturan'];
$title=$nk['nama_kategori'];
$descx=strtolower($title).' ';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='berita '.$titlez;
$isi='';
$description=desc($isi,$descx);
$judul='';
$title=titx($judul,$title);
$title=$title.' - '.$web;
echo "<title>$title</title>
<meta name='description' content='$description'>
<meta name='keywords' content='$keywords'> ";
}

function konten() {if (isset($_GET['id'])){$id=ceknomor($_GET['id']);} if (isset($_POST['id'])){$id=ceknomor($_POST['id']);}
global $DB_KODE, $ns, $nk;
?>
<div id="konten">
<div id="lebar">
<?php    

$jml_berita_kat=mysql_query("SELECT * FROM ".$DB_KODE."_berita WHERE status_terbit='1' AND id_kategori='$id'");
$hitung_berita_kat=mysql_num_rows($jml_berita_kat);
?>
<h3>Ada <?php     echo $hitung_berita_kat?> berita dalam kategori <u><?php    echo $nk['nama_kategori']?></u></h3><br>

<?php    
$berita =mysql_query("SELECT * FROM ".$DB_KODE."_berita, ".$DB_KODE."_kategori, ".$DB_KODE."_users WHERE ".$DB_KODE."_berita.id_kategori=".$DB_KODE."_kategori.id_kategori AND ".$DB_KODE."_berita.s_username=".$DB_KODE."_users.s_username AND status_terbit='1' AND ".$DB_KODE."_berita.id_kategori='$id' ORDER BY id_berita DESC");
$cek_berita=mysql_num_rows($berita);

if($cek_berita > 0){
while ($r=mysql_fetch_array($berita)){
$hitung_komen=mysql_query("SELECT * FROM ".$DB_KODE."_komentar WHERE id_berita='$r[id_berita]'");
$jml_komen=mysql_num_rows($hitung_komen);
						    $judul = strtolower(preg_replace("/\s/","9a9z9",$r['judul_berita']));						
								$judul = preg_replace('#\W#', '', $judul);								
							$judul = str_replace("9a9z9","-",$judul);
							$url_link = "info-".$r['id_berita']."-".$judul.".html";
							$url_tgl = "info-tanggal-".$r['tanggal_posting'].".html";
							$url_kat = "info-kategori-".$r['id_kategori']."-".$r['nama_kategori'].".html";
							$url_penulis = "info-penulis-".$r['s_username'].".html";
?>
<?php     echo "<h4><a href='$url_link'>$r[judul_berita]</a></h4><br>
<small>Diposting pada: <a href='$url_tgl'>$r[tanggal_posting]</a>, oleh : <a href='$url_penulis'>$r[nama_lengkap_users]</a>, Kategori: <a href='$url_kat'>$r[nama_kategori]</a>
, Komentar : $jml_komen
</small><br>";
						$isi_berita = strip_tags($r['isi_berita']); 
						$isi = substr($isi_berita,0,450);
if ($r['gambar_kecil'] != 'no_image.jpg'){
echo "<p><img src='images/$r[gambar_kecil]' width='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='$url_link'>Baca selengkapnya...</a></p><br>";}
else {
echo "<p>$isi...<a href='$url_link'>Baca selengkapnya...</a></p><br>";
}}	
}
else { ?>
<b>Data berita dalam kategori <?php     echo $nk['nama_kategori']?> belum tersedia</b>
 <script language="javascript" type="text/javascript">
     <!--
     window.setTimeout('window.location="index.php"; ',10000);
     // -->
 </script>
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