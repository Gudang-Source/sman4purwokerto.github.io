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
$title='Profil '.$_SESSION['Bsiswa'];
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
<h3>Data <?php echo $_SESSION['Bsiswa']; ?> <a href=""><?php    echo "$ns[isi_pengaturan]";?></a></h3>

<form method="POST" action="gender-link.html" style="float:left">
<select name="jk" onChange="this.form.submit()">
	<option selected>Jenis Kelamin</option>
	<option value="L">Laki laki</option>
	<option value="P">Perempuan</option>
</select>
</form>

<form method="POST" action="kategori-link.html" style="float:left; margin-left: 5px">
<select name="kategori" onChange="this.form.submit()">
	<option selected>Kelas</option>
	<?php    
	$kategori=mysql_query("SELECT * FROM ".$DB_KODE."_kategori ORDER BY id_kategori");
	while($k=mysql_fetch_array($kategori)){
	?>
	<option value="<?php    echo "$k[id_kategori]";?>"><?php    echo "$k[nama_kategori]";?></option>
	<?php     } ?>
</select>
</form>

<form method="POST" action="cari-link.html" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol" style="margin-bottom: 20px" value="Cari">
</form>

<table class="garis" id="results">
<tr><th class="garis" width="20px">No</th><th class="garis"><?php echo $_SESSION['Bsiswa']; ?></th><th class="garis">JK</th><th class="garis">Kelas</th></tr>
<?php    
$no=1;
$link=mysql_query("SELECT * FROM ".$DB_KODE."_link, ".$DB_KODE."_kategori WHERE ".$DB_KODE."_link.id_kategori=".$DB_KODE."_kategori.id_kategori  AND status_link='1' ORDER BY nama_link ASC");
$hitunglink=mysql_num_rows($link);

if($hitunglink > 0){
while($r=mysql_fetch_array($link)){
?>
<tr class="garis"><td class="garis"><?php    echo "$no";?></td>
	<?php    
	$detaildata=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='4'");
	$dd=mysql_fetch_array($detaildata);
		if (isset($dd['isi_pengaturan'])== 0){
	?>
	<td class="garis"><b><?php    echo "$r[nama_link]";?></b></td>
	<?php     }
	else { 

						$judul=$r['nama_link'].'9a9z9'.$ns['isi_pengaturan'];							
						$judul = strtolower(preg_replace("/\s/","9a9z9",$judul));
						$judul = preg_replace('#\W#', '', $judul);								
						$judul = str_replace("9a9z9","-",$judul);
						$url_link = "profil-link-".$r['nis']."-".$judul.".html";
		
	?>
	
	<td class="garis"><a href="<?php    echo $url_link;?>" title="Klik untuk melihat detail data"><b><?php    echo "$r[nama_link]";?></b></a></td>
	<?php     } ?>
	<td class="garis"><?php    echo "$r[jenkel]";?></td>
	<td class="garis"><?php    echo "$r[nama_kategori]";?></td>
</tr>
<?php     $no++; }}
else { ?>
<tr class="garis"><td colspan="4"><b>Data link belum ada</b></td></tr>
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
<?php    } ?>

<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>