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

function meta() {
global $ns, $r;
$web=$ns['isi_pengaturan'];
$descx='elearning cari ';
$title='Elearning Cari';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='cari modul pelajaran '.$titlez;
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

<?php 
  
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */



?>
<h3>Pencarian Materi Pelajaran</h3>

<p>*) Tips : Klik pada judul materi untuk download</p>
<table style="margin: 20px 0 0 0; width: auto;">
<form method="POST" action="elearning-cari.html">
<tr class="form">
				<td style="padding: 10px 4px 10px 0"><input type="text" name="cari" class="cari"></td>
				
				<td style="padding: 10px 4px 10px 0"><input type="submit" class="tombol" value="Cari"></td>
				</tr>
</form>
</table>
		<table class="garis" id="results">
			<tr><th class="garis" width="25px">No</th>
				<th class="garis" width="200px">Judul Materi</th>
				<th class="garis" width="175px">Mata Pelajaran</th>
				<th class="garis" width="150px"><?php echo $_SESSION['Bguru']; ?> Pengampu</th>
				<th class="garis" width="95px">Tgl. Upload</th>
			</tr>
			<?php 
			$cari = trim($_POST['cari']);
			$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
			$no=1;
			$semua=mysql_query("SELECT * FROM ".$DB_KODE."_materi, ".$DB_KODE."_mapel, ".$DB_KODE."_guru_staff 
			WHERE ".$DB_KODE."_materi.id_mapel=".$DB_KODE."_mapel.id_mapel AND ".$DB_KODE."_materi.nip=".$DB_KODE."_guru_staff.nip 
			AND judul_materi LIKE '%$cari%' ORDER BY id_materi DESC");
			$hitung=mysql_num_rows($semua);
			
			if ($hitung > 0){
			while($sm=mysql_fetch_array($semua)){
				global $ns;
							$mapel = strtolower(preg_replace("/\s/","9a9z9",$sm['nama_mapel']));						
							$mapel = preg_replace('#\W#', '', $mapel);								
							$mapel = str_replace("9a9z9","-",$mapel);
							$url_mapel = "materi-pelajaran-".$sm['id_mapel']."-".$mapel.".html";
							
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
				<td class="garis"><a href="<?php  echo $url_mapel;?>"><?php  echo $sm['nama_mapel']?></a></td>
				<td class="garis"><i><a href="<?php  echo $url_guru;?>"><?php  echo $sm['nama_gurustaff']?></a></i></td>
				<td class="garis"><?php  echo $sm['tanggal_upload']?></td>
				
			</tr>
			<?php  $no++; }}
			else {?>
			<tr><td colspan="5"><b>Materi Tidak Ditemukan</b></td></tr>
			<?php  } ?>
		</table>
		
				<div id="pageNavPosition"></div>
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 25); 
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
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

