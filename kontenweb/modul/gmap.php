<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
  if (!isset($_SESSION['kontenisi'])){
header ('location:../../index.php');
break;
}

function meta() {
global $ns, $r;
$web=$ns['isi_pengaturan'];
$title='Peta Lokasi';
$descx=strtolower($title).' ';
$titlez=$descx.''.$web;
$keyw = strtolower(preg_replace("/\s/",", ",$titlez));	
$keyw=$keyw.', '.$descx.', '.$web.', '.$descx.' '.$web.', '.$web.' '.$descx;
$kewyword='';
$keywords=keyw($kewyword, $keyw);
$descx='data '.$titlez;
$isi='';
$description=desc($isi,$descx);
$judul='';
$title=titx($judul,$title);
$title=$title.' - '.$web;
echo "<title>$title</title>
<meta name='description' content='$description'>
<meta name='keywords' content='$keywords'> ";
}


function konten() {
global $DB_KODE, $ns;
$web=$ns['isi_pengaturan'];
?>
<div id="konten">
<div id="lebar">
<h3>Lokasi <a href=""><?php    echo "$ns[isi_pengaturan]";?></a></h3>
<?php    
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
    	$alamatsekolah=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan=12");
				$ax=mysql_fetch_array($alamatsekolah);
				$alamat=$ax['isi_pengaturan'];
				
	//$isi="<div id='content'><h4>$web</h4><div id='bodyContent'>$alamat</div></div>";		
?>

   <style>
      #map-canvas {

		width :550px;
		height :400px;
      }

	  #address{width:350px}
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=adsense"></script>
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
var adUnit;

function initialize() {
geocoder = new google.maps.Geocoder();

  var haightAshbury = new google.maps.LatLng(<?php echo $la;?>, <?php echo $lo;?>)
  var mapOptions = {
    zoom: <?php echo $zoom;?>,
    center: haightAshbury,
    //mapTypeId: google.maps.MapTypeId.TERRAIN
  };
   map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
 
		<?php if ($aktif==5){  ?>
  var contentString = '<?php echo $isi;?>';
  var adUnitDiv = document.createElement('div');

  // Note: replace the publisher ID noted here with your own
  // publisher ID.
  var adUnitOptions = {
    format: google.maps.adsense.AdFormat.HALF_BANNER,
    position: google.maps.ControlPosition.BOTTOM_CENTER,
    publisherId: 'ca-pub-1736783835468173',
    map: map,
    visible: true
  };
  var adUnit = new google.maps.adsense.AdUnit(adUnitDiv, adUnitOptions);

 
  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });


  	<?php }  ?>
	
  var image = 'adminpanel/images/sch.png';	
  var myLatLng = new google.maps.LatLng(<?php echo $la;?>, <?php echo $lo;?>);
  
  var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      icon: image,
	  
	  title: '<?php echo $web;?>'
	  
  });

	<?php if ($aktif==1){  ?>
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
	<?php }  ?>

  google.maps.event.addListener(map, 'click', function(event) {
  map.setZoom(15);

    addMarker(event.latLng);
  });
}


google.maps.event.addDomListener(window, 'load', initialize);

    </script>
	<div id="map-canvas"></div>
	<br /><br />Alamat : <?php echo $alamat;?>
</div>
</div>
<?php     } ?>

<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>

