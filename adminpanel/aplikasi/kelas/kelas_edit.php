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

<h3>Edit Kelas</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
<?php 			include "aplikasi/kelas/header.php"; ?>
		</div>	

		<table class="isian">
		<form method='POST'<?php     echo"action='$database?t=$token&pilih=kelas&untukdi=edit'";?> name='editkelas' id='editkelas' >
		<?php    $id=ceknomor($_GET['id']);
			$edit=mysql_query("SELECT * FROM ".$DB_KODE."_kelas WHERE id_kelas='$id'");
			$r=mysql_fetch_array($edit);
			$wali=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE nip=$r[wali_kelas]");
			$w=mysql_fetch_array($wali);			
			echo "<input type='hidden' name='id' value='$r[id_kelas]'>";
		?>
			
			<tr><td valign="top" class="isiankanan" width="175px">Nama Kelas</td><td class="isian"><input type="text" name="nama_kelas" class="maksimal" value="<?php    echo "$r[nama_kelas]";?>"></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="175px">Deskripsi</td><td class="isian"><textarea name="deskripsi" style="height: 100px"><?php    echo "$r[deskripsi_kelas]";?></textarea></td></tr>
			<tr><td class="isiankanan" width="175px">Wali Kelas</td><td class="isian">
									<select name="wali_kelas">
									<option value="<?php    echo "$r[wali_kelas]";?>" selected><?php    echo "$w[nama_gurustaff]";?></option>
									<?php    
										$guru=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE posisi='guru' ");
										while($g=mysql_fetch_array($guru)){
										echo "<option value='$g[nip]'>$g[nama_gurustaff]</option>";} ?>
									</select>
			</td></tr>		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editkelas");
			frmvalidator.addValidation("nama_kelas","req","Nama kelas harus diisi");
			frmvalidator.addValidation("nama_kelas","maxlen=15","Nama kelas maksimal 15 karakter");
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

