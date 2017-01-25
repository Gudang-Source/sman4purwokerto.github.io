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
<h3>Edit Agenda</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="informasi_sekolah.php?t=<?php echo $token; ?>">Informasi<?php echo $_SESSION['Bsekolah']; ?></a></div>
			<div class="menuhorisontal"><a href="gmap.php?t=<?php echo $token; ?>">Lokasi Gmap</a></div>
			<div class="menuhorisontal"><a href="profil.php?t=<?php echo $token; ?>">Profil</a></div>
			<div class="menuhorisontalaktif"><a href="agenda.php?t=<?php echo $token; ?>">Agenda</a></div>
			<div class="menuhorisontal"><a href="pengumuman.php?t=<?php echo $token; ?>">Pengumuman</a></div>
		</div>
		
		<table class="isian">
		<?php     echo " <form method='POST' action='$database?t=$token&pilih=agenda&untukdi=edit' name='editagenda' id='editagenda'>";
		$id=ceknomor($_GET['id']);
		$edit=mysql_query("SELECT * FROM ".$DB_KODE."_agenda WHERE id_agenda='$id'");
		$r=mysql_fetch_array($edit);
		
		echo "<input type='hidden' name='id' value='$r[id_agenda]'>";
		?>
			<tr><td valign="top" class="isiankanan" width="175px">Judul Agenda</td><td class="isian"><input type="text" name="judul" class="maksimal" value="<?php    echo "$r[judul_agenda]";?>"> </td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Tanggal Agenda</td><td class="isian"><input type="text" name="tanggal" class="pendek" id="tanggal" value="<?php    echo "$r[tanggal_agenda]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Tempat</td><td class="isian"><input type="text" name="tempat" class="maksimal" value="<?php    echo "$r[tempat_agenda]";?>"></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Keterangan</td><td class="isian"><textarea name="keterangan" id='tini' style="height: 100px"><?php    echo "$r[keterangan_agenda]";?></textarea></td></tr>
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
			var frmvalidator  = new Validator("editagenda");
			frmvalidator.addValidation("judul","req","Judul agenda harus diisi");
			frmvalidator.addValidation("tanggal","req","Tanggal agenda harus diisi");
			frmvalidator.addValidation("tempat","req","Tempat agenda harus diisi");
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