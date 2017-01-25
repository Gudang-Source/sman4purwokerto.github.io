<?php 
	 
  session_start();

include "../../konfigurasi/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

 $koder=md5(md5($_POST['kode'].'poiuytrewq'.$DB_KODE));
    if($koder == $_SESSION[$DB_KODE.'poiuytrewq']){
$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));
//$status	  = $_POST['status'];
/*
if ($status=='guru'){
$login=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE nip='$username' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
}
elseif ($status=='siswa'){
$login=mysql_query("SELECT * FROM ".$DB_KODE."_siswa WHERE nis='$username' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
}

else {
header ('location: ../../elearning.html');
}
*/
$login=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE nip='$username' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

	if ($ketemu > 0){

		$_SESSION['guru']      			= $r['nip'];
		$_SESSION['nickname']= $r['nama_gurustaff'];
		$_SESSION['namaguru']	  		= $r['nama_gurustaff'];
		$_SESSION['nickmail']= $r['email'];

		setcookie("userformulasi", "$r[nama_gurustaff]", time()+86400);
		setcookie("usermail", "$r[email]", time()+86400);
				$namasekolah1=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='8'");
				$ns1=mysql_fetch_array($namasekolah1);
							
				$guru=$r['nama_gurustaff'].'9a9z9'.$ns1['isi_pengaturan'];							
				$guru = strtolower(preg_replace("/\s/","9a9z9",$guru));
				$guru = preg_replace('#\W#', '', $guru);								
				$guru = str_replace("9a9z9","-",$guru);
				$url_guru =$_SESSION['urlweb']."profil-guru-".$r['nip']."-".$guru.".html";		
		setcookie("userurl", "$url_guru", time()+86400);
		$_SESSION['nickurl']= $url_guru;
		
	  	  header('location:../../elearning.html');



	}else {
		$login2=mysql_query("SELECT * FROM ".$DB_KODE."_siswa WHERE nis='$username' AND password='$pass'");
		$ketemu2=mysql_num_rows($login2);
		$r2=mysql_fetch_array($login2);
			if ($ketemu2 > 0){
		setcookie("userformulasi", "$r2[nama_siswa]", time()+86400);
		setcookie("usermail", "$r2[email]", time()+86400);
				$namasekolah1=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='8'");
				$ns1=mysql_fetch_array($namasekolah1);
							
				$guru=$r2['nama_siswa'].'9a9z9'.$ns1['isi_pengaturan'];							
				$guru = strtolower(preg_replace("/\s/","9a9z9",$guru));
				$guru = preg_replace('#\W#', '', $guru);								
				$guru = str_replace("9a9z9","-",$guru);
				$url_guru = $_SESSION['urlweb']."profil-siswa-".$r2['nis']."-".$guru.".html";		
		setcookie("userurl", "$url_guru", time()+86400);		
			$_SESSION['nickurl']= $url_guru;
			  $_SESSION['siswa']      		= $r2['nis'];
			  $_SESSION['namasiswa']	  		= $r2['nama_siswa'];
			  $_SESSION['nickname']= $r2['nama_siswa'];
			  $_SESSION['nickmail']= $r2['email'];

		  
			  header('location:../../elearning.html');	
			  }	 else {
	echo "<script>window.alert('Kesalahan kombinasi username dan password, silahkan ulangi lagi.');window.location=('../../login.html')</script>";	  
  
				}
	  } 

    }else{
 	echo "<script>window.alert('Kesalahan memasukan kode keamanan, silahkan ulangi lagi.');window.location=('../../login.html')</script>";	  
     
    } 
?>
