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
include "../../konfigurasi/koneksi.php";


$result = mysql_query("SELECT * FROM ".$DB_KODE."_chat where id_pbm='' ORDER BY id DESC limit 20");


while($row = mysql_fetch_array($result))
  {
  $pesan = str_replace("::senang::","<img src='img/senang.gif' >",$row['pesan']);
    $pesan = str_replace("::tolong::","<img src='img/tolong.gif' >",$pesan);
    $pesan = str_replace("::marah::","<img src='img/marah.gif' >",$pesan);
    $pesan = str_replace("::love::","<img src='img/love.gif' >",$pesan);
    $pesan = str_replace("::tidak::","<img src='img/tidak.gif' >",$pesan);
    $pesan = str_replace("::pisang::","<img src='img/pisang.gif' >",$pesan);
    $pesan = str_replace("::dada::","<img src='img/dada.gif' >",$pesan);
    $pesan = str_replace("::nangis::","<img src='img/nangis.gif' >",$pesan);
    $pesan = str_replace("::nari::","<img src='img/nari.gif' >",$pesan);
    $pesan = str_replace("::halo::","<img src='img/halo.gif' >",$pesan);
    $pesan = str_replace("::metal::","<img src='img/metal.gif' >",$pesan);
    $pesan = str_replace("::perhatian::","<img src='img/perhatian.gif' >",$pesan);
    $pesan = str_replace("::welcome::","<img src='img/welcome.gif' >",$pesan);  
    $pesan = str_replace("::tidur::","<img src='img/tidur.gif' >",$pesan);    
	$pesan = str_replace("::hore::","<img src='img/hore.gif' >",$pesan);
	
    $pesan = str_replace("::ok::","<img src='img/ok.gif' >",$pesan);
    $pesan = str_replace("::mringis::","<img src='img/mringis.gif' >",$pesan);
    $pesan = str_replace("::wow::","<img src='img/wow.gif' >",$pesan);  
    $pesan = str_replace("::nyerah::","<img src='img/nyerah.gif' >",$pesan);    
	$pesan = str_replace("::tepuk::","<img src='img/tepuk.gif' >",$pesan);

	
  echo '<p>'.'<span>'.$row['pengirim'].'</span>'. '&nbsp;&nbsp;' . $pesan.'</p>';
  }


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

