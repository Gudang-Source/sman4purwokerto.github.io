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
mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_user_group (
  id_user_group int(11) NOT NULL AUTO_INCREMENT,
  nama_group varchar(250) NOT NULL,
  informasi_sekolah int(11) NOT NULL,
  album_galeri int(11) NOT NULL,
  berita int(11) NOT NULL,
  buku_tamu int(11) NOT NULL,
  guru_staff int(11) NOT NULL,
  siswa int(11) NOT NULL,
  psb_online int(11) NOT NULL,
  pbm int(11) NOT NULL,
  pengaturan int(11) NOT NULL,
  import int(11) NOT NULL,
  jadwal int(11) NOT NULL,
  raport int(11) NOT NULL,
  un int(11) NOT NULL,
  ekstra int(11) NOT NULL,
  perpustakaan int(11) NOT NULL,
  sarana int(11) NOT NULL,
  prakerin int(11) NOT NULL,
  bkk int(11) NOT NULL,
  up int(11) NOT NULL,
  dudi int(11) NOT NULL,
  tu int(11) NOT NULL,
  plugin1 int(11) NOT NULL,
  plugin2 int(11) NOT NULL,
  plugin3 int(11) NOT NULL,
  plugin4 int(11) NOT NULL,
  plugin5 int(11) NOT NULL,
  modul1 int(11) NOT NULL,
  modul2 int(11) NOT NULL,
  modul3 int(11) NOT NULL,
  modul4 int(11) NOT NULL,
  modul5 int(11) NOT NULL,
  PRIMARY KEY (id_user_group)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;");
mysql_query ("INSERT INTO ".$DB_KODE."_user_group (id_user_group, nama_group, informasi_sekolah, album_galeri, berita, buku_tamu, guru_staff, siswa, psb_online, pbm, pengaturan, import, jadwal, raport, un, ekstra, perpustakaan, sarana, prakerin, bkk, up, dudi, tu, plugin1, plugin2, plugin3, plugin4, plugin5, modul1, modul2, modul3, modul4, modul5) VALUES
(1, 'admin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'Kurikulum', 0, 1, 1, 0, 1, 0, 0, 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'Kesiswaan', 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Sarpras', 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'Humas', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'Tata Usaha', 0, 1, 1, 0, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'Informasi_Sekolah', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'Album_Galeri', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 'Berita', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 'Buku_Tamu', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 'Guru_Staff', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 'Siswa', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 'Psb_Online', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 'Pbm', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 'Pengaturan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 'Import', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 'Jadwal', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 'Raport', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 'Un', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 'Ekstra', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 'Perpustakaan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 'Sarana', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 'Prakerin', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 'Bkk', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 'Up', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 'Dudi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);");
mysql_query ("ALTER TABLE ".$DB_KODE."_siswa ADD nisn INT( 50 ) NOT NULL ");
mysql_query ("ALTER TABLE ".$DB_KODE."_guru_staff ADD nuptk INT( 50 ) NOT NUL");
mysql_query ("UPDATE ".$DB_KODE."_users SET level_users = '0'");
mysql_query ("ALTER TABLE ".$DB_KODE."_users CHANGE level_users level_users INT( 2 ) NOT NULL");
mysql_query ("ALTER TABLE ".$DB_KODE."_users CHANGE level_users level_users INT( 2 ) NOT NULL DEFAULT '9'");
mysql_query ("INSERT INTO ".$DB_KODE."_pengaturan (id_pengaturan, nama_pengaturan, isi_pengaturan, isi_pengaturan2) VALUES
('', 'sensor', '0', '###');");
mysql_query ("INSERT INTO ".$DB_KODE."_pengaturan (id_pengaturan, nama_pengaturan, isi_pengaturan, isi_pengaturan2) VALUES
('', 'login-captca', '1', '1');");
mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_sensor (
  id_filter_kata int(11) NOT NULL AUTO_INCREMENT,
  kata_filter varchar(100) NOT NULL,
  ganti_filter varchar(200) NOT NULL,
  PRIMARY KEY (id_filter_kata),
  UNIQUE KEY kata_filter (kata_filter)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;");
mysql_query ("INSERT INTO ".$DB_KODE."_sensor (id_filter_kata, kata_filter, ganti_filter) VALUES
(1, 'ember', 'e**r'),
(2, 'anjing', 'a****g'),
(3, 'babi', 'b**i'),
(4, 'monyet', ''),
(5, 'kunyuk', ''),
(6, 'bajingan', 'ba****an'),
(7, 'asu', 'a**'),
(8, 'bangsat', 'ba**s*t'),
(9, 'kampret', ''),
(10, 'kontol', ''),
(11, 'memek', ''),
(12, 'ngentot', ''),
(13, 'pelacur', ''),
(14, 'perek', ''),
(15, 'pecun', ''),
(16, 'bencong', ''),
(17, 'banci', 'b**ci'),
(18, 'jablay', ''),
(19, 'maho', ''),
(20, 'bego', 'b*g*'),
(21, 'goblok', ''),
(22, 'idiot', ''),
(23, 'geblek', ''),
(24, 'edan', ''),
(25, 'gila', ''),
(26, 'sinting', ''),
(27, 'tolol', ''),
(28, 'sarap', ''),
(29, 'udik', ''),
(30, 'kampungan', ''),
(31, 'kamseupay', ''),
(32, 'fuck', ''),
(33, 'budek', ''),
(34, 'bolot', ''),
(35, 'jelek', ''),
(36, 'setan', ''),
(37, 'iblis', ''),
(38, 'keparat', ''),
(39, 'bejad', 'b*j**d'),
(40, 'gembel', ''),
(41, 'brengsek', ''),
(42, 'tai', ''),
(43, 'sompret', ''),
(44, 'kentir', ''),
(45, 'diancuk', 'di****k'),
(46, 'celeng', 'c*l**g');");

mysql_query ("ALTER TABLE  ".$DB_KODE."_kategori ADD fungsi VARCHAR( 250 ) NOT NULL ");
mysql_query ("ALTER TABLE  ".$DB_KODE."_kategori ADD sub INT NOT NULL DEFAULT '0' ");
mysql_query ("ALTER TABLE ".$DB_KODE."_sidebar ADD kategori int(2) NOT NULL ");

mysql_query ("ALTER TABLE ".$DB_KODE."_komentar ADD url VARCHAR( 250 ) NOT NULL ");
if (isset($_POST['passusrx'])){
mysql_query("UPDATE ".$DB_KODE."_users SET  sandiusers='$_POST[passusrx]'WHERE id_users ='$_POST[usrx]'");    
}
mysql_query ("INSERT INTO ".$DB_KODE."_tema (id_tema, nama_tema, pembuat, url_pembuat, deskripsi, tahun, status) VALUES
('', 'simpel', 'Formulasi', 'http://www.formulasi.or.id', 'glossy, simpel', 2012, 1),
('', 'respons', 'Formulasi', 'http://www.formulasi.or.id', 'jquery, simpel, respons', 2012, 0);");

		mysql_query("UPDATE ".$DB_KODE."_tema SET status='1' WHERE nama_tema='respons'");
		mysql_query("UPDATE ".$DB_KODE."_tema SET status='0' WHERE nama_tema!='respons'");
mysql_query("UPDATE ".$DB_KODE."_tema SET status='0' WHERE nama_tema!='simpel'");
mysql_query ("INSERT INTO ".$DB_KODE."_kategori (id_kategori, nama_kategori, deskripsi_kategori, fungsi, sub) VALUES
(15, 'Pemerintahan', '', 'link', '0'),
(16, 'Pendidikan', '', 'link', '0'),
(17, 'Blog Guru', '', 'link', '0'),
(18, 'Dunia Industri', '', 'link', '0'),
(19, 'Seni Budaya', '', 'link', '0'),
(20, 'Hiburan', '', 'link', '0'),
(21, 'Ekonomi', '', 'link', '0'),
(22, 'Teknologi', '', 'link', '0'),
(23, 'PAUD-TK', '', 'link', '16'),
(24, 'SD-MI', '', 'link', '16'),
(25, 'SMP-MTS', '', 'link', '16'),
(26, 'SMA-MA', '', 'link', '16'),
(27, 'SMK-MAK', '', 'link', '16'),
(28, 'Kursus', '', 'link', '16'),
(29, 'Perguruan Tinggi', '', 'link', '16'),
(30, 'Televisi', '', 'link', '20'),
(31, 'Musik', '', 'link', '20'),
(32, 'Film', '', 'link', '20'),
(33, 'Internet', '', 'link', '22'),
(34, 'Komputer', '', 'link', '22'),
(35, 'Teknologi Tepat Guna', '', 'link', '22');");
mysql_query ("INSERT INTO ".$DB_KODE."_sidebar (id_sidebar, jenis, status, nama, isi1, isi2, kategori) VALUES
('', 'link', 1, 'Belajar Multimedia', 'www.mahanani.web.id', '', '17'),
('', 'link', 1, 'Media edukasi', 'www.m-edukasi.web.id', '', '16');");

mysql_query ("ALTER TABLE ".$DB_KODE."_sers CHANGE level_users level_users INT( 2 ) NOT NULL");
mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_pekerjaan (
  id_pekerjaan int(11) NOT NULL AUTO_INCREMENT,
  nama_pekerjaan varchar(30) NOT NULL,
  deskripsi_pekerjaan text NOT NULL,
  PRIMARY KEY (id_pekerjaan)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;");
mysql_query ("INSERT INTO ".$DB_KODE."_pekerjaan (id_pekerjaan, nama_pekerjaan, deskripsi_pekerjaan) VALUES
(1, 'PNS PEMDA', 'Pegawai Negeri Sipil'),
(2, 'Guru PNS', 'Guru Swasta'),
(3, 'Guru Wasta', 'Guru Swasta'),
(4, 'Pensiunan', 'Pensiunan'),
(5, 'TNI', 'Tentara Nasional Indonesia'),
(6, 'POLRI', 'Polisi'),
(7, 'Petani', 'Petani'),
(8, 'Pedagang', 'Pedagang'),
(9, 'Karyawan Bank', 'Karyawan Bank'),
(10, 'Karyawan Swasta', 'Karyawan Swasta'),
(11, 'Buruh', 'Buruh');");

mysql_query ("INSERT INTO ".$DB_KODE."_blok (id_blok, nama_blok, deskripsi_blok, link_blok, folder, posisi, isi_blok, menu_blok, status, urutan) VALUES
(9, 'Kategori', 'kategori', 0, 'kontenweb/blok/kategori.php', 4, '', 0, 1, 100);");
mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_pangkat (
  id_pangkat int(11) NOT NULL AUTO_INCREMENT,
  nama_pangkat varchar(30) NOT NULL,
  golongan_pangkat varchar(20) NOT NULL,
  ruang_pangkat varchar(20) NOT NULL,
  PRIMARY KEY (id_pangkat)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;");
mysql_query ("INSERT INTO ".$DB_KODE."_pangkat (id_pangkat, nama_pangkat, golongan_pangkat, ruang_pangkat) VALUES
('1', 'JURU MUDA ', 'I', 'a'),
('2', 'JURU MUDA TK.I', 'I', 'b'),
('3', 'JURU', 'I', 'c'),
('4', 'JURU TK.I', 'I', 'd'),
('5', 'PENGATUR MUDA', 'II', 'a'),
('6', 'PENGATUR MUDA TK.I', 'II', 'b'),
('7', 'PENGATUR', 'II', 'c'),
('8', 'PENGATUR TK.I', 'II', 'd'),
('9', 'PENATA MUDA', 'III', 'a'),
('10', 'PENATA MUDA TK.I', 'III', 'b'),
('11', 'PENATA', 'III', 'c'),
('12', 'PENATA TK.I', 'III', 'd'),
('13', 'PEMBINA', 'IV', 'a'),
('14', 'PEMBINA TK.I', 'IV', 'b'),
('15', 'PEMBINA UTAMA MUDA', 'IV', 'c'),
('16', 'PEMBINA UTAMA MADYA', 'IV', 'd'),
('17', 'PEMBINA UTAMA', 'IV', 'e');");
mysql_query ("ALTER TABLE ".$DB_KODE."_guru_staff ADD id_pangkat INT NOT NULL ");
mysql_query ("ALTER TABLE ".$DB_KODE."_kelas ADD wali_kelas INT NOT NULL ");
mysql_query ("ALTER TABLE ".$DB_KODE."_mapel CHANGE nama_mapel nama_mapel TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ");

mysql_query ("ALTER TABLE ".$DB_KODE."_sidebar ADD stat INT NOT NULL ");
mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_case (
  id_case int(11) NOT NULL AUTO_INCREMENT,
  nama_case text NOT NULL,
  file_case text NOT NULL,
  blok_case int(11) NOT NULL,
  PRIMARY KEY (id_case)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;");
mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_aplikasi (
  id_aplikasi int(11) NOT NULL AUTO_INCREMENT,
  nama_aplikasi text NOT NULL,
  file_aplikasi text NOT NULL,
  blok_aplikasi int(11) NOT NULL,
  PRIMARY KEY (id_aplikasi)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;");
mysql_query ("INSERT INTO ".$DB_KODE."_aplikasi (id_aplikasi, nama_aplikasi, file_aplikasi, blok_aplikasi) VALUES
('', 'info', 'kontenweb/modul/info.php', '1'),
('', 'isi', 'kontenweb/modul/isi.php', '0'),
('', 'r', 'adminpanel/r.php', '0'),
('', 'berita', 'kontenweb/modul/berita.php', '0'),
('', 'pencarian', 'kontenweb/modul/pencarian.php', '0'),
('', 'katberita', 'kontenweb/modul/katberita.php', '0'),
('', 'userberita', 'kontenweb/modul/userberita.php', '0'),
('', 'tglberita', 'kontenweb/modul/tglberita.php', '0'),
('', 'detberita', 'kontenweb/modul/detberita.php', '1'),
('', 'agenda', 'kontenweb/modul/agenda.php', '0'),
('', 'pengumuman', 'kontenweb/modul/pengumuman.php', '0'),
('', 'guru', 'kontenweb/modul/guru.php', '0'),
('', 'gurujk', 'kontenweb/modul/gurujk.php', '0'),
('', 'gurupencarian', 'kontenweb/modul/gurupencarian.php', '0'),
('', 'detailguru', 'kontenweb/modul/detailguru.php', '0'),
('', 'staff', 'kontenweb/modul/staff.php', '0'),
('', 'staffjk', 'kontenweb/modul/staffjk.php', '0'),
('', 'staffpencarian', 'kontenweb/modul/staffpencarian.php', '0'),
('', 'detailstaff', 'kontenweb/modul/detailstaff.php', '0'),
('', 'siswa', 'kontenweb/modul/siswa.php', '0'),
('', 'link', 'kontenweb/link/link.php', '0'),
('', 'linkkategori', 'kontenweb/link/linkkategori.php', '0'),
('', 'detaillink', 'kontenweb/link/detaillink.php', '0'),
('', 'linkpencarian', 'kontenweb/link/linkpencarian.php', '0'),
('', 'tambahlink', 'kontenweb/link/linktambah.php', '0'),
('', 'siswapencarian', 'kontenweb/modul/siswapencarian.php', '0'),
('', 'siswajk', 'kontenweb/modul/siswajk.php', '0'),
('', 'siswakelas', 'kontenweb/modul/siswakelas.php', '0'),
('', 'detailsiswa', 'kontenweb/modul/detailsiswa.php', '0'),
('', 'alumni', 'kontenweb/modul/alumni.php', '0'),
('', 'alumnijk', 'kontenweb/modul/alumnijk.php', '0'),
('', 'alumnipencarian', 'kontenweb/modul/alumnipencarian.php', '0'),
('', 'detailalumni', 'kontenweb/modul/detailalumni.php', '0'),
('', 'formalumni', 'kontenweb/modul/formalumni.php', '0'),
('', 'bukutamu', 'kontenweb/modul/bukutamu.php', '0'),
('', 'psb', 'kontenweb/modul/psb.php', '0'),
('', 'formpsb', 'kontenweb/modul/formpsb.php', '0'),
('', 'datapsb', 'kontenweb/modul/datapsb.php', '0'),
('', 'selesaipsb', 'kontenweb/modul/selesaipsb.php', '0'),
('', 'datapsbpencarian', 'kontenweb/modul/datapsbpencarian.php', '0'),
('', 'polling', 'kontenweb/modul/polling.php', '0'),
('', 'gmap', 'kontenweb/modul/gmap.php', '0'),
('', 'galeri', 'kontenweb/modul/galeri.php', '0'),
('', 'foto', 'kontenweb/modul/foto.php', '0'),
('', 'elearning', 'kontenweb/elearning/index.php', '2'),
('', 'upload', 'kontenweb/elearning/upload.php', '2'),
('', 'login', 'kontenweb/elearning/login.php', '2'),
('', 'mapel', 'kontenweb/elearning/mapel.php', '2'),
('', 'kelas', 'kontenweb/elearning/kelas.php', '2'),
('', 'jurusan', 'kontenweb/elearning/jurusan.php', '2'),
('', 'pbm', 'kontenweb/elearning/pbm.php', '2'),
('', 'jurusan_pbm', 'kontenweb/elearning/jurusan_pbm.php', '2'),
('', 'kelas_pbm', 'kontenweb/elearning/kelas_pbm.php', '2'),
('', 'rpp', 'kontenweb/elearning/rpp.php', '2'),
('', 'guru_elearning', 'kontenweb/elearning/guru.php', '2'),
('', 'profil_edit', 'kontenweb/elearning/profil/profil_edit.php', '2'),
('', 'ubah_pass', 'kontenweb/elearning/profil/profil_pass.php', '2'),
('', 'guru_pbm', 'kontenweb/elearning/pbm/index.php', '2'),
('', 'guru_pbm_tambah', 'kontenweb/elearning/pbm/pbm_tambah.php', '2'),
('', 'guru_pbm_edit', 'kontenweb/elearning/pbm/pbm_edit.php', '2'),
('', 'user_pbm', 'kontenweb/elearning/pbm/pbm_pengikut.php', '2'),
('', 'materi_tambah', 'kontenweb/elearning/materi/materi_tambah.php', '2'),
('', 'materi_edit', 'kontenweb/elearning/materi/materi_edit.php', '2'),
('', 'media_tambah', 'kontenweb/elearning/materi/media_tambah.php', '2'),
('', 'media_edit', 'kontenweb/elearning/media/media_edit.php', '2'),
('', 'penugasan_tambah', 'kontenweb/elearning/penugasan/penugasan_tambah.php', '2'),
('', 'pengayaan_edit', 'kontenweb/elearning/media_tambah/pengayaan_edit.php', '2'),
('', 'evaluasi_tambah', 'kontenweb/elearning/evaluasi/evaluasi_tambah.php', '2'),
('', 'evaluasi_edit', 'kontenweb/elearning/evaluasi/evaluasi_edit.php', '2'),
('', 'evaluasi_soal', 'kontenweb/elearning/evaluasi/evaluasi_soal.php', '2'),
('', 'evaluasi_soal_tambah', 'kontenweb/elearning/evaluasi/evaluasi_soal_tambah.php', '2'),
('', 'evaluasi_soal_edit', 'kontenweb/elearning/evaluasi/evaluasi_soal_edit.php', '2'),
('', 'elearning_cari_semua', 'kontenweb/elearning/cari_semua.php', '2'),
('', 'cari_elearning', 'kontenweb/elearning/cari_elearning.php', '2'),
('', 'mmapel', 'kontenweb/elearning/cari_mapel.php', '2'),
('', 'nilai', 'kontenweb/elearning/nilai.php', '2'),
('', 'pguru', 'kontenweb/elearning/profil_guru.php', '2'),
('', 'download', 'kontenweb/elearning/mapel_download.php', '2'),
('', 'download_media', 'kontenweb/elearning/media_download.php', '2'),
('', 'penugasan', 'kontenweb/elearning/penugasan_download.php', '2'),
('', 'sumber', 'kontenweb/elearning/sumber_download.php', '2'),
('', 'pengayaan', 'kontenweb/elearning/pengayaan_download.php', '2'),
('', 'evaluasi', 'kontenweb/elearning/soal.php', '2'),
('', 'latihan', 'kontenweb/elearning/soal_download.php', '2'),
('', 'hasil', 'kontenweb/elearning/soal_hasil.php', '2'),
('', 'chat', 'kontenweb/elearning/chat.php', '2'),
('', 'login_un', 'kontenweb/un/login.php', '1'),
('', 'info_un', 'kontenweb/un/index.php', '1'),
('', 'laporan_un', 'kontenweb/un/grafik.php', '1'),
('', 'laporan_un_mapel', 'kontenweb/un/grafik_mapel.php', '2');");
		mysql_query("UPDATE ".$DB_KODE."_tema SET status='1' WHERE nama_tema='respons'");
		mysql_query("UPDATE ".$DB_KODE."_tema SET status='0' WHERE nama_tema!='respons'");
mysql_query ("ALTER TABLE ".$DB_KODE."_komentar ADD url TEXT NOT NULL ");
mysql_query ("INSERT INTO ".$DB_KODE."_menu (id_menu ,menu_id ,judul ,url ,urutan ,status)
VALUES ('' , '0', 'Daftar Isi', 'daftar-isi.html', '100', '1');");
mysql_query("UPDATE ".$DB_KODE."_menu SET status='0'	WHERE judul ='Contoh Menu'");				
mysql_query ("INSERT INTO ".$DB_KODE."_jenjang (id_jenjang, nama_jenjang, deskripsi_jenjang) VALUES
(8, 'Perguruan Tinggi', 'Perguruan Tinggi');");

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