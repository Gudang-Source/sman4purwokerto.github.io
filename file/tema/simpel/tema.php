<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
				$tema=$_SESSION['temaweb'];
			$temaheader=mysql_query("SELECT * FROM ".$DB_KODE."_header WHERE tema='$tema' ORDER BY id_header DESC limit 1");
			$header=mysql_fetch_array($temaheader);
			if($header['file_header']){
				$image_header=$header['file_header'];
				$back='style="background: url(images/header/'.$image_header.') no-repeat center;"';
			}else{
				$back='style="background: url(file/tema/'.$_SESSION['temaweb'].'/images/header.jpg) no-repeat center;"';
			}
?>

<div id="wrap">

<div id="header" <?php  echo $back;?>>
	<?php     include "kontenweb/tema/header.php";?>
</div>
<div style="clear: both;"> </div>
<div id="menu" style="width: 1054px; background-color: #cccccc;"  >
<?php     include "kontenweb/tema/menu.php";?>
</div>

	<div style="clear: both;"> </div>
	
<div id="content" >
	<?php global $slide;  if ($slide==1){?>
	
	<script src="file/tema/<?php $_SESSION['temaweb']?>/js/slides.min.jquery.js"></script>
		<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'file/tema/<?php $_SESSION['temaweb']?>/img/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true,
				animationStart: function(current){
					$('.caption').animate({
						bottom:-275
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:0
					},200);
				}
			});
		});
	</script>
	    <script type="text/javascript"> 
$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
	</script>
<?php 			
		$cek_slidehome=mysql_query("SELECT * FROM ".$DB_KODE."_berita WHERE status_terbit='1' AND status_headline='1'");
		$hasil_slide=mysql_num_rows($cek_slidehome);
		
		if($hasil_slide > 0){
		?>
		<div id="headlineFrame">
			<div id="headline">
			<div id="slides">
				<div class="slides_container">
					<?php    
					$slide_berita=mysql_query("SELECT * FROM ".$DB_KODE."_berita, ".$DB_KODE."_users WHERE ".$DB_KODE."_berita.s_username=".$DB_KODE."_users.s_username AND status_terbit='1' AND status_headline='1' LIMIT 6");
					while ($sb=mysql_fetch_array($slide_berita)){
					$isi_berita = strip_tags($sb['isi_berita']); 
					$isi = substr($isi_berita,0,200);
					?>
					<div class="slide">
					<a href="<?php    echo "?p=detberita&id=$sb[id_berita]"; ?>" title=""><img src="images/<?php    echo $sb['gambar_kecil']?>" width="630" height="280" alt="Slide 1"></a>
						<div class="caption" style="bottom:0">
							<p><b style="font-size: 16px"><?php    echo $sb['judul_berita']?></b><br>
							<small>Tanggal: <?php     echo $sb['tanggal_posting']?>, Oleh: <?php     echo $sb['nama_lengkap_users']?></small><br>
							<?php     echo $isi ?></p>
							<br><a href="<?php    echo "?p=detberita&id=$sb[id_berita]"; ?>">Baca selengkapnya...</a>
						</div>
					</div>
					<?php     } ?>
					
					<!--<a href="" title="" target="_blank"><img src="images/1.jpg" width="930" height="280" alt="Slide 1"></a>
					<a href="" title="" target="_blank"><img src="images/2.jpg" width="930" height="280" alt="Slide 1"></a>
					<a href="" title="" target="_blank"><img src="images/3.jpg" width="930" height="280" alt="Slide 1"></a>-->
				</div>
				<a href="#" class="prev"><img src="file/tema/<?php  echo $_SESSION['temaweb'] ;?>/img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
				<a href="#" class="next"><img src="file/tema/<?php  echo $_SESSION['temaweb'] ;?>/img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
			</div>
			</div>
		</div>
		<?php     } ?>	
	
	<?php     } ?> 

	<?php global $kiri;  if ($kiri==0){?>  	

	<div id="left">
		<?php  blok_kiri();?>  
	</div>
	
	<div id="right">
	<?php  }else{?>  

	<div id="rightno">

	<?php  }?> 		
		<?php  blok_atas();?>  
	<div style="clear: both;"> </div>
			<?php global $kanan;  if ($kanan==0){?>

	<?php global $kiri;  if ($kiri==0){?>  				
		<div class="contentleft">

	<?php  }else{?>

		<div class="contentleftno">

	<?php  }?> 	
			<?php     konten() ?>
		</div>
	
		<div class="contentright">		
			<?php  blok_kanan();?>  
		</div>
	
			<?php  }else{?>
		<div class="contentlefts">
			<?php     konten() ?>
		</div>			
			<?php  }?>  		
	<div style="clear: both;"> </div>
		<?php  blok_bawah();?>
	</div>

</div>

<div style="clear: both;"> </div>

<div style="clear: both; height: 10px"> <br><br></div>
<div style="margin:0 10px 0 10px;">
<?php     include "kontenweb/tema/footer.php"; ?>	
</div>


<br><br>
</div>







<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>
