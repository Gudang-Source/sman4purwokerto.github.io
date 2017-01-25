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

<h3>Edit Jurusan</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">

<?php 			include "aplikasi/jurusan/header.php"; ?>
		</div>

		<table class="isian">
		<form method='POST'<?php     echo"action='$database?t=$token&pilih=jurusan&untukdi=edit'";?> name='editjurusan' id='editjurusan' >
		<?php    $id=ceknomor($_GET['id']);
			$edit=mysql_query("SELECT * FROM ".$DB_KODE."_jurusan WHERE id_jurusan='$id'");
			$r=mysql_fetch_array($edit);
			
			echo "<input type='hidden' name='id' value='$r[id_jurusan]'>";
		?>
			
			<tr><td valign="top" class="isiankanan" width="175px">Nama Jurusan</td><td class="isian"><input type="text" name="nama_jurusan" class="maksimal" value="<?php    echo "$r[nama_jurusan]";?>"></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="175px">Deskripsi</td><td class="isian"><textarea name="deskripsi" style="height: 100px"><?php    echo "$r[deskripsi_jurusan]";?></textarea></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editjurusan");
			frmvalidator.addValidation("nama_jurusan","req","Nama jurusan harus diisi");
			frmvalidator.addValidation("nama_jurusan","maxlen=15","Nama jurusan maksimal 15 karakter");
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

