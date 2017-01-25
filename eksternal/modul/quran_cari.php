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
$descx='elearning cari ';
$title='Elearning Cari';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='cari modul pelajaran '.$titlez;
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

global $DB_KODE, $ns, $id, $sr;
							$judul=$ns['isi_pengaturan'];
						    $judul = strtolower(preg_replace("/\s/","-",$judul));
?>
<div id="konten">
<div id="lebar"  style="line-height:normal;">
<a href="al-quran-on-line-<?php echo  $judul;?>.html"><h3>Pencarian isi Al. Quran</h3></a>
<form method="POST" action="cari-al-quran-terjemahan.html" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol" style="margin-bottom: 20px" value="Cari">
</form>
		<div class="judulisikanan">
<a href="al-quran-on-line-<?php echo  $judul;?>.html"><img src="adminpanel/aplikasi/quran/logo.jpg" alt="al-quran-on-line-<?php echo  $judul;?>"></a>
		</div>
		<table class="garis" id="results">

			<?php 
if (isset($_POST['cari'])){			
			$cari = trim($_POST['cari']);
			$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
?>
			<tr>
			<th class="garis" colspan='3'><p style="text-align:left;"><b>Anda mencari : <?php echo $cari?></b></p></th>

			</tr>
<?php
if ($cari==''){

?>
<tr class="garis"><td colspan="3"><b>Silahkan cari isi Al Quran berdasarkan isi terjemahan.</b></td></tr>
<?php
}else{
			$no=1;
			$quran_id=mysql_query("SELECT * FROM ".$DB_KODE."_quran_id WHERE ayat_id LIKE '%$cari%'");

			$hitungquran=mysql_num_rows($quran_id);
		
if($hitungquran > 0){			
			while($data_id=mysql_fetch_array($quran_id)){
						$quran=mysql_query("SELECT * FROM ".$DB_KODE."_quran WHERE surano='$data_id[surano]'");
			$sr=mysql_fetch_array($quran);
			$quran_ar=mysql_query("SELECT * FROM ".$DB_KODE."_quran_ar WHERE ayatno='$data_id[ayatno]'  AND surano='$data_id[surano]'");
$data_ar=mysql_fetch_array($quran_ar);
									    $judul = strtolower(preg_replace("/\s/","9a9z9",$sr['sura']));						
								$judul = preg_replace('#\W#', '', $judul);								
							$judul = str_replace("9a9z9","-",$judul);
							$url_link = "al-quran-surat-".$sr['surano']."-".$judul.".html";
			?>
			<tr>
			<th class="garis"><b><?php echo $sr['surano']?></b></th>
			<th class="garis"><a href="<?php echo $url_link;?>" title="Baca lengkap <?php echo $sr['sura']?>"><b><?php echo $sr['sura']?></b></a></th>
			<th class="garis"><b><span style="font-size:20pt;font-family: 'Times New Roman', Times, serif;"><b><?php echo $sr['sura_ar']?></b></span></b></th>

			</tr>
			<tr>
					
			<td class="garis" colspan="3">
						<span style="font-size:25pt;float:right;text-align:right;font-family: 'Times New Roman', Times, serif;"><b><?php echo $data_ar['ayat_ar']?></b></span><div style="clear: both;padding: 5px;"></div>
			<p style="text-align:justify;"><b><?php echo $data_id['ayat_id']?></b></p></td>

			</tr>
			<?php  $no++; } 

			
	}else{
?>
<tr class="garis"><td colspan="3"><b>Silahkan cari isi Al Quran berdasarkan isi terjemahan.</b></td></tr>
<?php
}	
}
}else {
?>
<tr class="garis"><td colspan="3"><b>Data Al Quran belum ada</b></td></tr>
<?php
}			
			?>
			
		</table>

<div id="pageNavPosition"></div>
		
		
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 10); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>		
		
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

