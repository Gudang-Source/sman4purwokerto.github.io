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
?>
<h3>Edit Link</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="pengaturan.php?t=<?php echo $token; ?>">Website</a></div>
			<div class="menuhorisontal"><a href="tema.php?t=<?php echo $token; ?>">Tema</a></div>
			<div class="menuhorisontal"><a href="plugin.php?t=<?php echo $token; ?>">Plugin</a></div>
			<div class="menuhorisontal"><a href="ym.php?t=<?php echo $token; ?>">Yahoo! Messenger</a></div>
			<div class="menuhorisontal"><a href="polling.php?t=<?php echo $token; ?>">Polling</a></div>
			<div class="menuhorisontalaktif"><a href="link.php?t=<?php echo $token; ?>">Link</a></div>
			<div class="menuhorisontal"><a href="statistik.php?t=<?php echo $token; ?>">Statistik</a></div>
		</div>

		<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=link&untukdi=edit'";?> name='editlink' id='editlink' >
		<?php    $id=ceknomor($_GET['id']);
			$edit=mysql_query("SELECT * FROM ".$DB_KODE."_sidebar WHERE id_sidebar='$id'");
			$r=mysql_fetch_array($edit);
			
			echo "<input type='hidden' name='id' value='$r[id_sidebar]'>";
		?>
			<tr><td valign="top" class="isiankanan" width="100px">Nama Link</td><td class="isian"><input type="text" name="nama_link" class="sedang" value="<?php    echo "$r[nama]";?>"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Masukkan nama website atau instansi yang diinginkan
			</i><br><hr></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="100px">URL</td><td class="isian"><input type="text" name="url_link" class="sedang" value="<?php    echo "$r[isi1]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="100px">Keterangan</td><td class="isian"><textarea  style="height: 100px" type="text" name="isi2" class="sedang"><?php    echo "$r[isi2]";?></textarea></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Masukkan url website tanpa di awalai dengan http:// , contoh <b>www.formulasi.or.id</b>
			</i><br><hr></td></tr>
			<tr><td valign="top" class="isiankanan"  style="width: 40px;">Kategori Link</td>
			<td class="isian">
						<?php    
							$kats=mysql_query("SELECT * FROM ".$DB_KODE."_kategori where fungsi='link' AND id_kategori=$r[kategori] ORDER BY nama_kategori ASC");
							$ks=mysql_fetch_array($kats);
						?>
					<select name="kategori">
						<option value="<?php    echo "$r[kategori]"; ?>" selected><?php    echo "$ks[nama_kategori]"; ?></option>
						<?php    
							$kat=mysql_query("SELECT * FROM ".$DB_KODE."_kategori where fungsi='link' ORDER BY nama_kategori ASC");
							while($k=mysql_fetch_array($kat)){
							echo "<option value='$k[id_kategori]'>$k[nama_kategori]</option>";}
						?>
					</select>
			</td></tr>			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editlink");
			frmvalidator.addValidation("nama_link","req","Nama link harus diisi");
			frmvalidator.addValidation("nama_link","maxlen=20","Nama link maksimal 20 karakter");
			frmvalidator.addValidation("nama_link","minlen=3","Nama link minimal 3 karakter");
			frmvalidator.addValidation("isi2","req","Keterangan link harus diisi");
			
			frmvalidator.addValidation("url_link","req","URL harus diisi");
			frmvalidator.addValidation("url_link","maxlen=250","URL  maksimal 250 karakter");
			
			
			//]]>
		</script>
		</table>
		<hr>
		<div class="atastabel" style="margin-bottom: 10px">
		</div>
		<?php     include "aplikasi/link/link.php";?>
</div><!--Akhir class isi kanan-->
<?php     } ?>

<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

}
?>

