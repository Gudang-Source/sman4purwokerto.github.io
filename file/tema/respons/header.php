<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>


<div id="inner-header" class="clearfix"  <?php  echo $back;?> >    
	<div id="kiri">
				<?php    
				$logo=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='13'");
				$l=mysql_fetch_array($logo);
				
				echo "<a href='index.php' title='Halaman Depan'><img src='images/$l[isi_pengaturan]'  id=logo_web' style='width:10%;float:left; margin-right:10pt;' alt='Logo sekolah'></a>";
				?>

	
					<?php    
				$alamatsekolah=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='12'");
				$a=mysql_fetch_array($alamatsekolah);
				
				$telp=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='9'");
				$te=mysql_fetch_array($telp);
				?>
				<a href="index.php" title="Kembali ke halaman utama"><h1 id="nama_web"><b><?php    echo "$ns[isi_pengaturan]";?></b></h1></a>
				<span id="alamat"><?php    echo "$a[isi_pengaturan] | Telp: $te[isi_pengaturan]";?></span>
	</div>
</div> 


<nav role="navigation" class="nav clearfix">
<ul class="tabs-top">
<li style="background:#0066FF" ><a class="icon-tag"href="berita-<?php   echo $judul;?>.html"><span class="mobile-tabs">Berita</span></a></li>
<li style="background:#DC4A38"  ><a class="icon-heart"href="agenda-<?php   echo $judul;?>.html"><span class="mobile-tabs">Agenda</span></a></li>
<li style="background:#3B5998" ><a class="icon-star" href="pengumuman-<?php   echo $judul;?>.html"><span class="mobile-tabs">Pengumuman</span></a></li>

</ul> 
</nav>



</div>
<?php 
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>			
			
