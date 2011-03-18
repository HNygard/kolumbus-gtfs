/*
 * KOLUMBUS-GTFS
 * Author: Hallvard Nygård, http://hnygard.no/
 * Source code: http://github.com/HNygard/kolumbus-gtfs
 * 
 * License: Creative Commons Attribution-Share Alike 3.0 Norway License, http://creativecommons.org/licenses/by-sa/3.0/no/
 */


$(document).ready(function() {
	updateDepartures()
});

function secondsToText (seconds)
{
	if(seconds > 86400)
		return 'Mer enn 1 dag';
	else if (seconds < 120)
		return 'UNDER 2 MINUTTER!';
	
	// 3 minutes to 1 day
	thereturn = '';
	
	// Checking for hours
	if(seconds > 3600)
	{
		if(parseInt(seconds / 3600) > 1)
			thereturn += parseInt(seconds / 3600) + ' timer';
		else
			thereturn += parseInt(seconds / 3600) + ' time';
		seconds -= parseInt(seconds / 3600)*3600;
	}
	
	// Rest is minutes
	minutes = parseInt(seconds / 60);
	if(minutes > 0)
	{
		if(thereturn != '')
			thereturn += ', ';
		thereturn += minutes + ' minutter';
	}
	
	return thereturn;
}

function updateDepartures()
{
	// Run through all tr with the tag
	$('tr.departure').each(function(index, row)
	{
		now = new Date;
		unixtime_now = parseInt(now.getTime() / 1000);
		unixtime = $('td.departure_unixtime', $(this)).text();
		
		seconds_left = parseInt(unixtime - unixtime_now);
		if(seconds_left < 0)
		{
			$(this).remove();
		}
		else if(seconds_left < 120)
		{
			$(this).addClass('departing');
			$(this).removeClass('departing_soon');
		}
		else if(seconds_left < 480)
		{
			$(this).addClass('departing_soon');
		}
		$('td.departure_timeleft', $(this)).text(secondsToText (seconds_left));
	});
	
	setTimeout("updateDepartures();", 5000); // Update every 5 second
}
