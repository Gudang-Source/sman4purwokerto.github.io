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

 if (isset($_POST['ganti'])){
 unset($_SESSION['temaweb']);
$_SESSION['temaweb']=$_POST['tema'];
?>
<script type="text/javascript">
<!--
window.location = "index.php"
//-->
</script>
<?php
}

?>
<div class="kotakSidebar">
			
			
			<form method='POST'>
			<select name="tema">
			<?php    
			//echo $_SESSION['urlweb'];
			$tm=mysql_query("SELECT * FROM ".$DB_KODE."_tema ");
			while($t=mysql_fetch_array($tm)){ ?>
			<option value="<?php    echo $t['nama_tema'];?>"><?php    echo $t['nama_tema'];?></option>
			<?php     } ?>
			</select>
			<input type="hidden" name="ganti">
			<input type="submit" class="pencet" value="Ganti Tema">
			</form>
	

</div>	

