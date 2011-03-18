<?php defined('SYSPATH') or die('No direct script access.');

class Model_Stop_Time extends Sprig {
	
	protected function _init()
	{
		$this->_fields += array(
			'trip_id' => new Sprig_Field_Char(array(
			)),
			'arrival_time' => new Sprig_Field_Char(array(
			)),
			'arrival_time_seconds' => new Sprig_Field_Char(array(
			)),
			'departure_time' => new Sprig_Field_Char(array(
			)),
			'departure_time_seconds' => new Sprig_Field_Char(array(
			)),
			'stop_id' => new Sprig_Field_Char(array(
			)),
			'stop_sequence' => new Sprig_Field_Char(array(
			)),
			'stop_headsign' => new Sprig_Field_Char(array(
			)),
			'pickup_type' => new Sprig_Field_Char(array(
			)),
			'drop_off_type' => new Sprig_Field_Char(array(
			)),
			'shape_dist_traveled' => new Sprig_Field_Char(array(
			)),
		);
	}
}
