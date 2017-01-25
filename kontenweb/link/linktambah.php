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
$title='Tukar link';
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
if (isset($_POST['pilih'])){$pilih=ceking($_POST['pilih']);
}else{$pilih="";}
if (isset($_POST['untukdi'])){
$untukdi=ceking($_POST['untukdi']);
}else{$untukdi="";}
?>
<div id="konten">
<div id="lebar">
<?php	
if ($pilih=='link' AND $untukdi=='tambah'){
	if(md5($_POST['kode']) == $_SESSION['lkjhgfdsa'.$DB_KODE]){
	$nama_link=ceking($_POST['nama_link']);
	$url_link=strip_tags($_POST['url_link']);
	$isi2=ceking($_POST['isi2']);
	$kat=ceking($_POST['kategori']);
		mysql_query("INSERT INTO ".$DB_KODE."_sidebar
					(jenis, status, nama, isi1, isi2, kategori)
					VALUES
					(	'link',
						'0',
						'$nama_link',
						'$url_link',
						'$isi2',
						'$kat')");
	}				
?>
<center>Terimakasih, link anda telah ditambahkan, menunggu persetujuan admin.</center>
<?php
}else{
?>

<form method="POST" action="cari-link.html" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol" style="margin-bottom: 20px" value="Cari">  <input type="button" class="tombol"  value="Kirim link" onclick="window.location.href='tambah-tukar-link.html';">
</form>	
<h3>Direktori Link <a href=""><?php    echo "$ns[isi_pengaturan]";?></a></h3>

		<table class="isian">
		<form method='POST' <?php     echo "action=''";?> name='tambahlink' id='tambahlink' >
		<input type="hidden" name="pilih" value="link">
		<input type="hidden" name="untukdi" value="tambah">
			<tr><td valign="top" class="isiankanan" width="100px">Nama Link</td><td class="isian"><input type="text" name="nama_link" class="sedang"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Masukkan nama website atau instansi yang diinginkan
			</i><br><hr></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="100px">URL</td><td class="isian"><input type="text" name="url_link" class="sedang"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Masukkan url website tanpa di awali dengan http:// , contoh <b>www.formulasi.or.id</b>
			</i><br><hr></td></tr>
			<tr><td valign="top" class="isiankanan" width="100px">Keterangan</td><td class="isian"><textarea type="text" name="isi2" class="sedang"></textarea></td></tr>
			
							<tr><td valign="top" class="isiankanan"  style="width: 40px;">Kategori</td>
							<td class="isian">
									<select name="kategori">
										<option value="" selected>Pilih kategori</option>
										<?php    
											$kat=mysql_query("SELECT * FROM ".$DB_KODE."_kategori where fungsi='link' ORDER BY nama_kategori ASC");
											while($k=mysql_fetch_array($kat)){
											echo "<option value='$k[id_kategori]'>$k[nama_kategori]</option>";}
										?>
									</select>
							</td></tr>
	<tr><td></td><td><img src="kontenweb/captcha-pesan.php?date=<?php    echo date('YmdHis');?>" alt="security image" /></td></tr>
	<tr><td></td><td><input type="text" name="kode" class="pendek">&nbsp;<small><i>Masukkan kode diatas</i></td></tr>							
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Kirim">
			<input type="reset" class="hapus" value="Reset">
			</td></tr>
		</form>
		
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahlink");
			frmvalidator.addValidation("nama_link","kategori","Kategori link harus diisi");
			frmvalidator.addValidation("nama_link","req","Nama link harus diisi");
			frmvalidator.addValidation("nama_link","maxlen=20","Nama link maksimal 20 karakter");
			frmvalidator.addValidation("nama_link","minlen=3","Nama link minimal 3 karakter");
			frmvalidator.addValidation("isi2","req","Keterangan link harus diisi");
			frmvalidator.addValidation("kode","req","Kode keamanan harus diisi");
			
			frmvalidator.addValidation("url_link","req","URL harus diisi");
			frmvalidator.addValidation("url_link","maxlen=250","URL  maksimal 250 karakter");
			
			
			//]]>
		</script>
		</table>
<?php    } ?>		
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