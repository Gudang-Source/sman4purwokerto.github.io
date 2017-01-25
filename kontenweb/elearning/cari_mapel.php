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

if (isset($_GET['id'])){$id=ceknomor($_GET['id']);} if (isset($_POST['id'])){$id=ceknomor($_POST['id']);}
$namamapel=mysql_query("SELECT * FROM ".$DB_KODE."_mapel WHERE id_mapel='$id'");
$namajudul=mysql_fetch_array($namamapel);

function meta() {
global $ns, $namajudul;
$web=$ns['isi_pengaturan'];
$title=$namajudul['nama_mapel'];
$titlez=$namajudul['nama_mapel'];
$keyw1 = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw2 = strtolower(preg_replace("/\s/",", download ",$titlez));
$keyw=$keyw1.' '.$keyw2;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$isi='';
$desc='download materi pelajaran '.$title;
$description=desc($isi,$desc);
$judul='';
$title=titx($judul,$title);
$title=$title.' - '.$web;
echo "<title>Download materi $title</title>
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

<?php 
global $ns, $namajudul;
?>
<h3>Data Materi Mata Pelajaran <?php  echo $namajudul['nama_mapel']?></h3>
		<p>*) Tips : Klik pada judul materi untuk download</p>
		<table class="garis" id="results">
			<tr><th class="garis" width="25px">No</th>
				<th class="garis" width="200px">Judul Materi</th>
				<th class="garis" width="175px">Mata Pelajaran</th>
				<th class="garis" width="150px"><?php echo $_SESSION['Bguru']; ?> Pengampu</th>
				<th class="garis" width="95px">Tgl. Upload</th>
			</tr>
			<?php 
			$no=1; if (isset($_GET['id'])){$id=ceknomor($_GET['id']);} if (isset($_POST['id'])){$id=ceknomor($_POST['id']);}
			$semua=mysql_query("SELECT * FROM ".$DB_KODE."_materi, ".$DB_KODE."_mapel, ".$DB_KODE."_guru_staff 
			WHERE ".$DB_KODE."_materi.id_mapel=".$DB_KODE."_mapel.id_mapel AND ".$DB_KODE."_materi.nip=".$DB_KODE."_guru_staff.nip AND ".$DB_KODE."_materi.id_mapel='$id' ORDER BY id_materi DESC");
			$hitung=mysql_num_rows($semua);
			if ($hitung > 0){
			while($sm=mysql_fetch_array($semua)){
			global $ns;
							$pelajaran = strtolower(preg_replace("/\s/","9a9z9",$sm['judul_materi']));						
							$pelajaran = preg_replace('#\W#', '', $pelajaran);								
							$pelajaran = str_replace("9a9z9","-",$pelajaran);
							$url_pelajaran = "pelajaran-materi-".$sm['id_materi']."-".$pelajaran.".html";

							
							$guru=$sm['nama_gurustaff'].'9a9z9'.$ns['isi_pengaturan'];							
						    $guru = strtolower(preg_replace("/\s/","9a9z9",$guru));
								$guru = preg_replace('#\W#', '', $guru);								
							$guru = str_replace("9a9z9","-",$guru);
							$url_guru = "profil-user-".$sm['nip']."-".$guru.".html";
			?>
			<tr><td class="garis" width="30"><?php  echo $no?></td>
				<td class="garis"><b><a href="<?php  echo $url_pelajaran;?>"><?php  echo $sm['judul_materi']?></a>&nbsp(<?php  echo $sm['download']?>)</b></td>
				<td class="garis"><?php  echo $sm['nama_mapel']?></td>
				<td class="garis"><i><a href="<?php  echo $url_guru ;?>"><?php  echo $sm['nama_gurustaff']?></a></i></td>
				<td class="garis"><?php  echo $sm['tanggal_upload']?></td>
				
			</tr>
			<?php  $no++; }}
			else  {?>
			<tr><td colspan="5"><b>Belum ada materi yang diupload</b></td></tr>
			<?php  } ?>
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

