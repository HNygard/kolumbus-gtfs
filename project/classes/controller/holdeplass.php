<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Holdeplass extends Controller_Template {

	public $template = 'holdeplass/vis';
	public function action_index($stop_id, $stop_name, $view = 'vis')
	{
		$stop = Sprig::factory('stop', array('stop_id' => $stop_id))->load();

		if(!$stop->loaded())
		{
			$this->response->error = '404';
			return;
		}
		
		$this->template->stop = $stop;
	}

} // End Welcome
