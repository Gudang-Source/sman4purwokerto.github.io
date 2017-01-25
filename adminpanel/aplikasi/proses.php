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
<h3>Materi Pelajaran (E-learning)</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="pbm.php?t=<?php echo $token; ?>">Pokok Bahasan</a></div>
			<div class="menuhorisontal"><a href="materi.php?t=<?php echo $token; ?>">Materi</a></div>
			<div class="menuhorisontal"><a href="media.php?t=<?php echo $token; ?>">Media</a></div>
			<div class="menuhorisontal"><a href="sumber.php?t=<?php echo $token; ?>">Sumber</a></div>
			<div class="menuhorisontal"><a href="evaluasi.php?t=<?php echo $token; ?>">Evaluasi</a></div>
			<div class="menuhorisontal"><a href="penugasan.php?t=<?php echo $token; ?>">Penugasan</a></div>
			<div class="menuhorisontal"><a href="pengayaan.php?t=<?php echo $token; ?>">Pengayaan</a></div>
			<div class="menuhorisontal"><a href="kurikulum.php?t=<?php echo $token; ?>">Kurikulum</a></div>
			<div class="menuhorisontal"><a href="mata_pelajaran.php?t=<?php echo $token; ?>">Mata Pelajaran</a></div>
		</div>



		<div class="clear"></div>
		<table class="tabel" id="results">
			<tr>
				<td>
					<center>

					<a href="http://produk-cms.formulasi.or.id" target="_blank" title="Lihat Produk CMS Formulasi"><h2><b>PLUGIN PREMIUM CMS FORMULASI</b></h2></a>
					<iframe src="http://produk-cms.formulasi.or.id/index.php/embed/loginform" frameborder="0" height="200" width="215"></iframe>

					<br>
					<br>
					<a href="http://produk-cms.formulasi.or.id" target="_blank" title="Lihat Produk CMS Formulasi"><img src="images/donasi.jpg"></a>
					<br><br>
					<br>
					
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

