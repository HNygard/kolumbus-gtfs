<?php defined('SYSPATH') or die('No direct script access.');

class Model_Stop extends Sprig {
	
	protected function _init()
	{
		$this->_fields += array(
			'stop_id' => new Sprig_Field_Char(array(
			)),
			'stop_code' => new Sprig_Field_Char(array(
			)),
			'stop_name' => new Sprig_Field_Char(array(
			)),
			'stop_desc' => new Sprig_Field_Char(array(
			)),
			'stop_lat' => new Sprig_Field_Char(array(
			)),
			'stop_lon' => new Sprig_Field_Char(array(
			)),
			'zone_id' => new Sprig_Field_Char(array(
			)),
			'stop_url' => new Sprig_Field_Char(array(
			)),
			'location_type' => new Sprig_Field_Char(array(
			)),
			'parent_station' => new Sprig_Field_Char(array(
			)),
		);
	}
	
	public function __get($var)
	{
		if($var == 'stop_name')
		{
			return mb_convert_encoding(parent::__get($var), 'Windows-1252', 'UTF8');
		}
		else
			return parent::__get($var);
	}
	
	/**
	 * Returns link to the stops page
	 *
	 * @return  String
	 */
	public function getLink()
	{
		return 'holdeplass/'.$this->stop_id.'/'.
			url::title($this->stop_name);
	}
	
	/**
	 * Returns number of seconds into a day + 1.1.1970
	 *
	 * @return  Int
	 */
	public static function getTimeInSeconds($time)
	{
		$parts = explode(':', $time);			
		if(count($parts) != 3)
			throw new Kohana_Exception(
				'Format is wrong. Time was :time', 
				array(':time' => $time));
		return mktime($parts[0], $parts[1], $parts[2]);
	}
	
	/**
	 * Returns the next departures from the stop today and tomorrow
	 *
	 * @return array   Array with departures (array with lots of variables)
	 */
	public function getNextDepartures ()
	{
		// Getting departures for today and tomorrow
		$bigassquery = DB::query(Database::SELECT, 
			"SELECT *
				FROM `stop_times` , `trips` , `calendar_dates` , `routes`
				WHERE
					stop_times.`stop_id` = '11031124' AND 
					stop_times.trip_id = trips.trip_id AND 
					trips.service_id = calendar_dates.service_id AND
					trips.route_id = routes.route_id AND 
					(
						calendar_dates.date = 
							'".date('Ymd')."' OR 
						calendar_dates.date = 
							'".date('Ymd', 
								mktime(0,0,0, 
									date('m'), 
									date('d')+1, 
									date('Y')
								)
							)."'
					)")
				->execute();
		
		$departures = array();
		foreach($bigassquery as $a )
		{
			$checkout = false;
			if($a['date'] == date('Ymd')) // Today
			{
				if(
					Model_Stop::getTimeInSeconds(
						$a['departure_time']) >
					Model_Stop::getTimeInSeconds(
						date('H:i:s')) // Not departured
				)
				{
					$checkout = true;
				}
			}
			else // Tomorrow
			{
				$checkout = true;
			}
			
			if($checkout)
			{
				$unique = 
					$a['date'].
					Model_Stop::getTimeInSeconds($a['departure_time']) .
					$a['trip_id'];
				
				// Making departure_unixtime
				$tmp = Model_Stop::getTimeInSeconds($a['departure_time']);
				$a['departure_unixtime'] = 
					mktime(
						date('H', $tmp),
						date('i', $tmp),
						date('s', $tmp),
						substr($a['date'], 4, 2), // Month
						substr($a['date'], 6, 2), // Day
						substr($a['date'], 0, 4)); // Year
				
				$departures[$unique] = $a;
			}
		}
		
		ksort($departures);
		return $departures;
	}
}
