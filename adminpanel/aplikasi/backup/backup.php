<?php if(!isset($_SESSION)){session_start();}   error_reporting(0); include "../../konten/fungsi.php"; 
/* Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
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
if (isset($_POST['backup'])==$DB_KODE){

function backupSQL($db){
	global $DB_KODE;
$sql = 'SHOW TABLES FROM '.$db;
$tables = mysql_query($sql);

	
   // $tables = mysql_list_tables($db);


    while ($td = mysql_fetch_array($tables))
    {
        $table = $td[0];
	if (substr(trim($table), 0, 8) != 'zbackup_'){
		$r = mysql_query("SHOW CREATE TABLE  `$table`");
		if ($r)
		{
		    $insert_sql = "";
		    $d = mysql_fetch_array($r);
		    $d[1] .= ";";
		    $SQL[] = str_replace("\n", "", $d[1]);
		    $table_query = mysql_query("SELECT * FROM `$table`");
		    $num_fields = mysql_num_fields($table_query);
	
	
		    if(mysql_num_rows($table_query) > 0)
			$insert_sql .= "INSERT INTO $table VALUES ";
		    
		    $i = 0;
		    while ($fetch_row = mysql_fetch_array($table_query))
		    {
			$insert_sql .= "(";
			for ($m=0;$m<$num_fields;$m++)
			{
			    $value = mysql_real_escape_string($fetch_row[$m]);
			    $type  = mysql_field_type($table_query, $m);
	
	
			    if(strcmp($type, "int") == 0 && is_numeric($value))
				$insert_sql .= $value.", ";
			    elseif(is_null($fetch_row[$m]))
				$insert_sql .= "NULL, ";
			    else
				$insert_sql .= "'".$value."', ";
			}
			$insert_sql = substr($insert_sql,0,-2);
	
	
			if($i == mysql_num_rows($table_query) - 1)
			    $insert_sql .= ");\n\n\n";
			else
			    $insert_sql .= "),\n";
			
			$i++;
		    }
	
	
		    if ($insert_sql!= "")
		    {
			$SQL[] = $insert_sql;
		    }
		}    
        }
    }
	$SQL = str_replace("INSERT INTO","\n\n\n\n-- CMS FORMULASI http://cms.formulasi.or.id --\n\n\n\nINSERT INTO",$SQL);
	
    $SQL = str_replace("CREATE TABLE","\n\n\n\n-- CMS FORMULASI http://cms.formulasi.or.id --\n\n\n\nCREATE TABLE IF NOT EXISTS",$SQL);
    
    $SQL = str_replace($DB_KODE."_","backup_",$SQL);
 
 $sql = implode("\r", $SQL);
 
// echo $sql;
    
    $date  = date("d-m-Y_H-s");
	$url=$_SERVER['SERVER_NAME'];
	$url = str_replace("http://","",$url);
	$url = str_replace("https://","",$url);
	$url = str_replace("/","",$url);
    $name_awal  = 'Backup-'.$url.'_'.$db.'_'.$date.".sql";
	$name=base64_encode($name_awal);
	$name=md5($name);
	$name=base64_encode($name);	
	$name=md5($name.''.$DB_KODE);
	$name=base64_encode($name);	
	$name=md5($DB_KODE.''.$name);
	$name=base64_encode($DB_KODE.''.$name.''.$DB_KODE);	
	$name=md5($name);
	
    chmod('data/', 0777);
    $fileName = fopen ('data/'.$name, 'w');
    //fputs ($fileName, $sql);
    fwrite ($fileName, $sql);
    chmod('data/'.$name, 0777);
	if ($fileName){

    fclose ($fileName);	
	header("Content-Disposition: attachment; filename=".$name_awal."");
	header("Content-type: application/download");
	$fp  = fopen('data/'.$name, 'r');
		if ($fp){
		$content = fread($fp, filesize('data/'.$name));
		fclose($fp);

		echo $content;
		//gogo('');
		}else{
		
	//gogo('../../backup.php');
	}
		}else{

	
//gogo('../../backup.php');
	}

		unlink('data/'.$name);
		chmod('data/', 0755);
	
}

$db=namanya($_POST['db']);
backupSQL($db);	
}
elseif(isset($_POST['restore'])==$DB_KODE){

}
?>

<center><br><br><img src="../../images/loading.gif" style="   vertical-align: middle;text-align: center;"> <br>Mohon ditunggu ..!</center>  
 


<?php   }}
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>