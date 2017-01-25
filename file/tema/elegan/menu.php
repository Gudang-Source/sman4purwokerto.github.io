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

	<ul class="sf-menu" id="nav">
			<li><a href="index.php">Home</a></li>
			<li><a href="data-profil-<?php    echo "$judul";?>.html">Profil</a>
				<ul>
				<?php     $profil=mysql_query("SELECT * FROM ".$DB_KODE."_info_sekolah WHERE posisi_menu='0' AND status_terbit='1' ORDER BY id_info ASC");
						while($p=mysql_fetch_array($profil)) {
						$judul=$p['nama_info'].'-'.$ns['isi_pengaturan'];
						    $judul = strtolower(preg_replace("/\s/","-",$judul));
							$url_link = "profil-sekolah-".$p['id_info']."-".$judul.".html";
	?>
					<li><a href="<?php    echo $url_link; ?>"><?php    echo "$p[nama_info]";?></a></li>
					<?php     }
											$judul=$ns['isi_pengaturan'];
						    $judul = strtolower(preg_replace("/\s/","-",$judul));
					
					?>
					<li><a href="lokasi-sekolah-<?php   echo $judul;?>.html">Lokasi <?php echo $_SESSION['Bsekolah']; ?></a></li>
					<li><a href="#">Warga <?php echo $_SESSION['Bsekolah']; ?></a>
						<ul>
							<li><a href="data-guru-<?php   echo $judul;?>.html">Data <?php echo $_SESSION['Bguru']; ?></a></li>
							<li><a href="data-karyawan-<?php   echo $judul;?>.html">Data Staff</a></li>
							<li><a href="data-siswa-<?php   echo $judul;?>.html">Data <?php echo $_SESSION['Bsiswa']; ?></a></li>
							<li><a href="data-alumni-<?php   echo $judul;?>.html">Data Alumni</a></li>
						</ul>
			</li>
				</ul>
			</li>
			<?php    
			$menuutama=mysql_query("SELECT * FROM ".$DB_KODE."_info_sekolah WHERE posisi_menu='1' AND status_terbit='1'");
			$hitung=mysql_num_rows($menuutama);
			if ($hitung != 0){
			while($m=mysql_fetch_array($menuutama)){
									    $judul = strtolower(preg_replace("/\s/","-",$m['nama_info']));
							$url_link = "profil-sekolah-".$m['id_info']."-".$judul.".html";
			?>
			<li><a href="<?php    echo $url_link;?>"><?php    echo "$m[nama_info]";?></a></li>
			<?php     }} ?>
			
			<li><a href="#">Informasi</a>
				<ul>

					<li><a href="berita-<?php   echo $judul;?>.html">Berita</a></li>
					<li><a href="agenda-<?php   echo $judul;?>.html">Agenda <?php echo $_SESSION['Bsekolah']; ?></a></li>
					<li><a href="pengumuman-<?php   echo $judul;?>.html">Pengumuman</a></li>
				</ul>
			</li>

			<li><a href="foto-kegiatan-<?php   echo $judul;?>.html">Galeri</a></li>
			<li><a href="buku-tamu-<?php   echo $judul;?>.html">Buku Tamu</a></li>
			<li><a href="psb-penerimaan-siswa-baru-<?php   echo $judul;?>.html">PSB</a>
				<ul>
					<li><a href="formulir-psb-penerimaan-siswa-baru-<?php   echo $judul;?>.html">Pendaftaran</a></li>
					<li><a href="data-psb-penerimaan-siswa-baru-<?php   echo $judul;?>.html">Pengumuman</a></li>
				</ul>			
			</li>
			<li><a href="elearning.html">E-Learning</a></li>
			<?php 
			$menu1=mysql_query("SELECT * FROM ".$DB_KODE."_menu WHERE menu_id=0 AND status=1 ORDER BY urutan,menu_id ASC");
			while ($m1=mysql_fetch_array($menu1)){	
			?>
				<li><a href="<?php    echo $m1['url']; ?>"><?php    echo "$m1[judul]";?></a>
							<?php 
							$menu2=mysql_query("SELECT * FROM ".$DB_KODE."_menu WHERE menu_id=$m1[id_menu] AND status=1 ORDER BY urutan,menu_id ASC");
									$menu2x=mysql_num_rows($menu2);
									if($menu2x>0){
							?>				
						<ul>
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
</ul>
