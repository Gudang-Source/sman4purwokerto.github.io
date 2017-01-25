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



$database="aplikasi/blok/blok.php";
switch($_GET['pilih']){
default: ?>
<h3>Blok</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
<?php 			include "aplikasi/blok/header.php"; ?>
		</div>								


		
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?t=<?php echo $token; ?>&pilih=tambah';">
			<input type="button" class="pencet" value="Install" onclick="window.location.href='?t=<?php echo $token; ?>&pilih=install';">
			</div>
		</div>
		
		<table class="tabel">
			<tr>
				<th class="tabel" colspan="6"><center>A T A S</center></th>
			</tr>		
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" >Nama Blok</th>
				<th class="tabel" width="150px">Posisi Sidebar</th>
				<th class="tabel" width="80px">Urutan</th>
				
				<th class="tabel" width="30px">Status</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			
			<?php    
				$no=1;
				$blok=mysql_query("SELECT * FROM ".$DB_KODE."_blok where posisi=1 ORDER BY posisi,urutan,id_blok ASC");
				while ($m=mysql_fetch_array($blok)){
				?>
				
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<td class="tabel"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_blok]";?>"><?php    echo "$m[nama_blok]";?></a></td>
				<td class="tabel">
					<a title="Blok Atas" href="<?php    echo "$database?t=$token&pilih=posisi&untukdi=atas&id=$m[id_blok]";?>"><img src="images/1.png"></a>
					<a title="Blok Bawah"  href="<?php    echo "$database?t=$token&pilih=posisi&untukdi=bawah&id=$m[id_blok]";?>"><img src="images/2.png"></a>
					<a title="Blok Kiri"  href="<?php    echo "$database?t=$token&pilih=posisi&untukdi=kiri&id=$m[id_blok]";?>"><img src="images/3.png"></a>
					<a title="Blok Kanan"  href="<?php    echo "$database?t=$token&pilih=posisi&untukdi=kanan&id=$m[id_blok]";?>"><img src="images/4.png"></a>
				</td>
				<td class="tabel">
					<a title="Urutan Naik "  href="<?php    echo "$database?t=$token&pilih=urutan&untukdi=naik&id=$m[id_blok]";?>"><img src="images/5.png"></a>
					<a title="Urutan Turun "  href="<?php    echo "$database?t=$token&pilih=urutan&untukdi=turun&id=$m[id_blok]";?>"><img src="images/6.png"></a>
				</td>
				<td class="tabel">
								<?php    
				if ($m[status]==0) {
				?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$m[id_blok]";?>"><img src="images/d.png"></a>
				<?php     }
				else {
				?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$m[id_blok]";?>"><img src="images/a.png"></a>
				<?php     }
				?>
					</td>
				<td class="tabel">
				<?php    
				if ($m[id_blok]< 100) {
				?>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_blok]";?>">edit</a></div>
				<?php     }
				else {
				?>
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=blok&untukdi=hapus&id=$m[id_blok]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_blok]";?>">edit</a></div>
				<?php     } ?>	
				</td>
			</tr>
			<?php    
		
			$no++;
			}
			?>
			</table>	
			
	
		<table class="tabel">
			<tr>
				<th class="tabel" colspan="6"><center>K I R I</center></th>
			</tr>		
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" >Nama Blok</th>
				<th class="tabel" width="150px">Posisi Sidebar</th>
				<th class="tabel" width="80px">Urutan</th>
				
				<th class="tabel" width="30px">Status</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			
			<?php    
				$no=1;
				$blok=mysql_query("SELECT * FROM ".$DB_KODE."_blok where posisi=3 ORDER BY posisi,urutan,id_blok ASC");
				while ($m=mysql_fetch_array($blok)){
				?>
				
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<td class="tabel"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_blok]";?>"><?php    echo "$m[nama_blok]";?></a></td>
				<td class="tabel">
					<a title="Blok Atas" href="<?php    echo "$database?t=$token&pilih=posisi&untukdi=atas&id=$m[id_blok]";?>"><img src="images/1.png"></a>
					<a title="Blok Bawah"  href="<?php    echo "$database?t=$token&pilih=posisi&untukdi=bawah&id=$m[id_blok]";?>"><img src="images/2.png"></a>
					<a title="Blok Kiri"  href="<?php    echo "$database?t=$token&pilih=posisi&untukdi=kiri&id=$m[id_blok]";?>"><img src="images/3.png"></a>
					<a title="Blok Kanan"  href="<?php    echo "$database?t=$token&pilih=posisi&untukdi=kanan&id=$m[id_blok]";?>"><img src="images/4.png"></a>
				</td>
				<td class="tabel">
					<a title="Urutan Naik "  href="<?php    echo "$database?t=$token&pilih=urutan&untukdi=naik&id=$m[id_blok]";?>"><img src="images/5.png"></a>
					<a title="Urutan Turun "  href="<?php    echo "$database?t=$token&pilih=urutan&untukdi=turun&id=$m[id_blok]";?>"><img src="images/6.png"></a>
				</td>
				<td class="tabel">
								<?php    
				if ($m[status]==0) {
				?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$m[id_blok]";?>"><img src="images/d.png"></a>
				<?php     }
				else {
				?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$m[id_blok]";?>"><img src="images/a.png"></a>
				<?php     }
				?>
					</td>
				<td class="tabel">
				<?php    
				if ($m[id_blok]< 100) {
				?>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_blok]";?>">edit</a></div>
				<?php     }
				else {
				?>
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=blok&untukdi=hapus&id=$m[id_blok]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_blok]";?>">edit</a></div>
				<?php     } ?>	
				</td>
			</tr>
			<?php    
		
			$no++;
			}
			?>			
		</table>
		
		
				<table class="tabel">
			<tr>
				<th class="tabel" colspan="6"><center>K A N A N</center></th>
			</tr>		
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" >Nama Blok</th>
				<th class="tabel" width="150px">Posisi Sidebar</th>
				<th class="tabel" width="80px">Urutan</th>
				
				<th class="tabel" width="30px">Status</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			
			<?php    
				$no=1;
				$blok=mysql_query("SELECT * FROM ".$DB_KODE."_blok where posisi=4 ORDER BY posisi,urutan,id_blok ASC");
				while ($m=mysql_fetch_array($blok)){
				?>
				
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<td class="tabel"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_blok]";?>"><?php    echo "$m[nama_blok]";?></a></td>
				<td class="tabel">
					<a title="Blok Atas" href="<?php    echo "$database?t=$token&pilih=posisi&untukdi=atas&id=$m[id_blok]";?>"><img src="images/1.png"></a>
					<a title="Blok Bawah"  href="<?php    echo "$database?t=$token&pilih=posisi&untukdi=bawah&id=$m[id_blok]";?>"><img src="images/2.png"></a>
					<a title="Blok Kiri"  href="<?php    echo "$database?t=$token&pilih=posisi&untukdi=kiri&id=$m[id_blok]";?>"><img src="images/3.png"></a>
					<a title="Blok Kanan"  href="<?php    echo "$database?t=$token&pilih=posisi&untukdi=kanan&id=$m[id_blok]";?>"><img src="images/4.png"></a>
				</td>
				<td class="tabel">
					<a title="Urutan Naik "  href="<?php    echo "$database?t=$token&pilih=urutan&untukdi=naik&id=$m[id_blok]";?>"><img src="images/5.png"></a>
					<a title="Urutan Turun "  href="<?php    echo "$database?t=$token&pilih=urutan&untukdi=turun&id=$m[id_blok]";?>"><img src="images/6.png"></a>
				</td>
				<td class="tabel">
								<?php    
				if ($m[status]==0) {
				?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$m[id_blok]";?>"><img src="images/d.png"></a>
				<?php     }
				else {
				?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$m[id_blok]";?>"><img src="images/a.png"></a>
				<?php     }
				?>
					</td>
				<td class="tabel">
				<?php    
				if ($m[id_blok]< 100) {
				?>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_blok]";?>">edit</a></div>
				<?php     }
				else {
				?>
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=blok&untukdi=hapus&id=$m[id_blok]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_blok]";?>">edit</a></div>
				<?php     } ?>	
				</td>
			</tr>
			<?php    
		
			$no++;
			}
			?>			
		</table>

		<table class="tabel">
			<tr>
				<th class="tabel" colspan="6"><center>B A W A H</center></th>
			</tr>		
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" >Nama Blok</th>
				<th class="tabel" width="150px">Posisi Sidebar</th>
				<th class="tabel" width="80px">Urutan</th>
				
				<th class="tabel" width="30px">Status</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			
			<?php    
				$no=1;
				$blok=mysql_query("SELECT * FROM ".$DB_KODE."_blok where posisi=2 ORDER BY posisi,urutan,id_blok ASC");
				while ($m=mysql_fetch_array($blok)){
				?>
				
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<td class="tabel"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_blok]";?>"><?php    echo "$m[nama_blok]";?></a></td>
				<td class="tabel">
					<a title="Blok Atas" href="<?php    echo "$database?t=$token&pilih=posisi&untukdi=atas&id=$m[id_blok]";?>"><img src="images/1.png"></a>
					<a title="Blok Bawah"  href="<?php    echo "$database?t=$token&pilih=posisi&untukdi=bawah&id=$m[id_blok]";?>"><img src="images/2.png"></a>
					<a title="Blok Kiri"  href="<?php    echo "$database?t=$token&pilih=posisi&untukdi=kiri&id=$m[id_blok]";?>"><img src="images/3.png"></a>
					<a title="Blok Kanan"  href="<?php    echo "$database?t=$token&pilih=posisi&untukdi=kanan&id=$m[id_blok]";?>"><img src="images/4.png"></a>
				</td>
				<td class="tabel">
					<a title="Urutan Naik "  href="<?php    echo "$database?t=$token&pilih=urutan&untukdi=naik&id=$m[id_blok]";?>"><img src="images/5.png"></a>
					<a title="Urutan Turun "  href="<?php    echo "$database?t=$token&pilih=urutan&untukdi=turun&id=$m[id_blok]";?>"><img src="images/6.png"></a>
				</td>
				<td class="tabel">
								<?php    
				if ($m[status]==0) {
				?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$m[id_blok]";?>"><img src="images/d.png"></a>
				<?php     }
				else {
				?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$m[id_blok]";?>"><img src="images/a.png"></a>
				<?php     }
				?>
					</td>
				<td class="tabel">
				<?php    
				if ($m[id_blok]< 100) {
				?>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_blok]";?>">edit</a></div>
				<?php     }
				else {
				?>
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=blok&untukdi=hapus&id=$m[id_blok]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_blok]";?>">edit</a></div>
				<?php     } ?>	
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
			include "aplikasi/blok/blok_tambah.php";
		break;
		
		case "install":
			include "aplikasi/blok/blok_install.php";
		break;		
		case "edit":
			include "aplikasi/blok/blok_edit.php";
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

