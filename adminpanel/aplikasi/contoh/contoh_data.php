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



$database="aplikasi/contoh/contoh.php";
switch($_GET['pilih']){
default: ?>
<h3>Contoh</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
<?php 			include "aplikasi/contoh/header.php"; ?>
		</div>

		
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?t=<?php echo $token; ?>&pilih=input';">
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
				$contoh=mysql_query("SELECT * FROM ".$DB_KODE."_contoh ORDER BY id_contoh ASC");
				while ($m=mysql_fetch_array($contoh)){
				?>
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<td class="tabel"><a href="<?php    echo "?t=".$token."&pilih=output&id=$m[id_contoh]";?>"><?php    echo "$m[nama_contoh]";?></a></td>
				<td class="tabel">
					<?php     echo "$m[deskripsi_contoh]";?>
				</td>
				<?php     $materi=mysql_query("SELECT * FROM ".$DB_KODE."_pbm WHERE contoh_pbm='$m[id_contoh]'");
						$jmlmateri=mysql_num_rows($materi); ?>
				<td class="tabel"><?php    echo "<a href=''>$jmlmateri</a>"; ?></td>
				<td class="tabel">
				<?php    
				if ($m[id_contoh]== 1) {
				?>
					<div class="outputdata"><a href="<?php    echo "?t=".$token."&pilih=output&id=$m[id_contoh]";?>">output</a></div>
				<?php     }
				else {
				?>
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=contoh&untukdi=hapus&id=$m[id_contoh]";?>">hapus</a></div>
					<div class="outputdata"><a href="<?php    echo "?t=".$token."&pilih=output&id=$m[id_contoh]";?>">output</a></div>
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
		
		case "input":
			include "aplikasi/contoh/contoh_input.php";
		break;
		
		case "output":
			include "aplikasi/contoh/contoh_output.php";
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

