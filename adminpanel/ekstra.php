<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */


if(!isset($_SESSION)){session_start();}  
error_reporting(0);
if (!isset($_SESSION['adminsh']))
{
	header('location:login.php');
	exit;
}
else{ ?>
<!--Memanggil awal halaman-->
<?php     //include "konten/awal.php"; ?>
<?php     include "konten/awal_tiny_pbm.php"; ?>
<body>
<div id="wrapper"><!--Awal id wrapper-->
	<div id="atas"><!--Awal id atas-->

		<!--Memanggil bagian header-->
		<?php     include "konten/header.php";  adminku();  ?> 
		
	</div><!--Akhir id atas-->
	<div class="clear"></div>
	
	<div id="konten"><!--Awal id konten-->
		<div id="samping"><!--Awal id samping-->
		<?php     include "konten/sidebar.php"; ?> 
		</div><!--Akhir id samping-->
		
		<div id="kanan"><!--Awal id kanan-->
<?php 		$dir='ekstra';
		$plugin=mysql_query("SELECT * FROM ".$DB_KODE."_plugin WHERE folder_plugin='$dir'  and status=1 limit 1");		
		$r2s=mysql_fetch_array($plugin);
		if($r2s['status']==1){		
?>		
		<?php global $la;  if($la['ekstra']==1){ ?>
					<?php     include "plugin/".$dir."/".$dir."_data.php"; ?>
	<?php  } ?>	
		<?php  }else{ ?>	
					<?php     include "aplikasi/plugin.php"; ?>
		<?php  } ?>		
		</div><!--Akhir id kanan-->
	
		<div class="clear"></div>
	</div><!--Akhir id konten-->
</div><!--Akhir id wrapper-->

	<div class="clear"></div>
	<!--Memanggil bagian footer-->
<?php     include "konten/footer.php"; }?>
<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>


