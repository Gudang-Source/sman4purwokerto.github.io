<?php     
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 
if(!isset($_SESSION)){session_start();}   error_reporting(0); 
 if (!isset($_SESSION['kontenisi'])){
header ('location:../../index.php');
break;
}

if (isset($_SESSION['siswa']) OR isset($_SESSION['guru'])){
if(isset($_POST['submit'])){

function ceking($data) {
$data=strtolower($data);$sql = array();$sql[0] = '/from/';$sql[1] = '/select/';$sql[2] = '/union/';$sql[3] = '/order/';$sql[4] = '/insert/';$sql[5] = '/delete/';$sql[6] = '/drop/';$sql[7] = '/tables/';$sql[8] = '/show/';$sql[9] = '/table/';$sql[9] = '/where/';
$data= preg_replace($sql, '', $data);
$data = str_replace("table","",$data);	
$data = str_replace("_","",$data);
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

include "../../konfigurasi/koneksi.php";
	
	
	 if (isset($_SESSION['pbmku']) and isset($_POST['pesan']) ){
			$pesan=$_POST['pesan'];
			$pesan=ceking($pesan);
			$pesan=sensor($pesan);
	$pbm=ceknomor($_SESSION['pbmku']);
	$pengirim=ceknomor($pengirim);		
			$pengirim=ceking($_POST['pengirim']);
			$pengirim=sensor($pengirim);		
			 if ($pesan<>'' or  $pengirim<>''){			
			mysql_query("INSERT INTO ".$DB_KODE."_chat (pesan, pengirim,id_pbm)VALUES('$pesan', '$pengirim', $pbm)");
			}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Formulasi Chat</title>
<script language="javascript" src="jquery-1.2.6.min.js"></script>
<script language="javascript" src="jquery.timers-1.0.0.js"></script>
<script type="text/javascript">

$(document).ready(function(){
   var j = jQuery.noConflict();
	j(document).ready(function()
	{
		j(".refresh").everyTime(1000,function(i){
			j.ajax({
			  url: "refresh_chat.php",
			  cache: false,
			  success: function(html){
				j(".refresh").html(html);
			  }
			})
		})
		
	});
	j(document).ready(function() {
			
		});
   j('.refresh').css({color:"green"});
});
</script>
<style type="text/css">
.refresh {
    border: 1px solid #3366FF;
	border-left: 4px solid #3366FF;
    color: green;
    font-family: tahoma;
    font-size: 12px;
    height: 250px;
    overflow: auto;
    width: 600px;
	padding:10px;
	background-color:#FFFFFF;
}
#post_button{
	border: 1px solid #3366FF;
	background-color:#3366FF;
	width: 100px;
	color:#FFFFFF;
	font-weight: bold;
	margin-left: -105px; padding-top: 4px; padding-bottom: 4px;
	cursor:pointer;
}
#pesan{
	border: 1px solid #3366FF;
	border-left: 4px solid #3366FF;
	width: 620px;
	margin-top: 5px; padding-top: 5px; padding-bottom: 5px; padding-left: 5px; width: 615px;
}
#texta{
	border: 1px solid #3366FF;
	border-left: 4px solid #3366FF;
	width: 610px;
	margin-bottom: 10px;
	padding:5px;
}
p{
border-top: 1px solid #EEEEEE;
margin-top: 0px; margin-bottom: 5px; padding-top: 5px;
}
span{
	font-weight: bold;
	color: #3B5998;
}
</style>
</head>
<body>
<script language="Javascript">
var isMozilla = (navigator.userAgent.toLowerCase().indexOf('gecko')!=-1) ? true : false;
var regexp = new RegExp("[\n]","gi");
 
function storeCaret(selec,type)
{
    if (isMozilla)
        { // Firefox
        oField = document.forms['chat'].elements['pesan'];
        objectValue = oField.value;
 
        objectValueStart = objectValue.substring( 0 , oField.selectionStart );
        objectValueEnd = objectValue.substring( oField.selectionEnd , oField.textLength );
        objectSelected = objectValue.substring( oField.selectionStart ,oField.selectionEnd );
 
        if (type) // smiley
            {
            oField.value = objectValueStart + " " + selec + objectSelected + objectValueEnd;
            }
        else
            {
            oField.value = objectValueStart + "[" + selec + "]" + objectSelected + "[/" + selec + "]" + objectValueEnd;
            }
        oField.focus();
        if (type) // smiley
            {
            oField.setSelectionRange(objectValueStart.length + selec.length + 2,objectValueStart.length + selec.length + 1);
            }
        else
            {
            oField.setSelectionRange(objectValueStart.length + selec.length + 2,objectValueStart.length + selec.length + 2);
            }       
        }
    else
        { // IE
        oField = document.forms['chat'].elements['pesan'];
        var str = document.selection.createRange().text;
        if (str.length>0)
            {// if we have selected some text,,   
            var sel = document.selection.createRange();
            if (type) // smiley
                {
                sel.text = " " + selec;
                }
            else
                {
                sel.text = "[" + selec + "]" + str + "[/" + selec + "]";
                }
            sel.collapse();
            sel.select();
            }
        else
            {
            oField.focus(oField.caretPos);
            oField.focus(oField.value.length);
            oField.caretPos = document.selection.createRange().duplicate();
             
            var bidon = "%~%"; // needed to catch the cursor position with IE
            var orig = oField.value;
            oField.caretPos.text = bidon;
            var i = oField.value.search(bidon);
 
            if (type) // smiley
                {
                oField.value = orig.substr(0,i) + " " + selec +  orig.substr(i, oField.value.length);
                }
            else
                {
                oField.value = orig.substr(0,i) + "[" + selec + "][/" + selec + "]" + orig.substr(i, oField.value.length);
                }
 
            var r = 0;
            for(n = 0; n < i; n++)
                {
                if(regexp.test(oField.value.substr(n,2)) == true)
                    {r++;}
                };
            if (type) // smiley
                {
                pos = i + 1 + selec.length - r;
                }
            else
                {
                pos = i + 2 + selec.length - r;
                }
 
            // re-format the textarea & move the cursor to the correct position
            var r = oField.createTextRange();
            r.moveStart('character', pos);
            r.collapse();
            r.select();
            }
        }
}
 
</script>
<?php 

if (isset($_SESSION['guru'])){
$nickname=$_SESSION['namaguru'];
} elseif (isset($_SESSION['siswa'])){
$nickname=$_SESSION['namasiswa'];
} else {$nickname='Formulasi';}
?>
<form method="POST" name="chat" action="">
<input name="pengirim" type="hidden" id="texta" value="<?php echo $nickname;?>"/>
<div class="refresh">
<?php 

include "../../konfigurasi/koneksi.php";
 if (isset($_SESSION['pbmku'])){
//$pbm=$_SESSION['pbmku'];
$pbm=ceknomor($_SESSION['pbmku']);
}
$result = mysql_query("SELECT * FROM ".$DB_KODE."_chat where id_pbm='$pbm' ORDER BY id DESC");


while($row = mysql_fetch_array($result))
  {
  echo '<p>'.'<span>'.$row['pengirim'].'</span>'. '&nbsp;&nbsp;' . $row['pesan'].'</p>';
  }


?>

</div>
    <div class="buttons">
  <img src="img/senang.gif" onclick="storeCaret('::senang::','smiley')"/>
  <img src="img/tolong.gif" onclick="storeCaret('::tolong::','smiley')"/>
  <img src="img/tidur.gif" onclick="storeCaret('::tidur::','smiley')"/>
  <img src="img/marah.gif" onclick="storeCaret('::marah::','smiley')"/>
  <img src="img/love.gif" onclick="storeCaret('::love::','smiley')"/>
  <img src="img/tidak.gif" onclick="storeCaret('::tidak::','smiley')"/>
    <img src="img/pisang.gif" onclick="storeCaret('::pisang::','smiley')"/>
    <img src="img/dada.gif" onclick="storeCaret('::dada::','smiley')"/>
    <img width="40" src="img/nangis.gif" onclick="storeCaret('::nangis::','smiley')"/>
    <img src="img/nari.gif" onclick="storeCaret('::nari::','smiley')"/>	
    <img src="img/halo.gif" onclick="storeCaret('::halo::','smiley')"/>
    <img  src="img/metal.gif" onclick="storeCaret('::metal::','smiley')"/>	
    <img src="img/perhatian.gif" onclick="storeCaret('::perhatian::','smiley')"/>	
    <img src="img/ok.gif" onclick="storeCaret('::ok::','smiley')"/>	
    <img src="img/mringis.gif" onclick="storeCaret('::mringis::','smiley')"/>	
    <img src="img/wow.gif" onclick="storeCaret('::wow::','smiley')"/>	
    <img width="40" src="img/nyerah.gif" onclick="storeCaret('::nyerah::','smiley')"/>	
    <img width="40" src="img/tepuk.gif" onclick="storeCaret('::tepuk::','smiley')"/>	
    </div>
<input name="pesan" type="text" id="pesan"/>
<input name="submit" type="submit" value="Kirim" id="post_button" />
</form>

</script><script language="Javascript">
document.getElementById('pesan').value = ""; // needed for firefox
</script>
<?php 
}else{
header ('location:../../index.php');
}   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 
?>
</body>
</html>
