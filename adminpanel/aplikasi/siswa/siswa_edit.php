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

<h3>Edit<?php echo $_SESSION['Bsiswa'];?></h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">

<?php 			include "aplikasi/siswa/header.php"; ?>
		</div>

		<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=siswa&untukdi=edit'";?>  name='editsiswa' id='editsiswa'  enctype="multipart/form-data">
			<?php    $id=ceknomor($_GET['id']);
			$edit=mysql_query("SELECT * FROM ".$DB_KODE."_siswa,".$DB_KODE."_kelas,".$DB_KODE."_jurusan WHERE ".$DB_KODE."_siswa.id_jurusan=".$DB_KODE."_jurusan.id_jurusan AND ".$DB_KODE."_siswa.id_kelas=".$DB_KODE."_kelas.id_kelas AND id_siswa='$id'");
			$r=mysql_fetch_array($edit);
			
			echo "<input type='hidden' name='id' value='$r[id_siswa]'>";
			?>
			<tr><td valign="top" class="isiankanan" width="175px"><?php echo $_SESSION['Bsiswa']; ?></td><td class="isian"><input type="text" name="nama_siswa" class="maksimal" value="<?php    echo "$r[nama_siswa]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">NIS</td><td class="isian"><input type="text" name="nis" class="pendek"value="<?php    echo "$r[nis]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">NISN</td><td class="isian"><input type="text" name="nisn" class="pendek"value="<?php    echo "$r[nisn]";?>"></td></tr>
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
					else {?>
					<input type="radio" name="jk" value="L"/>Laki-laki&nbsp;
					<input type="radio" name="jk" value="P" checked/>Perempuan
					<?php     } ?>
			</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Tempat, Tanggal Lahir</td><td class="isian">
			<input type="text" name="tempat_lahir" class="pendek" value="<?php    echo "$r[tempat_lahir]";?>">, 
			<input type="text" id="tanggal" name="tanggal_lahir" class="pendek" style="width:20%" value="<?php    echo "$r[tanggal_lahir]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Alamat</td><td class="isian"><textarea name="alamat" style="height: 100px"><?php    echo "$r[alamat]";?></textarea></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Kelas</td>
			<td class="isian">
					<select name="kelas">
						<option value="<?php    echo"$r[id_kelas]";?>" selected><?php    echo"$r[nama_kelas]";?></option>
						<?php    
							$kelas=mysql_query("SELECT * FROM ".$DB_KODE."_kelas WHERE id_kelas !=$r[id_kelas]");
							while($k=mysql_fetch_array($kelas)){
							echo "<option value='$k[id_kelas]'>$k[nama_kelas]</option>";}
						?>
					</select>
			</td></tr>
<?php  if ($_SESSION['jenjang']>4){	?>					
			<tr><td valign="top" class="isiankanan" width="175px">Jurusan</td>
			<td class="isian">
					<select name="jurusan">
						<option value="<?php    echo"$r[id_jurusan]";?>" selected><?php    echo"$r[nama_jurusan]";?></option>
						<?php    
							$jurusan=mysql_query("SELECT * FROM ".$DB_KODE."_jurusan WHERE id_jurusan !=$r[id_jurusan]");
							while($k=mysql_fetch_array($jurusan)){
							echo "<option value='$k[id_jurusan]'>$k[nama_jurusan]</option>";}
						?>
					</select>
			</td></tr>
<?php  } else {	?>	<input type="hidden" name="jurusan" value="<?php    echo"$r[id_jurusan]";?>"><?php  } ?>				
			<tr><td valign="top" class="isiankanan" width="175px">Tahun Registrasi</td><td class="isian">
			<?php    
				$thn_skrg=date("Y");
				global $ns;
				$tahun=$ns['isi_pengaturan2'];
				echo "<select name=tahun_reg>
				<option value='$r[tahun_registrasi]' selected>$r[tahun_registrasi]</option>";
				for ($thn=$tahun;$thn<=$thn_skrg;$thn++){
				echo "<option value=$thn>$thn</option>";
				}
				echo "</select>"; ?>
			</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px"><?php echo $_SESSION['Bsekolah'];?> Asal</td><td class="isian"><input type="text" name="sekolah_asal" class="pendek" value="<?php    echo "$r[sekolah_asal]";?>"></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="175px">Email</td><td class="isian"><input type="text" name="email" class="pendek" value="<?php    echo "$r[email]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Telepon/ HP</td><td class="isian"><input type="text" name="telepon" class="pendek" value="<?php    echo "$r[telepon]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Status<?php echo $_SESSION['Bsiswa'];?></td>
			<td class="isian">
					<?php     if ($r[status_siswa]== 1){ ?>
					<input type="radio" name="status_siswa" value="1" checked/>Aktif&nbsp;
					<input type="radio" name="status_siswa" value="0"/>Alumni
					<?php     }
					else { ?>
					<input type="radio" name="status_siswa" value="1"/>Aktif&nbsp;
					<input type="radio" name="status_siswa" value="0" checked/>Alumni
					<?php     } ?>
			</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Nama Orang Tua</td><td class="isian"><input type="text" name="nama_ortu" class="maksimal" value="<?php    echo "$r[nama_ortu]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Pekerjaan Orang Tua</td><td class="isian">
				<select name="pekerjaan_ortu">
					<option value="<?php    echo "$r[pekerjaan_ortu]";?>" selected><?php    echo "$r[pekerjaan_ortu]";?></option>
					<?php    
					$pekerjaan=mysql_query("SELECT * FROM ".$DB_KODE."_pekerjaan");
					while ($r=mysql_fetch_array($pekerjaan)){
					echo " <option value=$r[id_pekerjaan]>$r[nama_pekerjaan]</option>";} ?>
				</select>			
			</td></tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editsiswa");
			frmvalidator.addValidation("nama_siswa","req","Nama siswa harus diisi");
			frmvalidator.addValidation("nama_siswa","maxlen=30","Nama siswa maksimal 30 karakter");
			frmvalidator.addValidation("nama_siswa","minlen=3","Nama siswa minimal 3 karakter");
	  
			frmvalidator.addValidation("nis","req","NIS harus diisi");
			frmvalidator.addValidation("nis","maxlen=10","NIS maksimal 10 karakter");
			frmvalidator.addValidation("nis","minlen=4","NIS guru minimal 4 karakter");
			frmvalidator.addValidation("nis","numeric","NIS ditulis dengan angka");
			
			frmvalidator.addValidation("kelas","req","Anda belum memilih kelas");
			
			frmvalidator.addValidation("tahun_reg","req","Tahun registrasi harus diisi");
			
			frmvalidator.addValidation("tempat_lahir","req","Tempat lahir harus diisi");
			frmvalidator.addValidation("tanggal_lahir","req","Tanggal lahir harus diisi");
			
			frmvalidator.addValidation("sekolah_asal","req","Sekolah asal harus diisi");
			frmvalidator.addValidation("sekolah_asal","minlen=6","Sekolah asal minimal 6 karakter");
			
			frmvalidator.addValidation("email","email","Format email salah");
			//]]>
		</script>
		
		</table>
				<table class="isian" style="text-align: left;">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=siswa&untukdi=gantipassword'";?> name='editpassword' id='editpassword' onSubmit="javascript:self.close();">
		<?php    $id=ceknomor($_GET['id']);
			$edit=mysql_query("SELECT * FROM ".$DB_KODE."_siswa,".$DB_KODE."_kelas,".$DB_KODE."_jurusan WHERE ".$DB_KODE."_siswa.id_jurusan=".$DB_KODE."_jurusan.id_jurusan AND ".$DB_KODE."_siswa.id_kelas=".$DB_KODE."_kelas.id_kelas AND id_siswa='$id'");
			$r=mysql_fetch_array($edit);
			
			echo "<input type='hidden' name='id' value='$r[id_siswa]'>";
		
		?>	
			<tr><td valign="top" class="isiankanan" width="115px">Password</td><td class="isian"><input type="password" name="password" class="maksimal"></td></tr>
			<tr><td valign="top" class="isiankanan" width="115px">Ulang Password</td><td class="isian"><input type="password" name="password2" class="maksimal"></td></tr>
			
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
			frmvalidator.addValidation("password","minlen=6","Password terlalu pendek, minimal 6 karakter");
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

