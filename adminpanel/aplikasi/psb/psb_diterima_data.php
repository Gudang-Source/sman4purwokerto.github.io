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



$database="aplikasi/psb/psb.php";
switch($_GET['pilih']){
default: ?>
<h3>Pendaftar yang diterima</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="psb_online.php?t=<?php echo $token; ?>">Pendaftar</a></div>
			<div class="menuhorisontalaktif"><a href="psb_diterima.php?t=<?php echo $token; ?>">Diterima</a></div>
			<div class="menuhorisontal"><a href="psb_setting.php?t=<?php echo $token; ?>">Pengaturan</a></div>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php    
			$pendaftar=mysql_query("SELECT * FROM ".$DB_KODE."_psb WHERE status_psb='1'");
			$jmlpendaftar=mysql_num_rows($pendaftar);
			
			$pendaftarlaki=mysql_query("SELECT * FROM ".$DB_KODE."_psb WHERE status_psb='1' AND jenkel='L'");
			$jmllaki=mysql_num_rows($pendaftarlaki);
			
			$pendaftarperempuan=mysql_query("SELECT * FROM ".$DB_KODE."_psb WHERE status_psb='1' AND jenkel='P'");
			$jmlperempuan=mysql_num_rows($pendaftarperempuan);
			?>
			<a href="psb_diterima.php?t=<?php echo $token; ?>">Jumlah data</a> (<?php    echo "$jmlpendaftar";?>)&nbsp;&nbsp;|
			<a href="<?php    echo "?t=".$token."&pilih=jenkel&kode=L";?>">Laki-Laki</a> (<?php    echo "$jmllaki";?>)&nbsp;&nbsp;|
			<a href="<?php    echo "?t=".$token."&pilih=jenkel&kode=P";?>">Perempuan</a> (<?php    echo "$jmlperempuan";?>)
			</div>
			<div class="cari">
			<form method="POST" action="?t=<?php echo $token; ?>&pilih=pencarian">
			<input type="text" class="pencarian" name="cari"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		
		<?php     echo "<form method='POST' action='$database?t=$token&pilih=terima&untukdi=hapusbanyak'>";?>
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<input type="submit" class="hapus" value="Hapus yang ditandai">
			</div>
			<div class="cari">
				
			</div>
		</div>
		<div class="clear"></div>
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" width="25px">&nbsp;</th>
				<th class="tabel">No. Reg</th>
				<th class="tabel">Nama Pendaftar</th>
				<th class="tabel">NEM</th>
				<th class="tabel">JK</th>
				<th class="tabel"><?php echo $_SESSION['Bsekolah'];?>  Asal</th>
				<th class="tabel">Waktu Daftar</th>
				<th class="tabel" width="150px">Pilihan</th>
			</tr>
			<?php    
			$no=1;
			$psb=mysql_query("SELECT * FROM ".$DB_KODE."_psb WHERE status_psb='1' ORDER BY id_psb DESC");
			$cek_psb=mysql_num_rows($psb);
			
			if($cek_psb > 0){
			while($p=mysql_fetch_array($psb)){
			?>
			
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<td class="tabel"><?php    echo "<input type=checkbox name=cek[] value=$p[id_psb] id=id$no>"; ?></td>
				<td class="tabel"><?php    echo "$p[id_psb]";?></td>
				<td class="tabel"><a href="<?php    echo"?t=$token&pilih=edit&id=$p[id_psb]";?>"><b><?php    echo "$p[nama_psb]";?></b></a></td>
				<td class="tabel"><?php    echo "$p[nem]";?></td>
				<td class="tabel"><?php    echo "$p[jenkel]";?></td>
				<td class="tabel"><?php    echo "$p[sekolah_asal]";?></td>
				<td class="tabel"><a href=""><?php    echo "$p[tanggal_psb]";?></a></td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=terima&untukdi=hapus&id=$p[id_psb]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php    echo"?t=$token&pilih=edit&id=$p[id_psb]";?>">edit</a></div>
					<?php     if ($p[status_psb]==0){ ?>
					<div class="terbitdata"><a href="<?php    echo "$database?t=$token&pilih=terima&untukdi=terima&id=$p[id_psb]";?>">terima</a></div>
					<?php     }
					else { ?>
					<div class="bataldata"><a href="<?php    echo "$database?t=$token&pilih=terima&untukdi=tolak&id=$p[id_psb]";?>">tolak</a></div>
					<?php     } ?>
				</td>
			</tr>
			<?php    
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="9"><b>DATA PENDAFTAR YANG DITERIMA BELUM TERSEDIA</b></td></tr>
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
		<?php     break;
		
		case "tambah":
			include "aplikasi/psb/psb_tambah.php";
		break;
		
		case "edit":
			include "aplikasi/psb/psb_edit.php";
		break;
		
		case "jenkel":
			include "aplikasi/psb/psb_diterima_jenkel.php";
		break;
		
		case "pencarian":
			include "aplikasi/psb/psb_diterima_pencarian.php";
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

