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
				$back='style="background: url(file/tema/'. $_SESSION['temaweb'].'/images/header.jpg) no-repeat center;"';
			}
?>
  <div id="main">
    <header>
      <div id="logo"  <?php  echo $back;?> >

		<?php     include "kontenweb/tema/header.php"; ?>
      </div>
      <nav>
        <div id="menu_container">
			<?php     include "kontenweb/tema/menu.php";?>
        </div>
      </nav>
    </header>
    <div id="site_content">
	<div class="clear"></div>
	
<?php  blok_atas();?>

	<div class="clear"></div>
	
      
	<?php global $kiri,$kanan;    if ($kiri==0){?>      
		<div id="sidebarki_container">
		  
	  
  <br>
			  <?php  blok_kiri();?>

		</div>
		<style>
	#lebar {
		width: 680px;
		padding: 15px;
		margin-right: 20px;
		margin-left: 20px;
		float: left;
		background: #fff;
		border: 1px solid #dcdcdc;
		margin-bottom: 20px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		border-radius: 5px;
	}			
		</style>
		<div class="contentka">
			  <?php     konten() ?>
		  </div>

	<?php  } elseif ($kanan==0){?>
		<div id="sidebar_container">
		  
	  
			  
			  
		  <img class="paperclip" src="file/tema/<?php  echo $_SESSION['temaweb'] ;?>/images/paperclip.png" alt="paperclip" />
		  <div class="sidebar">
		    <h3><b>Agenda</b></h3>
					<?php    
					$agenda=mysql_query("SELECT * FROM ".$DB_KODE."_agenda ORDER BY id_agenda DESC limit 1");
					$hitungagenda=mysql_num_rows($agenda);
					global $ns;
					if($hitungagenda > 0){
					while($ag=mysql_fetch_array($agenda)){
							$judul=$ns['isi_pengaturan'];
						    $judul = strtolower(preg_replace("/\s/","-",$judul));
					?>
						<H4><b><?php    echo "<a href='agenda-$judul.html'>$ag[judul_agenda]</a>";?></b></h4>
						<small>pada tanggal <b><?php    echo "$ag[tanggal_agenda]";?></b></small><br>
						<p style="font-size: 15px;color: #000;text-align: justify">	<b>Tempat : </b><?php    echo "$ag[tempat_agenda]";?><br>
							<b>Keterangan : </b><?php    echo "$ag[keterangan_agenda]";?> </p>
					<?php     }}
					else {?>
					<p><b><a href="">Data agenda belum ada</a></b></p>
					<?php     } ?>		    
				</div>
	  
			  <?php  blok_kanan();?>
	  
		</div>
      <div class="content">
		<?php     konten() ?>
	</div>
		
 	<?php  }?>
	

	<div class="clear"></div>
	
   <?php  blok_bawah();?>
   
	<div class="clear"></div>
	
    </div>
	<div class="clear"></div>
 
  <p>&nbsp;</p>   
    <footer>
		<?php     include "kontenweb/tema/footer.php"; ?>
    </footer>
  </div>
  <p>&nbsp;</p>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="file/tema/<?php  echo $_SESSION['temaweb'] ;?>/js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="file/tema/<?php  echo $_SESSION['temaweb'] ;?>/js/jquery.sooperfish.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>





<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>
