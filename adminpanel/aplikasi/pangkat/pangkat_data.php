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


$database="aplikasi/pangkat/pangkat.php";
switch($_GET['pilih']){
default: ?>
<h3>Pangkat</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">

<?php 			include "aplikasi/pangkat/header.php"; ?>
		</div>

		
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?t=<?php echo $token; ?>&pilih=tambah';">
			</div>
		</div>
		
		<table class="tabel">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel">Nama Pangkat</th>
				<th class="tabel">Golongan/Ruang</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php     	$no=1;
					$pangkat=mysql_query("SELECT * FROM ".$DB_KODE."_pangkat ORDER BY id_pangkat ASC");
					while ($jb=mysql_fetch_array($pangkat)){ ?>
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<td class="tabel"><a href="<?php    echo "?t=$token&pilih=edit&id=$jb[id_pangkat]";?>"><b><?php    echo "$jb[nama_pangkat]";?></b></a></td>
				<td class="tabel"><?php    echo "$jb[golongan_pangkat]";?>/<?php    echo "$jb[ruang_pangkat]";?></td>
				<td class="tabel">
				<?php    
				if ($jb[id_pangkat]== 1){
				?>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$jb[id_pangkat]";?>">edit</a></div>
				<?php     }
				else {
				?>
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=pangkat&untukdi=hapus&id=$jb[id_pangkat]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$jb[id_pangkat]";?>">edit</a></div>
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
			include "aplikasi/pangkat/pangkat_tambah.php";
		break;
		
		case "edit":
			include "aplikasi/pangkat/pangkat_edit.php";
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

