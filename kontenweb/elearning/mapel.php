<?php    
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 if (!isset($_SESSION['kontenisi'])){
header ('location:../../index.php');
break;
}

function meta() {
global $ns, $r;
$web=$ns['isi_pengaturan'];
$descx='mata pelajaran ';
$title='Mata Pelajaran';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='modul pelajaran '.$titlez;
$isi='';
$description=desc($isi,$descx);
$judul='';
$title=titx($judul,$title);
$title=$title.' - '.$web;
echo "<title>$title</title>
<meta name='description' content='$description'>
<meta name='keywords' content='$keywords'> ";
}

function konten() {
global $DB_KODE, $ns;
?>
<div id="konten">
<div id="lebar">


<?php 

include "kontenweb/elearning/menu.php"; 

?>


<h3>Materi Berdasarkan Mata Pelajaran</h3>
		<table class="garis">
			<tr><th class="garis" width="30">No</th>
				<th class="garis">Mata Pelajaran</th>
				<th class="garis" width="75">Jml.Materi</th>
				<th class="garis" width="225"><?php echo $_SESSION['Bguru']; ?> Pengampu</th>
			</tr>
			<?php 
			$no=1;
			$mapel=mysql_query("SELECT * FROM ".$DB_KODE."_mapel ORDER BY id_mapel DESC");
			while($data=mysql_fetch_array($mapel)){
			
							$judul = strtolower(preg_replace("/\s/","9a9z9",$data['nama_mapel']));						
							$judul = preg_replace('#\W#', '', $judul);								
							$judul = str_replace("9a9z9","-",$judul);
							$url_materi = "materi-pelajaran-".$data['id_mapel']."-".$judul.".html";


			?>
			<tr><td class="garis" width="30"><?php  echo $no?></td>
				<td class="garis"><b><a href="<?php  echo $url_materi;?>"><?php  echo $data['nama_mapel']?></a></b></td>
				<td class="garis">
				<?php 
				$hitungmateri=mysql_query("SELECT * FROM ".$DB_KODE."_materi WHERE id_mapel='$data[id_mapel]'");
				$totalmateri=mysql_num_rows($hitungmateri);
				echo $totalmateri
				?>
				&nbsp; File
				</td>
				<td class="garis">
				<?php 
				$gurupengampu=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE id_mapel='$data[id_mapel]'");
				while ($gp=mysql_fetch_array($gurupengampu)){
											
							$guru=$gp['nama_gurustaff'].'9a9z9'.$ns['isi_pengaturan'];							
						    $guru = strtolower(preg_replace("/\s/","9a9z9",$guru));
								$guru = preg_replace('#\W#', '', $guru);								
							$guru = str_replace("9a9z9","-",$guru);
							$url_guru = "profil-user-".$gp['nip']."-".$guru.".html";
				?>
				<a href="<?php  echo $url_guru;?>"><i><?php  echo $gp['nama_gurustaff']?></i><br>
				<?php  } ?>
				</td>
			</tr>
			<?php  $no++; } ?>
		</table>
<?php 
include "kontenweb/elearning/footer.php"; 
include "kontenweb/elearning/menu.php"; 
?>
		
		
</div>
</div>
<?php     } ?>

<?php    


/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

