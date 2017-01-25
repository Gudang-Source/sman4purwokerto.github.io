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



$database="aplikasi/sensor/sensor.php";
switch($_GET['pilih']){
default: ?>
<h3>Sensor Kata</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
<?php 			include "aplikasi/sensor/header.php"; ?>
		</div>

		
		<div class="atastabel" style="margin-bottom: 10px">
	Sensor kata kotor ini akan digunakan pada form yang bersifat publik seperti komentar, buku tamu, shoutbox, chat, dll.
		</div>
	<div class="kanankecil">	
	
	<center><h3>DAFTAR KATA</h3></center>
		<table class="tabel"  id="results" width="">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel">Kata Kotor</th>
				<th class="tabel">Ganti Kata</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php    
				$no=1;
				$sensor=mysql_query("SELECT * FROM ".$DB_KODE."_sensor ORDER BY kata_filter ASC");
				while ($m=mysql_fetch_array($sensor)){
				?>
			<tr class="tabel">
				<td class="tabel"><?php    echo "$no";?></td>
				<td class="tabel"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_filter_kata]";?>"><?php    echo "$m[kata_filter]";?></a></td>
				<td class="tabel">
					<?php     echo "$m[ganti_filter]";?>
				</td>

				<td class="tabel">
				<?php    
				if ($m[id_filter_kata]== 1) {
				?>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_filter_kata]";?>">edit</a></div>
				<?php     }
				else {
				?>
					<div class="hapusdata"><a href="<?php    echo "$database?t=$token&pilih=sensor&untukdi=hapus&id=$m[id_filter_kata]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php    echo "?t=$token&pilih=edit&id=$m[id_filter_kata]";?>">edit</a></div>
				<?php     } ?>	
				</td>
			</tr>
			<?php    
			$no++;
			}
			?>
			
		</table>
				<div class="atastabel" style="margin: 5px 10px 0 10px">
				<div id="pageNavPosition"></div>
		</div>
		<div class="atastabel" style="margin: 5px 10px 0 10px">
		<?php    
			$jumlahtampil=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='3'");
			$jt=mysql_fetch_array($jumlahtampil);
		?>
			    <script type="text/javascript"><!--
        var pager = new Pager('results',<?php     echo "$jt[isi_pengaturan]"; ?>); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
		</div>
	</div>	
	

	
	<div class="kanankecil">
	<center><h3>SETTING</h3></center>
			<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=sensor&untukdi=setting'"; ?> name='settingsensor' id='settingsensor' >
			
			<tr><td valign="top" class="isiankanan" style="width: 100px;">Status</td><td class="isian">
			<select name="isi_pengaturan" >
					
					 
		<?php     	$sensor1=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE nama_pengaturan='sensor'");
				$sb1=mysql_fetch_array($sensor1);				
				if	 ($sb1['isi_pengaturan']==1){
					echo "<option value='1' selected>Ganti Kata</option>";
					echo "<option value='2' >Ganti Masal</option>";
					echo "<option value='0' >Non Aktif</option>";
				}elseif($sb1['isi_pengaturan']==2){
					echo "<option value='1'>Ganti Kata</option>";
					echo "<option value='2'  selected>Ganti Masal</option>";
					echo "<option value='0' >Non Aktif</option>";
				}else{
					echo "<option value='1'>Ganti Kata</option>";
					echo "<option value='2' >Ganti Masal</option>";
					echo "<option value='0'  selected>Non Aktif</option>";				
				}
		
				 ?>
				</select><small> Pilih apakah Sensor Kata akan digunakan?</small>
			</td></tr>	
			
			<tr><td valign="top" class="isiankanan" style="width: 40px;">Kata Ganti Masal</td><td class="isian">
				<input type="text" name="isi_pengaturan2" <?php     echo "value='$sb1[isi_pengaturan2]'"; ?>><br>
				<small> Kata Ganti secara keseluruhan tiapkata kotor</small>
			</td></tr>	
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Edit">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		
		</table>
	</div>
	<?php if(isset($_GET['id'])){ ?>
		<div class="kanankecil">
	<center><h3>EDIT KATA</h3></center>
		<table class="isian">
		<?php    $id=ceknomor($_GET['id']); $edit=mysql_query("SELECT * FROM ".$DB_KODE."_sensor WHERE id_filter_kata='$id'");
				$r=mysql_fetch_array($edit);?>
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=sensor&untukdi=edit'"; ?> name='editsensor' id='editsensor' >
			<?php     echo "<input type='hidden' name='id' value='$r[id_filter_kata]'";?>
			<tr><td valign="top" class="isiankanan" width="175px">Kata Kotor</td><td class="isian"><input type="text" name="kata_filter" class="maksimal"<?php     echo "value='$r[kata_filter]'"; ?>></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="175px">Ganti</td><td class="isian"><input type="text" name="ganti_filter" class="maksimal"<?php     echo "value='$r[ganti_filter]'";?></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editsensor");
			frmvalidator.addValidation("kata_filter","req","Kata Sensor harus diisi");
			frmvalidator.addValidation("ganti_filter","req","Ganti Kata Sensor harus diisi");
			frmvalidator.addValidation("kata_filter","maxlen=30","Kata Sensor maksimal 30 karakter");
			//]]>
		</script>
		
		</table>	
		</div>
	<?php }else{ ?>
		<div class="kanankecil">
	<center><h3>TAMBAH KATA</h3></center>
		<table class="isian">
		<form method='POST'<?php     echo "action='$database?t=$token&pilih=sensor&untukdi=input'"; ?> name='inputsensor' id='inputsensor' >
			
			<tr><td valign="top" class="isiankanan" width="175px">Kata Kotor</td><td class="isian"><input type="text" name="kata_filter" class="maksimal"></td></tr>
			
			<tr><td valign="top" class="isiankanan" width="175px">Ganti</td><td class="isian"><input type="text" name="ganti_filter" class="maksimal" ></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("inputsensor");
			frmvalidator.addValidation("kata_filter","req","Kata Sensor harus diisi");
			frmvalidator.addValidation("ganti_filter","req","Ganti Kata Sensor harus diisi");
			frmvalidator.addValidation("kata_filter","maxlen=30","Kata Sensor maksimal 30 karakter");
			//]]>
		</script>
		
		</table>	
	</div>
	<?php } ?>
</div><!--Akhir class isi kanan-->
		<?php     break;
		

		
		case "edit":
			include "aplikasi/sensor/sensor_edit.php";
		}
		?>
	

<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

}
?>

