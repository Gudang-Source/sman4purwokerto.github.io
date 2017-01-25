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

<h3>Tambah Pangkat</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
<?php 			include "aplikasi/pangkat/header.php"; ?>
		</div>

		<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=pangkat&untukdi=tambah'";?> name='tambahpangkat' id='tambahpangkat' >
			
			<tr><td valign="top" class="isiankanan" width="175px">Nama Pangkat</td><td class="isian"><input type="text" name="nama_pangkat" class="maksimal"></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="175px">Golongan</td><td class="isian"><textarea name="golongan_pangkat" style="height: 100px"></textarea></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Ruang</td><td class="isian"><textarea name="ruang_pangkat" style="height: 100px"></textarea></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahpangkat");
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

