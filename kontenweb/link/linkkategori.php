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
$title='Kategori link Website';
$descx=strtolower($title).' ';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='data '.$titlez;
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
<form method="POST" action="cari-link.html" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol" style="margin-bottom: 20px" value="Cari">  <input type="button" class="tombol"  value="Kirim link" onclick="window.location.href='tambah-tukar-link.html';">
</form>	
<h3>DIrektori Link <a href=""><?php    echo "$ns[isi_pengaturan]";?></a></h3>

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
<table class="garis" id="results">
<tr><th class="garis" width="20px">No</th><th class="garis">Kategori</th><th class="garis">Judul Link</th><th class="garis">Dilihat</th></tr>
<?php    
$no=1;
if (isset($_GET['id'])){$kat=ceknomor($_GET['id']);}else{$kat=1;}
$link=mysql_query("SELECT * FROM ".$DB_KODE."_sidebar, ".$DB_KODE."_kategori WHERE  ".$DB_KODE."_sidebar.kategori=".$DB_KODE."_kategori.id_kategori  AND  ".$DB_KODE."_sidebar.kategori=$kat  AND ".$DB_KODE."_sidebar.jenis='link' AND ".$DB_KODE."_sidebar.status='1' ORDER BY ".$DB_KODE."_sidebar.id_sidebar ASC");
$hitunglink=mysql_num_rows($link);
if($hitunglink > 0){
while($r=mysql_fetch_array($link)){
?>
<tr class="garis"><td class="garis"><?php    echo "$no";?></td>

	<td class="garis"><?php    echo "$r[nama_kategori]";?></td>	
	<?php    
	$detaildata=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='4'");
	$dd=mysql_fetch_array($detaildata);
		if (isset($dd['isi_pengaturan'])== 0){
	?>
	<td class="garis"><b><?php    echo "$r[nama]";?></b></td>
	<?php     }
	else { 

						$judul=$r['nama'];							
						$judul = strtolower(preg_replace("/\s/","9a9z9",$judul));
						$judul = preg_replace('#\W#', '', $judul);								
						$judul = str_replace("9a9z9","-",$judul);
						$url_link = "tukar-link-".$r['id_sidebar']."-".$judul.".html";
		
	?>
	
	<td class="garis"><a href="<?php    echo $url_link;?>" title="Klik untuk melihat detail data"><b><?php    echo "$r[nama]";?></b></a></td>
	<?php     } ?>
	<td class="garis"><?php    echo "$r[stat]";?></td>
</tr>
<?php     $no++; }}
else { ?>
<tr class="garis"><td colspan="4"><b>Data link belum ada</b></td></tr>
<?php     } ?>
</table>
				<div id="pageNavPosition"></div>
		
		
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 30); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
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