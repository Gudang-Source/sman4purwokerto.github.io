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
<h3>Edit Pindah Keluar<?php echo $_SESSION['Bsekolah']; ?></h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">

<?php 			include "aplikasi/pindah/header.php"; ?>
		</div>

		<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=pindah&untukdi=edit'";?> name='editpindah' id='editpindah'   enctype="multipart/form-data">
		<?php   
$id=ceknomor($_GET['id']);		
		$edit=mysql_query("SELECT * FROM ".$DB_KODE."_siswa WHERE id_siswa='$id'");
		$r=mysql_fetch_array($edit);
		
		echo "<input type='hidden' name='id' value='$r[id_siswa]'>";
		?>
			
			<tr><td valign="top" class="isiankanan" width="175px">Nama</td><td class="isian"><input type="text" name="nama_pindah" class="maksimal" value="<?php    echo"$r[nama_siswa]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Foto</td><td class="isian"><img src="../images/foto/siswa/<?php    echo "$r[foto]";?>" width="200px">
				<?php     if ($r[foto] !='no_photo.jpg'){?>
				<br><br>
				<a href="<?php    echo "$database?t=$token&pilih=siswa&untukdi=hapusgambar&id=$r[id_siswa]";?>"><b><u>Hapus gambar</u></b></a>
				<?php     }?>
				</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Ganti Foto</td><td class="isian"><input type="file" name="fupload"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Jenis Kelamin</td>
			<td class="isian">
			<?php     if ($r[jenkel]=='L'){ ?>
					<input type="radio" name="jk" value="L" checked/>Laki-laki&nbsp;
					<input type="radio" name="jk" value="P"/>Perempuan
			<?php     }
			else {
			?>
					<input type="radio" name="jk" value="L"/>Laki-laki&nbsp;
					<input type="radio" name="jk" value="P" checked/>Perempuan
			<?php     } ?>
			</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Tempat, Tanggal Lahir</td><td class="isian">
			<input type="text" name="tempat_lahir" class="pendek" value="<?php    echo"$r[tempat_lahir]";?>">, 
			<input type="text" id="tanggal" name="tanggal_lahir" class="pendek" style="width:20%" value="<?php    echo"$r[tanggal_lahir]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Alamat</td><td class="isian"><textarea name="alamat" style="height: 100px"><?php    echo"$r[alamat]";?></textarea></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Tahun Pindah/Keluar</td><td class="isian">
			<?php    
				$thn_skrg=date("Y");
				echo "<select name=tahun_lulus>
				<option value='$r[tahun_lulus]' selected>$r[tahun_lulus]</option>";
				for ($thn=1990;$thn<=$thn_skrg;$thn++){
				echo "<option value=$thn>$thn</option>";
				}
				echo "</select>"; ?>
			</td></tr>
			
			<tr><td valign="top" class="isiankanan" width="175px">Email</td><td class="isian"><input type="text" name="email" class="pendek"value="<?php    echo"$r[email]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Telepon/ HP</td><td class="isian"><input type="text" name="telepon" class="pendek"value="<?php    echo"$r[telepon]";?>"></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="175px">Keterangan Pindah/Keluar</td><td class="isian"><input type="text" name="pekerjaan_sekarang" class="maksimal"value="<?php    echo"$r[pekerjaan_sekarang]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Informasi Tambahan</td><td class="isian"><textarea name="info_tambahan" style="height: 100px"><?php    echo"$r[info_tambahan]";?></textarea></td></tr>

			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editpindah");
			frmvalidator.addValidation("nama_pindah","req","Nama pindah harus diisi");
			frmvalidator.addValidation("nama_pindah","maxlen=30","Nama pindah maksimal 30 karakter");
			frmvalidator.addValidation("nama_pindah","minlen=3","Nama pindah minimal 3 karakter");
	  
			frmvalidator.addValidation("tahun_lulus","req","Tahun lulus harus diisi");
			frmvalidator.addValidation("tahun_lulus","maxlen=4","Tahun lulus diisi 4 angka");
			frmvalidator.addValidation("tahun_lulus","minlen=4","Tahun lulus diisi 4 angka");
			frmvalidator.addValidation("tahun_lulus","numeric","Tahun lulus hanya boleh ditulis dengan angka");
			
			frmvalidator.addValidation("tempat_lahir","req","Tempat lahir harus diisi");
			frmvalidator.addValidation("tanggal_lahir","req","Tanggal lahir harus diisi");
			
			frmvalidator.addValidation("email","email","Format email salah");
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