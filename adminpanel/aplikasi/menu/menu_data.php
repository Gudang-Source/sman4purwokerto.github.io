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



$database="aplikasi/menu/menu.php";

function get_menu($data, $parent = 0) {
	static $i = 1;
	$tab = str_repeat("\t\t", $i);
	if (isset($data[$parent])) {
$html = "\n$tab <ul>";
		$i++;
		foreach ($data[$parent] as $v) {
			$child = get_menu($data, $v->id_menu);
			
			$html .= "\n\t$tab $mn<li>";
			$html .= '<a href="../'.$v->url.'">'.$v->judul.'</a>';
			if ($child) {
				$i--;
				$html .= $child;
				$html .= "\n\t$tab";
			}
			//$html .= '<a title="Urutan Naik "  href="'.$database.'?t=$token&pilih=urutan&untukdi=naik&id='.$v->id_menu.'"><img src="images/5.png"></a>';
			$html .= ' </li>';
			
		}
		$html .= "\n$tab</ul>";
		return $html;
	} else {
		return false;
	}
}


$result = mysql_query("SELECT * FROM ".$DB_KODE."_menu where status=1 ORDER BY urutan,id_menu ASC");
while ($row = mysql_fetch_object($result)) {
	$data[$row->menu_id][] = $row;
}
$menu = get_menu($data);
switch($_GET['pilih']){
default: 
?>
<h3>Menu</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
<?php 			include "aplikasi/menu/header.php"; ?>

		</div>	

<link rel="stylesheet" type="text/css" href="js/jquerycssmenu.css" />
<script type="text/javascript" src="js/jquerycssmenu.js"></script>		
	
<style type="text/css">
#content { padding: 10px; margin: 15px; border: 1px solid #ccc; width: 500px; background: #fafafa; }
</style>
		<div class="atastabel" style="margin-bottom: 10px">
				<div id="myjquerymenu" class="jquerycssmenu" style="height:auto">
				<?php  echo $menu; ?>
				<br style="clear: left" />
				</div>
		</div>
		
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?t=<?php echo $token; ?>&pilih=tambah';">
			</div>
		</div>
		
		<table class="tabel" style="padding:0px;"  style="padding:0px;">
			<tr>
				<th class="tabel" style="padding:10px;"  colspan="6"><center>M E N U</center></th>
			</tr>		
			<tr>
				<th class="tabel" style="padding:5px;"  width="25px">No</th>
				<th class="tabel" style="padding:5px;"  >Nama Menu</th>
				<th class="tabel" style="padding:5px;"  width="100px">Urutan</th>
				
				<th class="tabel" style="padding:5px;"  width="50px">Status</th>
				<th class="tabel" style="padding:5px;"  width="200px">Pilihan</th>
			</tr>
			
			<?php    
				$no=1;
				$menu=mysql_query("SELECT * FROM ".$DB_KODE."_menu WHERE menu_id=0 ORDER BY urutan,menu_id ASC");
				while ($m=mysql_fetch_array($menu)){
				?>
				
			<tr class="tabel" style="padding:0px;"  style="padding=0px;">
				<td class="tabel" style="padding:0px;" ><?php    echo "$no";?></td>
				<td class="tabel" style="padding:0px;" ><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_menu]";?>"><?php    echo "$m[judul]";?></a></td>

				<td class="tabel" style="padding:0px;" >
					<a title="Urutan Naik "  href="<?php    echo "$database?t=$token&pilih=urutan&untukdi=naik&id=$m[id_menu]";?>"><img src="images/5.png"></a>
					<a title="Urutan Turun "  href="<?php    echo "$database?t=$token&pilih=urutan&untukdi=turun&id=$m[id_menu]";?>"><img src="images/6.png"></a>
				</td>
				<td class="tabel" style="padding:0px;" >
								<?php    
				if ($m[status]==0) {
				?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$m[id_menu]";?>"><img src="images/d.png"></a>
				<?php     }
				else {
				?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$m[id_menu]";?>"><img src="images/a.png"></a>
				<?php     }
				?>
					</td>
				<td class="tabel" style="padding:0px;" >
				<?php    
				if ($m[id_menu]> 1) {
				?>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_menu]";?>"><span style="color:white"><span style="color:white">edit</span></span></a></div>
				<?php     }
				else {
				?>
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=menu&untukdi=hapus&id=$m[id_menu]";?>"><span style="color:yellow">hapus</span></a></div>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_menu]";?>"><span style="color:white">edit</span></a></div>
				<?php     } ?>	
				</td>
			</tr>
								<?php    
									$mxx=$m['id_menu'];
									$nox=1;
									$menux=mysql_query("SELECT * FROM ".$DB_KODE."_menu WHERE menu_id=$mxx ORDER BY urutan ASC");
									$mxn=mysql_num_rows($menux);
									if($mxn>0){
									?>			
			<tr>
				<td class="tabel" style="padding:0px;" ></td><th class="tabel" style="padding:0px;background:#fff;"  colspan="5">
				
					<table class="tabel" style="padding:0px; background:#fff;">
						<?php    
							while ($mx=mysql_fetch_array($menux)){
							?>
							
						<tr class="tabel" style="padding:0px;" >
							<td class="tabel" style="padding:0px;"  width="25px"><?php     echo "$nox";?></td>
							<td class="tabel" style="padding:0px;" ><a href="<?php    echo "?t=$token&pilih=edit&id=$mx[id_menu]";?>"><?php    echo "$mx[judul]";?></a></td>

							<td class="tabel" style="padding:0px;"  width="100px">
								<a title="Urutan Naik "  href="<?php    echo "$database?t=$token&pilih=urutan&untukdi=naik&id=$mx[id_menu]";?>"><img src="images/5.png"></a>
								<a title="Urutan Turun "  href="<?php    echo "$database?t=$token&pilih=urutan&untukdi=turun&id=$mx[id_menu]";?>"><img src="images/6.png"></a>
							</td>
							<td class="tabel" style="padding:0px;" width="50px">
											<?php    
							if ($mx[status]==0) {
							?>
								<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$mx[id_menu]";?>"><img src="images/d.png"></a>
							<?php     }
							else {
							?>					
								<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$mx[id_menu]";?>"><img src="images/a.png"></a>
							<?php     }
							?>
								</td>
							<td class="tabel" style="padding:0px;" width="200px">
							<?php    
							if ($mx[id_menu]> 1) {
							?>
								<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$mx[id_menu]";?>"><span style="color:white">edit</span></a></div>
							<?php     }
							else {
							?>
								<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=menu&untukdi=hapus&id=$mx[id_menu]";?>"><span style="color:yellow">hapus</span></a></div>
								<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$mx[id_menu]";?>"><span style="color:white">edit</span></a></div>
							<?php     } ?>
							
						</td>
					</tr>

								<?php    
									$mxxx=$mx['id_menu'];
									$noxx=1;
									$menuxx=mysql_query("SELECT * FROM ".$DB_KODE."_menu WHERE menu_id=$mxxx ORDER BY urutan ASC");
									$mxxn=mysql_num_rows($menuxx);
									if($mxxn>0){
									?>
					<tr>
					
						<td class="tabel" style="padding:0px;" > </td><th class="tabel" style="padding:0px; background:#fff;"  colspan="5">
						
							<table class="tabel" style="padding:0px; background:#fff">
								<?php    
									while ($mxx=mysql_fetch_array($menuxx)){
									?>
									
								<tr class="tabel" style="padding:0px;" >
									<td class="tabel" style="padding:0px;"  width="25px"><?php     echo "$noxx";?></td>
									<td class="tabel" style="padding:0px;" ><a href="<?php    echo "?t=$token&pilih=edit&id=$mxx[id_menu]";?>"><?php    echo "$mxx[judul]";?></a></td>

									<td class="tabel" style="padding:0px;"  width="100px">
										<a title="Urutan Naik "  href="<?php    echo "$database?t=$token&pilih=urutan&untukdi=naik&id=$mxx[id_menu]";?>"><img src="images/5.png"></a>
										<a title="Urutan Turun "  href="<?php    echo "$database?t=$token&pilih=urutan&untukdi=turun&id=$mxx[id_menu]";?>"><img src="images/6.png"></a>
									</td>
									<td class="tabel" style="padding:0px;" width="50px">
													<?php    
									if ($mxx[status]==0) {
									?>
										<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$mxx[id_menu]";?>"><img src="images/d.png"></a>
									<?php     }
									else {
									?>					
										<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$mxx[id_menu]";?>"><img src="images/a.png"></a>
									<?php     }
									?>
										</td>
									<td class="tabel" style="padding:0px;" width="200px">
									<?php    
									if ($mxx[id_menu]>1) {
									?>
										<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$mxx[id_menu]";?>"><span style="color:white">edit</span></a></div>
									<?php     }
									else {
									?>
										<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=menu&untukdi=hapus&id=$mxx[id_menu]";?>"><span style="color:yellow">hapus</span></a></div>
										<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$mxx[id_menu]";?>"><span style="color:white">edit</span></a></div>
									<?php     } ?>
									
								</td>
							</tr>
							<?php    
						
							$noxx++;
							}
							
							?>
							</table>
							</th>
						</tr>	
							
					<?php    
						}
					$nox++;
					}
					?>
					</table>
					</th>
				</tr>	
		
			<?php 
				}
			$no++;
			}
			?>
			</table>	
			

</div><!--Akhir class isi kanan-->
		<?php     break;
		
		case "tambah":
			include "aplikasi/menu/menu_tambah.php";
		break;
		
		case "edit":
			include "aplikasi/menu/menu_edit.php";
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

