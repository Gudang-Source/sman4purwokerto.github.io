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
<h3>Berita</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">

<?php 			include "aplikasi/berita/header.php"; ?>	
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php    
			//Menghitung jumlah total data berita
			if($_SESSION['leveluser']=='0'){
			$berita=mysql_query("SELECT * FROM ".$DB_KODE."_berita");}
			else {
			$berita=mysql_query("SELECT * FROM ".$DB_KODE."_berita WHERE s_username='$_SESSION[adminsh]'");
			}
			$jmltotal=mysql_num_rows($berita);
			
			//Menghitung jumlah data berita yang terbit
			if($_SESSION['leveluser']=='0'){
			$terbit=mysql_query("SELECT * FROM ".$DB_KODE."_berita WHERE status_terbit='1'");}
			else {
			$terbit=mysql_query("SELECT * FROM ".$DB_KODE."_berita WHERE status_terbit='1' AND s_username='$_SESSION[adminsh]'");
			}
			$jmlterbit=mysql_num_rows($terbit);
			
			//Menghitung jumlah data berita konsep
			if($_SESSION['leveluser']=='0'){
			$konsep=mysql_query("SELECT * FROM ".$DB_KODE."_berita WHERE status_terbit='0'");}
			else {
			$konsep=mysql_query("SELECT * FROM ".$DB_KODE."_berita WHERE status_terbit='0' AND s_username='$_SESSION[adminsh]'");
			}
			$jmlkonsep=mysql_num_rows($konsep);
			?>
			<?php     echo "<a href='berita.php?t=$token'>Jumlah data</a>"; ?> (<?php    echo "$jmltotal"; ?>)&nbsp;&nbsp;| 
			<?php     echo "<a href='berita.php?t=$token&pilih=terbit'>Terbit</a>"; ?> (<?php    echo "$jmlterbit"; ?>)&nbsp;&nbsp;| 
			<?php     echo "<a href='berita.php?t=$token&pilih=konsep'>Konsep</a>"; ?> (<?php    echo "$jmlkonsep"; ?>)
			</div>
			
			<!--Form pencarian data berita -->
			<div class="cari">
			<form method="POST" action="berita.php?t=<?php echo $token; ?>&pilih=pencarian">
			<input type="text" name="cari" class="pencarian"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<form method="POST" style="float: left" action="berita.php?t=<?php echo $token; ?>&pilih=kategori">
				<select name="kategori" onChange="this.form.submit()">
					<option value="" selected>Kategori</option>
					<?php    
					$kategori=mysql_query("SELECT * FROM ".$DB_KODE."_kategori");
					while ($k=mysql_fetch_array($kategori)){
					echo "
					<option value='$k[id_kategori]'>$k[nama_kategori]</option>"; }
					?>
				</select>
			</form>
			<?php    
			if($_SESSION['leveluser']=='0'){
			?>
			<form method="POST" style="float: left" action="berita.php?t=<?php echo $token; ?>&pilih=penulis">
				<select name="penulis" onChange="this.form.submit()">
					<option value="" selected>Penulis</option>
					<?php    
					$penulis=mysql_query("SELECT * FROM ".$DB_KODE."_users");
					while ($p=mysql_fetch_array($penulis)){
					echo "
					<option value='$p[s_username]'>$p[nama_lengkap_users]</option>"; }
					?>
				</select>
			</form>
			<?php     } ?>
			</div>
			
			<?php     echo "<form method='POST' action='$database?t=$token&pilih=berita&untukdi=hapusbanyak'>"; ?>
			<div class="cari">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?t=<?php echo $token; ?>&pilih=tambah';">
			<input type="submit" class="hapus" value="Hapus yang di tandai">
			</div>
		</div>
		<div class="clear"></div>
		
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" width="25px">&nbsp;</th>
				<th class="tabel">Judul</th>
				<th class="tabel">Penulis</th>
				<th class="tabel">Tanggal</th>
				<th class="tabel" width="100px">Kategori</th>
				<th class="tabel">Komentar</th>
				<th class="tabel" width="150px">Pilihan</th>
			</tr>
			<?php    
			$cari = trim($_POST['cari']);
			$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
			$no=1;
			if($_SESSION['leveluser']=='0'){
			$databerita=mysql_query("SELECT * FROM ".$DB_KODE."_berita,".$DB_KODE."_users, ".$DB_KODE."_kategori WHERE ".$DB_KODE."_berita.s_username=".$DB_KODE."_users.s_username AND ".$DB_KODE."_berita.id_kategori=".$DB_KODE."_kategori.id_kategori AND judul_berita LIKE '%$cari%' ORDER BY id_berita DESC");
			}
			else {
			$databerita=mysql_query("SELECT * FROM ".$DB_KODE."_berita,".$DB_KODE."_users, ".$DB_KODE."_kategori WHERE ".$DB_KODE."_berita.s_username=".$DB_KODE."_users.s_username AND ".$DB_KODE."_berita.id_kategori=".$DB_KODE."_kategori.id_kategori AND judul_berita LIKE '%$cari%' AND ".$DB_KODE."_berita.s_username='$_SESSION[adminsh]' ORDER BY id_berita DESC");
			}
			$cek_databerita=mysql_num_rows($databerita);
			
			if($cek_databerita > 0){
			while ($db=mysql_fetch_array($databerita)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td><!--Menampilkan nomor baris -->
				<td class="tabel"><?php    echo "<input type=checkbox name=cek[] value=$db[id_berita] id=id$no>"; ?></td><!--Menampilkan checkbox-->
				<?php     if ($db[status_terbit]==1) { ?>
				<td class="tabel"><b><?php    echo "$db[judul_berita]";?></b></td><!--Menampilkan judul berita -->
				<?php     }
				else { ?>
				<td class="tabel"><font style="color: #799e57;"><b><?php    echo "$db[judul_berita]";?></b></font></td><!--Menampilkan judul berita -->
				<?php     } ?>
				<td class="tabel"><a href=""><?php    echo "$db[nama_lengkap_users]";?></a></td><!--Menampilkan penulis -->
				<td class="tabel"><?php    echo "$db[tanggal_posting]";?></td><!--Menampilkan tanggal posting -->
				<td class="tabel"><?php    echo "<a href=''>$db[nama_kategori]</a>";?></td><!--Menampilkan kategori -->
				
				<td class="tabel">
				<?php    
				$komentarberita=mysql_query("SELECT * FROM ".$DB_KODE."_komentar WHERE id_berita='$db[id_berita]'");
				$jmlkomentar=mysql_num_rows($komentarberita);
				echo "<a href=''>$jmlkomentar</a>";
				?>
				</td><!--Menampilkan jumlah komentar -->
				
				<td class="tabel" width="150px">
					<div class="hapusdata">
					<a href="<?php    echo "$database?t=$token&pilih=berita&untukdi=hapus&id=$db[id_berita]";?>">hapus</a>
					</div>
					
					<div class="editdata">
					<a href="<?php    echo "?t=$token&pilih=edit&id=$db[id_berita]";?>">edit</a>
					</div>
					
					<!--apabila status berita 0 atau tidak terbit maka akan tampil tombol dibawah ini-->
					<?php     
					if ($db[status_terbit]==0){
					?>
					<div class="terbitdata">
					<a href="<?php    echo "$database?t=$token&pilih=berita&untukdi=terbitkan&id=$db[id_berita]";?>">terbitkan</a>
					</div>
					
					<!--apabila status berita 1 atau terbit maka akan tampil tombol dibawah ini-->
					<?php     }
					else { ?>
					<div class="bataldata">
					<a href="<?php    echo "$database?t=$token&pilih=berita&untukdi=batalkan&id=$db[id_berita]";?>">batalkan</a>
					</div>
					<?php     }?>
				</td>
			</tr>
			<?php    
			$no++;
			} }
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="8"><b>DATA BERITA DENGAN KATA KUNCI <u><?php    echo "$cari";?></u> TIDAK DITEMUKAN</b></td></tr>
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