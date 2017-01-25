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
$descx='profil guru elearning ';
$title='Profil guru Elearning';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='modul pelajaran '.$titlez;
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

include "kontenweb/elearning/menu.php"; 
?>

<h3>Profil Anda</h3>
<?php 
if (isset($_SESSION['guru'])){
$profilsaya=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff, ".$DB_KODE."_mapel WHERE ".$DB_KODE."_guru_staff.id_mapel=".$DB_KODE."_mapel.id_mapel AND nip='$_SESSION[guru]'");
$ps=mysql_fetch_array($profilsaya);
							$guru=$ps['nama_gurustaff'].'9a9z9'.$ns['isi_pengaturan'];							
						    $guru = strtolower(preg_replace("/\s/","9a9z9",$guru));
							$guru = preg_replace('#\W#', '', $guru);								
							$guru = str_replace("9a9z9","-",$guru);
							$passurl_guru = "ubah-password-".$ps['nip']."-".$guru.".html";
?>		<form method="POST" action="kontenweb/elearning/proses.php?pilih=guru&untukdi=edit" name="editprofil" id="editprofil">
		<?php 
		echo "<input type='hidden' name='nip' value='$_SESSION[guru]'>";
		?>
		<table style="margin: 20px 0 20px 0;"><input type="hidden" class="panjang"  name="nama_gurustaff" value="<?php  echo $ps['nama_gurustaff']?>" >
			<tr class="form"><th class="garis" colspan="3" style="text-align: center">Data <?php echo $_SESSION['Bguru']; ?></th></tr>
			<tr class="form"><td rowspan="4"  width="160px"><img src="images/foto/guru/<?php  echo $ps['foto']?>" width="150px" style="padding: 10px; background: #fff; border: 1px solid #dcdcdc;"></td>
			<td><b>Nama</b></td><td><input type="text" class="panjang"   value="<?php  echo $ps['nama_gurustaff']?>" disabled></td></tr>
			<tr class="form"><td><b>NIP</b></td><td><input type="text" class="panjang" value="<?php  echo $ps['nip']?>" disabled></td></tr>
			<tr class="form"><td><b>Mengajar</b></td><td><input type="text" class="panjang" value="<?php  echo $ps['nama_mapel']?>" disabled></td></tr>
			<tr class="form"><td><b>Password</b></td><td>
			<a href="<?php  echo $passurl_guru; ?>"><b><u>Ganti Password</u></b></a>
			</td></tr>
		</table>
		
		<table>
			<tr class="form"><th class="garis" colspan="3" style="text-align: center">Data Personal</th></tr>
			<tr class="form"><td><b>Tempat, Tanggal Lahir</b></td><td><input type="text" class="sedang" value="<?php  echo $ps['tempat_lahir']?>" disabled>, <input type="text" class="pendek" value="<?php  echo $ps['tanggal_lahir']?>" disabled></td></tr>
			<tr class="form"><td><b>Alamat</b></td><td colspan="2"><textarea name="alamat"><?php  echo $ps['alamat']?></textarea></td></tr>
			<tr class="form"><td><b>Email</b></td><td><input type="text" name="email" class="panjang" value="<?php  echo $ps['email']?>"></td></tr>
			<tr class="form"><td><b>Telepon</b></td><td><input type="text" name="telepon" class="panjang" value="<?php  echo $ps['telepon']?>"></td></tr>
			<tr class="form"><td><b>Pendidikan Terakhir</b></td><td><input type="text" class="panjang" value="<?php  echo $ps['pendidikan_terakhir']?>" disabled></td></tr>
			<tr class="form"><td><b>Tahun Masuk</b></td><td><input type="text" class="panjang" value="<?php  echo $ps['tahun_masuk']?>" disabled></td></tr>
			<tr class="form"><td><b>Status Perkawinan</b></td><td><input type="text" class="panjang" value="<?php  echo $ps['status_kawin']?>" disabled></td></tr>
			<tr class="form"><td></td><td><input type="submit" class="tombol" value="Simpan"></td></tr>
		
		</table>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editprofil");
			frmvalidator.addValidation("email","email","Format email salah");
			//]]>
		</script>
<?php  }

if (isset($_SESSION['siswa'])){
$profilsaya=mysql_query("SELECT * FROM ".$DB_KODE."_siswa, ".$DB_KODE."_kelas WHERE ".$DB_KODE."_siswa.id_kelas=".$DB_KODE."_kelas.id_kelas AND nis='$_SESSION[siswa]'");
$ps=mysql_fetch_array($profilsaya);
							global $ns;
							$siswa=$ps['nama_siswa'].'9a9z9'.$ns['isi_pengaturan'];							
						    $siswa = strtolower(preg_replace("/\s/","9a9z9",$siswa));
							$siswa = preg_replace('#\W#', '', $siswa);								
							$siswa = str_replace("9a9z9","-",$siswa);
							$purl_siswa = "edit-profil-".$ps['nis']."-".$siswa.".html";
							$passurl_siswa = "ubah-password-".$ps['nis']."-".$siswa.".html";
							$url_siswa = "siswa-mata-pelajaran-".$ps['nis']."-".$siswa.".html";
?>		<form method="POST" action="kontenweb/elearning/proses.php?pilih=siswa&untukdi=edit" name="editprofil" id="editprofil">
		<?php 
		echo "<input type='hidden' name='nis' value='$_SESSION[siswa]'>";
		?>
		<table style="margin: 20px 0 20px 0;"><input type="hidden" class="panjang" name="nama_siswa" value="<?php  echo $ps['nama_siswa']?>">
			<tr class="form"><th class="garis" colspan="3" style="text-align: center">Data <?php echo $_SESSION['Bsiswa'];?></th></tr>
			<tr class="form"><td><b>Nama</b></td><td><input type="text" class="panjang" a" value="<?php  echo $ps['nama_siswa']?>" disabled></td></tr>
			<tr class="form"><td><b>NIS</b></td><td><input type="text" class="panjang" value="<?php  echo $ps['nis']?>" disabled></td></tr>
			<tr class="form"><td><b>Kelas</b></td><td><input type="text" class="panjang" value="<?php  echo $ps['nama_kelas']?>" disabled></td></tr>
			<tr class="form"><td><b>Password</b></td><td>
			<a href="<?php  echo $passurl_siswa; ?>"><b><u>Ganti Password</u></b></a>
			</td></tr>
		</table>
		
		<table>
			<tr class="form"><th class="garis" colspan="3" style="text-align: center">Data Personal</th></tr>
			<tr class="form"><td><b>Tempat, Tanggal Lahir</b></td><td><input type="text" class="sedang" value="<?php  echo $ps['tempat_lahir']?>" disabled>, <input type="text" class="pendek" value="<?php  echo $ps[tanggal_lahir]?>" disabled></td></tr>
			<tr class="form"><td><b>Alamat</b></td><td colspan="2"><textarea name="alamat"><?php  echo $ps['alamat']?></textarea></td></tr>
			<tr class="form"><td><b>Email</b></td><td><input type="text"  name="email" class="panjang" value="<?php  echo $ps['email']?>"></td></tr>
			<tr class="form"><td><b>Telepon</b></td><td><input type="text"  name="telepon" class="panjang" value="<?php  echo $ps['telepon']?>"></td></tr>
			<tr class="form"><td><b><?php echo $_SESSION['Bsekolah'];?> Asal</b></td><td><input type="text" class="panjang" value="<?php  echo $ps['sekolah_asal']?>" disabled></td></tr>
			<tr class="form"><td><b>Tahun Registrasi</b></td><td><input type="text" class="panjang" value="<?php  echo $ps['tahun_registrasi']?>" disabled></td></tr>
			<tr class="form"><td><b>Nama Orang Tua</b></td><td><input type="text" class="panjang" value="<?php  echo $ps['nama_ortu']?>" disabled></td></tr>
			<tr class="form"><td></td><td><input type="submit" class="tombol" value="Simpan"></td></tr>
		
		</table>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editprofil");
			frmvalidator.addValidation("email","email","Format email salah");
			//]]>
		</script>
<?php  } ?>
<?php 
include "kontenweb/elearning/footer.php"; 
include "kontenweb/elearning/menu.php"; 
?>		
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

