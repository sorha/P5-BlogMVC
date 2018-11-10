<?php

require_once 'View/View.php';

class ControllerHome
{

	public function __construct()
	{

	}

	// Affiche la page d'accueil
	public function home()
	{
		$view = new View('Home');
		$view->generate(array());
	}
}