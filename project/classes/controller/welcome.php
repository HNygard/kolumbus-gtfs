<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Templatekolumbus {

	public $template = 'welcome';
	public function action_index()
	{
		$this->template2->title = 'Kolumbus.hnygard.no';
	}

} // End Welcome
