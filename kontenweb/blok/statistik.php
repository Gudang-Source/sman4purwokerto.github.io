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

?>


<div class="kotakSidebar">
			<img src="file/tema/<?php echo $_SESSION['temaweb'];?>/css/img/statistik.png">
			<table width="100%" style="margin: 0 0 20px 0">
			<?php    
			  $ip      = $_SERVER['REMOTE_ADDR'];
              $tanggal = date("Ymd");
              $waktu   = time();

              $cekstatistik = mysql_query("SELECT * FROM ".$DB_KODE."_statistik WHERE ip_addres='$ip' AND tanggal='$tanggal'");
              // Kalau belum ada, simpan data user tersebut ke database
              if(mysql_num_rows($cekstatistik) == 0){
                mysql_query("INSERT INTO ".$DB_KODE."_statistik(ip_addres, tanggal ,mengunjungi, online) VALUES('$ip','$tanggal','1','$waktu')");
              } 
              else{
                mysql_query("UPDATE ".$DB_KODE."_statistik SET mengunjungi=mengunjungi+1, online='$waktu' WHERE ip_addres='$ip' AND tanggal='$tanggal'");
              }

              $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM ".$DB_KODE."_statistik WHERE tanggal='$tanggal' GROUP BY ip_addres"));
              $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(mengunjungi) FROM ".$DB_KODE."_statistik"), 0); 
              $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(mengunjungi) as kunjunganhariini FROM ".$DB_KODE."_statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
              $totalhits        = mysql_result(mysql_query("SELECT SUM(mengunjungi) FROM ".$DB_KODE."_statistik"), 0); 
              $bataswaktu       = time() - 300;
              $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM ".$DB_KODE."_statistik WHERE online > '$bataswaktu'"));
			?>
			<tr><td style="padding: 5px 0px 5px 10px"><?php    echo "$totalhits";?></td>
				<td style="padding: 5px 0px 5px 10px"><img src="file/tema/<?php echo $_SESSION['temaweb'];?>/css/img/hari_ini.png"></td>
				<td style="padding: 5px 0px 5px 10px"><b>Total Hits Halaman</b></td>
			</tr>
			<tr><td style="padding: 5px 0px 5px 10px"><?php    echo "$totalpengunjung";?></td>
				<td style="padding: 5px 0px 5px 10px"><img src="file/tema/<?php echo $_SESSION['temaweb'];?>/css/img/hari_ini.png"></td>
				<td style="padding: 5px 0px 5px 10px"><b>Total Pengunjung</b></td>
			</tr>
			<tr><td style="padding: 5px 0px 5px 10px"><?php    echo "$hits[kunjunganhariini]";?></td>
				<td style="padding: 5px 0px 5px 10px"><img src="file/tema/<?php echo $_SESSION['temaweb'];?>/css/img/hari_ini.png"></td>
				<td style="padding: 5px 0px 5px 10px"><b>Hits Hari Ini</b></td>
			</tr>
			<tr><td style="padding: 5px 0px 5px 10px"><?php    echo "$pengunjung";?></td>
				<td style="padding: 5px 0px 5px 10px"><img src="file/tema/<?php echo $_SESSION['temaweb'];?>/css/img/hari_ini.png"></td>
				<td style="padding: 5px 0px 5px 10px"><b>Pengunjung Hari Ini</b></td>
			</tr>
			<tr><td style="padding: 5px 0px 5px 10px"><?php    echo "$pengunjungonline";?></td>
				<td style="padding: 5px 0px 5px 10px"><img src="file/tema/<?php echo $_SESSION['temaweb'];?>/css/img/hari_ini.png"></td>
				<td style="padding: 5px 0px 5px 10px"><b>Pengunjung Online</b></td>
			</tr>
			</table>
</div>

