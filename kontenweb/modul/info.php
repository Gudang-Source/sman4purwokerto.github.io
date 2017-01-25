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


global $DB_KODE, $ns;
if(isset($_GET['id'])){
$idx=ceknomor($_GET['id']);
}else{
$idx=1;
}
$info=mysql_query("SELECT * FROM ".$DB_KODE."_info_sekolah WHERE id_info='$idx'");
$r=mysql_fetch_array($info);

function meta() {
global $ns, $r;
$web=$ns['isi_pengaturan'];
$title=$r['nama_info'];
$titlez=$r['nama_info'].' '.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$r['nama_info'].', '.$web.', '.$r['nama_info'].' '.$web.', '.$web.' '.$r['nama_info'];
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$isi='';
$desc='profil '.$titlez.' '.$r['isi_info'];
$description=desc($isi,$desc);
$judul='';
$title=titx($judul,$title);
$title=$title.' - '.$web;
echo "<title>$title</title>
<meta name='description' content='$description'>
<meta name='keywords' content='$keywords'> ";
}


function konten() {
global $r, $ns;
?>

<div id="konten">
<div id="lebar">
<h3><?php    echo $r['nama_info'];?></h3>
<p><?php    echo $r['isi_info'];?></p>
</div>
</div>
<?php    } ?>

<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>
