<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

$kiri=1;
function konten() {
global $DB_KODE, $ns;
?>
<link rel="stylesheet" type="text/css" href="file/tema/<?php  echo $_SESSION['temaweb'] ;?>/css/slide.css">
	    <script type="text/javascript"> 
$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabshome li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabshome li").click(function() {

		$("ul.tabshome li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
	</script>
<div class="slider-wrapper">
		<ul id="slider">
					<?php    
					$slide_berita=mysql_query("SELECT * FROM ".$DB_KODE."_berita, ".$DB_KODE."_users WHERE ".$DB_KODE."_berita.s_username=".$DB_KODE."_users.s_username AND status_terbit='1' AND status_headline='1' LIMIT 6");
					while ($sb=mysql_fetch_array($slide_berita)){
					$isi_berita = strip_tags($sb['isi_berita']); 
					$isi = substr($isi_berita,0,100);
							$judul = strtolower(preg_replace("/\s/","9a9z9",$sb['judul_berita']));						
								$judul = preg_replace('#\W#', '', $judul);								
							$judul = str_replace("9a9z9","-",$judul);
							$url_link = "info-".$sb['id_berita']."-".$judul.".html";
					?>		
			<li style="background-image: url(images/<?php    echo $sb['gambar_kecil']?>);">
				<div class="quote">
					<blockquote>“<b><?php    echo $sb['judul_berita']?></b>”<br>
						<div class="tekskecil"><small  style="color: #fff">Tanggal: <?php     echo $sb['tanggal_posting']?>, Oleh: <?php     echo $sb['nama_lengkap_users']?></small><br>
						<?php     echo $isi ?>
						</div>
					</blockquote>
					<center><p><a href="<?php    echo $url_link; ?>" style="color: #ffff00"><b>Baca selengkapnya </b></a></p><br> </center>
				</div>
			</li>
					<?php     } ?>

		</ul>
		<div class="slider-nav">
			<a href="#" class="slider-prev"></a>
			<div class="slider-select"></div>
			<a href="#" class="slider-next"></a>
		</div>
	</div>

		<br>
		<div id="sambutan"  style="text-align:justify">
		
			<div   style="padding:10px">
				<?php    
				$sambutan=mysql_query("SELECT * FROM ".$DB_KODE."_info_sekolah WHERE id_info='1'");
				$sm=mysql_fetch_array($sambutan);
				?>
				<h3><?php    echo "$sm[nama_info]";?></h3>
				<p><?php    echo "$sm[isi_info]";?></p>
			</div>
		</div>	
			
			      <!-- tabshome -->
		<ul class="tabshome">
			<li><a href="#berita"><i class="icon-info-2">&nbsp;</i> <span id="tabslink1">Berita </span><span id="tabslink">Terbaru</span></a></li>
			<li><a href="#kategori"><i class="icon-tag">&nbsp;</i> <span id="tabslink1">Kategori </span><span id="tabslink">Berita</span></a></li>
			<li><a href="#komentar"><i  class="icon-comment">&nbsp;</i> <span id="tabslink1">Komentar </span><span id="tabslink">Terbaru</span></a></li>
			<li><a href="#agenda"><i class="icon-link-ext">&nbsp;</i> <span id="tabslink1">Agenda </span><span id="tabslink">Terbaru</span></a></li>
		</ul>

		<div id="lebarTab">
			<div   >
				<div id="berita" class="tab_content"  style="text-align:justify">
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
					<?php    } }}

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
			</div>	
				<center><a href='http://www.formulasi.or.id' target='_blank' title='Forum Multimedia Edukasi www.formulasi.or.id'><img width='75%' src='http://feeds.feedburner.com/Formulasi.1.gif'  title='Forum Multimedia Edukasi www.formulasi.or.id' alt='Forum Multimedia Edukasi www.formulasi.or.id' style='border:0'></a><br><br></center>
		</div>
		<div class="clear"></div>
		<div id="bsap_1253539" class="bsap_1253539 bsap">
			<div id="kecil" class="gal_home">
			<h3><i class="icon-gallery-archives">&nbsp;</i> <b> GALERI TERBARU</b></h3>
			<center>
			<?php    
			$poto=mysql_query("SELECT * FROM ".$DB_KODE."_galeri ORDER BY id_galeri DESC LIMIT 4");
			$hitungfoto=mysql_num_rows($poto);
			
			if($hitungfoto > 0){
			while($ph=mysql_fetch_array($poto)){
			?>
			<p class="thumb"><a id="thumb1" href="images/foto/galeri/<?php    echo "$ph[nama_galeri]";?>" class="highslide" onclick="return hs.expand(this)">
			<img src="images/foto/galeri/<?php    echo "$ph[nama_galeri]";?>" alt="Album Foto" title="Klik untuk memperbesar foto <?php    echo "$ph[judul]";?> | <?php    echo "$ph[deskripsi]";?>"/></a>
			</p>
			<?php     }}
			else {?>
			<b>Foto belum ada</b>
			<?php     } ?>
			</center>			
			</div>
			
			<div id="kecil" class="peng_home"  style="text-align:justify">
				<!-- Awal menampilkan pengumuman paling baru-->
				<h3><i class="icon-star-archives">&nbsp;</i> <b>PENGUMUMAN</b></h3>					
				<?php    
				$pengumuman=mysql_query("SELECT * FROM ".$DB_KODE."_pengumuman, ".$DB_KODE."_users WHERE ".$DB_KODE."_pengumuman.s_username=".$DB_KODE."_users.s_username ORDER BY id_pengumuman DESC");
				$cek_pengumuman=mysql_num_rows($pengumuman);
			

				if($cek_pengumuman > 0){
				$peng=mysql_fetch_array($pengumuman);
				echo "<b>$peng[judul_pengumuman]</b>
				<p>$peng[isi_pengumuman]</p>
				<p><b>Diterbitkan pada: $peng[tanggal_pengumuman]</b></p>
				<p><b>Oleh: $peng[nama_lengkap_users]</b></p>";
				}
				else {
				?>
				<p><b>Belum ada pengumuman</b></p>
				<?php     } ?>
				
			</div>			
	</div>
	

<script src="file/tema/<?php  echo $_SESSION['temaweb'] ;?>/js/jquery.adaptaslider.js"></script>
<script>
	// $(document).ready equivalent
	$(function() {
		// store a reference to this instance of adaptaSlider by
		// chaining .data('adaptaSlider') at the end
		var sliderAPI = $('#slider').adaptaSlider({
			mode: 'custom',
			autoPlay: true,
			transitionTime: 1000, // time is same as transition time in CSS
			prevButton: '.slider-prev',
			nextButton: '.slider-next',
			selectButton: '.slider-select',
			selectHTML: '<a href="#" class="select"></a>',
			selectHTMLNumbers: false,
			customTransition: function(slider, fromSlide, toSlide, time, easing, callback) {
				// call callback after time
				setTimeout(callback, time);
			},
			verbose: true
		}).data('adaptaSlider');

		// Testing to see if the API exists
		console.log('API exists: %s', sliderAPI.hasOwnProperty('settings'));
	});
</script>
<?php    }
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>		