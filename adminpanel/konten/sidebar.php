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

<div id="contentDivImg" style="display: none;width: 200px">
<div style="position: fixed;list-style: none;margin: 5px;background-color: #3399FF;-webkit-border-bottom-right-radius: 10px;
-webkit-border-bottom-left-radius: 10px;
-moz-border-radius-bottomright: 10px;
-moz-border-radius-bottomleft: 10px;
border-bottom-right-radius: 10px;
border-bottom-left-radius: 10px;">
 	<ul class="menu_admin" style="list-style: none;margin: 0;padding: 0;">
		<li class="item1"><a href="index.php?t=<?php echo $token; ?>">Beranda<span></span></a>
			<ul style="list-style: none;margin: 0;padding: 0;">
			 <li class="subitem1"><a href="index.php?t=<?php echo $token; ?>">Halaman Utama<span style="background: url('css/img/home.png') no-repeat"></span></a></li>
			 <li class="subitem1"><a href="logout.php?t=<?php echo $token; ?>">Log out<span style="background: url('css/img/kelas.png') no-repeat"></span></a></li>
			</ul>			 
		</li>
<?php  if($la['informasi_sekolah']==1){ ?>
		<li class="item2"><a href="informasi_sekolah.php?t=<?php echo $token; ?>">Profil <?php echo $_SESSION['Bsekolah']; ?><span></span></a>
			<ul style="list-style: none;margin: 0;padding: 0;">
				<li class="subitem1"><a href="informasi_sekolah.php?t=<?php echo $token; ?>">Informasi<span style="background: url('css/img/informasi1.png') no-repeat"></span></a></li>
				<li class="subitem2"><a href="gmap.php?t=<?php echo $token; ?>">Lokasi<span style="background: url('css/img/halaman.png') no-repeat"></span></a></li>
				<li class="subitem3"><a href="profil.php?t=<?php echo $token; ?>">Profil<span style="background: url('css/img/album1.png') no-repeat"></span></a></li>
				<li class="subitem2"><a href="agenda.php?t=<?php echo $token; ?>">Agenda<span style="background: url('css/img/jadwal.png') no-repeat"></span></a></li>
				<li class="subitem3"><a href="pengumuman.php?t=<?php echo $token; ?>">Pengumuman<span style="background: url('css/img/informasi.png') no-repeat"></span></a></li>
			</ul>
		</li>
		<li class="item4"><a href="#">Modul Aplikasi<span></span></a>
			<ul style="list-style: none;margin: 0;padding: 0;">		
<?php 	}

		$modul2=mysql_query("SELECT * FROM ".$DB_KODE."_modul WHERE status=1");		
		while($r2=mysql_fetch_array($modul2)){
?>

		<?php  if($r2['folder_modul']=='berita'){ ?>
<?php  if($la['berita']==1){?><li class="subitem1"><a href="berita.php?t=<?php echo $token; ?>">Berita<span style="background: url('css/img/news.png') no-repeat"></span></a></li><?php  } ?>	
		<?php  }elseif($r2['folder_modul']=='guru'){ ?>	
<?php  if($la['guru_staff']==1){?><li class="subitem1"><a href="guru_staff.php?t=<?php echo $token; ?>"><?php echo $_SESSION['Bguru']; ?> dan Staff<span style="background: url('css/img/guru.png') no-repeat"></a></span></li><?php  } ?>	
		<?php  }elseif($r2['folder_modul']=='siswa'){ ?>	
<?php  if($la['siswa']==1){?><li class="subitem1"><a href="siswa.php?t=<?php echo $token; ?>"><?php echo $_SESSION['Bsiswa']; ?></span style="background: url('css/img/siswa.png') no-repeat"></span></a></li><?php  } ?>	
		<?php  }elseif($r2['folder_modul']=='materi'){ ?>	
		 
		<?php 		$dir='elearning';
				$plugin=mysql_query("SELECT * FROM ".$DB_KODE."_plugin WHERE folder_plugin='$dir' and status=1 limit 1");		
				$r2s=mysql_fetch_array($plugin);
				if($r2s['status']==1){		
		?>		
<?php  if($la['pbm']==1){ ?><li class="subitem1"><a href="pbm.php?t=<?php echo $token; ?>">Pembelajaran<span style="background: url('css/img/mapel1.png') no-repeat"></span></a></li><?php  } ?>		
				<?php  }else{ ?>	
<?php  if($la['pbm']==1){ ?><li class="subitem1"><a href="materi.php?t=<?php echo $token; ?>">Pembelajaran<span style="background: url('css/img/mapel1.png') no-repeat"></span></a></li><?php  } ?>		
				<?php  } ?>				 

		<?php  }elseif($r2['folder_modul']=='psb'){ ?>	
<?php  if($la['psb_online']==1){ ?><li class="subitem1"><a href="psb_online.php?t=<?php echo $token; ?>">PSB Online<span style="background: url('css/img/psb.png') no-repeat"></span></a></li><?php  } ?>	
		<?php  }elseif($r2['folder_modul']=='album'){ ?>	
<?php  if($la['album_galeri']==1){ ?><li class="subitem1"><a href="album_galeri.php?t=<?php echo $token; ?>">Album Galeri<span style="background: url('css/img/album.png') no-repeat"></span></a></li><?php  } ?>	
		<?php  }elseif($r2['folder_modul']=='buku'){ ?>	
<?php  if($la['buku_tamu']==1){ ?><li class="subitem1"><a href="buku_tamu.php?t=<?php echo $token; ?>">Buku Tamu<span style="background: url('css/img/buku1.png') no-repeat"></span></a></li><?php  } ?>	
		<?php  }else{ ?>
<?php  if($la['modul1']==1){ ?><li class="subitem1"><a href="<?php echo $r2['folder_modul']; ?>.php?t=<?php echo $token; ?>"><?php echo $r2['folder_modul']; ?><span style="background: url('css/img/modul.png') no-repeat"></span></a></li><?php  } ?>	
		<?php  }
		  ?>	
<?php  } ?>
			</ul>
		</li>

		<li class="item5"><a href="#">Plugin Premium<span></span></a>
			<ul style="list-style: none;margin: 0;padding: 0;">
<?php
$plugin=mysql_query("SELECT * FROM ".$DB_KODE."_plugin WHERE status=1");		
while($pi=mysql_fetch_array($plugin)){
?> 
<?php  if($pi['folder_plugin']=='import'){}elseif($pi['folder_plugin']=='elearning'){}elseif($pi['folder_plugin']=='jadwal'){}elseif($pi['folder_plugin']=='raport'){}elseif($pi['folder_plugin']=='un'){}elseif($pi['folder_plugin']=='ekstra'){}elseif($pi['folder_plugin']=='perpustakaan'){}elseif($pi['folder_plugin']=='sarana'){}elseif($pi['folder_plugin']=='prakerin'){}elseif($pi['folder_plugin']=='bkk'){}elseif($pi['folder_plugin']=='up'){}elseif($pi['folder_plugin']=='dudi'){
}else{ ?>
				
<?php if($la['plugin1']==1){ ?><li class="subitem1"><a href="<?php echo $pi['folder_plugin']; ?>.php?t=<?php echo $token; ?>"><?php echo $pi['folder_plugin']; ?><span style="background: url('css/img/plugin.png') no-repeat"></span></a></li><?php  } ?>	
			
<?php		}}
?>			
			
<?php  if($la['import']==1){ ?> <li class="subitem1"><a href="import.php?t=<?php echo $token; ?>">Import Data<span style="background: url('css/img/import.png') no-repeat"></span></a></li><?php  } ?>
<?php  if($la['jadwal']==1){ ?><li class="subitem1"><a href="jadwal.php?t=<?php echo $token; ?>">Jadwal Pelajaran<span style="background: url('css/img/jadwal.png') no-repeat"></span></a></li> <?php  } ?>
<?php  if($la['raport']==1){ ?><li class="subitem1"><a href="raport.php?t=<?php echo $token; ?>">Raport<span style="background: url('css/img/raport.png') no-repeat"></span></a></li> <?php  } ?>
<?php  if($la['un']==1){ ?><li class="subitem1"><a href="un.php?t=<?php echo $token; ?>">Ujian Nasional<span style="background: url('css/img/un.png') no-repeat"></span></a></li> 	<?php  } ?>		
<?php  if($la['ekstra']==1){ ?><li class="subitem1"><a href="ekstra.php?t=<?php echo $token; ?>">Ekstrakurikuler<span style="background: url('css/img/ekstra.png') no-repeat"></span></a></li> <?php  } ?>	
<?php  if($la['perpustakaan']==1){ ?><li class="subitem1"><a href="perpustakaan.php?t=<?php echo $token; ?>">Perpustakaan<span style="background: url('css/img/perpus.png') no-repeat"></a></span></li> <?php  } ?>	
<?php  if($la['sarana']==1){ ?><li class="subitem1"><a href="sarana.php?t=<?php echo $token; ?>">Sarana Prasarana<span style="background: url('css/img/sarpras.png') no-repeat"></span></a></li>	<?php  } ?>
<?php  if($la['prakerin']==1){ ?><li class="subitem1"><a href="prakerin.php?t=<?php echo $token; ?>">Prakerin<span style="background: url('css/img/prakerin.png') no-repeat"></span></a></li><?php  } ?>
<?php  if($la['bkk']==1){ ?><li class="subitem1"><a href="bkk.php?t=<?php echo $token; ?>">Bursa Kerja Khusus<span style="background: url('css/img/bkk.png') no-repeat"></span></a></li> <?php  } ?>	
<?php  if($la['up']==1){ ?><li class="subitem1"><a href="up.php?t=<?php echo $token; ?>">Unit Produksi<span style="background: url('css/img/up.png') no-repeat"></span></a></li><?php  } ?>	
<?php  if($la['dudi']==1){ ?><li class="subitem1"><a href="dudi.php?t=<?php echo $token; ?>">Du/Di<span style="background: url('css/img/dudi.png') no-repeat"></span></a></li> <?php  } ?>				 


			</ul>
		</li>

		<li class="item3"><a href="#">Setting <span></span></a>
			<ul style="list-style: none;margin: 0;padding: 0;">
		 
<?php     if($_SESSION['leveluser']=='0'){ ?> <li class="subitem1"><a href="admin.php?t=<?php echo $token; ?>">Menejemen Admin<span style="background: url('css/img/admin.png') no-repeat"></span></a></li><?php     } ?>			
<?php  if($la['pengaturan']==1){ ?>
<li class="subitem1"><a href="pengaturan.php?t=<?php echo $token; ?>">Pengaturan<span style="background: url('css/img/pengaturan.png') no-repeat"></span></a></li>
<li class="subitem1"><a href="tema.php?t=<?php echo $token; ?>">Tema/Tampilan<span style="background: url('css/img/pengaturan.png') no-repeat"></span></a><span></span></li>
<li class="subitem1"><a href="blok.php?t=<?php echo $token; ?>">Blok<span style="background: url('css/img/pengaturan.png') no-repeat"></span></a><span></span></li>
<li class="subitem1"><a href="menu.php?t=<?php echo $token; ?>">Menu<span style="background: url('css/img/pengaturan.png') no-repeat"></span></a><span></span></li>
<li class="subitem1"><a href="plugin.php?t=<?php echo $token; ?>">Plugin<span style="background: url('css/img/pengaturan.png') no-repeat"></span></a><span></span></li>
<li class="subitem1"><a href="modul.php?t=<?php echo $token; ?>">Modul<span style="background: url('css/img/pengaturan.png') no-repeat"></span></a><span></span></li>
<li class="subitem1"><a href="ym.php?t=<?php echo $token; ?>">Yahoo! Messenger<span style="background: url('css/img/pengaturan.png') no-repeat"></span></a><span></span></li>
<li class="subitem1"><a href="polling.php?t=<?php echo $token; ?>">Survey<span style="background: url('css/img/pengaturan.png') no-repeat"></span></a><span></span></li>
<li class="subitem1"><a href="link.php?t=<?php echo $token; ?>">Direktori Link<span style="background: url('css/img/pengaturan.png') no-repeat"></span></a><span></span></li>
<li class="subitem1"><a href="statistik.php?t=<?php echo $token; ?>">Statistik<span style="background: url('css/img/pengaturan.png') no-repeat"></span></a><span></span></li>
<li class="subitem1"><a href="backup.php?t=<?php echo $token; ?>">Backup/Restore<span style="background: url('css/img/pengaturan.png') no-repeat"></span></a><span></span></li>
<?php  } ?>
			</ul>
		</li>
	</ul>		
<?php include "konten/versi.php"; ?>
  <center><h4 style="color: #fff"><b>CMS FORMULASI <BR><?php echo $model; ?> VERSI <?php echo $versi; ?></b></h4></center>
</div>

 
</div>
<!--initiate accordion-->
<script type="text/javascript">
	$(function() {
	
	    var menu_admin_ul = $('.menu_admin > li > ul'),
	           menu_admin_a  = $('.menu_admin > li > a');
	    
	    menu_admin_ul.hide();
	
	    menu_admin_a.click(function(e) {
	        e.preventDefault();
	        if(!$(this).hasClass('active')) {
	            menu_admin_a.removeClass('active');
	            menu_admin_ul.filter(':visible').slideUp('normal');
	            $(this).addClass('active').next().stop(true,true).slideDown('normal');
	        } else {
	            $(this).removeClass('active');
	            $(this).next().stop(true,true).slideUp('normal');
	        }
	    });
	
	});
</script>
	
			