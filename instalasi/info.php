<?php if(!isset($_SESSION)){session_start();}   error_reporting(0);   ?>
<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */


//$_SESSION['kedua']=kedua;
if (!isset($_SESSION['kedua']))
{
	echo "<script>window.alert('Anda sudah dihalaman ini sebelumnya.');window.location=('akhir.php')</script>";
	exit;
}
else{
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Langkah Informasi <?php echo $_SESSION['jenisweb']; ?></title>
<link rel="Shortcut Icon" href="http://www.formulasi.or.id/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="../adminpanel/css/gaya.css">
<script language="JavaScript" src="../adminpanel/js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>

    <style>
      #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px;
		width :450px;
		height :300px;
      }

	  #address{width:350px}
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
	function handleEnter (field, event) {
		var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
		if (keyCode == 13) {
			var i;
			for (i = 0; i < field.form.elements.length; i++)
				if (field == field.form.elements[i])
					break;
			i = (i + 1) % field.form.elements.length;
			field.form.elements[i].focus();
			return false;
		} 
		else
		return true;
	}   
// In the following example, markers appear when the user clicks on the map.
// The markers are stored in an array.
// The user can then click an option to hide, show or delete the markers.
var map;
var markers = [];


function initialize() {
geocoder = new google.maps.Geocoder();
  if(navigator.geolocation) {
    var mapOptions = {
    zoom: 13
  };

    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);
				document.getElementById('latitude').value = [position.coords.latitude]
				document.getElementById('longitude').value = [position.coords.longitude] 
      var infowindow = new google.maps.InfoWindow({
        map: map,
        position: pos,
        content: 'lokasi Anda'
      });

      map.setCenter(pos);
    }, function() {
      handleNoGeolocation(true);
    });
  } else {

  var haightAshbury = new google.maps.LatLng(-2.547988,120.395506);
  var mapOptions = {
    zoom: 4,
    center: haightAshbury,
    //mapTypeId: google.maps.MapTypeId.TERRAIN
  };
}  
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);


  google.maps.event.addListener(map, 'click', function(event) {
  map.setZoom(15);

    addMarker(event.latLng);
  });
}

// Add a marker to the map and push to the array.
function addMarker(location) {
  clearMarkers();
  markers = [];
  var marker = new google.maps.Marker({
    position: location,
    map: map,
	icon:'sch.png'
  });
				document.getElementById('latitude').value = [location.lat()]
				document.getElementById('longitude').value = [location.lng()] 
				
  markers.push(marker);
  

}

// Sets the map on all markers in the array.
function setAllMap(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}



// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setAllMap(null);
}

// Shows any markers currently in the array.
function showMarkers() {
  setAllMap(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  clearMarkers();
  markers = [];
}

function codeAddress() {
  var address = document.getElementById('address').value;
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
	    map.setZoom(14);
      var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location,
      
	icon:'biru.png'
      });
	    var mapOptions = {
    
    center: haightAshbury,
    //mapTypeId: google.maps.MapTypeId.TERRAIN
  };

    } else {
       alert('masukkan nama kota/kabupaten dengan benar !');
    }
	  		  	document.getElementById('latitude').value = [location.lat()]
				document.getElementById('longitude').value = [location.lng()] 
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>

</head>


<body style="text-align: center; background: url(../adminpanel/css/img/bg_biru.jpg)" >
<div id="instalkotak"  style="-webkit-border-bottom-right-radius: 20px;-webkit-border-bottom-left-radius: 20px;-moz-border-radius-bottomright: 20px;-moz-border-radius-bottomleft: 20px;border-bottom-right-radius: 20px;border-bottom-left-radius: 20px;box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);    -moz-box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);    -webkit-box-shadow: -1px 0px 8px rgba(0, 0, 0, 0.80);">
	<div class="judulbox">
	<center>Input Database &raquo; <font color="b4b4b4">Input data admin &raquo;</font> Input Data <?php echo $_SESSION['jenisweb']; ?> &raquo; <font color="b4b4b4">Instalasi Selesai</font></center>
	</div><br>
	<center><img src="logo_atas.jpg"></center>
	
	<div class="boxInformasi"><h2> Langkah 4</h2>
	Pada instalasi langkah ini, anda diminta melengkapi form dibawah ini dengan nama <?php echo $_SESSION['jenisweb']; ?> dan url atau nama domain <?php echo $_SESSION['jenisweb']; ?>
	</div>
	
	<form method="POST" action="proses_sekolah.php" name="kedua" id="kedua" style="float: left;">
	<table class="isian" style="margin-top: 10px;">
		<?php     	
		

include "../konfigurasi/koneksi.php";	
$namasekolah=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan=8");
				$ns=mysql_fetch_array($namasekolah);?>	
			<tr><td class="isiankanan" width="125px">Nama <?php echo $_SESSION['jenisweb']; ?> *</td><td class="isian"><input onKeyPress="return handleEnter(this, event)"  type="text" name="nama" class="maksimal" <?php     echo "value='$ns[isi_pengaturan]'";?>></td></tr>
			
<?php
  if ($_SESSION["installweb"]=="1"){
  ?>
			<tr><td valign="top" class="isiankanan" width="175px">Jenjang</td><td class="isian">
									<select onkeypress="return handleEnter(this, event)"  name="jenjang_sekolah">
									<?php  									
										$jjs1=mysql_query("SELECT * FROM ".$DB_KODE."_jenjang WHERE id_jenjang='6' ");
									$jskl1=mysql_fetch_array($jjs1);
									?>
									<option value="<?php echo $jskl1['id_jenjang'];;?>" selected><?php echo $jskl1['nama_jenjang'];?></option>
									<?php    
									$jjs=mysql_query("SELECT * FROM ".$DB_KODE."_jenjang WHERE id_jenjang<10 AND id_jenjang<>'$jskl1[id_jenjang]' ");
										while($jskl=mysql_fetch_array($jjs)){	
										echo "<option value='$jskl[id_jenjang]'>$jskl[nama_jenjang]</option>";} 
										?>
									</select>
					
			</td></tr>	
<?php
  }elseif ($_SESSION["installweb"]=="2"){
  ?>
<input type="hidden" name="jenjang_sekolah" value="36">
<?php
  }elseif ($_SESSION["installweb"]=="3"){
  ?>
<input type="hidden" name="jenjang_sekolah" value="8">
<?php
  }elseif ($_SESSION["installweb"]=="4"){
  ?>
<input type="hidden" name="jenjang_sekolah" value="15">
<?php
  }elseif ($_SESSION["installweb"]=="5"){
  ?>
<input type="hidden" name="jenjang_sekolah" value="18">
<?php
  }elseif ($_SESSION["installweb"]=="6"){
  ?>
<input type="hidden" name="jenjang_sekolah" value="37">
<?php
  }elseif ($_SESSION["installweb"]=="7"){
  ?>
<input type="hidden" name="jenjang_sekolah" value="17">
<?php
  }elseif ($_SESSION["installweb"]==""){
?>
			<tr><td valign="top" class="isiankanan" width="175px">Jenjang</td><td class="isian">
									<select onkeypress="return handleEnter(this, event)"  name="jenjang_sekolah">
									<?php  									
										$jjs1=mysql_query("SELECT * FROM ".$DB_KODE."_jenjang WHERE id_jenjang='6' ");
									$jskl1=mysql_fetch_array($jjs1);
									?>
									<option value="<?php echo $jskl1['id_jenjang'];;?>" selected><?php echo $jskl1['nama_jenjang'];?></option>
									<?php    
									$jjs=mysql_query("SELECT * FROM ".$DB_KODE."_jenjang WHERE id_jenjang<10 AND id_jenjang<>'$jskl1[id_jenjang]' ");
										while($jskl=mysql_fetch_array($jjs)){	
										echo "<option value='$jskl[id_jenjang]'>$jskl[nama_jenjang]</option>";} 
										?>
									</select>
					
			</td></tr>	
<?php			
  }

?>								
		<?php     	
		

				$urlweb=$_SERVER['SERVER_NAME'];
?>
			<tr><td class="isiankanan" width="125px">Url website/Domain *</td><td class="isian"><input onKeyPress="return handleEnter(this, event)"  type="text" name="url" class="maksimal" value="<?php   echo $urlweb;?>"><br>
			<small>Jika melakukan instalasi di server lokal, masukkan <b>localhost/nama_folder</b><br>
			atau gunakan nama <b>domain</b> anda bila diinstall di hosting</small></td></tr>
			<tr><td class="isiankanan" width="125px">Peta Lokasi</td><td class="isian">

<center>
	           <input id="address" onchange="codeAddress()" onKeyUp="codeAddress()" onKeyPress="return handleEnter(this, event)" type="textbox" value="Tulis Kab/Kota/Kecamatan Lokasi  Anda">
     <input type="button"  style="border:hidden;color:white;background: white url('images/search-icon.png') no-repeat top;" onClick="codeAddress()"><br>Klik pada peta untuk menentukan lokasi Anda<br />
	 
    <div id="map-canvas"></div>
</center>
	<table cellpadding="0" cellspacing="0" border="0">

	<tr><td>Latitude <input onKeyPress="return handleEnter(this, event)"  type="text" name='latitude' id='latitude' value="-2.547988"></td><td> 
 </td> <td>Longitude <input onKeyPress="return handleEnter(this, event)"  type="text" name='longitude' id='longitude' value="120.395506"></td></tr>

  </table>	




			</td></tr>
			<tr><td class="isiankanan" width="125px">Alamat</td><td class="isian">
			<textarea rows="3" style="height:30px"  name="alamat"></textarea>
			</td></tr>			
			</td></tr>
			<tr><td class="isiankanan" width="125px">No Telephone</td><td class="isian">
			<input type="text" name="telepon">
			</td></tr>
						
			<tr><td class="isiankanan" width="125px"></td><td class="isian">
			<input type="reset" value="Reset" class="hapus">
			<input type="submit" value="Lanjutkan &raquo;" class="batal">
			</td></tr>
	</table>
	</form>
	<div class="clear"></div>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("kedua");
			frmvalidator.addValidation("nama","jenjang_sekolah","Jenjang sekolah harus diisi");
			frmvalidator.addValidation("nama","req","Nama sekolah harus diisi");
			frmvalidator.addValidation("nama","maxlen=50","Nama sekolah maksimal 50 karakter");
			frmvalidator.addValidation("nama","minlen=10","Nama sekolah minimal 5 karakter");
			
			frmvalidator.addValidation("alamat","req","Alamat harus diisi");
			frmvalidator.addValidation("telepon","req","No Telepon harus diisi");
			frmvalidator.addValidation("url","req","URL harus diisi");
			frmvalidator.addValidation("latitude","req","Latitude harus diisi");
			frmvalidator.addValidation("longitude","req","Longitude harus diisi");
	  
		</script>
</div>
<br>
<?php     } 
include ('../adminpanel/konten/footer.php');
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>