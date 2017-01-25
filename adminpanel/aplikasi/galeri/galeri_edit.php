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
<h3>Edit Foto</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="album_galeri.php?t=<?php echo $token; ?>">Album Galeri</a></div>
			<div class="menuhorisontalaktif"><a href="galeri_foto.php?t=<?php echo $token; ?>">Galeri Foto</a></div>
		</div>

		<?php   if(isset($_SESSION['salah'])){   
		?><center><?php
		echo $_SESSION['salah'];
		?>
		<br>Anda hanya diperkenankan upload jenis file "bmp", "jpg", "gif", "png", "BMP", "JPG", "GIF", "PNG", "Bmp", "Jpg", "Gif", "Png".
		</center>
		<?php } ?>
		
		<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=galeri&untukdi=edit'";?> name='editfoto' id='editfoto'  enctype="multipart/form-data"  >
		<?php    $id=ceknomor($_GET['id']);
		$edit=mysql_query("SELECT * FROM ".$DB_KODE."_galeri, ".$DB_KODE."_album WHERE ".$DB_KODE."_galeri.id_album=".$DB_KODE."_album.id_album AND id_galeri='$id'");
		$r=mysql_fetch_array($edit);
		
		echo "<input type='hidden' name='id' value='$r[id_galeri]'>";
		?>
			<tr><td valign="top" class="isiankanan" width="175px">Nama Album</td><td class="isian">
					<select name="album">
						<option value="<?php    echo "$r[id_album]";?>" selected><?php    echo "$r[nama_album]";?></option>
						<?php    
						$album=mysql_query("SELECT * FROM ".$DB_KODE."_album WHERE id_album!=$r[id_album]");
						while($ag=mysql_fetch_array($album)){
						?>
						<option value="<?php    echo "$ag[id_album]";?>"><?php    echo "$ag[nama_album]";?></option>
						<?php     } ?>
					</select>
			</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Foto Sebelumnya</td><td class="isian">
			<a href="../images/foto/galeri/<?php    echo "$r[nama_galeri]";?>" class="highslide" onclick="return hs.expand(this)"><img src="../images/foto/galeri/<?php    echo "$r[nama_galeri]";?>" width="200px"><a></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Ganti Foto</td><td class="isian"><input type="file" name="fupload"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Judul Foto</td><td class="isian"><input type="text" name="judul" class="maksimal" value="<?php    echo "$r[judul]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Deskripsi</td><td class="isian"><textarea name="deskripsi" style="height: 100px"><?php     echo "$r[deskripsi]";?></textarea></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editfoto");
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