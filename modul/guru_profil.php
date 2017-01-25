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
$title='Profil Guru Pelajaran';
$descx=strtolower($title).' ';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='mata pelajaran '.$titlez;
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
<h3>Data Guru <a href=""><?php    echo "$ns[isi_pengaturan]";?></a></h3>

<form method="POST" action="gender-guru.html" style="float:left">
<select name="jk" onChange="this.form.submit()">
	<option selected>Jenis Kelamin</option>
	<option value="L">Laki laki</option>
	<option value="P">Perempuan</option>
</select>
</form>

<form method="POST" action="cari-guru.html" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol"  style="margin-bottom: 20px" value="Cari">
</form>

<table class="garis" id="results">
<tr><th class="garis" width="20px">No</th><th class="garis">Nama Staff Pengajar</th><th class="garis">JK</th><th class="garis">Mengajar</th></tr>
<?php    
$no=1;
$gurustaff=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff, ".$DB_KODE."_mapel WHERE ".$DB_KODE."_guru_staff.id_mapel=".$DB_KODE."_mapel.id_mapel AND posisi='guru' ORDER BY nama_gurustaff ASC");
$hitungguru=mysql_num_rows($gurustaff);

if($hitungguru > 0){
while($r=mysql_fetch_array($gurustaff)){
?>
<tr class="garis"><td class="garis"><?php    echo "$no";?></td>
	<?php    
	$detaildata=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='6'");
	$dd=mysql_fetch_array($detaildata);
		if (isset($dd['isi_pengaturan'])== 0){
	?>
	<td class="garis"><b><?php    echo "$r[nama_gurustaff]";?></b></td>
	<?php     }
	else { 
							$judul=$r['nama_gurustaff'].'9a9z9'.$ns['isi_pengaturan'];							
						    $judul = strtolower(preg_replace("/\s/","9a9z9",$judul));
								$judul = preg_replace('#\W#', '', $judul);								
							$judul = str_replace("9a9z9","-",$judul);
							$url_link = "profil-guru-".$r['nip']."-".$judul.".html";
	
	?>
	
	<td class="garis"><a href="<?php    echo $url_link;?>" title="Klik untuk melihat detail data"><b><?php    echo "$r[nama_gurustaff]";?></b></a></td>
	<?php     } ?>
	<td class="garis"><?php    echo "$r[jenkel]";?></td>
	<td class="garis"><?php    echo "$r[nama_mapel]";?></td>
</tr>
<?php     $no++; }}

else { ?>
<tr class="garis"><td colspan="4"><b>Data guru belum ada</b></td></tr>
<?php     } ?>
</table>
				<div id="pageNavPosition"></div>
		
		
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 30); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
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

