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

<h3>Tambah Pindah Keluar<?php echo $_SESSION['Bsekolah']; ?></h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">

<?php 			include "aplikasi/pindah/header.php"; ?>
		</div>

		<table class="isian">
		<form method='POST' <?php     echo "action='$database?t=$token&pilih=pindah&untukdi=tambah'";?>  name='tambahpindah' id='tambahpindah'   enctype="multipart/form-data">
			
			<tr><td valign="top" class="isiankanan" width="175px">Nama</td><td class="isian"><input type="text" name="nama_pindah" class="maksimal"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Foto</td><td class="isian"><input type="file" name="fupload"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Jenis Kelamin</td>
			<td class="isian">
					<input type="radio" name="jk" value="L"/>Laki-laki&nbsp;
					<input type="radio" name="jk" value="P"/>Perempuan
			</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Tempat, Tanggal Lahir</td><td class="isian">
			<input type="text" name="tempat_lahir" class="pendek">, 
			<input type="text" id="tanggal" name="tanggal_lahir" class="pendek" style="width:20%"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Alamat</td><td class="isian"><textarea name="alamat" style="height: 100px"></textarea></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Tahun Pindah/Keluar</td><td class="isian">
			<?php    
				$thn_skrg=date("Y");
				echo "<select name=tahun_lulus>
				<option value='' selected>Pilih Tahun</option>";
				for ($thn=1990;$thn<=$thn_skrg;$thn++){
				echo "<option value=$thn>$thn</option>";
				}
				echo "</select>"; ?>
			</td></tr>
			
			<tr><td valign="top" class="isiankanan" width="175px">Email</td><td class="isian"><input type="text" name="email" class="pendek"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Telepon/ HP</td><td class="isian"><input type="text" name="telepon" class="pendek"></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="175px">Keterangan Pindah/Keluar</td><td class="isian"><input type="text" name="pekerjaan_sekarang" class="maksimal"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Informasi Tambahan</td><td class="isian"><textarea name="info_tambahan" style="height: 100px"></textarea></td></tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahpindah");
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

<?php   }
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>