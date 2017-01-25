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
<h3>Tambah<?php echo $_SESSION['Bguru']; ?></h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">

<?php 			include "aplikasi/guru/header.php"; ?>
		</div>

		<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=guru&untukdi=tambah'";?> name='tambahguru' id='tambahguru' enctype="multipart/form-data">

			
			<tr><td valign="top" class="isiankanan" width="175px">Nama<?php echo $_SESSION['Bguru']; ?></td><td class="isian">									
					<select name="id_guru">
						<?php    
						$guru=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE posisi='guru' ORDER BY nama_gurustaff ASC");
						while ($g=mysql_fetch_array($guru)){
						echo "<option value='$g[id_gurustaff]'>$g[nama_gurustaff]</option>"; }
						?>
					</select>
				</td></tr>

			<tr><td valign="top" class="isiankanan" width="175px">Tahun Ajaran</td>
			<td class="isian">
					<select name="tahun_ajaran">

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
						
						echo "<option value='".$tahun."/".$tahun0."' selected>".$tahun."/".$tahun0."</option>";
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
			
			<?php 
			$semester=date('m');
			//echo $semester;
			    if ($semester<7){ ?>
					<input type="radio" name="semester" value="1"/>Gasal&nbsp;
					<input type="radio" name="semester" value="0" checked/>Genap
			<?php     }
			else { ?>
			
					<input type="radio" name="semester" value="1" checked/>Gasal&nbsp;
					<input type="radio" name="semester" value="0"/>Genap
			<?php     } ?>
			</td></tr>			
			
			<tr><td valign="top" class="isiankanan" width="175px">Mata Pelajaran</td>
			<td class="isian">
					<select name="mata_pelajaran">
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

						<?php    
						$mapel=mysql_query("SELECT * FROM ".$DB_KODE."_kelas ORDER BY nama_kelas ASC");
						while ($m=mysql_fetch_array($mapel)){
						echo "<option value='$m[id_kelas]'>$m[nama_kelas]</option>"; }
						?>
					</select>
			</td></tr>					
			<tr><td valign="top" class="isiankanan" width="175px">Jumlah Jam Mengajar</td>
			<td class="isian">
			
					<input type="text" name="jam" value="" class="pendek"/>
			
			</td></tr>						
			<tr><td valign="top" class="isiankanan" width="175px">Status Mengajar</td>
			<td class="isian">
			
					<input type="radio" name="status" value="1" checked/>Aktif&nbsp;
					<input type="radio" name="status" value="0"/>Non Aktif
			
			</td></tr>

			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Simpan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahguru");
			frmvalidator.addValidation("nama_guru","req","Nama guru harus diisi");

			//]]>
		</script>
		
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