
<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

if (!isset($_SESSION['adminsh']))
{
	gogo('../../../index.php');
	exit;
}
else{ 


$database="aplikasi/gmap/gmap.php";
			$lokasix=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE nama_pengaturan='lolagmap'");
			$lx=mysql_fetch_array($lokasix);
			if (($lx['isi_pengaturan'] <>"") and ($lx['isi_pengaturan2'] <>"")){
			$la=$lx['isi_pengaturan'];
			$lo=$lx['isi_pengaturan2'];
			$zoom=14;
			$aktif=1;
			}else{
			$la='-2.547988';
			$lo='120.395506';
			$zoom=4;
			$aktif=0;
			
			}
?>


    <style>
      #map-canvas {

		width :650px;
		height :400px;
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

  var haightAshbury = new google.maps.LatLng(<?php echo $la;?>,<?php echo $lo;?>)
  var mapOptions = {
    zoom:<?php echo $zoom;?>,
    center: haightAshbury,
    //mapTypeId: google.maps.MapTypeId.TERRAIN
  };
   map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
 
		<?php if ($aktif==3){  ?>
  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
      '<div id="bodyContent">'+
      '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
      'sandstone rock formation in the southern part of the '+
      'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
      'south west of the nearest large town, Alice Springs; 450&#160;km '+
      '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
      'features of the Uluru - Kata Tjuta National Park. Uluru is '+
      'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
      'Aboriginal people of the area. It has many springs, waterholes, '+
      'rock caves and ancient paintings. Uluru is listed as a World '+
      'Heritage Site.</p>'+
      '<p>Attribution: Uluru, <a href="http://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
      'http://en.wikipedia.org/w/index.php?title=Uluru</a> '+
      '(last visited June 22, 2009).</p>'+
      '</div>'+
      '</div>';



	  
  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });


  	<?php }  ?>
	
  var image = 'images/sch.png';	
  var myLatLng = new google.maps.LatLng(<?php echo $la;?>,<?php echo $lo;?>);
  
  var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      icon: image,
	  
	  title: 'LOKASI ANDA'
	  
  });

	<?php if ($aktif==3){  ?>
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
	<?php }  ?>

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
	icon:'images/sch.png'
  });
				document.getElementById('latitude').value = [location.lat()]
				document.getElementById('longitude').value = [location.lng()] 
				
  markers.push(marker);
  
				//map.setCenter(marker.getPosition());

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
      
	icon:'images/biru.png'
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


<h3>Lokasi<?php echo $_SESSION['Bsekolah']; ?></h3>

<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="informasi_sekolah.php?t=<?php echo $token; ?>">Informasi<?php echo $_SESSION['Bsekolah']; ?></a></div>
			<div class="menuhorisontalaktif"><a href="gmap.php?t=<?php echo $token; ?>">Lokasi Gmap</a></div>
			<div class="menuhorisontal"><a href="profil.php?t=<?php echo $token; ?>">Profil</a></div>
			<div class="menuhorisontal"><a href="agenda.php?t=<?php echo $token; ?>">Agenda</a></div>
			<div class="menuhorisontal"><a href="pengumuman.php?t=<?php echo $token; ?>">Pengumuman</a></div>
		</div>

		<table class="isian">
		<form method='POST' name="editmap" id="editmap"<?php     echo "action='$database?t=$token' "; ?>  enctype="multipart/form-data">
			<tr><td valign="top" class="isiankanan" width="160px">PETA LOKASI</td><td class="isian">
			<?php 

						   

			?>
			</td></tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;">
			<center>

	           <input id="address"  onchange="codeAddress()" onKeyUp="codeAddress()" onKeyPress="return handleEnter(this, event)" type="textbox" value="Tulis Kab/Kota/Kecamatan Lokasi<?php echo $_SESSION['Bsekolah'];?> Anda">
     <input type="button"  style="border:hidden;color:white;background: white url('images/search-icon.png') no-repeat top;" onClick="codeAddress()"><br>Klik pada peta untuk menentukan lokasi Anda<br />
	 
    <div id="map-canvas"></div>

	<table cellpadding="0" cellspacing="0" border="0">

	<tr><td>Latitude <input onKeyPress="return handleEnter(this, event)"  type="text" name='latitude' id='latitude' value="<?php echo $la;?>"></td><td> 
 </td> <td>Longitude <input onKeyPress="return handleEnter(this, event)"  type="text" name='longitude' id='longitude' value="<?php echo $lo;?>"></td></tr>

  </table>	
  </center>
  			</tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editmap");
	  
			frmvalidator.addValidation("fupload","file_extn=jpg;gif;png","Jenis file yang diterima untuk gambar adalah : jpg, gif, png");
	  
			//]]>
		</script>
		</table>
		
</div><!--Akhir class isi kanan-->
		

<?php   }
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>