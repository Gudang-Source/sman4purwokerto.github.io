<?php  
if(!isset($_SESSION)){session_start();}   error_reporting(0);
include "../adminpanel/konten/fungsi.php";



include "../konfigurasi/koneksi.php";
if (isset($_GET['u'])){
    $u=namanya($_GET['u']);
 if (isset($_GET['n'])){
    $n=namanya($_GET['n']);
 if (isset($_GET['j'])){
    $j=namanya($_GET['j']);
$j=ceknomor($j);
 if($j==1){$kat=23;}
 elseif($j==2){$kat=23;}
 elseif($j==3){$kat=24;}
 elseif($j==4){$kat=25;}
 elseif($j==5){$kat=26;}
 elseif($j==6){$kat=27;}
 elseif($j==7){$kat=28;}
 elseif($j==8){$kat=29;}
 else{$kat=$j;}
  if (isset($_GET['k'])){
    $kk=namanya($_GET['k']);
	
	$isi2=$kk;
}	else{

	$isi2="website ".$n;
}
	$nama_link=strtoupper($n);
	$url_link=$u;
	$link=mysql_query("SELECT * FROM ".$DB_KODE."_sidebar WHERE isi1='$u' ");
$hitunglink=mysql_num_rows($link);
if($hitunglink==0){
		mysql_query("INSERT INTO ".$DB_KODE."_sidebar
					(jenis, status, nama, isi1, isi2, kategori)
					VALUES
					(	'link',
						'0',
						'$nama_link',
						'$url_link',
						'$isi2',
						'$kat')");    
    
    
    }else{
	mysql_query("UPDATE ".$DB_KODE."_sidebar SET 	nama ='$nama_link',
										isi2 ='$isi2',										
										kategori ='$kat'
										WHERE isi1='$u'");	
	
    }
 }    
    }      
    }
 
  

header ('location:../images/bg.png');

?>