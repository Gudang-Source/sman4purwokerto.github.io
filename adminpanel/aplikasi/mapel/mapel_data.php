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



$database="aplikasi/mapel/mapel.php";
switch($_GET['pilih']){
default: ?>
<h3>Mata Pelajaran</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
<?php 			include "aplikasi/mapel/header.php"; ?>
		</div>								


		
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?t=<?php echo $token; ?>&pilih=tambah';">
			</div>
		</div>
		
		<table class="tabel">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel">Mata Pelajaran</th>
				<th class="tabel"><?php echo $_SESSION['Bguru']; ?> Pengampu</th>
				<th class="tabel">Jml Materi</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php    
				$no=1;
				$mapel=mysql_query("SELECT * FROM ".$DB_KODE."_mapel ORDER BY id_mapel ASC");
				while ($m=mysql_fetch_array($mapel)){
				?>
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<td class="tabel"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_mapel]";?>"><?php    echo "$m[nama_mapel]";?></a></td>
				<td class="tabel">
				<?php     $pengajar=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE id_mapel='$m[id_mapel]'");
						while ($p=mysql_fetch_array($pengajar)){
						echo "<a href='guru_staff.php?t=$token&pilih=edit&id=$p[id_gurustaff]'><b>$p[nama_gurustaff]</b></a><br> "; }
				?>
				</td>
				<?php     $materi=mysql_query("SELECT * FROM ".$DB_KODE."_pbm WHERE mapel_pbm='$m[id_mapel]'");
						$jmlmateri=mysql_num_rows($materi); ?>
				<td class="tabel"><?php    echo "<a href=''>$jmlmateri</a>"; ?></td>
				<td class="tabel">
				<?php    
				if ($m[id_mapel]== 1) {
				?>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_mapel]";?>">edit</a></div>
				<?php     }
				else {
				?>
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=mapel&untukdi=hapus&id=$m[id_mapel]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_mapel]";?>">edit</a></div>
				<?php     } ?>	
				</td>
			</tr>
			<?php    
			$no++;
			}
			?>
			
		</table>
		
</div><!--Akhir class isi kanan-->
		<?php     break;
		
		case "tambah":
			include "aplikasi/mapel/mapel_tambah.php";
		break;
		
		case "edit":
			include "aplikasi/mapel/mapel_edit.php";
		}
		?>
	

<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

}
?>

