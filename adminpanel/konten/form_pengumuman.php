<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>
		<div class="judulbox">Tambah Pengumuman</div>
		<table class="isian">
		<form method ="POST" action="aplikasi/pengumuman/pengumuman.php?t=<?php echo $token; ?>&pilih=pengumuman&untukdi=tambah" name="formPengumuman" id="formPengumuman" >
		<?php    
			echo "<input type='hidden' name='s_username' value='$_SESSION[adminsh]'>";
			?>
			<tr><td valign="top" class="isiankanan" style="width: 40px;">Judul</td><td class="isian"><input type="text" name="judul_pengumuman" class="maksimal"></td></tr>
			<tr><td valign="top" class="isiankanan" style="width: 40px;">Isi</td><td class="isian"><textarea style="height: 165px;" name="isi_pengumuman"></textarea></td></tr>
			<tr><td valign="top" class="isiankanan" style="width: 40px;"></td><td class="isian">
			<input type="submit" class="pencet" value="Terbitkan">
			<input type="reset" class="hapus" value="Reset">
			</td></tr>
		</form>
				<script language="JavaScript" type="text/javascript" xml:space="preserve">
	//<![CDATA[
	  var frmvalidator  = new Validator("formPengumuman");
	  frmvalidator.addValidation("judul_pengumuman","req","Judul pengumuman harus diisi");
	  frmvalidator.addValidation("judul_pengumuman","maxlen=100","Maksimal judul pengumuman 100 karakter");
	  frmvalidator.addValidation("judul_pengumuman","minlen=5","Minimal judul pengumuman 5 karakter");
	
	  frmvalidator.addValidation("isi_pengumuman","req","Isi pengumuman tidak boleh kosong");
	  frmvalidator.addValidation("isi_pengumuman","minlen=5","Minimal isi pengumuman 5 karakter");

	//]]></script>
		</table>
<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>
