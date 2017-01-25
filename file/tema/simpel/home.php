<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
$kanan=1;

$slide=1;
function konten() {
	
include "konfigurasi/koneksi.php";
?>

	
		<div id="konten">
			<div id="lebaran">
			<?php    
			$sambutan=mysql_query("SELECT * FROM ".$DB_KODE."_info_sekolah WHERE id_info='1'");
			$sm=mysql_fetch_array($sambutan);
			?>
			<h4><?php    echo "$sm[nama_info]";?></h4><br>
			<p><?php    echo "$sm[isi_info]";?></p>
			</div>
			
			
			      <!-- tabs -->
		<ul class="tabs">
			<li><a href="#berita">Berita Terbaru</a></li>
			<li><a href="#kategori">Kategori Berita</a></li>
			<li><a href="#komentar">Komentar Terbaru</a></li>
			<li><a href="#agenda">Agenda Terbaru</a></li>
		</ul>

		<div id="lebarTab">
				<div id="berita" class="tab_content">
					<ul>
					<?php    
					$berita=mysql_query("SELECT * FROM ".$DB_KODE."_berita, ".$DB_KODE."_kategori, ".$DB_KODE."_users WHERE 
					".$DB_KODE."_berita.id_kategori=".$DB_KODE."_kategori.id_kategori AND ".$DB_KODE."_berita.s_username=".$DB_KODE."_users.s_username AND
					status_terbit='1' ORDER BY id_berita DESC LIMIT 2");
					$hitungberita=mysql_num_rows($berita);
					
					if($hitungberita > 0){
					while($b=mysql_fetch_array($berita)){
							$judul = strtolower(preg_replace("/\s/","9a9z9",$b['judul_berita']));						
								$judul = preg_replace('#\W#', '', $judul);								
							$judul = str_replace("9a9z9","-",$judul);
							$url_link = "info-".$b['id_berita']."-".$judul.".html";
							$url_tgl = "info-tanggal-".$b['tanggal_posting'].".html";
							$url_kat = "info-kategori-".$b['id_kategori']."-".$b['nama_kategori'].".html";
							$url_penulis = "info-penulis-".$b['s_username'].".html";
					?>
						<li><a href="<?php    echo $url_link;?>" title="<?php    echo $b['judul_berita'];?>"><?php    echo "<b>$b[judul_berita]</b>";?></a>
						<br><small>Kategori: <a href="<?php    echo $url_kat ?>"><?php    echo $b['nama_kategori']?></a>
						&nbsp;Komentar : 
						<?php    
						$hitungkomentar=mysql_query("SELECT * FROM ".$DB_KODE."_komentar WHERE id_berita='$b[id_berita]'");
						$jumlahkomentar=mysql_num_rows($hitungkomentar);
						echo $jumlahkomentar?></small>
						<?php    
						$isi_berita = strip_tags($b['isi_berita']); 
						$isi = substr($isi_berita,0,500);
						if ($b['gambar_kecil']!= 'no_image.jpg'){
						echo "<p><a href='$url_link' title=' $b[judul_berita]'><img src='images/$b[gambar_kecil]' width='100px' style='float:left; margin: 5px 10px 0 0; padding: 3px; background: #fff; border: 1px solid #dcdcdc'></a>$isi...<a href='$url_link' title='$b[judul_berita]'>Baca selengkapnya...</a></p><br>";}
						else {
						echo "<p>$isi...<a href='$url_link' title='$b[judul_berita]'>Baca selengkapnya...</a></p>";
						}
						?>
						</li>
					<?php     }}

					else {?>
					<li><a href=""><b>Data berita belum ada</b></a></li>
					<?php     } ?>
					</ul>
				</div>
				
				<div id="kategori" class="tab_content">
					<ul>
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
					<?php     }}}

					else {?>
					<li><a href=""><b>Data katgeori belum ada</b></a></li>
					<?php     } ?>
					</ul>
				</div>
				
				<div id="komentar" class="tab_content">
				    <ul>
					<?php    
					$komentar=mysql_query("SELECT * FROM ".$DB_KODE."_komentar, ".$DB_KODE."_berita WHERE ".$DB_KODE."_komentar.id_berita=".$DB_KODE."_berita.id_berita AND status_terima ='1' AND status_terbit='1' ORDER BY id_komentar DESC limit 4");
					$hitungkomentar=mysql_num_rows($komentar);
					
					if($hitungkomentar > 0){
					while($kom=mysql_fetch_array($komentar)){
							$judul = strtolower(preg_replace("/\s/","9a9z9",$kom['judul_berita']));						
								$judul = preg_replace('#\W#', '', $judul);								
							$judul = str_replace("9a9z9","-",$judul);
							$url_link = "info-".$kom['id_berita']."-".$judul.".html";
					?>
						<li><a href=""><?php    echo "$kom[nama_komentar]";?></a> pada <a href="<?php    echo $url_link;?>"><?php    echo "$kom[judul_berita]";?></a><br>
						<b><?php    echo "$kom[tanggal_komentar]";?></b><br>
						<i><?php    echo "$kom[isi_komentar]";?></i></li>
					<?php     }}
					
					else {?>
					<li><a href=""><b>Data komentar belum ada</b></a></li>
					<?php     } ?>
					</ul>
				</div>
				
				<div id="agenda" class="tab_content">
					<ul>
					<?php    
					$agenda=mysql_query("SELECT * FROM ".$DB_KODE."_agenda ORDER BY id_agenda DESC limit 4");
					$hitungagenda=mysql_num_rows($agenda);
					global $ns;
					if($hitungagenda > 0){
					while($ag=mysql_fetch_array($agenda)){
							$judul=$ns['isi_pengaturan'];
						    $judul = strtolower(preg_replace("/\s/","-",$judul));
					?>
						<li><b><?php    echo "<a href='agenda-$judul.html'>$ag[judul_agenda]</a>";?></b> pada tanggal <b><?php    echo "$ag[tanggal_agenda]";?></b><br>
							<b>Tempat : </b><?php    echo "$ag[tempat_agenda]";?><br>
							<b>Keterangan : </b><?php    echo "$ag[keterangan_agenda]";?> </li>
					<?php     }}
					else {?>
					<li><b><a href="">Data agenda belum ada</a></b></li>
					<?php     } ?>
					</ul>
				</div>
				<center><a href='http://www.formulasi.or.id' target='_blank' title='Forum Multimedia Edukasi www.formulasi.or.id'><img src='http://feeds.feedburner.com/Formulasi.1.gif'  title='Forum Multimedia Edukasi www.formulasi.or.id' alt='Forum Multimedia Edukasi www.formulasi.or.id' style='border:0'></a></center>
		</div>
		<div class="clear"></div>
		
			<div id="kecil" style="width:298px">
			<h3>Galeri Terbaru</h3>
			<?php    
			$poto=mysql_query("SELECT * FROM ".$DB_KODE."_galeri ORDER BY id_galeri DESC LIMIT 4");
			$hitungfoto=mysql_num_rows($poto);
			
			if($hitungfoto > 0){
			while($ph=mysql_fetch_array($poto)){
			?>
			<p class="thumb"><a id="thumb1" href="images/foto/galeri/<?php    echo "$ph[nama_galeri]";?>" class="highslide" onclick="return hs.expand(this)">
			<img src="images/foto/galeri/<?php    echo "$ph[nama_galeri]";?>" alt="Highslide JS" title="Klik untuk memperbesar foto <?php    echo "$ph[judul]";?> | <?php    echo "$ph[deskripsi]";?>"/></a>
			</p>
			<?php     }}
			else {?>
			<b>Foto belum ada</b>
			<?php     } ?>
			</div>
			
			<div id="kecil" style="width:358px; margin-left: 0px">
				<div class="pengumuman"><!-- Awal menampilkan pengumuman paling baru-->
				<?php    
				$pengumuman=mysql_query("SELECT * FROM ".$DB_KODE."_pengumuman, ".$DB_KODE."_users WHERE ".$DB_KODE."_pengumuman.s_username=".$DB_KODE."_users.s_username ORDER BY id_pengumuman DESC");
				$cek_pengumuman=mysql_num_rows($pengumuman);
				
				if($cek_pengumuman > 0){
				$peng=mysql_fetch_array($pengumuman);
				echo "<h4>$peng[judul_pengumuman]</h4>
				<p>$peng[isi_pengumuman]</p>
				<p><b>Diterbitkan pada: $peng[tanggal_pengumuman]</b></p>
				<p><b>Oleh: $peng[nama_lengkap_users]</b></p>";
				}
				else {
				?>
				<h4>PENGUMUMAN</h4>
				<p><b>Belum ada pengumuman</b></p>
				<?php     } ?>
				</div>
			</div>
			
		<div class="clear"></div>
		</div>
<?php    }?>		
<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>
	