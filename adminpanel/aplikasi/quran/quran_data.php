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



$database="aplikasi/quran/quran.php";
switch($_GET['pilih']){
default: ?>
<h3>Quran</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
		<ul><center><b>MODUL AL QUR'AN</b></center></ul>
		</div>

		<table class="tabel" id="results">
			<tr>
				<td>
					<center>
					<b>Modul ini secara lengkap ada di versi Premium Standar</b><br><br>
					<img src="images/donasi.jpg">
					<br><br><br>
					<b>Semoga dengan donasi Anda CMS Formulasi ini bisa terus berkembang lebih baik lagi. <br><br><br>Untuk mendapatkan plugin premium ini<br>
					silahkan hubungi Fauzan A Mahanani 081327030060<br><hr>Sebagaian donasi Anda, kami kelola untuk anak yatim/piatu. 
					<br>Semoga dengan donasi Anda akan semakin banyak anak yatim/piatu dan tidak mampu dapat Bersekolah.<br>
					Terimakasih untuk rekan-rekan yang sudah membantu secara moril maupun materiil.<br>
					Dan semoga kita semua mendapat rahmat dan hidayah dari Alloh S.W.T, Aamiien.<br><br><br>Terimakasih, <br><br>Salam Edukasi..!</b><br>
					</center>
				</td>
			</tr>

		
		</table>
		
		

</div><!--Akhir class isi kanan-->
		<?php     break;
		
		case "input":
			include "aplikasi/quran/quran_input.php";
		break;
		
		case "output":
			include "aplikasi/quran/quran_output.php";
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

