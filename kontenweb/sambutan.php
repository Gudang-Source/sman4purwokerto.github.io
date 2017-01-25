<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
  if (!isset($_SESSION['kontenisi'])){
header ('location:../../index.php');
break;
}

$sambutankepsek=mysql_query("SELECT * FROM ".$DB_KODE."_info_sekolah WHERE id_info='1'");
$sk=mysql_fetch_array($sambutankepsek);

echo "<h3>$sk[nama_info]</h3>
		<p>$sk[isi_info]</p>";
?>

<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>