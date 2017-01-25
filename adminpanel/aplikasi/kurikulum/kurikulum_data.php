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



$database="aplikasi/kurikulum/kurikulum.php";
switch($_GET['pilih']){
default: ?>

<h3>Kurikulum</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
<?php 			include "aplikasi/kurikulum/header.php"; ?>
		</div>

		
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?t=<?php echo $token; ?>&pilih=tambah';">
			</div>
		</div>
		
		<table class="tabel">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel">Tahun</th>
				<th class="tabel">Deskripsi</th>
				<th class="tabel">Jml Materi</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php    
				$no=1;
				$kurikulum=mysql_query("SELECT * FROM ".$DB_KODE."_kurikulum ORDER BY id_kurikulum ASC");
				while ($m=mysql_fetch_array($kurikulum)){
				?>
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<td class="tabel"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_kurikulum]";?>"><?php    echo "$m[nama_kurikulum]";?></a></td>
				<td class="tabel">
					<?php     echo "$m[deskripsi_kurikulum]";?>
				</td>
				<?php     $materi=mysql_query("SELECT * FROM ".$DB_KODE."_pbm WHERE kurikulum_pbm='$m[id_kurikulum]'");
						$jmlmateri=mysql_num_rows($materi); ?>
				<td class="tabel"><?php    echo "<a href=''>$jmlmateri</a>"; ?></td>
				<td class="tabel">
				<?php    
				if ($m[id_kurikulum]== 1) {
				?>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_kurikulum]";?>">edit</a></div>
				<?php     }
				else {
				?>
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=kurikulum&untukdi=hapus&id=$m[id_kurikulum]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_kurikulum]";?>">edit</a></div>
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
			include "aplikasi/kurikulum/kurikulum_tambah.php";
		break;
		
		case "edit":
			include "aplikasi/kurikulum/kurikulum_edit.php";
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

