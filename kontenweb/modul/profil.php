<?php    
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 if (!isset($_SESSION['kontenisi'])){
header ('location:../../index.php');
break;
}



function meta() {
global $ns, $r;
$web=$ns['isi_pengaturan'];
$descx='profil ';
$title='Profil';
$titlez='profil '.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='info '.$titlez;
$isi='';
$description=desc($isi,$descx);
$judul='';
$title=titx($judul,$title);
$title=$title.' - '.$web;
echo "<title>$title</title>
<meta name='description' content='$description'>
<meta name='keywords' content='$keywords'> ";

}

function konten() {
global $DB_KODE, $ns;
?>

<div id="konten">
<div id="lebar">
<h3>Data Profil <?php echo $_SESSION['Bsekolah']; ?></h3>


		<table class="isian">
		
		<?php     	$namasekolah=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan=8");
				$ns=mysql_fetch_array($namasekolah);?>
			<tr><td valign="top" class="isiankanan" width="100px">Nama <?php echo $_SESSION['Bsekolah']; ?></td><td class="isian"><?php     echo $ns['isi_pengaturan'];?></td></tr>
			<tr><td valign="top" class="isiankanan" width="100px">Tahun Berdiri</td><td class="isian"><?php     echo $ns['isi_pengaturan2'];?></td></tr>

				
		<?php     	$telepon=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan=20");
				$t=mysql_fetch_array($telepon);?>
			<tr><td valign="top" class="isiankanan" width="100px">NIS</td><td class="isian"><?php     echo $t['isi_pengaturan'];?></td></tr>
			<tr><td valign="top" class="isiankanan" width="100px">NSS</td><td class="isian"><?php     echo $t['isi_pengaturan2'];?></td></tr>
			
				
		<?php     	$telepon=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan=9");
				$t=mysql_fetch_array($telepon);?>
			<tr><td valign="top" class="isiankanan" width="100px">NISN</td><td class="isian"><?php     echo $t['isi_pengaturan2'];?></td></tr>

			
		<?php     	$email=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan=10");
				$e=mysql_fetch_array($email);?>
			<tr><td valign="top" class="isiankanan" width="100px">Email</td><td class="isian"><?php     echo $e['isi_pengaturan'];?></td></tr>
			
		<?php     	$kepsek=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan=11");
				$k=mysql_fetch_array($kepsek);?>
			<tr><td valign="top" class="isiankanan" width="100px"><?php echo $_SESSION['Bkepala']; ?> <?php echo $_SESSION['Bsekolah']; ?></td><td class="isian"><?php     echo $k['isi_pengaturan'];?></td></tr>
			<tr><td valign="top" class="isiankanan" width="100px">NIP/NIY</td><td class="isian"><?php     echo $k['isi_pengaturan2'];?></td></tr>
						
		<?php     	$alamatsekolah=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan=12");
				$a=mysql_fetch_array($alamatsekolah);?>
			<tr><td valign="top" class="isiankanan" width="100px">Alamat <?php echo $_SESSION['Bsekolah']; ?></td><td class="isian"><?php    echo "$a[isi_pengaturan]";?></td></tr>
			<tr><td valign="top" class="isiankanan" width="100px">Telepon</td><td class="isian"><?php     echo $t['isi_pengaturan'];?></td></tr>




		</table>
		
</div>
</div>	

<?php     } ?>

<?php    
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

