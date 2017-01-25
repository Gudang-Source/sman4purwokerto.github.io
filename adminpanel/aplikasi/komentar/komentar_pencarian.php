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

<h3>Komentar (Ditolak)</h3>
<div class="isikanan"><!--Awal class isi kanan-->
		<div class="judulisikanan">
<?php 			include "aplikasi/komentar/header.php"; ?>	
		</div>
		
		<div class="atastabel" style="margin: 30px 10px 0 10px">
		<?php    
		if($_SESSION[leveluser]=='0'){
		$komentar =mysql_query("SELECT * FROM ".$DB_KODE."_komentar");}
		else {
		$komentar =mysql_query("SELECT * FROM ".$DB_KODE."_komentar, ".$DB_KODE."_berita WHERE ".$DB_KODE."_komentar.id_berita=".$DB_KODE."_berita.id_berita AND ".$DB_KODE."_berita.s_username='$_SESSION[adminsh]'");
		}
		$jmltotal=mysql_num_rows($komentar);
		
		if($_SESSION[leveluser]=='0'){
		$komentarterima=mysql_query("SELECT * FROM ".$DB_KODE."_komentar WHERE status_terima='1'");}
		else {
		$komentarterima=mysql_query("SELECT * FROM ".$DB_KODE."_komentar, ".$DB_KODE."_berita WHERE ".$DB_KODE."_komentar.id_berita=".$DB_KODE."_berita.id_berita AND ".$DB_KODE."_berita.s_username='$_SESSION[adminsh]' AND status_terima='1'");
		}
		$jmlterima=mysql_num_rows($komentarterima);
		
		if($_SESSION[leveluser]=='0'){
		$komentartolak=mysql_query("SELECT * FROM ".$DB_KODE."_komentar WHERE status_terima='0'");}
		else {
		$komentartolak=mysql_query("SELECT * FROM ".$DB_KODE."_komentar, ".$DB_KODE."_berita WHERE ".$DB_KODE."_komentar.id_berita=".$DB_KODE."_berita.id_berita AND ".$DB_KODE."_berita.s_username='$_SESSION[adminsh]' AND status_terima='0'");
		}
		$jmltolak=mysql_num_rows($komentartolak);
		?>
			<div class="tombol">
			<?php     echo "<a href='komentar.php?t=$token'>Jumlah data</a>"; ?> (<?php    echo "$jmltotal"; ?>)&nbsp;&nbsp;|
			<?php     echo "<a href='komentar.php?t=$token&pilih=diterima'>Diterima</a>"; ?> (<?php    echo "$jmlterima"; ?>)&nbsp;&nbsp;|
			<?php     echo "<a href='komentar.php?t=$token&pilih=ditolak'>Ditolak</a>"; ?> (<?php    echo "$jmltolak"; ?>)
			</div>
			<div class="cari">
			<form method="POST"<?php     echo "action=?t=".$token."&pilih=pencarian";?> >
			<input type="text" class="pencarian" name="cari"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		
		<?php     echo "<form method='POST' action='$database?t=$token&pilih=komentar&untukdi=hapusbanyak'>"; ?>
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?t=<?php echo $token; ?>&pilih=tambah';">
			<input type="submit" class="hapus" value="Hapus yang ditandai">
			</div>
		</div>
		<div class="clear"></div>
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="20px">No</th>
				<th class="tabel" width="15px">&nbsp;</th>
				<th class="tabel">Nama</th>
				<th class="tabel">Tanggal</th>
				<th class="tabel">Jdl. berita</th>
				<th class="tabel">Komentar</th>
				<th class="tabel" width="150px">Pilihan</th>
			</tr>
			<?php    
			$cari = trim($_POST['cari']);
			$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
			$no=1;
			if($_SESSION[leveluser]=='0'){
			$komentar=mysql_query("SELECT * FROM ".$DB_KODE."_komentar, ".$DB_KODE."_berita WHERE ".$DB_KODE."_komentar.id_berita=".$DB_KODE."_berita.id_berita AND nama_komentar LIKE '%$cari%' ORDER BY id_komentar DESC");
			}
			else {
			$komentar=mysql_query("SELECT * FROM ".$DB_KODE."_komentar, ".$DB_KODE."_berita WHERE ".$DB_KODE."_komentar.id_berita=".$DB_KODE."_berita.id_berita AND nama_komentar LIKE '%$cari%' AND ".$DB_KODE."_berita.s_username='$_SESSION[adminsh]' ORDER BY id_komentar DESC");
			}
			$cek_komentar=mysql_num_rows($komentar);
			
			if($cek_komentar > 0){
			while ($kom=mysql_fetch_array($komentar)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no"; ?></td>
				<td class="tabel"><?php    echo "<input type=checkbox name=cek[] value=$kom[id_komentar] id=id$no>"; ?></td>
				<td class="tabel"><a href="<?php    echo "?t=$token&pilih=edit&id=$kom[id_komentar]";?>"><?php    echo "$kom[nama_komentar]";?></a></td>
				<td class="tabel"><?php    echo "$kom[tanggal_komentar]";?></td>
				<td class="tabel"><a href="<?php    echo "berita.php?t=$token&pilih=edit&id=$kom[id_berita]";?>"><b><?php    echo "$kom[judul_berita]";?></b></a></td>
				<td class="tabel"><?php    echo "$kom[isi_komentar]";?></td>
				<td class="tabel">
				<?php     if ($kom[status_terima]== 1) {
				echo "
					<div class='hapusdata'><a href='$database?t=$token&pilih=komentar&untukdi=hapus&id=$kom[id_komentar]'>hapus</a></div>
					<div class='editdata'><a href='?t=$token&pilih=edit&id=$kom[id_komentar]'>edit</a></div>
					<div class='bataldata'><a href='$database?t=$token&pilih=komentar&untukdi=tolak&id=$kom[id_komentar]'>tolak</a></div>"; }
				else {
					echo "
					<div class='hapusdata'><a href='$database?t=$token&pilih=komentar&untukdi=hapus&id=$kom[id_komentar]'>hapus</a></div>
					<div class='editdata'><a href='?t=$token&pilih=edit&id=$kom[id_komentar]'>edit</a></div>
					<div class='terbitdata'><a href='$database?t=$token&pilih=komentar&untukdi=terima&id=$kom[id_komentar]'>terima</a></div>";
				}
					?>
				</td>
			</tr>
			<?php    
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="7"><b>DATA KOMENTAR DENGAN KATA KUNCI <u><?php    echo "$cari";?></u> TIDAK DITEMUKAN</b></td></tr>
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
		</script>
		</div>
			
		</form>		
</div><!--Akhir class isi kanan-->

<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

}
?>

