<?php 
if(!isset($_SESSION)){session_start();}   error_reporting(0);
if (!isset($_SESSION['adminsh']))
{
	gogo('../../../../index.php');
	exit;
}
else{ 

function insertdata(){
global $DB_KODE;
mysql_query ("INSERT INTO ".$DB_KODE."_menu (id_menu, menu_id, judul, url, urutan, status) VALUES
('', 0, 'Contoh Modul', 'modul.php?m=pekerjaan', 11, 1);");
mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_pekerjaan (
  id_pekerjaan int(11) NOT NULL AUTO_INCREMENT,
  nama_pekerjaan varchar(30) NOT NULL,
  deskripsi_pekerjaan text NOT NULL,
  PRIMARY KEY (id_pekerjaan)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;");
}

function insertpekerjaan(){
global $DB_KODE;
mysql_query ("INSERT INTO ".$DB_KODE."_pekerjaan (id_pekerjaan, nama_pekerjaan, deskripsi_pekerjaan) VALUES
(1, 'Contoh 1', 'Deskripsi pekerjaan 1'),
(2, 'Contoh 2', 'Deskripsi pekerjaan 2'),
(3, 'Contoh 3', 'Deskripsi pekerjaan 3');");
}

function deletedata(){
global $DB_KODE;
mysql_query ("TRUNCATE TABLE ".$DB_KODE."_pekerjaan");
mysql_query ("DELETE FROM ".$DB_KODE."_menu WHERE judul ='Contoh Modul'");
}

}


?>