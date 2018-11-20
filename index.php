<?php

// Contrôleur frontal : instancie un routeur pour traiter la requête entrante
// Utilisation de l'autoloader de composer
require_once 'vendor/autoload.php';

use \Sorha\Framework\Router;

$router = new Router();
$router->routingRequest();
