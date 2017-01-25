<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

if (!isset($_SESSION['adminsh']))
{
	gogo('../../index.php');
	exit;
}
else{ 



$database="aplikasi/materi/materi.php";
switch($_GET['pilih']){
default: ?>
<h3>Import Data dari Excel </h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="#">Petunjuk</a></div>
			<div class="menuhorisontal"><a href="#"><?php echo $_SESSION['Bsiswa']; ?></a></div>
			<div class="menuhorisontal"><a href="#">Alumni</a></div>
			<div class="menuhorisontal"><a href="#"><?php echo $_SESSION['Bguru']; ?></a></div>	
			<div class="menuhorisontal"><a href="#">Karyawan</a></div>
		</div>



		<div class="clear"></div>
		<table class="tabel" id="results">
			<tr>
				<td>
					<center>
					<b>Konten Import Data dari Excel  ini ada pada versi Premium </b><br><br>
					<img src="images/donasi.jpg">
					<br><br><br>
					<b>Semoga dengan donasi Anda CMS Formulasi ini bisa terus berkembang lebih baik lagi. <br><br><br>Terimakasih, <br><br>Salam Edukasi..!</b><br>
					</center>
				</td>
			</tr>

		
		</table>

</div><!--Akhir class isi kanan-->
		<?php     break;
		

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

