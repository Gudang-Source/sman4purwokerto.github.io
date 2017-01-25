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
$title='Cari Data Pendaftaran Siswa Baru';
$descx=strtolower($title).' ';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='data psb '.$titlez;
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
<?php    
$cari = trim($_POST['cari']);
$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
$statuspsb=mysql_query("SELECT *FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan ='15'");
$r=mysql_fetch_array($statuspsb);
if ($r['nama_pengaturan']==1){
?>
<h3>Hasil Pencarian Pendaftar <a href=""><?php    echo "$ns[isi_pengaturan]";?></a></h3>

<form method="POST" action="index.php?p=datapsbpencarian" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol" style="margin-top: 20px" value="Cari">
</form>
<table class="garis" id="results">
	<tr>
		<th class="garis" width="35px">No</th><th class="garis">Nama Pendaftar</th><th class="garis">NEM</th><th class="garis">Sekolah Asal</th><th class="garis">Status</th>
	</tr>
	<?php    
	$no=1;
	$psb=mysql_query("SELECT * FROM ".$DB_KODE."_psb WHERE nama_psb LIKE '%$cari%' ORDER BY status_psb DESC");
	$hitungpsb=mysql_num_rows($psb);
	
	if ($hitungpsb > 0){
	while($r=mysql_fetch_array($psb)){
	?>
	<tr class="garis"><td class="garis"><?php    echo "$no";?></td>
		<td class="garis"><?php    echo "<b>$r[nama_psb]</b>";?></td>
		<td class="garis"><?php    echo "$r[nem]";?></td>
		<td class="garis"><?php    echo "$r[sekolah_asal]";?></td>
		<td class="garis"><?php   
		if ($r[status_psb]== 1){
		echo "<center><img src='kontenweb/terima.png'></center>";}
		else {
		echo "<center><img src='kontenweb/tolak.png'></center>";
		}?></td>
	</tr>
	<?php     $no++; }}
	else {?>
	<tr class="garis"><td class="garis" colspan="5"><b>Data tidak ditemukan</b></td></tr>
	<?php     } ?>
	
</table>
				<div id="pageNavPosition"></div>
		
		
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 50); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
	
<table style="margin-top: 20px; width: auto;">
<tr><td><img src="kontenweb/terima.png"></td><td>:</td><td>Daftar Ulang</td></tr>
<tr><td><img src="kontenweb/tolak.png"></td><td>:</td><td>Tidak memenuhi syarat/ belum dimoderasi</td></tr>
<tr><td colspan="3"><b>* Untuk mengetahui hasil moderasi, silahkan menunggu maksimal 1 x 24 jam kerja</b></td></tr>
</table>
<?php     } ?>
</div>
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

