<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
					
							$judul=$ns['isi_pengaturan'];
						    $judul = strtolower(preg_replace("/\s/","-",$judul));
				
?>
<div class="share-bar">
	<div id="navmain">
		<ul class="navmain">

			<li style="display: block;" class="home">
				<a href="index.php">Home</a>
			</li>
			<li style="display: block;">
				<a href="data-profil-<?php    echo "$judul";?>.html"><i class="icon-photography"></i><span class="dt">Profil</span></a>
				<ul style="display: none;" class="megamenu menu-form dropdown">
				<?php 

							$pro=1;
						$profil=mysql_query("SELECT * FROM ".$DB_KODE."_info_sekolah WHERE posisi_menu='0' AND status_terbit='1' ORDER BY id_info ASC");
						while($p=mysql_fetch_array($profil)) {
						$judul=$p['nama_info'].'-'.$ns['isi_pengaturan'];
						    $judul = strtolower(preg_replace("/\s/","-",$judul));
							$url_link = "profil-sekolah-".$p['id_info']."-".$judul.".html";
	?>

					<li>
						<a href="<?php    echo $url_link; ?>" class="profil-<?php    echo $pro; ?>"><?php    echo "$p[nama_info]";?></a>
					</li>
					<?php $pro++;    }
												$judul=$ns['isi_pengaturan'];
						    $judul = strtolower(preg_replace("/\s/","-",$judul));
					
					?>
					<li><a href="lokasi-sekolah-<?php   echo $judul;?>.html">Lokasi <?php echo $_SESSION['Bsekolah']; ?></a></li>					
				</ul>
			</li>
			
			<li style="display: block;">
				<a href="#"><i class="icon-menu"></i><span class="dt">Informasi</span></a>
				<ul style="display: none;" class="megamenu menu-form dropdown">
					<li><a href="berita-<?php   echo $judul;?>.html">Berita</a></li>
					<li><a href="agenda-<?php   echo $judul;?>.html">Agenda <?php echo $_SESSION['Bsekolah']; ?></a></li>
					<li><a href="pengumuman-<?php   echo $judul;?>.html">Pengumuman</a></li>
				
							<li><a href="data-guru-<?php   echo $judul;?>.html">Data <?php echo $_SESSION['Bguru']; ?></a></li>
							<li><a href="data-karyawan-<?php   echo $judul;?>.html">Data Staff</a></li>
							<li><a href="data-siswa-<?php   echo $judul;?>.html">Data <?php echo $_SESSION['Bsiswa']; ?></a></li>
							<li><a href="data-alumni-<?php   echo $judul;?>.html">Data Alumni</a></li>

				</ul>
			</li>			
			
			<li style="display: block;">
				<a href="#"><i class="icon-search"></i><span class="dt">Cari</span></a>
				<div style="display: none;" class="megamenu menu-form">
					<div class="row">
						<div class="menu-box">

			<form method="POST" action="cari-berita.html">
			<input type="text"  placeholder="Tulis yang anda cari"  name="cari">
			<input value="Cari" id="searchsubmit" name="submit" class="submit" type="submit">
			</form>							
						</div>
					</div>
				</div>
			</li>
			<li style="display: block;">
				<a href="#"><i class="icon-freelance"></i><span class="dt">Login</span></a>
				<div style="display: none;" class="megamenu menu-form">
					<div class="row">
						<div class="menu-box">
							<form method="POST" action="kontenweb/elearning/validasi.php" name="login" id="login">
								Username <input name="username" placeholder="NIP atau NIS anda" required="" type="text"><br>
								Password <input name="password" placeholder="Masukkan Password" required="" type="text"><br>
								<img  src="kontenweb/captcha-login.php?date=<?php    echo date('YmdHis');?>" alt="security image" /><br> <input style="width:80px;" name="kode" placeholder="" required="" type="text"> 
								<input value="Login" id="searchsubmit" name="submit" class="submit" type="submit">
							</form>
				
						</div>
					</div>
				</div>
			</li>			
			<li style="display: block;">
				<a href="#"><i class="icon-info"></i><span class="pages">Halaman</span></a>
				<ul style="display: none;" class="megamenu menu-form dropdown dropdown">
					<li><a href="foto-kegiatan-<?php   echo $judul;?>.html">Galeri</a></li>
					<li><a href="buku-tamu-<?php   echo $judul;?>.html">Buku Tamu</a></li>
					<li><a href="psb-penerimaan-siswa-baru-<?php   echo $judul;?>.html">PSB</a></li>
					<li><a href="elearning.html">E-Learning</a></li>	
				</ul>
			</li>
		<?php 
			$menu1=mysql_query("SELECT * FROM ".$DB_KODE."_menu WHERE menu_id=0 AND status=1 ORDER BY urutan,menu_id ASC");
			while ($m1=mysql_fetch_array($menu1)){	
			?>
				<li  style="display: block;"><a href="<?php    echo $m1['url']; ?>"><?php    echo "$m1[judul]";?></a>
							<?php 
							$menu2=mysql_query("SELECT * FROM ".$DB_KODE."_menu WHERE menu_id=$m1[id_menu] AND status=1 ORDER BY urutan,menu_id ASC");
									$menu2x=mysql_num_rows($menu2);
									if($menu2x>0){
							?>				
						<ul  style="display: none;" class="megamenu menu-form dropdown dropdown">
							<?php 
							while ($m2=mysql_fetch_array($menu2)){	
							?>

									<li><a href="<?php    echo $m2['url']; ?>"><?php    echo "$m2[judul]";?></a>
											<?php 
											$menu3=mysql_query("SELECT * FROM ".$DB_KODE."_menu WHERE menu_id=$m2[id_menu] AND status=1 ORDER BY urutan,menu_id ASC");
											$menu3x=mysql_num_rows($menu3);
											if($menu3x>0){
											?>									
												<ul>
													<?php 
													while ($m3=mysql_fetch_array($menu3)){	
													?>
														
															<li><a href="<?php    echo $m3['url']; ?>"><?php    echo "$m3[judul]";?></a>
															</li>						
										
													<?php  }?>		
												</ul>
											<?php  }?>		
									</li>						
							
							<?php  }?>		
						</ul>	
						<?php  }?>							
				</li>

			<?php  }?>						
			<li style="display: block;" class="right rss"><a title="Langganan RSS" target="_blank" href="<?php echo $_SESSION['urlweb'];?>sitemap.xml"><i class="icon-rss-2"></i></a></li>
			<li style="display: block;" class="right fbk"><a title="Ikuti Facebook" target="_blank" href="http://www.facebook.com/groups/formulasi/"><i class="icon-facebook"></i></a></li>
			<li style="display: block;" class="right gle"><a title="Ikuti Google+" target="_blank" href="https://plus.google.com/111781923260687211924"><i class="icon-gplus"></i></a></li>
			<li style="display: block;" class="right twit"><a title="Ikuti Twitter" target="_blank" href="http://twitter.com/medukasi"><i class="icon-twitter"></i></a></li>
		</ul>
	</div>
</div>
