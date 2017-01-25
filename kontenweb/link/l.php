<?php      
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

if(!isset($_SESSION)){session_start();}  
error_reporting(0); 
 if (!isset($_SESSION['kontenisi'])){
header ('location:../../index.php');
break;
}
include "../../adminpanel/konten/fungsi.php"; if (isset($_GET['id'])){$id=ceknomor($_GET['id']);} if (isset($_POST['id'])){$id=ceknomor($_POST['id']);}

if (isset($_POST['url'])){
		$url= $_POST['url'];
}elseif(isset($_GET['url'])){
		$url= $_GET['url'];
}		
if (isset($_POST['url']) or isset($_GET['url'])){					

		if(substr($url, 0, 7) == "http://") {
		 $sSiteUrl = $url;
		}else{
			if(substr($url, 0, 7) == "https://") {
			 $sSiteUrl = $url;
			}else{
			$sSiteUrl = 'http://'.$url;
			}
		}

		if(substr($sSiteUrl, -1) == "/") {
		 $sSiteUrl = $sSiteUrl;
		}else{
		$sSiteUrl = $sSiteUrl.'/';
		}
		
	

?>
<?php //echo $sSiteUrl;?>

<script language='JavaScript'>
self.location="<?php echo $sSiteUrl;?>";
</script>


<?php
}else{
?>

<script language='JavaScript'>
self.location="http://cms.formulasi.or.id";
</script>


<?php					
					
}
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>