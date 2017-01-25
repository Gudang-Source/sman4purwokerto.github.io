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

function meta() {
global $ns, $r;
$web=$ns['isi_pengaturan'];
$descx='elearning ';
$title='Elearning';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='modul pelajaran '.$titlez;
$isi='';
$description=desc($isi,$descx);
$judul='';
$title=titx($judul,$title);
$title=$title.' - '.$web;
echo "<title>$title</title>
<meta name='description' content='$description'>
<meta name='keywords' content='$keywords'> ";
}

function konten() {
global $DB_KODE, $ns;
?>
<div id="konten">
<div id="lebar">


<?php 

include "kontenweb/elearning/menu.php"; 

?>


<h3>Login User</h3>
Maaf, untuk download materi silahkan login terlebih dahulu
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
<?php 
include "kontenweb/elearning/footer.php"; 
include "kontenweb/elearning/menu.php"; 
?>
		
		
</div>
</div>
<?php     } ?>

<?php    


/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

