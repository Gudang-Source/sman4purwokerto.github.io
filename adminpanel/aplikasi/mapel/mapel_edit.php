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

<h3>Edit Mata Pelajaran</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
<?php 			include "aplikasi/mapel/header.php"; ?>
		</div>								


		<table class="isian">
		<?php   $id=ceknomor($_GET['id']);  $edit=mysql_query("SELECT * FROM ".$DB_KODE."_mapel WHERE id_mapel='$id'");
				$r=mysql_fetch_array($edit);?>
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=mapel&untukdi=edit'"; ?> name='editmapel' id='editmapel' >
			<?php     echo "<input type='hidden' name='id' value='$r[id_mapel]'";?>
			<tr><td valign="top" class="isiankanan" width="175px">Nama Mata Pelajaran</td><td class="isian"><input type="text" name="nama_mapel" class="maksimal"<?php     echo "value='$r[nama_mapel]'"; ?>></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="175px">Deskripsi</td><td class="isian"><textarea name="deskripsi_mapel" style="height: 100px"><?php    echo "$r[deskripsi_mapel]";?></textarea></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editmapel");
			frmvalidator.addValidation("nama_mapel","req","Nama mata pelajaran harus diisi");
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

