<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 
	include "konfigurasi/koneksi.php";
require_once('konfigurasi/db.inc.php');
require_once('konfigurasi/rss_factory.inc.php');
global $DB_KODE;
$namasekolah1=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='8'");
$ns=mysql_fetch_array($namasekolah1);
$web=$ns['isi_pengaturan'];
$namasekolah2=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='1'");
$ns2=mysql_fetch_array($namasekolah2);
$url=$ns2['isi_pengaturan'];
if(substr($url, 0, 7) == "http://") {
 $sSiteUrl = $url;
}else{
if(substr($url, 0, 7) == "https://") {
 $sSiteUrl = $url;
}else{
$sSiteUrl = 'http://'.$url;
}
}

if(substr($sSiteUrl, -1) == "/") {
 $sSiteUrl = $sSiteUrl;
}else{
$sSiteUrl = $sSiteUrl.'/';
}




$sRssIcon = 'images/logo.png';

$fIsiRSS = array();

$sSQL = "SELECT * FROM  ".$DB_KODE."_berita ORDER BY `id_berita` DESC limit 10";
$fIsi = $GLOBALS['MySQL']->getAll($sSQL);
foreach ($fIsi as $iID => $formula_Info) {
						    $judul = strtolower(preg_replace("/\s/","9a9z9",$formula_Info['judul_berita']));						
								$judul = preg_replace('#\W#', '', $judul);								
							$judul = str_replace("9a9z9","-",$judul);
							$url_link = "info-".$formula_Info['id_berita']."-".$judul.".html";
	$isi_berita = strip_tags($formula_Info['isi_berita']); 
						$isi_info = substr($isi_berita,0,500)." ... <a href='$url_link' title=' $formula_Info[judul_berita]'>selengkapnya $formula_Info[judul_berita]</a>";						
    $iStoryID = (int)$formula_Info['id_berita'];
							$gambar="<a href='$url_link' title=' $formula_Info[judul_berita]'><img src='images/$formula_Info[gambar_kecil]' width='100px' margin='5' align='left' style='float:left; margin: 5px 10px 0 10px; padding: 3px; background: #fff; border: 1px solid #dcdcdc'></a>";
$isi=$gambar.''.$isi_info;
    $fIsiRSS[$iID]['Guid'] = $iStoryID;
    $fIsiRSS[$iID]['Title'] = $formula_Info['judul_berita'];
    $fIsiRSS[$iID]['Link'] = $sSiteUrl . '' . $url_link;
    $fIsiRSS[$iID]['Desc'] = $isi;
    $fIsiRSS[$iID]['DateTime'] = $formula_Info['tanggal_posting'];
}

$oRssFactory = new RssFactory();

header('Content-Type: text/xml; charset=utf-8');

echo $oRssFactory->GenRssByData($fIsiRSS, $web, $sSiteUrl. 'sitemap.xml', $sRssIcon);

/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

?>