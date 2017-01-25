<?php   
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

if (!isset($_SESSION['adminsh']))
{
	gogo('../../index.php');
	exit;
}
else{ 
?>
<h3>Tambah Materi Pelajaran (E-learning)</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">


<?php 			include "aplikasi/materi/header.php"; ?>
		</div>

		<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=materi&untukdi=tambah'";?> name='tambahmapel' id='tambahmapel' enctype="multipart/form-data">
			<?php    
			echo "<input type='hidden' name='mapel' value='$_POST[mapel]'>";
			?>
			<tr><td class="isiankanan" width="175px">Judul Materi</td><td class="isian"><input type="text" name="judul_materi" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="175px">File Materi</td><td class="isian"><input type="file" name="fupload"></td></tr>
			<tr><td class="isiankanan" width="175px">Deskripsi</td><td class="isian"><textarea name="deskripsi" style="height: 100px"></textarea></td></tr>
			<tr><td class="isiankanan" width="175px"><?php echo $_SESSION['Bguru']; ?> Pengampu</td><td class="isian">
									<select name="guru">
									<option value="" selected>Pilih<?php echo $_SESSION['Bguru']; ?> Pengampu</option>
									<?php    
										$guru=mysql_query("SELECT * FROM ".$DB_KODE."_guru_mapel WHERE  id_mapel='$_POST[mapel]'");
										$gh=mysql_fetch_row($guru);
									if ($gh<1){
											echo "<script>window.alert('Guru Mata Pelajaran yang dipilih belum ada, silahkan ke Pengaturan Guru terlebih dahulu.');window.location=('guru_staff.php?t=$token')</script>";	
										}else{	
											while($g=mysql_fetch_array($guru)){
											$id_gurustaff=$g['id_gurustaff'];
											$guru2=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE  id_gurustaff='$id_gurustaff'");
											$g2=mysql_fetch_array($guru2);
											echo "<option value='$g2[nip]'>$g2[nama_gurustaff]</option>";
											}
										} ?>
									</select>
			</td></tr>
			<tr><td class="isian" colspan="2">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			<input type="submit" class="pencet" value="Tambah">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahmapel");
			frmvalidator.addValidation("guru","req","Anda harus memilih guru pengampu");
			
			frmvalidator.addValidation("fupload","req","Anda belum memilih file");
			
			frmvalidator.addValidation("judul_materi","req","Judul Materi harus diisi");
			frmvalidator.addValidation("judul_materi","maxlen=30","Judul Materi maksimal 30 karakter");
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

}
?>

