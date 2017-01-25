<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
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
<h3>Tambah Foto</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="album_galeri.php?t=<?php echo $token; ?>">Album Galeri</a></div>
			<div class="menuhorisontalaktif"><a href="galeri_foto.php?t=<?php echo $token; ?>">Galeri Foto</a></div>
		</div>

		<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=galeri&untukdi=tambah'";?> name='tambahfoto' id='tambahfoto'   enctype="multipart/form-data" >
			
			<tr><td valign="top" class="isiankanan" width="175px">Nama Album</td><td class="isian">
					<select name="album_galeri">
						<option value="" selected>Pilih Album</option>
						<?php     $album=mysql_query("SELECT * FROM ".$DB_KODE."_album");
								while($a=mysql_fetch_array($album)) {
								echo "<option value='$a[id_album]'>$a[nama_album]</option>"; }
								?>
					</select>
			</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Foto</td><td class="isian"><input type="file" name="fupload"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Judul Foto</td><td class="isian"><input type="text" name="judul" class="maksimal" ></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Deskripsi</td><td class="isian"><textarea name="deskripsi" style="height: 100px"> </textarea></td></tr>
				
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Upload">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahfoto");
			frmvalidator.addValidation("album_galeri","req","Anda harus memilih album dahulu sebelum upload foto");
			frmvalidator.addValidation("fupload","req","Anda harus memilih foto dahulu sebelum upload foto");	
			frmvalidator.addValidation("judul","req","Berilah judul dan keterangan untuk foto ini");	
			
			frmvalidator.addValidation("fupload","file_extn=jpg","Jenis file yang diterima untuk foto adalah : jpg");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->

<?php   }
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>