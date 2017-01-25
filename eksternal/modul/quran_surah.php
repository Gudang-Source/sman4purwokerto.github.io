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
			if (isset($_GET['id'])){
			$id=ceknomor($_GET['id']);	
			}else{
			$id=1;
			}
			//$quran_id=mysql_query("SELECT * FROM ".$DB_KODE."_quran_id, ".$DB_KODE."_quran_ar, ".$DB_KODE."_quran WHERE ".$DB_KODE."_quran_id.surano=".$DB_KODE."_quran_ar.surano AND ".$DB_KODE."_quran_id.surano=".$DB_KODE."_quran.surano AND ".$DB_KODE."_quran_id.surano='$id'");

			$quran=mysql_query("SELECT * FROM ".$DB_KODE."_quran WHERE surano='$id'");
			$sr=mysql_fetch_array($quran);

function meta() {
global $ns, $r, $sr, $id;
$web=$ns['isi_pengaturan'];
$descx=$sr['sura'].' al quran on line surat '.$sr['sura'].' ';
$title='Surat '.$sr['sura'].' - AL Quran ';
$titlez=$descx;
$keyw = strtolower(preg_replace("/\s/",", $sr[sura] ",$titlez));	
$keyw=$keyw;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$keywords=$sr['sura'].', '.$keywords;
$descx='makna surat '.$sr['sura'].' terjemahan dan tafsir '.$titlez;
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
<a href="al-quran-on-line-<?php echo  $judul;?>.html"><h3>Modul Al. Quran</h3></a>
<div style="float:right">
<a href="al-quran-on-line-<?php echo  $judul;?>.html"><img src="adminpanel/aplikasi/quran/logo.jpg" alt="al-quran-on-line-<?php echo  $judul;?>"></a>
</div>
<div class="atastabel" style="float:left;text-align:left">

			<form method="POST" action="cari-al-quran-terjemahan.html" >
			<input type="text" class="cari" name="cari"><input type="submit" class="tombol" style="margin-bottom: -5px" value="Cari">
			</form>
			<?php
			$no_surat=$sr['surano'];
			if ($no_surat<10){
			$no_surat='00'.$no_surat;
			}elseif ($no_surat<100){
			$no_surat='0'.$no_surat;
			}elseif ($no_surat<1000){
			$no_surat=$no_surat;
			}
			?>		
			<div id="quranPlayer" style="margin-bottom: 5px" >
			   <object type="application/x-shockwave-flash" data="eksternal/modul/audio/player.swf"  id="audioplayer1" height="24" width="290">
				  <param name="movie" value="eksternal/modul/audio/player.swf"/>
				  <param name="FlashVars" value="playerID=1&amp;bg=0xf8f8f8&amp;      leftbg=0xeeeeee&amp;lefticon=0x666666&amp;rightbg=0xEDF4CA&amp;                 rightbghover=0x9BA948&amp;righticon=0x798732&amp;righticonhover=0xFFFFFF&amp;   text=0x666666&amp;slider=0x666666&amp;track=0xFFFFFF&amp;border=0x666666&amp;   loader=0xEDF4CA&amp;soundFile=http://download.quranicaudio.com/quran/tawfeeq_bin_saeed-as-sawaaigh/<?php echo$no_surat;?>.mp3"/>
				  <param name="quality" value="high"/>
				  <param name="menu" value="false"/>
				  <param name="wmode" value="transparent"/>
			   </object>
			</div>
		
</div>


		<table class="garis" id="results">
		
			<tr>
			<th class="garis"><b><?php echo $sr['surano']?></b></th>
			<th class="garis"><b><?php echo $sr['sura']?></b></th>
			<th class="garis"><b><span style="font-size:20pt;font-family: 'Times New Roman', Times, serif;"><b><?php echo $sr['sura_ar']?></b></span></b></th>

			</tr>
			<tr>
			<td class="garis" colspan="3">

			
			</td>

			</tr>			
			<?php 


			$no=1;
			$quran_id=mysql_query("SELECT * FROM ".$DB_KODE."_quran_id WHERE surano='$id'");

			$hitungquran=mysql_num_rows($quran_id);
		
if($hitungquran > 0){			
			while($data_id=mysql_fetch_array($quran_id)){
			$quran_ar=mysql_query("SELECT * FROM ".$DB_KODE."_quran_ar WHERE ayatno='$data_id[ayatno]' AND surano='$id'");
$data_ar=mysql_fetch_array($quran_ar);
			?>

			<tr>
			<td class="garis" colspan="3">
			<span style="font-size:25pt;float:right;text-align:right;font-family: 'Times New Roman', Times, serif;"><b><?php echo $data_ar['ayat_ar']?></b></span><div style="clear: both;padding: 5px;"></div>
			<p style="text-align:justify;"><b><?php echo $data_id['ayat_id']?></b></p></td>

			</tr>
			<?php  $no++; } 
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


/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

