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
$title='Selesai Pendaftaran '.$_SESSION['Bsiswa'].' Baru';
$descx=strtolower($title).' ';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='psb '.$titlez;
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
<?php    
$statuspsb=mysql_query("SELECT *FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan ='15'");
$r=mysql_fetch_array($statuspsb);
if ($r['nama_pengaturan'] > 0){


$logo=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='13'");
				$l=mysql_fetch_array($logo);
$_SESSION['sekolah_logo']=$l['isi_pengaturan'];
$nama=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='8'");
				$namas=mysql_fetch_array($nama);
$_SESSION['sekolah_nama']=$namas['isi_pengaturan'];
$alamat=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='12'");
				$alamats=mysql_fetch_array($alamat);
$_SESSION['sekolah_alamat']=$alamats['isi_pengaturan'];

$tlp=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='9'");
				$tlps=mysql_fetch_array($tlp);
$_SESSION['sekolah_tlp']=$tlps['isi_pengaturan'];

?>


<h3>Terimakasih telah mendaftar di <a href=""><?php    echo "$ns[isi_pengaturan]";?></a></h3> 
email yang Anda gunakan untuk medaftar adalah <b><?php echo $_SESSION['email_psb']; ?></b> tidak dapat dipergunakan untuk medaftar kembali.<hr><br>

<table class="garis">	
<tr class="form">
	<th  style="text-align: center"><table border="1" width='100px' height="150"><tr><td valign="middle" align="center">PAS FOTO<br>dilengkapi saat konfirmasi pendaftaran</td></tr></table></th>
	<th style="text-align: center">
	Panitia Penerimaan Peserta Didik Baru
	<h1 style="font-size:26pt;"><?php echo $_SESSION['sekolah_nama']?></h1>
	<?php  echo $_SESSION['sekolah_alamat']?><br><?php echo $_SESSION['sekolah_tlp']?>
	</th>
</tr>
<tr class="form">
	<th  style="text-align: center" colspan="2">
		<table class="garis">	<tr class="form"><th class="garis" colspan="2" style="text-align: center">DATA PENDAFTARAN</th></tr>
				<tr class="form" ><th  style="text-align: center"><img src="images/foto/psb/<?php echo $_SESSION['foto_psb']?>" border="0" width='130px' height='200px'></th><th valign="top" style="text-align: left">
				
			<table >	
				<tr class="form"><td><b>No. Peserta Ujian Nasional</b></td><td>:</td><td><?php echo $_SESSION['no_sttb_psb']?></td></tr>
				<tr class="form"><td><b>Nama</b></td><td>:</td><td><?php echo $_SESSION['nama_psb'] ?></td></tr>
				<?php  if ($_SESSION['jk_psb']=='L'){ $jks="Laki-laki";}else {$jks="Perempuan";} ?>			
				<tr class="form"><td><b>Jenis Kelamin</b></td><td>:</td><td><?php echo $jks?></td></tr>
				<tr class="form"><td><b>Tempat, Taggal Lahir</b></td><td>:</td><td><?php echo $_SESSION['tmp_psb'] ?>,<?php echo $_SESSION['tgl_psb'] ?></td></tr>
				<tr class="form"><td><b>Asal <?php echo $_SESSION['Bsekolah']; ?></b></td><td>:</td><td><?php echo $_SESSION['sekolah_asal_psb'] ?></td></tr>
				<tr class="form"><td><b>Tanggal Pendaftaran</b></td><td>:</td><td><?php echo $_SESSION['tgldaf_psb'] ?></td></tr>				
			</table>	
		</th></tr>
		<tr class="form"><th  colspan="2" style="text-align: center"><br><br>silahkan print bukti pendaftaran anda<br>
		<form target="_blank" action="print-data-pendaftaran-psb.html">
					
			<INPUT type="submit" value="PRINT BUKTI PENDAFTARAN"  > 
			</form>
		</th></tr>
		</table>	
	</th>
</tr></table>	
<?php  



   echo "$r[isi_pengaturan2]";
							$judul=$ns['isi_pengaturan'];
						    $judul = strtolower(preg_replace("/\s/","-",$judul));
echo "Klik <a href='data-psb-penerimaan-siswa-baru-$judul.html'>disini</a> untuk melihat data pendaftar";
}?>
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