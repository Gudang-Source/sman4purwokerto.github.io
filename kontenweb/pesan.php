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


		$plugin=mysql_query("SELECT * FROM ".$DB_KODE."_plugin WHERE folder_plugin='shoutbox'");		
		$pl=mysql_fetch_array($plugin);
		if	 ($pl['status']==1){
$shoutbox1=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE nama_pengaturan='shoutbox'");
				$sb1=mysql_fetch_array($shoutbox1);	
				if	 ($sb1['isi_pengaturan']==1){
				if	 ($sb1['isi_pengaturan2']==0){
				unset($_SESSION['kirim_pesan']);
				}
usercms('shoutbox');				
?>

<script language="Javascript">
var isMozilla = (navigator.userAgent.toLowerCase().indexOf('gecko')!=-1) ? true : false;
var regexp = new RegExp("[\n]","gi");
 
function storeCaret(selec,type)
{
    if (isMozilla)
        { // Firefox
        oField = document.forms['form_pesan'].elements['message'];
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

<div class="kotakSidebar">

	<script type="text/javascript" src="blok/eksternal/modul/shoutbox/shoutbox.js"></script>


	
		<style>
	#loading{	text-align: center;}
	</style>	<br>
<center><img src="blok/kontenweb/blok/eksternal/modul/shoutbox/pesan.png"  /></center>
		<div class="pesan_slide" style=" position: relative; height :155px; overflow:hidden; ">
		
			<div id="loading"><img src="blok/kontenweb/blok/eksternal/modul/shoutbox/loading.gif" alt="Loading..." /></div>
			<ul  id="ticker_02" >

			</ul>	
		</div>
<hr>
		<?php
 if (!isset($_SESSION['kirim_pesan'])){	
?>
	<form method="post" id="form_pesan" >			
		<table class="shoutbox" style=" ">
		<?php
 if (isset($_SESSION['nickname'])){	
?> 
			<tr>
				<td style="padding:0px;"><label>Nama</label></td>
				<td style="padding:0px;"><input class="text user" id="nick" type="hidden" value="<?php echo $_SESSION['nickname'];?>" /><b><?php echo $_SESSION['nickname'];?></b></td>
			</tr>	
		<?php
}	else{
?> 
			<tr>
				<td style="padding:0px;"><label>Nama</label></td>
				<td style="padding:0px;"><input class="text user" id="nick" type="text" MAXLENGTH="25" /></td>
			</tr>	
		<?php
}	
 if (isset($_SESSION['guru'])){	
?> 			


<?php
} elseif (isset($_SESSION['siswa'])){	
?> 			

<?php
}	else{
?> 		
			<tr>
				<td style="padding:0px;"><label>Email</label></td>
				<td style="padding:0px;"><input class="text user" id="email" type="text" MAXLENGTH="25" /></td>
			</tr>
<?php
}	
?> 		
			<tr>
				<td style="padding:0px;"><label>Url</label></td>
				<td style="padding:0px;"><input class="text user" id="url" type="text" MAXLENGTH="100" /></td>
			</tr>			
			<tr>
				<td style="padding:0px;"><label>Pesan</label></td>
				<td style="padding:0px;"><input class="text" id="message" type="text" MAXLENGTH="255" /><br>
	    <div class="buttons">
  <img style="float:left" src="blok/kontenweb/blok/eksternal/modul/shoutbox/img/senyum.png" onclick="storeCaret('::senyum::','smiley')"/>
  <img style="float:left" src="blok/kontenweb/blok/eksternal/modul/shoutbox/img/tertawa.png" onclick="storeCaret('::tawa::','smiley')"/>
  <img style="float:left" src="blok/kontenweb/blok/eksternal/modul/shoutbox/img/sedih.png" onclick="storeCaret('::sedih::','smiley')"/>
  <img style="float:left" src="blok/kontenweb/blok/eksternal/modul/shoutbox/img/nangis.png" onclick="storeCaret('::nangis::','smiley')"/>
  <img style="float:left" src="blok/kontenweb/blok/eksternal/modul/shoutbox/img/cinta.png" onclick="storeCaret('::cinta::','smiley')"/>
    <img style="float:left" src="blok/kontenweb/blok/eksternal/modul/shoutbox/img/marah.png" onclick="storeCaret('::marah::','smiley')"/>
    <img style="float:left" src="blok/kontenweb/blok/eksternal/modul/shoutbox/img/ejek.png" onclick="storeCaret('::ejek::','smiley')"/>
  <img style="float:left" src="blok/kontenweb/blok/eksternal/modul/shoutbox/img/ok.png" onclick="storeCaret('::bagus::','smiley')"/>
    <img style="float:left" src="blok/kontenweb/blok/eksternal/modul/shoutbox/img/no.png" onclick="storeCaret('::jelek::','smiley')"/>
    </div>			
				</td>
			</tr>
			<tr>
				<td style="padding:0px;"></td>
				<td style="padding:0px;"><input id="send" type="submit" value="Kirim" /></td>
			</tr>
		</table>
	</form>		
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("form_pesan");
			frmvalidator.addValidation("nick","req","Nama harus diisi");
			frmvalidator.addValidation("email","req","Masukkan Email Anda");
			frmvalidator.addValidation("message","req","Pesan harus diisi");
			frmvalidator.addValidation("message","maxlen=200","Pesan maksimal 300 karakter");
			frmvalidator.addValidation("message","minlen=10","Pesan minimal 10 karakter");
	  
			
			frmvalidator.addValidation("url","url","Format URL salah");
			frmvalidator.addValidation("email","email","Format email salah");

			//]]>
		</script>	
<?php
}else{
echo "Anda hanya diperkenankan mengirim pesan 1 kali.";
}
?>	
<script language="Javascript">
document.getElementById('pesan').value = ""; // needed for firefox
</script>	
<script>

	function tick(){
		$('#ticker_01 li:first').slideUp( function () { $(this).appendTo($('#ticker_01')).slideDown(); });
	}
	setInterval(function(){ tick () }, 5000);


	function tick2(){
		$('#ticker_02 li:first').slideUp( function () { $(this).appendTo($('#ticker_02')).slideDown(); });
	}
	setInterval(function(){ tick2 () }, 4000);


	function tick3(){
		$('#ticker_03 li:first').animate({'opacity':0}, 200, function () { $(this).appendTo($('#ticker_03')).css('opacity', 1); });
	}
	setInterval(function(){ tick3 () }, 4000);	

	function tick4(){
		$('#ticker_04 li:first').slideUp( function () { $(this).appendTo($('#ticker_04')).slideDown(); });
	}





</script>


	<span class="clear"></span>

</div>
<?php } //tampil
} //status
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

?>