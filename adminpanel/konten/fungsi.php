<?php 
function gogo($redirect){
?>
<script language="javascript">
setTimeout("top.location.href = '<?php echo $redirect ?>'",500);
</script>
<?php
}
function sensor($kata){
global $DB_KODE;
$filter=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE nama_pengaturan='sensor'");
				$fil=mysql_fetch_array($filter);	
if	 ($fil['isi_pengaturan']==1){
	$q = mysql_query("SELECT kata_filter, ganti_filter FROM ".$DB_KODE."_sensor");
	while ($ss = mysql_fetch_array($q))
		{
		if ($ss['ganti_filter']==""){$gantiku="***";}else{$gantiku=$ss['ganti_filter'];}	$kata = str_ireplace($ss['kata_filter'], $gantiku, $kata); 
		
		}
}elseif($fil['isi_pengaturan']==2){
	$q = mysql_query("SELECT kata_filter, ganti_filter FROM ".$DB_KODE."_sensor");
	while ($ss = mysql_fetch_array($q))
		{
		$kata = str_ireplace($ss['kata_filter'], $fil['isi_pengaturan2'], $kata); 
		}
}

return $kata;
} 

function nt($token){

global $DB_KODE;
$KD_token=md5($DB_KODE);
$TIME_token=md5($KD_token);


  if(!isset($_SESSION)){session_start();}  

// set time-out period (in seconds)
$inactive = 60*60; // 60 menit =1jam
 
// check to see if $_SESSION["timeout"] is set
if (isset($_SESSION[$TIME_token])) {
    // calculate the session's "time to live"
    $sessionTTL = time() - $_SESSION[$TIME_token];
    if ($sessionTTL > $inactive) {
				unset($_SESSION[$KD_token]);
				unset($_SESSION[$TIME_token]);
				unset($_SESSION['adminsh']);
				unset($_SESSION['nickname']);
				unset($_SESSION['nickmail']);
				unset($_SESSION['nickurl']);
				unset($_SESSION['namalengkap']);
				unset($_SESSION['leveluser']);
				unset($_SESSION['FORMULASI_UP']);	
		  ?>
		  ?>
		  <script>window.alert('Sesi login anda berahir, silahkan login kembali');window.location=('<?php echo $_SESSION['urlweb']; ?>/adminpanel/login.php')</script>
		  <?php    
			exit;
    }else{
		$KD_token=md5($DB_KODE);
		$token=md5($_SESSION[$KD_token]);
				//$tglx=date('d y m A');
				$tglx2=$_SESSION['adminsh'];
				$tglx=$_SESSION['formula'];
				$token=md5(md5($tglx)."".$token."".md5($tglx2));	
		return $token;		
	
	}
} else{
				unset($_SESSION[$KD_token]);
				unset($_SESSION[$TIME_token]);
				unset($_SESSION['adminsh']);
				unset($_SESSION['nickname']);
				unset($_SESSION['nickmail']);
				unset($_SESSION['nickurl']);
				unset($_SESSION['namalengkap']);
				unset($_SESSION['leveluser']);
				unset($_SESSION['FORMULASI_UP']);	
		  ?>
		  ?>
		  <script>window.alert('Sesi login anda berahir, silahkan login kembali');window.location=('<?php echo $_SESSION['urlweb']; ?>/adminpanel/login.php')</script>
		  <?php    
			exit;

}
 
$_SESSION[$TIME_token] = time();
	
}


function nailah($t){
global $DB_KODE;
$KD_token=md5($DB_KODE);
$TIME_token=md5($KD_token);
$dom="http://".$_SERVER['HTTP_HOST'];

  if(!isset($_SESSION)){session_start();}  

	if ($_SESSION[$KD_token]<>"") {
		$token = md5($_SESSION[$KD_token]);
		//$tglx=date('d y m A');
		$tglx2=$_SESSION['adminsh'];
		$tglx=$_SESSION['formula'];
		$token=md5(md5($tglx)."".$token."".md5($tglx2));		
		
		unset($_SESSION[$KD_token]);
			if ($token==$t) {
			$ttx = md5(uniqid());
				 $_SESSION[$KD_token] = md5("nailah".$DB_KODE."soleh".$ttx);
			  
			}else{
				unset($_SESSION['adminsh']);
				unset($_SESSION['nickname']);
				unset($_SESSION['nickmail']);
				unset($_SESSION['nickurl']);
				unset($_SESSION['namalengkap']);
				unset($_SESSION['leveluser']);
				
				unset($_SESSION[$TIME_token]);
				unset($_SESSION[$KD_token]);
				unset($_SESSION['FORMULASI_UP']);	
		  ?>
		  ?>
		  <script>window.alert('Sesi login anda berahir, silahkan login kembali');window.location=('<?php echo $_SESSION['urlweb']; ?>/adminpanel/login.php')</script>
		  <?php
			exit;
			}	  
	}else{

				unset($_SESSION[$TIME_token]);
				unset($_SESSION[$KD_token]);
				unset($_SESSION['adminsh']);
				unset($_SESSION['nickname']);
				unset($_SESSION['nickmail']);
				unset($_SESSION['nickurl']);
				unset($_SESSION['namalengkap']);
				unset($_SESSION['leveluser']);
				unset($_SESSION['FORMULASI_UP']);	
		  ?>
		  ?>
		  <script>window.alert('Sesi login anda berahir, silahkan login kembali');window.location=('<?php echo $_SESSION['urlweb']; ?>/adminpanel/login.php')</script>
		  <?php    
			exit;		
			
	}
	$t=$_SESSION[$KD_token];	
return $t;
} 

function ceking($data) {
$data=strtolower($data);$sql = array();$sql[0] = '/from/';$sql[1] = '/select/';$sql[2] = '/union/';$sql[3] = '/order/';$sql[4] = '/insert/';$sql[5] = '/delete/';$sql[6] = '/drop/';$sql[7] = '/tables/';$sql[8] = '/show/';$sql[9] = '/table/';$sql[9] = '/where/';
$data= preg_replace($sql, '', $data);
$data = str_replace("_","z98xx89z",$data);
$data = str_replace("table","",$data);
$data = preg_replace('#\W#', ' ', $data);	
$data = str_replace("z98xx89z","_",$data);
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

function ceknomor($string){
$string = preg_replace('/[^0-9]/', '', $string);
return $string;
}

function komen($data) {
$data=preg_replace("/\s/","9a9z9",$data);
$data=strtolower($data);$sql = array();$sql[0] = '/from/';$sql[1] = '/select/';$sql[2] = '/union/';$sql[3] = '/order/';$sql[4] = '/insert/';$sql[5] = '/delete/';$sql[6] = '/drop/';$sql[7] = '/tables/';$sql[8] = '/show/';$sql[9] = '/table/';$sql[9] = '/where/';
$data= preg_replace($sql, '', $data);
$data = str_replace("@","555mail555",$data);
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
$data = str_replace("9a9z9"," ",$data);
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


function formulaku($link) {
	 if (!isset($_SESSION['formula'])){
		?>
		<script language="JavaScript">
		self.location="<?php echo $link;?>";
		</script>
		<?php 
			break;
	}else{
	
		$settema2=$_SERVER['HTTP_USER_AGENT'].''.$_SESSION['temasekolah'];
		$temaini =md5($settema2);
		
		if ($_SESSION['formula']==$temaini){
		
		}else{
		?>
		<script language="JavaScript">
		self.location="<?php echo $link;?>";
		</script>
		<?php 		
		break;
		}
		
	} 
}

function siswaku() {
global $DB_KODE;
$login=mysql_query("SELECT * FROM ".$DB_KODE."_siswa WHERE nis='$_SESSION[siswa]' AND nama_siswa='$_SESSION[nickname]'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

	if ($ketemu == 0){
	
		 if (!isset($_SESSION['urlweb'])){
		 
			?>
			<script language="JavaScript">
			self.location="http://cms.formulasi.or.id";
			</script>
			<?php 
				break;
		}else{
			$link=$_SESSION['urlweb'];
			?>
			<script language="JavaScript">
			self.location="<?php echo $link;?>";
			</script>
			<?php 		
				break;		
		} 
	}
}


function guruku() {
global $DB_KODE;
$login=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE nip='$_SESSION[guru]' AND nama_gurustaff='$_SESSION[nickname]'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

	if ($ketemu == 0){
	
		 if (!isset($_SESSION['urlweb'])){
		 
			?>
			<script language="JavaScript">
			self.location="http://cms.formulasi.or.id";
			</script>
			<?php 
				break;
		}else{
			$link=$_SESSION['urlweb'];
			/*?>
			<script language="JavaScript">
			self.location="<?php echo $link;?>";
			</script>
			<?php 		*/
				break;		
		} 
	}
}

function adminku() {
global $DB_KODE;
//if (isset($level)){
//$login=mysql_query("SELECT * FROM ".$DB_KODE."_users WHERE namausers='$_SESSION[adminsh]' AND nama_lengkap_users='$_SESSION[namalengkap]' AND level_users='$level'");
//}else{
$login=mysql_query("SELECT * FROM ".$DB_KODE."_users WHERE s_username='$_SESSION[adminsh]' AND nama_lengkap_users='$_SESSION[namalengkap]' ");
//}
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);


	if ($ketemu ==0){
	
		 if (!isset($_SESSION['urlweb'])){
		 
			?>
			<script language="JavaScript">
			self.location="http://cms.formulasi.or.id";
			</script>
			<?php 
				break;
		}else{
			$link=$_SESSION['urlweb'];
			?>
			<script language="JavaScript">
			self.location="<?php echo $link;?>";
			</script>
			<?php 				
	
				break;	
		
		} 
	}
}

function adminback($adminx,$namax) {


	if ($_SESSION['adminsh'] ==$adminx and $_SESSION['namalengkap']==$namax){
	
		 if (!isset($_SESSION['urlweb'])){
		 
			?>
			<script language="JavaScript">
			self.location="http://cms.formulasi.or.id";
			</script>
			<?php 
				break;
		}else{
			$link=$_SESSION['urlweb'];
			?>
			<script language="JavaScript">
			self.location="<?php echo $link;?>";
			</script>
			<?php 				
	
				break;	
		
		} 
	}
}

function formulamu($kode) {
global $DB_KODE;
	 if (!isset($_SESSION['lkjhgfdsa'.$DB_KODE])){
		?>
		<script language="JavaScript">
		self.location="http://cms.formulasi.or.id";
		</script>
		<?php 
			break;
	}else{

		if ($_SESSION['lkjhgfdsa'.$DB_KODE]==$kode){
		
		}else{
		?>
		<script language="JavaScript">
		self.location="http://cms.formulasi.or.id";
		</script>
		<?php 		
		break;
		}
		
	} 
}

function cekurl($data) {
$data=strtolower($data);$sql = array();$sql[0] = '/from/';$sql[1] = '/select/';$sql[2] = '/union/';$sql[3] = '/order/';$sql[4] = '/insert/';$sql[5] = '/delete/';$sql[6] = '/drop/';$sql[7] = '/tables/';$sql[8] = '/show/';$sql[9] = '/table/';$sql[9] = '/where/';
$data= preg_replace($sql, '', $data);
$data = str_replace("/","555mail555",$data);
$data = str_replace(".","555titik555",$data);
$data = str_replace("-","555strip555",$data);
$data = str_replace("_","555underscore555",$data);
$data = str_replace(":","555ttdua555",$data);
$data = preg_replace('#\W#', ' ', $data);	
$data = str_replace("table","",$data);
$data = str_replace("amp","",$data);
$data = trim($data);
$data = strip_tags($data);
$data = addslashes($data); 
	$data = trim(htmlentities(strip_tags($data)));	
	if (get_magic_quotes_gpc())
		$data = stripslashes($data);	
	$data = mysql_real_escape_string($data);
$data = str_replace("555mail555","/",$data);
$data = str_replace("555titik555",".",$data);	
$data = str_replace("555strip555","-",$data);
$data = str_replace("555underscore555","_",$data);
$data = str_replace("555ttdua555",":",$data);
$url=$data;
		if(substr($data, 0, 7) == "http://") {
		 $sSiteUrl = $url;
		}else{
			if(substr($url, 0, 7) == "https://") {
			 $sSiteUrl = $url;
			}else{
			$sSiteUrl = 'http://'.$url;
			}
		}


		$data=$sSiteUrl ;


	return $data;
}
?>