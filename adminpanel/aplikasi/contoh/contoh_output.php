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

<h3>Edit Contoh</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
<?php 			include "aplikasi/contoh/header.php"; ?>
		</div>

		<table class="isian">
		<?php    $id=ceknomor($_GET['id']); $output=mysql_query("SELECT * FROM ".$DB_KODE."_contoh WHERE id_contoh='$id'");
				$r=mysql_fetch_array($output);?>
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=contoh&untukdi=output'"; ?> name='outputcontoh' id='outputcontoh' >
			<?php     echo "<input type='hidden' name='id' value='$r[id_contoh]'";?>
			<tr><td valign="top" class="isiankanan" width="175px">Nama Tahun</td><td class="isian"><input type="text" name="nama_contoh" class="maksimal"<?php     echo "value='$r[nama_contoh]'"; ?>></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="175px">Deskripsi</td><td class="isian"><textarea name="deskripsi_contoh" style="height: 100px"><?php    echo "$r[deskripsi_contoh]";?></textarea></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("outputcontoh");
			frmvalidator.addValidation("nama_contoh","req","Nama mata pelajaran harus diisi");
			frmvalidator.addValidation("nama_contoh","maxlen=30","Nama mata pelajaran maksimal 30 karakter");
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

