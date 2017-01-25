<?php    
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 
if(!isset($_SESSION)){session_start();}   
 if (!isset($_SESSION['kontenisi'])){
header ('location:../index.php');
break;
}

$menuprofil=mysql_query("SELECT * FROM ".$DB_KODE."_info_sekolah WHERE posisi_menu ='0'");
while($mp=mysql_fetch_array($menuprofil)){

	echo "<li><a href="">$mp[nama_info]</a></li>";}
?>

<?php    
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>