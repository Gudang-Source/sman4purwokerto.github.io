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
<div class="kotakSidebar" >
			<img src="file/tema/<?php echo $_SESSION['temaweb'];?>/css/img/kat.png">
					<ul style="padding-left:40px">
					<?php    
					$kategori_berita=mysql_query("SELECT * FROM ".$DB_KODE."_kategori ORDER BY id_kategori ASC");
					$hitungkategori=mysql_num_rows($kategori_berita);
					
					if($hitungkategori > 0){
					while($k=mysql_fetch_array($kategori_berita)){
                                            
						$jumlah_berita=mysql_query("SELECT * FROM ".$DB_KODE."_berita WHERE status_terbit='1' AND id_kategori='$k[id_kategori]'");
						$jml_ber=mysql_num_rows($jumlah_berita);					
							$url_kat = "info-kategori-".$k['id_kategori']."-".$k['nama_kategori'].".html";
                                             if($jml_ber>0){           
					?>
						<li><a href="<?php    echo $url_kat;?>"><?php    echo "<b>$k[nama_kategori]</b>";?>
						<?php    

						echo "($jml_ber)";
						?>
						</a></li>
					<?php    } }}

					else {?>
					<li><a href=""><b>Data katgeori belum ada</b></a></li>
					<?php     } ?>
					</ul>
			

</div>	

