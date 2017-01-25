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
				$back='style="background: #ccc url(file/tema/'. $_SESSION['temaweb'].'/images/header.jpg) no-repeat center;"';
			}
							$judul=$ns['isi_pengaturan'];
						    $judul = strtolower(preg_replace("/\s/","-",$judul));			
?>


<?php     include "kontenweb/tema/menu.php";?>

<div id="container"> 


 
<header role="banner" class="header wrap" >
<?php     include "kontenweb/tema/header.php";?>
</header>

<div id="content">
	<div id="inner-content" style="margin-top:5px;" class="wrap clearfix">
	
		<div id="main" class="col620 clearfix" role="main"> 
	
		<?php     konten() ?>	
	
</div>

		<div id="sidebar1" class="sidebar col300 clearfix" role="complementary">
			<div id="bsap_1253539" class="bsap_1253539 bsap">
	
		<?php global $kiri,$kanan;    if ($kiri==1){
	blok_kiri();
	}
	?>		
	</div>
				<div class="widget">
					<h4 class="widgettitle">Langganan Berita<span class="right">
					<a rel="nofollow" target="_blank" href="http://www.formulasi.or.id"><i class="icon-info-2"></i></a></span></h4>

					<div style="margin:20px">
					<form action="http://feedburner.google.com/fb/a/mailverify" id="subscribe" method="post" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=Formulasi', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" target="popupwindow"> 
					<input id="subscribe-text"   name="email" onblur="if (this.value == '') {this.value = 'Tulis Email Anda...';}" onfocus="if (this.value == 'Tulis Email Anda...') {this.value = '';}" value="Tulis Email Anda..." type="text"><input name="uri" value="Formulasi" type="hidden">
					<input name="loc" value="en_US" type="hidden">
					<input id="mc-embedded-subscribe" value="Enter" class="subscribe-button"  type="submit">
					</form>
					</div>
				</div>

<?php global $kiri,$kanan;    if ($kiri==0){
	blok_kanan();
	}
	?>
			
				

		</div>
	</div>
</div> 
<footer role="contentinfo" class="footer">
	<div id="inner-footer" class="wrap clearfix">
		<div id="footer-widgets" class="clearfix">
		
			<div class="footer-widget">
					<?php blok_atas(); ?>
			</div>
			<div class="footer-widget">
					<?php blok_bawah(); ?>
			</div>			
		
		</div>
		<div id="footer-widgets" class="clearfix">

			<div class="footer-foot"  style="margin-left: 20px;margin-right: 20px;" >
					<?php     include "kontenweb/tema/footer.php"; ?>
			</div>			
		</div>		
	</div>
</footer>

<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>
