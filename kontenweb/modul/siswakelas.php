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

if (isset($_GET['kelas'])){
$kelasku=ceknomor($_GET['kelas']);
} elseif (isset($_POST['kelas'])){
$kelasku=ceknomor($_POST['kelas']);
}else{
header ('location:index.php');
break;
}


function meta() {
global $ns, $r, $kelasku;

$web=$ns['isi_pengaturan'];
$title='Profil '.$_SESSION['Bsiswa'].' Kelas';
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
global $DB_KODE, $ns, $kelasku;
?>
<div id="konten">
<div id="lebar">
<h3>Data <?php echo $_SESSION['Bsiswa']; ?><a href=""><?php    echo "$ns[isi_pengaturan]";?></a></h3>

<form method="POST" action="gender-siswa.html" style="float:left">
<select name="jk" onChange="this.form.submit()">
	<option selected>Jenis Kelamin</option>
	<option value="L">Laki laki</option>
	<option value="P">Perempuan</option>
</select>
</form>

<form method="POST" action="kelas-siswa.html" style="float:left; margin-left: 5px">
<select name="kelas" onChange="this.form.submit()">
	<option selected>Kelas</option>
	<?php    
	$kelas=mysql_query("SELECT * FROM ".$DB_KODE."_kelas ORDER BY id_kelas");
	while($k=mysql_fetch_array($kelas)){
	?>
	<option value="<?php    echo "$k[id_kelas]";?>"><?php    echo "$k[nama_kelas]";?></option>
	<?php     } ?>
</select>
</form>

<form method="POST" action="cari-siswa.html" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol" style="margin-bottom: 20px" value="Cari">
</form>

<table class="garis" id="results">
<tr><th class="garis" width="20px">No</th><th class="garis"><?php echo $_SESSION['Bsiswa']; ?></th><th class="garis">JK</th><th class="garis">Kelas</th></tr>
<?php    
$no=1;

$siswa=mysql_query("SELECT * FROM ".$DB_KODE."_siswa, ".$DB_KODE."_kelas WHERE ".$DB_KODE."_siswa.id_kelas=".$DB_KODE."_kelas.id_kelas  AND status_siswa='1' AND ".$DB_KODE."_siswa.id_kelas='$kelasku' ORDER BY nama_siswa ASC");
$hitung=mysql_num_rows($siswa);
if ($hitung > 0){
while($r=mysql_fetch_array($siswa)){
?>
<tr class="garis"><td class="garis"><?php    echo "$no";?></td>
	<?php    
	$detaildata=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='4'");
	$dd=mysql_fetch_array($detaildata);
		if (isset($dd['isi_pengaturan'])== 0){
	?>
	<td class="garis"><b><?php    echo "$r[nama_siswa]";?></b></td>
	<?php     }
	else { 
						$judul=$r['nama_siswa'].'9a9z9'.$ns['isi_pengaturan'];							
						$judul = strtolower(preg_replace("/\s/","9a9z9",$judul));
						$judul = preg_replace('#\W#', '', $judul);								
						$judul = str_replace("9a9z9","-",$judul);
						$url_link = "profil-siswa-".$r['nis']."-".$judul.".html";	
	
	?>
	
	<td class="garis"><a href="<?php    echo $url_link;?>" title="Klik untuk melihat detail data"><b><?php    echo "$r[nama_siswa]";?></b></a></td>
	<?php     } ?>
	<td class="garis"><?php    echo "$r[jenkel]";?></td>
	<td class="garis"><?php    echo "$r[nama_kelas]";?></td>
</tr>
<?php     $no++; } }

else { ?>
<tr class="garis"><td class="garis" colspan="4">Data <?php echo $_SESSION['Bsiswa']; ?> dengan kelas
<?php    

$nama_kelas=mysql_query("SELECT * FROM ".$DB_KODE."_kelas WHERE id_kelas='$kelasku'");
$nk=mysql_fetch_array($nama_kelas);
echo "$nk[nama_kelas]";
?> belum tersedia </td></tr>
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