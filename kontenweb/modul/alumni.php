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
$title='Profil Alumni';
$descx=strtolower($title).' ';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='data '.$titlez;
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
<h3>Data Alumni <a href=""><?php    echo "$ns[isi_pengaturan]";?></a></h3>

<form method="POST" action="gender-alumni.html" style="float:left">
<select name="jk" onChange="this.form.submit()">
	<option selected>Jenis Kelamin</option>
	<option value="L">Laki laki</option>
	<option value="P">Perempuan</option>
</select>
</form>

<form method="POST" action="cari-alumni.html" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol" style="margin-bottom: 20px" value="Cari">
</form>

<table class="garis" id="results">
<tr><th class="garis" width="20px">No</th><th class="garis">Nama Alumni</th><th class="garis">JK</th><th class="garis">Tahun Lulus</th></tr>
<?php    
$no=1;
$alumni=mysql_query("SELECT * FROM ".$DB_KODE."_siswa WHERE status_siswa='0' ORDER BY nama_siswa ASC");
$hitungalumni=mysql_num_rows($alumni);

if($hitungalumni > 0){
while($r=mysql_fetch_array($alumni)){
?>
<tr class="garis"><td class="garis"><?php    echo "$no";?></td>
	<?php    
	$detaildata=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='5'");
	$dd=mysql_fetch_array($detaildata);
		if ($dd['isi_pengaturan']== 0){
	?>
	<td class="garis"><b><?php    echo "$r[nama_siswa]";?></b></td>
	<?php     }
	else { 
	

						$judul=$r['nama_siswa'].'9a9z9'.$ns['isi_pengaturan'];							
						$judul = strtolower(preg_replace("/\s/","9a9z9",$judul));
						$judul = preg_replace('#\W#', '', $judul);								
						$judul = str_replace("9a9z9","-",$judul);
						$url_link = "profil-alumni-".$r['id_siswa']."-".$judul.".html";
		
	
	?>
	
	<td class="garis"><a href="<?php    echo $url_link;?>" title="Klik untuk melihat detail data"><b><?php    echo "$r[nama_siswa]";?></b></a></td>
	<?php     } ?>
	<td class="garis"><?php    echo "$r[jenkel]";?></td>
	<td class="garis"><?php    echo "$r[tahun_lulus]";?></td>
</tr>
<?php     $no++; }}

else { ?>
<tr class="garis"><td colspan="4"><b>Data alumni belum ada</b></td></tr>
<?php     } ?>
</table>
				<div id="pageNavPosition"></div>
		
		
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 30); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
	
<?php    
$formalumni=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='7'");
$f=mysql_fetch_array($formalumni);

if (isset($f['isi_pengaturan']) != 0){
?>
<p style="margin-top: 30px">
					<?php     
							$judul=$ns['isi_pengaturan'];
						    $judul = strtolower(preg_replace("/\s/","-",$judul));
					
					?>
Klik <a href="formulir-data-alumni-<?php    echo $judul;?>.html"><b>&raquo;disini&laquo;</b></a> untuk mengisi form data alumni
</p>
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

