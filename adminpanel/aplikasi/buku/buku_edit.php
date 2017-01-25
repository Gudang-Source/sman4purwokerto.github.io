<?php   
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
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

<h3>Edit Buku Tamu</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulbox">Edit Data Buku Tamu</div>

		
		<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=bukutamu&untukdi=edit'";?> name='editbuku' id='editbuku' >
			<?php    $id=ceknomor($_GET['id']);  
			$edit=mysql_query("SELECT * FROM ".$DB_KODE."_buku_tamu WHERE id_bukutamu='$id'");
			$r=mysql_fetch_array($edit);
			
			echo "<input type='hidden' name='id' value='$r[id_bukutamu]'>";
			?>
			<tr><td valign="top" class="isiankanan" width="175px">Nama Pengirim</td><td class="isian"><input type="text" name="nama_pengirim" class="maksimal" value="<?php    echo "$r[nama_bukutamu]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Email</td><td class="isian"><input type="text" name="email" class="sedang" value="<?php    echo "$r[email]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Subjek</td><td class="isian"><input type="text" name="subjek" class="maksimal" value="<?php    echo "$r[subjek]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Isi Pesan</td><td class="isian"><textarea name="isi_pesan" style="height: 100px"><?php    echo "$r[isi_pesan]";?></textarea></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Tanggal Kirim</td><td class="isian"><input type="text" id="tanggal" name="tanggal_kirim" class="pendek" value="<?php    echo "$r[tanggal_kirim]";?>"></td></tr>

			<tr><td valign="top" class="isiankanan" width="175px">Status Buku Tamu</td>
			<td class="isian">
			<?php     if($r[status]== 1){ ?>
					<input type="radio" name="status_buku" value="1" checked/>Terima&nbsp;
					<input type="radio" name="status_buku" value="0"/>Tolak
			<?php     }
			else { ?>
					<input type="radio" name="status_buku" value="1" />Terima&nbsp;
					<input type="radio" name="status_buku" value="0" checked/>Tolak
			<?php     } ?>
			</td></tr>
			
	
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editbuku");
			frmvalidator.addValidation("nama_pengirim","req","Nama pengirim harus diisi");
			frmvalidator.addValidation("nama_pengirim","maxlen=30","Nama pengirim maksimal 30 karakter");
			frmvalidator.addValidation("nama_pengirim","minlen=3","Nama pengirim minimal 3 karakter");
			
			frmvalidator.addValidation("email","email","Format email salah");
			frmvalidator.addValidation("email","req","Email pengirim harus diisi");
			
			frmvalidator.addValidation("isi_pesan","req","Isi pesan harus diisi");
			frmvalidator.addValidation("isi_pesan","maxlen=200","Isi pesan maksimal 200 karakter");
			frmvalidator.addValidation("isi_pesan","minlen=5","Isi pesan minimal 5 karakter");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->

<?php   }
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

