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



$database="aplikasi/jurusan/jurusan.php";
switch($_GET['pilih']){
default: ?>
<h3>Jurusan</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">

<?php 			include "aplikasi/jurusan/header.php"; ?>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php     $datajurusan=mysql_query("SELECT * FROM ".$DB_KODE."_jurusan");
					$jml=mysql_num_rows($datajurusan); ?>
			Jumlah data (<?php    echo "$jml";?>)
			</div>
			<div class="cari">
			</div>
		</div>
		<?php     echo "<form method='POST' action='$database?t=$token&pilih=jurusan&untukdi=hapusbanyak'>"; ?>
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
				<th class="tabel">Nama Jurusan</th>
				<th class="tabel">Keterangan Jurusan</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php    
				$no=1;
				$jurusan=mysql_query("SELECT * FROM ".$DB_KODE."_jurusan ORDER BY id_jurusan ASC");
				while($k=mysql_fetch_array($jurusan)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<?php     if ($k[id_jurusan]== 1) { ?>
				<td class="tabel"></td>
				<?php     }
				else { ?>
				<td class="tabel"><?php    echo "<input type=checkbox name=cek[] value=$k[id_jurusan] id=id$no>"; ?></td>
				<?php     } ?>
				
				<td class="tabel"><a href="<?php    echo "?t=$token&pilih=edit&id=$k[id_jurusan]";?>"><b><?php    echo "$k[nama_jurusan]";?></b></a></td>
				<td class="tabel"><b><?php    echo "$k[deskripsi_jurusan]";?></b></td>

				<td class="tabel">
					<?php     if ($k[id_jurusan]== 1) { ?>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$k[id_jurusan]";?>">edit</a></div>
					<?php     }
					else { ?>
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=jurusan&untukdi=hapus&id=$k[id_jurusan]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$k[id_jurusan]";?>">edit</a></div>
					<?php     } ?>
				</td>
			</tr>
			<?php    
			$no++;
			}
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
			include "aplikasi/jurusan/jurusan_tambah.php";
		break;
		
		case "edit":
			include "aplikasi/jurusan/jurusan_edit.php";
		break;
		
		case "pencarian":
			include "aplikasi/jurusan/jurusan_pencarian.php";
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

