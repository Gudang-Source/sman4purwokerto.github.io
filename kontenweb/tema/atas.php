<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
<head>
<?php    
include "kontenweb/fungsi.php";
 newt();
$namasekolah1=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='8'");
$ns=mysql_fetch_array($namasekolah1);
$namasekolah2=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='12'");
$as=mysql_fetch_array($namasekolah2);

$qGuru=mysql_query("SELECT * FROM ".$DB_KODE."_bahasa WHERE Sekolah='Guru'");
$rGuru=mysql_fetch_array($qGuru);
$qSiswa=mysql_query("SELECT * FROM ".$DB_KODE."_bahasa WHERE Sekolah='Siswa'");
$rSiswa=mysql_fetch_array($qSiswa);
$qSekolah=mysql_query("SELECT * FROM ".$DB_KODE."_bahasa WHERE Sekolah='Sekolah'");
$rSekolah=mysql_fetch_array($qSekolah);
$qkepala=mysql_query("SELECT * FROM ".$DB_KODE."_bahasa WHERE Sekolah='Kepala'");
$rKepala=mysql_fetch_array($qkepala);
if (isset($_SESSION['jenjang'])){
$j=$_SESSION['jenjang'];
	 if($j<7){
		 $_SESSION['Bguru']="Guru";
		 $_SESSION['Bsiswa']="Siswa";
		 $_SESSION['Bsekolah']="Sekolah";
		 $_SESSION['Bkepala']="Kepala";

	 } elseif($j==7){
		 $_SESSION['Bguru']="Tutor";
		 $_SESSION['Bsiswa']="Siswa";
		 $_SESSION['Bsekolah']="LPK";
		 $_SESSION['Bkepala']="Pimpinan";
	 } elseif($j==8){
		 $_SESSION['Bguru']=$rGuru['perguruantinggi'];
		 $_SESSION['Bsiswa']=$rSiswa['perguruantinggi'];
		 $_SESSION['Bsekolah']=$rSekolah['perguruantinggi'];
		 $_SESSION['Bkepala']=$rKepala['perguruantinggi'];
	 } elseif($j==15){
		 $_SESSION['Bguru']=$rGuru['instansi'];
		 $_SESSION['Bsiswa']=$rSiswa['instansi'];
		 $_SESSION['Bsekolah']=$rSekolah['instansi'];
		 $_SESSION['Bkepala']=$rKepala['instansi'];
	 } elseif($j==17){
		 $_SESSION['Bguru']=$rGuru['blog'];
		 $_SESSION['Bsiswa']=$rSiswa['blog'];
		 $_SESSION['Bsekolah']=$rSekolah['blog'];
		 $_SESSION['Bkepala']=$rKepala['blog'];
	 } elseif($j==18){
		 $_SESSION['Bguru']=$rGuru['perusahaan'];
		 $_SESSION['Bsiswa']=$rSiswa['perusahaan'];
		 $_SESSION['Bsekolah']=$rSekolah['perusahaan'];
		 $_SESSION['Bkepala']=$rKepala['perusahaan'];
	 }elseif($j==36){
		 $_SESSION['Bguru']=$rGuru['pesantren'];
		 $_SESSION['Bsiswa']=$rSiswa['pesantren'];
		 $_SESSION['Bsekolah']=$rSekolah['pesantren'];
		 $_SESSION['Bkepala']=$rKepala['pesantren'];
	 }elseif($j==7){
		 $_SESSION['Bguru']=$rGuru['komunitas'];
		 $_SESSION['Bsiswa']=$rSiswa['komunitas'];
		 $_SESSION['Bsekolah']=$rSekolah['komunitas'];
		 $_SESSION['Bkepala']=$rKepala['komunitas'];
	 }

}

meta();
include "adminpanel/aplikasi/informasi/data.php";

?>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<meta http-equiv="Copyleft" content="FormulasiCMS">
<meta content='http://plus.google.com/117915301515053488685' name='author'/>
<meta content='index,follow' name='robots'/>
<meta content='all-language' http-equiv='Content-Language'/>
<meta content='Global' name='Distribution'/>
<meta content='Indonesia' name='geo.country'/>
<meta content='Semarang' name='geo.placename'/>
<meta content='all' name='robots'/>
<meta content='all' name='googlebot'/>
<meta content='all' name='msnbot'/>
<meta content='all' name='Googlebot-Image'/>
<meta content='all' name='Slurp'/>
<meta content='all' name='ZyBorg'/>
<meta content='all' name='Scooter'/>
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
<meta content='true' name='MSSmartTagsPreventParsing'/>
<meta content='blogger' name='generator'/>
<meta content='1 days' name='revisit'/>
<meta content='1 days' name='revisit-after'/>
<meta content='document' name='resource-type'/>
<meta content='id' name='language'/>
<meta content='ID' name='country'/>
<meta content='all' name='audience'/>


<script src="formulasi/adminpanel/js/jquery.validate.min.js"></script>

		<style type="text/css">
		.labelfrm {
			display:block;
			font-size:small;
			margin-top:5px;
		}
		.error {
			font-size:small;
			color:red;
		}
		</style>
		
<?php     include "file/tema/$_SESSION[temaweb]/atas.php";?>
		<script type="text/javascript">
		hs.graphicsDir = 'images/graphics/';
		hs.outlineType = 'rounded-white';
		</script>
 
</head>


<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>	  