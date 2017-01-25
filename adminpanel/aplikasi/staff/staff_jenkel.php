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


<h3>Data Induk Pegawai</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
<?php 			include "aplikasi/staff/header.php"; ?>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php    
			$datastaff=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE posisi='staff'");
			$jmlstaff=mysql_num_rows($datastaff);
			
			$stafflaki=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE posisi='staff' AND jenkel='L'");
			$jmllaki=mysql_num_rows($stafflaki);
			
			$staffperempuan=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE posisi='staff' AND jenkel='P'");
			$jmlperempuan=mysql_num_rows($staffperempuan);
			?>
			<a href="staff.php?t=<?php echo $token; ?>">Jumlah data</a> (<?php    echo "$jmlstaff";?>)&nbsp;&nbsp;|
			<a href="<?php    echo "?t=".$token."&pilih=jenkel&kode=L";?>">Laki-laki</a> (<?php    echo "$jmllaki";?>)&nbsp;&nbsp;|
			<a href="<?php    echo "?t=".$token."&pilih=jenkel&kode=P";?>">Perempuan</a> (<?php    echo "$jmlperempuan";?>)
			</div>
			<div class="cari">
			<form method="POST" action="?t=<?php echo $token; ?>&pilih=pencarian">
			<input type="text" class="pencarian" name="cari"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		
		<?php    
			if ($_GET[kode]=='L'){
			echo"<form method='POST' action='$database?t=$token&pilih=laki&untukdi=hapusbanyak'>";}
			else {
			echo"<form method='POST' action='$database?t=$token&pilih=perempuan&untukdi=hapusbanyak'>";
			}
			?>
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
				<th class="tabel">Nama<?php echo $_SESSION['Bguru']; ?> / Staff</th>
				<th class="tabel">NIP</th>
				<th class="tabel">JK</th>
				<th class="tabel">Jabatan</th>
				<th class="tabel">Telepon</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php    
			$no=1;
			$staff=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff, ".$DB_KODE."_jabatan WHERE ".$DB_KODE."_guru_staff.id_jabatan=".$DB_KODE."_jabatan.id_jabatan AND jenkel='$_GET[kode]' AND posisi='staff' ORDER BY id_gurustaff DESC");
			$cek_staff=mysql_num_rows($staff);
			
			if($cek_staff > 0){
			while($s=mysql_fetch_array($staff)){
			?>
			
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<td class="tabel"><?php    echo "<input type=checkbox name=cek[] value=$s[id_gurustaff] id=id$no>"; ?></td>
				<td class="tabel"><a href=""><b><?php    echo "$s[nama_gurustaff]";?></b></a></td>
				<td class="tabel"><?php    echo "$s[nip]";?></td>
				<td class="tabel"><?php    echo "$s[jenkel]";?></td>
				<td class="tabel"><a href=""><?php    echo "$s[nama_jabatan]";?></a></td>
				<td class="tabel"><?php    echo "$s[telepon]";?></td>
				<td class="tabel">
					
					<?php     if ($_GET[kode]=='L'){ ?>
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=laki&untukdi=hapus&id=$s[id_gurustaff]";?>">hapus</a></div>
					<?php     }
					else { ?>
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=perempuan&untukdi=hapus&id=$s[id_gurustaff]";?>">hapus</a></div>
					<?php     }?>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$s[id_gurustaff]";?>">edit</a></div>
				</td>
			</tr>
			<?php    
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="8"><b>DATA PEGAWAI  <u>
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

