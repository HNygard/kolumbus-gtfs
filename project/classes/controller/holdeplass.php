<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Holdeplass extends Controller_Templatekolumbus {

	public $template = 'holdeplass/vis';
	public function action_index($stop_id, $stop_name, $view = 'vis')
	{
		$stop = Sprig::factory('stop', array('stop_id' => $stop_id))->load();

		if(!$stop->loaded())
		{
			$this->response->error = '404';
			return;
		}
		
		
		if($view == 'neste_avganger')
		{
			$this->template = new View('holdeplass/neste_avganger');
		}
		
		$this->template->stop = $stop;
		$this->template2->title = 'Holdeplass '.$stop->stop_name;
	}
}
