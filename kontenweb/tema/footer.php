<div id="footer">
<?php    
include "file/tema/$_SESSION[temaweb]/footer.php";
?>

<hr>
<?php    
date_default_timezone_set('Asia/Jakarta');
$tahun=date("Y");

?>
<div class="f_kiri">&copy; <?php     echo $tahun?> <?php     echo $ns['isi_pengaturan']?>. 
<?php    footer();?>
<style>
.ui-datepicker {
width: 17em;
padding: .2em .2em 0;
visibility: hidden;
}
</style>
<!--SideBar Kanan--> <style type="text/css">
div#creditfooter {display:none;}#pagesKanan {position:fixed; bottom:0; right:5px; float:left;  }
.fb_share_count_top {width:48px !important;}
</style>
<?php 
if (isset($_SESSION['siswa']) OR isset($_SESSION['guru'])){	
?>

<div title="Ajak teman anda untuk ngobrol" id="pagesKanan">
<div>
<div>
<div style="border: 0px inset ; margin: 0px; padding: 0px;">
<div id="div_name2" style="display: none;width:425px; height:210px;background-color:#FFF1C6;border: 2px solid white; border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;padding:2px 0;z-index:10;"> <img src="images/tutup.png" id="button2" onclick="document.getElementById('button').style.display=''; document.getElementById('judul').style.display='none'; document.getElementById('button').style.display=''; document.getElementById('div_name2').style.display='none'; this.style.display = 'none';return false; " style="display: none;margin-top: 0px; width: 15px; font-size: 8px;position:fixed;bottom:190px;right:25px"  />

<iframe src="<?php echo $_SESSION['urlweb'];?>kontenweb/chat/index.php" style="border:0px #FFFFFF none;" name="myiFrame" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px" height="210px" width="478px"></iframe>
</div>
</div>
</div>
</div>
<div style="margin-top: 0px; text-align: center;">       <div id="judul" style="display: none;position:fixed;bottom:193px;right:335px;"><b>Formulasi Chat</b></div>

<img src="images/ngobrol.png" id="button"  onclick="document.getElementById('button2').style.display=''; document.getElementById('judul').style.display='';document.getElementById('button2').style.display=''; document.getElementById('div_name2').style.display=''; this.style.display = 'none';return false; " style="margin-top: 0px; width: 60px; font-size: 8px;"  />
</div>
</div>
<!--SideBar Kanan-->
<?php  
}  else {
?>
<div id="pagesKanan" title="Chatting yuk...!"><a href="login.html"><img src="images/ngobrol.png" id="button"  onclick="document.getElementById('button2').style.display=''; document.getElementById('judul').style.display='';document.getElementById('button2').style.display=''; document.getElementById('div_name2').style.display=''; this.style.display = 'none';return false; " style="margin-top: 0px; width: 60px; font-size: 8px;"  /></a>
</div>
<?php 
}
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>


		
		




