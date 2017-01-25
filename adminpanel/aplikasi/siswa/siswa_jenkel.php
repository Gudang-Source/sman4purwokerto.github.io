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
?>


<h3><?php echo $_SESSION['Bsiswa']; ?></h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">

<?php 			include "aplikasi/siswa/header.php"; ?>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php    
				$datasiswa=mysql_query("SELECT * FROM ".$DB_KODE."_siswa WHERE status_siswa='1'");
				$jumlahsiswa=mysql_num_rows($datasiswa);
				
				$siswalaki=mysql_query("SELECT * FROM ".$DB_KODE."_siswa WHERE status_siswa='1' AND jenkel='L'");
				$jumlahlaki=mysql_num_rows($siswalaki);
				
				$siswaperempuan=mysql_query("SELECT * FROM ".$DB_KODE."_siswa WHERE status_siswa='1' AND jenkel='P'");
				$jumlahperempuan=mysql_num_rows($siswaperempuan);
			?>
			<a href="siswa.php?t=<?php echo $token; ?>">Jumlah data</a> (<?php    echo "$jumlahsiswa";?>)&nbsp;&nbsp;|
			<a href="<?php    echo "?t=".$token."&pilih=jenkel&kode=L";?>">Laki-Laki</a> (<?php    echo "$jumlahlaki";?>)&nbsp;&nbsp;|
			<a href="<?php    echo "?t=".$token."&pilih=jenkel&kode=P";?>">Perempuan</a> (<?php    echo "$jumlahperempuan";?>)
			</div>
			<div class="cari">
			<form method="POST" action="?t=<?php echo $token; ?>&pilih=pencarian">
			<input type="text" class="pencarian" name="cari"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<form method="POST" style="float: left" action="siswa.php?t=<?php echo $token; ?>&pilih=kelas">
				<select name="kelas" onChange="this.form.submit()">
					<option value="" selected>Tampil Berdasarkan Kelas</option>
					<?php    
					$tampilkelas=mysql_query("SELECT * FROM ".$DB_KODE."_kelas");
					while($tk=mysql_fetch_array($tampilkelas)){
					echo "<option value='$tk[id_kelas]'>$tk[nama_kelas]</option>";}
					?>
				</select>
			</form>
			</div>
			
			<?php     echo "<form method='POST' action='$database?t=$token&pilih=siswa&untukdi=hapusbanyak'>"; ?>
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
				<th class="tabel"><?php echo $_SESSION['Bsiswa']; ?></th>
				<th class="tabel">NIS</th>
				<th class="tabel">JK</th>
				<th class="tabel">Kelas</th>
				<th class="tabel">Nama Orang Tua</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php    
				$no=1;
				$siswa=mysql_query("SELECT * FROM ".$DB_KODE."_siswa,".$DB_KODE."_kelas WHERE ".$DB_KODE."_siswa.id_kelas=".$DB_KODE."_kelas.id_kelas AND status_siswa='1' AND jenkel='$_GET[kode]'ORDER BY nama_siswa ASC");
				$cek_siswa=mysql_num_rows($siswa);
				
				if($cek_siswa > 0){
				while($s=mysql_fetch_array($siswa)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<td class="tabel"><?php    echo "<input type=checkbox name=cek[] value=$s[id_siswa] id=id$no>"; ?></td>
				<td class="tabel"><a href=""><b><?php    echo "$s[nama_siswa]";?></b></a></td>
				<td class="tabel"><?php    echo "$s[nis]";?></td>
				<td class="tabel"><?php    echo "$s[jenkel]";?></td>
				<td class="tabel"><a href=""><?php    echo "$s[nama_kelas]";?></a></td>
				<td class="tabel"><?php    echo "$s[nama_ortu]";?></td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=jenkel&untukdi=hapus&id=$s[id_siswa]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php    echo"?t=$token&pilih=edit&id=$s[id_siswa]";?>">edit</a></div>
				</td>
			</tr>
			<?php    
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="8"><b>DATA<?php echo $_SESSION['Bsiswa']; ?> <u>
			<?php    
			if ($_GET[kode]=='L') { echo "Laki-laki"; }
			else { echo "Perempuan"; }
			?></u>
			BELUM TERSEDIA</b></td></tr>
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
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

