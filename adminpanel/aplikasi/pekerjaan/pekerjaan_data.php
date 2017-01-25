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



$database="aplikasi/pekerjaan/pekerjaan.php";
switch($_GET['pilih']){
default: ?>
<h3>Contoh</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
<?php 			include "aplikasi/pekerjaan/header.php"; ?>
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
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php    
				$no=1;
				$pekerjaan=mysql_query("SELECT * FROM ".$DB_KODE."_pekerjaan ORDER BY id_pekerjaan ASC");
				while ($m=mysql_fetch_array($pekerjaan)){
				?>
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<td class="tabel"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_pekerjaan]";?>"><?php    echo "$m[nama_pekerjaan]";?></a></td>
				<td class="tabel">
					<?php     echo "$m[deskripsi_pekerjaan]";?>
				</td>

				<td class="tabel">
				<?php    
				if ($m[id_pekerjaan]== 1) {
				?>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_pekerjaan]";?>">edit</a></div>
				<?php     }
				else {
				?>
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=pekerjaan&untukdi=hapus&id=$m[id_pekerjaan]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_pekerjaan]";?>">edit</a></div>
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
			include "aplikasi/pekerjaan/pekerjaan_tambah.php";
		break;
		
		case "edit":
			include "aplikasi/pekerjaan/pekerjaan_edit.php";
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

