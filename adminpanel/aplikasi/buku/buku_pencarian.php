<?php   
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
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
?>
<h3>Buku Tamu</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulbox">Data Buku Tamu</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php    
			$totaltamu=mysql_query("SELECT * FROM ".$DB_KODE."_buku_tamu");
			$jumlahtotal=mysql_num_rows($totaltamu);
			
			$totalterima=mysql_query("SELECT * FROM ".$DB_KODE."_buku_tamu WHERE status='1'");
			$jumlahterima=mysql_num_rows($totalterima);
			
			$totaltolak=mysql_query("SELECT * FROM ".$DB_KODE."_buku_tamu WHERE status='0'");
			$jumlahtolak=mysql_num_rows($totaltolak);
			?>
			<a href="buku_tamu.php?t=<?php echo $token; ?>">Jumlah data</a> (<?php    echo "$jumlahtotal";?>)&nbsp;&nbsp;|
			<a href="?t=<?php echo $token; ?>&pilih=terima">Diterima</a> (<?php    echo "$jumlahterima";?>)&nbsp;&nbsp;|
			<a href="?t=<?php echo $token; ?>&pilih=tolak">Ditolak</a> (<?php    echo "$jumlahtolak";?>)
			
			</div>
			<div class="cari">
			<form method="POST" action="?t=<?php echo $token; ?>&pilih=pencarian">
			<input type="text" class="pencarian" name="cari"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		
		<?php     echo "<form method='POST' action='$database?t=$token&pilih=bukutamu&untukdi=hapusbanyak'>"; ?>
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
				<th class="tabel" width="125px">Nama</th>
				<th class="tabel">Tanggal</th>
				<th class="tabel">Subjek</th>
				<th class="tabel" width="150px">Pilihan</th>
			</tr>
			<?php    
			$cari = trim($_POST['cari']);
			$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
				$no=1;
				$bukutamu=mysql_query("SELECT * FROM ".$DB_KODE."_buku_tamu WHERE nama_bukutamu LIKE '%$cari%' ORDER BY id_bukutamu DESC");
				$cek_bukutamu=mysql_num_rows($bukutamu);
				
				if($cek_bukutamu > 0){
				while($b=mysql_fetch_array($bukutamu)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<td class="tabel"><?php    echo "<input type=checkbox name=cek[] value=$b[id_bukutamu] id=id$no>"; ?></td>
				<td class="tabel"><a href="<?php    echo "?t=$token&pilih=edit&id=$b[id_bukutamu]";?>"><b><?php    echo "$b[nama_bukutamu]";?></b></a></td>
				<td class="tabel"><?php    echo "$b[tanggal_kirim]";?></td>
				<td class="tabel"><?php    echo "$b[subjek]";?></td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=bukutamu&untukdi=hapus&id=$b[id_bukutamu]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$b[id_bukutamu]";?>">edit</a></div>
					<?php     if($b[status]=='1'){ ?>
					<div class="bataldata"><a href="<?php    echo "$database?t=$token&pilih=bukutamu&untukdi=tolak&id=$b[id_bukutamu]";?>">tolak</a></div>
					<?php     }
					else { ?>
					<div class="terbitdata"><a href="<?php    echo "$database?t=$token&pilih=bukutamu&untukdi=terima&id=$b[id_bukutamu]";?>">terima</a></div>
					<?php     } ?>
				</td>
			</tr>
			<?php    
			$no++;
			} }
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="6"><b>NAMA TAMU DENGAN KATE KUNCI <u><?php    echo "$cari";?></u> TIDAK DITEMUKAN</b></td></tr>
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

<?php   }
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>