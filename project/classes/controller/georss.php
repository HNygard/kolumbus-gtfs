<?php

class Controller_Georss extends Controller
{
	function action_stops ()
	{
		// Creating RSS info
		$pubDate = mktime(13,0,0,03,18,2011); // TODO: auto update according to data
		$info = array(
				'title'          => 'Alle kollektivstopp',
				'description'    => 'Rutedata fra Kolumbus',
				'link'           => Request::$current->uri(),
				'lastBuildDate'  => time(),
				'pubDate'        => $pubDate,
			);
		
		// Creating items
		$items = array();
		$stops = Sprig::factory('stop')->load(NULL, FALSE);
		foreach($stops as $stop)
		{
			$items[] = array(
					'pubDate'      => $pubDate,
					'title'        => $stop->stop_name,
					'description'  => '', // TODO
					'link'         => URL::site('holdeplass/'.$stop->stop_id),
					'geo:lat'      => $stop->stop_lat,
					'geo:long'     => $stop->stop_lon,
				);
		}
		
		echo Feed::create($info, $items);
	}
}
