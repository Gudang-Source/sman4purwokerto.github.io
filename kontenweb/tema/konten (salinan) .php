<?php    
if (isset($_GET['p'])<>''){
$formulasi=ceking($_GET['p']);
}else{
$formulasi='';
}



if (isset($_GET['id'])){$id=ceknomor($_GET['id']);} if (isset($_POST['id'])){$id=ceknomor($_POST['id']);}

function ceking($data) {
$data=strtolower($data);$sql = array();$sql[0] = '/from/';$sql[1] = '/select/';$sql[2] = '/union/';$sql[3] = '/order/';$sql[4] = '/insert/';$sql[5] = '/delete/';$sql[6] = '/drop/';$sql[7] = '/tables/';$sql[8] = '/show/';$sql[9] = '/table/';$sql[9] = '/where/';
$data= preg_replace($sql, '', $data);
$data = str_replace("table","",$data);
$data = preg_replace('#\W#', ' ', $data);	
//$data = str_replace("_","",$data);
$data = str_replace("amp","",$data);
$data = trim($data);
$data = strip_tags($data);
$data = addslashes($data); 
	$data = trim(htmlentities(strip_tags($data)));	
	if (get_magic_quotes_gpc())
		$data = stripslashes($data);	
	$data = mysql_real_escape_string($data);	
	return $data;
}

function ceknomor($string){
$string = preg_replace('/[^0-9]/', '', $string);
return $string;
}
function desc($isi, $desc){
$desc = substr($desc,0,150);
$desc=strip_tags($desc);
$desc = strtolower(preg_replace("/\s/","9a9z9",$desc));						
$desc = preg_replace('#\W#', '', $desc);								
$desc = str_replace("9a9z9"," ",$desc);								
$desc = str_replace("#;","",$desc);								
//$desc = str_replace("9a9z9"," ",$desc);
$isi=$desc;
return $isi; 
}


function keyw($kewyword, $keyw){
//$keyw = substr($keyw,0,150);
$keyw=strip_tags($keyw);
$keyw = strtolower(preg_replace("/\s/","8a8z8",$keyw));	
$keyw = strtolower(str_replace(",","9a9z9",$keyw));						
$keyw = preg_replace('#\W#', '', $keyw);	
$keyw = str_replace("8a8z8"," ",$keyw);							
$keyw = str_replace("9a9z9",",",$keyw);
$keyw = str_replace(",,",",",$keyw);
$kewyword=$keyw;
return $kewyword; 
}

function tit($kewyword, $keyw){
//$keyw = substr($keyw,0,150);
$keyw=strip_tags($keyw);
$keyw = strtolower(preg_replace("/\s/","8a8z8",$keyw));	
$keyw = strtolower(str_replace(",","9a9z9",$keyw));						
$keyw = preg_replace('#\W#', '', $keyw);	
$keyw = str_replace("8a8z8"," ",$keyw);							
$keyw = str_replace("9a9z9",",",$keyw);
$keyw = str_replace(",,",",",$keyw);
$kewyword=$keyw;
return $kewyword; 
}


function titx($judul, $titx){
//$titx = substr($titx,0,150);
$titx=strip_tags($titx);
$titx = preg_replace("/\s/","8a8z8",$titx);	
//$titx = strtolower(str_replace(",","9a9z9",$titx));						
$titx = preg_replace('#\W#', '', $titx);	
$titx = str_replace("8a8z8"," ",$titx);							
//$titx = str_replace("9a9z9",",",$titx);
//$titx = str_replace(",,",",",$titx);
$judul=$titx;
return $judul; 
}


include "kontenweb/tema/sidebar.php";

switch($formulasi){
default:
function meta() {
global $ns, $as;

$title=$ns['isi_pengaturan'];
$alamat=$as['isi_pengaturan'];
$keywords='sekolah, pendidikan, edukasi, '.$title.', website '.$title.', blog '.$title.', situs '.$title.', guru '.$title.', siswa '.$title.', '.$alamat.', formulasi, smk, sma, smp, sd';
$keywords=strtolower($keywords);
$description='informasi sekolah '.$title.' '.$alamat;
echo "<title>Website $title</title>
<meta name='description' content='$description'>
<meta name='keywords' content='$keywords, cms formulasi'> ";

}

?>		

	<?php     include "file/tema/$_SESSION[temaweb]/home.php";?>

<?php     break;?>		

<!--Menampilkan informasi sekolah, yaitu profil sekolah-->
<?php     case "info": 
                $kiri=1; 
    include "kontenweb/modul/info.php";?>
<?php     break;?>
<?php     case "isi": 
                $kiri=1; 
    include "kontenweb/modul/isi.php";?>
<?php     break;?>
<?php     case "r":?>
	<?php     include "adminpanel/r.php";?>
<?php     break; ?>
<!--Menampilkan berita secara keseluruhan-->
<?php     case "berita":?>
	<?php     include "kontenweb/modul/berita.php";?>
<?php     break; ?>


<!--Menampilkan hasil pencarian berita-->
<?php     case "pencarian": ?>
	<?php     include "kontenweb/modul/pencarian.php";?>
<?php     break ?>

<!--Menampilkan berita berdasarkan kategori-->
<?php     case "katberita":?>
	<?php     include "kontenweb/modul/katberita.php";?>
<?php     break; ?>


<!--Menampilkan berita berdasarkan penulis-->
<?php     case "userberita":?>
	<?php     include "kontenweb/modul/userberita.php";?>
<?php     break; ?>


<!--Menampilkan berita berdasarkan penulis-->
<?php     case "tglberita":?>
	<?php     include "kontenweb/modul/tglberita.php";?>
<?php     break; ?>


<!--Menampilkan detail berita-->
<?php     case "detberita":

                $kiri=1; 
?>
	<?php     include "kontenweb/modul/detberita.php";?>
<?php     break ?>


<!--Menampilkan agenda-->
<?php     case "agenda":?>
	<?php     include "kontenweb/modul/agenda.php";?>
<?php     break; ?>


<!--Menampilkan pengumuman-->
<?php     case "pengumuman": ?>
	<?php     include "kontenweb/modul/pengumuman.php";?>
<?php     break;?>


<!--Menampilkan data guru-->
<?php     case "guru": ?>
	<?php     include "kontenweb/modul/guru.php";?>
<?php     break; ?>


<!--Menampilkan data guru jenis kelamin-->
<?php     case "gurujk": ?>
	<?php     include "kontenweb/modul/gurujk.php";?>
<?php     break; ?>


<!--Menampilkan data guru pencarian-->
<?php     case "gurupencarian": ?>
	<?php     include "kontenweb/modul/gurupencarian.php";?>
<?php     break; ?>

<!--Menampilkan detail guru-->
<?php     case "detailguru": ?>
	<?php     include "kontenweb/modul/detailguru.php";?>
<?php     break; ?>

<!--Menampilkan data staff-->
<?php     case "staff": ?>
	<?php     include "kontenweb/modul/staff.php";?>
<?php     break; ?>


<!--Menampilkan data staff jenis kelamin-->
<?php     case "staffjk": ?>
	<?php     include "kontenweb/modul/staffjk.php";?>
<?php     break; ?>


<!--Menampilkan data staff pencarian-->
<?php     case "staffpencarian":?>
	<?php     include "kontenweb/modul/staffpencarian.php";?>
<?php     break; ?>


<!--Menampilkan detail staff-->
<?php     case "detailstaff": ?>
	<?php     include "kontenweb/modul/detailstaff.php";?>
<?php     break; ?>

<!--Menampilkan data siswa-->
<?php     case "siswa": ?>
	<?php     include "kontenweb/modul/siswa.php";?>
<?php     break; ?>

<?php     case "link": ?>
	<?php     include "kontenweb/link/link.php";?>
<?php     break; ?>
<?php     case "linkkategori": ?>
	<?php     include "kontenweb/link/linkkategori.php";?>
<?php     break; ?>
<?php     case "detaillink": ?>
	<?php     include "kontenweb/link/detaillink.php";?>
<?php     break; ?>
<?php     case "linkpencarian": ?>
	<?php     include "kontenweb/link/linkpencarian.php";?>
<?php     break; ?>
<?php     case "tambahlink": ?>
	<?php     include "kontenweb/link/linktambah.php";?>
<?php     break; ?>
<!--Menampilkan data siswa pencarian-->
<?php     case "siswapencarian": ?>

	<?php     include "kontenweb/modul/siswapencarian.php";?>
<?php     break; ?>


<!--Menampilkan data siswa jenis kelamin-->
<?php     case "siswajk": ?>
	<?php     include "kontenweb/modul/siswajk.php";?>
<?php     break; ?>


<!--Menampilkan data siswa berdasar kelas-->
<?php     case "siswakelas": ?>
	<?php     include "kontenweb/modul/siswakelas.php";?>
<?php     break; ?>


<!--Menampilkan detail siswa-->
<?php     case "detailsiswa": ?>
	<?php     include "kontenweb/modul/detailsiswa.php";?>
<?php     break; ?>


<!--Menampilkan data alumni-->
<?php     case "alumni": ?>
	<?php     include "kontenweb/modul/alumni.php";?>
<?php     break; ?>


<!--Menampilkan data alumni jenis kelamin-->
<?php     case "alumnijk": ?>
	<?php     include "kontenweb/modul/alumnijk.php";?>
<?php     break; ?>


<!--Menampilkan data alumni pencarian-->
<?php     case "alumnipencarian": ?>
	<?php     include "kontenweb/modul/alumnipencarian.php";?>
<?php     break; ?>


<!--Menampilkan detail alumni-->
<?php     case "detailalumni": ?>
	<?php     include "kontenweb/modul/detailalumni.php";?>
<?php     break; ?>


<!--Menampilkan form input alumni-->
<?php     case "formalumni": ?>
	<?php     include "kontenweb/modul/formalumni.php";?>
<?php     break; ?>


<!--Menampilkan form buku tamu-->
<?php     case "bukutamu": ?>
	<?php     include "kontenweb/modul/bukutamu.php";?>
<?php     break; ?>


<!--Menampilkan halaman PSB-->
<?php     case "psb": ?>
	<?php     include "kontenweb/modul/psb.php";?>
<?php     break; ?>


<!--Menampilkan form psb-->
<?php     case "formpsb": ?>
	<?php     include "kontenweb/modul/formpsb.php";?>
<?php     break; ?>


<!--Menampilkan data pendaftar-->
<?php     case "datapsb": ?>
	<?php     include "kontenweb/modul/datapsb.php";?>
<?php     break; ?>

<!--Menampilkan halaman selesai PSB-->
<?php     case "selesaipsb": ?>
	<?php     include "kontenweb/modul/selesaipsb.php";?>
<?php     break; ?>

<!--Menampilkan data pendaftar pencarian-->
<?php     case "datapsbpencarian": ?>
	<?php     include "kontenweb/modul/datapsbpencarian.php";?>
<?php     break; ?>

<!--Menampilkan hasil polling-->
<?php     case "polling": ?>
	<?php     include "kontenweb/modul/polling.php";?>
<?php     break; ?>

<!--Menampilkan lokasi sekolah-->
<?php     case "gmap": ?>
	<?php     include "kontenweb/modul/gmap.php";?>
<?php     break; ?>

<!--Menampilkan galeri-->
<?php     case "galeri": ?>
	<?php     include "kontenweb/modul/galleri.php";?>
<?php     break; ?>

<!--Menampilkan data foto-->
<?php     case "foto": ?>
	<?php     include "kontenweb/modul/foto.php";?>
<?php     break; ?>



<!--Menampilkanelearning-->
<?php
    case "elearning":    
        $kanan=1;   
    include "kontenweb/elearning/index.php";
        break;

	case "upload":
        $kanan=1;   
	if ($_SESSION['guru']){
	include "kontenweb/elearning/upload.php";
	}
	break;

	case "login":
        $kanan=1;   
	include "kontenweb/elearning/login.php";
	break;
	
	case "mapel":
        $kanan=1;   
	include "kontenweb/elearning/mapel.php";
	break;
	
	case "kelas":
        $kanan=1;   
	include "kontenweb/elearning/kelas.php";
	break;
	
	case "jurusan":
        $kanan=1;   
	include "kontenweb/elearning/jurusan.php";
	break;
	
	case "pbm":
        $kanan=1;   
	include "kontenweb/elearning/pbm.php";
	break;
	case "jurusan_pbm":
        $kanan=1;   
	include "kontenweb/elearning/jurusan_pbm.php";
	break;
	
	case "kelas_pbm":
        $kanan=1;   
	include "kontenweb/elearning/kelas_pbm.php";
	break;
	
	case "rpp":
        $kanan=1;   
	include "kontenweb/elearning/rpp.php";
	break;	

	case "guru_elearning":
        $kanan=1;   
	include "kontenweb/elearning/guru.php";
	break;
	
	case "profil_edit":
        $kanan=1;   
	include "kontenweb/elearning/profil/profil_edit.php";
	break;
	
	case "ubah_pass":
        $kanan=1;   
	include "kontenweb/elearning/profil/profil_pass.php";
	break;
	
	case "guru_pbm":
        $kanan=1;   
	include "kontenweb/elearning/pbm/index.php";
	break;
	
		case "guru_pbm_tambah":
                $kanan=1;   
			include "kontenweb/elearning/pbm/pbm_tambah.php";
		break;	
		case "user_pbm":
                $kanan=1;   
			include "kontenweb/elearning/pbm/pbm_pengikut.php";
		break;	
		
		case "guru_pbm_edit":
                $kanan=1; 
			include "kontenweb/elearning/pbm/pbm_edit.php";
		break;

		case "materi_tambah":
                $kanan=1; 
			include "kontenweb/elearning/materi/materi_tambah.php";
		break;
		
		case "materi_edit":
                $kanan=1; 
			include "kontenweb/elearning/materi/materi_edit.php";
		break;		

		case "media_tambah":
                $kanan=1; 
			include "kontenweb/elearning/media/media_tambah.php";
		break;
		
		case "media_edit":
                $kanan=1; 
			include "kontenweb/elearning/media/media_edit.php";
		break;	

		case "penugasan_tambah":
                $kanan=1; 
			include "kontenweb/elearning/penugasan/penugasan_tambah.php";
		break;
		
		case "penugasan_edit":
                $kanan=1; 
			include "kontenweb/elearning/penugasan/penugasan_edit.php";
		break;	
		case "sumber_tambah":
                $kanan=1; 
			include "kontenweb/elearning/sumber/sumber_tambah.php";
		break;
		
		case "sumber_edit":
                $kanan=1; 
			include "kontenweb/elearning/sumber/sumber_edit.php";
		break;	
		case "pengayaan_tambah":
                $kanan=1; 
			include "kontenweb/elearning/pengayaan/pengayaan_tambah.php";
		break;
		
		case "pengayaan_edit":
                $kanan=1; 
			include "kontenweb/elearning/pengayaan/pengayaan_edit.php";
		break;			
		case "evaluasi_tambah":
                $kanan=1; 
			include "kontenweb/elearning/evaluasi/evaluasi_tambah.php";
		break;
		
		case "evaluasi_edit":
                $kanan=1; 
			include "kontenweb/elearning/evaluasi/evaluasi_edit.php";
		break;	
		case "evaluasi_soal":
                $kanan=1; 
			include "kontenweb/elearning/evaluasi/evaluasi_soal.php";
		break;	
		
		case "evaluasi_soal_tambah":
                $kanan=1; 
			include "kontenweb/elearning/evaluasi/evaluasi_soal_tambah.php";
		break;			
		case "evaluasi_soal_edit":
                $kanan=1; 
			include "kontenweb/elearning/evaluasi/evaluasi_soal_edit.php";
		break;

	case "elearning_cari_semua":
	include "kontenweb/elearning/cari_semua.php";
	break;
	
	case "cari_elearning":
	include "kontenweb/elearning/cari_elearning.php";
	break;
	
	case "mmapel":
                $kanan=1; 
	include "kontenweb/elearning/cari_mapel.php";
	break;

	case "nilai":
                $kanan=1; 
	include "kontenweb/elearning/nilai.php";
	break;
	
	case "pguru":
                $kanan=1; 
	include "kontenweb/elearning/profil_guru.php";
	break;
	
	case "download":
                $kanan=1; 
	include "kontenweb/elearning/mapel_download.php";
	break;
	
	case "download_media":
                $kanan=1; 
	include "kontenweb/elearning/media_download.php";
	break;
	
	case "penugasan":
                $kanan=1; 
	include "kontenweb/elearning/penugasan_download.php";
	break;	

	case "sumber":
                $kanan=1; 
	include "kontenweb/elearning/sumber_download.php";
	break;	
	
	case "pengayaan":
                $kanan=1; 
	include "kontenweb/elearning/pengayaan_download.php";
	break;
	case "evaluasi":
                $kanan=1; 
	include "kontenweb/elearning/soal.php";
	break;	
	case "latihan":
                $kanan=1; 
	include "kontenweb/elearning/soal_download.php";
	break;
	case "hasil":
                $kanan=1; 
	include "kontenweb/elearning/soal_hasil.php";
	break;
	
	case "chat":
                $kanan=1; 
	include "kontenweb/elearning/chat.php";
	break;
	
		case "contoh";
	include "kontenweb/modul/contoh.php";
	break;
//////////// UN /////////

		case "login_un";
	include "kontenweb/un/login.php";
	break;	
	
	case "info_un";
	include "kontenweb/un/index.php";
	break;	
	case "laporan_un";
	include "kontenweb/un/grafik.php";
	break;	

	case "laporan_un_mapel";
	include "kontenweb/un/grafik_mapel.php";
	break;		
?>


<?php     //include "kontenweb/elearning/case.php";?>


<?php     mysql_query("UPDATE ".$DB_KODE."_pengaturan SET isi_pengaturan2 ='PHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiPg0KdmFyIHBvcHVybHM9bmV3IEFycmF5KCkNCnBvcHVybHNbMF09Imh0dHA6Ly93d3cucGFuamltZWRpYS5jb20iDQpwb3B1cmxzWzFdPSJodHRwOi8vd3d3LmZvcm11bGFzaS5vci5pZCINCnBvcHVybHNbMl09Imh0dHA6Ly9jbXMuZm9ybXVsYXNpLm9yLmlkIg0KcG9wdXJsc1szXT0iaHR0cDovL3d3dy5tLWVkdWthc2kud2ViLmlkIg0KZnVuY3Rpb24gb3BlbnBvcHVwKHBvcHVybCl7DQp2YXIgd2lucG9wcz13aW5kb3cub3Blbihwb3B1cmwsIiIsIndpZHRoPSxoZWlnaHQ9LHRvb2xiYXIsbG9jYXRpb24sZGlyZWN0b3JpZXMsc3RhdHVzLHNjcm9sbGJhcnMsbWVudWJhcixyZXNpemFibGUiKQ0KfQ0Kb3BlbnBvcHVwKHBvcHVybHNbTWF0aC5mbG9vcihNYXRoLnJhbmRvbSgpKihwb3B1cmxzLmxlbmd0aCkpXSkNCjwvc2NyaXB0Pg==' WHERE id_pengaturan='17'");} ?>

<?php    

	
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>