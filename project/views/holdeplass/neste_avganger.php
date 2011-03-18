<html>
<head>
	<title>Neste avganger fra holdeplass <?php echo $stop->stop_name; ?> - Hnygard.no</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="/kolumbus/next_departure.js"></script>
</head>

<body style="background-color: black; color: white;">
<?php

echo '<h1>Holdeplass '.$stop->stop_name.'</h1>';

$deps = $stop->getNextDepartures();

if(!count($deps))
{
	echo '<span style="color: red;">Ingen flere avganger i dag eller i morgen.</span>';
}
else
{
	echo '<style> 
td { border: 1px solid gray; } 
tr.departing td { color: red; }
tr.departing_soon td { color: orange; }
</style>';
	echo '<span style="display: none;" id="unixtime_now">'.time().'</span>';
	echo '<table class="departures">';
	echo '	<tr>';
	echo '		<td>Dato</td>';
	echo '		<td>Rute</td>';
	echo '		<td>Avgang</td>';
	echo '		<td>&nbsp;</td>';
	echo '		<td>Skilt</td>';
	echo '	</tr>'.chr(10);
	foreach($deps as $key => $dep)
	{
		echo '	<tr class="departure">';
		echo '		<td>'.date('d.m.Y', $dep['departure_unixtime']).'</td>';
		echo '		<td>'.$dep['route_short_name'].'</td>';
		echo '		<td class="departure_time">'.$dep['departure_time'].'</td>';
		echo '		<td class="departure_unixtime" style="display: none;">'.$dep['departure_unixtime'].'</td>';
		echo '		<td class="departure_timeleft"></td>';
		echo '		<td>'.$dep['route_short_name'].' '.$dep['trip_headsign'].'</td>';
		echo '	</tr>'.chr(10);
	}
	echo '</table>';
}
?>

<div style="position: absolute; right: 10px; text-align: right; bottom: 10px; background-color: black;">http://kolumbus.hnygard.no/ - Visning av neste avganger. Visning av Hallvard Nyg&aring;rd (@hallny). Rutedata fra Kolumbus.</div>
</body>
</html>
