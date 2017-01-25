<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 if (!isset($_SESSION['kontenisi'])){
header ('location:../../index.php');
break;
}

function meta() {
global $ns, $r;

echo "<title>User Profil</title>";
}

function konten() {
global $DB_KODE, $ns;
?>
<div id="konten">
<div id="lebar">


<?php 

include "kontenweb/elearning/menu.php"; 

?>
<h3>Ganti Password</h3>
<?php 
if (isset($_SESSION['guru'])){
?>		<form method="POST" action="kontenweb/elearning/proses.php?pilih=guru&untukdi=gantipassword" name="editpassword" id="editpassword">
		<?php 
		echo "<input type='hidden' name='nip' value='$_SESSION[guru]'>";
		?>
		<table style="margin: 20px 0 20px 0;"><input type="hidden" class="panjang" name="nama_siswa" value="<?php  echo $ps['nama_siswa']?>">
			<tr class="form"><th class="garis" colspan="3" style="text-align: center">Form Password</th></tr>
			<tr class="form"><td width="150"><b>Password</b></td><td><input type="password" class="panjang" name="password"></td></tr>
			<tr class="form"><td width="150"><b>Ulang Password</b></td><td><input type="password" class="panjang" name="password2"></td></tr>
			<tr class="form"><td width="150"></td><td><input type="submit" class="tombol" value="Simpan">&nbsp;<input type="button" class="tombol" value="Batal" onclick="self.history.back()"></td></tr>
		</table>
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
<?php  }

if (isset($_SESSION['siswa'])){
?>		<form method="POST" action="kontenweb/elearning/proses.php?pilih=siswa&untukdi=gantipassword" name="editpassword" id="editpassword">
		<?php 
		echo "<input type='hidden' name='nis' value='$_SESSION[siswa]'>";
		?>
		<table style="margin: 20px 0 20px 0;"><input type="hidden" class="panjang" name="nama_siswa" value="<?php  echo $ps['nama_siswa']?>">
			<tr class="form"><th class="garis" colspan="3" style="text-align: center">Form Password</th></tr>
			<tr class="form"><td width="150"><b>Password</b></td><td><input type="password" class="panjang" name="password"></td></tr>
			<tr class="form"><td width="150"><b>Ulang Password</b></td><td><input type="password" class="panjang" name="password2"></td></tr>
			<tr class="form"><td width="150"></td><td><input type="submit" class="tombol" value="Simpan">&nbsp;<input type="button" class="tombol" value="Batal" onclick="self.history.back()"></td></tr>
		</table>
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
<?php  } ?>
<?php 
include "kontenweb/elearning/footer.php"; 
menubawah(); 
?>		
</div>
</div>
<?php     } ?>

<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

