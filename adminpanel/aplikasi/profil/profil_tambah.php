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

<h3>Tambah Informasi Profil</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="informasi_sekolah.php?t=<?php echo $token; ?>">Informasi<?php echo $_SESSION['Bsekolah']; ?></a></div>
			<div class="menuhorisontal"><a href="gmap.php?t=<?php echo $token; ?>">Lokasi Gmap</a></div>
			<div class="menuhorisontalaktif"><a href="profil.php?t=<?php echo $token; ?>">Profil</a></div>
			<div class="menuhorisontal"><a href="agenda.php?t=<?php echo $token; ?>">Agenda</a></div>
			<div class="menuhorisontal"><a href="pengumuman.php?t=<?php echo $token; ?>">Pengumuman</a></div>
		</div>
		
		<table class="isian">
		<?php     echo " <form method='POST' action='$database?t=$token&pilih=profil&untukdi=tambah' name='profil_tambah' id='profil_tambah' >"; ?>
			<tr><td class="isian" colspan="2"><input type="text" class="maksimal" name="nama_info"
			value="Judul informasi disini..." onblur="if(this.value=='') this.value='Judul informasi disini...';" onfocus="if(this.value=='Judul informasi disini...') this.value='';"></td></tr>
	
			<tr><td class="isian" colspan="2"><textarea class="tini" id="tini" name="isi_info"></textarea></td></tr>
			<tr><td valign="top" class="isiankanan" width="100px">Posisi</td>
				<td class="isian">
					<input type="radio" name="posisi_menu" value="Menu">Menu&nbsp;
					<input type="radio" name="posisi_menu" value="Submenu" checked>Submenu
				</td>
			</tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script>
			CKEDITOR.replace( 'tini' );
		</script>		
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("profil_tambah");
				frmvalidator.addValidation("nama_info","req","Judul informasi harus diisi");
				frmvalidator.addValidation("nama_info","maxlen=30","Maksimal karakter untuk Judul informasi adalah 30");
				frmvalidator.addValidation("nama_info","minlen=3","Minimal karakter untuk Judul informasi adalah 3");
				
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

