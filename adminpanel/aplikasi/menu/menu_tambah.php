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

<h3>Tambah Menu</h3>
<div class="isikanan"><!--Awal class isi kanan-->

		<div class="judulisikanan">
<?php 			include "aplikasi/menu/header.php"; ?>
		</div>								


		<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=menu&untukdi=tambah'"; ?> name='tambahmenu' id='tambahmenu' >
			
			<tr><td valign="top" class="isiankanan" width="175px">Nama Menu</td><td class="isian"><input type="text" name="judul" class="maksimal"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">U R L</td><td class="isian"><input type="text" name="url" class="maksimal"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Posisi Induk</td><td class="isian">
												<select name="menu_id">
												<option value="0"<?php  if($r[menu_id]==0){ echo "selected";}?>> Utama</option>
												<?php 
													$menu1=mysql_query("SELECT * FROM ".$DB_KODE."_menu WHERE menu_id=0 ORDER BY urutan,menu_id ASC");
													while ($m1=mysql_fetch_array($menu1)){	
														if($m1[id_menu]<>$r[id_menu]){ 
												?>		
															<option value="<?php echo $m1[id_menu];?>"<?php  if($m1[id_menu]==$r[menu_id]){ echo "selected";}?>><?php  echo $m1[judul];?></option>
														<?php 
														}
														$menu2=mysql_query("SELECT * FROM ".$DB_KODE."_menu WHERE menu_id=$m1[id_menu] ORDER BY urutan,menu_id ASC");
															while ($m2=mysql_fetch_array($menu2)){	
																if($m2[id_menu]<>$r[id_menu]){ 	
														?>
																	<option value="<?php echo $m2[id_menu];?>"<?php  if($m2[id_menu]==$r[menu_id]){ echo "selected";}?>> |--><?php  echo $m2[judul];?></option>
																<?php 
																} ?>
														<?php  } ?>
												<?php  } ?>
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
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahmenu");
			frmvalidator.addValidation("judul","req","Judul menu harus diisi");			
			frmvalidator.addValidation("url","req","Url harus diisi");
			frmvalidator.addValidation("nama_menu","maxlen=30","Nama mata pelajaran maksimal 30 karakter");
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

