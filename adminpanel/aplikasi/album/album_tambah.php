<?php   
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

if (!isset($_SESSION['adminsh']))
{
	gogo('../../../index.php');
	exit;
}
else{ 
?>
<h3>Tambah Album Galeri</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="album_galeri.php?t=<?php echo $token; ?>">Album Galeri</a></div>
			<div class="menuhorisontal"><a href="galeri_foto.php?t=<?php echo $token; ?>">Galeri Foto</a></div>
		</div>

		<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=album&untukdi=tambah'";?> name='tambahalbum' id='tambahalbum' enctype="multipart/form-data">
			
			<tr><td valign="top" class="isiankanan" width="175px">Nama Album</td><td class="isian"><input type="text" name="nama_album" class="maksimal"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Foto Sampul</td><td class="isian"><input type="file" name="fupload"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Deskripsi</td><td class="isian"><textarea name="deskripsi" style="height: 100px"></textarea></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahalbum");
			frmvalidator.addValidation("nama_album","req","Nama album harus diisi");
			frmvalidator.addValidation("nama_album","maxlen=30","Nama album maksimal 50 karakter");
			
			frmvalidator.addValidation("fupload","file_extn=jpg;gif;png","Jenis file yang diterima untuk foto sampul adalah : jpg, gif, png");
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
}?>