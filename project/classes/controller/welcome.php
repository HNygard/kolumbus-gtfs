<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Template {

	public $template = 'welcome';
	public function action_index()
	{
		// Just loading all stops
		$this->template->stops = Sprig::factory('stop')->load(NULL, FALSE);
	}

} // End Welcome
