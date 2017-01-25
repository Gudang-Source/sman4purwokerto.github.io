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
$profilguru=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff, ".$DB_KODE."_mapel WHERE ".$DB_KODE."_guru_staff.id_mapel=".$DB_KODE."_mapel.id_mapel AND nip='$_GET[nip]'");
$data=mysql_fetch_array($profilguru);
function meta() {
global $ns, $data;
$web=$ns['isi_pengaturan'];
$descx='profil guru elearning '.$data['nama_gurustaff'].' '.$data['nama_mapel'];
$title='Profil guru Elearning '.$data['nama_gurustaff'].' ';
$mapel=' '.$data['nama_mapel'].' ';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$mapel.' , '.$web.' , '.$mapel.' '.$web.' , '.$web.' '.$mapel;
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

<h3>Guru Mata Pelajaran</h3>
<?php 
global $data;
?>
		<table style="margin: 20px 0 20px 0;">
			<tr class="form"><th class="garis" colspan="3" style="text-align: center">Data <?php echo $_SESSION['Bguru']; ?></th></tr>
			<tr class="form"><td rowspan="5"  width="160px"><img src="images/foto/guru/<?php  echo $data['foto']?>" width="150px" style="padding: 10px; background: #fff; border: 1px solid #dcdcdc;"></td>
			<td><b>Nama</b></td><td><?php  echo $data['nama_gurustaff']?></td></tr>
			<tr class="form"><td><b>Mengajar</b></td><td>: <?php  echo $data['nama_mapel']?></td></tr>
			<tr class="form"><td><b>Telp/ HP</b></td><td>: <?php  echo $data['telepon']?></td></tr>
			<tr class="form"><td><b>Email</b></td><td>: <?php  echo $data['email']?></td></tr>
			<tr class="form"><td><b>Jumlah Materi</b></td><td>
			<?php 
			$hitungmateri=mysql_query("SELECT * FROM ".$DB_KODE."_materi WHERE nip='$_GET[nip]'");
			$jmlmateri=mysql_num_rows($hitungmateri);
			?>
			<b><u><a href=""><?php  echo $jmlmateri?></a></u></b>&nbsp;File
			</td></tr>
		</table>
		
		<table class="garis"  id="results">
			<tr><th class="garis" width="30">No</th>
				<th class="garis">Judul Materi</th>
				<th class="garis" width="125">Tgl.Upload</th>
				<th class="garis" width="125">Mata Pelajaran</th>
				<th class="garis" width="75">Download</th>
			</tr>
			<?php 
			$no=1;
			$datamateri=mysql_query("SELECT * FROM ".$DB_KODE."_materi, ".$DB_KODE."_mapel WHERE ".$DB_KODE."_materi.id_mapel=".$DB_KODE."_mapel.id_mapel AND nip='$_GET[nip]'");
			$hitungmateri=mysql_num_rows($datamateri);
			
			if($hitungmateri > 0){
			while($dm=mysql_fetch_array($datamateri)){
										$pelajaran = strtolower(preg_replace("/\s/","9a9z9",$dm['judul_materi']));						
							$pelajaran = preg_replace('#\W#', '', $pelajaran);								
							$pelajaran = str_replace("9a9z9","-",$pelajaran);
							$url_pelajaran = "pelajaran-materi-".$dm['id_materi']."-".$pelajaran.".html";
			?>
			<tr><td class="garis" width="30"><?php  echo $no?></td>
				<td class="garis"><b><?php  echo $dm['judul_materi']?>&nbsp; (<?php  echo $dm['download']?>)</b></td>
				<td class="garis"><?php  echo $dm['tanggal_upload']?></td>
				<td class="garis"><?php  echo $dm['nama_mapel']?></td>
				<td class="garis" style="text-align: center;"><a href="<?php  echo $url_pelajaran;?>">Download</a></td>
			</tr>
			<?php  $no++; }}
			
			else { ?>
			<tr><td colspan="5"><b>Belum ada materi yang diupload</b></td></tr>
			<?php  } ?>
		</table>
		
		
				<div id="pageNavPosition"></div>
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 10); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
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

