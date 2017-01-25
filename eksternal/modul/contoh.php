<?php    
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
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
$descx='contoh modul ';
$title='Contoh Modul';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='modul pelajaran '.$titlez;
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





<h3>Contoh Modul</h3>
		<table class="garis">
			<tr><th class="garis" width="30">No</th>
				<th class="garis" width="175">Contoh Modul</th>
				<th class="garis">Deskripsi</th>
			</tr>
			<?php 
			$no=1;
			$contoh=mysql_query("SELECT * FROM ".$DB_KODE."_contoh ORDER BY id_contoh ASC");
			while($data=mysql_fetch_array($contoh)){
			

			?>
			<tr><td class="garis" width="30"><?php echo $no?></td>
				<td class="garis"><b><?php echo $data['nama_contoh']?></b></td>
				<td class="garis"><b><?php echo $data['deskripsi_contoh']?></b></td>

			</tr>
			<?php  $no++; } ?>
		</table>

		
		
</div>
</div>
<?php     } ?>

<?php    


/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

