<html>
<head>
	<title><?php echo $title; ?> - Hnygard.no</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://www.openlayers.org/api/OpenLayers.js"></script>
	<?php echo new View ('googleanalytics'); ?>
</head>

<body>

<?php echo $content; ?>

<div class="footer">
<br />Laget av Hallvard Nygård (<a href="https://twitter.com/hallny/">@hallny</a>). CC-BY-SA, <a href="https://github.com/HNygard/kolumbus-gtfs">kildekode på Github</a>. Rutedata fra Kolumbus (<a href="http://next.kolumbus.no/rutedata/">se egen lisens</a>).
</div>
</body>
</html>
