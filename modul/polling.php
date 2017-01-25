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


function meta() {
global $ns, $r;
$web=$ns['isi_pengaturan'];
$title='Polling';
$descx=strtolower($title).' ';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='Survey '.$titlez;
$isi='';
$description=desc($isi,$descx);
$judul='';
$title=titx($judul,$title);
$title=$title.' - '.$web;
echo "<title>$title</title>
<meta name='description' content='$description'>
<meta name='keywords' content='$keywords'> ";
}


function konten() {
global $DB_KODE, $ns;
?>
<div id="konten">
<div id="lebar">
<h3>Data Hasil Polling</h3>
<p>Berikut ini adalah hasil polling dari pengunjung website, terimakasih telah berpartisipasi dalam pengisian polling.</p>
<table style=";margin-top: 20px">
<?php    
$jml=mysql_query("SELECT SUM(isi1) as hitung FROM ".$DB_KODE."_sidebar WHERE jenis='polling' AND status='1' AND isi2 !='pertanyaan'");
$tp=mysql_fetch_array($jml);

$hasilpolling=mysql_query("SELECT * FROM ".$DB_KODE."_sidebar WHERE jenis='polling' AND status ='1' AND isi2 !='pertanyaan'");
while ($r=mysql_fetch_array($hasilpolling)){
$persen=($r['isi1']!=0)?($r['isi1']/$tp['hitung']) * 100:0; 
?>
	<tr><td width="230px"><b><?php    echo "$r[nama]";?></b>&nbsp(<?php    printf("%1.0f" , $persen);echo "%";?>)</td><td>
	<img src="kontenweb/blue.jpg" height="38px" width="<?php    $panjang=$persen/100* 300; echo "$panjang"; ?>"></td></tr>
<?php     }?>
</table>
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