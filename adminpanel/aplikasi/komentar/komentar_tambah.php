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

<h3>Tambah Komentar</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
<?php 			include "aplikasi/komentar/header.php"; ?>	
		</div>
		
		<table class="isian">
		<form method="POST"<?php     echo "action='$database?t=$token&pilih=komentar&untukdi=tambah'";?> name="tambahkomentar" id="tambahkomentar">
			<tr><td valign="top" class="isiankanan" width="100px">Nama</td><td class="isian"><input type="text" name="nama_kom" class="sedang"></td></tr>
			<tr><td valign="top" class="isiankanan" width="100px">Email</td><td class="isian"><input type="text" name="email_kom" class="sedang"></td></tr>
			<tr><td valign="top" class="isiankanan" width="100px">Judul Berita</td>
				<td class="isian">
					<select name="judul_berita">
						<option value="" selected>Pilih judul berita untuk di komentari...</option>
					<?php     	$judulberita=mysql_query("SELECT * FROM ".$DB_KODE."_berita WHERE status_komentar='1'");
							while ($jb=mysql_fetch_array($judulberita)){
						echo "
						<option value='$jb[id_berita]'>$jb[judul_berita]</option>"; }
					?>
					</select>
				</td>
			</tr>
			<tr><td valign="top" class="isiankanan" width="100px">Isi Komentar</td><td class="isian"><textarea name="isi_kom" style="height:125px; width: 60%"></textarea></td></tr>
			<tr><td valign="top" class="isiankanan" width="100px">Status</td>
				<td class="isian">
					<input type="radio" name="status_terima" value="1">Terima&nbsp;
					<input type="radio" name="status_terima" value="0">Tolak
				</td>
			</tr>
			<tr><td valign="top" class="isiankanan" width="100px">Tgl Komentar</td><td class="isian"><input type="text" name="tgl_kom" id="tanggal" class="pendek"></td></tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahkomentar");
				frmvalidator.addValidation("nama_kom","req","Nama komentator harus diisi");
				frmvalidator.addValidation("nama_kom","maxlen=20","Maksimal karakter untuk nama adalah 20");
				frmvalidator.addValidation("nama_kom","minlen=3","Minimal karakter untuk nama adalah 3");
				
				frmvalidator.addValidation("email_kom","maxlen=50","Email maksimal 50 karakter");
				frmvalidator.addValidation("email_kom","req","Email harus diisi");
				frmvalidator.addValidation("email_kom","email","Format email salah");
				
				frmvalidator.addValidation("judul_berita","req","Anda belum memilih judul berita");
				
				frmvalidator.addValidation("isi_kom","req","Komentar harus diisi");
				frmvalidator.addValidation("isi_kom","minlen=3","Komentar minimal 5 karakter");
	  
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

