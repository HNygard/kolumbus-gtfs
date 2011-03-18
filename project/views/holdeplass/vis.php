<html>
<head>
	<title>Holdeplass <?php echo $stop->stop_name; ?> - Hnygard.no</title>
</head>

<body>
<?php

echo '<h1>Holdeplass '.$stop->stop_name.'</h1>';
//echo html::anchor($stop->stop_url, 'Vis mobilversjon av holdeplassen hos Kolumbus').'<br />';
echo html::anchor($stop->getLink().'/neste_avganger', 'Vis neste avganger').' (tilpasset fullskjermsvisning)<br />';

echo '<br />';
?>
<div id="map" style="width:500px; height:500px;"></div>
<script src="http://www.openlayers.org/api/OpenLayers.js"></script>
<script>
map = new OpenLayers.Map("map");
map.addLayer(new OpenLayers.Layer.OSM());

var lonLat = new OpenLayers.LonLat( <?php echo $stop->stop_lon.' ,'.$stop->stop_lat; ?> )
  .transform(
    new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
    map.getProjectionObject() // to Spherical Mercator Projection
  );

var zoom=15;

var markers = new OpenLayers.Layer.Markers( "Markers" );
map.addLayer(markers);

markers.addMarker(new OpenLayers.Marker(lonLat));

map.setCenter (lonLat, zoom);
</script>

Rutedata fra Kolumbus.
</body>
</html>
