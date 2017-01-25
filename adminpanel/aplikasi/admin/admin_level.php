<?php    
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
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

$database="aplikasi/admin/admin.php";

?>
<h3>Menejemen Level Administrator</h3>
<div class="isikanan"><!--Awal class isi kanan-->

		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="admin.php?t=<?php echo $token; ?>">Edit Admin</a></div>
			<div class="menuhorisontalaktif"><a href="admin.php?t=<?php echo $token; ?>&pilih=level">Level Admin</a></div>
		</div>

	<div class="clear"></div>
								
		<div class="judulbox">Level Admin</div>
		<?php    
		if($_SESSION['leveluser'] == '0') {

		
		$pengaturanadmin=mysql_query("SELECT * FROm ".$DB_KODE."_pengaturan WHERE id_pengaturan='2'");
		$pa=mysql_fetch_array($pengaturanadmin);
		?>
		<style>
		.tabelx {
		align:center;
	padding:0px;
	border:1px solid black;
	margin-left:10px;
	border-collapse:collapse;
}	
.tabelx th{
	padding:0px;
	width:5px;
}
.tabelx td{
text-align:center;
	border:1px solid black;
	padding:0px;
	width:5px;
}			
.tabelx th p{
    -webkit-transform: rotate(269deg);
    -moz-transform: rotate(269deg);
    -o-transform: rotate(269deg);
    writing-mode: tb-lr ;
	padding:0px;
}
</style>

		
		<table class="tabelx" style="padding:0px">
			<tr>
				<th class="tabelx" height="155" >No</th>
				<th class="tabelx" width="200">Nama Level</th>
				<th class="tabelx" style="padding:0px"><p  id="m">Informasi</p ></th>
				<th class="tabelx" style="padding:0px"><p  id="m">Album</p ></th>
				<th class="tabelx" style="padding:0px"><p  id="m">Berita</p ></th>
				<th class="tabelx" style="padding:0px"><p  id="m">Buku Tamu</p ></th>
				<th class="tabelx" style="padding:0px"><p  id="m"><?php echo $_SESSION['Bguru']; ?></p ></th>
				<th class="tabelx" style="padding:0px"><p  id="m"><?php echo $_SESSION['Bsiswa']; ?></p ></th>
				<th class="tabelx" style="padding:0px"><p  id="m">PSB</p ></th>
				<th class="tabelx" style="padding:0px"><p  id="m">PBM</p ></th>
				<th class="tabelx" style="padding:0px"><p  id="m">Import</p ></th>
				<th class="tabelx" style="padding:0px"><p  id="m">Jadwal</p ></th>
				<th class="tabelx" style="padding:0px"><p  id="m">Raport</p ></th>
				<th class="tabelx" style="padding:0px"><p  id="m">UN</p ></th>
				<th class="tabelx" style="padding:0px"><p  id="m">Ekstra</p ></th>
				<th class="tabelx" style="padding:0px"><p  id="m">Perpus</p ></th>
				<th class="tabelx" style="padding:0px"><p  id="m">Sarana</p ></th>
				<th class="tabelx" style="padding:0px"><p  id="m">Prakerin</p ></th>
				<th class="tabelx" style="padding:0px"><p  id="m">BKK</p ></th>
				<th class="tabelx" style="padding:0px"><p  id="m">UP</p ></th>	
				<th class="tabelx" style="padding:0px"><p  id="m">DUDI</p ></th>
				<th class="tabelx" style="padding:0px"><p  id="m">Tata Usaha</p ></th>	
				<th class="tabelx" style="padding:0px"><p  id="m">Plugin/ Modul</p ></th>					
			</tr>
			<?php     	$no=1;
					$admin=mysql_query("SELECT * FROM ".$DB_KODE."_user_group");
					while($ad=mysql_fetch_array($admin)){?>
			<tr class="tabelx">
				<td style="padding:0px"><?php    echo "$no";?></td>
				<td style="padding:0px"><b><?php    echo "$ad[nama_group]";?></b></td>

				<td style="padding:0px">
				<?php
				$s1=$ad['informasi_sekolah'];
				if ($s1==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=informasi_sekolah";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=informasi_sekolah";?>"><img src="images/ok.gif"></a>
				<?php  }	?>				
				</td>
				<td style="padding:0px">
				<?php
				$s2=$ad['album_galeri'];
				if ($s2==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=album_galeri";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=album_galeri";?>"><img src="images/ok.gif"></a>
				<?php  }	?>					
				</td>
				<td style="padding:0px">
				<?php
				$s3=$ad['berita'];
				if ($s3==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=berita";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=berita";?>"><img src="images/ok.gif"></a>
				<?php  }	?>
				</td>
				<td style="padding:0px">
				<?php
				$s4=$ad['buku_tamu'];
				if ($s4==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=buku_tamu";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=buku_tamu";?>"><img src="images/ok.gif"></a>
				<?php  }	?>
				</td>
				<td style="padding:0px">
				<?php
				$s5=$ad['guru_staff'];
				if ($s5==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=guru_staff";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=guru_staff";?>"><img src="images/ok.gif"></a>
				<?php  }	?>
				</td>
				<td style="padding:0px">
				<?php
				$s6=$ad['siswa'];
				if ($s6==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=siswa";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=siswa";?>"><img src="images/ok.gif"></a>
				<?php  }	?>
				</td>
				<td style="padding:0px">
				<?php
				$s7=$ad['psb_online'];
				if ($s7==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=psb_online";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=psb_online";?>"><img src="images/ok.gif"></a>
				<?php  }	?>
				</td>
				
				<td style="padding:0px">
				<?php
				$s8=$ad['pbm'];
				if ($s8==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=pbm";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=pbm";?>"><img src="images/ok.gif"></a>
				<?php  }	?>
				</td>
				
				<td style="padding:0px">
				<?php
				$s9=$ad['import'];
				if ($s9==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=import";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=import";?>"><img src="images/ok.gif"></a>
				<?php  }	?>
				</td>
				
				<td style="padding:0px">
				<?php
				$s10=$ad['jadwal'];
				if ($s10==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=jadwal";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=jadwal";?>"><img src="images/ok.gif"></a>
				<?php  }	?>
				</td>
				
				<td style="padding:0px">
				<?php
				$s8=$ad['raport'];
				if ($s8==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=raport";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=raport";?>"><img src="images/ok.gif"></a>
				<?php  }	?>
				</td>
				
				<td style="padding:0px">
				<?php
				$s8=$ad['un'];
				if ($s8==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=un";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=un";?>"><img src="images/ok.gif"></a>
				<?php  }	?>
				</td>
				
				<td style="padding:0px">
				<?php
				$s8=$ad['ekstra'];
				if ($s8==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=ekstra";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=ekstra";?>"><img src="images/ok.gif"></a>
				<?php  }	?>
				</td>
				
				<td style="padding:0px">
				<?php
				$s8=$ad['perpustakaan'];
				if ($s8==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=perpustakaan";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=perpustakaan";?>"><img src="images/ok.gif"></a>
				<?php  }	?>
				</td>
				
				<td style="padding:0px">
				<?php
				$s8=$ad['sarana'];
				if ($s8==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=sarana";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=sarana";?>"><img src="images/ok.gif"></a>
				<?php  }	?>
				</td>
				
				<td style="padding:0px">
				<?php
				$s8=$ad['prakerin'];
				if ($s8==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=prakerin";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=prakerin";?>"><img src="images/ok.gif"></a>
				<?php  }	?>
				</td>
				
				<td style="padding:0px">
				<?php
				$s8=$ad['bkk'];
				if ($s8==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=bkk";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=bkk";?>"><img src="images/ok.gif"></a>
				<?php  }	?>
				</td>
				
				<td style="padding:0px">
				<?php
				$s8=$ad['up'];
				if ($s8==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=up";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=up";?>"><img src="images/ok.gif"></a>
				<?php  }	?>
				</td>				
				
				<td style="padding:0px">
				<?php
				$s8=$ad['dudi'];
				if ($s8==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=dudi";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=dudi";?>"><img src="images/ok.gif"></a>
				<?php  }	?>
				</td>						
				<td style="padding:0px">
				<?php
				$s8=$ad['tu'];
				if ($s8==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=tu";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=tu";?>"><img src="images/ok.gif"></a>
				<?php  }	?>
				</td>			
				<td style="padding:0px">				
				<?php
				$s8=$ad['modul1'];
				if ($s8==0) {	?>
					<a title="Status Aktifkan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=aktif&id=$ad[id_user_group]&op=modul1";?>"><img src="images/no.gif"></a>
				<?php }	else {	?>					
					<a title="Status Non Aktifan "  href="<?php    echo "$database?t=$token&pilih=status&untukdi=nonaktif&id=$ad[id_user_group]&op=modul1";?>"><img src="images/ok.gif"></a>
				<?php  }	?>
				</td>	
			</tr>
			<?php    
			$no++; }
			?>
		</table> <div style="margin-left:10px;">Keterangan : <br><img src="images/ok.gif"> = diijinkan untuk tambah/edit  <img src="images/no.gif"> = tidak diijinkan untuk mengakses</div>
		<?php     } ?>
</div><!--Akhir class isi kanan-->
	

	<?php   }
/* Forum Multimedia Edukasi  www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>