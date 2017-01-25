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
('', 0, 'Contoh Modul', 'modul.php?m=contoh', 11, 1);");
mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_contoh (
  id_contoh int(11) NOT NULL AUTO_INCREMENT,
  nama_contoh varchar(30) NOT NULL,
  deskripsi_contoh text NOT NULL,
  PRIMARY KEY (id_contoh)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;");
mysql_query ("INSERT INTO ".$DB_KODE."_case (id_case, nama_case, file_case, blok_case) VALUES
('', 'contoh', 'eksternal/modul/contoh.php', '0');");
}

function insertcontoh(){
global $DB_KODE;
mysql_query ("INSERT INTO ".$DB_KODE."_contoh (id_contoh, nama_contoh, deskripsi_contoh) VALUES
(1, 'Contoh 1', 'Deskripsi contoh 1'),
(2, 'Contoh 2', 'Deskripsi contoh 2'),
(3, 'Contoh 3', 'Deskripsi contoh 3');");

}

function deletedata(){
global $DB_KODE;
mysql_query ("TRUNCATE TABLE ".$DB_KODE."_contoh");
mysql_query ("DELETE FROM ".$DB_KODE."_menu WHERE judul ='Contoh Modul'");
mysql_query ("DELETE FROM ".$DB_KODE."_case WHERE nama_case ='contoh'");
}

}


?>