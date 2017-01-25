<?php    if(!isset($_SESSION)){session_start();}   error_reporting(0); 
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
if (!isset($_SESSION['log_adminsh'])){$_SESSION['log_adminsh']=0;}
$jml=$_SESSION['log_adminsh']+1;
unset($_SESSION['log_adminsh']);


include "../konfigurasi/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  $sql = array();$sql[0] = '/from/';$sql[1] = '/select/';$sql[2] = '/union/';$sql[3] = '/order/';$sql[4] = '/insert/';$sql[5] = '/delete/';$sql[6] = '/drop/';$sql[7] = '/tables/';$sql[8] = '/show/';$sql[9] = '/table/';$sql[9] = '/where/';
$filter= preg_replace($sql, '', $filter);
$filter = str_replace("table","",$filter);
  return $filter;
}
$_SESSION['log_adminsh']=$jml;
//echo $jml;
if ($jml<10){

if (isset($_POST['formulasi'])){
if(md5(md5($_POST['formulasi'].'poiuytrewq'.$DB_KODE)) == $_SESSION[$DB_KODE.'poiuytrewq']){

$username = anti_injection($_POST['username']);
$pass1     = anti_injection($_POST['password']);
$pass2 =MD5($pass1);
$pass3 =base64_decode($pass2);
$pass4 =MD5($pass3);
$pass5 =base64_decode($pass4);
$pass =MD5($pass5);   

$login=mysql_query("SELECT * FROM ".$DB_KODE."_users WHERE namausers='$username' AND sandiusers='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);


  if ($ketemu > 0){
    if(!isset($_SESSION)){session_start();}  
    $_SESSION['adminsh']      = $r['s_username'];
    $_SESSION['namalengkap']  = $r['nama_lengkap_users'];
    $_SESSION['leveluser']    = $r['level_users'];
    if($_SERVER['SERVER_NAME']=='localhost'){$url='localhost.com';}else{$url=$_SERVER['SERVER_NAME'];}
  $_SESSION['nickurl']= $url;
  $_SESSION['nickname']= $r['nama_lengkap_users'];
  $_SESSION['nickmail']= 'webmaster@'.$url;
	  $sid_lama = session_id();
	  
	  session_regenerate_id();
  
	  $sid_baru = session_id();
  
    mysql_query("UPDATE ".$DB_KODE."_users SET id_users='$sid_baru' WHERE namausers='$username'");
    date_default_timezone_set('Asia/Jakarta');
    $loginterakhir=date("Y-m-d H:i:s");
	
    mysql_query("UPDATE ".$DB_KODE."_users SET login_terakhir ='$loginterakhir' WHERE namausers='$username'");
		
	
		unset($_SESSION[$KD_token]);	
		
		$ttx = md5(uniqid());
		$KD_token=md5($DB_KODE);
		$_SESSION[$KD_token] = md5("nailah".$DB_KODE."soleh".$ttx);
	//$token = md5($tglx."".$_SESSION[$KD_token]);

    $nt=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='17'");
  $t=mysql_fetch_array($nt);
    $_SESSION['kontenisi']      = $t['isi_pengaturan2'];
    $_SESSION['temasekolah']      = md5($t['isi_pengaturan']);
  $settema=md5($t['isi_pengaturan']);
  $settema2=$_SERVER['HTTP_USER_AGENT'].''.$settema;
  $_SESSION['formula'] =md5($settema2);
     $jt=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='19'");
  $jj=mysql_fetch_array($jt); 
    $_SESSION['jenjang']=$jj['isi_pengaturan']; 	
		    if (!isset($_SESSION['FORMULASI_UP'])) {
		      $_SESSION['FORMULASI_UP'] = array();
		      $_SESSION['FORMULASI_UP']['disabled'] = false;
		  }
  
		  // User has permission, so make sure KCFinder is not disabled!
		  if(!isset($_SESSION['FORMULASI_UP']['disabled'])) {
		      $_SESSION['FORMULASI_UP']['disabled'] = false;
		  }
		
unset($_SESSION['log_adminsh']);  
		//$tglx=date('d y m A');
		$tglx2=$_SESSION['adminsh'];
		$tglx=$_SESSION['formula'];
		$tx=md5($_SESSION[$KD_token]);
		$tx=md5(md5($tglx)."".$tx."".md5($tglx2));
		$TIME_token=md5($KD_token);
		$_SESSION[$TIME_token] = time();
    header('location:index.php?t='.$tx);		  
  }  else{  
    echo "<script>window.alert('Kesalahan kombinasi username dan password, silahkan ulangi lagi.');window.location=('login.php')</script>";
  }
  
}else{
  echo "<script>window.alert('Kesalahan, kode yang anda masukkan belum tepat.');window.location=('login.php')</script>";  
}

}else{
  echo "<script>window.alert('Anda belum memasukkan kode Captcha silahkan ulangi');window.location=('login.php')</script>";  
}

}else{
  echo "<script>window.alert('Terlalu banyak kesalahan yang anda buat !');window.location=('login.php')</script>";
}

?>
<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>


