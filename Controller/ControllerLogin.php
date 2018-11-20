<?php

use Sorha\Framework\Controller;
use BlogMVC\Model\Manager\UsersManager;

class ControllerLogin extends Controller
{
    private $usersManager;
    
    public function __construct()
    {
        $this->usersManager = new UsersManager();
    }
    
    public function index()
    {
        $this->generateView();
    }
    
    public function login()
    {
        if ($this->request->existsParameter("username") && $this->request->existsParameter("password")) 
        {
            $username = $this->request->getParameter("username");
            $password = $this->request->getParameter("password");

            // Verifie si la combinaison username/password existe
            if ($this->usersManager->login($username, $password))
            {
                // Recupération d'un objet User qui contient toutes les infos de l'utilisateur en question
                $user = $this->usersManager->get($username);
                if ($user->getActivated() == '1')
                {
                    $this->request->getSession()->setAttribute("userId", $user->getId());
                    $this->request->getSession()->setAttribute("username", $user->getUsername());
                    if($user->getUserType() === '2')
                    {
                        $this->request->getSession()->setAttribute("userType", 'admin');
                        $this->redirect("Admin");
                    }
                    $this->request->getSession()->setAttribute("userType", 'member');
                    $this->redirect("Home");
                }
                else
                {
                    throw new Exception("Veuillez activer votre compte via le mail qui vous a été envoyé !");
                }
            }
            else 
            {
                throw new Exception("Action impossible : login ou mot de passe incorrects");
            }
        }
        else 
        {
            throw new Exception("Action impossible : login ou mot de passe non défini");
        }
    }
    public function logout()
    {
        $this->request->getSession()->destroy();
        $this->redirect("Home");
    }
}
