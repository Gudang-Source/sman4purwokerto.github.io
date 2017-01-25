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




if($_SESSION['leveluser'] == '0') {
?>
		<table class="tabel"   id="results">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" width="125px">Nama Link</th>
				<th class="tabel">URL website</th>
				<th class="tabel">Kategori</th>
				<th class="tabel" width="100px">Status</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			
			<?php    
				$no=1;
				$link=mysql_query("SELECT * FROM ".$DB_KODE."_sidebar WHERE jenis='link' ORDER BY id_sidebar DESC");
				$cek_link=mysql_num_rows($link);
				
				if($cek_link > 0){
				while($l=mysql_fetch_array($link)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<td class="tabel"><a href="<?php    echo "?t=$token&pilih=edit&id=$l[id_sidebar]";?>"><b><?php    echo "$l[nama]";?></b></a></td>
				<td class="tabel"><a href="<?php    echo "http://$l[isi1]";?>" target="_blank"><?php    echo "$l[isi1]";?></a></td>
				
						<?php    
							$kats=mysql_query("SELECT * FROM ".$DB_KODE."_kategori where fungsi='link' AND id_kategori=$l[kategori] ORDER BY nama_kategori ASC");
							$ks=mysql_fetch_array($kats);
						?>
				<td class="tabel"><?php    echo "$ks[nama_kategori]";?> </td>
				<td class="tabel">
					<?php    if($l[status]==0){?>
					<div class="editdata"><a  title="Aktifkan"   href="<?php echo "$database?t=$token&pilih=link&untukdi=aktif&id=$l[id_sidebar]";?>">Non Aktif</a></div>
					<?php   }else{ ?>
					<div  class="hapusdata"><a  title="Non Aktifkan"   href="<?php    echo "$database?t=$token&pilih=link&untukdi=nonaktif&id=$l[id_sidebar]";?>">Aktif</a></div>
					<?php   } ?>
				</td>				
				<td class="tabel">
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=link&untukdi=hapus&id=$l[id_sidebar]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$l[id_sidebar]";?>">edit</a></div>
				</td>
			</tr>
			<?php    
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="4"><b>DATA LINK BELUM TERSEDIA</b></td></tr>
			<?php     }
			?>
		</table>
				<div id="pageNavPosition"></div>
		
		
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 30); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>		
<?php     } ?>	


<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

}
?>

