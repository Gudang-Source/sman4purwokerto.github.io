<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

if (!isset($_SESSION['adminsh']))
{
	gogo('../../../index.php');
	exit;
}
else{ 
$database="aplikasi/guru/guru.php";
switch($_GET['pilih']){
default: ?>
<h3><?php echo $_SESSION['Bguru']; ?></h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">

<?php 			include "aplikasi/guru/header.php"; ?>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">

			<div class="cari">
			<form method="POST" action="?t=<?php echo $token; ?>&pilih=pencarian">
			<input type="text" class="pencarian" name="cari"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		
		<?php     echo"<form method='POST' action='$database?t=$token&pilih=guru&untukdi=hapusbanyak'>";?>
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?t=<?php echo $token; ?>&pilih=tambah';">
			<input type="submit" class="hapus" value="Hapus yang ditandai">
			</div>
		</div>
		<div class="clear"></div>
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" width="25px">&nbsp;</th>
				<th class="tabel">Nama<?php echo $_SESSION['Bguru']; ?></th>
				<th class="tabel">NIP</th>
				<th class="tabel">Tahun Ajaran / Semester</th>
				<th class="tabel">Mata Pelajaran</th>
				<th class="tabel">Jurusan</th>
				<th class="tabel">Kelas</th>
				<th class="tabel">Jumlah Jam</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php    
			$no=1;
			$guru=mysql_query("SELECT * FROM ".$DB_KODE."_guru_mapel, ".$DB_KODE."_guru_staff,  ".$DB_KODE."_mapel, ".$DB_KODE."_jurusan, ".$DB_KODE."_kelas WHERE ".$DB_KODE."_guru_mapel.id_gurustaff=".$DB_KODE."_guru_staff.id_gurustaff AND ".$DB_KODE."_guru_mapel.id_jurusan=".$DB_KODE."_jurusan.id_jurusan AND ".$DB_KODE."_guru_mapel.id_kelas=".$DB_KODE."_kelas.id_kelas AND ".$DB_KODE."_guru_mapel.id_mapel=".$DB_KODE."_mapel.id_mapel  ORDER BY tahun_ajaran DESC, semester ASC, ".$DB_KODE."_guru_mapel.id_mapel ASC");
			$cek_guru=mysql_num_rows($guru);
			
			if($cek_guru > 0){
			while($g=mysql_fetch_array($guru)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<td class="tabel"><?php    echo "<input type=checkbox name=cek[] value=$g[id_gurustaff] id=id$no>"; ?></td>
				<td class="tabel"><a href="<?php    echo "?t=$token&pilih=edit&id=$g[id_gurumapel]";?>"><b><?php    echo "$g[nama_gurustaff]";?></b></a></td>
				<td class="tabel"><?php    echo "$g[nip]";?></td>
			<?php     if ($g[semester]=='1'){ 
			$smt="Gasal";
			}else { 
			$smt="Genap";
			}
			?>				
				<td class="tabel"><?php    echo "$g[tahun_ajaran]";?> /<?php    echo $smt;?></td>
				<td class="tabel"><a href="<?php    echo "mata_pelajaran.php?t=$token&pilih=edit&id=$g[id_mapel]";?>"><?php    echo "$g[nama_mapel]";?></a></td>
				<td class="tabel"><?php    echo "$g[nama_jurusan]";?></td>
				<td class="tabel"><?php    echo "$g[nama_kelas]";?></td>
				<td class="tabel"><?php    echo "$g[jumlah_jam]";?></td>								
				<td class="tabel">
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=guru&untukdi=hapus&id=$g[id_gurumapel]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$g[id_gurumapel]";?>">edit</a></div>
				</td>
			</tr>
			<?php    
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="8"><b>DATA MATA PELAJARAN GURU BELUM TERSEDIA</b></td></tr>
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
		<?php     break;
		
		case "tambah":
			include "aplikasi/guru/guru_tambah.php";
		break;
		
		case "edit":
			include "aplikasi/guru/guru_edit.php";
		break;
		
		case "jenkel":
			include "aplikasi/guru/guru_jenkel.php";
		break;
		
		case "pencarian":
			include "aplikasi/guru/guru_pencarian.php";
		}
		?>
<?php   }
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>	