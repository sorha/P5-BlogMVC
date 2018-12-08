<?php

use \Sorha\Framework\Controller;

class ControllerHome extends Controller
{
	public function index() 
	{
		$this->generateView(array());
    }
}
