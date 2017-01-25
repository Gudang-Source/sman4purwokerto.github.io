<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 
session_start(); 
 if (!isset($_SESSION['kontenisi'])){
header ('location:../../index.php');
break;
}
if (isset($_SESSION['siswa']) OR isset($_SESSION['guru'])){
if (isset($_POST['text'])) {


include "../../konfigurasi/koneksi.php";

$ddd=$_POST['text'];
	$query = "INSERT INTO ".$DB_KODE."_chat (pesan) VALUES ('$ddd')";
	
}
}else{
header ('location:../../index.php');;
}
   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 
?>