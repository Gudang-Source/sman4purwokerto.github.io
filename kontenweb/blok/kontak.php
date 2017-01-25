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
<div class="kotakSidebar">
			
			
			<img src="file/tema/<?php echo $_SESSION['temaweb'];?>/css/img/ym.png">
			<table width="100%" style="padding: 0px 10px 10px 10px;margin-bottom: 20px;">
			<?php    
			$ym=mysql_query("SELECT * FROM ".$DB_KODE."_sidebar WHERE jenis='ym' AND status='1'");
			while($y=mysql_fetch_array($ym)){ ?>
			<tr><td>
			<a href="ymsgr:sendIM?<?php    echo $y['isi1'];?>"><img src="http://opi.yahoo.com/online?u=<?php    echo $y[isi1]?>&m=g&t=1" alt="YM" border="0" /></a> 
			</td><td>
			<b><?php    echo $y['nama']?></b>
			</td></tr>
			<?php     } ?>
			</table>
	

</div>	

