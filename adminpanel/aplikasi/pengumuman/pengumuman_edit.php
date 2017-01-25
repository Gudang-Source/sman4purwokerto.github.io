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

<h3>Tambah Pengumuman</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="informasi_sekolah.php?t=<?php echo $token; ?>">Informasi<?php echo $_SESSION['Bsekolah']; ?></a></div>
			<div class="menuhorisontal"><a href="gmap.php?t=<?php echo $token; ?>">Lokasi Gmap</a></div>
			<div class="menuhorisontal"><a href="profil.php?t=<?php echo $token; ?>">Profil</a></div>
			<div class="menuhorisontal"><a href="agenda.php?t=<?php echo $token; ?>">Agenda</a></div>
			<div class="menuhorisontalaktif"><a href="pengumuman.php?t=<?php echo $token; ?>">Pengumuman</a></div>
		</div>
		
		<table class="isian">
		<?php   $id=ceknomor($_GET['id']);  echo " <form method='POST' action='$database?t=$token&pilih=pengumuman&untukdi=edit' name='pengumuman_edit' id='pengumuman_edit'>";
		$edit=mysql_query("SELECT * FROM ".$DB_KODE."_pengumuman WHERE id_pengumuman='$id'");
		$r=mysql_fetch_array($edit);
		
		echo "<input type='hidden' name='id' value='$r[id_pengumuman]'>";
		?>
			<tr><td class="isian" colspan="2"><input type="text" class="maksimal" name="judul_pengumuman" value="<?php    echo "$r[judul_pengumuman]";?>" ></td></tr>
			
			<tr><td class="isian" colspan="2"><textarea id="tini" class="tini" name="isi_pengumuman"><?php    echo "$r[isi_pengumuman]";?></textarea></td></tr>
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
			var frmvalidator  = new Validator("pengumuman_edit");
				frmvalidator.addValidation("judul_pengumuman","req","Judul Pengumuman harus diisi");
				frmvalidator.addValidation("judul_pengumuman","maxlen=30","Maksimal karakter untuk Judul Pengumuman adalah 30");
				frmvalidator.addValidation("judul_pengumuman","minlen=3","Minimal karakter untuk Judul Pengumuman adalah 3");
				
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

