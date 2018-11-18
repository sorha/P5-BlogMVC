<?php

namespace Sorha\Framework;

class Router 
{    
    // Route une requête entrante : exécution l'action associée
    public function routingRequest() 
    {   
        try 
        {
            // Fusion des paramètres GET et POST de la requête
            $request = new Request(array_merge($_GET, $_POST));

            $controller = $this->createController($request);
            $action  = $this->createAction($request);

            $controller->executeAction($action);
        }
        catch (\Exception $e) 
        {
            $this->error($e);
        }
    }
    
    /**
     * Gère une erreur d'exécution (exception)
     * 
     * @param \Exception $exception Exception qui s'est produite
     */
    private function error(\Exception $exception)
    {
        $view = new View("Error");
        $view->generate(array('msgError' => $exception->getMessage()));
    }
    
    // Creation du contrôleur approprié en fonction de la requête reçue
    private function createController(Request $request)
    {
        $controller = "Home"; //Contrôleur par défaut
        // Si dans les paramètres reçus ($_GET & $_POST), controller existe
        if ($request->existsParameter('controller'))
        {
            $controller = $request->getParameter('controller');
            // Première lettre en majuscule
            $controller = ucfirst(strtolower($controller));
        }
        // Creation du nom du fichier du contrôleur
        $classController = 'Controller' . $controller;
        $fileController = 'Controller/' . $classController . '.php';
        if (file_exists($fileController))
        {
            // Instanciation du contrôleur adapté à la requête
            require_once($fileController);
            $controller = new $classController();
            $controller->setRequest($request);
            return $controller;
        }
        else
        {
            throw new \Exception("Fichier '$fileController' introuvable");
        }
    }

    // Détermine l'action à exécuter en fonction de la requête reçue
    private function createAction(Request $request)
    {
        $action = "index"; // Action par défaut
        if ($request->existsParameter('action'))
        {
            $action = $request->getParameter('action');
        }
        
        return $action;
    }
}
