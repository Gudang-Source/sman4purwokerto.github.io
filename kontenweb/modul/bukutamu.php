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
$title='Buku Tamu';
$descx=strtolower($title).' ';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='guest book '.$titlez;
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
<h3>Buku Tamu</h3>
<p style="margin-top: 20px">
Silahkan mengisi buku tamu pada form dibawah ini untuk memberikan kritik maupun saran kepada kamu. Setiap buku tamu yang masuk, kami akan sangat menghargainya.
</p>
<?php  $xx=gett();?>

<form method="POST" action="kontenweb/insert_bukutamu.php?x=<?php echo $xx;?>" name="formbuku" id="formbuku">
<table style="margin-top: 20px">
	<tr><td><b>Nama *</b><td>:</td><td><input type="text" class="sedang" name="nama">&nbsp;<small><i>Harus diisi</i></small></td></tr>
	<tr><td><b>Email *</b><td>:</td><td><input type="text" class="sedang" name="email">&nbsp;<small><i>Harus diisi (Tidak akan diterbitkan)</i></small></td></tr>
	<tr><td><b>Subjek *</b><td>:</td><td><input type="text" class="panjang" name="subjek"></td></tr>
	<tr><td><b>Pesan *</b><td>:</td><td><textarea name="pesan" style="height: 150px"></textarea></td></tr>
	<tr><td>&nbsp;</td><td></td><td>
	<img src="kontenweb/captcha-pesan.php?date=<?php    echo date('YmdHis');?>" alt="security image" />
	</td></tr>
	<tr><td>&nbsp;</td><td></td><td><input type="text" name="kode" class="pendek">&nbsp;<small><i>Masukkan kode diatas</i></td></tr>
	<tr><td>&nbsp;</td><td></td><td><input type="submit" class="tombol" value="Kirim">&nbsp;<input type="reset" class="tombol" value="Reset"></td></tr>

</table>
</form>
<?php     include "kontenweb/tema/form_bukutamu.php";?>

<?php    
$tampilpesan=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='16'");
$tp=mysql_fetch_array($tampilpesan);
if ($tp['isi_pengaturan']== 1){
?>

<ul style="list-style: none; padding-left: 5px;">
	<?php     $bukutamu=mysql_query("SELECT * FROM ".$DB_KODE."_buku_tamu WHERE status='1' ORDER BY id_bukutamu DESC");
			while($b=mysql_fetch_array($bukutamu)){ ?>
	<li style="padding: 5px 0 5px 0; border-bottom: 1px solid #dcdcdc">
	<p><b><?php    echo "<a href=''>$b[nama_bukutamu]</a>";?></b><br><small><?php    echo "$b[tanggal_kirim]";?></small></p>
	<p><?php    echo "$b[isi_pesan]"?></p>
	<?php     } ?>
	</li>
		
</ul>
<?php     } ?>
</div>
</div>
<?php     } ?>

<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

