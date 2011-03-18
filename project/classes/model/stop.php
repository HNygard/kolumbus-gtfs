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
}