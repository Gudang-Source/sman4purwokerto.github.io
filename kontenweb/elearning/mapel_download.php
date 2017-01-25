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
if (isset($_GET['id'])){$id=ceknomor($_GET['id']);} if (isset($_POST['id'])){$id=ceknomor($_POST['id']);}
$detailmateri=mysql_query("SELECT * FROM ".$DB_KODE."_materi, ".$DB_KODE."_mapel, ".$DB_KODE."_guru_staff WHERE ".$DB_KODE."_materi.id_mapel=".$DB_KODE."_mapel.id_mapel
AND ".$DB_KODE."_materi.nip=".$DB_KODE."_guru_staff.nip AND id_materi='$id'");
$data=mysql_fetch_array($detailmateri);

function meta() {
global $ns, $data;
$web=$ns['isi_pengaturan'];
$title=$data['judul_materi'];
$titlez=$data['judul_materi'].' '.$data['nama_mapel'];
$keyw1 = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw2 = strtolower(preg_replace("/\s/",", download ",$titlez));
$keyw=$keyw1.' '.$keyw2;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$isi='';
$desc='download materi '.$title.' '.$data['deskripsi_materi'];
$description=desc($isi,$desc);
$judul='';
$title=titx($judul,$title);
$title=$title.' - '.$data['nama_mapel'].' - '.$web;
echo "<title>Download $title</title>
<meta name='description' content='$description'>
<meta name='keywords' content='$keywords'> ";
}

function konten() {
global $DB_KODE, $ns;
?>
<div id="konten">
<div id="lebar">


<?php 

include "kontenweb/elearning/menu.php"; 

?>


<h3>Download Materi Mata Pelajaran</h3>
<?php 
global $data;
							$download = strtolower(preg_replace("/\s/","9a9z9",$data['judul_materi']));						
							$download = preg_replace('#\W#', '', $download);								
							$download = str_replace("9a9z9","-",$download);
if (isset($_SESSION['siswa']) OR isset($_SESSION['guru'])){							
							$url_download = "download-materi-".$data['id_materi'].".html";
}else{
							$url_download = "login.html";
}
							
?>
		<table style="margin: 20px 0 20px 0;" class="garis">
			<tr class="form"><th class="garis" colspan="2" style="text-align: center">Detail Materi</th></tr>
			<tr class="form"><td width="150px"><b>Judul Materi</b></td><td><?php  echo $data['judul_materi']?></td></tr>
			<tr class="form"><td><b><?php echo $_SESSION['Bguru']; ?> Pengampu</b></td><td><?php  echo $data['nama_gurustaff']?></td></tr>
			<tr class="form"><td><b>Tanggal Upload</b></td><td><?php  echo $data['tanggal_upload']?></td></tr>
			<tr class="form"><td><b>Mata Pelajaran</b></td><td><?php  echo $data['nama_mapel']?></td></tr>
			<tr class="form"><td><b>Deskripsi</b></td><td><?php  echo $data['deskripsi_materi']?></td></tr>
			<tr class="form"><td><b>Jumlah Download</b></td><td><b><u><a href=""><?php  echo $data['download']?></a></u></b>
			</td></tr>
			<tr class="form"><td><b>Download</b></td><td><a href="<?php  echo $url_download;?>"><b>[DOWNLOAD]</b></a></td></tr>
		</table>

<span class='st_fblike_vcount' displayText='Facebook Like'></span>
<span class='st_plusone_vcount' displayText='Google +1'></span>
<span class='st_facebook_vcount' displayText='Facebook'></span>
<span class='st_googleplus_vcount' displayText='Google +'></span>
<span class='st_twitter_vcount' displayText='Tweet'></span>
<span class='st_blogger_vcount' displayText='Blogger'></span>
<span class='st_wordpress_vcount' displayText='WordPress'></span>
<span class='st_sharethis_vcount' displayText='ShareThis'></span>
<br><br>
<?php  $xx=gett();?>

<h3>Diskusi</h3>
<br>
<form method="POST" action="kontenweb/insert_komentar.php&t=materi&?x=<?php echo $xx;?>" id="formkomentar" name="formkomentar">
<?php     echo "<input type='hidden' name='id' value='$data[id_materi]'>";?>
<table>
<?php if(isset($_COOKIE["userformulasi"])){		?>					
	<tr><td width="75px"><b>Nama </b></td><td><input type="hidden" name="nama" class="sedang" value="<?php echo $_COOKIE["userformulasi"];?>"><?php echo $_COOKIE["userformulasi"];?></td></tr>
<?php     }else{ ?>							
	<tr><td width="75px"><b>Nama *</b></td><td><input type="text" name="nama" class="sedang" value=""></td></tr>
<?php    } ?>
<?php if(isset($_COOKIE["usermail"])<>''){		?>
<input type="hidden" name="email" value="<?php echo $_COOKIE["usermail"];?>" class="sedang">
<?php     }else{ ?>
	<tr><td><b>Email *</b></td><td><input type="text" name="email" class="sedang">&nbsp;<small><i>Tidak akan diterbitkan</i></small></td></tr>
<?php     }  ?>
<?php if(isset($_COOKIE["userurl"])<>''){		?>
<input type="hidden" name="url" class="sedang" value="<?php echo $_COOKIE["userurl"];?>">
<?php     }else{ ?>
	<tr><td><b>Url </b></td><td><input type="text" name="url" class="sedang">&nbsp;<small><i>masukkan tanpa Http:// contoh :<b>www.m-edukasi.web.id</b></b></i></small></td></tr>
<?php     }  ?>
<tr><td><b>Diskusi</b></td><td>
	<textarea name="komentar" style="width: 200px; height: 75px;"></textarea>
	</td></tr>
	<tr><td></td><td><img src="kontenweb/captcha-pesan.php?date=<?php    echo date('YmdHis');?>" alt="security image" /></td></tr>
	<tr><td></td><td><input type="text" name="kode" class="pendek">&nbsp;<small><i>Masukkan kode diatas</i></td></tr>
	<tr><td></td><td><input type="submit" class="tombol" value="Kirim">&nbsp;<input type="reset" class="tombol" value="Reset"></td></tr>
</table>
</form>
<?php     include "kontenweb/tema/form_komentar.php";?>

<?php    
$hitung_komentar_ini=mysql_query("SELECT * FROM ".$DB_KODE."_komentar WHERE status_terima='1' AND id_materi='$data[id_materi]'");
$jml_komentar_ini=mysql_num_rows($hitung_komentar_ini); ?>
<br>
<h3>Ada <?php     echo $jml_komentar_ini?> komentar untuk materi ini</h3>
<ul style="list-style: none; padding-left: 5px;">
	<?php     $komentar=mysql_query("SELECT * FROM ".$DB_KODE."_komentar WHERE status_terima='1' AND id_materi='$data[id_materi]' ORDER BY id_komentar DESC");
			while($k=mysql_fetch_array($komentar)){ ?>
	<li style="padding: 5px 0 5px 0; border-bottom: 1px solid #dcdcdc">
	<p><b><?php    echo "<a href=''>$k[nama_komentar]</a>";?></b><br><small><?php    echo "$k[tanggal_komentar]";?></small></p>
	<p><?php    echo "$k[isi_komentar]"?></p>
	<?php     } ?>
	</li>
		
</ul>					
<?php 
include "kontenweb/elearning/footer.php"; 
include "kontenweb/elearning/menu.php"; 
?>
		
		
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

