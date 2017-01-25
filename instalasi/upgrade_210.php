<?php if(!isset($_SESSION)){session_start();} error_reporting(0); ?>
<center><p><p><img src="../images/loader.gif"><br>Mohon Tunggu ..!</center>
<?php 
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */


include "../konfigurasi/koneksi.php";



///############################################UPDATE.207#################################################################
//Bagian untuk memasukkan data kedalam tabel database

mysql_query ("INSERT INTO ".$DB_KODE."_pengaturan (id_pengaturan, nama_pengaturan, isi_pengaturan, isi_pengaturan2) VALUES (NULL, 'lolagmap', '', '');");
mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_guru_mapel (
  id_gurumapel int(11) NOT NULL AUTO_INCREMENT,
  id_gurustaff int(30) NOT NULL,
  tahun_ajaran varchar(9) NOT NULL,
  id_mapel int(11) NOT NULL,
  id_jurusan int(5) NOT NULL,
  id_kelas int(11) NOT NULL,
  jumlah_jam int(20) NOT NULL,
  status int(30) NOT NULL,
  semester int(11) NOT NULL,
  PRIMARY KEY (id_gurumapel)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");
	
mysql_query ("INSERT INTO ".$DB_KODE."_guru_mapel (id_gurumapel, id_gurustaff, tahun_ajaran, id_mapel, id_jurusan, id_kelas, jumlah_jam, status, semester) VALUES
(25, 25, '2013/2014', 11, 2, 2, 6, 1, 0),
(28, 23, '2013/2014', 11, 1, 1, 0, 1, 0);");
mysql_query ("INSERT INTO ".$DB_KODE."_kategori (id_kategori, nama_kategori, deskripsi_kategori, fungsi, sub) VALUES
(36, 'Pondok Pesantren', '', 'link', '16'),
(37, Komunitas, 'Pondok Pesantren', '', 'link', '0');");
mysql_query ("INSERT INTO ".$DB_KODE."_jenjang (id_jenjang, nama_jenjang, deskripsi_jenjang) VALUES
(15, 'Instansi', 'INSTANSI/KANTOR/LEMBAGA'),
(18, 'Perusahaan', 'Dunia Industri'),
(17, 'Blog Pribadi', 'Blog Pribadi'),
(36, 'Pondok Pesantren', 'Pondok Pesantren'),
(37, 'Komunitas', 'Komunitas');");

mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_bahasa (
  no_bahasa int(10) NOT NULL AUTO_INCREMENT,
  sekolah text NOT NULL,
  pesantren text NOT NULL,
  perguruantinggi text NOT NULL,
  instansi text NOT NULL,
  perusahaan text NOT NULL,
  komunitas text NOT NULL,
  blog text NOT NULL,
  status int(10) NOT NULL,
  PRIMARY KEY (no_bahasa)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;");
	
mysql_query ("INSERT INTO ".$DB_KODE."_bahasa (no_bahasa, sekolah, pesantren, perguruantinggi, instansi, perusahaan, komunitas, blog, status) VALUES
(1, 'Guru', 'Usatadz', 'Dosen', 'Instruktur', 'Instruktur', 'Mentor', 'Pengajar', 1),
(2, 'Siswa', 'Santri', 'Mahasiswa', 'Peserta', 'Peserta', 'Peserta', 'Peserta', 1),
(3, 'Sekolah', 'Pondok Pesantren', 'Perguruan Tinggi', 'Instansi', 'Instansi', 'Perusahaan', 'Blog', 1),
(4, 'Kepala', 'Pengasuh', 'Rektor', 'Pimpinan', 'Pimpinan', 'Ketua', 'Founder', 0);");
mysql_query ("ALTER TABLE ".$DB_KODE."_guru_staff CHANGE id_jabatan id_jabatan INT( 11 ) NOT NULL DEFAULT '1'");


mysql_query ("INSERT INTO ".$DB_KODE."_aplikasi (id_aplikasi, nama_aplikasi, file_aplikasi, blok_aplikasi) VALUES
('', 'profil', 'kontenweb/modul/profil.php', '0');");	
mysql_query ("ALTER TABLE ".$DB_KODE."_berita add fulltext (judul_berita,isi_berita)");
mysql_query ("");
mysql_query ("");

mysql_query ("");
mysql_query ("");
	
mysql_query ("");
mysql_query ("");
	
mysql_query ("");
mysql_query ("");
	
mysql_query ("");
mysql_query ("");




unset($_SESSION['pertama']);
$_SESSION['kedua'] = kedua;
unset($_SESSION['temaweb']);
	$_SESSION['temaweb']='respons';
//header('location:info.php');
?>
<script language="javascript">
setTimeout("top.location.href = 'info.php'",10000);
</script>
<?php


/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

?>