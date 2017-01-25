<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 
if (!isset($_SESSION)) {
  if(!isset($_SESSION)){session_start();}  
}
 error_reporting(0); 
 if (!isset($_SESSION['kontenisi'])){
header ('location:../../index.php');
break;
}


function newt($nekot){
	global $DB_KODE;
	
	$DB_KODEx=md5("anak".$DB_KODE."soleh");
	$KD_nekot=md5($DB_KODEx);
	unset($_SESSION[$KD_nekot]);
	$ttx = md5(md5(uniqid()));	
	 $_SESSION[$KD_nekot] = md5("nailah".$DB_KODE."soleh".$ttx);
}



function reft($nekot){
	global $DB_KODE;
	
	$DB_KODEx=md5("anak".$DB_KODE."soleh");
	$KD_nekot=md5($DB_KODEx);
	unset($_SESSION[$KD_nekot]);

}


function gett($nekot){
	global $DB_KODE;
	
	$DB_KODEx=md5("anak".$DB_KODE."soleh");
	$KD_nekot=md5($DB_KODEx);
	$nekot=$_SESSION[$KD_nekot];
	return $nekot;
}

/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 
?>

