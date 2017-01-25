<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 
//captcha-pesan.php

include "../konfigurasi/koneksi.php";
if(!isset($_SESSION)){session_start();}  
$alphaNumeric  = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
$random = substr(str_shuffle($alphaNumeric), 0, 5);
$image = imagecreatefromjpeg("background.jpg");
$textColor = imagecolorallocate ($image, 0, 0, 0); //black
imagestring ($image, 5, 5, 8,  $random, $textColor); 

$_SESSION[$DB_KODE.'poiuytrewq'] = md5(md5($random.'poiuytrewq'.$DB_KODE));
//$_SESSION['login_random_value'] = md5(md5($random));
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false); 
header("Pragma: no-cache"); 	
header('Content-type: image/jpeg');
imagejpeg($image);
imagedestroy($image);
?>

<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>