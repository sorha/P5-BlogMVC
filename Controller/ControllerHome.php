<?php

require_once 'Framework/Controller.php';

class ControllerHome extends Controller
{

	public function __construct()
	{
		
	}

	public function index() 
	{
		$this->generateView(array());
    }
}