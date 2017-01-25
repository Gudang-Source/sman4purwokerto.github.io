<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>
<div class="judulbox">Komentar Terbaru</div>
<?php    
	$komentarterbaru = mysql_query("SELECT * FROM ".$DB_KODE."_komentar, ".$DB_KODE."_berita WHERE ".$DB_KODE."_komentar.id_berita=".$DB_KODE."_berita.id_berita ORDER BY id_komentar DESC LIMIT 8");
	$hitungkomen=mysql_num_rows($komentarterbaru);
	
	if ($hitungkomen != 0){
	while ($kt=mysql_fetch_array($komentarterbaru)) {
?>
			<div class="komen">
			<a href="<?php    echo "mailto:$kt[email_komentar]"; ?>"><b><?php    echo  "$kt[nama_komentar]" ;?></b></a> pada 
			<a href="<?php    echo "berita.php?pilih=edit&id=$kt[id_berita]" ;?>"><?php    echo "$kt[judul_berita]" ;?></a> (<?php    echo "$kt[tanggal_komentar]" ;?>)<br>
			<?php     echo "$kt[isi_komentar]"; ?>
			<hr>
			</div>
<?php     } }

else { ?>
			<div class="komen">
			<b>Belum ada data komentar</b>
			<hr>
			</div>
<?php     } ?>
<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>
