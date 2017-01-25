<?php   
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

if (!isset($_SESSION['adminsh']))
{
	gogo('../../index.php');
	exit;
}
else{ 
?>
<h3>Tambah Materi Pelajaran (E-learning)</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">


<?php 			include "aplikasi/materi/header.php"; ?>
		</div>

		<table class="isian">
		<form method='POST' action="?t=<?php echo $token; ?>&pilih=tambah2" name='tambahmapel' id='tambahmapel' enctype="multipart/form-data">
			<tr><td class="isiankanan" width="175px">Mata Pelajaran</td><td class="isian">
												<select name="mapel">
												<option value="" selected>Pilih Mata Pelajaran...</option>
												<?php     $mapel=mysql_query("SELECT * FROM ".$DB_KODE."_mapel ORDER BY nama_mapel");
														while($mp=mysql_fetch_array($mapel)){
														echo "<option value='$mp[id_mapel]'>$mp[nama_mapel]</option>"; } ?>
												</select>
			</td></tr>
			<tr><td class="isian" colspan="2">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			<input type="submit" class="pencet" value="Lanjut&nbsp;&raquo;">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahmapel");
			frmvalidator.addValidation("mapel","req","Anda harus memilih mata pelajaran");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->

<?php   
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

}
?>

