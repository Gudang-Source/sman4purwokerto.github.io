			<div class="menuhorisontal"><a href="siswa.php?t=<?php echo $token; ?>"><?php echo $_SESSION['Bsiswa']; ?></a></div>
			<div class="menuhorisontal"><a href="alumni.php?t=<?php echo $token; ?>">Alumni</a></div>
			<div class="menuhorisontal"><a href="siswa.php?t=<?php echo $token; ?>&pilih=tambah">Pindahan Masuk</a></div>			
			<div class="menuhorisontal"><a href="pindah.php?t=<?php echo $token; ?>">Pindah<?php echo $_SESSION['Bsekolah']; ?></a></div>
			<div class="menuhorisontal"><a href="kelas.php?t=<?php echo $token; ?>">Kelas</a></div>
<?php 			
if ($_SESSION['jenjang']>4)
{			
?>
			<div class="menuhorisontalaktif"><a href="jurusan.php?t=<?php echo $token; ?>">Jurusan</a></div>
<?php  } ?>


			<div class="menuhorisontal"><a href="siswa.php?t=<?php echo $token; ?>&pilih=status">Perubahan Status</a></div>
			<div class="menuhorisontal"><a href="pekerjaan.php?t=<?php echo $token; ?>">Pekerjaan Orang Tua</a></div>