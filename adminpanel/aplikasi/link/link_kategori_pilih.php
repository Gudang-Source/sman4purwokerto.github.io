<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

if (!isset($_SESSION['adminsh']))
{
	gogo('../../../index.php');
	exit;
}
else{ 



	$database="aplikasi/link/link.php";
	switch($_GET['pilih']){
	default: ?>
	<h3>Kategori</h3>
	<div class="isikanan"><!--Awal class isi kanan-->
		<div class="judulisikanan">

<?php 			include "aplikasi/link/header.php"; ?>	
		</div>
		
		<div class="atastabel" style="margin: 30px 10px 0 10px">
			
		</div>
		
				<div class="kanankecil">
				<!--menampilkan informasi website-->
				<?php     include "aplikasi/link/link_kategori_tambah.php"; ?>
				</div>
				
				<div class="kanankecil">
				<!--Menampilkan form pengumuman pada halaman dashboard, form ini digunakan sebagai shortcut atau jalan pintas
				yang tidak mengharuskan admin untuk masuk ke modul pengumuman-->
				<?php     include "aplikasi/link/link_kategori_data.php"; ?>
				</div>
				<div class="clear"></div>
				</div><!--Akhir class isi kanan-->
	<?php     
	}
	?>

<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

}
?>

