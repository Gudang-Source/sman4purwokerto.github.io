<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */



function ceker($data) {
$data=strtolower($data);$sql = array();$sql[0] = '/from/';$sql[1] = '/select/';$sql[2] = '/union/';$sql[3] = '/order/';$sql[4] = '/insert/';$sql[5] = '/delete/';$sql[6] = '/drop/';$sql[7] = '/tables/';$sql[8] = '/show/';$sql[9] = '/table/';$sql[9] = '/where/';
$data= preg_replace($sql, '', $data);
$data = str_replace("table","",$data);	
$data = preg_replace('#\W#', ' ', $data);
$data = str_replace("amp","",$data);
$data = trim($data);
$data = strip_tags($data);
$data = addslashes($data); 
	$data = trim(htmlentities(strip_tags($data)));	
	if (get_magic_quotes_gpc())
		$data = stripslashes($data);	
	$data = mysql_real_escape_string($data);
	

return $data;

}





function namanya($data) {
$data=strtolower($data);$sql = array();$sql[0] = '/from/';$sql[1] = '/select/';$sql[2] = '/union/';$sql[3] = '/order/';$sql[4] = '/insert/';$sql[5] = '/delete/';$sql[6] = '/drop/';$sql[7] = '/tables/';$sql[8] = '/show/';$sql[9] = '/table/';$sql[9] = '/where/';
$data= preg_replace($sql, '', $data);
$data = str_replace("@","555mail555",$data);
$data = str_replace(".","555titik555",$data);
$data = str_replace("-","555strip555",$data);
$data = str_replace("_","555underscore555",$data);
$data = preg_replace('#\W#', ' ', $data);	
$data = str_replace("table","",$data);
$data = str_replace(" ","",$data);
$data = str_replace("amp","",$data);
$data = trim($data);
$data = strip_tags($data);
$data = addslashes($data); 
	$data = trim(htmlentities(strip_tags($data)));	
	if (get_magic_quotes_gpc())
		$data = stripslashes($data);	
	$data = mysql_real_escape_string($data);
$data = str_replace("555mail555","@",$data);
$data = str_replace("555titik555",".",$data);	
$data = str_replace("555strip555","-",$data);
$data = str_replace("555underscore555","_",$data);	
	return $data;
}

function ganti(){
			?>
				<div id="konten">
				<div id="lebar">
				<h3>Reset Password</h3>
					<table>
					<form method="POST" action="" name="login" id="login">
					<tr class="form"><td><b>Email</b></td><td><input type="text" class="panjang" style="width: 85%" name="email" title="Masukkan email valid anda"></td></tr>
					<tr class="form"><td><b>Kode Reset</b></td><td><input type="text" class="pendek" style="width: 85%" name="reset" title="Masukkan Kode Reset"></td></tr>
				
					<tr class="form"><td><img src="kontenweb/captcha-login.php?date=<?php    echo date('YmdHis');?>" alt="security image" /></td>
					<td style="padding:0px;"><input style="width:50px;margin-right: 5px" title="masukkan kode gambar disamping" type="text" name="kode" class="pendek"><input type="submit" class="tombol"value="Login"></td></tr>
					</form>
					</table>
					<script language="JavaScript" type="text/javascript" xml:space="preserve">
					//<![CDATA[
					var frmvalidator  = new Validator("login");
					frmvalidator.addValidation("email","req","Email harus diisi");			
					frmvalidator.addValidation("email","mail","Masukkan format email dengan benar");
					frmvalidator.addValidation("kode","req","Kode keamanan tidak boleh kosong");
					//]]>
					</script>
				</div>
				</div>
			<?php	
}	

function meta(){}
function konten(){
	global $DB_KODE;
$data=$_GET['k'];
$data=ceker($data);

$kd=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE isi_pengaturan2='$data' ;");
$ketemu=mysql_num_rows($kd);
	if ($ketemu>0){
		
		if(isset($_POST['reset']) and isset($_POST['email'])){
			
			if(md5(md5($_POST['kode'])) == $_SESSION[$DB_KODE.'poiuytrewq']){
				$reset=$_POST['reset'];		
				$email=namanya($_POST['email']);		
				
				$hsl=mysql_fetch_array($kd);
				$kdt=$hsl['isi_pengaturan'];	 
				      if($kdt==$reset){				
						
					       $s_user=$hsl['nama_pengaturan'];  			
					      $login=mysql_query("SELECT * FROM ".$DB_KODE."_users WHERE email_users='$email' and s_username='$s_user'");
					      $ada=mysql_num_rows($login);
					      if($ada>0){
					      $r=mysql_fetch_array($login);
						
						$date=date('Ymd');
						$tanggal=date('d-m-Y H:s');
						$kodeq=$r['id_users']."".$date."".$r['s_username']."".$r['email_users'];
						$kodeq=md5(md5($kodeq));
						$id_usr=$r['id_users'];
						if ($kodeq==$data){
								$hurufk  = "abcdefghijklmnpqrstu";
								$rk = substr(str_shuffle($hurufk), 0, 4);
								$hurufB  = "ABCDEFGHIJKLMNPQRSTUVWXYZ";
								$rb = substr(str_shuffle($hurufB), 0, 4);
								$angka  = "123456789";
								$rkb=$rk.''.$rb;
								$rh= substr(str_shuffle($rkb), 0, 8);
								$ra= substr(str_shuffle($rh), 0, 1);									
								$sandi1=$rh.''.$ra;
								$sandi2=MD5($sandi1);
								$sandi3=base64_decode($sandi2);
								$sandi4=MD5($sandi3);
								$sandi5=base64_decode($sandi4);
								$sandi=MD5($sandi5);
								$eS=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan=10");
								$e=mysql_fetch_array($eS);
								$from = $e['isi_pengaturan'];
								$reply = $from;
								
								$to = $r['email_users'];
								$url=$_SERVER['SERVER_NAME'];
								$tanggal=date('d-m-Y H:s');
								$subject = "Password telah direset ".$url;
								$message = "
								Password Anda telah dirubah pada ".$tanggal."\n\n
								Silahkan login pada link :\n
								http://".$url."/adminpanel    \n
								username : ".$r['namausers']."    \n
								Passoword baru : ".$sandi1."    \n \n
								untuk keamanan ubahlah password anda secara periodik. \n \n \n
								
								Terimakasih, \n
								Salam Edukasi..!  \n \n
								
								webmaster ".$url." \n \n
								
								=================================================================================== \n
								Powered by Formulasi Free Opensource CMS Formulasi \n
								http://cms.formulasi.or.id \n
								";
								
								
								$headers = 'From: '.$from . "\r\n" .
								    'Reply-To: '.$reply . "\r\n" .
								    'X-Mailer: PHP/' . phpversion();
							    
								mail($to,$subject,$message,$headers);
								
								unset($_SESSION['log_adminsh']);
								mysql_query("UPDATE ".$DB_KODE."_users SET 	sandiusers='$sandi'
										WHERE id_users ='$id_usr'");
								
								mysql_query ("DELETE FROM ".$DB_KODE."_pengaturan WHERE nama_pengaturan ='$r[s_username]'");
							?>
							<div id="konten">
							<div id="lebar">
								<h3>Password telah kami kirim ke <b>email</b> anda !,<br>
								silahkan chek email anda, chek juga difolder spam.</h3>
								
							</div>
							</div>
							<?PHP
						}else{ganti();}
						
					      }else{ganti();}
				      }else{ganti();}
			}else{
				ganti();
			}	
		}else{

			ganti();	
		}

	
	}
}


   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

