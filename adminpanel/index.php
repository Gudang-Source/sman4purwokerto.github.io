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
else{ 

include "../konfigurasi/koneksi.php";
$namasekolah2=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='1'");
$ns2=mysql_fetch_array($namasekolah2);
$url=$ns2['isi_pengaturan'];
if($url=='localhost'){
$sSiteUrl = 'http://'.$url;
}
elseif(substr($url, 0, 7) == "http://") {
 $sSiteUrl = $url;
}elseif(substr($url, 0, 7) == "https://") {
 $sSiteUrl = $url;
}else{
$sSiteUrl = 'http://'.$url;

}

if(substr($sSiteUrl, -1) == "/") {
 $sSiteUrl = $sSiteUrl;
}else{
$sSiteUrl = $sSiteUrl.'/';
}
$_SESSION['urlweb']=$sSiteUrl ;

?>

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
			<h3>Dashboard <?php echo $url; ?></h3>
			
				<div class="kanankecil">
				
				<!--menampilkan informasi website-->
				<?php     include "konten/informasi_website.php"; ?>
<style>#creditfooter { display: none;}</style>
<center><a target="_blank" href="http://cms.formulasi.or.id"><img src="http://feeds.feedburner.com/CmsFormulasi.1.gif" alt="Info CMS Formulasi" style="border:0"></a></center>				
				
				</div>

				<div class="kanankecil">
				<!--Menampilkan form pengumuman pada halaman dashboard, form ini digunakan sebagai shortcut atau jalan pintas
				yang tidak mengharuskan admin untuk masuk ke modul pengumuman-->
				<?php     include "konten/form_pengumuman.php"; ?>
				</div>
						
				<div class="clear"></div>
				
				<div class="kanankecil">
				<!--Menampilkan 5 komentar berita terbaru-->
				<?php     include "konten/komentar_terbaru.php"; ?>	
				</div>

				<div class="kanankecil">
				<?php     include "konten/info_cms.php"; ?>
				</div>			
			<div class="clear"></div>				
				<div class="kanankecil">
				<?php     include "konten/info_psb.php"; ?>
				</div>	
				
				<div class="kanankecil" >
				<?php     include "konten/banner.php"; ?>
				</div>
				
		</div><!--Akhir id kanan-->
	
	</div><!--Akhir id konten-->
	<div class="clear"></div>
	
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


