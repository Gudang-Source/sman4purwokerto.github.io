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

<h3>Edit Blok</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
<?php 			include "aplikasi/blok/header.php"; ?>
		</div>								


		<table class="isian">
		<?php  $id=ceknomor($_GET['id']);    $edit=mysql_query("SELECT * FROM ".$DB_KODE."_blok WHERE id_blok='$id'");
				$r=mysql_fetch_array($edit);?>
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=blok&untukdi=edit'"; ?> name='editblok' id='editblok' >
			<?php     echo "<input type='hidden' name='id' value='$r[id_blok]'";?>
			<tr><td valign="top" class="isiankanan" width="175px">Nama Blok</td><td class="isian"><input type="text" name="nama_blok" class="maksimal"<?php     echo "value='$r[nama_blok]'"; ?>></td></tr>

			
				<?php  if ($r['id_blok']> 100) {?>	
				
					<?php  if ($r['folder']!='') {?>	
						<tr><td valign="top" class="isiankanan" width="175px">File Blok</td><td class="isian">
						<select name="folder">
						<?php
							echo "<option value='$r[folder]' selected>$r[folder]</option>";
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
					<?php  }else{ ?>
						<tr><td valign="top" class="isiankanan" width="175px">Isi</td><td class="isian"><textarea  id='tini' name="isi_blok" style="height: 100px"><?php    echo "$r[isi_blok]";?></textarea></td></tr>
					<?php  } ?>
				<?php  } ?>
				
				
			<tr><td valign="top" class="isiankanan" width="175px">Posisi</td><td class="isian">
												<select name="posisi">
												<option value="1"<?php  if($r[posisi]==1){ echo "selected";}?>> Atas</option>
												<option value="2"<?php  if($r[posisi]==2){ echo "selected";}?>> Bawah</option>
												<option value="3"<?php  if($r[posisi]==3){ echo "selected";}?> > Kiri</option>
												<option value="4"<?php  if($r[posisi]==4){ echo "selected";}?>> Kanan</option>
												</select>			
			
			</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Status</td><td class="isian">
												<select name="status">
												<option value="1"<?php  if($r[status]==1){ echo "selected";}?>> Aktif</option>
												<option value="0"<?php  if($r[status]==2){ echo "selected";}?> > Non Aktif</option>
												</select>				
			</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Urutan</td><td class="isian"><input type="text" name="urutan" class="maksimal" value="<?php    echo "$r[urutan]";?>"></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script>
			CKEDITOR.replace( 'tini' );
		</script>


		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editblok");
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

