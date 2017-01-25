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



if($_SESSION['leveluser'] == '0') {
$database="aplikasi/link/link.php";
switch($_GET[pilih]){
default: ?>
<h3>Link</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">

<?php 			include "aplikasi/link/header.php"; ?>
		</div>
			
		<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=link&untukdi=tambah'";?> name='tambahlink' id='tambahlink' >
			<tr><td valign="top" class="isiankanan" width="100px">Nama Link</td><td class="isian"><input type="text" name="nama_link" class="sedang"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Masukkan nama website atau instansi yang diinginkan
			</i><br><hr></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="100px">URL</td><td class="isian"><input type="text" name="url_link" class="sedang"></td></tr>
			<tr><td valign="top" class="isiankanan" width="100px">Keterangan</td><td class="isian"><textarea type="text" name="isi2" class="sedang" style="height: 100px"></textarea></td></tr>
						<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Masukkan url website tanpa di awali dengan http:// , contoh <b>www.formulasi.or.id</b>
			</i><br><hr></td></tr>
							<tr><td valign="top" class="isiankanan"  style="width: 40px;">Kategori</td>
							<td class="isian">
									<select name="kategori">
										<option value="" selected>Pilih kategori</option>
										<?php    
											$kat=mysql_query("SELECT * FROM ".$DB_KODE."_kategori where fungsi='link' ORDER BY nama_kategori ASC");
											while($k=mysql_fetch_array($kat)){
											echo "<option value='$k[id_kategori]'>$k[nama_kategori]</option>";}
										?>
									</select>
							</td></tr>			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="reset" class="hapus" value="Reset">
			<input type="button" class="pencet" value="Kategori" onclick="window.location.href='?t=<?php echo $token; ?>&pilih=kategori';">
			</td></tr>
		</form>
		
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahlink");
			frmvalidator.addValidation("nama_link","kategori","Kategori link harus diisi");
			frmvalidator.addValidation("nama_link","req","Nama link harus diisi");
			frmvalidator.addValidation("isi2","req","Keterangan link harus diisi");
			frmvalidator.addValidation("nama_link","maxlen=20","Nama link maksimal 20 karakter");
			frmvalidator.addValidation("nama_link","minlen=3","Nama link minimal 3 karakter");
			
			frmvalidator.addValidation("url_link","req","URL harus diisi");
			frmvalidator.addValidation("url_link","maxlen=250","URL  maksimal 250 karakter");
			
			
			//]]>
		</script>
		</table>
		<hr>
		<div class="atastabel" style="margin-bottom: 10px">
		</div>
		<?php     include "aplikasi/link/link_inc.php";?>
	
</div><!--Akhir class isi kanan-->

		<?php     break;
		
		case "edit":
			include "aplikasi/link/link_edit.php";
		break;
		
		case "kategori":
			include "aplikasi/link/link_kategori_pilih.php";
		break; 
		case "edit_kategori":
		include "aplikasi/link/link_kategori_edit.php";	
		}
		}
		?>	

<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

}
?>

