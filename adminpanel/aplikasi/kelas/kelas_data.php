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



$database="aplikasi/kelas/kelas.php";
switch($_GET['pilih']){
default: ?>
<h3>Kelas</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
<?php 			include "aplikasi/kelas/header.php"; ?>
		</div>	

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php     $datakelas=mysql_query("SELECT * FROM ".$DB_KODE."_kelas");
					$jml=mysql_num_rows($datakelas); ?>
			Jumlah data (<?php    echo "$jml";?>)
			</div>
			<div class="cari">
			</div>
		</div>
		<?php     echo "<form method='POST' action='$database?t=$token&pilih=kelas&untukdi=hapusbanyak'>"; ?>
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
				<th class="tabel">Nama Kelas</th>
				<th class="tabel">Wali Kelas</th>
				<th class="tabel">Laki-Laki</th>
				<th class="tabel">Perempuan</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php    
				$no=1;
				$kelas=mysql_query("SELECT * FROM ".$DB_KODE."_kelas ORDER BY id_kelas ASC");
				while($k=mysql_fetch_array($kelas)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<?php     if ($k[id_kelas]== 1) { ?>
				<td class="tabel"></td>
				<?php     }
				else { ?>
				<td class="tabel"><?php    echo "<input type=checkbox name=cek[] value=$k[id_kelas] id=id$no>"; ?></td>
				<?php     } ?>
				<td class="tabel"><a href="<?php    echo "?t=$token&pilih=edit&id=$k[id_kelas]";?>"><b><?php    echo "$k[nama_kelas]";?></b></a></td>
				<td class="tabel"><a href=""><b>
					<?php    
					$wali=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE nip=$k[wali_kelas] ");
					$w=mysql_fetch_array($wali);	
					echo "$w[nama_gurustaff]";
					?>
				</b></a></td>
				<td class="tabel"><a href=""><b>
					<?php    
					$siswalaki=mysql_query("SELECT * FROM ".$DB_KODE."_siswa WHERE status_siswa='1' AND jenkel='L' AND id_kelas='$k[id_kelas]'");
					$jmllaki=mysql_num_rows($siswalaki);
					echo "$jmllaki";
					?>
				</b></a></td>
				
				<td class="tabel"><a href=""><b>
					<?php    
					$siswaperempuan=mysql_query("SELECT * FROM ".$DB_KODE."_siswa WHERE status_siswa='1' AND jenkel='P' AND id_kelas='$k[id_kelas]'");
					$jmlperempuan=mysql_num_rows($siswaperempuan);
					echo "$jmlperempuan";
					?>
				</b></a></td>
				<td class="tabel">
					<?php     if ($k[id_kelas]== 1) { ?>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$k[id_kelas]";?>">edit</a></div>
					<?php     }
					else { ?>
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=kelas&untukdi=hapus&id=$k[id_kelas]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$k[id_kelas]";?>">edit</a></div>
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
			include "aplikasi/kelas/kelas_tambah.php";
		break;
		
		case "edit":
			include "aplikasi/kelas/kelas_edit.php";
		break;
		
		case "pencarian":
			include "aplikasi/kelas/kelas_pencarian.php";
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

