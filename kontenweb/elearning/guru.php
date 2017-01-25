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
$descx='profil guru elearning ';
$title='Profil guru Elearning';
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

<h3>Materi Berdasarkan <?php echo $_SESSION['Bguru']; ?></h3>
		<table class="garis">
			<tr><th class="garis" width="30">No</th>
				<th class="garis">Nama <?php echo $_SESSION['Bguru']; ?></th>
				<th class="garis" width="125">Mengajar</th>
				<th class="garis" width="125">Jumlah Materi</th>
			</tr>
			<?php 
			$no=1;
			$dirguru=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff, ".$DB_KODE."_mapel WHERE ".$DB_KODE."_guru_staff.id_mapel=".$DB_KODE."_mapel.id_mapel AND posisi='guru' ORDER BY nama_gurustaff");
			while ($dg=mysql_fetch_array($dirguru)){
				global $ns;

							
							$guru=$dg['nama_gurustaff'].'9a9z9'.$ns['isi_pengaturan'];							
						    $guru = strtolower(preg_replace("/\s/","9a9z9",$guru));
							$guru = preg_replace('#\W#', '', $guru);								
							$guru = str_replace("9a9z9","-",$guru);
							$url_guru = "profil-user-".$dg['nip']."-".$guru.".html";			
			?>
			<tr><td class="garis" width="30"><?php  echo $no?></td>
				<td class="garis"><a href="<?php  echo $url_guru;?>"><b><?php  echo $dg['nama_gurustaff']?></b></a></td>
				<td class="garis"><?php  echo $dg['nama_mapel']?></td>
				<td class="garis">
				<?php 
				$materiguru=mysql_query("SELECT * FROM ".$DB_KODE."_materi WHERE nip='$dg[nip]'");
				$hitungmg=mysql_num_rows($materiguru);
				echo $hitungmg
				?>
				 File
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

