<form method="POST" action="elearning-cari.html">
<div style="margin: 0px 0 0 0; width: 200px;float:right;">
<input type="text" name="cari" class="cari"><input type="submit" class="tombol" value="Cari">
</form>
</div>

<h3>
		<a href="elearning.html">E-learning</a> | 
		<?php 
		if (isset($_SESSION['guru'])){
		?>
		<a href="elearning-upload.html">Upload Materi</a> | 
		<?php  } ?>
		<a href="elearning-mata-pelajaran.html">Mata Pelajaran</a> |
		<a href="elearning-guru.html"><?php echo $_SESSION['Bguru']; ?></a> | 
		<a href="elearning-cari-semua.html">Pencarian</a> |
</h3>	


	
