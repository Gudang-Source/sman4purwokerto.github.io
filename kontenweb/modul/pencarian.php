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
$descx='cari berita ';
$title='Cari Berita';
$titlez='pencarian berita '.$web;
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
if (isset($_POST['cari'])){			
			$cari = trim($_POST['cari']);
}else{$cari ='';}

$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$cari = anti_injection($cari);		
$cari =ceking($cari);
?>
<div id="konten">
<div id="lebar">
<h3>Hasil Pencarian dengan kata kunci <a href="">"<?php    echo "$cari"?>"</a></h3><br><br>
<?php    
$pencarian =mysql_query("SELECT * FROM ".$DB_KODE."_berita, ".$DB_KODE."_kategori, ".$DB_KODE."_users WHERE ".$DB_KODE."_berita.id_kategori=".$DB_KODE."_kategori.id_kategori AND ".$DB_KODE."_berita.s_username=".$DB_KODE."_users.s_username AND status_terbit='1' AND match(".$DB_KODE."_berita.judul_berita,".$DB_KODE."_berita.isi_berita) against ('$cari' IN BOOLEAN MODE) ORDER BY id_berita DESC");
$hitung=mysql_num_rows($pencarian);

if ($hitung > 0){
while ($r=mysql_fetch_array($pencarian)){
$hitung_komen=mysql_query("SELECT * FROM ".$DB_KODE."_komentar WHERE id_berita='$r[id_berita]'");
$jml_komen=mysql_num_rows($hitung_komen);
							$judul = strtolower(preg_replace("/\s/","9a9z9",$r['judul_berita']));						
								$judul = preg_replace('#\W#', '', $judul);								
							$judul = str_replace("9a9z9","-",$judul);
							$url_link = "info-".$r['id_berita']."-".$judul.".html";
?>
<?php     echo "<h4><a href='$url_link'>$r[judul_berita]</a></h4><br>
<small>Diposting pada: <a href='index.php?p=tglberita&tgl=$r[tanggal_posting]'>$r[tanggal_posting]</a>, oleh : <a href='index.php?p=userberita&user=$r[s_username]'>$r[nama_lengkap_users]</a>, Kategori: <a href='index.php?p=katberita&id=$r[id_kategori]'>$r[nama_kategori]</a>
, Komentar : $jml_komen
</small><br>";
						$isi_berita = strip_tags($r['isi_berita']); 
						$isi = substr($isi_berita,0,450);
if ($r['gambar_kecil'] != 'no_image.jpg'){
echo "<p><img src='images/$r[gambar_kecil]' width='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='$url_link'>Baca selengkapnya...</a></p><br>";}
else {
echo "<p>$isi...<a href='$url_link'>Baca selengkapnya...</a></p><br>";
}}}

else {
echo "<p>Berita tidak ditemukan</p>";
}?>
</div>
</div>

<?php    } ?>

<?php    
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>