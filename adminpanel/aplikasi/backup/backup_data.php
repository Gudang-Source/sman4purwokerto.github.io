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



if($_SESSION['leveluser'] == '0') {
$database1="aplikasi/backup/backup.php";
$database2="aplikasi/backup/restore.php";
 ?>
<h3>Backup Database</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="pengaturan.php?t=<?php echo $token; ?>">Website</a></div>
			<div class="menuhorisontal"><a href="tema.php?t=<?php echo $token; ?>">Tema</a></div>
			<div class="menuhorisontal"><a href="blok.php?t=<?php echo $token; ?>">Blok</a></div>
			<div class="menuhorisontal"><a href="menu.php?t=<?php echo $token; ?>">Menu</a></div>
			<div class="menuhorisontal"><a href="plugin.php?t=<?php echo $token; ?>">Plugin</a></div>
			<div class="menuhorisontal"><a href="modul.php?t=<?php echo $token; ?>">Modul</a></div>
			<div class="menuhorisontal"><a href="ym.php?t=<?php echo $token; ?>">Yahoo! Messenger</a></div>
			<div class="menuhorisontal"><a href="polling.php?t=<?php echo $token; ?>">Polling</a></div>
			<div class="menuhorisontal"><a href="link.php?t=<?php echo $token; ?>">Link</a></div>
			<div class="menuhorisontal"><a href="statistik.php?t=<?php echo $token; ?>">Statistik</a></div>
			<div class="menuhorisontalaktif"><a href="backup.php?t=<?php echo $token; ?>">Backup</a></div>
		</div>

		<table class="tabel" style='margin-left:15px'>
		<form method='POST' target="_blank"action="<?php    echo "$database1?t=$token";?>" name='backups' id='backups' >
<?php    
			global $DATABASE;
			echo "<tr><td colspan='2' class='isian'>";			
			echo "<h3>Backup & Restore Database: ".$DATABASE."</h3><input type='hidden' name='backup' value='".$DB_KODE."'>
			<input type='hidden' name='db' value='".$DATABASE."'></td></tr>";
			
			echo "<tr><td  class='isian' width='20'></td><td><input type='submit' name='submit' value='Backup Database'></td></tr>";
?>

		</form>
		<form method='POST'  action="<?php    echo "$database2?t=$token";?>" name='restores' id='restores' enctype="multipart/form-data" >

<?php    
			global $DATABASE;
			echo "<tr><td colspan='2' class='isian'><hr>";			
			echo "<input type='hidden' name='restore' value='".$DB_KODE."'>
			<input type='hidden' name='db' value='".$DATABASE."'></td></tr>";
			
			echo "<tr><td  class='isian' width='20'></td><td>Silakan Pilih File .sql:<br>
			<input name='fupload' type='file'><br>
			<input type='submit' name='submit' value='Restore Database'></td></tr>";
			echo "</form>";
			echo "<tr><td colspan='2'  class='isian' ><hr><i><u><b>Catatan :</b></u></i><br>
		<li>Untuk backup/restore memerlukan waktu...!</li>
		<li>Cepat tidaknya waktu backup/restore tergantung jumlah isi file database anda.</li>
		<li>Sebaiknya menggunakan koneksi internet yang baik untuk menghindari kemungkinan gagal.</li>
		<li>Backup/restore ini untuk semua isi database, tidak dapat berjalan dengan baik bila restore hanya sebagaian atau beberapa tabel saja.</li>
		<br> </td></tr>";		
			echo "</table><br>";

?>
		.
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("restores");
			frmvalidator.addValidation("fupload","req","Pilih file database backup dulu untuk restore");
	  
			frmvalidator.addValidation("jml_data","req","Jumlah data harus diisi");
			//]]>
		</script>
		</table>
</div><!--Akhir class isi kanan-->
<?php     }

else { ?>
<h3>Anda tidak diijinkan mengakses halaman ini</h3>
<?php     } ?>

<?php   
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

}
?>

