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

$database="aplikasi/admin/admin.php";
switch($_GET['pilih']){
default: ?>
<h3>Menejemen Administrator</h3>

<div class="isikanan"><!--Awal class isi kanan-->

		<div class="judulisikanan">
			<div class="menuhorisontalaktif"><a href="admin.php?t=<?php echo $token; ?>">Edit Admin</a></div>
			<div class="menuhorisontal"><a href="admin.php?t=<?php echo $token; ?>&pilih=level">Level Admin</a></div>
		</div>

	<div class="clear"></div>		
	
		<div class="judulbox">Data Administrator</div>
		<?php    
		if($_SESSION['leveluser'] != '0') {
		?>
		
		
		<table class="isian">
		<form method='POST' action="<?php    echo "$database?t=$token&pilih=admin&untukdi=editadmin";?>" name='tambahadmin' id='tambahadmin' >
		<?php    
			$edit=mysql_query("SELECT * FROM ".$DB_KODE."_users WHERE s_username='$_SESSION[adminsh]'");
			$r=mysql_fetch_array($edit);
			
			echo "<input type='hidden' name='id' value='$r[id_users]'>";
		?>
			<tr><td valign="top" class="isiankanan" width="100px">Nama Lengkap</td><td class="isian"><input type="text" name="nama_admin" class="sedang" value="<?php    echo "$r[nama_lengkap_users]";?>"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Masukkan lengkap admin sesuai dengan nama sebenarnya, minimal 5 karakter maksimal 30 karakter
			</i><br><hr></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="100px">Username</td><td class="isian"><input type="text" name="username" class="sedang" value="<?php    echo "$r[namausers]";?>"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Username harus unik, minimal 5 karakter dan maksimal 8 karakter
			</i><br><hr></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="100px">Email</td><td class="isian"><input type="text" name="email" class="sedang" value="<?php    echo "$r[email_users]";?>"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Email yang dimasukkan harus valid
			</i><br><hr></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="100px">Password</td><td class="isian">
			<a href="javascript:void(0)"onclick="window.open('<?php    echo "aplikasi/admin_password.php?id=$r[id_users]"; ?>','linkname','height=315, width=500,scrollbars=yes')"><b><u>Ganti Password</u></b></a></td></tr>
		
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			</td></tr>
		</form>
		
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahadmin");
			frmvalidator.addValidation("nama_admin","req","Nama admin harus diisi");
			frmvalidator.addValidation("nama_admin","maxlen=30","Nama admin maksimal 30 karakter");
			frmvalidator.addValidation("nama_admin","minlen=5","Nama admin minimal 5 karakter");
	  
			frmvalidator.addValidation("username","req","Username harus diisi");
			frmvalidator.addValidation("username","maxlen=15","Username maksimal 15 karakter");
			frmvalidator.addValidation("username","minlen=8","Username minimal 8 karakter");
			
			frmvalidator.addValidation("email","email","Format email salah");
			frmvalidator.addValidation("email","req","Email harus diisi");
			frmvalidator.addValidation("email","mixlen=30","Email maksimal 30 karakter");
			
			//]]>
		</script>
		</table>
		
		<?php     } 
		else {
		
		$pengaturanadmin=mysql_query("SELECT * FROm ".$DB_KODE."_pengaturan WHERE id_pengaturan='2'");
		$pa=mysql_fetch_array($pengaturanadmin);
		if ($pa[isi_pengaturan]=='1'){
		?>
		<table class="isian">
		<form method='POST' action="<?php    echo "$database?t=$token&pilih=admin&untukdi=tambah";?>" name='tambahadmin' id='tambahadmin' >
			<tr><td valign="top" class="isiankanan" width="100px">Nama Lengkap</td><td class="isian"><input type="text" name="nama_admin" class="sedang"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Masukkan lengkap admin sesuai dengan nama sebenarnya, minimal 5 karakter maksimal 30 karakter
			</i><br><hr></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="100px">Username</td><td class="isian"><input type="text" name="username" class="sedang"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Username harus unik, minimal 5 karakter dan maksimal 8 karakter
			</i><br><hr></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="100px">Email</td><td class="isian"><input type="text" name="email" class="sedang"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Email yang dimasukkan harus valid
			</i><br><hr></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="100px">Level Admin</td><td class="isian">
											<select name="level_users">
												<option value="9" selected>Pilih Level</option>
												<?php     $gadmin=mysql_query("SELECT * FROM ".$DB_KODE."_user_group ORDER BY id_user_group");
														while($ga=mysql_fetch_array($gadmin)){
														echo "<option value='$ga[id_user_group]'>$ga[nama_group]</option>"; } ?>
											</select>

			
			</td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Pilih akses level admin
			</i><br><hr></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="100px">Password</td><td class="isian"><input type="password" name="password" class="sedang"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Masukkan password dengan kombinasi 0-9 dan karakter a-z atau A-Z, minimal 6 karakter
			</i><br><hr></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="100px">Password Lagi</td><td class="isian"><input type="password" name="password_lagi" class="sedang"></td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Harus sama dengan password yang diatas
			</i><br><hr></td></tr>
		
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="reset" class="hapus" value="Reset">
			</td></tr>
		</form>
		
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahadmin");
			frmvalidator.addValidation("nama_admin","req","Nama admin harus diisi");
			frmvalidator.addValidation("nama_admin","maxlen=30","Nama admin maksimal 30 karakter");
			frmvalidator.addValidation("nama_admin","minlen=5","Nama admin minimal 5 karakter");
	  
			frmvalidator.addValidation("username","req","Username harus diisi");
			frmvalidator.addValidation("username","maxlen=15","Username maksimal 15 karakter");
			frmvalidator.addValidation("username","minlen=8","Username minimal 8 karakter");
			frmvalidator.addValidation("username","paswd","Username minimal memiliki 1 huruf besar dan 1 angka contoh : usernamE1");
						
			frmvalidator.addValidation("password_lagi","eqelmnt=password","Password tidak sama");
			frmvalidator.addValidation("password","paswd","password minimal memiliki 1 huruf besar dan 1 angka contoh : indonesiA1");
						
			frmvalidator.addValidation("password","neelmnt=username","Password tidak boleh sama dengan username");
			frmvalidator.addValidation("password","req","Password harus diisi");
			frmvalidator.addValidation("password","minlen=6","Password minimal 6 karakter");
			
			frmvalidator.addValidation("email","email","Format email salah");
			frmvalidator.addValidation("email","req","Email harus diisi");
			frmvalidator.addValidation("email","maxlen=30","Email maksimal 30 karakter");
			
			//]]>
		</script>
		</table>
		
		<hr>
		<div class="atastabel" style="margin-bottom: 10px">
		</div>
		<?php     } ?>
		
		<table class="tabel">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" width="125px">Nama Lengkap</th>
				<th class="tabel">Username</th>
				<th class="tabel">Level</th>
				<th class="tabel">Login Terakhir</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php     	$no=1;
					$admin=mysql_query("SELECT * FROM ".$DB_KODE."_users");
					while($ad=mysql_fetch_array($admin)){?>
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<td class="tabel"><a href=""><b><?php    echo "$ad[nama_lengkap_users]";?></b></a></td>
				<td class="tabel"><?php    echo "$ad[namausers]";?></td>
				<?php if ($ad[level_users]!=0){ $gadmin=mysql_query("SELECT * FROM ".$DB_KODE."_user_group WHERE id_user_group='$ad[level_users]' ORDER BY id_user_group");
															$ga=mysql_fetch_array($gadmin); $level=$ga['nama_group']; 
						}else{$level="SUPER ADMIN"; }
															?>
				<td class="tabel"><?php    echo "$level";?></td>
				<td class="tabel"><?php    echo "$ad[login_terakhir]";?></td>
				<td class="tabel">
					<?php  $iduser=base64_encode($ad['id_users']);   if ($ad[level_users] !='0'){ 
					
					?>
					<div class="hapusdata">
					<a href="<?php    echo "$database?t=$token&pilih=admin&untukdi=hapus&id=$iduser ";?>" onClick="return confirm ('Apakah anda benar-benar akan menghapus<?php     echo $ad[nama_lengkap_users]?>?')">hapus</a>
					</div>
					<div class="editdata"><a href="<?php    echo"?t=$token&pilih=edit&id=$iduser";?>">edit</a></div>
					<?php     }
					else { ?>
					<div class="editdata"><a href="<?php    echo"?t=$token&pilih=edit&id=$iduser";?>">edit</a></div>
					<?php     } ?>
				</td>
			</tr>
			<?php    
			$no++; }
			?>
		</table>
		<?php     } ?>
</div><!--Akhir class isi kanan-->
		<?php     break;
		
		case "edit":
			include "aplikasi/admin/admin_edit.php";
		break;
		
		case "level":
			include "aplikasi/admin/admin_level.php";
		break;
		
		case "edit_level":
			include "aplikasi/admin/admin_level_edit.php";
		}
		?>
	<?php   }
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>