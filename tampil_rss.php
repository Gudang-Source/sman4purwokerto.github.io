<?php    
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
   
	include "konfigurasi/koneksi.php";
require_once('konfigurasi/db.inc.php');
global $DB_KODE;

$iStoryID = (int)$_GET['id'];
if ($iStoryID > 0) {
    $formula_Info = $GLOBALS['MySQL']->getRow("SELECT * FROM ".$DB_KODE."_berita WHERE `id_berita`='{$iStoryID}'");

    $sStoryTitle = $formula_Info['judul_berita'];
    $sStoryDesc = $formula_Info['isi_berita'];

    echo <<<EOF
<h1>{$sStoryTitle}</h1>
<div>{$sStoryDesc}</div>
<hr />
<div><a href="index.php">Kembali ke RSS</a></div>
EOF;
}
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */


?>