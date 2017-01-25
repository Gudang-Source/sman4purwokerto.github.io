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
global $rpp ;
if ($rpp==1){
?>
<div class="kotakSidebar">


<img src="file/tema/<?php  echo $_SESSION['temaweb'];?>/css/img/e-learning.png">


		<div class="statistikMenu">
		<b>Informasi E-learning</b>
		<?php 
		$siswa=mysql_query("SELECT * FROM ".$DB_KODE."_siswa WHERE status_siswa='1'");
		$jmlsiswa=mysql_num_rows($siswa);
		$guru=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE posisi='guru'");
		$jmlguru=mysql_num_rows($guru);
		$mapelm=mysql_query("SELECT * FROM ".$DB_KODE."_mapel");
		$jmlmapel=mysql_num_rows($mapelm);
		$materim=mysql_query("SELECT * FROM ".$DB_KODE."_materi");
		$jmlmateri=mysql_num_rows($materim);
		?>
		<ul>
		<li><b><?php  echo $jmlsiswa?></b> Jumlah <?php echo $_SESSION['Bsiswa'];?></li>
		<li><b><?php  echo $jmlguru?></b> Jumlah <?php echo $_SESSION['Bguru']; ?></li>
		<li><b><?php  echo $jmlmapel?></b> Jumlah Mata Pelajaran</li>
		<li><b><?php  echo $jmlmateri?></b> Jumlah Materi</li>
		
		</ul>
		</div>
</div>	
<?php  }?>