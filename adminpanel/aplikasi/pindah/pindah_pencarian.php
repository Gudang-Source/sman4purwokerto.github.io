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

<h3>Pindah Keluar<?php echo $_SESSION['Bsekolah']; ?></h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">

<?php 			include "aplikasi/pindah/header.php"; ?>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php    
			$datapindah=mysql_query("SELECT * FROM ".$DB_KODE."_siswa WHERE status_siswa='3'");
			$jumlahpindah=mysql_num_rows($datapindah);
			
			$pindahlaki=mysql_query("SELECT * FROM ".$DB_KODE."_siswa WHERE status_siswa='3' AND jenkel='L'");
			$jumlahlaki=mysql_num_rows($pindahlaki);
			
			$pindahperempuan=mysql_query("SELECT * FROM ".$DB_KODE."_siswa WHERE status_siswa='3' AND jenkel='P'");
			$jumlahperempuan=mysql_num_rows($pindahperempuan);
			
			?>
			<a href="pindah.php?t=<?php echo $token; ?>">Jumlah data</a> (<?php    echo"$jumlahpindah";?>)&nbsp;&nbsp;|
			<a href="<?php    echo"pindah.php?t=".$token."&pilih=jenkel&kode=L";?>">Laki-Laki</a> (<?php    echo"$jumlahlaki";?>)&nbsp;&nbsp;|
			<a href="<?php    echo"pindah.php?t=".$token."&pilih=jenkel&kode=P";?>">Perempuan</a> (<?php    echo"$jumlahperempuan";?>)
			</div>
			<div class="cari">
			<form method="POST" action="?t=<?php echo $token; ?>&pilih=pencarian">
			<input type="text" class="pencarian" name="cari"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<form method="POST" style="float: left" action="pindah.php?t=<?php echo $token; ?>&pilih=tahun">
				<select name="tahun"onChange="this.form.submit()">
					<option value="" selected>Tampil Berdasarkan Tahun</option>
					<?php    
					$tahun_lulus=mysql_query("SELECT * FROM ".$DB_KODE."_siswa WHERE status_siswa='3' ORDER BY tahun_lulus");
					while($tl=mysql_fetch_array($tahun_lulus)){
					?>
					<option value="<?php    echo "$tl[tahun_lulus]";?>"><?php    echo "$tl[tahun_lulus]";?></option>
					<?php     } ?>
				</select>
			</form>
			</div>
			
		<?php     echo"<form method='POST' action='$database?t=$token&pilih=pindah&untukdi=hapusbanyak'>";?>
			<div class="cari">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?t=<?php echo $token; ?>&pilih=tambah';">
			<input type="submit" class="hapus" value="Hapus yang ditandai">
			</div>
		</div>
		<div class="clear"></div>
		
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" width="25px">&nbsp;</th>
				<th class="tabel">Nama</th>
				<th class="tabel">Tahun</th>
				<th class="tabel">JK</th>
				<th class="tabel">Keterangan Pindah/Keluar</th>
				<th class="tabel">Telepon</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php    
			$cari = trim($_POST['cari']);
			$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
			$no=1;
			$pindah=mysql_query("SELECT * FROM ".$DB_KODE."_siswa WHERE nama_siswa LIKE '%$cari%' AND status_siswa='3' ORDER BY nama_siswa");
			$cek_pindah=mysql_num_rows($pindah);
			
			if($cek_pindah > 0){
			while($a=mysql_fetch_array($pindah)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php    echo"$no";?></td>
				<td class="tabel"><?php    echo "<input type=checkbox name=cek[] value=$a[id_siswa] id=id$no>"; ?></td>
				<td class="tabel"><a href=""><b><?php    echo"$a[nama_siswa]";?></b></a></td>
				<td class="tabel"><?php    echo"$a[tahun_lulus]";?></td>
				<td class="tabel"><?php    echo"$a[jenkel]";?></td>
				<td class="tabel"><?php    echo"$a[pekerjaan_sekarang]";?></td>
				<td class="tabel"><?php    echo"$a[telepon]";?></td>

				<td class="tabel">
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=pindah&untukdi=hapus&id=$a[id_siswa]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php    echo"?t=$token&pilih=edit&id=$a[id_siswa]";?>">edit</a></div>
				</td>
			</tr>
			<?php    
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="8"><b>DATA ALUMNI DENGAN KATA KUNCI <u><?php    echo $cari?></u> TIDAK DITEMUKAN</b></td></tr>
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


<?php   
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
}?>