<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>
		<div class="judulbox">Informasi Website</div>
		<table class="isian" style="margin:10px; font-weight: bold;";>
		<?php    
			//Menghitung jumlah data berita di database//
			$berita=mysql_query("SELECT * FROM ".$DB_KODE."_berita");
			$jmlberita=mysql_num_rows($berita);
		
			//Menghitung jumlah data komentar di database//
			$komentar=mysql_query("SELECT * FROM ".$DB_KODE."_komentar");
			$jmlkomentar=mysql_num_rows($komentar);
			
			//Menghitung jumlah data kategori di database//
			$kategori=mysql_query("SELECT * FROM ".$DB_KODE."_kategori");
			$jmlkategori=mysql_num_rows($kategori);
			
			//Menghitung jumlah data buku tamu di database//
			$bukutamu=mysql_query("SELECT * FROM ".$DB_KODE."_buku_tamu");
			$jmltamu=mysql_num_rows($bukutamu);
			
			//Menghitung jumlah data agenda di database//
			$agenda=mysql_query("SELECT * FROM ".$DB_KODE."_agenda");
			$jmlagenda=mysql_num_rows($agenda);
			
			//Menghitung jumlah file materi di database//
			$materi=mysql_query("SELECT * FROM ".$DB_KODE."_materi");
			$jmlfile=mysql_num_rows($materi);
			
			//Menghitung jumlah data pengumuman di database//
			$pengumuman=mysql_query("SELECT * FROM ".$DB_KODE."_pengumuman");
			$jmlpengumuman=mysql_num_rows($pengumuman);
			
			//Menghitung jumlah data pendaftar PSB di database//
			$psb=mysql_query("SELECT * FROM ".$DB_KODE."_psb");
			$jmlpsb=mysql_num_rows($psb);
			
			//Menghitung jumlah data kelas di database//
			$kelas=mysql_query("SELECT * FROM ".$DB_KODE."_kelas");
			$jmlkelas=mysql_num_rows($kelas);
			
			//Menghitung jumlah data siswa di database//
			$siswa=mysql_query("SELECT * FROM ".$DB_KODE."_siswa WHERE status_siswa='1'");
			$jmlsiswa=mysql_num_rows($siswa);
			
			//Menghitung jumlah data alumni di database//
			$alumni=mysql_query("SELECT * FROM ".$DB_KODE."_siswa WHERE status_siswa='0'");
			$jmlalumni=mysql_num_rows($alumni);
			
			//Menghitung jumlah data guru di database//
			$guru=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE posisi='guru'");
			$jmlguru=mysql_num_rows($guru);
			
			//Menghitung jumlah file foto di database//
			$foto=mysql_query("SELECT * FROM ".$DB_KODE."_galeri");
			$jmlfoto=mysql_num_rows($foto);
			
			//Menghitung jumlah data staff di database//
			$staff=mysql_query("SELECT * FROM ".$DB_KODE."_guru_staff WHERE posisi='staff'");
			$jmlstaff=mysql_num_rows($staff);
			
			//Menghitung jumlah data administrator di database//
			$users=mysql_query("SELECT * FROM ".$DB_KODE."_users");
			$jmlusers=mysql_num_rows($users);
			
			
			  $ip      = $_SERVER['REMOTE_ADDR'];
              $tanggal = date("Ymd");
              $waktu   = time();
			
			//Menghitung jumlah pengunjung online di database//
			  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM ".$DB_KODE."_statistik WHERE tanggal='$tanggal' GROUP BY ip_addres"));
			
			//Menghitung jumlah total pengunjung di database//
              $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(mengunjungi) FROM ".$DB_KODE."_statistik"), 0);  
			
			//Menghitung jumlah pengunjung hari ini di database//
              $bataswaktu       = time() - 300;
              $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM ".$DB_KODE."_statistik WHERE online > '$bataswaktu'"));
		?>
			<tr><td valign="top" class="isiankanan" style="width: 10px;"><?php    echo "$jmlberita"; ?></td><td class="isian"><a href="berita.php?t=<?php echo $token; ?>">Berita</td>
			<td valign="top" class="isiankanan" style="width: 10px;"><?php    echo "$jmlkomentar"; ?></td><td class="isian" ><a href="komentar.php?t=<?php echo $token; ?>" style="color: #ff6600;">Komentar</a></td></tr>
			
			<tr><td valign="top" class="isiankanan" style="width: 10px;"><?php    echo "$jmlkategori"; ?></td><td class="isian"><a href="kategori.php?t=<?php echo $token; ?>">Kategori</a></td>
			<td valign="top" class="isiankanan" style="width: 10px;"><?php    echo "$jmltamu"; ?></td><td class="isian"><a href="buku_tamu.php?t=<?php echo $token; ?>" style="color: #ff6600;">Buku Tamu</a></td></tr>
			
			<tr><td valign="top" class="isiankanan" style="width: 10px;"><?php    echo "$jmlagenda"; ?></td><td class="isian"><a href="agenda.php?t=<?php echo $token; ?>">Agenda</a></td>
			<td valign="top" class="isiankanan" style="width: 10px;"><?php    echo "$jmlfile"; ?></td><td class="isian"><a href="materi.php?t=<?php echo $token; ?>" style="color: #ff6600;">File Materi</a></td></tr>
			
			<tr><td valign="top" class="isiankanan" style="width: 10px;"><?php    echo "$jmlpengumuman"; ?></td><td class="isian"><a href="pengumuman.php?t=<?php echo $token; ?>">Pengumuman</a></td>
			<td valign="top" class="isiankanan" style="width: 10px;"><?php    echo "$jmlpsb"; ?></td><td class="isian"><a href="psb_online.php?t=<?php echo $token; ?>" style="color: #ff6600;">Pendaftar</a></td></tr>
			
			<tr><td valign="top" class="isiankanan" style="width: 10px;"><?php    echo "$jmlkelas"; ?></td><td class="isian"><a href="kelas.php?t=<?php echo $token; ?>">Kelas</a></td>
			<td valign="top" class="isiankanan" style="width: 10px;"><?php    echo "$totalpengunjung"; ?></td><td class="isian"><a href="statistik.php?t=<?php echo $token; ?>" style="color: #ff6600;">Total Pengunjung</a></td></tr>
			
			<tr><td valign="top" class="isiankanan" style="width: 10px;"><?php    echo "$jmlsiswa"; ?></td><td class="isian"><a href="siswa.php?t=<?php echo $token; ?>"><?php echo $_SESSION['Bsiswa']; ?></a></td>
			<td valign="top" class="isiankanan" style="width: 10px;"><?php    echo "$pengunjung"; ?></td><td class="isian"><a href="statistik.php?t=<?php echo $token; ?>" style="color: #ff6600;">Pengunjung Hari ini</a></td></tr>
			
			<tr><td valign="top" class="isiankanan" style="width: 10px;"><?php    echo "$jmlalumni"; ?></td><td class="isian"><a href="alumni.php?t=<?php echo $token; ?>">Alumni</a></td>
			<td valign="top" class="isiankanan" style="width: 10px;"><?php    echo "$pengunjungonline"; ?></td><td class="isian"><a href="statistik.php?t=<?php echo $token; ?>" style="color: #ff6600;">Online</a></td></tr>
			
			<tr><td valign="top" class="isiankanan" style="width: 10px;"><?php    echo "$jmlguru"; ?></td><td class="isian"><a href="guru_staff.php?t=<?php echo $token; ?>"><?php echo $_SESSION['Bguru']; ?></a></td>
			<td valign="top" class="isiankanan" style="width: 10px;"><?php    echo "$jmlfoto"; ?></td><td class="isian"><a href="galeri_foto.php?t=<?php echo $token; ?>" style="color: #ff6600;">Foto</a></td></tr>
			
			<tr><td valign="top" class="isiankanan" style="width: 10px;"><?php    echo "$jmlstaff"; ?></td><td class="isian"><a href="staff.php?t=<?php echo $token; ?>">Staff</a></td>
			<td valign="top" class="isiankanan" style="width: 10px;"><?php    echo "$jmlusers"; ?></td><td class="isian"><a href="admin.php?t=<?php echo $token; ?>" style="color: #ff6600;">Administrator</a></td></tr>
		</table>
<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>
