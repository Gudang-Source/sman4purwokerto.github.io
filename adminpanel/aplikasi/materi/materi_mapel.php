<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

if (!isset($_SESSION['adminsh']))
{
	gogo('../../index.php');
	exit;
}
else{ 
?>


<h3>Materi Pelajaran (E-learning)</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">


<?php 			include "aplikasi/materi/header.php"; ?>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php    
			$datamateri=mysql_query("SELECT * FROM ".$DB_KODE."_materi");
			$jmlmateri=mysql_num_rows($datamateri);
			?>
			Jumlah data (<?php    echo "$jmlmateri";?>)
			</div>
			<div class="cari">
			<form method="POST" action="?t=<?php echo $token; ?>&pilih=pencarian">
			<input type="text" class="pencarian" name="cari"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<form method="POST" style="float: left" action="materi.php?t=<?php echo $token; ?>&pilih=mapel">
				<select name="mapel"onChange="this.form.submit()">
					<option value="" selected>Mata pelajaran</option>
					<?php    
					$mapel=mysql_query("SELECT * FROM ".$DB_KODE."_mapel");
					while($mpl=mysql_fetch_array($mapel)){
					?>
					<option value="<?php    echo "$mpl[id_mapel]";?>"><?php    echo "$mpl[nama_mapel]";?></option>
					<?php     } ?>
				</select>
			</form>
			</div>
			
			<?php     echo"<form method='POST' action='$database?t=$token&pilih=materi&untukdi=hapusbanyak'>";?>
			<div class="cari">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?t=<?php echo $token; ?>&pilih=tambah';">
			<input type="submit" class="hapus" value="Hapus yang ditandai">
			</div>
		</div>
		<div class="clear"></div>
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" width="25px">&nbsp;</th>
				<th class="tabel">Judul Materi</th>
				<th class="tabel"><?php echo $_SESSION['Bguru']; ?> Pengampu</th>
				<th class="tabel">Mata pelajaran</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php    
			$no=1;
			$materi=mysql_query("SELECT * FROM ".$DB_KODE."_materi, ".$DB_KODE."_mapel WHERE ".$DB_KODE."_materi.id_mapel=".$DB_KODE."_mapel.id_mapel AND ".$DB_KODE."_materi.id_mapel='$_POST[mapel]' ORDER BY id_materi DESC");
			$cek_materi=mysql_num_rows($materi);
			
			if($cek_materi > 0){
			while($m=mysql_fetch_array($materi)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<td class="tabel"><?php    echo "<input type=checkbox name=cek[] value=$m[id_materi] id=id$no>"; ?></td>
				<td class="tabel"><?php    echo "<b>$m[judul_materi]</b>&nbsp;($m[download])";?><br><small><?php    echo "$m[tanggal_upload]";?></small></td>
				<td class="tabel"><a href=""><?php   
				$namaguru=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE nip='$m[nip]'");
				$ng=mysql_fetch_array($namaguru);
				echo "<a href='guru_staff.php?t=$token&pilih=edit&id=$ng[id_gurustaff]'><b>$ng[nama_gurustaff]";?>
				</b></a></td>
				<td class="tabel"><a href="<?php    echo "mata_pelajaran.php?t=$token&pilih=edit&id=$ng[id_mapel]";?>"><?php    echo "$m[nama_mapel]";?></a></td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=materi&untukdi=hapus&id=$m[id_materi]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php    echo"?t=$token&pilih=edit&id=$m[id_materi]";?>">edit</a></div>
					
				</td>
			</tr>
			<?php    
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="8"><b>DATA MATERI PADA <u>
			<?php    
			$nama_mapel=mysql_query("SELECT * FROM ".$DB_KODE."_mapel WHERE id_mapel='$_POST[mapel]'");
			$nm=mysql_fetch_array($nama_mapel);
			echo "$nm[nama_mapel]";
			?></u>
			BELUM TERSEDIA</b></td></tr>
			<?php     }
			?>
		
		</table>
		<div class="atastabel" style="margin: 5px 10px 0 10px">
				<div id="pageNavPosition"></div>
		</div>
		<div class="atastabel" style="margin: 5px 10px 0 10px">
		<?php    
			$jumlahtampil=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='3'");
			$jt=mysql_fetch_array($jumlahtampil);
		?>
			    <script type="text/javascript"><!--
        var pager = new Pager('results',<?php     echo "$jt[isi_pengaturan]"; ?>); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
		</div>
		</form>
</div><!--Akhir class isi kanan-->

<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

}
?>

