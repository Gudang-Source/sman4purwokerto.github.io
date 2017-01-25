<?php if(!isset($_SESSION)){session_start();}  error_reporting(0);    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */


if (!isset($_SESSION['pertama']))
{
	echo "<script>window.alert('Anda sudah dihalaman ini sebelumnya.');window.location=('info.php')</script>";
	exit;
}
else{

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Langkah Identitas Administrator <?php echo $_SESSION['jenisweb']; ?></title>
<link rel="Shortcut Icon" href="http://www.formulasi.or.id/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="../adminpanel/css/gaya.css">
<script language="JavaScript" src="../adminpanel/js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
</head>


<body style="text-align: center; background: url(../adminpanel/css/img/bg_biru.jpg)" >
<div id="instalkotak"  style="-webkit-border-bottom-right-radius: 20px;-webkit-border-bottom-left-radius: 20px;-moz-border-radius-bottomright: 20px;-moz-border-radius-bottomleft: 20px;border-bottom-right-radius: 20px;border-bottom-left-radius: 20px;box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);    -moz-box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);    -webkit-box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);">
	<div class="judulbox">
	<center>Input Database &raquo; Input data admin &raquo; <font color="b4b4b4">Input Data <?php echo $_SESSION['jenisweb']; ?> &raquo; Instalasi Selesai</font></center>
	</div><br>
	<center><img src="logo_atas.jpg"></center>
	
	<div class="boxInformasi"><h2> Langkah 3</h2>
	Masukkan identitas <b>Administrator</b> pengelola <?php echo $_SESSION['jenisweb']; ?>.
	</div>
	

<?php 	
	if ($_SESSION['install']>0){
	$proses_db='upgrade_'.$_SESSION['install'].'.php';
include "../konfigurasi/koneksi.php";
			$edit=mysql_query("SELECT * FROM ".$DB_KODE."_users WHERE level_users='Super Admin' limit 1");
			$r=mysql_fetch_array($edit);				
			$totaladmin=mysql_num_rows($edit);
			$edit0=mysql_query("SELECT * FROM ".$DB_KODE."_users WHERE level_users='0' limit 1");
			$r0=mysql_fetch_array($edit0);				
			$totaladmin0=mysql_num_rows($edit0);
			
			if ($totaladmin>0){
			$_SESSION['postemail'] =$r['email_users'];
			$_SESSION['namaskl'] =$r['nama_lengkap_users'];


?>
			<form method="POST" action="<?php echo $proses_db; ?>" name="pertama" id="pertama" style="float: left;">
			<table class="isian" style="margin-top: 10px;">
				<?php
				if ($r['level_users']=='Super Admin'){ 
					$sandi2=$r['sandiusers'];
					$sandi3=base64_decode($sandi2);
					$sandi4=MD5($sandi3);
					$sandi5=base64_decode($sandi4);
					$sandi=MD5($sandi5);
					$ursx=$r['id_users'];
					?>
					<input type='hidden' name='usrx' value="<?php echo $ursx; ?>">
					<input type='hidden' name='passusrx' value="<?php echo $sandi; ?>">
				<?php } ?>
				<tr><td class="isiankanan" width="125px">Nama Lengkap *</td><td class="isian"><?php echo $r['nama_lengkap_users']; ?></td></tr>
				<tr><td class="isiankanan" width="125px">Email *</td><td class="isian"><?php echo $r['email_users']; ?></td></tr>
				<tr><td class="isiankanan" width="125px">Username *</td><td class="isian"><?php echo $r['namausers']; ?></td></tr>
				<tr><td class="isiankanan" width="125px">Password *</td><td class="isian">****************</td></tr>
				<tr><td class="isiankanan" width="125px">Ulang Password *</td><td class="isian">****************</td></tr>
			<tr><td class="isiankanan" width="125px"></td><td class="isian">
			<input type="reset" value="Reset" class="hapus">
			<input type="submit" value="Lanjutkan &raquo;" class="batal">
			</td></tr>
		
<?php
			}elseif($totaladmin0>0){
			$_SESSION['postemail'] =$r0['email_users'];
			$_SESSION['namaskl'] =$r0['nama_lengkap_users'];
			

?>
			<form method="POST" action="<?php echo $proses_db; ?>" name="pertama" id="pertama" style="float: left;">
			<table class="isian" style="margin-top: 10px;">
					<tr><td class="isiankanan" width="125px">Nama Lengkap *</td><td class="isian"><?php echo $r['nama_lengkap_users']; ?></td></tr>
					<tr><td class="isiankanan" width="125px">Email *</td><td class="isian"><?php echo $r['email_users']; ?></td></tr>
					<tr><td class="isiankanan" width="125px">Username *</td><td class="isian"><?php echo $r['namausers']; ?></td></tr>
					<tr><td class="isiankanan" width="125px">Password *</td><td class="isian">****************</td></tr>
					<tr><td class="isiankanan" width="125px">Ulang Password *</td><td class="isian">****************</td></tr>
			<tr><td class="isiankanan" width="125px"></td><td class="isian">
			<input type="reset" value="Reset" class="hapus">
			<input type="submit" value="Lanjutkan &raquo;" class="batal">
			</td></tr>
		
<?php				
			}else{
			unset ($_SESSION['install']);
			$_SESSION['install']='0';
			?>
			<center><h1>ANDA TIDAK DAPAT MELAKUKAN UPDATE KARENA DATABASE ANDA TIDAK DITEMUKAN</h1>
			chek Prefix Database yang ada tulis apakah sudah benar... !<br>Jika Anda mau lanjut maka anda akan install dari awal, <br>bila ingin mengulang silahkan hapus dulu file <b>koneksi.php</b> pada folder <b>/konfigurasi</b></center>
				<form method="POST" action="index.php" name="pertama" id="pertama" style="float: left;">
				<table class="isian" style="margin-top: 10px;">	

			<tr><td class="isiankanan" width="125px"></td><td class="isian">
			<input type="submit" value="&laquo; KEMBALI " class="batal">
			</td></tr>
						<?php 			
			}
	}else{
			  if (file_exists("../konfigurasi/koneksi.php")) {

					include "../konfigurasi/koneksi.php";
					$edit=mysql_query("SELECT * FROM ".$DB_KODE."_users WHERE level_users='Super Admin' limit 1");
					$r=mysql_fetch_array($edit);				
					$totaladmin=mysql_num_rows($edit);
					$edit0=mysql_query("SELECT * FROM ".$DB_KODE."_users WHERE level_users='0' limit 1");
					$r0=mysql_fetch_array($edit0);				
					$totaladmin0=mysql_num_rows($edit0);
					
					if ($totaladmin>0){
						$_SESSION['postemail'] =$r['email_users'];
						$_SESSION['namaskl'] =$r['nama_lengkap_users'];
			
							
			
					?>
						<center><h1>DATABASE ANDA TELAH TERISI, DAN ANDA HARUS MELAKUKAN UPGRADE</h1>
						</center>
							
								<form method="POST" action="index.php" name="pertama" id="pertama" style="float: left;">
								<table class="isian" style="margin-top: 10px;">
										<tr><td class="isiankanan" width="125px">Nama Lengkap *</td><td class="isian"><?php echo $r['nama_lengkap_users']; ?></td></tr>
										<tr><td class="isiankanan" width="125px">Email *</td><td class="isian"><?php echo $r['email_users']; ?></td></tr>
										<tr><td class="isiankanan" width="125px">Username *</td><td class="isian"><?php echo $r['namausers']; ?></td></tr>
										<tr><td class="isiankanan" width="125px">Password *</td><td class="isian">****************</td></tr>
										<tr><td class="isiankanan" width="125px">Ulang Password *</td><td class="isian">****************</td></tr>
						<tr><td class="isiankanan" width="125px"></td><td class="isian">
						
						<input type="submit" value="&laquo; KEMBALI " class="batal">
						</td></tr>					
					<?php 		
					}elseif($totaladmin0>0){
						$_SESSION['postemail'] =$r['email_users'];
						$_SESSION['namaskl'] =$r['nama_lengkap_users'];
			
							
			
						?>
						<center><h1>DATABASE ANDA TELAH TERISI, DAN ANDA HARUS MELAKUKAN UPGRADE</h1>
						</center>
							
								<form method="POST" action="index.php" name="pertama" id="pertama" style="float: left;">
								<table class="isian" style="margin-top: 10px;">
										<tr><td class="isiankanan" width="125px">Nama Lengkap *</td><td class="isian"><?php echo $r['nama_lengkap_users']; ?></td></tr>
										<tr><td class="isiankanan" width="125px">Email *</td><td class="isian"><?php echo $r['email_users']; ?></td></tr>
										<tr><td class="isiankanan" width="125px">Username *</td><td class="isian"><?php echo $r['namausers']; ?></td></tr>
										<tr><td class="isiankanan" width="125px">Password *</td><td class="isian">****************</td></tr>
										<tr><td class="isiankanan" width="125px">Ulang Password *</td><td class="isian">****************</td></tr>
						<tr><td class="isiankanan" width="125px"></td><td class="isian">
						
						<input type="submit" value="&laquo; KEMBALI " class="batal">
						</td></tr>					
					<?php 						
					}else{
				?>
				<form method="POST" action="proses_admin.php" name="pertama" id="pertama" style="float: left;">
				<table class="isian" style="margin-top: 10px;">	

						<tr><td class="isiankanan" width="125px">Nama Lengkap *</td><td class="isian" width="425px"><input type="text" name="nama" class="maksimal" ></td></tr>
						<tr><td class="isiankanan" width="125px">Email *</td><td class="isian"><input type="text" name="email" class="maksimal" ></td></tr>
						<tr><td class="isiankanan" width="125px" valign="top">Username *</td><td class="isian"><input type="text" name="username" class="maksimal" ><br>
						<font color="red">Username untuk keamanan hindari penggunaan kata yang mengandung <b>Admin, Administrator, Root,</b> dll yang biasa digunakan sebagai superuser .!<br>Gunakan kombinasi huruf besar, huruf kecil dan angka. Contoh username yang baik <b>f4UZan15.</b></font></td></tr>
						<tr><td class="isiankanan" width="125px" valign="top">Password *</td><td class="isian"><input type="password" name="password" class="maksimal"><br>
						<font color="red">Password untuk keamanan tidak boleh sama dengan username<br>Gunakan kombinasi huruf besar, huruf kecil dan angka. Contoh password yang baik <b>Re5tu1Bu.</b></font></td></tr>
						<tr><td class="isiankanan" width="125px">Ulang Password *</td><td class="isian"><input type="password" name="password2" class="maksimal" ></td></tr>
			<tr><td class="isiankanan" width="125px"></td><td class="isian">
			<input type="reset" value="Reset" class="hapus">
			<input type="submit" value="Lanjutkan &raquo;" class="batal">
			</td></tr>
						<?php 					
					
					}
				}else{	
				?>
				<form method="POST" action="proses_admin.php" name="pertama" id="pertama" style="float: left;">
				<table class="isian" style="margin-top: 10px;">	

						<tr><td class="isiankanan" width="125px">Nama Lengkap *</td><td class="isian" width="425px"><input type="text" name="nama" class="maksimal" ></td></tr>
						<tr><td class="isiankanan" width="125px">Email *</td><td class="isian"><input type="text" name="email" class="maksimal" ></td></tr>
						<tr><td class="isiankanan" width="125px">Username *</td><td class="isian"><input type="text" name="username" class="maksimal" ><br><font color="red">Username untuk keamanan hindari penggunaan kata yang mengandung <b>Admin, Administrator, Root,</b> dll yang biasa digunakan sebagai superuser .!<br>Gunakan kombinasi huruf besar, huruf kecil dan angka. Contoh username yang baik <b>f4UZan15.</b></font></td></tr>
						<tr><td class="isiankanan" width="125px">Password *</td><td class="isian"><input type="password" name="password" class="maksimal"><br><font color="red">Password untuk keamanan tidak boleh sama dengan username<br>Gunakan kombinasi huruf besar, huruf kecil dan angka. Contoh password yang baik <b>Re5tu1Bu.</b></font></td></tr>
						<tr><td class="isiankanan" width="125px">Ulang Password *</td><td class="isian"><input type="password" name="password2" class="maksimal" ></td></tr>
			<tr><td class="isiankanan" width="125px"></td><td class="isian">
			<input type="reset" value="Reset" class="hapus">
			<input type="submit" value="Lanjutkan &raquo;" class="batal">
			</td></tr>
					<?php 
				}	
}	
?>
			

	</table>
	</form>
	<div class="clear"></div>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("pertama");
			frmvalidator.addValidation("nama","req","Nama admin harus diisi");
			frmvalidator.addValidation("nama","maxlen=30","Nama admin maksimal 30 karakter");
			frmvalidator.addValidation("nama","minlen=5","Nama admin minimal 5 karakter");
			
			frmvalidator.addValidation("username","req","Username harus diisi");
			frmvalidator.addValidation("username","maxlen=15","Username maksimal 18 karakter");
			frmvalidator.addValidation("username","minlen=8","Username minimal 8 karakter");
			frmvalidator.addValidation("username","paswd","Username minimal memiliki 1 huruf besar dan 1 angka contoh : usernamE1");
				  
			frmvalidator.addValidation("password","req","Password harus diisi");
			frmvalidator.addValidation("password","maxlen=20","Password terlalu panjang, maksimal 20 karakter");
			frmvalidator.addValidation("password","minlen=6","PAssword terlalu pendek, minimal 6 karakter");
			
			
			frmvalidator.addValidation("password2","eqelmnt=password","Password tidak sama");
			frmvalidator.addValidation("password","neelmnt=username","Password tidak boleh sama dengan username");
			
			
			frmvalidator.addValidation("email","email","Format email salah");
			frmvalidator.addValidation("email","req","Email harus diisi");
		</script>
</div>
<br>
<?php     } 
include ('../adminpanel/konten/footer.php');
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>