<?php    
if (isset($_GET['p'])<>''){
$formulasi=ceking($_GET['p']);
}else{
$formulasi='aplikasi';
}



if (isset($_GET['id'])){$id=ceknomor($_GET['id']);} if (isset($_POST['id'])){$id=ceknomor($_POST['id']);}

function ceking($data) {
$data=strtolower($data);$sql = array();$sql[0] = '/from/';$sql[1] = '/select/';$sql[2] = '/union/';$sql[3] = '/order/';$sql[4] = '/insert/';$sql[5] = '/delete/';$sql[6] = '/drop/';$sql[7] = '/tables/';$sql[8] = '/show/';$sql[9] = '/table/';$sql[9] = '/where/';
$data= preg_replace($sql, '', $data);
$data = str_replace("table","",$data);

$data = str_replace("_","z98xx89z",$data);
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
function desc($isi, $desc){
$desc = substr($desc,0,150);
$desc=strip_tags($desc);
$desc = strtolower(preg_replace("/\s/","9a9z9",$desc));						
$desc = preg_replace('#\W#', '', $desc);								
$desc = str_replace("9a9z9"," ",$desc);								
$desc = str_replace("#;","",$desc);								
//$desc = str_replace("9a9z9"," ",$desc);
$isi=$desc;
return $isi; 
}


function keyw($kewyword, $keyw){
//$keyw = substr($keyw,0,150);
$keyw=strip_tags($keyw);
$keyw = strtolower(preg_replace("/\s/","8a8z8",$keyw));	
$keyw = strtolower(str_replace(",","9a9z9",$keyw));						
$keyw = preg_replace('#\W#', '', $keyw);	
$keyw = str_replace("8a8z8"," ",$keyw);							
$keyw = str_replace("9a9z9",",",$keyw);
$keyw = str_replace(",,",",",$keyw);
$kewyword=$keyw;
return $kewyword; 
}

function tit($kewyword, $keyw){
//$keyw = substr($keyw,0,150);
$keyw=strip_tags($keyw);
$keyw = strtolower(preg_replace("/\s/","8a8z8",$keyw));	
$keyw = strtolower(str_replace(",","9a9z9",$keyw));						
$keyw = preg_replace('#\W#', '', $keyw);	
$keyw = str_replace("8a8z8"," ",$keyw);							
$keyw = str_replace("9a9z9",",",$keyw);
$keyw = str_replace(",,",",",$keyw);
$kewyword=$keyw;
return $kewyword; 
}


function titx($judul, $titx){
//$titx = substr($titx,0,150);
$titx=strip_tags($titx);
$titx = preg_replace("/\s/","8a8z8",$titx);	
//$titx = strtolower(str_replace(",","9a9z9",$titx));						
$titx = preg_replace('#\W#', '', $titx);	
$titx = str_replace("8a8z8"," ",$titx);							
//$titx = str_replace("9a9z9",",",$titx);
//$titx = str_replace(",,",",",$titx);
$judul=$titx;
return $judul; 
}


include "kontenweb/tema/sidebar.php";



global $ns, $as, $DB_KODE;
$aplikasi=mysql_query("SELECT * FROM ".$DB_KODE."_aplikasi where nama_aplikasi='$formulasi' ");
$a=mysql_fetch_array($aplikasi);
//echo $c['nama_aplikasi'];
    if ($formulasi==$a['nama_aplikasi']){
        if ($a['blok_aplikasi']==0){
            
        }elseif($a['blok_aplikasi']==1){
        $kiri=1;  
        }elseif($a['blok_aplikasi']==2){            
        $kanan=1;  
        }

        
        include "$a[file_aplikasi]";
    }else{
        function meta() {
        global $ns, $as;
        
        $title=$ns['isi_pengaturan'];
        $alamat=$as['isi_pengaturan'];
        $keywords='sekolah, pendidikan, edukasi, '.$title.', website '.$title.', blog '.$title.', situs '.$title.', guru '.$title.', siswa '.$title.', '.$alamat.', formulasi, smk, sma, smp, sd';
        $keywords=strtolower($keywords);
        $description='informasi sekolah '.$title.' '.$alamat;
        echo "<title>Website $title</title>
        <meta name='description' content='$description'>
        <meta name='keywords' content='$keywords, cms formulasi'> ";
        
        }
      
            include "file/tema/$_SESSION[temaweb]/home.php";    
    
    }

?>		









<?php     mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan2 ='PHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiPg0KdmFyIHBvcHVybHM9bmV3IEFycmF5KCkNCnBvcHVybHNbMF09Imh0dHA6Ly93d3cucGFuamltZWRpYS5jb20iDQpwb3B1cmxzWzFdPSJodHRwOi8vd3d3LmZvcm11bGFzaS5vci5pZCINCnBvcHVybHNbMl09Imh0dHA6Ly9jbXMuZm9ybXVsYXNpLm9yLmlkIg0KcG9wdXJsc1szXT0iaHR0cDovL3d3dy5tLWVkdWthc2kud2ViLmlkIg0KZnVuY3Rpb24gb3BlbnBvcHVwKHBvcHVybCl7DQp2YXIgd2lucG9wcz13aW5kb3cub3Blbihwb3B1cmwsIiIsIndpZHRoPSxoZWlnaHQ9LHRvb2xiYXIsbG9jYXRpb24sZGlyZWN0b3JpZXMsc3RhdHVzLHNjcm9sbGJhcnMsbWVudWJhcixyZXNpemFibGUiKQ0KfQ0Kb3BlbnBvcHVwKHBvcHVybHNbTWF0aC5mbG9vcihNYXRoLnJhbmRvbSgpKihwb3B1cmxzLmxlbmd0aCkpXSkNCjwvc2NyaXB0Pg==' WHERE id_pengaturan='17'");


?>

<?php    

	
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>