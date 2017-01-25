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


global $DB_KODE, $ns;
$idx=ceknomor($_GET['id']);
$pencarian =mysql_query("SELECT * FROM ".$DB_KODE."_berita, ".$DB_KODE."_kategori, ".$DB_KODE."_users WHERE ".$DB_KODE."_berita.id_kategori=".$DB_KODE."_kategori.id_kategori AND ".$DB_KODE."_berita.s_username=".$DB_KODE."_users.s_username AND status_terbit='1' AND id_berita='$idx' ORDER BY id_berita DESC");
$r=mysql_fetch_array($pencarian);

function meta() {
global $ns, $r;
$web=$ns['isi_pengaturan'];
$title=$r['judul_berita'];
$titlez=$r['judul_berita'];
$keyw1 = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw2 = strtolower(preg_replace("/\s/",", berita ",$titlez));
$keyw=$keyw1.' '.$keyw2;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$isi='';
$desc='info '.$title.' '.$r['isi_berita'];
$description=desc($isi,$desc);
$judul='';
$title=titx($judul,$title);
$title=$title.' - Berita '.$web;
echo "<title>$title</title>
<meta name='description' content='$description'>
<meta name='keywords' content='$keywords'> ";
?>

<script type="text/javascript">var switchTo5x=true;</script>

<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-a497c7d0-f64f-e6a5-691-7ca9113f476a", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

<?php    
}

function konten() {
global $DB_KODE, $ns,$r;

?>
<?php    

?>
<div id="konten">
<div id="lebar" style="text-align:justify">
<h3><?php    echo "$r[judul_berita]";?> </h3>
<?php    
							$judul = strtolower(preg_replace("/\s/","9a9z9",$r['judul_berita']));						
								$judul = preg_replace('#\W#', '', $judul);								
							$judul = str_replace("9a9z9","-",$judul);
							$url_link = "info-".$r['id_berita']."-".$judul.".html";
							$url_tgl = "info-tanggal-".$r['tanggal_posting'].".html";
							$url_kat = "info-kategori-".$r['id_kategori']."-".$r['nama_kategori'].".html";
							$url_penulis = "info-penulis-".$r['s_username'].".html";

?>
<?php     echo "
<small>Diposting pada: <a href='$url_tgl'>$r[tanggal_posting]</a>, oleh : <a href='$url_penulis'>$r[nama_lengkap_users]</a>, Kategori: <a href='$url_kat'>$r[nama_kategori]</a></small><br>";
if ($r['gambar_kecil'] != 'no_image.jpg'){
echo "<p><img src='images/$r[gambar_kecil]' width='50%' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'>$r[isi_berita]</p><br>";
}else{
echo "<p>$r[isi_berita]</p><br>";
}
global $l, $ns;
$logo=$l['isi_pengaturan'];
$sklh=$ns['isi_pengaturan'];
$jdlb=$r['judul_berita'];
?>
<script>var pfHeaderImgUrl = 'images/<?php echo $logo; ?>';var pfHeaderTagline = '<?php echo $sklh; ?>';var pfdisableClickToDel = 0;var pfHideImages = 1;var pfDisablePDF = 0;var pfDisableEmail = 0;var pfDisablePrint = 0;var pfCustomCSS = '';var pfBtVersion='1';(function(){var js, pf;pf = document.createElement('script');pf.type = 'text/javascript';if('https:' == document.location.protocol){js='https://pf-cdn.printfriendly.com/ssl/main.js'}else{js='http://cdn.printfriendly.com/printfriendly.js'}pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)})();</script><a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onclick="window.print();return false;" title="Print Berita ini : <?php  echo $jdlb; ?>"><img style="border:none;margin:0 6px"  src="images/pf-print-icon.gif" width="16" height="15" alt="Print Berita" />Print <img style="border:none;margin:0 6px"  src="images/pf-pdf-icon.gif" width="12" height="12" alt="PDF" />PDF</a>
<h3>Berita Lainnya</h3>
<ul style="list-style: none; padding-left: 20px;">
<?php    

$beritaterkait=mysql_query("SELECT * FROM ".$DB_KODE."_berita WHERE id_berita!='$r[id_berita]' AND status_terbit='1' ORDER BY RAND() LIMIT 5");
while($bt=mysql_fetch_array($beritaterkait)){
							$judul = strtolower(preg_replace("/\s/","9a9z9",$bt['judul_berita']));						
								$judul = preg_replace('#\W#', '', $judul);								
							$judul = str_replace("9a9z9","-",$judul);
							$url_link = "info-".$bt['id_berita']."-".$judul.".html";
							$url_tgl = "info-tanggal-".$bt['tanggal_posting'].".html";
							$url_kat = "info-kategori-".$bt['id_kategori']."-".$r['nama_kategori'].".html";
							$url_penulis = "info-penulis-".$bt['s_username'].".html";
?>
	<li style="padding: 5px 0 5px 0;"><a href="<?php    echo $url_link;?>"><?php    echo $bt['judul_berita'];?></a></li>
<?php   
  } 
?>
</ul>
<span class='st_fblike_vcount' displayText='Facebook Like'></span>
<span class='st_plusone_vcount' displayText='Google +1'></span>
<span class='st_facebook_vcount' displayText='Facebook'></span>
<span class='st_googleplus_vcount' displayText='Google +'></span>
<span class='st_twitter_vcount' displayText='Tweet'></span>
<span class='st_blogger_vcount' displayText='Blogger'></span>
<span class='st_wordpress_vcount' displayText='WordPress'></span>
<span class='st_sharethis_vcount' displayText='ShareThis'></span>
<br><br>
<?php    
if (isset($r['status_komentar']) == 1){

$xx=gett();

?>
<h3>Tinggalkan Komentar</h3>
<br>
<form method="POST" action="kontenweb/insert_komentar.php?x=<?php echo $xx;?>&t=berita" id="formkomentar" name="formkomentar">
<?php     echo "<input type='hidden' name='id' value='$r[id_berita]'>";?>
<table>
<?php if(isset($_COOKIE["userformulasi"])){		?>					
	<tr><td width="75px"><b>Nama </b></td><td><input type="hidden" name="nama" class="sedang" value="<?php echo $_COOKIE["userformulasi"];?>"><?php echo $_COOKIE["userformulasi"];?></td></tr>
<?php     }else{ ?>							
	<tr><td width="75px"><b>Nama *</b></td><td><input type="text" name="nama" class="sedang" value=""></td></tr>
<?php    } ?>
<?php if(isset($_COOKIE["usermail"])<>''){		?>
<input type="hidden" name="email" value="<?php echo $_COOKIE["usermail"];?>" class="sedang">
<?php     }else{ ?>
	<tr><td><b>Email *</b></td><td><input type="text" name="email" class="sedang">&nbsp;<small><i>Tidak akan diterbitkan</i></small></td></tr>
<?php     }  ?>
<?php if(isset($_COOKIE["userurl"])<>''){		?>
<input type="hidden" name="url" class="sedang" value="<?php echo $_COOKIE["userurl"];?>">
<?php     }else{ ?>
	<tr><td><b>Url </b></td><td><input type="text" name="url" class="sedang">&nbsp;<small><i>masukkan tanpa Http:// contoh :<b>www.m-edukasi.web.id</b></b></i></small></td></tr>
<?php     }  ?>

	<tr><td><b>Komentar *</b></td><td>
	<textarea name="komentar" style="width: 200px; height: 75px;"></textarea>
	</td></tr>
	<tr><td></td><td><img src="kontenweb/captcha-pesan.php?date=<?php    echo date('YmdHis');?>" alt="security image" /></td></tr>
	<tr><td></td><td><input type="text" name="kode" class="pendek">&nbsp;<small><i>Masukkan kode diatas</i></td></tr>
	<tr><td></td><td><input type="submit" class="tombol" value="Kirim">&nbsp;<input type="reset" class="tombol" value="Reset"></td></tr>
</table>
</form>
<?php     include "kontenweb/tema/form_komentar.php";?>

<?php    
$hitung_komentar_ini=mysql_query("SELECT * FROM ".$DB_KODE."_komentar WHERE status_terima='1' AND id_berita='$r[id_berita]'");
$jml_komentar_ini=mysql_num_rows($hitung_komentar_ini); ?>
<br>
<h3>Ada <?php     echo $jml_komentar_ini?> komentar untuk berita ini</h3>
<ul style="list-style: none; padding-left: 5px;">
	<?php     $komentar=mysql_query("SELECT * FROM ".$DB_KODE."_komentar WHERE status_terima='1' AND id_berita='$r[id_berita]' ORDER BY id_komentar DESC");
			while($k=mysql_fetch_array($komentar)){ ?>
	<li style="padding: 5px 0 5px 0; border-bottom: 1px solid #dcdcdc">
	<p><b><?php    echo "<a href='$k[url]'>$k[nama_komentar]</a>";?></b><br><small><?php    echo "$k[tanggal_komentar]";?></small></p>
	<p><?php    echo "$k[isi_komentar]"?></p>
	<?php     } ?>
	</li>
		
</ul>
<?php     } ?>
</div>
<center><a href='http://www.formulasi.or.id' target='_blank' title='Forum Multimedia Edukasi  www.formulasi.or.id'><img src='http://feeds.feedburner.com/Formulasi.1.gif'  title='Forum Multimedia Edukasi  www.formulasi.or.id' alt='Forum Multimedia Edukasi  www.formulasi.or.id' style='border:0'></a></center>
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
