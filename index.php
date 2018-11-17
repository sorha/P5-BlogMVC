<?php
// Contrôleur frontal : instancie un routeur pour traiter la requête entrante

// Tentative d'autoload
require_once 'Framework/Autoloader.php';
Autoloader::register();



/*function ($className) 
{
		echo $className . ' ';

        //$file = str_replace('\\', '/', $className);
     	$file = 'Framework/' . $className . '.php';
        if (file_exists($file))
        {
        	require_once $file;
        }
}); */

//require_once 'Framework/Router.php';

$router = new Router();
$router->routingRequest();

