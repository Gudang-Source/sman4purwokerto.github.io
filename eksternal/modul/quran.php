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
$descx='al quran dan terjemahan indonesia  ';
$title='Quran Modul';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='modul pelajaran '.$titlez;
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
							$judul=$ns['isi_pengaturan'];
						    $judul = strtolower(preg_replace("/\s/","-",$judul));
?>
<div id="konten">
<div id="lebar" style="line-height:normal;">
<a href="al-quran-on-line-<?php echo  $judul;?>.html"><h3>Modul Al. Quran</h3></a>



<form method="POST" action="cari-al-quran-terjemahan.html" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol" style="margin-bottom: 20px" value="Cari">
</form>

		<div class="judulisikanan">
<a href="al-quran-on-line-<?php echo  $judul;?>.html"><img src="adminpanel/aplikasi/quran/logo.jpg" alt="al-quran-on-line-<?php echo  $judul;?>"></a>
		</div>
		<table class="garis" id="results">
			<tr><th class="garis" width="30">No</th>
				<th class="garis" colspan="2">Surat</th>
				<th class="garis" width="75">Jumlah Ayat</th>
			</tr>
			<?php 
			$no=1;
			$quran=mysql_query("SELECT * FROM ".$DB_KODE."_quran ORDER BY surano ASC ");
$hitungquran=mysql_num_rows($quran);

if($hitungquran > 0){			
			while($data=mysql_fetch_array($quran)){
									    $judul = strtolower(preg_replace("/\s/","9a9z9",$data['sura']));						
								$judul = preg_replace('#\W#', '', $judul);								
							$judul = str_replace("9a9z9","-",$judul);
							$url_link = "al-quran-surat-".$data['surano']."-".$judul.".html";

			?>
			<tr>
				<td class="garis" width="30"><?php echo $no;?></td>
				<td class="garis"><a href="<?php echo $url_link;?>" title="Baca Surat <?php echo $data['sura'];?>"><b><?php echo $data['sura']?></a></b></td>
				<td class="garis"><span style="font-size:20pt;font-family: 'Times New Roman', Times, serif;"><b><?php echo $data['sura_ar']?></b></span></td>
				<td class="garis"><?php echo $data['jml_ayat']?></td>
			</tr>
			<?php  $no++;} 
}else {
?>
<tr class="garis"><td colspan="5"><b>Data Al Quran belum ada</b></td></tr>
<?php
}			
			?>
			
		</table>

<div id="pageNavPosition"></div>
		
		
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 20); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>		
		
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

