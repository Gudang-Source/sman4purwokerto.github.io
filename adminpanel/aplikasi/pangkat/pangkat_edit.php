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

<h3>Edit Pangkat</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">

<?php 			include "aplikasi/pangkat/header.php"; ?>
		</div>

		<table class="isian">
		<?php    $id=ceknomor($_GET['id']);  $edit=mysql_query("SELECT * FROM ".$DB_KODE."_pangkat WHERE id_pangkat='$id'");
				$r=mysql_fetch_array($edit);?>
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=pangkat&untukdi=edit'";?>  name='editpangkat' id='editpangkat' >
			<?php     echo "<input type='hidden' name='id' value='$r[id_pangkat]'>";?>
			<tr><td valign="top" class="isiankanan" width="175px">Nama Pangkat</td><td class="isian"><input type="text" name="nama_pangkat" class="maksimal" value="<?php    echo "$r[nama_pangkat]";?>"></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="175px">Golongan</td><td class="isian"><textarea name="golongan_pangkat" style="height: 100px"><?php    echo "$r[golongan_pangkat]";?></textarea></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Ruang</td><td class="isian"><textarea name="ruang_pangkat" style="height: 100px"><?php    echo "$r[ruang_pangkat]";?></textarea></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editpangkat");
			frmvalidator.addValidation("nama_pangkat","req","Nama pangkat harus diisi");
			frmvalidator.addValidation("nama_pangkat","maxlen=30","Nama pangkat maksimal 20 karakter");
			frmvalidator.addValidation("nama_pangkat","minlen=3","Nama pangkat minimal 4 karakter");
	  
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

