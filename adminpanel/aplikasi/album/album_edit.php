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
<h3>Edit Album Galeri</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="album_galeri.php?t=<?php echo $token; ?>">Album Galeri</a></div>
			<div class="menuhorisontal"><a href="galeri_foto.php?t=<?php echo $token; ?>">Galeri Foto</a></div>
		</div>

		<?php   if(isset($_SESSION['salah'])){   
		?><center><?php
		echo $_SESSION['salah'];
		?>
		<br>Anda hanya diperkenankan upload jenis file "bmp", "jpg", "gif", "png", "BMP", "JPG", "GIF", "PNG", "Bmp", "Jpg", "Gif", "Png".
		</center>
		<?php } ?>
		
		<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=album&untukdi=edit'";?> name='editalbum' id='editalbum' enctype="multipart/form-data">
			<?php    

			$id=ceknomor($_GET['id']);
			$edit=mysql_query("SELECT * FROM ".$DB_KODE."_album WHERE id_album=$id");
			$r=mysql_fetch_array($edit);
			
			echo "<input type='hidden' name='id' value='$r[id_album]'";
			?>
			<tr><td valign="top" class="isiankanan" width="175px">Nama Album</td><td class="isian"><input type="text" name="nama_album" class="maksimal" value="<?php    echo "$r[nama_album]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Foto Sampul</td><td class="isian"><img src="../images/foto/galeri/album/<?php    echo "$r[foto_album]";?>" width="200px"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Ganti Foto Sampul</td><td class="isian"><input type="file" name="fupload"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Deskripsi</td><td class="isian"><textarea name="deskripsi" style="height: 100px"><?php     echo "$r[deskripsi_album]";?></textarea></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editalbum");
			frmvalidator.addValidation("nama_album","req","Nama album harus diisi");
			frmvalidator.addValidation("nama_album","maxlen=30","Nama album maksimal 50 karakter");
			
			frmvalidator.addValidation("fupload","file_extn=jpg;gif;png","Jenis file yang diterima untuk foto sampul adalah : jpg, gif, png");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->

<?php   }
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>