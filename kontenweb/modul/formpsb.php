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
$title='Formulir Pendaftaran '.$_SESSION['Bsiswa'].' Baru';
$descx=strtolower($title).' ';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='psb '.$titlez;
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
$statuspsb=mysql_query("SELECT *FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan ='15'");
$r=mysql_fetch_array($statuspsb);
?>
<?php     
if ($r['nama_pengaturan']==1){
?>
<h3>Form Pendaftaran <?php echo $_SESSION['Bsiswa'];?> Baru <a href=""><?php    echo "$ns[isi_pengaturan]";?></a></h3>
<?php $xx=gett();?>

<form method ="POST" action="kontenweb/insert_psb.php?x=<?php echo $xx;?>" name="formpsb" id="formpsb"  enctype="multipart/form-data">
<table style="margin-top: 20px">
	<tr><td width="150px"><b>Nama Lengkap *</b></td><td>:</td><td><input type="text" class="sedang" name="nama"></td></tr>
<?php   //	<tr><td valign="top" class="isiankanan" width="175px"><b>Foto</b> max 300x400 pixel</td><td>:</td><td><input type="file" name="fupload"></td></tr>	
?>
	<tr><td><b>Rata-rata NEM *</b></td><td>:</td><td><input type="text" class="pendek" name="nem"><br>
	<small>Jika ada tanda koma (') maka diganti dengan tanda titik (.)</small></td></tr>
	<tr><td><b>Jenis Kelamin *</b></td><td>:</td><td>
	<input type="radio" name="jk" id="jk" value="L">Laki-laki&nbsp;
	<input type="radio" name="jk" id="jk" value="P">Perempuan
	</td></tr>
<?php  	
$jenjang=$_SESSION['jenjang'];
$jenjang=$jenjang-1;
?>
	<tr><td><b><?php echo $_SESSION['Bsekolah'];?> Asal *</b></td><td>:</td><td><input type="text" class="panjang" name="sekolah_asal"></td></tr>
	<tr><td><b>No. Peserta Ujian Nasional  *</b></td><td>:</td><td><input type="text" class="sedang" name="no_sttb"></td></tr>
<?php   //	<tr><td><b>Tanggal Pelaksanaan UN *</b></td><td>:</td><td><input type="text" id="tanggal1" name="tanggal_sttb" class="tcal"></td></tr> 
 ?>
	<tr><td><b>Tempat, Tanggal Lahir *</b></td><td>:</td><td><input type="text" class="sedang" name="tempat_lahir">&nbsp;<input type="text" class="tcal" name="tanggal_lahir" id="tanggal"></td></tr>
	<tr><td><b>Berat Badan</b></td><td>:</td><td><input type="text" class="pendek" name="bb">&nbsp; kg</td></tr>
	<tr><td><b>Tinggi Badan</b></td><td>:</td><td><input type="text" class="pendek" name="tb">&nbsp; cm</td></tr>
	<tr><td><b>Alamat Lengkap *</b></td><td>:</td><td><textarea style="height: 125px" name="alamat"></textarea></td></tr>
	<tr><td><b>Telepon</b></td><td>:</td><td><input type="text" class="sedang" name="telepon"></td></tr>
	<tr><td><b>Email</b></td><td>:</td><td><input type="text" class="sedang" name="email"></td></tr>
	<tr><td><b>Nama Orang Tua *</b></td><td>:</td><td><input type="text" class="sedang" name="nama_ortu"></td></tr>
	<tr><td><b>Pekerjaan Orang Tua *</b></td><td>:</td><td>
		<select name="pekerjaan_ortu">
			<option value="" selected>Pilih Pekerjaan..</option>
			<?php    
			$pekerjaan=mysql_query("SELECT * FROM ".$DB_KODE."_pekerjaan");
			while ($r=mysql_fetch_array($pekerjaan)){
			echo " <option value=$r[id_pekerjaan]>$r[nama_pekerjaan]</option>";} ?>
		</select>
	</td></tr>
	<tr><td colspan="3" style="border: 1px dashed #5b5b5b; padding: 20px;background: #fcffea;"><b>Darimanakah anda mengetahui PSB ONLINE <a href=""><?php    echo "$ns[isi_pengaturan]"?></a></b><br><br>
	<input type="radio" name="polling" id="polling" value="Media Cetak">Media Cetak<br><br>
	<input type="radio" name="polling" id="polling" value="Internet">Internet<br><br>
	<input type="radio" name="polling" id="polling" value="Teman">Teman<br><br>
	<input type="radio" name="polling" id="polling" value="Kerabat">Kerabat<br><br>
	</td></tr>
	<tr><td colspan="3"><br><img src="kontenweb/captcha-pesan.php?date=<?php    echo date('YmdHis');?>" alt="security image" /></td></tr>
	<tr><td colspan="3"><input type="text" name="kode" class="pendek">&nbsp;<small><i>Masukkan kode diatas</i></td></tr>
	<tr><td colspan="3"><br>
	<input type="submit" class="tombol" value="Daftar">
	<input type="reset" class="tombol" value="Reset">
	
	</td></tr>
</table>
</form>
<?php      include "kontenweb/tema/form.php";?>
<?php      } ?>
</div>
</div>
<?php      } ?>
<?php     
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>
