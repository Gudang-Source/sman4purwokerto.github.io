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
global $DB_KODE, $ns;
		$modul=mysql_query("SELECT * FROM ".$DB_KODE."_modul WHERE folder_modul='quran'");		
		$md=mysql_fetch_array($modul);
		if	 ($md['status']==1){
$judul=$ns['isi_pengaturan'];
$judul = strtolower(preg_replace("/\s/","-",$judul));
?>
<div class="kotakSidebar" style="padding: 5px;width: auto;">
<a href="al-quran-on-line-<?php echo  $judul;?>.html"><img style="margin-bottom: 10px;" src="adminpanel/aplikasi/quran/logo.jpg" alt="al-quran-on-line-<?php echo  $judul;?>"></a>			
			
			
			<?php
			$quran_id=mysql_query("SELECT * FROM ".$DB_KODE."_quran_id ORDER BY RAND() LIMIT 0,1");
	
			$sr=mysql_fetch_array($quran_id);			
			
			$no_surat=$sr['surano'];
			if ($no_surat<10){
			$no_surat='00'.$no_surat;
			}elseif ($no_surat<100){
			$no_surat='0'.$no_surat;
			}elseif ($no_surat<1000){
			$no_surat=$no_surat;
			}
									    $judul = strtolower(preg_replace("/\s/","9a9z9",$sr['sura']));						
								$judul = preg_replace('#\W#', '', $judul);								
							$judul = str_replace("9a9z9","-",$judul);
							$url_link = "al-quran-surat-".$sr['surano']."-".$judul.".html";			
			?>		
			
			<p style="text-align:justify;">Quran Surat <a href="<?php echo $url_link;?>" title="Baca Selengkapnya Surat <?php echo $sr['sura']?>" ><b> <?php echo $sr['sura']?> </b></a> <?php echo $sr['surano']?> : <?php echo $sr['ayatno']?> </p>
			<p style="text-align:justify;"><b><?php echo $sr['ayat_id']?></b></p> Baca Surat &raquo; <a href="<?php echo $url_link;?>" title="Baca Selengkapnya Surat <?php echo $sr['sura']?>" ><b> <?php echo $sr['sura']?> &raquo;</b></a>
			<div id="quranPlayer" style="margin-bottom: 5px" >
			   <object type="application/x-shockwave-flash" data="eksternal/modul/audio/player.swf"  id="audioplayer1" height="24" width="220">
				  <param name="movie" value="eksternal/modul/audio/player.swf"/>
				  <param name="FlashVars" value="playerID=1&amp;bg=0xf8f8f8&amp;      leftbg=0xeeeeee&amp;lefticon=0x666666&amp;rightbg=0xEDF4CA&amp;                 rightbghover=0x9BA948&amp;righticon=0x798732&amp;righticonhover=0xFFFFFF&amp;   text=0x666666&amp;slider=0x666666&amp;track=0xFFFFFF&amp;border=0x666666&amp;   loader=0xEDF4CA&amp;soundFile=http://download.quranicaudio.com/quran/tawfeeq_bin_saeed-as-sawaaigh/<?php echo$no_surat;?>.mp3"/>
				  <param name="quality" value="high"/>
				  <param name="menu" value="false"/>
				  <param name="wmode" value="transparent"/>
			   </object>
			</div>
			

</div>	

<?php } //aktif ?>