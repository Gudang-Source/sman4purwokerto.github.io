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

<h3>Edit Informasi Profil</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="informasi_sekolah.php?t=<?php echo $token; ?>">Informasi<?php echo $_SESSION['Bsekolah']; ?></a></div>
			<div class="menuhorisontal"><a href="gmap.php?t=<?php echo $token; ?>">Lokasi Gmap</a></div>
			<div class="menuhorisontalaktif"><a href="profil.php?t=<?php echo $token; ?>">Profil</a></div>
			<div class="menuhorisontal"><a href="agenda.php?t=<?php echo $token; ?>">Agenda</a></div>
			<div class="menuhorisontal"><a href="pengumuman.php?t=<?php echo $token; ?>">Pengumuman</a></div>
		</div>
		
		<table class="isian">
		<?php    $id=ceknomor($_GET['id']);
		$edit=mysql_query("SELECT * FROM ".$DB_KODE."_info_sekolah WHERE id_info='$id'");
		$r=mysql_fetch_array($edit);
		echo " <form method='POST' action='$database?t=$token&pilih=profil&untukdi=edit' name='profil_edit' id='profil_edit'>
		<input type='hidden' name='id' value='$r[id_info]'>
		";?>
			<tr><td class="isian" colspan="2"><input type="text" class="maksimal" name="nama_info" value="<?php    echo "$r[nama_info]";?>"></td></tr>
			
			<tr><td class="isian" colspan="2"><textarea id="tini" class="tini" name="isi_info"><?php    echo "$r[isi_info]";?></textarea></td></tr>
			<?php    
				if ($r[id_info] != 1){ ?>
			<tr><td valign="top" class="isiankanan" width="100px">Posisi</td>
				<td class="isian">
				<?php    
					if ($r[posisi_menu]==1) {
						echo "
					<input type='radio' name='posisi_menu' value='1' checked>Menu&nbsp;
					<input type='radio' name='posisi_menu' value='0'>Submenu"; }
					
					elseif ($r[posisi_menu==0]) {
						echo "
					<input type='radio' name='posisi_menu' value='1'>Menu&nbsp;
					<input type='radio' name='posisi_menu' value='0' checked>Submenu";
					}
					
				
				} 
				else {
				echo "<input type='hidden' name='posisi_menu' value='2'>";
				}
				?>
				</td>
			</tr>
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
			var frmvalidator  = new Validator("profil_edit");
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

