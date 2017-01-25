<?php 
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
   
 if (!isset($_SESSION['kontenisi'])){
header ('location:../../index.php');
break;
}

?>

<div class="kotakSidebar">
<img src="file/tema/<?php  echo $_SESSION['temaweb'];?>/css/img/e-learning.png">


<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 if (!isset($_SESSION['kontenisi'])){
header ('location:../../index.php');
break;
}
if (isset($_SESSION['siswa']) OR isset($_SESSION['guru'])){
?>
<table>
<?php     if (isset($_SESSION['siswa'])) { 
$data_siswa_login=mysql_query("SELECT * FROM ".$DB_KODE."_siswa WHERE nis='$_SESSION[siswa]'");
$datasl=mysql_fetch_array($data_siswa_login);
							global $ns;
							$siswa=$datasl['nama_siswa'].'9a9z9'.$ns['isi_pengaturan'];							
						    $siswa = strtolower(preg_replace("/\s/","9a9z9",$siswa));
							$siswa = preg_replace('#\W#', '', $siswa);								
							$siswa = str_replace("9a9z9","-",$siswa);
							$purl_siswa = "edit-profil-".$datasl['nis']."-".$siswa.".html";
							$passurl_siswa = "ubah-password-".$datasl['nis']."-".$siswa.".html";
							$url_siswa = "profil-user-".$datasl['nis']."-".$siswa.".html";
?>
<tr class="form"><td rowspan="4"><img src="images/foto/siswa/<?php     echo $datasl['foto']?>"  width="60px" style="padding: 3px; background: #909090; border: 1px solid #5b5b5b;"></td></tr>
<tr class="form"><td><a href="<?php  echo $purl_siswa; ?>" title="Profil"><b><?php     echo $datasl['nama_siswa']?></b></a></td></tr>
<tr class="form"><td><a href="<?php  echo $purl_siswa; ?>" title="Edit Profil"><b>Edit Profil</b></a></td></tr>
<tr class="form"><td><a href="<?php  echo $passurl_siswa; ?>" title="Ubah Password"><b>Ubah Password</b></a></td></tr>
<tr class="form"><td><b><?php     echo $datasl['nis']?></b></td></tr>
<tr class="form"><td><a href="kontenweb/elearning/logout.php" onClick="return confirm ('Apakah anda benar-benar akan keluar dari sistem?')" title='Log out'>Logout</a></td></tr>

<?php     }
else { 
$data_guru_login=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE nip='$_SESSION[guru]'");
$dgl=mysql_fetch_array($data_guru_login);
							global $ns;
							$guru=$dgl['nama_gurustaff'].'9a9z9'.$ns['isi_pengaturan'];							
						    $guru = strtolower(preg_replace("/\s/","9a9z9",$guru));
							$guru = preg_replace('#\W#', '', $guru);								
							$guru = str_replace("9a9z9","-",$guru);
							$purl_guru = "edit-profil-".$dgl['nip']."-".$guru.".html";
							$passurl_guru = "ubah-password-".$dgl['nip']."-".$guru.".html";
							$url_guru = "profil-user-".$dgl['nip']."-".$guru.".html";
?>
<tr class="form"><td rowspan="4"><img src="images/foto/guru/<?php     echo $dgl['foto']?>" width="60px" style="padding: 3px; border: 1px solid #dcdcdc;"></td></tr>
<tr class="form"><td><a href="<?php  echo $url_guru; ?>" title="Profil"><b><?php     echo $dgl['nama_gurustaff']?></b></a></td></tr>
<tr class="form"><td><a href="<?php  echo $purl_guru; ?>" title="Edit Profil"><b>Edit Profil</b></a></td></tr>
<tr class="form"><td><a href="<?php  echo $passurl_guru; ?>" title="Ubah Password"><b>Ubah Password</b></a></td></tr>
<tr class="form"><td><b><?php     echo $dgl['nip']?></b></td></tr>
<tr class="form"><td><a href="kontenweb/elearning/logout.php" onClick="return confirm ('Apakah anda benar-benar akan keluar dari sistem?')" title='Log out'>Logout</a></td></tr>

<?php     } ?>
</table>
<?php     }
else { ?>
<table>
	<form method="POST" action="kontenweb/elearning/validasi.php" name="login" id="login">
	<tr class="form"><td><b>Username</b></td><td><input type="text" class="panjang" style="width: 85%" name="username" title="Masukkan NIP atau NIS anda"></td></tr>
	<tr class="form"><td><b>Password</b></td><td><input type="password" class="panjang" style="width: 85%" name="password" title="Masukkan password anda"></td></tr>

	<tr class="form"><td><img src="kontenweb/captcha-login.php?date=<?php    echo date('YmdHis');?>" alt="security image" /></td>
				<td style="padding:0px;"><input style="width:50px;margin-right: 5px" title="masukkan kode gambar disamping" type="text" name="kode" class="pendek"><input type="submit" class="tombol"value="Login"></td></tr>
	</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("login");
			frmvalidator.addValidation("kode","req","Anda belum memasukkan kode keamanan");
			
			frmvalidator.addValidation("username","req","Anda belum memasukkan Username");
			frmvalidator.addValidation("password","req","Anda belum memasukkan Password");
			frmvalidator.addValidation("status","req","Anda belum memilih status");
			//]]>
		</script>
</table>
<?php     }

/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

</div> 