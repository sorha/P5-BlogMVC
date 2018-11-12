<?php
// Contrôleur frontal : instancie un routeur pour traiter la requête entrante
require_once 'Framework/Router.php';

$router = new Router();
$router->routingRequest();