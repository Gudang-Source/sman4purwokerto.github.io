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

<table class="garis" >
				<?php 
				$pbmterbaru=mysql_query("SELECT * FROM ".$DB_KODE."_materi, ".$DB_KODE."_mapel, ".$DB_KODE."_guru_staff WHERE ".$DB_KODE."_materi.id_mapel=".$DB_KODE."_mapel.id_mapel AND ".$DB_KODE."_materi.nip=".$DB_KODE."_guru_staff.nip ORDER BY id_materi DESC LIMIT 2");
				$hitungmt=mysql_num_rows($pbmterbaru);
				
				if ($hitungmt > '0'){
				while ($mt=mysql_fetch_array($pbmterbaru)){
				global $ns;
							$mapel = strtolower(preg_replace("/\s/","9a9z9",$mt['nama_mapel']));						
							$mapel = preg_replace('#\W#', '', $mapel);								
							$mapel = str_replace("9a9z9","-",$mapel);
							$url_mapel = "pbm-pelajaran-".$mt['id_mapel']."-".$mapel.".html";
							
							$pelajaran = strtolower(preg_replace("/\s/","9a9z9",$mt['judul_materi']));						
							$pelajaran = preg_replace('#\W#', '', $pelajaran);								
							$pelajaran = str_replace("9a9z9","-",$pelajaran);
							$url_pelajaran = "pelajaran-materi-".$mt['id_materi']."-".$pelajaran.".html";
							
							$guru=$mt['nama_gurustaff'].'9a9z9'.$ns['isi_pengaturan'];							
						    $guru = strtolower(preg_replace("/\s/","9a9z9",$guru));
							$guru = preg_replace('#\W#', '', $guru);								
							$guru = str_replace("9a9z9","-",$guru);
							$url_guru = "profil-user-".$mt['nip']."-".$guru.".html";
				?>
				<tr><td class="garis"><a href="<?php  echo $url_pelajaran;?>"><b><?php  echo $mt['judul_materi']?></b></a> <span style="float:right">Didownload <b><?php  echo $mt['download']?></b> kali</span><br>
				Mata Pelajaran : <b><a href="<?php  echo $url_mapel;?>"><?php  echo $mt['nama_mapel']?></a></b> <span style="float:right"><?php echo $_SESSION['Bguru']; ?> Pengampu : <b><a href="<?php  echo $url_guru;?>"><?php  echo $mt['nama_gurustaff']?></a></span><br>
				</b>
				</td></tr>
				<?php  }}
				else {?>
				<tr><td class="garis"><a href=""><b>Belum ada pbm yang diupload</b></td></tr>
				<?php  } ?>
</table>

		
<?php     			
  } 
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>