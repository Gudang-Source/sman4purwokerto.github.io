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
<div id="lebar">
<h3>Daftar isi</h3>

<?php    	$batas= 30;
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
<?php     echo "<li>$r[tanggal_posting] | <a href='$url_link' title='Baca Selengkapnya $r[judul_berita]'><b>$r[judul_berita]</b></a></li>";
}
echo "<br><hr>";
		if ($halaman > 1){
		$prev=$halaman-1;
		echo 	"	<div class='hal' style='float: left'><a href='halaman-$prev-daftar-isi.html' title='Halaman Sebelumnya'>&laquo; Sebelumnya</a></div>";
		}
		if ($halaman < $jmlhal) {
		$next=$halaman+1;
		echo "	<div class='hal' style='float: right'><a href='halaman-$next-daftar-isi.html' title='halaman Berikutnya'>Berikutnya &raquo;</a></div>"; }

}else { ?>
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

