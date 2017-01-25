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
<h3>Edit Polling</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="pengaturan.php?t=<?php echo $token; ?>">Website</a></div>
			<div class="menuhorisontal"><a href="tema.php?t=<?php echo $token; ?>">Tema</a></div>
			<div class="menuhorisontal"><a href="plugin.php?t=<?php echo $token; ?>">Plugin</a></div>
			<div class="menuhorisontal"><a href="ym.php?t=<?php echo $token; ?>">Yahoo! Messenger</a></div>
			<div class="menuhorisontalaktif"><a href="polling.php?t=<?php echo $token; ?>">Polling</a></div>
			<div class="menuhorisontal"><a href="link.php?t=<?php echo $token; ?>">Link</a></div>
			<div class="menuhorisontal"><a href="statistik.php?t=<?php echo $token; ?>">Statistik</a></div>
		</div>

		<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=polling&untukdi=edit'";?> name='editpolling' id='editpolling' >
		<?php    $id=ceknomor($_GET['id']);
			$edit=mysql_query("SELECT * FROM ".$DB_KODE."_sidebar WHERE id_sidebar='$id'");
			$r=mysql_fetch_array($edit);
			
			echo "<input type='hidden' name='id' value='$r[id_sidebar]'>
				  <input type='hidden' name='status' value='$r[isi2]'>
			";
		?>
			<tr><td valign="top" class="isiankanan" width="100px">Isi Polling</td><td class="isian"><input type="text" name="isi_polling" class="maksimal" value="<?php    echo "$r[nama]";?>"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			<?php    
			if ($r[isi2]=='jawaban'){ ?>
			Masukkan isi polling yang berupa jawaban dari pertanyaan polling
			<?php     }
			else { ?>
			Masukkan pertanyaan sesuai dengan keinginan anda
			<?php     } ?>
			</i><br><hr></td></tr>
			<?php    
			if ($r[isi2]== 'jawaban'){
			?>
			<tr><td valign="top" class="isiankanan" width="100px">Jumlah Poll</td><td class="isian"><input type="text" name="jml_poll" class="pendek" value="<?php    echo "$r[isi1]";?>"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Pengisian jumlah polling hanya untuk manipulasi data saja, di mohon digunakan dengan bijak
			</i><br><hr></td></tr>
			<?php     } ?>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editpolling");
			frmvalidator.addValidation("isi_polling","req","Isi polling harus diisi");
			frmvalidator.addValidation("isi_polling","maxlen=50","Isi Polling maksimal 50 karakter");
			frmvalidator.addValidation("isi_polling","minlen=2","Isi Polling minimal 2 karakter");
			
			//]]>
		</script>
		
		</table>
		<hr>
		<div class="atastabel" style="margin-bottom: 10px">
		</div>
		<?php     include "aplikasi/polling/polling.php";?>
		
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

