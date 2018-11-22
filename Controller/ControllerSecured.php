<?php

use \Sorha\Framework\Controller;

/** Classe parente des contrôleurs soumis à l'authentification */
abstract class ControllerSecured extends Controller
{
    public function executeAction($action)
    {
        // Vérifie si les informations utilisateur sont présents dans la session
        // Si oui, l'utilisateur s'est déjà authentifié : l'exécution de l'action continue normalement
        // Si non, l'utilisateur est renvoyé vers le contrôleur de connexion
        if ($this->request->getSession()->existsAttribute("userType"))
        {
            if ($this->request->getSession()->getAttribute("userType") === 'admin')
            {
                parent::executeAction($action);
            }
            else
            {
                $this->redirect("Login");
            }
        }
        else 
        {
            $this->redirect("Login");
        }
    }
}
