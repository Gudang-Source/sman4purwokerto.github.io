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
			
			
			
			<a href="data-link-.html" title="Lihat Diretori Link"><img src="file/tema/<?php echo $_SESSION['temaweb'];?>/css/img/link.png"></a>
			<ul style="padding: 0px 10px 10px 30px; list-style: circle; margin: 0 0 20px 0;">
			<?php    
			$link=mysql_query("SELECT * FROM ".$DB_KODE."_sidebar WHERE jenis='link' AND status='1' ORDER BY RAND() limit 3");
			while($l=mysql_fetch_array($link)){ ?>
				<li style="padding: 2px 0 2px 0;"><a href="http://<?php    echo "$l[isi1]";?>" target="_blank"><?php    echo "$l[nama]";?></a></li>
			<?php     } ?>
                        <li style="padding: 2px 0 2px 0;"><a href="data-link-.html" title="Lihat Diretori Link">Link Lainnya</a> | <a href="tambah-tukar-link.html" title="Pendaftaran Link">Tukar Link</a></li>
			</ul>
			

</div>	

