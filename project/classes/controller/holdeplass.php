<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Holdeplass extends Controller_Templatekolumbus {

	//public $template = '';
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
			$this->use_template2 = false;
			$this->template = new View('holdeplass/neste_avganger');
		}
		else
		{
			$this->template2->title = 'Holdeplass '.$stop->stop_name;
			$this->template = View::factory('holdeplass/vis');
		}
		
		$this->template->stop = $stop;
	}
	
	public function action_liste()
	{
		$this->template = View::factory('holdeplass/liste');
		
		// Just loading all stops
		$this->template->stops = Sprig::factory('stop')->load(NULL, FALSE);
		$this->template2->title = 'Buss-holdeplasser i Rogaland';
	}
}
