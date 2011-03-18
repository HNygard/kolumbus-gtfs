<html>
<head>
	<title>Buss-holdeplasser i Rogaland - Hnygard.no</title>
</head>

<!--
<script src="http://openlayers.org/api/OpenLayers.js" type="text/javascript"></script>
<script type="text/javascript">
	var map, layer;

	function init(){
		map = new OpenLayers.Map('map', {maxResolution:'auto'});
		layer = new OpenLayers.Layer.WMS( "OpenLayers WMS",
			"http://vmap0.tiles.osgeo.org/wms/vmap0", {layers: 'basic'} );
		map.addLayer(layer);
		map.setCenter(new OpenLayers.LonLat(0, 0), 0);
		map.addControl(new OpenLayers.Control.LayerSwitcher());
		var newl = new OpenLayers.Layer.GeoRSS('Holdeplasser', '/kolumbus/index.php/georss/stops/');
		map.addLayer(newl);
	}
</script>-->

<!-- <body onload="init()"> 
	<!-- <div id="map" class="smallmap"></div> 

	Kartdata fra OpenStreetMap. Rutedate fra Kolumbus.-->
<body>
<?php

if(isset($stops))
{
	foreach ($stops as $stop)
	{
		echo html::anchor($stop->getLink(), $stop->stop_name).'<br>';;
	}
}
?>

Rutedata fra Kolumbus.
</body>
</html>
