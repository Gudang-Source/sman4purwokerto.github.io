<?php      
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
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
$descx='pengumuman ';
$title='Pengumuman';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='informasi '.$titlez;
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
<h3>Pengumuman <a href=""><?php    echo "$ns[isi_pengaturan]";?></a></h3><br>
<?php    
	$batas= 10;
	$halaman=isset($_GET['halaman']);
		If (empty($halaman)){
		$posisi=0;
		$halaman=1;
		}

		else { $posisi=($halaman-1) * $batas;
		}
		$tampil2 = mysql_query ("SELECT * FROM ".$DB_KODE."_pengumuman");
		$jmldata = mysql_num_rows($tampil2);
		$jmlhal = ceil($jmldata/$batas);
$pengumuman=mysql_query("SELECT * FROM ".$DB_KODE."_pengumuman, ".$DB_KODE."_users WHERE ".$DB_KODE."_pengumuman.s_username=".$DB_KODE."_users.s_username ORDER BY id_pengumuman DESC LIMIT $posisi, $batas");
$cek_pengumuman=mysql_num_rows($pengumuman);

if($cek_pengumuman > 0){
while($r=mysql_fetch_array($pengumuman)){
?>
<table style="margin: 20px 0 10px 0; border-bottom: 1px solid #dcdcdc">
	<tr><th colspan="3"><a href=""><?php    echo "$r[judul_pengumuman]";?></a></th></tr>
	<tr><td width="120px"><b>Tanggal Posting</b></td><td width="3px">:</td><td><?php    echo "$r[tanggal_pengumuman]";?></td></tr>
	<tr><td width="120px"><b>Diterbitkan oleh</b></td><td>:</td width="3px"><td><?php    echo "$r[nama_lengkap_users]";?></td></tr>
	<tr><td colspan="3"><?php    echo "$r[isi_pengumuman]";?></td></tr>
</table>
<?php     } 
		if ($halaman > 1){
		$prev=$halaman-1;
		echo 	"	<div class='hal' style='float: left'><a href='index.php?p=pengumuman&halaman=$prev' title='Halaman Sebelumnya'>&laquo; Sebelumnya</a></div>";
		}
		if ($halaman < $jmlhal) {
		$next=$halaman+1;
		echo "	<div class='hal' style='float: right'><a href='index.php?p=pengumuman&halaman=$next' title='halaman Berikutnya'>Berikutnya &raquo;</a></div>"; }
		}
		else {?>
		<b>Data Pengumuman Belum Tersedia</b>
		<?php     } ?>
</div>
</div>
<?php    } ?>

<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>