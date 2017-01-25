<?php  
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
   
		$home=1;
function konten() {		
?>

<?php 
include "konfigurasi/koneksi.php";			

		?>

	
		<div id="konten">
			<div id="lebar">
			<?php    

			$modul=mysql_query("SELECT * FROM ".$DB_KODE."_modul WHERE status=1");		
			while($mm=mysql_fetch_array($modul)){
		?>
			<?php  if($mm['folder_modul']=='berita'){ ?>
		<?php  }elseif($mm['folder_modul']=='guru'){ ?>	
		<?php  }elseif($mm['folder_modul']=='siswa'){ ?>	
		<?php  }elseif($mm['folder_modul']=='materi'){ ?>	
		<?php  }elseif($mm['folder_modul']=='psb'){ ?>	
		<?php  }elseif($mm['folder_modul']=='album'){ ?>	
		<?php  }elseif($mm['folder_modul']=='buku'){ ?>	
		<?php  }else{ ?>
			<div class="menu"><div class="isimenu"><a href="modul.php?m=<?php echo $mm['folder_modul']; ?>"><h2><b><?php echo $mm['nama_modul']; ?></b></h2>
			<img src="adminpanel/aplikasi/<?php echo $mm['folder_modul']; ?>/logo.jpg"></a><br><?php echo $mm['deskripsi']; ?></div></div>
		<?php  }
				

			?>

		
			
			<?php  } ?>
			</div>
		<div class="clear"></div>
		</div>
<?php    }?>			