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

?>
<div class="kotakSidebar" style="padding-left:10px">
			<img src="file/tema/<?php echo $_SESSION['temaweb'];?>/css/img/polling.png">
			<?php    
			$pertanyaan=mysql_query("SELECT * FROM ".$DB_KODE."_sidebar WHERE jenis='polling' AND status='1' AND isi2='pertanyaan'");
			$tanya=mysql_fetch_array($pertanyaan);
 $xx=gett();
		
			
			echo "
			<table width='100%' style='padding: 0px 10px 10px 10px;margin-bottom: 20px;'><form method='POST' action='kontenweb/insert_polling.php?x=$xx'>
			<tr><td colspan='2'><b>$tanya[nama]</td></tr>
			";
			
			$polling=mysql_query("SELECT * FROM ".$DB_KODE."_sidebar WHERE jenis='polling' AND status='1' AND isi2!='pertanyaan'");
			while($pol=mysql_fetch_array($polling)){
										$judul=$ns['isi_pengaturan'];
						    $judul = strtolower(preg_replace("/\s/","-",$judul));
			?>
			<tr><td style="padding: 5px 0 5px 0;"><input type="radio" name="poll" id="poll" <?php     echo "value=$pol[id_sidebar]";?>></td><td style="padding: 5px 0 5px 0;"><?php    echo "$pol[nama]";?></td></tr>
			<?php     } ?>
			<tr><td colspan="2"><input type="submit" class="tombol" value="Poll">&nbsp;<input type="button" class="tombol" value="Hasil" onclick="window.location.href='survey-<?php   echo $judul;?>.html';"></td></tr>
			</form></table>
</div>

