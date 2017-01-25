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
$database="aplikasi/tema/tema.php";


switch($_GET['pilih']){
default: ?>
<h3>Tema Website</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="pengaturan.php?t=<?php echo $token; ?>">Website</a></div>
			<div class="menuhorisontalaktif"><a href="tema.php?t=<?php echo $token; ?>">Tema</a></div>
			<div class="menuhorisontal"><a href="blok.php?t=<?php echo $token; ?>">Blok</a></div>
			<div class="menuhorisontal"><a href="menu.php?t=<?php echo $token; ?>">Menu</a></div>
			<div class="menuhorisontal"><a href="plugin.php?t=<?php echo $token; ?>">Plugin</a></div>
			<div class="menuhorisontal"><a href="modul.php?t=<?php echo $token; ?>">Modul</a></div>
			<div class="menuhorisontal"><a href="ym.php?t=<?php echo $token; ?>">Yahoo! Messenger</a></div>
			<div class="menuhorisontal"><a href="polling.php?t=<?php echo $token; ?>">Polling</a></div>
			<div class="menuhorisontal"><a href="link.php?t=<?php echo $token; ?>">Link</a></div>
			<div class="menuhorisontal"><a href="statistik.php?t=<?php echo $token; ?>">Statistik</a></div>
		</div>


	

		
		<div class="clear"></div>
		
		<div class="kotakTemaAktif">
			<?php    
			$temaaktif=mysql_query("SELECT * FROM ".$DB_KODE."_tema WHERE status='1'");
			$aktif=mysql_fetch_array($temaaktif);
			?>
			<div class="isiKotakPreview">
			<img src="<?php    echo"../file/tema/$aktif[nama_tema]/preview.jpg";?>" width="300px" height="200px">
			</div>
			<div class="isiKotakKeterangan">
			<h3><?php    echo "$aktif[nama_tema]";?></h3>
			<table class="isian" style="padding: 0; margin: 0;">
				<tr><td valign="top" class="isiankanan">Pembuat</td><td class="isian">: <a  taget="_blank" href="<?php    echo "$aktif[url_pembuat]";?>"><?php    echo "$aktif[pembuat]";?></a></td></tr>
				<tr><td valign="top" class="isiankanan" width="120px">Tahun Pembuatan</td><td class="isian">:<?php     echo "$aktif[tahun]";?></td></tr>
				<tr><td valign="top" class="isiankanan">Deskripsi</td><td class="isian"width="300px">:<?php     echo "$aktif[deskripsi]";?></td></tr>
				<tr><td valign="top" class="isiankanan">Status</td><td class="isian">: <b>AKTIF<b></td></tr>
			</table>
			</div>
		</div>
		
		<table class="isian">
		<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Formulasi CMS menyediakan 4 tema yang dapat anda gunakan untuk website anda, silahkan di kostumisasi jika tema dari kami belum sesuai dengan
			kebutuhan websita anda. 
			</i><br><hr></td></tr>
		</table>
		<?php    
	//$no=1;	
		//	$tema=mysql_query("SELECT * FROM ".$DB_KODE."_tema WHERE nama_tema='$dir' and status='0'");
			//$aktif=mysql_fetch_array($temaaktif);

		foreach(glob('../file/tema/*', GLOB_ONLYDIR) as $dir) {
    $dir = str_replace('../file/tema/', '', $dir);

	//$_SESSION['folder_'.$no]=$dir;
			$tema=mysql_query("SELECT * FROM ".$DB_KODE."_tema WHERE nama_tema='$dir' and status='0'");		
		$r2s=mysql_fetch_array($tema);
				$tema2=mysql_query("SELECT * FROM ".$DB_KODE."_tema WHERE nama_tema='$dir' and status='1'");		
		$r2=mysql_fetch_array($tema2);
		//if($r2['nama_tema']=$dir){
		if($r2s['nama_tema']==$dir){	
	//while($r2=mysql_fetch_array($tema)){
	?>
		<div class="kotakTema">
			<div class="previewTema">
			<img src="<?php    echo"../file/tema/$r2s[nama_tema]/preview.jpg";?>" width="200px" height="150px">
			</div>
			<div class="keteranganTema">
			<b><?php    echo"$r2s[nama_tema]";?></b><br><br>
			Pembuat : <a taget="_blank" href="<?php    echo"$r2s[url_pembuat]";?>"><?php    echo"$r2s[pembuat]";?></a><br>
			Tahun Pembuatan:<?php     echo"$r2s[tahun]";?><br>
			Deskripsi :<?php     echo"$r2s[deskripsi]";?><br><br>
			<a href="<?php    echo "$database?t=$token&id=$r2s[id_tema]&ntm=$r2s[nama_tema]";?>"><b>Aktifkan</b></a><br>	
			<a href="<?php    echo "$database?t=$token&no=$r2s[id_tema]&pilih=uninstall";?>"><b>Uninstall</b></a>	<br>		
			</div>
		</div>	
	<?php 
	//}
	}else{
		if($r2['nama_tema']<>$dir){
		$file='../file/tema/'.$dir.'/judul.php';
			   if (file_exists($file)) {
				?>
				
					<?php     include "../file/tema/$dir/judul.php";?>	
					<div class="kotakTema">
						<div class="previewTema">
						<img src="<?php    echo"../file/tema/$dir/preview.jpg";?>" width="200px" height="150px">
						</div>
						<div class="keteranganTema">
						<b><?php    echo $dir;?></b><br><br>

					<form method='POST'<?php     echo"action='$database?t=$token&pilih=install&ntm=$dir'";?> name='installtema' id='installtema' >
					<input type='hidden' name='pembuat' value="<?php    echo $pembuat;?>">
					<input type='hidden' name='url' value="<?php    echo $url;?>">
					<input type='hidden' name='deskripsi' value="<?php    echo $deskripsi;?>">
					<input type='hidden' name='tahun' value="<?php    echo $tahun;?>">
						<input type="submit" class="pencet" value="INSTALL">
					</form>
						</div>
					</div>	
				
				<?php 	
				}
		}
	}
	//$no++; 
}
?>
		<div class="clear"></div>
</div><!--Akhir class isi kanan-->
		<?php     break;
		
		case "install_tema":
			include "aplikasi/tema/tema_install.php";
}
		?>
<?php     }?>

<?php   }
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

