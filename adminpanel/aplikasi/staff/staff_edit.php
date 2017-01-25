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

<h3>Edit Pegawai</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
<?php 			include "aplikasi/staff/header.php"; ?>
		</div>

		<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=staff&untukdi=edit'";?>  name='editstaff' id='editstaff'  enctype="multipart/form-data">
		<?php    $id=ceknomor($_GET['id']);
		$edit=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff, ".$DB_KODE."_jabatan WHERE ".$DB_KODE."_guru_staff.id_jabatan=".$DB_KODE."_jabatan.id_jabatan AND id_gurustaff='$id'");
		$r=mysql_fetch_array($edit);
		$pangkatt=mysql_query("SELECT * FROM ".$DB_KODE."_pangkat where id_pangkat=$r[id_pangkat] ");
		$pt=mysql_fetch_array($pangkatt);		
		echo "<input type='hidden' name='id' value='$r[id_gurustaff]'";
		?>	
			<tr><td valign="top" class="isiankanan" width="175px">Nama Pegawai</td><td class="isian"><input type="text" name="nama_staff" class="maksimal" value="<?php    echo"$r[nama_gurustaff]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Posisi</td><td class="isian">
					<select name="posisi">
						<option value="<?php    echo "$r[posisi]";?>" selected><?php    echo "$r[posisi]";?></option>

						<option value='guru'><?php echo $_SESSION['Bguru']; ?></option>
						<option value='staff'>Tata Usaha</option>
						
					</select>
			</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">NIP</td><td class="isian"><input type="text" name="nip" class="pendek" value="<?php    echo"$r[nip]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">NUPTK</td><td class="isian"><input type="text" name="nuptk" class="pendek" value="<?php    echo"$r[nuptk]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Pangkat/Golongan</td>
			<td class="isian">
					<select name="id_pangkat">
						<option value="<?php    echo "$r[id_pangkat]";?>" selected><?php    echo "$pt[nama_pangkat] / $pt[golongan_pangkat]$pt[ruang_pangkat]";?></option>
						<?php     $pangkat=mysql_query("SELECT * FROM ".$DB_KODE."_pangkat ORDER BY id_pangkat ASC");
								while($p=mysql_fetch_array($pangkat)) {
						echo "
						<option value='$p[id_pangkat]'>$p[nama_pangkat] / $p[golongan_pangkat]$p[ruang_pangkat]</option>"; }
						?>
					</select>
			</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Foto</td><td class="isian"><img src="../images/foto/guru/<?php    echo "$r[foto]";?>" width="200px">
				<?php     if ($r[foto] !='no_photo.jpg'){?>
				<br><br>
				<a href="<?php    echo "$database?t=$token&pilih=staff&untukdi=hapusgambar&id=$r[id_gurustaff]";?>"><b><u>Hapus gambar</u></b></a></td></tr>
				<?php     } ?>
			</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Ganti Foto</td><td class="isian"><input type="file" name="fupload"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Jenis Kelamin</td>
			<td class="isian">
			<?php     if ($r[jenkel]=='L'){ ?>
					<input type="radio" name="jk" value="L" checked/>Laki-laki&nbsp;
					<input type="radio" name="jk" value="P"/>Perempuan
			<?php     }
			else { ?>
					<input type="radio" name="jk" value="L"/>Laki-laki&nbsp;
					<input type="radio" name="jk" value="P" checked/>Perempuan
			<?php     } ?>
			</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Tempat, Tanggal Lahir</td><td class="isian">
			<input type="text" name="tempat_lahir" class="pendek" value="<?php    echo"$r[tempat_lahir]";?>">, 
			<input type="text" id="tanggal" name="tanggal_lahir" class="pendek" style="width:20%" value="<?php    echo"$r[tanggal_lahir]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Jabatan</td>
			<td class="isian">
					<select name="jabatan">
						<option value="<?php    echo "$r[id_jabatan]";?>" selected><?php    echo "$r[nama_jabatan]";?></option>
						<?php    
						$jabatan=mysql_query("SELECT * FROM ".$DB_KODE."_jabatan ORDER BY nama_jabatan ASC");
						while ($j=mysql_fetch_array($jabatan)){
						echo "<option value='$j[id_jabatan]'>$j[nama_jabatan]</option>"; }
						?>
					</select>
			</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Alamat</td><td class="isian"><textarea name="alamat" style="height: 100px"><?php    echo"$r[alamat]";?></textarea></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Pendidikan Terakhir</td>
			<td class="isian">
					<select name="pendidikan">
						<option value="<?php    echo "$r[pendidikan_terakhir]";?>" selected><?php    echo "$r[pendidikan_terakhir]";?></option>
						<option value="SD sederajat">SD sederajat</option>
						<option value="SLTP sederajat">SLTP sederajat</option>
						<option value="SLTA sederajat">SLTA sederajat</option>
						<option value="Diploma 1 (D1)">Diploma 1 (D1)</option>
						<option value="Diploma 2 (D2)">Diploma 2 (D2)</option>
						<option value="Diploma 3 (D3)">Diploma 3 (D3)</option>
						<option value="Strata 1 (S1)">Strata 1 (S1)</option>
						<option value="Magister (S2)">Magister (S2)</option>
						<option value="Doktor (S3)">Doktor (S3)</option>
					</select>
			</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Tahun Masuk</td><td class="isian">
			<?php    
				$thn_skrg=date("Y");
				global $ns;
				$tahun=$ns['isi_pengaturan2'];
				echo "<select name=tahun_masuk>
				<option value='$r[tahun_masuk]' selected>$r[tahun_masuk]</option>";
				for ($thn=$tahun;$thn<=$thn_skrg;$thn++){
				echo "<option value=$thn>$thn</option>";
				}
				echo "</select>"; ?>
			</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Status Perkawinan</td>
			<td class="isian">
					<select name="status_kawin">
						<option value="<?php    echo "$r[status_kawin]";?>" selected><?php    echo "$r[status_kawin]";?></option>
						<option value="Menikah">Menikah</option>
						<option value="Belum Menikah">Belum menikah</option>
						<option value="Duda">Duda</option>
						<option value="Janda">Janda</option>
					</select>
			</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Email</td><td class="isian"><input type="text" name="email" class="pendek" value="<?php    echo"$r[email]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Telepon/ HP</td><td class="isian"><input type="text" name="telepon" class="pendek" value="<?php    echo"$r[telepon]";?>"></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editstaff");
			frmvalidator.addValidation("nama_staff","req","Nama pegawai harus diisi");
			frmvalidator.addValidation("nama_staff","maxlen=30","Nama pegawai maksimal 30 karakter");
			frmvalidator.addValidation("nama_staff","minlen=3","Nama pegawai minimal 3 karakter");
	  
			frmvalidator.addValidation("nip","req","NIP pegawai harus diisi");
			frmvalidator.addValidation("nip","maxlen=18","NIP pegawai maksimal 18 karakter");
			frmvalidator.addValidation("nip","minlen=9","NIP pegawai minimal 9 karakter");
			frmvalidator.addValidation("nip","numeric","NIP ditulis dengan angka");
			
			frmvalidator.addValidation("fupload","file_extn=jpg;gif;png","Jenis file yang diterima untuk gambar adalah : jpg, gif, png");
			
			frmvalidator.addValidation("jabatan","req","Anda belum memilih jabatan");
			frmvalidator.addValidation("pendidikan","req","Anda belum memilih pendidikan terakhir");
			frmvalidator.addValidation("status_kawin","req","Anda belum memilih status perkawinan");
			
			frmvalidator.addValidation("tahun_masuk","req","Tahun masuk harus diisi");
			
			frmvalidator.addValidation("tempat_lahir","req","Tempat lahir harus diisi");
			frmvalidator.addValidation("tanggal_lahir","req","Tanggal lahir harus diisi");
			
			frmvalidator.addValidation("email","email","Format email salah");
			//]]>
		</script>
		
		</table>
		
				<table class="isian" style="text-align: left;">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=staff&untukdi=gantipassword'";?> name='editpassword' id='editpassword' onSubmit="javascript:self.close();">
		<?php    $id=ceknomor($_GET['id']);
		$edit=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE  id_gurustaff='$id'");
		$r=mysql_fetch_array($edit);
		
		echo "<input type='hidden' name='id' value='$r[id_gurustaff]'";
		?>	
			<tr><td valign="top" class="isiankanan" width="115px">Password Baru</td><td class="isian"><input type="password" name="password" class="pendek"></td></tr>
			<tr><td valign="top" class="isiankanan" width="115px">Ulang Password Baru</td><td class="isian"><input type="password" name="password2" class="pendek"></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editpassword");
			frmvalidator.addValidation("password","req","Password harus diisi");
			frmvalidator.addValidation("password","maxlen=20","Password terlalu panjang, maksimal 20 karakter");
			frmvalidator.addValidation("password","minlen=8","Password terlalu pendek, minimal 8 karakter");
			frmvalidator.addValidation("password2","eqelmnt=password","Password tidak sama");
			
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

