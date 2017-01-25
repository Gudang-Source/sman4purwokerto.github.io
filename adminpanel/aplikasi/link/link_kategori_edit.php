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

		
	<h3>Edit Kategori</h3>
	<div class="isikanan"><!--Awal class isi kanan-->
	<div class="judulisikanan">

<?php 			include "aplikasi/link/header.php"; ?>	
		</div>
		
		<div class="atastabel" style="margin: 30px 10px 0 10px">
		
		</div>
		
				<div class="kanankecil">
				<!--menampilkan informasi website-->
				<div class="judulbox">Edit Kategori link</div>
				<?php    $id=ceknomor($_GET['id']); 	$edit=mysql_query("SELECT * FROM ".$DB_KODE."_kategori WHERE id_kategori='$id'");
						$r=mysql_fetch_array($edit); ?>
						<table class="isian" style="margin-top: 10px;">
						<form method="POST" name="editkategori" id="editkategori"<?php     echo "action='$database?t=$token&pilih=kategori&untukdi=edit' "; ?>>
						<?php     echo"<input type='hidden' name='id' value='$r[id_kategori]'>"; ?>
							<tr><td valign="top" class="isiankanan" style="width: 40px;">Nama</td><td class="isian"><input type="text" class="maksimal" name="nama_kat" value="<?php    echo "$r[nama_kategori]"; ?>"></td></tr>
							<tr><td valign="top" class="isiankanan" style="width: 40px;">Deskripsi</td><td class="isian"><textarea style="height: 165px;" name="deskripsi_kat"><?php    echo "$r[deskripsi_kategori]"; ?></textarea></td></tr>
							<tr><td valign="top" class="isiankanan"  style="width: 40px;">Kategori Link</td>
							<td class="isian">
										<?php    
											$kats=mysql_query("SELECT * FROM ".$DB_KODE."_kategori where fungsi='link' AND id_kategori=$r[sub] ORDER BY nama_kategori ASC");
											$ks=mysql_fetch_array($kats);
										?>
									<select name="sub">
										<option value="<?php    echo "$r[sub]"; ?>" selected><?php    echo "$ks[nama_kategori]"; ?></option>
										<?php    
											$kat=mysql_query("SELECT * FROM ".$DB_KODE."_kategori where fungsi='link' ORDER BY nama_kategori ASC");
											while($k=mysql_fetch_array($kat)){
											echo "<option value='$k[id_kategori]'>$k[nama_kategori]</option>";}
										?>
									</select>
							</td></tr>							
							<tr><td valign="top" class="isiankanan" style="width: 40px;"></td><td class="isian">
							<input type="submit" class="pencet" value="Update">
							</td></tr>
						</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editkategori");
			frmvalidator.addValidation("nama_kat","req","Nama kategori harus diisi");
	  
			//]]>
		</script>
						</table>
				</div>
				
				<div class="kanankecil">
				<!--Menampilkan form pengumuman pada halaman dashboard, form ini digunakan sebagai shortcut atau jalan pintas
				yang tidak mengharuskan admin untuk masuk ke modul pengumuman-->
				<?php     include "aplikasi/link/link_kategori_data.php"; ?>
				</div>
				<div class="clear"></div>
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

