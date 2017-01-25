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

<h3>Tambah Blok</h3>
<div class="isikanan"><!--Awal class isi kanan-->

		<div class="judulisikanan">
<?php 			include "aplikasi/blok/header.php"; ?>
		</div>								


		<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=blok&untukdi=tambah'"; ?> name='tambahblok' id='tambahblok' >
			
			<tr><td valign="top" class="isiankanan" width="175px">Nama Blok</td><td class="isian"><input type="text" name="nama_blok" class="maksimal"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">File Blok</td><td class="isian">
			<select name="folder">
			<?php
				//path to directory to scan
				$directory = "../kontenweb/blok/";
				 
				//get all image files with a .jpg extension.
				$blokfile = glob($directory . "*.php");
				 								
							$blokfile  = str_replace("../","",$blokfile );
				//print each file name
				foreach($blokfile as $blok)
				{
				echo "<option value='$blok'>$blok</option>";
				}			
							?>
			</select> file berada di folder <b>kontenweb/blok/</b>
			</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Posisi</td><td class="isian">
												<select name="posisi">
												<option value="1"> Atas</option>
												<option value="2" > Bawah</option>
												<option value="3"  selected> Kiri</option>
												<option value="4" > Kanan</option>
												</select>			
			
			</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Status</td><td class="isian">
												<select name="status">
												<option value="1" selected> Aktif</option>
												<option value="0" > Non Aktif</option>
												</select>				
			</td></tr>
	
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script>
			CKEDITOR.replace( 'tini' );
		</script>


		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahblok");
			frmvalidator.addValidation("nama_blok","req","Nama mata pelajaran harus diisi");
			frmvalidator.addValidation("nama_blok","maxlen=30","Nama mata pelajaran maksimal 30 karakter");
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

