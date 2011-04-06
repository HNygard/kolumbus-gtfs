<html>
<head>
	<title>Neste avganger fra holdeplass <?php echo $stop->stop_name; ?> - Hnygard.no</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="/kolumbus/next_departure.js"></script>
	<?php echo new View ('googleanalytics'); ?>
</head>

<body style="background-color: black; color: white;
font-family: Helvetica, Arial, sans-serif;
margin: 0;
">
<?php

echo '<h1 class="next_departures">'.
	'Bussavganger for holdeplass '.$stop->stop_name.'</h1>';
echo '<h1 class="clock"></h1>';

$deps = $stop->getNextDepartures();

if(!count($deps))
{
	echo '<span style="color: red;">Ingen flere avganger i dag eller i morgen.</span>';
}
else
{
	echo '<style>
h1.next_departures {
	background-color: #006633;
	font-size: 2em;
	width: 100%;
	margin: 0;
	padding: 0.5em;
}
div.footer {
	position: absolute;
	right: 0px;
	bottom: 0px;
	padding-right: 10px;
	padding-top: 5px;
	padding-left: 0px;
	padding-bottom: 5px;
	text-align: right; 
	background-color: #006633;
	width:100%;
}
h1.clock {
	position: absolute;
	font-size: 1.5em;
	right: 0.25em;
	top: 0.25em;
}
tr.departure td {
	border-bottom: 2px solid gray;
	border-top: 2px solid gray;
} 
tr.departing td { color: red; }
tr.departing_soon td { color: orange; }

table.departures {
	width: 100%;
	border-collapse: collapse;
	border-spacing: 0;
}
td.departure_timeleft {
	text-align: right;
	font-size: 1.7em;
	padding-right: 1em;
}
td.departure_unixtime {
	display: none;
}
td.departure_time {
	width: 5em;
	text-align: left;
}
td.departure_name {
	font-size: 1.7em;
}
td.route_short_name {
	font-weigth: bold;
	width: 2em;
	text-align: right;
}
td.trip_headsign {
	color: gray;
	padding-left: 0.5em;
	font-size: 1.3em;
}
a:link { color: white; }
a:visited { color: white; }
a:active { color: white; }
a:hover { color: white; }
</style>';
	echo '<span style="display: none;" id="unixtime_now">'.time().'</span>';
	echo '<table class="departures">';
	/*echo '	<tr>';
	echo '		<td>Dato</td>';
	echo '		<td>Rute</td>';
	echo '		<td>Avgang</td>';
	echo '		<td>Skilt</td>';
	echo '		<td>&nbsp;</td>';
	echo '	</tr>'.chr(10);*/
	foreach($deps as $key => $dep)
	{
		echo '	<tr class="departure">';
		//echo '		<td>'.date('d.m.Y', $dep['departure_unixtime']).'</td>';
		//echo '		<td class="route_short_name">'.$dep['route_short_name'].'</td>';
		//echo '		<td class="departure_time">'.$dep['departure_time'].'</td>';
		//echo '		<td>'.$dep['route_short_name'].' '.$dep['trip_headsign'].'</td>';
		echo '		<td class="departure_name route_short_name">'.$dep['route_short_name'].'</td>';
		echo '		<td class="departure_name trip_headsign">'.$dep['trip_headsign'].'</td>';
		echo '		<td class="departure_unixtime">'.$dep['departure_unixtime'].'</td>';
		echo '		<td class="departure_timeleft"></td>';
		echo '		<td class="departure_time">'.$dep['departure_time'].'</td>';
		echo '	</tr>'.chr(10);
	}
	echo '</table>';
}
?>

<div class="footer next_departures"><a href="http://kolumbus.hnygard.no/">http://kolumbus.hnygard.no/</a> - Visning av Hallvard Nyg&aring;rd (@<a href="https://twitter.com/hallny">hallny</a>). Rutedata fra Kolumbus.</div>
</body>
</html>
