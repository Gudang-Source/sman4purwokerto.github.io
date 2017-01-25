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


$database="aplikasi/jabatan/jabatan.php";
switch($_GET['pilih']){
default: ?>
<h3>Jabatan</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">

<?php 			include "aplikasi/jabatan/header.php"; ?>
		</div>

		
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?t=<?php echo $token; ?>&pilih=tambah';">
			</div>
		</div>
		
		<table class="tabel">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel">Nama Jabatan</th>
				<th class="tabel">Deskripsi</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php     	$no=1;
					$jabatan=mysql_query("SELECT * FROM ".$DB_KODE."_jabatan ORDER BY id_jabatan ASC");
					while ($jb=mysql_fetch_array($jabatan)){ ?>
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<td class="tabel"><a href="<?php    echo "?t=$token&pilih=edit&id=$jb[id_jabatan]";?>"><b><?php    echo "$jb[nama_jabatan]";?></b></a></td>
				<td class="tabel"><?php    echo "$jb[deskripsi_jabatan]";?></td>
				<td class="tabel">
				<?php    
				if ($jb[id_jabatan]== 1){
				?>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$jb[id_jabatan]";?>">edit</a></div>
				<?php     }
				else {
				?>
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=jabatan&untukdi=hapus&id=$jb[id_jabatan]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$jb[id_jabatan]";?>">edit</a></div>
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
			include "aplikasi/jabatan/jabatan_tambah.php";
		break;
		
		case "edit":
			include "aplikasi/jabatan/jabatan_edit.php";
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

