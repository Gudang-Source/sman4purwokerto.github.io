<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
if(!isset($_SESSION)){session_start();}   error_reporting(0);
 include "../../konten/fungsi.php";
if (isset($_GET['t'])){
	$t=$_GET['t'];
}elseif (isset($_POST['t'])){
	$t=$_POST['t'];
}



if (isset($_GET['id'])){

$id=ceknomor($_GET['id']);
}
if (isset($_POST['id'])){

$id=ceknomor($_POST['id']);
}

if (!isset($_SESSION['adminsh']))
{
	gogo('../../../../index.php');
	exit;
}
else{ 
if (!isset($_POST['db']))
{
	gogo('../../../../index.php');
	exit;
}
else{ 


include "../../../konfigurasi/koneksi.php";  adminku();
nailah($t);
$token=nt();
if (isset($_POST['restore'])==$DB_KODE){
	
function restoreSQL($db){
	global $DB_KODE;
	
    $date  = date("d_m_Y_H_s");
$filename=$_FILES['fupload']['tmp_name'];
if ($filename){

$sql = 'SHOW TABLES FROM '.$db;
$tables = mysql_query($sql);
    while ($td = mysql_fetch_array($tables))
    {
        $table = $td[0];
	if (substr(trim($table), 0, 8) == 'zbackup_'){
		
		mysql_query("DROP TABLE ".$table."  ;");
	}

	
    }

$sql2 = 'SHOW TABLES FROM '.$db;
$tables2 = mysql_query($sql2);
    while ($td2 = mysql_fetch_array($tables2))
    {
        $table2 = $td2[0];
	if (substr(trim($table2), 0, 8) != 'zbackup_'){

	mysql_query("RENAME TABLE ".$table2." TO zbackup_".$date."_".$table2." ;");	
	}
	
	//

	
    }	




	$templine = '';
	// Read in entire file
	$lines = file($filename);
	// Loop through each line
	foreach ($lines as $line)
	{
	    // Skip it if it's a comment
	    if (substr($line, 0, 2) == '--' || $line == '')
		continue;
	 
	    // Add this line to the current segment
	    $templine .= $line;
	    // If it has a semicolon at the end, it's the end of the query
	    if (substr(trim($line), -1, 1) == ';')
	    {
		 $templine = str_replace("backup_", $DB_KODE."_",$templine);
		// Perform the query
		mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
		// Reset temp variable to empty
		$templine = '';

	    }
	}

    
}
	

}// restore selesai

$db=namanya($_POST['db']);
restoreSQL($db);	
}

?>
<script language='JavaScript'>
self.location='../../backup.php';
</script>
 <center><br><br><img src="../../images/loading.gif" style="   vertical-align: middle;text-align: center;"> <br>Mohon ditunggu ..!</center>


<?php   }}
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

