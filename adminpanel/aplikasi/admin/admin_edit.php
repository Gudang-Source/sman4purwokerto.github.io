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
 if ($_SESSION['leveluser']== '0') { 
 $id=base64_decode($_GET['id']);
 $id= ceking($id);

 ?>
		<h3>Menejemen Administrator</h3>
<div class="isikanan"><!--Awal class isi kanan-->
		

		<div class="judulisikanan">
			<div class="menuhorisontalaktif"><a href="admin.php?t=<?php echo $token; ?>">Edit Admin</a></div>
			<div class="menuhorisontal"><a href="admin.php?t=<?php echo $token; ?>&pilih=level">Level Admin</a></div>
		</div>

	<div class="clear"></div>						
		<div class="judulbox">Edit Data Administrator</div>
		
		<table class="isian">
<?php   if(isset($_SESSION['salah'])){
?>
<tr><td valign="top" class="isiankanan" colspan="2">
<?php	echo $_SESSION['salah']; ?>
</td></tr>
<?php
	}
	
	?>
	
		<form method='POST' action="<?php    echo "$database?t=$token&pilih=admin&untukdi=edit";?>" name='editadmin' id='editadmin' >
		<?php    
			$edit=mysql_query("SELECT * FROM ".$DB_KODE."_users WHERE id_users='$id'");
			$r=mysql_fetch_array($edit);
			
			$kodec=base64_encode($id);
			echo "<input type='hidden' name='s_username' value='$r[s_username]'><input type='hidden' name='id' value='$kodec'>";
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
			
	
											<?php if ($r['level_users']==0){
											echo "<input type='hidden' name='level_users' value='0'>";			
											
											}else{
											?>
		<tr><td valign="top" class="isiankanan" width="100px">Level Admin</td><td class="isian">											
											<?php
												echo "<select name='level_users'>";
												$gadminn=mysql_query("SELECT * FROM ".$DB_KODE."_user_group WHERE id_user_group='$r[level_users]'");
															$gan=mysql_fetch_array($gadminn);?>
													<option value="<?php    echo "$r[level_users]";?>" selected><?php    echo "$gan[nama_group]";?></option>
													<?php     $gadmin=mysql_query("SELECT * FROM ".$DB_KODE."_user_group WHERE id_user_group!='$r[level_users]' ORDER BY id_user_group");
															while($ga=mysql_fetch_array($gadmin)){
															echo "<option value='$ga[id_user_group]'>$ga[nama_group]</option>"; }
												echo '</select>';
											?>
			</td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Pilih akses level admin
			</i><br><hr></td></tr>	
											<?php
											}	
											?>
											

			
		
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editadmin");
			frmvalidator.addValidation("nama_admin","req","Nama admin harus diisi");
			frmvalidator.addValidation("nama_admin","maxlen=30","Nama admin maksimal 30 karakter");
			frmvalidator.addValidation("nama_admin","minlen=5","Nama admin minimal 5 karakter");
	  
			frmvalidator.addValidation("username","req","Username harus diisi");
			frmvalidator.addValidation("username","maxlen=8","Username maksimal 8 karakter");
			frmvalidator.addValidation("username","minlen=5","Username minimal 5 karakter");
			frmvalidator.addValidation("username","paswd","Username minimal memiliki 1 huruf besar dan 1 angka contoh : usernamE1");
					
			
			frmvalidator.addValidation("email","email","Format email salah");
			frmvalidator.addValidation("email","req","Email harus diisi");
			frmvalidator.addValidation("email","mixlen=30","Email maksimal 30 karakter");
			
			//]]>
		</script>
		</table>
		<hr>
				<table class="isian" style="text-align: left;">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=admin&untukdi=gantipassword'";?> name='editpassword' id='editpassword' onSubmit="javascript:self.close();">
		<?php    
		$edit=mysql_query("SELECT * FROM ".$DB_KODE."_users WHERE id_users='$id'");
		$r=mysql_fetch_array($edit);
		
		$kode_psd=md5($r['sandiusers']);
			$kodec=base64_encode($id);
			echo "<input type='hidden' name='s_username' value='$r[s_username]'>
			<input type='hidden' name='id' value='$kodec'>";
				
		echo "<input type='hidden' name='kode' value='$kode_psd'>";
		?>
			<tr><td valign="top" class="isiankanan" width="115px">Password Lama</td><td class="isian"><input type="password" name="password0" class="maksimal"></td></tr>
				
			<tr><td valign="top" class="isiankanan" width="115px">Password</td><td class="isian"><input type="password" name="password" class="maksimal"></td></tr>
			<tr><td valign="top" class="isiankanan" width="115px">Ulang Password</td><td class="isian"><input type="password" name="password2" class="maksimal"></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editpassword");
			frmvalidator.addValidation("password","req","Password harus diisi");
			frmvalidator.addValidation("password0","req","Password lama harus diisi");
			
			frmvalidator.addValidation("password","paswd","password minimal memiliki 1 huruf besar dan 1 angka contoh : indonesiA1");
						
			frmvalidator.addValidation("password","maxlen=20","Password terlalu panjang, maksimal 20 karakter");
			frmvalidator.addValidation("password","minlen=8","Password terlalu pendek, minimal 8 karakter");
			frmvalidator.addValidation("password2","eqelmnt=password","Password tidak sama");
			
			
			//]]>
		</script>
		
		</table>		
		<hr>
		<div class="atastabel" style="margin-bottom: 10px">
		</div>
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
					<?php  $iduser=base64_encode($ad['id_users']);   if ($ad[level_users] !='0'){ ?>
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=admin&untukdi=hapus&id=$iduser";?>">hapus</a></div>
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

		
		
		
		
</div><!--Akhir class isi kanan-->





		<?php     } ?>
	<?php     } 
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
unset($_SESSION['salah']);
?>		