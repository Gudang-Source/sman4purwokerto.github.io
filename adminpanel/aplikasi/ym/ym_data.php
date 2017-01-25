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
$database="aplikasi/ym/ym.php";
switch($_GET['pilih']){
default: ?>
<h3>Yahoo! Messenger</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="pengaturan.php?t=<?php echo $token; ?>">Website</a></div>
			<div class="menuhorisontal"><a href="tema.php?t=<?php echo $token; ?>">Tema</a></div>
			<div class="menuhorisontal"><a href="blok.php?t=<?php echo $token; ?>">Blok</a></div>
			<div class="menuhorisontal"><a href="menu.php?t=<?php echo $token; ?>">Menu</a></div>
			<div class="menuhorisontal"><a href="plugin.php?t=<?php echo $token; ?>">Plugin</a></div>
			<div class="menuhorisontal"><a href="modul.php?t=<?php echo $token; ?>">Modul</a></div>
			<div class="menuhorisontalaktif"><a href="ym.php?t=<?php echo $token; ?>">Yahoo! Messenger</a></div>
			<div class="menuhorisontal"><a href="polling.php?t=<?php echo $token; ?>">Polling</a></div>
			<div class="menuhorisontal"><a href="link.php?t=<?php echo $token; ?>">Link</a></div>
			<div class="menuhorisontal"><a href="statistik.php?t=<?php echo $token; ?>">Statistik</a></div>
			<div class="menuhorisontal"><a href="backup.php?t=<?php echo $token; ?>">Backup</a></div>
		</div>

		<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=ym&untukdi=tambah'";?> name='tambahym' id='tambahym' >
			<tr><td valign="top" class="isiankanan" width="100px">Nama Lengkap</td><td class="isian"><input type="text" name="nama_lengkap" class="sedang"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Masukkan lengkap pemilik account Yahoo! Messenger sesuai dengan nama sebenarnya, minimal 5 karakter maksimal 30 karakter
			</i><br><hr></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="100px">Email</td><td class="isian"><input type="text" name="email" class="sedang"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Email yang dimasukkan harus email dari Yahoo, untuk <b>@yahoo.com</b> dan <b>@yahoo.co.id</b> tulis id nya saja. Contoh: <b>arirusmanto@yahoo.com</b> ditulis <b>arirusmanto</b>
			</i><br><hr></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="reset" class="hapus" value="Reset">
			</td></tr>
		</form>
		
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahym");
			frmvalidator.addValidation("nama_lengkap","req","Nama lengkap harus diisi");
			frmvalidator.addValidation("nama_lengkap","maxlen=30","Nama lengkap maksimal 30 karakter");
			frmvalidator.addValidation("nama_lengkap","minlen=3","Nama lengkap minimal 5 karakter");
			
			
			frmvalidator.addValidation("email","req","Email harus diisi");
			frmvalidator.addValidation("email","mixlen=30","Email maksimal 30 karakter");
			
			
			//]]>
		</script>
		
		</table>
		<hr>
		<div class="atastabel" style="margin-bottom: 10px">
		</div>
		<?php     include "aplikasi/ym/ym_inc.php";?>
</div><!--Akhir class isi kanan-->

		<?php     break;
		
		case "edit":
			include "aplikasi/ym/ym_edit.php";
		}
		}
		?>

<?php   }
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

