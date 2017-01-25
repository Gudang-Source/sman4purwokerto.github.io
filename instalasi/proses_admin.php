<?php if(!isset($_SESSION)){session_start();}  error_reporting(0); ?>
<center><p><p><img src="../images/loader.gif"  style="   vertical-align: middle;text-align: center;"><br>Mohon Tunggu ..!</center>
<?php

/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */


$_SESSION['postemail'] =$_POST['email'];
include "../konfigurasi/koneksi.php";
			

///////////////////////////////////////////////// DATA UTAMA /////////////////////////////////////////////////////////
mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_agenda (
  id_agenda int(11) NOT NULL AUTO_INCREMENT,
  judul_agenda varchar(50) NOT NULL,
  tanggal_agenda date NOT NULL,
  tempat_agenda varchar(50) NOT NULL,
  keterangan_agenda text NOT NULL,
  s_username varchar(30) NOT NULL,
  PRIMARY KEY (id_agenda)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;");

mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_album (
  id_album int(11) NOT NULL AUTO_INCREMENT,
  nama_album varchar(30) NOT NULL,
  tanggal_album date NOT NULL,
  deskripsi_album text NOT NULL,
  foto_album varchar(50) NOT NULL,
  PRIMARY KEY (id_album)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_berita (
  id_berita int(11) NOT NULL AUTO_INCREMENT,
  judul_berita varchar(100) NOT NULL,
  isi_berita text NOT NULL,
  tanggal_posting date NOT NULL,
  gambar_kecil varchar(50) NOT NULL,
  status_terbit int(1) NOT NULL,
  status_komentar int(1) NOT NULL,
  status_headline int(1) NOT NULL,
  s_username varchar(30) NOT NULL,
  id_kategori int(11) NOT NULL,
  PRIMARY KEY (id_berita)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_buku_tamu (
  id_bukutamu int(11) NOT NULL AUTO_INCREMENT,
  nama_bukutamu varchar(30) NOT NULL,
  subjek text NOT NULL,
  isi_pesan text NOT NULL,
  email varchar(30) NOT NULL,
  tanggal_kirim date NOT NULL,
  status int(1) NOT NULL,
  PRIMARY KEY (id_bukutamu)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_galeri (
  id_galeri int(11) NOT NULL AUTO_INCREMENT,
  nama_galeri varchar(100) NOT NULL,
  id_album int(11) NOT NULL,
  tanggal_galeri date NOT NULL,
  judul varchar(250) NOT NULL,
  deskripsi text NOT NULL,
  PRIMARY KEY (id_galeri)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_pengaturan (
  id_pengaturan int(11) NOT NULL AUTO_INCREMENT,
  nama_pengaturan varchar(50) NOT NULL,
  isi_pengaturan text NOT NULL,
  isi_pengaturan2 text NOT NULL,
  PRIMARY KEY (id_pengaturan)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_guru_staff (
  id_gurustaff int(11) NOT NULL AUTO_INCREMENT,
  nip varchar(30) NOT NULL,
  posisi varchar(5) NOT NULL,
  nama_gurustaff varchar(30) NOT NULL,
  password varchar(50) NOT NULL,
  foto varchar(50) NOT NULL,
  jenkel varchar(1) NOT NULL,
  id_mapel int(11) NOT NULL,
  id_jabatan int(11) NOT NULL,
  alamat text NOT NULL,
  status_kawin varchar(20) NOT NULL,
  tahun_masuk year(4) NOT NULL,
  pendidikan_terakhir varchar(20) NOT NULL,
  email varchar(30) NOT NULL,
  telepon varchar(15) NOT NULL,
  tempat_lahir varchar(30) NOT NULL,
  tanggal_lahir date NOT NULL,
  nuptk int(50) NOT NULL,
  PRIMARY KEY (id_gurustaff)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;");

mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_info_sekolah (
  id_info int(11) NOT NULL AUTO_INCREMENT,
  nama_info varchar(50) NOT NULL,
  isi_info text NOT NULL,
  tanggal_info date NOT NULL,
  posisi_menu int(1) NOT NULL,
  status_terbit int(1) NOT NULL,
  PRIMARY KEY (id_info)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_jabatan (
  id_jabatan int(11) NOT NULL AUTO_INCREMENT,
  nama_jabatan varchar(30) NOT NULL,
  deskripsi_jabatan text NOT NULL,
  PRIMARY KEY (id_jabatan)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_jurusan (
  id_jurusan int(11) NOT NULL AUTO_INCREMENT,
  nama_jurusan varchar(30) NOT NULL,
  deskripsi_jurusan text NOT NULL,
  PRIMARY KEY (id_jurusan)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;");

mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_kategori (
  id_kategori int(11) NOT NULL AUTO_INCREMENT,
  nama_kategori varchar(50) NOT NULL,
  deskripsi_kategori text NOT NULL,
  fungsi VARCHAR( 250 ) NOT NULL,
  sub int(11) NOT NULL,
  PRIMARY KEY (id_kategori)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;");

mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_kelas (
  id_kelas int(11) NOT NULL AUTO_INCREMENT,
  nama_kelas varchar(30) NOT NULL,
  deskripsi_kelas text NOT NULL,
  PRIMARY KEY (id_kelas)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;");

mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_komentar (
  id_komentar int(11) NOT NULL AUTO_INCREMENT,
  id_berita int(11) NOT NULL,
  id_pbm int(11) NOT NULL,
  id_materi int(11) NOT NULL,
  id_media int(11) NOT NULL,
  id_sumber int(11) NOT NULL,
  id_pengayaan int(11) NOT NULL,
  id_evaluasi int(11) NOT NULL,
  id_penugasan int(11) NOT NULL,
  nama_komentar varchar(25) NOT NULL,
  email_komentar varchar(30) NOT NULL,
  isi_komentar text NOT NULL,
  tanggal_komentar date NOT NULL,
  status_terima int(1) NOT NULL,  
  url varchar(250) NOT NULL,
  PRIMARY KEY (id_komentar)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;");

mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_plugin (
  id_plugin int(11) NOT NULL AUTO_INCREMENT,
  nama_plugin varchar(30) NOT NULL,
  folder_plugin varchar(30) NOT NULL,
  pembuat varchar(30) NOT NULL,
  url_pembuat varchar(30) NOT NULL,
  deskripsi text NOT NULL,
  tahun year(4) NOT NULL,
  status int(1) NOT NULL,
  session text NOT NULL,
  PRIMARY KEY (id_plugin)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_mapel (
  id_mapel int(11) NOT NULL AUTO_INCREMENT,
  nama_mapel varchar(30) NOT NULL,
  deskripsi_mapel text NOT NULL,
  PRIMARY KEY (id_mapel)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_pengumuman (
  id_pengumuman int(11) NOT NULL AUTO_INCREMENT,
  judul_pengumuman varchar(50) NOT NULL,
  isi_pengumuman text NOT NULL,
  tanggal_pengumuman date NOT NULL,
  s_username varchar(30) NOT NULL,
  PRIMARY KEY (id_pengumuman)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_psb (
  id_psb int(11) NOT NULL AUTO_INCREMENT,
  nama_psb varchar(30) NOT NULL,
  foto text NOT NULL,
  nem varchar(5) NOT NULL,
  jenkel varchar(1) NOT NULL,
  sekolah_asal text NOT NULL,
  no_sttb varchar(15) NOT NULL,
  tanggal_sttb date NOT NULL,
  tempat_lahir varchar(30) NOT NULL,
  tanggal_lahir date NOT NULL,
  bb int(3) NOT NULL,
  tb int(3) NOT NULL,
  status_psb int(1) NOT NULL,
  tanggal_psb date NOT NULL,
  nama_ortu varchar(30) NOT NULL,
  pekerjaan_ortu varchar(50) NOT NULL,
  alamat_psb text NOT NULL,
  polling_psb varchar(20) NOT NULL,
  telepon varchar(15) NOT NULL,
  email varchar(30) NOT NULL,
  PRIMARY KEY (id_psb)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_sidebar (
  id_sidebar int(11) NOT NULL AUTO_INCREMENT,
  jenis varchar(20) NOT NULL,
  status int(1) NOT NULL,
  nama varchar(50) NOT NULL,
  isi1 text NOT NULL,
  isi2 text NOT NULL,
  kategori int(2) NOT NULL,
  PRIMARY KEY (id_sidebar)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_siswa (
  id_siswa int(11) NOT NULL AUTO_INCREMENT,
  nis int(10) NOT NULL,
  foto text NOT NULL,
  nama_siswa varchar(30) NOT NULL,
  password varchar(50) NOT NULL,
  jenkel varchar(1) NOT NULL,
  tempat_lahir varchar(30) NOT NULL,
  tanggal_lahir date NOT NULL,
  alamat text NOT NULL,
  tahun_registrasi year(4) NOT NULL,
  tahun_lulus year(4) NOT NULL,
  sekolah_asal text NOT NULL,
  email varchar(30) NOT NULL,
  telepon varchar(15) NOT NULL,
  status_siswa int(1) NOT NULL,
  status_oke int(1) NOT NULL,
  id_kelas int(11) NOT NULL,
  nama_ortu varchar(30) NOT NULL,
  pekerjaan_ortu varchar(50) NOT NULL,
  pekerjaan_sekarang text NOT NULL,
  info_tambahan text NOT NULL,
  id_jurusan int(11) NOT NULL,
  nisn int(50) NOT NULL,
  PRIMARY KEY (id_siswa),
  KEY id_siswa (id_siswa)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=586 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_materi (
  id_materi int(11) NOT NULL AUTO_INCREMENT,
  file_materi varchar(50) NOT NULL,
  judul_materi text NOT NULL,
  deskripsi_materi text NOT NULL,
  id_mapel int(11) NOT NULL,
  nip varchar(30) NOT NULL,
  tanggal_upload date NOT NULL,
  download int(11) NOT NULL,
  id_pbm int(11) NOT NULL,
  PRIMARY KEY (id_materi)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;");



mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_statistik (
  ip_addres varchar(20) NOT NULL,
  tanggal date NOT NULL,
  mengunjungi int(10) NOT NULL,
  online int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;");


mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_tema (
  id_tema int(11) NOT NULL AUTO_INCREMENT,
  nama_tema varchar(30) NOT NULL,
  pembuat varchar(30) NOT NULL,
  url_pembuat varchar(30) NOT NULL,
  deskripsi text NOT NULL,
  tahun year(4) NOT NULL,
  status int(1) NOT NULL,
  PRIMARY KEY (id_tema)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;");



mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_users (
  id_users varchar(50) NOT NULL,
  namausers varchar(30) NOT NULL,
  sandiusers varchar(50) NOT NULL,
  nama_lengkap_users varchar(30) NOT NULL,  
  level_users int(2) NOT NULL,
  s_username varchar(30) NOT NULL,
  login_terakhir datetime NOT NULL,
  email_users varchar(50) NOT NULL,
  PRIMARY KEY (s_username)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;");

mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_jenjang (
  id_jenjang int(11) NOT NULL AUTO_INCREMENT,
  nama_jenjang varchar(30) NOT NULL,
  deskripsi_jenjang text NOT NULL,
  PRIMARY KEY (id_jenjang)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;");

mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_chat (
  id int(11) NOT NULL AUTO_INCREMENT,
  pesan text NOT NULL,
  pengirim varchar(30) NOT NULL,
  id_pbm int(11) NOT NULL,
  tanggal timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;");

mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_blok (
  id_blok int(11) NOT NULL AUTO_INCREMENT,
  nama_blok varchar(30) NOT NULL,
  deskripsi_blok text NOT NULL,
  link_blok int(11) NOT NULL,
  folder text NOT NULL,
  posisi int(11) NOT NULL,
  isi_blok text NOT NULL,
  menu_blok int(11) NOT NULL,
  status int(11) NOT NULL,
  urutan int(11) NOT NULL,
  PRIMARY KEY (id_blok)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;");

mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_menu (
  id_menu tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  menu_id tinyint(3) unsigned NOT NULL DEFAULT '0',
  judul varchar(100) NOT NULL DEFAULT '',
  url varchar(100) NOT NULL DEFAULT '',
  urutan tinyint(3) unsigned NOT NULL DEFAULT '100',
  status int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id_menu)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;");

mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_modul (
  id_modul int(11) NOT NULL AUTO_INCREMENT,
  nama_modul varchar(30) NOT NULL,
  folder_modul varchar(30) NOT NULL,
  pembuat varchar(30) NOT NULL,
  url_pembuat varchar(30) NOT NULL,
  deskripsi text NOT NULL,
  tahun year(4) NOT NULL,
  status int(1) NOT NULL,
  session text NOT NULL,
  PRIMARY KEY (id_modul)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;");



mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_kurikulum (
  id_kurikulum int(11) NOT NULL AUTO_INCREMENT,
  nama_kurikulum varchar(30) NOT NULL,
  deskripsi_kurikulum text NOT NULL,
  PRIMARY KEY (id_kurikulum)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;");

mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_header (
  id_header int(11) NOT NULL AUTO_INCREMENT,
  file_header varchar(50) NOT NULL,
  tema varchar(50) NOT NULL,
  PRIMARY KEY (id_header)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");





///#############################################################################################################
//Bagian untuk memasukkan data kedalam tabel database

//Memasukkan Data Admin
$sandi1=MD5($_POST['password']);
$sandi2=base64_decode($sandi1);
$sandi3=MD5($sandi2);
$sandi4=base64_decode($sandi3);
$sandi=MD5($sandi4);
$tanggal=date("Ymd");
$waktu=date("Y-m-d H:i:s");
$sandix0=$_POST['username'].''.$tanggal;
$sandix=MD5($sandix0);
  if ($_SESSION["installweb"]=="1"){
			$siswa="Siswa";
			$guru="Guru";
			$sekolah="Sekolah";

  }elseif ($_SESSION["installweb"]=="2"){
			$siswa="Santri";
			$guru="Utadz";
			$sekolah="Pondok Pesantren";

  }elseif ($_SESSION["installweb"]=="3"){
			$siswa="Mahasiswa";
			$guru="Dosen";
			$sekolah="Perguruan Tinggi";

  }elseif ($_SESSION["installweb"]=="4"){
			$siswa="Peserta";
			$guru="Instruktur";
			$sekolah="Instansi";

  }elseif ($_SESSION["installweb"]=="5"){
			$siswa="Peserta";
			$guru="Instruktur";
			$sekolah="Perusahaan";

  }elseif ($_SESSION["installweb"]=="6"){
			$siswa="Peserta";
			$guru="Instruktur";
			$sekolah="Komunitas";

  }elseif ($_SESSION["installweb"]=="7"){
			$siswa="Peserta";
			$guru="Instruktur";
			$sekolah="Blog";

  }elseif ($_SESSION["installweb"]==""){
			$siswa="Siswa";
			$guru="Guru";
			$sekolah="Sekolah";

  }

mysql_query ("INSERT INTO ".$DB_KODE."_users (id_users, namausers, sandiusers, nama_lengkap_users, level_users, s_username, login_terakhir, email_users) VALUES
('$sandix',
 '$_POST[username]',
 '$sandi',
 '$_POST[nama]',
 '0',
 '$_POST[username]$tanggal',
 '$waktu',
 '$_POST[email]'
)
");

//Memasukkan data agenda
mysql_query ("INSERT INTO ".$DB_KODE."_agenda (id_agenda, judul_agenda, tanggal_agenda, tempat_agenda, keterangan_agenda, s_username) VALUES
(13, 'Uji Coba UN Kabupaten 1', '2012-02-01', '".$sekolah."  Formulasi Indonesia', 'Uji Coba UN Kabupaten 1 wajib diikuti oleh seluruh siswa kelas 3', '$_POST[username]$tanggal'),
(14, 'UPK ".$sekolah." ', '2012-02-07', '".$sekolah."  Formulasi Indonesia', 'UPK ".$sekolah."  dilaksanakan mulai tanggal 7 sampai dengan 11 Februari 2012', '$_POST[username]$tanggal'),
(15, 'UTK ".$sekolah." ', '2012-02-20', '".$sekolah."  Formulasi Indonesia', '-', '$_POST[username]$tanggal'),
(16, 'Uji Coba UN Sekolah 1', '2012-02-21', '".$sekolah."  Formulasi Indonesia', 'Uji Coba UN ".$sekolah."  1 dilaksanakan pada tanggal 21 Februari dan 22 Februari 2012', '$_POST[username]$tanggal'),
(17, 'UPK ".$sekolah." ', '2012-03-05', '".$sekolah."  Formulasi Indonesia', 'UPK Nasional dilaksanakan pada tanggal 5 Maret samapi 9 Maret 2012 dan wajib diikuti oleh seluruh sioswa kelas 3', '$_POST[username]$tanggal'),
(18, 'Ujian Praktik ".$sekolah."  tertulis ( BSI dan KWU ) ', '2012-03-10', '".$sekolah." Formulasi Indonesia', 'Ujian Praktik ".$sekolah."  tertulis ( BSI dan KWU )', '$_POST[username]$tanggal'),
(19, 'UPS Normada', '2012-03-12', '".$sekolah."  Formulasi Indonesia', '-', '$_POST[username]$tanggal'),
(20, 'Ujian Teori Kejuruan ( UTK ) Utama', '2012-03-22', '".$sekolah."  Formulasi Indonesia', '-', '$_POST[username]$tanggal'),
(21, 'Ujian ".$sekolah."  Utama', '2012-03-24', '".$sekolah."  Formulasi Indonesia', 'Ujian Sekolah Utama dilaksanakan mulai tanggal 24 Maret sampai dengan 31 Maret 2012', '$_POST[username]$tanggal'),
(22, 'Uji Coba UN Kabupaten 2', '2012-04-02', '".$sekolah."  Formulasi Indonesia', 'Uji Coba UN Kabupaten 2 dilaksanakan mulai tanggal 2 April 2012 sampai dengan tanggal 3 April 2012', 'hanna20120213');");




//Memasukkan data berita
mysql_query ("INSERT INTO ".$DB_KODE."_berita (id_berita, judul_berita, isi_berita, tanggal_posting, gambar_kecil, status_terbit, status_komentar, status_headline, s_username, id_kategori) VALUES
(68, 'Jangan Malas Untuk Belajar', '<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>', '2011-11-30', 'mumet.jpg', 1, 1, 1, '$_POST[username]$tanggal', 1),
(69, 'Buku dan pensil adalah peralatan ".$sekolah." ', '<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>', '2011-11-30', 'potlot.jpg', 1, 1, 1, '$_POST[username]$tanggal', 1),
(70, 'Belajar Bersama di Perpustakaan', '<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>', '2011-11-30', 'belajar.jpg', 1, 1, 1, '$_POST[username]$tanggal', 1),
(71, 'Mengerjakan Tugas Rumah', '<p><strong>Lorem Ips</strong><strong>um</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>', '2011-11-30', 'menulis.jpg', 1, 1, 1, '$_POST[username]$tanggal', 1),
(72, 'Membaca buku disaat jam istirahat sangat jarang dilakukan ".$siswa."', '<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>', '2011-11-30', 'sinau.jpg', 1, 1, 1, '$_POST[username]$tanggal', 1);
");



//Memasukkan data guru dan staff
mysql_query ("
INSERT INTO ".$DB_KODE."_guru_staff (id_gurustaff, nip, posisi, nama_gurustaff, password, foto, jenkel, id_mapel, id_jabatan, alamat, status_kawin, tahun_masuk, pendidikan_terakhir, email, telepon, tempat_lahir, tanggal_lahir, nuptk) VALUES
(23, '123456789', 'guru', 'Ari Rusmanto, S.Kom', '214c919f5b10ec7ec85d7d1d4c103586', 'arie.jpg', 'L', 1, 1, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, INDONESIA', 'Menikah', 2008, 'Magister (S2)', 'mas@arirusmanto.com', '085741444348', 'Boyolali', '1990-01-01', '435466767656545333'),
(25, '987654321', 'staff', 'Fauzan A Mahanani, S.Pd', '214c919f5b10ec7ec85d7d1d4c103586', 'fauzan.jpg', 'L', 0, 6, 'Kesenet, RT 05/01, Banjarmangu, Banjarnegara, Jawa Tengah', 'Sudah Menikah', 2010, 'Strata 1 (S1)', 'fauzan.mahanani@gmail.com', '087838992200', 'Banjarnegara', '1986-11-11', '435466767656545354');
");


//Memasukkan data info sekolah
mysql_query ("INSERT INTO ".$DB_KODE."_info_sekolah (id_info, nama_info, isi_info, tanggal_info, posisi_menu, status_terbit) VALUES
(1, 'Sambutan Kepala ".$sekolah." ', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>', '2011-11-30', 2, 1),
(2, 'Sejarah', '<p><strong>Lorem ipsum dolor sit amet, c</strong>onsectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>\r\n<p><strong>Lorem ipsum dolor sit amet</strong>, consectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>', '2011-11-30', 0, 1),
(3, 'Visi Misi', '<p><strong>Lorem ipsum dolor sit amet, c</strong>onsectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>\r\n<p><strong>Lorem ipsum dolor sit amet</strong>, consectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>', '2011-10-19', 0, 1),
(4, 'Sarana Prasarana', '<p><strong>Lorem ipsum dolor sit amet, c</strong>onsectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>\r\n<p><strong>Lorem ipsum dolor sit amet</strong>, consectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>', '2011-10-19', 0, 1),
(5, 'Struktur Organisasi', '<p><strong>Lorem ipsum dolor sit amet, c</strong>onsectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>\r\n<p><strong>Lorem ipsum dolor sit amet</strong>, consectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>', '2011-10-19', 0, 1),
(6, 'Prestasi', '<p><strong>Lorem ipsum dolor sit amet, c</strong>onsectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>\r\n<p><strong>Lorem ipsum dolor sit amet</strong>, consectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>', '2011-10-19', 0, 1),
(7, 'Ekstrakulikuler', '<p><strong>Lorem ipsum dolor sit amet, c</strong>onsectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>\r\n<p><strong>Lorem ipsum dolor sit amet</strong>, consectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>', '2011-10-19', 0, 1),
(8, 'OSIS', '<p><strong>Lorem ipsum dolor sit amet, c</strong>onsectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>\r\n<p><strong>Lorem ipsum dolor sit amet</strong>, consectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>', '2011-10-19', 0, 1);");


//Memasukkan data jabatan
mysql_query ("INSERT INTO ".$DB_KODE."_jabatan (id_jabatan, nama_jabatan, deskripsi_jabatan) VALUES
(4, 'Guru Bantu', '-'),
(1, 'Belum Ada', '-'),
(3, 'Kepala Tata Usaha', 'Lorem ipsum dolor sit amet amet'),
(5, 'Staff Perpus', '-'),
(6, 'Kepala Keamanan', '-'),
(7, 'Admin Keuangan', '-');");

//Memasukkan data kategori
mysql_query ("INSERT INTO ".$DB_KODE."_kategori (id_kategori, nama_kategori, deskripsi_kategori, fungsi, sub) VALUES
(1, 'Tanpa Kategori', 'Ini adalah contoh kategori pada instalasi sistem untuk pertama kali', '', '0'),
(11, 'Pembangunan ".$sekolah." ', '', '', '0'),
(12, 'Informasi ".$sekolah." ', '', '', '0'),
(13, 'Agenda ".$sekolah." ', '', '', '0'),
(14, 'Kegiatan ".$siswa."', '', '', '0'),
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
(35, 'Teknologi Tepat Guna', '', 'link', '22'),
(36, 'Pondok Pesantren', '', 'link', '16');");

//Memasukkan data kelas
mysql_query ("INSERT INTO ".$DB_KODE."_kelas (id_kelas, nama_kelas, deskripsi_kelas) VALUES
(1, 'XI', 'Kelas XI'),
(2, 'XII', 'Kelas XII'),
(3, 'XIII', 'Kelas XIII');");

//MEmasukkan data komentar
mysql_query ("
INSERT INTO ".$DB_KODE."_komentar (id_komentar, id_berita, nama_komentar, email_komentar, isi_komentar, tanggal_komentar, status_terima,url) VALUES
(31, 69, 'Tri Budiarto', 'tribudiarto@yahoo.com', 'masak sih? padahal dulu jaman saya ".$sekolah." ga pernah lho bawa buku sama pensil, saya ".$sekolah." cuma modal seragam doank...', '2011-11-30', 1,'http://www.m-edukasi.web.id/search/label/media%20pembelajaran'),
(32, 70, 'Petrus Dwijoko', 'petruk@perang.com', 'Waduh, dulu disekolah saya ga ada perpustakaan mas', '2011-11-30', 1,'http://www.m-edukasi.web.id/search/label/metode%20pembelajaran'),
(33, 71, 'Suwarno', 'nanoe@yahoo.com', 'Mengerjakan tugas rumah memang sangat menyenangkan, apalagi tentang matematika', '2011-11-30', 1,'http://www.m-edukasi.web.id/search/label/PENELITIAN%20TINDAKAN%20KELAS'),
(34, 72, 'Tedy Ruswanta', 'tedy@yahoo.com', 'Iya, apalagi jaman sekarang, mereka malah lebih senang online social network lewat HP', '2011-11-30', 1,'http://www.m-edukasi.web.id/search/label/uji%20kompetensi%20guru'),
(30, 68, 'Ari Rusmanto', 'ariecupu@gmail.com', 'Saya tidak pernah malas untuk belajar mas, saya selalu penasaran dengan sesuatu yang menambah pengetahuan saya.', '2011-11-30', 1,'http://www.m-edukasi.web.id/search/label/uji%20kompetensi%20guru');
");


//Memasukkan data mapel
mysql_query ("INSERT INTO ".$DB_KODE."_mapel (id_mapel, nama_mapel, deskripsi_mapel) VALUES
(1, 'Bahasa Indonesia', 'belom ada deskripsi'),
(2, 'Matematika', ''),
(5, 'Penjaskes', ''),
(6, 'Pkn Sejarah', ''),
(7, 'Bahasa Inggris', ''),
(8, 'TIK', ''),
(9, 'Biologi', ''),
(10, 'Fisika', ''),
(11, 'Pendidikan Agama Islam', '');");

$mailnya='treva'.$_POST['email'];
$cks=base64_encode($mailnya);
$cookies=md5($cks);
//Memasukkan data pengaturan
$sekolah2=strtoupper($sekolah);
mysql_query ("INSERT INTO ".$DB_KODE."_pengaturan (id_pengaturan, nama_pengaturan, isi_pengaturan, isi_pengaturan2) VALUES
(1, 'url_website', 'localhost/formulasi', ''),
(2, 'tambah_admin', '1', ''),
(3, 'jumlah_data', '10', ''),
(4, 'data_siswa', '0', ''),
(5, 'data_alumni', '0', ''),
(6, 'data_guru', '0', ''),
(7, 'form_alumni', '1', ''),
(8, 'nama_sekolah', '".$sekolah2." FORMULASI INDONESIA', '1990'),
(9, 'telepon', '081327030060', '655656'),
(10, 'email', 'sekretariat@formulasi.or.id', ''),
(11, 'kepsek', 'Fauzan A Mahanani', '5454545'),
(12, 'alamat', 'Semarang, Jawa Tengah, Indonesia\r\n', ''),
(13, 'logo', 'home.png', '65656'),
(14, 'gmap', '', ''),
(16, 'tampil_pesan_tamu', '1', ''),
(15, '1', '<p><strong>Maaf, belum waktunya pendaftaran ".$siswa." baru</strong></span></p>', '<p><span style=font-size: large;>-<br /></p>'),
(17, 'session', 'UG93ZXJlZCBieSA8YSBocmVmPSJodHRwOi8vY21zLmZvcm11bGFzaS5vci5pZC8iIHRhcmdldD0iX2JsYW5rIj5Gb3JtdWxhc2kgRnJlZSBPcGVuc291cmNlIENNUzwvYT4gfCA8YSBocmVmPSJodHRwOi8vd3d3LnBhbmppbWVkaWEuY29tL2xheWFuYW4vcHJvZHVrLXdlYnNpdGUtc2Vrb2xhaC1tdXJhaC8iIHRhcmdldD0iX2JsYW5rIj5Ib3N0aW5nIFNla29sYWg8L2E+PC9kaXY+CQkJPGRpdiBjbGFzcz0iZl9rYW5hbiI+PGEgaHJlZj0iaW5kZXgucGhwIj5Ib21lPC9hPiB8IDxhIGhyZWY9ImluZGV4LnBocD9wPXBzYiI+UHNiIE9ubGluZTwvYT4gfCA8YSBocmVmPSJlbGVhcm5pbmdrdS8iPkUtbGVhcm5pbmc8L2E+IDwvZGl2PjwvZGl2Pg==', 'PHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiPg0KdmFyIHBvcHVybHM9bmV3IEFycmF5KCkNCnBvcHVybHNbMF09Imh0dHA6Ly93d3cucGFuamltZWRpYS5jb20iDQpwb3B1cmxzWzFdPSJodHRwOi8vd3d3LmZvcm11bGFzaS5vci5pZCINCnBvcHVybHNbMl09Imh0dHA6Ly9jbXMuZm9ybXVsYXNpLm9yLmlkIg0KcG9wdXJsc1szXT0iaHR0cDovL3d3dy5tLWVkdWthc2kud2ViLmlkIg0KZnVuY3Rpb24gb3BlbnBvcHVwKHBvcHVybCl7DQp2YXIgd2lucG9wcz13aW5kb3cub3Blbihwb3B1cmwsIiIsIndpZHRoPSxoZWlnaHQ9LHRvb2xiYXIsbG9jYXRpb24sZGlyZWN0b3JpZXMsc3RhdHVzLHNjcm9sbGJhcnMsbWVudWJhcixyZXNpemFibGUiKQ0KfQ0Kb3BlbnBvcHVwKHBvcHVybHNbTWF0aC5mbG9vcihNYXRoLnJhbmRvbSgpKihwb3B1cmxzLmxlbmd0aCkpXSkNCjwvc2NyaXB0Pg=='),
(18, 'cookies', '$cks', '$cookies'),
(19, 'jenjang_sekolah', '6', 'SMK/MAK'),
(20, 'nomor', '66565', '5344546769879');");

//Memasukkan data pengumuman
mysql_query ("INSERT INTO ".$DB_KODE."_pengumuman (id_pengumuman, judul_pengumuman, isi_pengumuman, tanggal_pengumuman, s_username) VALUES
(10, 'Pengumuman website baru', '<p>Bahwasanya akan diresmikan website ".$sekolah." dengan platform <a href=http://cms.formulasi.or.id/ target=_blank><strong>FORMULASI CMS</strong></a>, seluruh ".$siswa." dan ".$guru." akan mendapatkan password untuk melakukan login pada sistem e-learning.</p>\r\n<p>Pengambilan password dilayani pada tanggal <strong><em>16 Desember 2011</em></strong> di <strong><span style=text-decoration: underline;>Ruang IT</span></strong>, dan pengambilan password ".$siswa." dapat diwakilkan oleh ketua kelas.</p>', '2011-11-30', '$_POST[username]$tanggal');
");

//Memasukkan data sidebar
mysql_query ("INSERT INTO ".$DB_KODE."_sidebar (id_sidebar, jenis, status, nama, isi1, isi2, kategori) VALUES
(6, 'ym', 1, 'Ari Rusmanto', 'ariecupu@ymail.com', '', ''),
(7, 'ym', 1, 'Fauzan A Mahanani', 'dino_cerata', '', ''),
(8, 'polling', 1, 'Apakah Website ".$sekolah."  ini bagus ?', '', 'pertanyaan', ''),
(9, 'polling', 1, 'Bagus sekali', '103', 'jawaban', ''),
(10, 'polling', 1, 'Bagus', '30', 'jawaban', ''),
(11, 'polling', 1, 'Kurang Bagus', '3', 'jawaban', ''),
(12, 'polling', 1, 'Tidak Bagus', '1', 'jawaban', ''),
(16, 'link', 1, 'CMS Formulasi', 'cms.formulasi.or.id', '', '22'),
(17, 'link', 1, 'Formulasi', 'www.formulasi.or.id', '', '16');");


mysql_query ("INSERT INTO ".$DB_KODE."_sidebar (id_sidebar, jenis, status, nama, isi1, isi2, kategori) VALUES
('', 'link', 1, 'Belajar Multimedia', 'www.mahanani.web.id', '', '17'),
('', 'link', 1, 'Media edukasi', 'www.m-edukasi.web.id', '', '16');");
//Memasukkan data siswa
mysql_query ("INSERT INTO ".$DB_KODE."_siswa (id_siswa, nis, foto, nama_siswa, password, jenkel, tempat_lahir, tanggal_lahir, alamat, tahun_registrasi, tahun_lulus, sekolah_asal, email, telepon, status_siswa, status_oke, id_kelas, nama_ortu, pekerjaan_ortu, pekerjaan_sekarang, info_tambahan, id_jurusan, nisn) VALUES
(22, 1237, 'no_photo.jpg', 'Nur Anisa Rahmawati', 'ca820120f6cc78fa965642a82e8a2352', 'P', 'Boyolali', '1996-06-13', '', 2011, 0000, 'SMP N 1 INDONESIA', '', '', 1, 0, 1, 'Tarjo', '', '', '', '1',''),
(21, 1236, 'no_photo.jpg', 'Anggar Budi Astuti', 'ca820120f6cc78fa965642a82e8a2352', 'P', 'Boyolali', '1996-01-11', '', 2011, 0000, 'SMP N 2 INDONESIA', '', '', 1, 0, 1, 'Budianto', '', '', '', '1',''),
(19, 1234, 'no_photo.jpg', 'Tedy Ruswanta', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'Jogja', '1996-11-16', 'Mojosongo,Boyolali', 2011, 0000, 'SMP N 2 INDONESIA', 'tedy@yahoo.com', '085741111111', 1, 0, 1, 'Tukino', '', '', '', '1',''),
(20, 1235, 'no_photo.jpg', 'Tri Kurniyawati', 'ca820120f6cc78fa965642a82e8a2352', 'P', 'Boyolali', '1996-02-20', '', 2011, 0000, 'SMP N 3 INDONESIA', '', '', 1, 0, 1, 'Rakimin', '', '', '', '1',''),
(23, 1238, 'no_photo.jpg', 'Budianto', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'Boyolali', '1996-05-03', '', 2011, 0000, 'SMP N 1 INDONESIA', '', '', 1, 0, 1, 'Paino', '', '', '', '1',''),
(24, 1239, 'no_photo.jpg', 'Ika Kartiwi', 'ca820120f6cc78fa965642a82e8a2352', 'P', 'Boyolali', '1996-02-06', '', 2011, 0000, 'Mts N 1 INDONESIA', '', '', 1, 0, 1, 'Asmuni', '', '', '', '2',''),
(25, 1241, 'no_photo.jpg', 'Nicky Ilana', 'ca820120f6cc78fa965642a82e8a2352', 'P', 'Boyolali', '1996-08-01', '', 2011, 0000, 'SMP N 3 INDONESIA', '', '', 1, 0, 1, 'Jumali', '', '', '', '2',''),
(26, 1242, 'no_photo.jpg', 'Anang Maruf Perdana', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'Boyolali', '1996-09-06', '', 2011, 0000, 'SMP N 3 INDONESIA', '', '', 1, 0, 1, 'Paino', '', '', '', '2',''),
(27, 1243, 'no_photo.jpg', 'Nofianto Andri Wibowo', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'Boyolali', '1996-11-13', '', 2011, 0000, 'Mts N 1 INDONESIA', '', '', 1, 0, 1, 'Sarindi', '', '', '', '2',''),
(28, 1244, 'no_photo.jpg', 'Eko Widianto', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'Boyolali', '1996-04-03', '', 2011, 0000, 'Mts N 1 INDONESIA', '', '', 1, 0, 1, 'Widianto', '', '', '', '2',''),
(29, 1245, 'no_photo.jpg', 'Tyas Dwi Pratistaningsih', 'ca820120f6cc78fa965642a82e8a2352', 'P', 'Boyolali', '1996-10-03', '', 2011, 0000, 'SMP N 3 INDONESIA', '', '', 1, 0, 28, 'Suwarno', '', '', '', '2',''),
(30, 1246, 'no_photo.jpg', 'Anes Ardianto', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'Boyolali', '1996-03-07', '', 2011, 0000, 'SMP N 3 INDONESIA', '', '', 1, 0, 2, 'Paijan', '', '', '', '2',''),
(31, 1247, 'no_photo.jpg', 'Mawar Rahmawati', 'ca820120f6cc78fa965642a82e8a2352', 'P', 'Boyolali', '1995-06-08', '', 2011, 0000, 'SMP N 3 INDONESIA', '', '', 1, 0, 2, 'Sumpeno', '', '', '', '2',''),
(32, 1248, 'no_photo.jpg', 'Anifah Nur Hidayanti', 'ca820120f6cc78fa965642a82e8a2352', 'P', 'Boyolali', '1996-08-15', '', 2011, 0000, 'Mts N 1 INDONESIA', '', '', 1, 0, 2, 'Sumanto', '', '', '', '2',''),
(33, 1249, 'no_photo.jpg', 'Oscar Anindita', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'Boyolali', '1996-06-13', '', 2011, 0000, 'SMP N 3 INDONESIA', '', '', 1, 0, 2, 'Darkun', '', '', '', '2',''),
(34, 1250, 'no_photo.jpg', 'Melani Putri', 'ca820120f6cc78fa965642a82e8a2352', 'P', 'Boyolali', '1996-04-16', '', 2011, 0000, 'SMP N 2 INDONESIA', '', '', 1, 0, 2, 'Giyarto', '', '', '', '2',''),
(35, 1251, 'no_photo.jpg', 'Dwi Rohmawati', 'ca820120f6cc78fa965642a82e8a2352', 'P', 'Boyolali', '1996-07-13', '', 2011, 0000, 'Mts N 1 INDONESIA', '', '', 1, 0, 2, 'Sularso', '', '', '', '2',''),
(36, 1252, 'no_photo.jpg', 'David Ridwan Hanafi', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'Boyolali', '1996-05-14', '', 2011, 0000, 'SMP N 1 INDONESIA', '', '', 1, 0, 3, 'Supardi', '', '', '', '2',''),
(37, 1253, 'no_photo.jpg', 'Siti Hindarwanti', 'ca820120f6cc78fa965642a82e8a2352', 'P', 'Boyolali', '1996-07-01', '', 2011, 0000, 'SMP N 2 INDONESIA', '', '', 1, 0, 3, 'Pardi', '', '', '', '2',''),
(38, 1254, 'no_photo.jpg', 'Reno Hanafi', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'Boyolali', '1996-10-02', '', 2011, 0000, 'SMP N 2 INDONESIA', '', '', 1, 0, 3, 'Giyono', '', '', '', '2',''),
(39, 1255, 'no_photo.jpg', 'Giyarti', 'ca820120f6cc78fa965642a82e8a2352', 'P', 'Boyolali', '1996-03-13', '', 2011, 0000, 'SMP N 1 INDONESIA', '', '', 1, 0, 3, 'Sudiyono', '', '', '', '2','');");

mysql_query ("INSERT INTO ".$DB_KODE."_siswa (id_siswa, nis, foto, nama_siswa, password, jenkel, tempat_lahir, tanggal_lahir, alamat, tahun_registrasi, tahun_lulus, sekolah_asal, email, telepon, status_siswa, status_oke, id_kelas, nama_ortu, pekerjaan_ortu, pekerjaan_sekarang, info_tambahan, id_jurusan, nisn) VALUES
(40, 1256, 'no_photo.jpg', 'Dwi Joko ', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'Boyolali', '1987-02-11', 'Jl. Empat puluhan, INDONESIA', 2011, 0000, 'SMP N 8 INDONESIA', 'dwi.joko@yahoo.co.id', '085741444348', 1, 0, 3, 'Purnomo', 'PNS', '', '', '2',''),
(41, 1257, 'no_photo.jpg', 'Sandy Tyas Cinde', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'INDONESIA', '1987-02-12', 'Jl. Endok puluhan, INDONESIA', 2011, 0000, 'SMP N 3 INDONESIA', 'hello@yahoo.com', '085741444345', 1, 0, 3, 'Kentarso', 'PNS', '', '', '2',''),
(42, 1258, 'no_photo.jpg', 'Kelas Abidin', 'ca820120f6cc78fa965642a82e8a2352', 'P', 'INDONESIA', '1987-02-12', 'Jl. Tigapuluhan, INDONESIA', 2011, 0000, 'SMP N 2 INDONESIA', 'hello@gmail.com', '085741444355', 1, 0, 3, 'Pentarso', 'Swasta', '', '', '2',''),
(43, 1208, 'no_photo.jpg', 'Sonny Maylendra', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'INDONESIA', '1996-05-20', 'Jl. Empat Kaki, INDONESIA', 2011, 0000, 'SMP N 1 INDONESIA', 'sony.em@gmail.com', '085741444666', 1, 0, 3, 'Kuntarso', 'PNS', '', '', '2',''),
(44, 1259, 'no_photo.jpg', 'Febri Alfiriza', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'INDONESIA', '1996-07-20', 'Jl. Puluhan, INDONESIA', 2011, 0000, 'SMP N 7 INDONESIA', 'febrize@yahoo.co.id', '085741444777', 1, 0, 3, 'Piyarto Gk', 'PNS', '', '', '2',''),
(45, 1260, 'no_photo.jpg', 'Fatima Tuzahro', 'ca820120f6cc78fa965642a82e8a2352', 'P', 'Kalimantan', '1996-01-20', 'Jl. Empat Dua Satu, INDONESIA', 2011, 0000, 'SMP N 8 INDONESIA', 'zahrozahrozahro@yahoo.co.id', '085741444111', 1, 0, 3, 'Pantarso', 'Swasta', '', '', '2',''),
(46, 1261, 'no_photo.jpg', 'Tri Munfaikoh', 'ca820120f6cc78fa965642a82e8a2352', 'P', 'Surakarta', '1996-06-21', 'Jl. Murez, INDONESIA', 2011, 0000, 'SMP N 2 INDONESIA', 'tritigatelu@yahoo.co.id', '085741111348', 1, 0, 3, 'Diyarto', 'PNS', '', '', '2',''),
(47, 1201, 'no_photo.jpg', 'Ganang Hendra', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'Surakarta', '1996-05-16', 'Jl. Empat Kuda Liar, INDONESIA', 2011, 0000, 'SMP N 1 INDONESIA', 'ganang@gmail.com', '085741111111', 1, 0, 3, 'Gaino', 'PNS', '', '', '2',''),
(48, 1062, 'no_photo.jpg', 'Fakar Nurhalim', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'Klaten', '1996-09-16', 'Jl. Empat Ribu, INDONESIA', 2004, 2007, 'SMP N 10 INDONESIA', 'fakar@gmail.com', '085741124348', 0, 0, 0, '', '', 'Pegawai Negeri Sipil', 'Informasi Tambahan', '2',''),
(49, 1062, 'no_photo.jpg', 'Dwi Widianto', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'Surakarta', '1996-09-05', 'Jl. Empat Gajah, INDONESIA', 2004, 2007, 'SMP N 6 INDONESIA', 'dwidwi@ymail.com', '085741112222', 0, 0, 0, '', '', 'Guru', 'Informasi Tambahan', '2',''),
(50, 1064, 'no_photo.jpg', 'Riskaha Isnan', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'Surakarta', '1996-02-22', 'Jl. Euluhan, INDONESIA', 2004, 2007, 'SMP N 12 INDONESIA', 'isnan@gmail.com', '085741133333', 0, 0, 0, '', '', 'Karyawan Swasta', 'Informasi Tambahan', '2',''),
(51, 1065, 'no_photo.jpg', 'Alfi Nur Rahmi', 'ca820120f6cc78fa965642a82e8a2352', 'P', 'Jombang', '1996-04-18', 'Jl. Empat Kaki Tiga, INDONESIA', 2004, 2007, 'SMP N 11 INDONESIA', 'alfi@yahoo.co.id', '085741113311', 0, 0, 0, '', '', 'Wiraswasta', 'Informasi Tambahan', '2',''),
(52, 1066, 'no_photo.jpg', 'Windi Febri', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'Cilacap', '1996-12-16', 'Jl. Janti, INDONESIA', 2004, 2007, 'SMP N 11 INDONESIA', 'windi@gmail.com', '08574111232', 0, 0, 0, '', '', 'Produsen Sepatu', 'Informasi Tambahan', '2',''),
(53, 1067, 'no_photo.jpg', 'Rizky Setia', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'Klaten', '1990-02-10', 'Jl. Empat Dua Satu, INDONESIA', 2004, 2007, 'SMP N 12 INDONESIA', 'tinta.merah@ymail.com', '085741133311', 0, 0, 0, '', '', 'Wiraswasta', 'Informasi Tambahan', '1',''),
(54, 1027, 'no_photo.jpg', 'Budi Doremi', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'Surakarta', '1991-05-01', 'Jl. Empat Satu, INDONESIA', 2004, 2007, 'SMP N 1 INDONESIA', 'budibudi@yahoo.co.id', '085741113333', 0, 0, 0, '', '', 'Boss', 'Informasi Tambahan', '1',''),
(55, 1017, 'no_photo.jpg', 'Ririn Dwi Ariani', 'ca820120f6cc78fa965642a82e8a2352', 'P', 'Klaten', '1996-12-20', '', 2004, 2007, 'SMP N 4 INDONESIA', 'ririncantik@gmail.com', '08574113333', 0, 0, 0, '', '', 'Guru', 'Informasi Tambahan', '1',''),
(56, 1068, 'no_photo.jpg', 'Muhamad Reza', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'Tangerang', '1996-10-20', 'Jl. Empat Dara, INDONESIA', 2004, 2007, 'Mts N 2 INDONESIA', 'murez@gmail.com', '085741113311', 0, 0, 0, '', '', 'Perawat', 'Informasi Tambahan', '1',''),
(57, 1069, 'no_photo.jpg', 'Budi Anduk', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'Jakarta', '1996-06-20', 'Jl. Empat Lima, INDONESIA', 2004, 2007, 'SMP N 5 INDONESIA', 'budibudianduk@yahoo.co.id', '', 0, 0, 0, '', '', 'Bidan', 'Informasi Tambahan', '1',''),
(58, 1070, 'no_photo.jpg', 'Jerink Setiawan', 'ca820120f6cc78fa965642a82e8a2352', 'L', 'Surakarta', '1996-02-12', 'Jl. Dua Puluhan, INDONESIA', 2004, 2007, 'SMP N 6 INDONESIA', 'jerink@gmail.com', '', 0, 0, 0, '', '', 'Dokter', 'Informasi Tambahan', '1','');");


//Memasukkan data tema
mysql_query ("INSERT INTO ".$DB_KODE."_tema (id_tema, nama_tema, pembuat, url_pembuat, deskripsi, tahun, status) VALUES
(10, 'simpel', 'Formulasi', 'http://www.formulasi.or.id', 'glossy, simpel', 2012, 0),
(11, 'respons', 'Formulasi', 'http://www.mahanani.web.id', 'Tema Default Responsive', 2014, 1);");

//Memasukkan data album
mysql_query ("INSERT INTO ".$DB_KODE."_album (id_album, nama_album, tanggal_album, deskripsi_album, foto_album) VALUES
(29, 'Kegiatan Siswa', '2012-02-16', '', 'dadasfsafasr32wr34545.jpg'),
(28, 'Foto Alam Ciptaan Tuhan', '2012-02-17', ' ', 'a-misty-morning-1280-1024-6230.jpg');");

//Memasukkan data galeri
mysql_query ("INSERT INTO ".$DB_KODE."_galeri (id_galeri, nama_galeri, id_album, tanggal_galeri, judul, deskripsi) VALUES
(89, 'pengajian_anak-anak.jpg', 29, '2012-02-17', 'Pengajian', 'Pengajian ".$guru." dan ".$siswa."'),
(90, 'u454f64u55764765.jpg', 29, '2012-02-17', 'Ektrakurikuler', 'Ektrakurikuler Pencinta Alam'),
(91, 'lomba-pramuka-menang.jpg', 29, '2012-02-17', 'Lomba Pramuka', 'menjadi juara lomba pramuka'),
(88, 'dadasfsafasr32wr34545.jpg', 29, '2012-02-17', 'Praktikum', 'Praktikum komputer'),
(87, 'DSC00603.JPG', 28, '2012-02-17', 'Semut', 'Keajaiban Semut'),
(86, 'DSC00596.JPG', 28, '2012-02-17', 'Duri', 'Bunga berduri'),
(83, 'DSC00503.JPG', 28, '2012-02-17', 'Kupu-kupu', 'keindahan Kupu-kupu'),
(84, 'DSC00527.JPG', 28, '2012-02-17', 'Bunga', 'Bunga yang indah'),
(85, 'DSC00587.JPG', 28, '2012-02-17', 'Laba-laba', 'keajaiban laba-laba'),
(82, 'suyatnadotcom.jpg', 29, '2012-02-16', 'Juara', 'Juara lomba'),
(81, 'fgfdgdfgdfgdgdf.jpg', 29, '2012-02-17', 'Ultah ".$sekolah."', 'Pentas band antar kelas');");

mysql_query ("INSERT INTO ".$DB_KODE."_jurusan (id_jurusan, nama_jurusan, deskripsi_jurusan) VALUES
(1, 'Akuntansi', 'Jurusan Akuntansi'),
(2, 'Teknik Audio Video', 'Jurusan Teknik Audio Video');");


mysql_query ("INSERT INTO ".$DB_KODE."_statistik (ip_addres, tanggal, mengunjungi, online) VALUES
('127.0.0.1', '2013-02-15', 106, 1360954889),
('127.0.0.1', '2013-02-16', 198, 1361054799),
('127.0.0.1', '2013-02-17', 65, 1361116357),
('127.0.0.1', '2013-02-18', 13, 1361204790),
('127.0.0.1', '2013-02-19', 18, 1361275944),
('127.0.0.1', '2013-02-20', 566, 1361385310),
('127.0.0.1', '2013-02-21', 144, 1361486181),
('127.0.0.1', '2013-02-22', 34, 1361531229),
('127.0.0.1', '2013-02-23', 129, 1361633273),
('127.0.0.1', '2013-02-24', 5, 1361716031),
('127.0.0.1', '2013-02-25', 80, 1361779136);");


mysql_query ("INSERT INTO ".$DB_KODE."_psb (id_psb, nama_psb, foto, nem, jenkel, sekolah_asal, no_sttb, tanggal_sttb, tempat_lahir, tanggal_lahir, bb, tb, status_psb, tanggal_psb, nama_ortu, pekerjaan_ortu, alamat_psb, polling_psb, telepon, email) VALUES
(15, 'Agus Sasongko', 'no_photo.jpg', '6756', 'L', 'gukjkjhiuhyu', '57645647', '2013-02-04', 'y87yiuh', '2013-02-12', 0, 0, 0, '2013-02-17', 'hyiuyiu', 'Petani', 'hkhkj asdasjhdkjash', 'Media Cetak', '868768', 'agus.ss@yahoo.com');");


mysql_query ("INSERT INTO ".$DB_KODE."_chat (id, pesan, pengirim, id_pbm, tanggal) VALUES
(1, '::hore::', 'Ari Rusmanto, S.Kom', 0, '2013-02-26 17:29:49');"); 

mysql_query ("INSERT INTO ".$DB_KODE."_jenjang (id_jenjang, nama_jenjang, deskripsi_jenjang) VALUES
(1, 'PAUD/KB', 'jenjang PAUD/KB'),
(2, 'TK/RA', 'jenjang TK/RA'),
(3, 'SD/MI', 'jenjang SD/MI'),
(4, 'SMP/MTs', 'jenjang SMP/MTs'),
(5, 'SMA/MA', 'jenjang SMA/MA'),
(6, 'SMK/MAK', 'jenjang SMK/MAK'),
(7, 'Kursus', 'Kursus'),
(8, 'Perguruan Tinggi', 'Perguruan Tinggi');");

$isiblok='<p><a title="Forum Multimedia Edukasi www.formulasi.or.id" href="http://www.formulasi.or.id" target="_blank"> <img title="Forum Multimedia Edukasi www.formulasi.or.id" src="http://1.bp.blogspot.com/-xDZ66oVPkiA/T_gGymPIF_I/AAAAAAAAD9E/aJroe2IR0Xc/s1600/formulasi-123-22-px.png" alt="Forum Multimedia Edukasi www.formulasi.or.id" border="0" /> </a> </p>';

mysql_query ("INSERT INTO ".$DB_KODE."_blok (id_blok, nama_blok, deskripsi_blok, link_blok, folder, posisi, isi_blok, menu_blok, status, urutan) VALUES
(1, 'Login', 'Login E-learning', 0, 'kontenweb/elearning/blok_login.php', 3, '0', 0, 1, 88),
(2, 'Yahoo Messenger', 'Kontak Webmaster', 0, 'kontenweb/blok/kontak.php', 3, '', 0, 1, 100),
(3, 'Link Website', 'Link Website', 0, 'kontenweb/blok/link.php', 3, '', 0, 1, 100),
(4, 'Polling', 'Polling', 0, 'kontenweb/blok/polling.php', 4, '', 0, 1, 100),
(5, 'Statistik', 'Statistik', 0, 'kontenweb/blok/statistik.php', 4, '', 0, 1, 100),
(6, 'Pokok Bahasan Populer', 'Pokok Bahasan Populer', 0, 'kontenweb/elearning/blok_pbm_populer.php', 3, '', 0, 0, 100),
(7, 'Pokok Bahasan Terbaru', 'Pokok Bahasan Terbaru', 0, 'kontenweb/elearning/blok_pbm_terbaru.php', 3, '', 0, 0, 100),
(8, 'Elearning Statistik', 'Elearning Statistik', 0, 'kontenweb/elearning/blok_statistik.php', 4, '0', 0, 0, 100),
(9, 'Kategori', 'kategori', 0, 'kontenweb/blok/kategori.php', 4, '', 0, 1, 100),
(101, 'Komunitas Edukasi', 'Komunitas Edukasi Indonesia', 0, '', 4, '$isiblok', 0, 1, 100);"); 

mysql_query ("INSERT INTO ".$DB_KODE."_menu (id_menu, menu_id, judul, url, urutan, status) VALUES
(1, 0, 'Contoh Menu', '#', 100, 0),
(2, 1, 'Sub Menu 1A', '#', 100, 0),
(3, 0, 'Menu 2', '#', 100, 0),
(4, 1, 'Sub Menu 1B', '#', 100, 0),
(5, 4, 'Sub Menu 1B 1', '#', 100, 0),
('' , '0', 'Daftar Isi', 'daftar-isi.html', '100', '1');"); 

mysql_query ("INSERT INTO ".$DB_KODE."_modul (id_modul, nama_modul, folder_modul, pembuat, url_pembuat, deskripsi, tahun, status, session) VALUES
(1, 'Album Foto', 'album', 'Formulasi', 'http://www.formulasi.or.id', 'Album Foto ".$sekolah."', 2013, 1, ''),
(2, 'Berita', 'berita', 'Formulasi', 'http://www.formulasi.or.id', 'Berita ".$sekolah." ', 2013, 1, ''),
(3, 'Buku Tamu', 'buku', 'Formulasi', 'http://www.formulasi.or.id', 'Buku Tamu Pengunjung', 2013, 1, ''),
(4, 'Data Guru', 'guru', 'Formulasi', 'http://www.formulasi.or.id', 'Data Dewan ".$sekolah." dan Karyawan', 2013, 1, ''),
(5, 'Data Siswa', 'siswa', 'Formulasi', 'http://www.formulasi.or.id', 'Input Data ".$siswa." dan Alumni', 2013, 1, ''),
(6, 'PSB On Line', 'psb', 'Formulasi', 'http://www.formulasi.or.id', 'Penerimaaan Peserta Didik Secara Online', 2013, 1, ''),
(7, 'Elearning Versi Lite', 'materi', 'Formulasi', 'http://www.formulasi.or.id', 'Elearning system untuk virtual kelas Versi Lite', 2013, 1, '');"); 

mysql_query ("INSERT INTO ".$DB_KODE."_kurikulum (id_kurikulum, nama_kurikulum, deskripsi_kurikulum) VALUES
(1, '2004', 'kurikulum 2004'),
(2, '2006', 'kurikulum 2006'),
(3, '2013', 'kurikulum 2013');");



$materi1='<p><br /><object id="_ds_121655280" width="500" height="550" name="_ds_121655280" data="http://viewer.docstoc.com/" type="application/x-shockwave-flash"><param name="FlashVars" value="doc_id=121655280&amp;mem_id=25671170&amp;showrelated=1&amp;showotherdocs=1&amp;doc_type=null&amp;allowdownload=1" /><param name="wmode" value="opaque" /><param name="allowScriptAccess" value="always" /><param name="allowFullScreen" value="true" /><param name="src" value="http://viewer.docstoc.com/" /></object></p>\r\n<script type="text/javascript">// <![CDATA[\r\nvar docstoc_docid="121655280";var docstoc_title="bahan ajar kelas1";var docstoc_urltitle="bahan ajar kelas1";\r\n// ]]></script>\r\n<script type="text/javascript" src="http://i.docstoccdn.com/js/check-flash.js"></script>';
$materi2='<div><strong>Lafal</strong></div>\r\n<div><em>Lafal </em>adalah suatu cara seseorang atau sekelompok orang dalam mengucapkan bunyi bahasa. Bunyi bahasa Indonesia meliputi Vokal, konsonan, diftone, gabungan konsonan.</div>\r\n<div>Dalam tuntunan bahasa, ada sejumlah vonem yang di lafalkan tidak sesuai dengan lafal yang tepat sehingga lafal tersebut tidak baku.</div>\r\n<div><em>Contoh :</em></div>\r\n<table border="1" cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr>\r\n<td valign="top" width="258">\r\n<div align="center"><strong>Pelafalan tidak baku</strong></div>\r\n</td>\r\n<td valign="top" width="222">\r\n<div align="center"><strong>Pelafalan baku</strong></div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td valign="top" width="258">\r\n<div>Ijin</div>\r\n</td>\r\n<td valign="top" width="222">\r\n<div>Izin</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td valign="top" width="258">\r\n<div>Repisi</div>\r\n</td>\r\n<td valign="top" width="222">\r\n<div>&nbsp;Refisi</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td valign="top" width="258">\r\n<div>Pitnah</div>\r\n</td>\r\n<td valign="top" width="222">\r\n<div>Fitnah</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<div>&nbsp;</div>\r\n<div><strong>Tekanan/Nada</strong></div>\r\n<div>Tekanan atau nada adalah tinggi rendahnya pengucapan suatu kata. Dalam hal ini nada berfungsi untuk member tekanan khusus pada kata-kata tertentu.</div>\r\n<div><em>Contoh : </em>&nbsp;</div>\r\n<div><span style="text-decoration: underline;">Dodi </span>sedang jatuh cinta (bukan taufik)</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Intonasi</strong></div>\r\n<div>Intonasi adalah naik turunnya lagu kalimat. Intonasi berfungsi sebagai pembentuk makna kalimat</div>\r\n<div><em>Contoh : </em>&nbsp;</div>\r\n<div>-Pergi (member kabar)</div>\r\n<div>-Pergi (mengusir)</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Jeda</strong></div>\r\n<div>Jeda adalah perhentian lagu kalimat. Jeda terbagi ke dalam 3 jenis yaitu :</div>\r\n<ul>\r\n<li>Jeda panjang ( . ) titik</li>\r\n<li>Jeda sedang ( , ) koma</li>\r\n<li>Jeda pendek ( _ ) spasi</li>\r\n</ul>';
mysql_query ("INSERT INTO ".$DB_KODE."_materi (id_materi, file_materi, judul_materi, deskripsi_materi, id_mapel, nip, tanggal_upload, download, id_pbm) VALUES
(1, 'modul.zip', 'Materi inti', '$materi1', 1, '123456789', '2013-02-25', 6, 1),
(2, 'modul.doc', 'Modul', '<p>Silahkan download modul Memahami lafal, tekanan, intonasi, dan jeda</p>', 1, '123456789', '2013-02-25', 0, 1),
(3, 'modul.ppt', 'Pengertian', '$materi2', 1, '123456789', '2013-02-25', 0, 1);");


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
(7, 'Informasi ".$sekolah." ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'Album Galeri', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 'Berita', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 'Buku Tamu', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 'Guru Staff', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
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
('', 'galeri', 'kontenweb/modul/galleri.php', '0'),
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
('', 'laporan_un_mapel', 'kontenweb/un/grafik_mapel.php', '2'),
('', 'profil', 'kontenweb/modul/profil.php', '0');");

mysql_query ("ALTER TABLE ".$DB_KODE."_komentar ADD url TEXT NOT NULL ");

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

mysql_query ("ALTER TABLE ".$DB_KODE."_berita add fulltext (judul_berita,isi_berita)");
mysql_query ("");


mysql_query ("");
mysql_query ("");
mysql_query ("");
mysql_query ("");
mysql_query ("");
mysql_query ("");



unset($_SESSION['pertama']);
$_SESSION['kedua'] = kedua;
$_SESSION['haidar']=$cookies;
$_SESSION['temaweb']='respons';
//header('location:info.php');
?>
<script language="javascript">
setTimeout("top.location.href = 'info.php'",5000);
</script>
<?php

/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

?>