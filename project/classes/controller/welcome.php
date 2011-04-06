<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Templatekolumbus {

	public $template = 'welcome';
	public function action_index()
	{
		// Just loading all stops
		$this->template->stops = Sprig::factory('stop')->load(NULL, FALSE);
		$this->template2->title = 'Buss-holdeplasser i Rogaland';
	}

} // End Welcome
