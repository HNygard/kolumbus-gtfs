<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Templatekolumbus extends Controller_Template {
	
	protected $template2;
	public function before()
	{
		$thereturn = parent::before();
		
		if ($this->auto_render === TRUE)
		{
			// Load the template
			
			$this->template2 = View::factory('template');
		}
		
		return $thereturn;
	}
	
	public function after()
	{
		$thereturn = parent::after();
		if ($this->auto_render === TRUE)
		{
			$this->template2->content = $this->response->body();
			$this->response->body($this->template2->render());
		}
		
		return $thereturn;
	}
}
