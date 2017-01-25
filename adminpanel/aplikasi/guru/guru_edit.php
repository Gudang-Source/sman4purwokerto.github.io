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

?>

<h3>Edit<?php echo $_SESSION['Bguru']; ?></h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">

<?php 			include "aplikasi/guru/header.php"; ?>
		</div>
<table border="0">
<tr><td>
		<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=guru&untukdi=edit'";?> name='editguru' id='editguru' enctype="multipart/form-data">
		<?php    $id=ceknomor($_GET['id']);
		$edit=mysql_query("SELECT * FROM ".$DB_KODE."_guru_mapel, ".$DB_KODE."_guru_staff,  ".$DB_KODE."_mapel, ".$DB_KODE."_jurusan, ".$DB_KODE."_kelas WHERE ".$DB_KODE."_guru_mapel.id_gurustaff=".$DB_KODE."_guru_staff.id_gurustaff AND ".$DB_KODE."_guru_mapel.id_jurusan=".$DB_KODE."_jurusan.id_jurusan AND ".$DB_KODE."_guru_mapel.id_kelas=".$DB_KODE."_kelas.id_kelas AND ".$DB_KODE."_guru_mapel.id_mapel=".$DB_KODE."_mapel.id_mapel  AND id_gurumapel=$id");
		$r=mysql_fetch_array($edit);

		echo "<input type='hidden' name='t' value='$t'>";
		echo "<input type='hidden' name='id' value='$r[id_gurumapel]'>";
		echo "<input type='hidden' name='id_guru' value='$r[id_gurustaff]'>";
		?>
			
			<tr><td valign="top" class="isiankanan" width="175px">Nama<?php echo $_SESSION['Bguru']; ?></td><td class="isian"><?php    echo"$r[nama_gurustaff]";?></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">NIP</td><td class="isian"><?php    echo"$r[nip]";?></td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Tahun Ajaran</td>
			<td class="isian">
					<select name="tahun_ajaran">
						<option value="<?php    echo "$r[tahun_ajaran]";?>" selected><?php    echo "$r[tahun_ajaran]";?></option>
						<?php    
						$tahunx=date('Y');
						if (date('m')<7){
						$tahun=$tahunx-1;
						}else{
						$tahun=$tahunx;
						}
						$tahun0=$tahun+1;
						$tahun1=$tahun-1;
						$tahun2=$tahun-2;
						$tahun3=$tahun-3;
						$tahun4=$tahun-4;
						$tahun5=$tahun-5;
						
						echo "<option value='".$tahun."/".$tahun0."'>".$tahun."/".$tahun0."</option>";
						echo "<option value='".$tahun1."/".$tahun."'>".$tahun1."/".$tahun."</option>";
						echo "<option value='".$tahun2."/".$tahun1."'>".$tahun2."/".$tahun1."</option>";
						echo "<option value='".$tahun3."/".$tahun2."'>".$tahun3."/".$tahun2."</option>";
						echo "<option value='".$tahun4."/".$tahun3."'>".$tahun4."/".$tahun3."</option>"; 
						echo "<option value='".$tahun5."/".$tahun4."'>".$tahun5."/".$tahun4."</option>"; 

						?>
					</select>
			</td></tr>
			<tr><td valign="top" class="isiankanan" width="175px">Semester</td>
			<td class="isian">
			<?php     if ($r[semester]=='1'){ ?>
					<input type="radio" name="semester" value="1" checked/>Gasal&nbsp;
					<input type="radio" name="semester" value="0"/>Genap
			<?php     }
			else { ?>
					<input type="radio" name="semester" value="1"/>Gasal&nbsp;
					<input type="radio" name="semester" value="0" checked/>Genap
			<?php     } ?>
			</td></tr>			
			
			<tr><td valign="top" class="isiankanan" width="175px">Mata Pelajaran</td>
			<td class="isian">
					<select name="mata_pelajaran">
						<option value="<?php    echo "$r[id_mapel]";?>" selected><?php    echo "$r[nama_mapel]";?></option>
						<?php    
						$mapel=mysql_query("SELECT * FROM ".$DB_KODE."_mapel ORDER BY nama_mapel ASC");
						while ($m=mysql_fetch_array($mapel)){
						echo "<option value='$m[id_mapel]'>$m[nama_mapel]</option>"; }
						?>
					</select>
			</td></tr>			
			<tr><td valign="top" class="isiankanan" width="175px">Jurusan</td>
			<td class="isian">
					<select name="jurusan">
						<option value="<?php    echo "$r[id_jurusan]";?>" selected><?php    echo "$r[nama_jurusan]";?></option>
						<?php    
						$mapel=mysql_query("SELECT * FROM ".$DB_KODE."_jurusan ORDER BY nama_jurusan ASC");
						while ($m=mysql_fetch_array($mapel)){
						echo "<option value='$m[id_jurusan]'>$m[nama_jurusan]</option>"; }
						?>
					</select>
			</td></tr>	
			<tr><td valign="top" class="isiankanan" width="175px">Kelas/Tingkat</td>
			<td class="isian">
					<select name="kelas">
						<option value="<?php    echo "$r[id_kelas]";?>" selected><?php    echo "$r[nama_kelas]";?></option>
						<?php    
						$mapel=mysql_query("SELECT * FROM ".$DB_KODE."_kelas ORDER BY nama_kelas ASC");
						while ($m=mysql_fetch_array($mapel)){
						echo "<option value='$m[id_kelas]'>$m[nama_kelas]</option>"; }
						?>
					</select>
			</td></tr>					
			<tr><td valign="top" class="isiankanan" width="175px">Jumlah Jam Mengajar</td>
			<td class="isian">
			
					<input type="text" name="jam" value="<?php    echo "$r[jumlah_jam]";?>" class="pendek"/>
			
			</td></tr>							
			<tr><td valign="top" class="isiankanan" width="175px">Status Mengajar</td>
			<td class="isian">
			<?php     if ($r[status]=='1'){ ?>
					<input type="radio" name="status" value="1" checked/>Aktif&nbsp;
					<input type="radio" name="status" value="0"/>Non Aktif
			<?php     }
			else { ?>
					<input type="radio" name="status" value="1"/>Aktif&nbsp;
					<input type="radio" name="status" value="2" checked/>Non Aktif
			<?php     } ?>
			</td></tr>

			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editguru");
			frmvalidator.addValidation("nama_guru","req","Nama guru harus diisi");

			//]]>
		</script>
		
		</table>
	</td>
	<td><img src="../images/foto/guru/<?php    echo "$r[foto]";?>" width="200px">
				
				
				
				</td>
	
</table>
</div><!--Akhir class isi kanan-->
<?php   }
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>