<?php if(!isset($_SESSION)){session_start();} error_reporting(0);     ?>
<center><p><p><img src="../images/loader.gif"><br>Mohon Tunggu ..!</center>
<?php 
    if (!file_exists("../.htaccess")) {
	}else{
$old = '../.htaccess';
$today = date("Ymd");
$new = '../konfigurasi/htaccess-'.$today.'.bak';
if (copy($old, $new)) {
  unlink($old);
}
 }
 
IF (isset($_POST["Submit"])) {
 

 $string2 = '


RewriteEngine On


RewriteRule ^sitemap.xml$ rss.php
RewriteRule ^profil-sekolah-([0-9]+)-(.*)\.html$ index.php?p=info&id=$1
RewriteRule ^lokasi-sekolah-(.*)\.html$ index.php?p=gmap
RewriteRule ^berita-(.*)\.html$ index.php?p=berita

RewriteRule ^halaman-([0-9]+)-berita.html$ index.php?p=berita&halaman=$1
RewriteRule ^elearning.html$ index.php?p=elearning
ErrorDocument 404 /404.php
RewriteRule ^agenda-(.*)\.html$ index.php?p=agenda
RewriteRule ^halaman-([0-9]+)-agenda.html$ index.php?p=agenda&halaman=$1
RewriteRule ^data-profil-(.*)\.html$ index.php?p=profil
RewriteRule ^pengumuman-(.*)\.html$ index.php?p=pengumuman
RewriteRule ^cari-berita(.*)\.html$ index.php?p=pencarian
RewriteRule ^data-guru-(.*)\.html$ index.php?p=guru
RewriteRule ^cari-guru(.*)\.html$ index.php?p=gurupencarian
RewriteRule ^gender-guru(.*)\.html$ index.php?p=gurujk
RewriteRule ^data-karyawan-(.*)\.html$ index.php?p=staff
RewriteRule ^cari-karyawan(.*)\.html$ index.php?p=staffpencarian
RewriteRule ^gender-karyawan(.*)\.html$ index.php?p=staffjk
RewriteRule ^data-siswa-(.*)\.html$ index.php?p=siswa
RewriteRule ^cari-siswa(.*)\.html$ index.php?p=siswapencarian
RewriteRule ^gender-siswa(.*)\.html$ index.php?p=siswajk
RewriteRule ^kelas-siswa(.*)\.html$ index.php?p=siswakelas
RewriteRule ^data-alumni-(.*)\.html$ index.php?p=alumni
RewriteRule ^cari-alumni(.*)\.html$ index.php?p=alumnipencarian
RewriteRule ^gender-alumni(.*)\.html$ index.php?p=alumnijk
RewriteRule ^foto-kegiatan-(.*)\.html$ index.php?p=galeri
RewriteRule ^buku-tamu-(.*)\.html$ index.php?p=bukutamu
RewriteRule ^survey-(.*)\.html$ index.php?p=polling
RewriteRule ^psb-penerimaan-siswa-baru-(.*)\.html$ index.php?p=psb
RewriteRule ^print-data-pendaftaran-psb.html$ kontenweb/print_psb.php
RewriteRule ^data-psb-penerimaan-siswa-baru-(.*)\.html$ index.php?p=datapsb
RewriteRule ^formulir-psb-penerimaan-siswa-baru-(.*)\.html$ index.php?p=formpsb
RewriteRule ^formulir-data-alumni-(.*)\.html$ index.php?p=formalumni


RewriteRule ^album-foto-([0-9]+)-(.*)\.html$  index.php?p=foto&id=$1
RewriteRule ^profil-guru-([0-9]+)-(.*)\.html$  index.php?p=detailguru&nip=$1
RewriteRule ^penulis-([0-9]+)-(.*)\.html$  index.php?p=userberita&user=$1
RewriteRule ^profil-siswa-([0-9]+)-(.*)\.html$  index.php?p=detailsiswa&nis=$1
RewriteRule ^profil-karyawan-([0-9]+)-(.*)\.html$  index.php?p=detailstaff&nip=$1
RewriteRule ^profil-alumni-([0-9]+)-(.*)\.html$  index.php?p=detailalumni&id=$1
RewriteRule ^info-([0-9]+)-(.*)\.html$  index.php?p=detberita&id=$1
RewriteRule ^info-tanggal-(.*)\.html$  index.php?p=tglberita&tgl=$1
RewriteRule ^info-penulis-(.*)\.html$  index.php?p=userberita&user=$1
RewriteRule ^info-kategori-(.*)\.html$  index.php?p=katberita&id=$1


RewriteRule ^login.html$ index.php?p=login
RewriteRule ^elearning-upload.html$ index.php?p=upload
RewriteRule ^elearning-mata-pelajaran.html$ index.php?p=mapel
RewriteRule ^elearning-kelas.html$ index.php?p=kelas
RewriteRule ^elearning-jurusan.html$ index.php?p=jurusan
RewriteRule ^elearning-guru.html$ index.php?p=guru_elearning
RewriteRule ^elearning-cari-semua.html$ index.php?p=elearning_cari_semua
RewriteRule ^profil-user-([0-9]+)-(.*)\.html$ index.php?p=pguru&nip=$1
RewriteRule ^download-materi-([0-9]+)\.html$ kontenweb/d.php?id=$1
RewriteRule ^download-media-([0-9]+)\.html$ kontenweb/m.php?id=$1
RewriteRule ^download-sumber-([0-9]+)\.html$ kontenweb/s.php?id=$1
RewriteRule ^download-pengayaan-([0-9]+)\.html$ kontenweb/py.php?id=$1
RewriteRule ^download-tugas-([0-9]+)\.html$ kontenweb/t.php?id=$1
RewriteRule ^download-pengayaan-([0-9]+)\.html$ kontenweb/p.php?id=$1
RewriteRule ^edit-profil-([0-9]+)-(.*)\.html$ index.php?p=profil_edit&id=$1
RewriteRule ^ubah-password-([0-9]+)-(.*)\.html$ index.php?p=ubah_pass&id=$1
RewriteRule ^elearning-cari.html$ index.php?p=cari_elearning
RewriteRule ^pbm-pelajaran-([0-9]+)-(.*)\.html$ index.php?p=pbm&id=$1
RewriteRule ^rpp-pelajaran-([0-9]+)-(.*)\.html$ index.php?p=rpp&id=$1
RewriteRule ^materi-pelajaran-([0-9]+)-(.*)\.html$ index.php?p=mmapel&id=$1
RewriteRule ^pelajaran-materi-([0-9]+)-(.*)\.html$ index.php?p=download&id=$1
RewriteRule ^sumber-pelajaran-([0-9]+)-(.*)\.html$ index.php?p=sumber&id=$1
RewriteRule ^media-pelajaran-([0-9]+)-(.*)\.html$ index.php?p=media&id=$1
RewriteRule ^pengayaan-pelajaran-([0-9]+)-(.*)\.html$ index.php?p=pengayaan&id=$1
RewriteRule ^evaluasi-pelajaran-([0-9]+)-(.*)\.html$ index.php?p=evaluasi&id=$1
RewriteRule ^soal-pelajaran-([0-9])-halaman-([0-9])\.html$ index.php?p=latihan&id=$1&page=$2[QSA,L]
RewriteRule ^hasil-evaluasi-([0-9]+)\.html$ index.php?p=hasil&id=$1
RewriteRule ^media-pembelajaran-([0-9]+)-(.*)\.html$ index.php?p=download_media&id=$1
RewriteRule ^kelas-pelajaran-([0-9]+)-(.*)\.html$ index.php?p=kelas_pbm&id=$1
RewriteRule ^jurusan-pelajaran-([0-9]+)-(.*)\.html$ index.php?p=jurusan_pbm&id=$1
RewriteRule ^penugasan-pembelajaran-([0-9]+)-(.*)\.html$ index.php?p=penugasan&id=$1
RewriteRule ^nilai.html$ index.php?p=nilai
RewriteRule ^chat-interaktif-([0-9]+)-diskusi-pelajaran.html$ index.php?p=chat&id=$1
RewriteRule ^al-quran-on-line-(.*)\.html$ modul.php?m=quran
RewriteRule ^al-quran-surat-([0-9]+)-(.*)\.html$ modul.php?m=quran_surah&id=$1
RewriteRule ^cari-al-quran-terjemahan.html$ modul.php?m=quran_cari


RewriteRule ^info-pengumuman-kelululusan.html$ index.php?p=info_un
RewriteRule ^login-pengumuman-kelulusan.html$ index.php?p=login_un
RewriteRule ^logout-pengumuman-kelulusan.html$ index.php?p=logout_un
RewriteRule ^grafik-kelulusan.html$ index.php?p=laporan_un
RewriteRule ^grafik-kelulusan-tahun-([0-9]+)\.html$ index.php?p=laporan_un_mapel&thn=$1
RewriteRule ^print-kelulusan.html$ kontenweb/un/print.php

RewriteRule ^daftar-isi.html$  index.php?p=isi
RewriteRule ^halaman-([0-9]+)-daftar-isi.html$ index.php?p=isi&halaman=$1

RewriteRule ^data-link-(.*)\.html$ index.php?p=link
RewriteRule ^cari-link(.*)\.html$ index.php?p=linkpencarian
RewriteRule ^kategori-link-([0-9]+)-(.*)\.html$ index.php?p=linkkategori&id=$1
RewriteRule ^tukar-link-([0-9]+)-(.*)\.html$  index.php?p=detaillink&id=$1
RewriteRule ^weblink.html$  kontenweb/link/l.php
RewriteRule ^tambah-tukar-link.html$  index.php?p=tambahlink




';
 
$fpx = FOPEN("../.htaccess", "w");
FWRITE($fpx, $string2);
FCLOSE($fpx);
 


unset($_SESSION['seo']);

  if ($_POST["jenisweb"]=="1"){
  		$_SESSION['jenisweb']="Website Sekolah";
		$_SESSION['installweb']="1";
  }elseif ($_POST["jenisweb"]=="2"){
  		$_SESSION['jenisweb']="Website Pondok Pesantren";
		$_SESSION['installweb']="2";
  }elseif ($_POST["jenisweb"]=="3"){
  		$_SESSION['jenisweb']="Website Perguruan Tinggi";
		$_SESSION['installweb']="3";
  }elseif ($_POST["jenisweb"]=="4"){
  		$_SESSION['jenisweb']="Website Instansi/Kantor/Lembaga";
		$_SESSION['installweb']="4";
  }elseif ($_POST["jenisweb"]=="5"){
  		$_SESSION['jenisweb']="Website Perusahaan";
		$_SESSION['installweb']="5";
  }elseif ($_POST["jenisweb"]=="6"){
  		$_SESSION['jenisweb']="Website Komunitas";
		$_SESSION['installweb']="6";
  }elseif ($_POST["jenisweb"]=="7"){
  		$_SESSION['jenisweb']="Blog Personal/Pribadi";
		$_SESSION['installweb']="7";
  }elseif ($_POST["jenisweb"]==""){
  		$_SESSION['jenisweb']="Website Sekolah";
		$_SESSION['installweb']="1";
  }
  
$_SESSION['pertama'] = pertama;
//header('location:admin.php');
?>
<script language="javascript">
setTimeout("top.location.href = 'admin.php'",2500);
</script>
<?php
} 
?>
 
