<?php

//namespace BlogMVC\Controller;     Pas le droit de mettre de namespace sinon la creation dynamique de contrôleur dans le Router du Framework ne fonctionne plus

use \Sorha\Framework\Controller;

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