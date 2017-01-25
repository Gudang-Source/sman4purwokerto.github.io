<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */



if (!isset($_SESSION['adminsh']))
{
	header('location:login.php');
	exit;
}
else{
include "../konfigurasi/koneksi.php";	
	if (!isset($_SESSION['kontenadmin']))
	{
	$nt=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='17'");
	$t=mysql_fetch_array($nt);
	$userdata=$t['isi_pengaturan']
	$cks2=base64_decode($userdata);
	$marva='ZEhKbGRtRT0=';
	$marva=base64_decode($marva);
		$marva=base64_decode($marva);
	$cek = str_replace($marva,"",$cks2);
	$login=mysql_query("SELECT * FROM ".$DB_KODE."_users WHERE email_users='$cek'");
	$ketemu=mysql_num_rows($login);
	$r=mysql_fetch_array($login);
		if ($ketemu > 0){
		  $_SESSION['kontenadmin']      = $t['isi_pengaturan'];
		}
	}
}
function adminformulasi(){

}

?>
<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>


