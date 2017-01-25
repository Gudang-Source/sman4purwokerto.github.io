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



$database="aplikasi/informasi/informasi.php";
?>

<h3>Informasi<?php echo $_SESSION['Bsekolah']; ?></h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="informasi_sekolah.php?t=<?php echo $token; ?>">Informasi<?php echo $_SESSION['Bsekolah']; ?></a></div>
			<div class="menuhorisontal"><a href="gmap.php?t=<?php echo $token; ?>">Lokasi Gmap</a></div>
			<div class="menuhorisontal"><a href="profil.php?t=<?php echo $token; ?>">Profil</a></div>
			<div class="menuhorisontal"><a href="agenda.php?t=<?php echo $token; ?>">Agenda</a></div>
			<div class="menuhorisontal"><a href="pengumuman.php?t=<?php echo $token; ?>">Pengumuman</a></div>
		</div>

		<table class="isian">
		
		<form method="POST" name="editinfo" id="editinfo"<?php     echo "action='$database?t=$token' "; ?> enctype="multipart/form-data">
		<?php     	$namasekolah=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan=8");
				$ns=mysql_fetch_array($namasekolah);?>
			<tr><td valign="top" class="isiankanan" width="100px">Nama<?php echo $_SESSION['Bsekolah']; ?></td><td class="isian"><input type="text" name="nama_sekolah" class="sedang"<?php     echo "value='$ns[isi_pengaturan]'";?>></td></tr>
			<tr><td valign="top" class="isiankanan" width="100px">Tahun Berdiri</td><td class="isian"><input type="text" name="tahun" class="sedang"<?php     echo "value='$ns[isi_pengaturan2]'";?>></td></tr>
				<?php     	$jsekolah=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan=19");
				$js=mysql_fetch_array($jsekolah);?>
			<tr><td valign="top" class="isiankanan" width="175px">Jenjang</td><td class="isian">
									<select name="jenjang_sekolah">
									<?php    
									$id_jenjang=$js['isi_pengaturan'];
										$jjs1=mysql_query("SELECT * FROM ".$DB_KODE."_jenjang WHERE id_jenjang='$id_jenjang' ");
									$jskl1=mysql_fetch_array($jjs1);
									?>
									<option value="<?php echo $js['isi_pengaturan'];?>" selected><?php echo $jskl1['nama_jenjang'];?></option>
									<?php    
									$jjs=mysql_query("SELECT * FROM ".$DB_KODE."_jenjang WHERE id_jenjang<>'$id_jenjang' ");
										while($jskl=mysql_fetch_array($jjs)){	
										echo "<option value='$jskl[id_jenjang]'>$jskl[nama_jenjang]</option>";} 
										?>
									</select>
			</td></tr>
				
		<?php     	$telepon=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan=20");
				$t=mysql_fetch_array($telepon);?>
			<tr><td valign="top" class="isiankanan" width="100px">NIS</td><td class="isian"><input type="text" name="nis" class="sedang"<?php     echo "value='$t[isi_pengaturan]'";?>></td></tr>
			<tr><td valign="top" class="isiankanan" width="100px">NSS</td><td class="isian"><input type="text" name="nss" class="sedang"<?php     echo "value='$t[isi_pengaturan2]'";?>></td></tr>
			
				
		<?php     	$telepon=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan=9");
				$t=mysql_fetch_array($telepon);?>
			<tr><td valign="top" class="isiankanan" width="100px">NISN</td><td class="isian"><input type="text" name="nisn" class="sedang"<?php     echo "value='$t[isi_pengaturan2]'";?>></td></tr>

			<tr><td valign="top" class="isiankanan" width="100px">Telepon</td><td class="isian"><input type="text" name="telp_sekolah" class="sedang"<?php     echo "value='$t[isi_pengaturan]'";?>></td></tr>
			
		<?php     	$email=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan=10");
				$e=mysql_fetch_array($email);?>
			<tr><td valign="top" class="isiankanan" width="100px">Email</td><td class="isian"><input type="text" name="email_sekolah" class="sedang"<?php     echo "value='$e[isi_pengaturan]'";?>></td></tr>
			
		<?php     	$kepsek=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan=11");
				$k=mysql_fetch_array($kepsek);?>
			<tr><td valign="top" class="isiankanan" width="100px"><?php echo $_SESSION['Bkepala']; ?><?php echo $_SESSION['Bsekolah']; ?></td><td class="isian"><input type="text" name="kepala_sekolah" class="sedang"<?php     echo "value='$k[isi_pengaturan]'";?>></td></tr>
			<tr><td valign="top" class="isiankanan" width="100px">NIP/NIY</td><td class="isian"><input type="text" name="nip" class="sedang"<?php     echo "value='$k[isi_pengaturan2]'";?>></td></tr>
						
		<?php     	$alamatsekolah=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan=12");
				$a=mysql_fetch_array($alamatsekolah);?>
			<tr><td valign="top" class="isiankanan" width="100px">Alamat<?php echo $_SESSION['Bsekolah']; ?></td><td class="isian"><textarea name="alamat_sekolah" style="height:125px; width: 60%"><?php    echo "$a[isi_pengaturan]";?></textarea></td></tr>
			<tr><td valign="top" class="isiankanan" width="100px">&nbsp;</td>
				<td class="isian">
				<?php    
				$logo=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan=13");
				$l=mysql_fetch_array($logo);
				echo "<img src='../images/$l[isi_pengaturan]' width='128px'>"; ?>
				</td>
			</tr>
			<tr><td valign="top" class="isiankanan" width="100px">Ganti Logo</td>
				<td class="isian">Jenis file yang diperkenankan adalah "bmp", "jpg", "gif", "png"<br>
		
		<?php   if(isset($_SESSION['salah'])){ 
		echo $_SESSION['salah'];
		?>
		<br>
		<?php } ?>	
					<input type="file" name="fupload">
				</td>
			</tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editinfo");
				frmvalidator.addValidation("nama_sekolah","req","Nama sekolah harus diisi");
				frmvalidator.addValidation("nama_sekolah","maxlen=30","Maksimal karakter untuk nama sekolah adalah 30");
				frmvalidator.addValidation("nama_sekolah","minlen=3","Minimal karakter untuk nama sekolah adalah 3");
				
				frmvalidator.addValidation("telp_sekolah","maxlen=20","Angka telepon maksimal 20 angka");
				
				frmvalidator.addValidation("email_sekolah","maxlen=50","Email maksimal 50 karakter");
				frmvalidator.addValidation("email_sekolah","req","Email harus diisi");
				frmvalidator.addValidation("email_sekolah","email","Format email salah");
				
				frmvalidator.addValidation("kepala_sekolah","req","Nama kepala sekolah harus diisi");
				
				frmvalidator.addValidation("alamat_sekolah","req","Alamat sekolah harus diisi");
				frmvalidator.addValidation("alamat_sekolah","minlen=3","Alamat sekolah minimal 5 karakter");
				
				frmvalidator.addValidation("fupload","file_extn=jpg;gif;png","Jenis file yang diterima untuk gambar adalah : jpg, gif, png");
			//]]>
		</script>
		</table>
		
</div><!--Akhir class isi kanan-->
		

<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

}
?>

