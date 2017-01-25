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
$title='Formulir Data Alumni';
$descx=strtolower($title).' ';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='formulir data '.$titlez;
$isi='';
$description=desc($isi,$descx);
$judul='';
$title=titx($judul,$title);
$title=$title.' - '.$web;
echo "<title>$title</title>
<meta name='description' content='$description'>
<meta name='keywords' content='$keywords'> ";
?>
	<link rel="stylesheet" type="text/css" href="kontenweb/tema/tcal.css" />
	<script type="text/javascript" src="kontenweb/tema/tcal.js"></script> 
<?php 
}

function konten() {
global $DB_KODE, $ns;
?>
<div id="konten">
<div id="lebar">
<?php    
$formalumni=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='7'");
$f=mysql_fetch_array($formalumni);

if (isset($f['isi_pengaturan']) != 0){
?>
<h3>Form Alumni <a href=""><?php    echo "$ns[isi_pengaturan]";?></a></h3>
<p style="margin-top: 20px">
Silahkan mengisi data alumni pada form dibawah ini, diharapkan data yang anda masukkan adalah data yang valid.
</p>
<?php $xx=gett();?>

<form method="POST" action="kontenweb/insert_alumni.php?x=<?php echo $xx;?>" name="tambahalumni" id="tambahalumni">
<table style="margin-top: 20px">
	<tr><td width="135px"><b>Nama Alumni *</b></td><td><input type="text" name="nama_alumni" class="sedang"></td></tr>
			<tr><td width="135px"><b>Jenis Kelamin *</b></td>
			<td>
					<input type="radio" name="jk" value="L"/>Laki-laki&nbsp;
					<input type="radio" name="jk" value="P"/>Perempuan
			</td></tr>
			<tr><td width="135px"><b>Tempat, Tanggal Lahir *</b></td><td>
			<input type="text" name="tempat_lahir" class="sedang">, 
			<input type="text" id="tanggal" name="tanggal_lahir"  class="tcal"></td></tr>
			<tr><td width="135px"><b>Alamat</b></td><td><textarea name="alamat" style="height: 100px"></textarea></td></tr>
			<tr><td width="135px"><b>Tahun Lulus *</b></td><td>
			<?php    
				$thn_skrg=date("Y");
				echo "<select name=tahun_lulus style='margin: 0;'>
				<option value='' selected>Pilih Tahun</option>";
				for ($thn=1990;$thn<=$thn_skrg;$thn++){
				echo "<option value=$thn>$thn</option>";
				}
				echo "</select>"; ?>
			</td></tr>
			
			<tr><td width="135px"><b>Email</b></td><td><input type="text" name="email" class="sedang"></td></tr>
			<tr><td width="135px"><b>Telepon/ HP</b></td><td><input type="text" name="telepon" class="sedang"></td></tr>
			
			<tr><td width="135px"><b>Pekerjaan Sekarang</b></td><td><input type="text" name="pekerjaan_sekarang" class="panjang"></td></tr>
			<tr><td width="135px"><b>Informasi Tambahan</b></td><td><textarea name="info_tambahan" style="height: 100px"></textarea></td></tr>
			<tr><td>&nbsp;</td><td>
			<img src="kontenweb/captcha-pesan.php?date=<?php    echo date('YmdHis');?>" alt="security image" />
			</td></tr>
			<tr><td>&nbsp;</td><td><input type="text" name="kode" class="pendek">&nbsp;<small><i>Masukkan kode diatas</i></td></tr>
			<tr><td></td><td>
			<input type="submit" class="tombol" value="Simpan">
			<input type="reset" class="tombol" value="Reset">
			</td></tr>
</table>
</form>
<?php     include "kontenweb/tema/form_alumni.php"; } ?>
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
