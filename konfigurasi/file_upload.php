<?php      
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
if(!isset($_SESSION)){session_start();}   error_reporting(0);
 if (!isset($_SESSION['kontenisi'])){
header ('location:../../index.php');
break;
} 
unset($_SESSION['salah']);

//if (isset($_SESSION['postkode'])){
//formulamu($kode);
//}else{
//header ('location:../../index.php');
//}

if (isset($_SESSION['adminsh']) AND isset($_SESSION['namalengkap'])){
//include "../../../../adminpanel/konten/fungsi.php";
formulaku($_SESSION['urlweb']);
adminku($_SESSION['leveluser']);

function UploadFile($fileName, $extensionList, $namaDir,$data){
//$extensionList = array("bmp", "jpg", "gif");

//$fileName = $_FILES['fupload']['name'];
$pecah = explode(".", $fileName);
$ekstensi = $pecah[1];

// nama direktori upload
//$namaDir = '../../../../file/';

// membuat path nama direktori + nama file.
$pathFile = $namaDir . $fileName;

if (in_array($ekstensi, $extensionList))
{
    // memindahkan file ke temporary
    $tmpName  = $_FILES['fupload']['tmp_name'];
global $data;
    // proses upload file dari temporary ke path file
    if (move_uploaded_file($_FILES['fupload']['tmp_name'], $pathFile))
    {
         $data= 1;
    }
    else
    {
         $data= 0;
    }
	//return $data=1;
}
}



function UploadSoal($fileName, $extensionList, $namaDir,$data){
	$pecah = explode(".", $fileName);
	$ekstensi = $pecah[1];
	$pathFile = $namaDir . $fileName;
	if (in_array($ekstensi, $extensionList)){		$tmpName  = $_FILES['fuploadSoal']['tmp_name'];
	global $data;
		if (move_uploaded_file($_FILES['fuploadSoal']['tmp_name'], $pathFile))		{         $data= 1;    }    else    {         $data= 0;    }
	}
}

function Upload_A($fileName, $extensionList, $namaDir,$data){
	$pecah = explode(".", $fileName);
	$ekstensi = $pecah[1];
	$pathFile = $namaDir . $fileName;
	if (in_array($ekstensi, $extensionList)){		$tmpName  = $_FILES['fupload_A']['tmp_name'];
	global $data;
		if (move_uploaded_file($_FILES['fupload_A']['tmp_name'], $pathFile))		{         $data= 1;    }    else    {         $data= 0;    }
	}
}

function Upload_B($fileName, $extensionList, $namaDir,$data){
	$pecah = explode(".", $fileName);
	$ekstensi = $pecah[1];
	$pathFile = $namaDir . $fileName;
	if (in_array($ekstensi, $extensionList)){		$tmpName  = $_FILES['fupload_B']['tmp_name'];
	global $data;
		if (move_uploaded_file($_FILES['fupload_B']['tmp_name'], $pathFile))		{         $data= 1;    }    else    {         $data= 0;    }
	}
}

function Upload_C($fileName, $extensionList, $namaDir,$data){
	$pecah = explode(".", $fileName);
	$ekstensi = $pecah[1];
	$pathFile = $namaDir . $fileName;
	if (in_array($ekstensi, $extensionList)){		$tmpName  = $_FILES['fupload_C']['tmp_name'];
	global $data;
		if (move_uploaded_file($_FILES['fupload_C']['tmp_name'], $pathFile))		{         $data= 1;    }    else    {         $data= 0;    }
	}
}

function Upload_D($fileName, $extensionList, $namaDir,$data){
	$pecah = explode(".", $fileName);
	$ekstensi = $pecah[1];
	$pathFile = $namaDir . $fileName;
	if (in_array($ekstensi, $extensionList)){		$tmpName  = $_FILES['fupload_D']['tmp_name'];
	global $data;
		if (move_uploaded_file($_FILES['fupload_D']['tmp_name'], $pathFile))		{         $data= 1;    }    else    {         $data= 0;    }
	}
}

function Upload_E($fileName, $extensionList, $namaDir,$data){
	$pecah = explode(".", $fileName);
	$ekstensi = $pecah[1];
	$pathFile = $namaDir . $fileName;
	if (in_array($ekstensi, $extensionList)){		$tmpName  = $_FILES['fupload_E']['tmp_name'];
	global $data;
		if (move_uploaded_file($_FILES['fupload_E']['tmp_name'], $pathFile))		{         $data= 1;    }    else    {         $data= 0;    }
	}
}

/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */


}else{
header ('location:../index.php');
}
?>