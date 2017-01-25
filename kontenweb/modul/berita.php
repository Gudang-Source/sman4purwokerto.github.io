<?php    
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
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
$descx='berita ';
$title='Berita';
$titlez='berita '.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='info '.$titlez;
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
<div id="lebar"  style="text-align:justify">
<h3>Berita Terbaru</h3>

<?php    	$batas= 5;

		
		if (isset($_GET['halaman'])){
		$halaman=ceknomor($_GET['halaman']);		
		}
		
		
		If (empty($halaman)){
		$posisi=0;
		$halaman=1;
		}

		else { $posisi=($halaman-1) * $batas;
		}
		$tampil2 = mysql_query ("SELECT * FROM ".$DB_KODE."_berita WHERE status_terbit='1'");
		$jmldata = mysql_num_rows($tampil2);
		$jmlhal = ceil($jmldata/$batas);
$berita =mysql_query("SELECT * FROM ".$DB_KODE."_berita, ".$DB_KODE."_kategori, ".$DB_KODE."_users WHERE ".$DB_KODE."_berita.id_kategori=".$DB_KODE."_kategori.id_kategori AND ".$DB_KODE."_berita.s_username=".$DB_KODE."_users.s_username AND status_terbit='1' ORDER BY id_berita DESC LIMIT $posisi, $batas");
$cek_berita=mysql_num_rows($berita);

if($cek_berita > 0){
while ($r=mysql_fetch_array($berita)){
$idberita=$r['id_berita'];
$hitung_komen=mysql_query("SELECT * FROM ".$DB_KODE."_komentar WHERE id_berita='$idberita'");
$jml_komen=mysql_num_rows($hitung_komen);
						    $judul = strtolower(preg_replace("/\s/","9a9z9",$r['judul_berita']));						
								$judul = preg_replace('#\W#', '', $judul);								
							$judul = str_replace("9a9z9","-",$judul);
							$url_link = "info-".$r['id_berita']."-".$judul.".html";
							$url_tgl = "info-tanggal-".$r['tanggal_posting'].".html";
							$url_kat = "info-kategori-".$r['id_kategori']."-".$r['nama_kategori'].".html";
							$url_penulis = "info-penulis-".$r['s_username'].".html";
?>
<?php     echo "<h4><a href='$url_link' title='Baca Selengkapnya $r[judul_berita]'>$r[judul_berita]</a></h4><br>
<small>Diposting pada: <a href='$url_tgl'>$r[tanggal_posting]</a>, oleh : <a href='$url_penulis'>$r[nama_lengkap_users]</a>, Kategori: <a href='$url_kat'>$r[nama_kategori]</a>
, Komentar : $jml_komen
</small><br>";
						$isi_berita = strip_tags($r['isi_berita']); 
						$isi = substr($isi_berita,0,450);
if ($r['gambar_kecil'] != 'no_image.jpg'){
echo "<p><a href='$url_link' title='Baca Selengkapnya $r[judul_berita]'><img src='images/$r[gambar_kecil]' width='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'></a>$isi...<br><a href='$url_link' title='Baca Selengkapnya $r[judul_berita]'>Baca selengkapnya...</a></p><br>";}
else {
echo "<p>$isi...<br><a href='$url_link' title='Baca Selengkapnya $r[judul_berita]'>Baca selengkapnya...</a></p><br>";
}}

echo "<br><hr>";
		if ($halaman > 1){
		$prev=$halaman-1;
		echo 	"	<div class='hal' style='float: left'><a href='halaman-$prev-berita.html' title='Halaman Sebelumnya'>&laquo; Sebelumnya</a></div>";
		}
		if ($halaman < $jmlhal) {
		$next=$halaman+1;
		echo "	<div class='hal' style='float: right'><a href='halaman-$next-berita.html' title='halaman Berikutnya'>Berikutnya &raquo;</a></div>"; }
}
else { ?>
<b>Data berita belum tersedia</b>
<?php     } ?>
</div>
</div>
<?php     } ?>

<?php    
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

