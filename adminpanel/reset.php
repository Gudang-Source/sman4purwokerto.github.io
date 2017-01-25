<?php    if(!isset($_SESSION)){session_start();}   error_reporting(0); 
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */



include "../konfigurasi/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  $sql = array();$sql[0] = '/from/';$sql[1] = '/select/';$sql[2] = '/union/';$sql[3] = '/order/';$sql[4] = '/insert/';$sql[5] = '/delete/';$sql[6] = '/drop/';$sql[7] = '/tables/';$sql[8] = '/show/';$sql[9] = '/table/';$sql[9] = '/where/';
$filter= preg_replace($sql, '', $filter);
$filter = str_replace("table","",$filter);
$filter = str_replace(",","",$filter);
  return $filter;
}


if (isset($_POST['formulasi'])){
if(md5(md5($_POST['formulasi'].'poiuytrewq'.$DB_KODE)) == $_SESSION[$DB_KODE.'poiuytrewq']){
  $email = anti_injection($_POST['email']);
  
  $login=mysql_query("SELECT * FROM ".$DB_KODE."_users WHERE email_users='$email'");
  $ketemu=mysql_num_rows($login);
  $r=mysql_fetch_array($login);


  if ($ketemu > 0){
    $eS=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan=10");
				$e=mysql_fetch_array($eS);
      $from = $e['isi_pengaturan'];
      $reply = $from;
      
      $to = $email;
      $url=$_SERVER['SERVER_NAME'];
      $date=date('Ymd');
      $tanggal=date('d-m-Y H:s');
      $kodeq=$r['id_users']."".$date."".$r['s_username']."".$to;
      $kodeq=md5(md5($kodeq));
      $alphaNumeric  = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
      $random = substr(str_shuffle($alphaNumeric), 0, 5);
      $subject = "Reset Password ".$url;
      $message = "
      Ada permintaan reset password admin Anda pada ".$tanggal.", abaikan email ini bila anda merasa tidak meminta untuk reset password.\n\n
      Bila Anda benar-benar akan melakukan reset password silahkan gunakan link berikut :\n
      http://".$url."/index.php?p=r&k=".$kodeq."    \n
      Kode Reset : ".$random."    \n
      Email : ".$to."    \n \n
      Reset login Admin ini hanya berlaku untuk 1 hari \n \n \n
      
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

     $kd=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE nama_pengaturan=$r[s_username]");
		
  $ketemu=mysql_num_rows($kd);

if ($ketemu > 0){
mysql_query ("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan =$random, isi_pengaturan2 =$kodeq WHERE nama_pengaturan=$r[s_username]");
       
}else{
  mysql_query ("INSERT INTO ".$DB_KODE."_pengaturan (id_pengaturan, nama_pengaturan, isi_pengaturan, isi_pengaturan2) VALUES ('', '$r[s_username]', '$random', '$kodeq');");
  
}
    echo "<script>window.alert('Kode reset telah dikirim ke email Anda.');window.location=('../index.php')</script>";
  
  }  else{  
    echo "<script>window.alert('Kesalahan kombinasi username dan password, silahkan ulangi lagi.');window.location=('login.php')</script>";
  } // ketemu
  
}else{
  echo "<script>window.alert('Kesalahan, kode yang anda masukkan belum tepat.');window.location=('login.php')</script>";  
}/// kode keamanan

}else{
  echo "<script>window.alert('Anda belum memasukkan kode Captcha silahkan ulangi');window.location=('login.php')</script>";  
} // kode kosong


?>
<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>


