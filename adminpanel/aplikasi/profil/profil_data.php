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



$database="aplikasi/profil/profil.php";
switch($_GET['pilih']){
default: ?>
<h3>Profil<?php echo $_SESSION['Bsekolah']; ?></h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="informasi_sekolah.php?t=<?php echo $token; ?>">Informasi<?php echo $_SESSION['Bsekolah']; ?></a></div>
			<div class="menuhorisontal"><a href="gmap.php?t=<?php echo $token; ?>">Lokasi Gmap</a></div>
			<div class="menuhorisontalaktif"><a href="profil.php?t=<?php echo $token; ?>">Profil</a></div>
			<div class="menuhorisontal"><a href="agenda.php?t=<?php echo $token; ?>">Agenda</a></div>
			<div class="menuhorisontal"><a href="pengumuman.php?t=<?php echo $token; ?>">Pengumuman</a></div>
		</div>
		
		

		
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?t=<?php echo $token; ?>&pilih=tambah';">
			</div>
		</div>
		
		<table class="tabel">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel">Judul Informasi Profil</th>
				<th class="tabel">Tanggal Input</th>
				<th class="tabel">Posisi Menu</th>
				<th class="tabel" width="150px">Pilihan</th>
			</tr>
			<?php    
			$no=1;
			$profil=mysql_query("SELECT * FROM ".$DB_KODE."_info_sekolah ORDER BY id_info ASC");
			while($p=mysql_fetch_array($profil)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<td class="tabel"><a href="<?php    echo "?t=$token&pilih=edit&id=$p[id_info]";?>"><b><?php    echo "$p[nama_info]";?></b></a></td>
				<td class="tabel"><?php    echo "$p[tanggal_info]";?></td>
				<td class="tabel"><?php   
									if ($p[posisi_menu]== 1){
									echo "Menu Utama";}
									elseif ($p[posisi_menu]== 0){
									echo "Sub Menu";
									}
									else {
									echo "-";
									}
									?></td>
				<td class="tabel">
				<?php     if ($p[id_info]==1){
				echo "<div class='editdata'><a href='?t=$token&pilih=edit&id=$p[id_info]'>edit</a></div>"; }
				else {
					if ($p[status_terbit]==1){
				echo "
					<div class='hapusdata'><a href='$database?t=$token&pilih=profil&untukdi=hapus&id=$p[id_info]'>hapus</a></div>
					<div class='editdata'><a href='?t=$token&pilih=edit&id=$p[id_info]'>edit</a></div>
					<div class='bataldata'><a href='$database?t=$token&pilih=profil&untukdi=batalkan&id=$p[id_info]'>batalkan</a></div>";}
					else {
				echo "
					<div class='hapusdata'><a href='$database?t=$token&pilih=profil&untukdi=hapus&id=$p[id_info]'>hapus</a></div>
					<div class='editdata'><a href='?t=$token&pilih=edit&id=$p[id_info]'>edit</a></div>
					<div class='terbitdata'><a href='$database?t=$token&pilih=profil&untukdi=terbitkan&id=$p[id_info]'>terbitkan</a></div>";					
					}
					
					}
				?>
				</td>
			</tr>
			
			<?php    
			$no++;
			}
			?>
			
		</table>
		
</div><!--Akhir class isi kanan-->
		<?php     break;
		
		case "tambah":
			include "aplikasi/profil/profil_tambah.php";
		break;
		
		case "edit":
			include "aplikasi/profil/profil_edit.php";
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


	