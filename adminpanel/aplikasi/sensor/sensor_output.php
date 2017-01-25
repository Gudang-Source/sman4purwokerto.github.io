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

<h3>Edit Sensor Kata</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
<?php 			include "aplikasi/sensor/header.php"; ?>
		</div>

		<table class="isian">
		<?php    $id=ceknomor($_GET['id']); $edit=mysql_query("SELECT * FROM ".$DB_KODE."_sensor WHERE id_filter_kata='$id'");
				$r=mysql_fetch_array($edit);?>
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=sensor&untukdi=edit'"; ?> name='editsensor' id='editsensor' >
			<?php     echo "<input type='hidden' name='id' value='$r[id_filter_kata]'";?>
			<tr><td valign="top" class="isiankanan" width="175px">Nama Kata</td><td class="isian"><input type="text" name="kata_filter" class="maksimal"<?php     echo "value='$r[kata_filter]'"; ?>></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="175px">Ganti</td><td class="isian"><textarea name="ganti_filter" style="height: 100px"><?php    echo "$r[ganti_filter]";?></textarea></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editsensor");
			frmvalidator.addValidation("kata_filter","req","Nama mata pelajaran harus diisi");
			frmvalidator.addValidation("kata_filter","maxlen=30","Nama mata pelajaran maksimal 30 karakter");
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

