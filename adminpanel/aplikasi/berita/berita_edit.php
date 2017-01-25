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


$id=ceknomor($_GET['id']);		
$edit=mysql_query("SELECT * FROM ".$DB_KODE."_berita, ".$DB_KODE."_kategori WHERE ".$DB_KODE."_berita.id_kategori=".$DB_KODE."_kategori.id_kategori AND id_berita='$id'");
$r=mysql_fetch_array($edit);
?>
<h3>Edit Berita</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">

<?php 			include "aplikasi/berita/header.php"; ?>	
		</div>
		
		<table class="isian">
		<form method='POST' name="editberita" id="editberita" enctype="multipart/form-data"<?php     echo "action='$database?t=$token&pilih=berita&untukdi=edit'"; ?>>
		<?php     echo "<input type='hidden' name='id' value=$r[id_berita]"; ?>
			<tr><td class="isian" colspan="2"><input type="text" class="maksimal" name="judul_berita"
			value=<?php    echo "'$r[judul_berita]'";?>></td></tr>
			
			<tr><td class="isian" colspan="2"><textarea class="tini" id="tini" name="isi_berita"><?php    echo "$r[isi_berita]";?></textarea></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="100px">Gambar Kecil</td>
				<td class="isian"><img src="../images/<?php    echo $r[gambar_kecil] ?>" width="200px">
				<?php     if ($r[gambar_kecil] !='no_image.jpg'){?>
				<br><br>
				<a href="<?php    echo "$database?t=$token&pilih=berita&untukdi=hapusgambar&id=$r[id_berita]";?>"><b><u>Hapus gambar</u></b></a>
				<?php     } ?>
				</td>
			</tr>
			
			<tr><td valign="top" class="isiankanan" width="100px">Ganti Gambar</td>
				<td class="isian"><input type="file" name="fupload"></td>
			</tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>Gambar kecil digunakan untuk headline halaman depan website dan summary pada halaman arsip</i><br><hr></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="100px">Kategori</td>
				<td class="isian">
					<select name="kategori">
					<?php    
					echo "
					<option value=$r[id_kategori]>$r[nama_kategori]</option>";
					$kategoriberita=mysql_query("SELECT * FROM ".$DB_KODE."_kategori WHERE id_kategori!=$r[id_kategori] AND fungsi<>'link'");
					while ($kb=mysql_fetch_array($kategoriberita)){
					echo " <option value='$kb[id_kategori]'>$kb[nama_kategori]</option>";} ?>
					</select>
				</td>
			</tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>Pilih kategori untuk berita, anda bisa memilih kategori lebih dari satu. Jika anda tidak memilih kategori maka secara otomatis diinputkan "Tanpa Kategori"</i><br><hr></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="100px">Terima Komentar</td>
				<td class="isian">
				<?php    
				if ($r[status_komentar]==0){
				echo "
					<input type='radio' name='status_komentar' value='1'>Ya&nbsp;
					<input type='radio' name='status_komentar' value='0' checked/>Tidak";}
				else {
				echo "
					<input type='radio' name='status_komentar' value='1' checked/>Ya&nbsp;
					<input type='radio' name='status_komentar' value='0'>Tidak";
				}?>
				</td>
			</tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>Anda bisa menonaktifkan form komentar pada berita dengan memilih "Tidak"</i><br><hr></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="100px">Headline</td>
				<td class="isian">
				<?php    
				if ($r[status_headline]==0){
				echo "
					<input type='radio' name='status_headline' value='1'>Ya&nbsp;
					<input type='radio' name='status_headline' value='0' checked/>Tidak";}
				else {
				echo "
					<input type='radio' name='status_headline' value='1' checked/>Ya&nbsp;
					<input type='radio' name='status_headline' value='0'>Tidak";
				}?>
				</td>
			</tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>Setiap berita yang anda tulis dapat dijadikan sebagai headline pada halaman utama website. Dengan catatan berita harus mempuntai gambar kecil, jika tidak ada gambar kecil maka akan diinputkan gambar default</i><br><hr></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script>
			CKEDITOR.replace( 'tini' );
		</script>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editberita");
			frmvalidator.addValidation("judul_berita","req","Judul berita harus diisi");
			frmvalidator.addValidation("judul_berita","maxlen=100","Judul berita maksimal 100 karakter");
			frmvalidator.addValidation("judul_berita","minlen=5","Judul berita minimal 5 karakter");
	  
			frmvalidator.addValidation("fupload","file_extn=jpg;gif;png","Jenis file yang diterima untuk gambar adalah : jpg, gif, png");
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