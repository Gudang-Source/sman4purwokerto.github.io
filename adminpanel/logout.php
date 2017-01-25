<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

include "../konfigurasi/koneksi.php";
global $DB_KODE;
$KD_token=md5($DB_KODE);
$TIME_token=md5($KD_token);
if(!isset($_SESSION)){session_start();}  
unset($_SESSION['adminsh']);
unset($_SESSION['nickname']);
unset($_SESSION['nickmail']);
unset($_SESSION['nickurl']);
unset($_SESSION['namalengkap']);
unset($_SESSION['leveluser']);
unset($_SESSION[$KD_token]);
unset($_SESSION[$TIME_token]);

unset($_SESSION['FORMULASI_UP']);
header('location:login.php');
?>
<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

