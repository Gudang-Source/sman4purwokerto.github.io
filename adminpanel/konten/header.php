<?php  
if(!isset($_SESSION)){session_start();}   error_reporting(0);  
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
   include "konten/fungsi.php"; include "../adminpanel/data.php";  adminku();
   if (isset($_GET['t'])){
	$t=$_GET['t'];
}elseif (isset($_POST['t'])){
	$t=$_POST['t'];
}
global $DB_KODE;
$KD_token=md5($DB_KODE);
echo $_SESSION['$KD_token'];
//nailah($t);
if (isset($_SESSION[$KD_token])) {
$token=nt();
}

$qGuru=mysql_query("SELECT * FROM ".$DB_KODE."_bahasa WHERE Sekolah='Guru'");
$rGuru=mysql_fetch_array($qGuru);
$qSiswa=mysql_query("SELECT * FROM ".$DB_KODE."_bahasa WHERE Sekolah='Siswa'");
$rSiswa=mysql_fetch_array($qSiswa);
$qSekolah=mysql_query("SELECT * FROM ".$DB_KODE."_bahasa WHERE Sekolah='Sekolah'");
$rSekolah=mysql_fetch_array($qSekolah);
$qkepala=mysql_query("SELECT * FROM ".$DB_KODE."_bahasa WHERE Sekolah='Kepala'");
$rKepala=mysql_fetch_array($qkepala);
if (isset($_SESSION['jenjang'])){
$j=$_SESSION['jenjang'];
	 if($j<7){
		 $_SESSION['Bguru']="Guru";
		 $_SESSION['Bsiswa']="Siswa";
		 $_SESSION['Bsekolah']="Sekolah";
		 $_SESSION['Bkepala']="Kepala";

	 } elseif($j==7){
		 $_SESSION['Bguru']="Tutor";
		 $_SESSION['Bsiswa']="Siswa";
		 $_SESSION['Bsekolah']="LPK";
		 $_SESSION['Bkepala']="Pimpinan";
	 } elseif($j==8){
		 $_SESSION['Bguru']=$rGuru['perguruantinggi'];
		 $_SESSION['Bsiswa']=$rSiswa['perguruantinggi'];
		 $_SESSION['Bsekolah']=$rSekolah['perguruantinggi'];
		 $_SESSION['Bkepala']=$rKepala['perguruantinggi'];
	 } elseif($j==15){
		 $_SESSION['Bguru']=$rGuru['instansi'];
		 $_SESSION['Bsiswa']=$rSiswa['instansi'];
		 $_SESSION['Bsekolah']=$rSekolah['instansi'];
		 $_SESSION['Bkepala']=$rKepala['instansi'];
	 } elseif($j==17){
		 $_SESSION['Bguru']=$rGuru['blog'];
		 $_SESSION['Bsiswa']=$rSiswa['blog'];
		 $_SESSION['Bsekolah']=$rSekolah['blog'];
		 $_SESSION['Bkepala']=$rKepala['blog'];
	 } elseif($j==18){
		 $_SESSION['Bguru']=$rGuru['perusahaan'];
		 $_SESSION['Bsiswa']=$rSiswa['perusahaan'];
		 $_SESSION['Bsekolah']=$rSekolah['perusahaan'];
		 $_SESSION['Bkepala']=$rKepala['perusahaan'];
	 }elseif($j==36){
		 $_SESSION['Bguru']=$rGuru['pesantren'];
		 $_SESSION['Bsiswa']=$rSiswa['pesantren'];
		 $_SESSION['Bsekolah']=$rSekolah['pesantren'];
		 $_SESSION['Bkepala']=$rKepala['pesantren'];
	 }elseif($j==7){
		 $_SESSION['Bguru']=$rGuru['komunitas'];
		 $_SESSION['Bsiswa']=$rSiswa['komunitas'];
		 $_SESSION['Bsekolah']=$rSekolah['komunitas'];
		 $_SESSION['Bkepala']=$rKepala['komunitas'];
	 }

}

?>

<link rel="Shortcut Icon" href="../favicon.ico" type="image/x-icon" />

		<div id="admin">
		<?php    
		if ($_SESSION['leveluser']== '0'){
		?>
		Selamat Datang, <a href="<?php    echo "admin.php?pilih=edit&id=$datauser[id_users]"; ?>" title="Profil Saya"><?php    echo "$_SESSION[namalengkap]";?></a>
		<?php     }
		else { ?>
		Selamat Datang, <a href="<?php    echo "admin.php"; ?>" title="Profil Saya"><?php    echo "$_SESSION[namalengkap]";?></a>
		<?php     } ?>| <a href='logout.php' onClick="return confirm ('Apakah anda benar-benar akan keluar dari sistem?')" title='Log out'>Logout</a>
		</div>
		<div class="logo">
<script style="display:none" language="Javascript" type="text/javascript">

  function togglegambar(showHideDiv, switchImgTag, showLebarDiv) {
  var ele = document.getElementById(showHideDiv);
  var imageEle = document.getElementById(switchImgTag);
    var Lebar = document.getElementById(showLebarDiv);
     if(ele.style.display == "none") {   
     ele.style.display = "block";     
     Lebar.style.width="80%";
     imageEle.innerHTML = '<img class="aligncenter" title="Sembunyikan" src="images/menub.png" alt="tanda minus"  />';
     }  else {
     ele.style.display = "none";      
     Lebar.style.width="100%"; 
     imageEle.innerHTML = '<img class="aligncenter" title="Tampilkan" src="images/menu.png" alt="tanda plus"  />';
     }
  }

  </script>

<a id="imageDivLink" href="javascript:togglegambar('contentDivImg', 'imageDivLink', 'kanan');">
 <img class="aligncenter" title="Tampilkan" src="images/menu.png" alt="tanda plus"  /></a>
			
			<a href="http://cms.formulasi.or.id/" target="_blank"><img src="images/logo.png"></a>
		</div>
		
		<?php     
		$namasekolah=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='8'");
		$ns=mysql_fetch_array($namasekolah);
		
		$urlsekolah=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='1'");
		$us=mysql_fetch_array($urlsekolah);
		
		$userlink=mysql_query("SELECT * FROM ".$DB_KODE."_users WHERE s_username='$_SESSION[adminsh]'");
		$datauser=mysql_fetch_array($userlink);
		?>
		<div class="front">
		<a href="http://<?php    echo "$us[isi_pengaturan]";?>" target="_blank" title="Kunjungi Website"><?php    echo "$ns[isi_pengaturan]";?></a><br>
		</div>
		

		
		<div class="clear"></div>
	

<?php  

/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>
