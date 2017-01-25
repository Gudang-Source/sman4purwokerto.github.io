<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
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

<h3>Edit Materi Pelajaran (E-learning)</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">


<?php 			include "aplikasi/materi/header.php"; ?>
		</div>>

		<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=materi&untukdi=edit'";?> name='editmapel' id='editmapel' enctype="multipart/form-data">
		<?php    $id=ceknomor($_GET['id']);
		$edit=mysql_query("SELECT * FROM ".$DB_KODE."_materi, ".$DB_KODE."_mapel, ".$DB_KODE."_guru_staff WHERE ".$DB_KODE."_materi.id_mapel=".$DB_KODE."_mapel.id_mapel AND ".$DB_KODE."_materi.nip=".$DB_KODE."_guru_staff.nip AND id_materi='$id'");
		$r=mysql_fetch_array($edit);
		
		echo "<input type='hidden' name='id' value='$r[id_materi]'>";
		?>
			
			<tr><td class="isiankanan" width="175px">Judul Materi</td><td class="isian"><input type="text" name="judul" class="maksimal" value="<?php    echo "$r[judul_materi]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">File Materi</td><td class="isian"><a href="<?php    echo "../file/materi/$r[file_materi]";?>"><b><?php    echo "$r[file_materi]";?></b></a></td></tr>
			<tr><td class="isiankanan" width="175px">Ganti File Materi</td><td class="isian"><input type="file" name="fupload"></td></tr>
			<tr><td class="isiankanan" width="175px">Deskripsi</td><td class="isian"><textarea name="deskripsi" style="height: 100px"><?php    echo "$r[deskripsi_materi]";?></textarea></td></tr>
			<tr><td class="isiankanan" width="175px">Mata Pelajaran</td><td class="isian"><b><a href=""><?php    echo "$r[nama_mapel]";?></a></b></td></tr>
			<tr><td class="isiankanan" width="175px"><?php echo $_SESSION['Bguru']; ?> Pengampu</td><td class="isian"><b><a href=""><?php    echo "$r[nama_gurustaff]";?></a></b></td></tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editmapel");
			frmvalidator.addValidation("nama_mapel","req","Nama mata pelajaran harus diisi");
			frmvalidator.addValidation("nama_mapel","maxlen=30","Nama mata pelajaran maksimal 30 karakter");
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

