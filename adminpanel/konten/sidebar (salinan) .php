<?php 
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 if($_SESSION['leveluser']==0){
 $lua=1;
 }else{
  $lua=$_SESSION['leveluser'];
 }
$ladmin=mysql_query("SELECT * FROM ".$DB_KODE."_user_group WHERE id_user_group='$lua' ORDER BY id_user_group");
															$la=mysql_fetch_array($ladmin);
															$level=$la['nama_group']; 					
									?>
									
<div style="width:200px;height:500px;overflow:scroll;position: fixed ;	">
			<div class="menu"><div class="isimenuHome"><a href="index.php">Beranda</a></div></div>
<?php  if($la['informasi_sekolah']==1){ ?>	<div class="menu"><div class="isimenuInformasi"><a href="informasi_sekolah.php">Informasi <?php echo $_SESSION['Bsekolah']; ?></a></div></div><?php 		}?>
<?php
				$modul2=mysql_query("SELECT * FROM ".$DB_KODE."_modul WHERE status=1");		
		while($r2=mysql_fetch_array($modul2)){
?>


		<?php  if($r2['folder_modul']=='berita'){ ?>
<?php  if($la['berita']==1){?><li class="subitem1"><a href="berita.php">Berita</a></li><?php  } ?>	
		<?php  }elseif($r2['folder_modul']=='guru'){ ?>	
<?php  if($la['guru_staff']==1){?><li class="subitem1"><a href="guru_staff.php"><?php echo $_SESSION['Bguru']; ?> dan Staff</a></li><?php  } ?>	
		<?php  }elseif($r2['folder_modul']=='siswa'){ ?>	
<?php  if($la['siswa']==1){?><li class="subitem1"><a href="siswa.php"><?php echo $_SESSION['Bsiswa']; ?></a></li><?php  } ?>	
		<?php  }elseif($r2['folder_modul']=='materi'){ ?>	
		 
		<?php 		$dir='elearning';
				$plugin=mysql_query("SELECT * FROM ".$DB_KODE."_plugin WHERE folder_plugin='$dir' and status=1 limit 1");		
				$r2s=mysql_fetch_array($plugin);
				if($r2s['status']==1){		
		?>		
<?php  if($la['pbm']==1){ ?><li class="subitem1"><a href="pbm.php">Pembelajaran</a></li><?php  } ?>		
				<?php  }else{ ?>	
<?php  if($la['pbm']==1){ ?><li class="subitem1"><a href="materi.php">Pembelajaran</a></li><?php  } ?>		
				<?php  } ?>				 

		<?php  }elseif($r2['folder_modul']=='psb'){ ?>	
<?php  if($la['psb_online']==1){ ?><li class="subitem1"><a href="psb_online.php">PSB Online</a></li><?php  } ?>	
		<?php  }elseif($r2['folder_modul']=='album'){ ?>	
<?php  if($la['album_galeri']==1){ ?><li class="subitem1"><a href="album_galeri.php">Album Galeri</a></li><?php  } ?>	
		<?php  }elseif($r2['folder_modul']=='buku'){ ?>	
<?php  if($la['buku_tamu']==1){ ?><li class="subitem1"><a href="buku_tamu.php">Buku Tamu</a></li><?php  } ?>	
		<?php  }else{ ?>
<?php  if($la['modul1']==1){ ?><li class="subitem1"><a href="<?php echo $r2['folder_modul']; ?>.php"><?php echo $r2['folder_modul']; ?></a></li><?php  } ?>	
		<?php  }
		  ?>	
<?php  } ?>			

<?php
$plugin=mysql_query("SELECT * FROM ".$DB_KODE."_plugin WHERE status=1");		
while($pi=mysql_fetch_array($plugin)){
?>
<?php  if($pi['folder_plugin']=='import'){
 <li class="subitem1"><a href="import.php">Import Data</a><span></span></li>
 }elseif($pi['folder_plugin']=='elearning'){
  
 }
elseif($pi['folder_plugin']=='jadwal'){
<li class="subitem1"><a href="jadwal.php">Jadwal Pelajaran</a><span></span></li> 
}
elseif($pi['folder_plugin']=='raport'){
<li class="subitem1"><a href="raport.php">Raport</a><span></span></li> 
}
elseif($pi['folder_plugin']=='un'){
<li class="subitem1"><a href="un.php">Ujian Nasional</a><span></span></li> 
}
elseif($pi['folder_plugin']=='ekstra'){
<li class="subitem1"><a href="ekstra.php">Ekstrakurikuler</a><span></span></li> 
}
elseif($pi['folder_plugin']=='perpustakaan'){
<li class="subitem1"><a href="perpustakaan.php">Perpustakaan</a><span></span></li> 
}
elseif($pi['folder_plugin']=='sarana'){
<li class="subitem1">a href="sarana.php">Sarana Prasarana</a><span></span></li>	 
}
elseif($pi['folder_plugin']=='prakerin'){
<li class="subitem1"><a href="prakerin.php">Prakerin</a><span></span></li> 
}
elseif($pi['folder_plugin']=='bkk'){
<li class="subitem1"><a href="bkk.php">Bursa Kerja Khusus</a><span></span></li> 
}
elseif($pi['folder_plugin']=='up'){
<li class="subitem1"><a href="up.php">Unit Produksi</a><span></span></li>< 
}
elseif($pi['folder_plugin']=='dudi'){
<li class="subitem1"><a href="dudi.php">Du/Di</a><span></span></li> 
}
else{ ?>
				
<?php if($la['plugin1']==1){ ?><li class="subitem1"><a href="<?php echo $pi['folder_plugin']; ?>.php"><?php echo $pi['folder_plugin']; ?></a></li><?php  } ?>	
			
<?php		}}
?>
<?php     if($_SESSION['leveluser']=='0'){ ?> <li class="subitem1"><a href="admin.php">Menejemen Admin</a><span></span></li><?php     } ?>			
<?php  if($la['pengaturan']==1){ ?><li class="subitem1"><a href="pengaturan.php">Pengaturan</a><span></span></li><?php  } ?>

			<hr>
			<div class="menu"><div class="isimenuPengaturan"><center><B>PLUGIN PREMIUM</center></b></div></div>
			
<?php  if($la['import']==1){ ?><?php  } ?>
		
<?php  if($la['jadwal']==1){ ?><?php  } ?>
<?php  if($la['raport']==1){ ?><?php  } ?>
<?php  if($la['un']==1){ ?>	<?php  } ?>		
<?php  if($la['ekstra']==1){ ?><?php  } ?>	
<?php  if($la['perpustakaan']==1){ ?><?php  } ?>	
<?php  if($la['sarana']==1){ ?><?php  } ?>
			
<?php  if($la['prakerin']==1){ ?><?php  } ?>
<?php  if($la['bkk']==1){ ?><?php  } ?>	
<?php  if($la['up']==1){ ?>?php  } ?>	
<?php  if($la['dudi']==1){ ?><?php  } ?>
			
</div>	
	
			