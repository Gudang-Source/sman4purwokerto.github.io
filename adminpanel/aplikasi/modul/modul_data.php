<script>
function confirmation()
{
var answer = confirm("Apakah anda yakin ? karena semua isi database dari modul ini nanti akan ikut terhapus?")
 if (answer)
 {
  return true;
 } else {
  if (window.event) // True with IE, false with other browsers
  {
   window.event.returnValue=false; //IE specific
  } else {
   return false
  }
 }
}
</script>
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
$database="aplikasi/modul/modul.php";


switch($_GET['pilih']){
default: ?>
<h3>PluginWebsite</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="pengaturan.php?t=<?php echo $token; ?>">Website</a></div>
			<div class="menuhorisontal"><a href="tema.php?t=<?php echo $token; ?>">Tema</a></div>
			<div class="menuhorisontal"><a href="blok.php?t=<?php echo $token; ?>">Blok</a></div>
			<div class="menuhorisontal"><a href="menu.php?t=<?php echo $token; ?>">Menu</a></div>
			<div class="menuhorisontal"><a href="plugin.php?t=<?php echo $token; ?>">Plugin</a></div>
			<div class="menuhorisontalaktif"><a href="modul.php?t=<?php echo $token; ?>">Modul</a></div>
			<div class="menuhorisontal"><a href="ym.php?t=<?php echo $token; ?>">Yahoo! Messenger</a></div>
			<div class="menuhorisontal"><a href="polling.php?t=<?php echo $token; ?>">Polling</a></div>
			<div class="menuhorisontal"><a href="link.php?t=<?php echo $token; ?>">Link</a></div>
			<div class="menuhorisontal"><a href="statistik.php?t=<?php echo $token; ?>">Statistik</a></div>
			<div class="menuhorisontal"><a href="backup.php?t=<?php echo $token; ?>">Backup</a></div>
		</div>


	
		<table class="isian">
		<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>
			Silahkan hubungi kami jika anda membutuhkan modul khusus.
			</i><br><hr></td></tr>
		</table>
		<?php    
	//$no=1;	
		//	$modul=mysql_query("SELECT * FROM ".$DB_KODE."_modul WHERE nama_modul='$dir' and status='0'");
			//$aktif=mysql_fetch_array($modulaktif);

		foreach(glob('aplikasi/*', GLOB_ONLYDIR) as $dir) {
    $dir = str_replace('aplikasi/', '', $dir);

	//$_SESSION['folder_'.$no]=$dir;
			$modul=mysql_query("SELECT * FROM ".$DB_KODE."_modul WHERE folder_modul='$dir' ORDER BY status DESC");		
		$r2s=mysql_fetch_array($modul);
				$modul2=mysql_query("SELECT * FROM ".$DB_KODE."_modul WHERE folder_modul='$dir' and status='1'");		
		$r2=mysql_fetch_array($modul2);
		//if($r2['nama_modul']=$dir){
		if($r2s['folder_modul']==$dir){	
	//while($r2=mysql_fetch_array($modul)){
	?>
		<div class="kotakTema">
			<div class="previewTema" style="height:50px">
			<img src="<?php    echo"aplikasi/$r2s[folder_modul]/logo.jpg";?>" width="200px" height="50px">
			</div>
			<div class="keteranganTema">
			<b><?php    echo"$r2s[nama_modul]";?></b><br><br>
			Pembuat : <a target="_blank" href="<?php    echo"$r2s[url_pembuat]";?>"><?php    echo"$r2s[pembuat]";?></a><br>
			Tahun Pembuatan:<?php     echo"$r2s[tahun]";?><br>
			Deskripsi :<?php     echo"$r2s[deskripsi]";?><br><br>
			<?php 
			if ($r2s['status']==0){
			?>
			<a href="<?php    echo "$database?t=$token&no=$r2s[id_modul]&pilih=aktifkan";?>"><span style="color:red;"><b>Aktifkan</b></span></a><br>	
	
			<?php }else {?>

			<a href="<?php    echo "$database?t=$token&no=$r2s[id_modul]&pilih=nonaktif";?>"><b>Non Aktifkan</b></a><br>				
			<?php }?>		<hr>	
			
					<form method='POST'<?php     echo"action='$database?t=$token&no=$r2s[id_modul]&pilih=uninstall&ntm=$dir'";?> name='installmodul' id='installmodul' >
									<input type="submit" class="pencet" value="UNINSTALL" onclick="return confirmation();" >
					</form>
			</div>
		</div>	
	<?php 
	//}
	}else{
	if($r2['nama_modul']<>$dir){
	$file='aplikasi/'.$dir.'/judul.php';
   if (file_exists($file)) {
	?>
	
		<?php     include "aplikasi/$dir/judul.php";?>	
		<div class="kotakTema" >
			<div class="previewTema" style="height:50px">
			<img src="<?php    echo"aplikasi/$dir/logo.jpg";?>" width="200px" height="50px">
			</div>
				<div class="keteranganTema" style="height:100px">
				
				<b><?php    echo $judul;?></b><hr>
			Pembuat : <a target="_blank" href="<?php    echo $url;?>"><?php    echo $pembuat;?></a><br>
			Tahun Pembuatan:<?php     echo $tahun;?><br>
			Deskripsi :<?php     echo $deskripsi; ?><br><br>				
					<form method='POST'<?php     echo"action='$database?t=$token&pilih=install&ntm=$dir'";?> name='installmodul' id='installmodul' >
					<input type='hidden' name='judul' value="<?php    echo $judul;?>">		
					<input type='hidden' name='pembuat' value="<?php    echo $pembuat;?>">
					<input type='hidden' name='url' value="<?php    echo $url;?>">
					<input type='hidden' name='deskripsi' value="<?php    echo $deskripsi;?>">
					<input type='hidden' name='cookie' value="<?php    echo $cookie;?>">	
					<input type='hidden' name='tahun' value="<?php    echo $tahun;?>">
		<?php     if ($contoh==1){?>					
					<select name="contoh">
						<option value="1" selected> Dengan Contoh</option>
						<option value="0" > Kosong</option>
					</select>		
		<?php     }else{?>
					<input type='hidden' name='contoh' value="0">		
		<?php     }?>						
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
///echo  $_SESSION['folder_3'];
		$modul=mysql_query("SELECT * FROM ".$DB_KODE."_modul WHERE status='0'");
		while($r=mysql_fetch_array($modul)){
		?>

		<?php    
		} ?>
		
		<div class="clear"></div>
</div><!--Akhir class isi kanan-->
		<?php     break;
		
		case "install_modul":
			//include "aplikasi/modul/modul_install.php";
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

