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
<?php     include "konten/awal.php"; ?>
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
				
<?php global $la;  if($la['guru_staff']==1){ ?>					
					<?php     include "aplikasi/guru/guru_data.php"; ?>
<?php  }else{ echo"<center><b>Ma'af Anda tidak diijinkan mengkases halaman ini<b><br>silahkan hubungi administrator bila ingin mengakses halaman ini.</center>";} ?>	
				
					
				
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

