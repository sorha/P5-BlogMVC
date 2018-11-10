<?php

require_once 'Controller/ControllerHome.php';
require_once 'Controller/ControllerPost.php';
require_once 'Controller/ControllerPostList.php';
require_once 'View/View.php';

class Router 
{
    private $ctrlHome;
    private $ctrlPost;
    private $ctrlPostList;
    
    public function __construct()
    {
        $this->ctrlHome = new ControllerHome();
        $this->ctrlPost = new ControllerPost();
        $this->ctrlPostList = new ControllerPostList();
    }
    
    // Route une requête entrante : exécution l'action associée
    public function routingRequest() 
    {   
        try 
        {
            if (isset($_GET['action'])) 
            {
                if ($_GET['action'] == 'post') 
                {
                    $idPost = intval($this->getParameter($_GET, 'id'));
                    if ($idPost > 0)
                    {
                        $this->ctrlPost->post($idPost);
                    }
                    else
                    {
                        throw new Exception("Identifiant du post non valide");
                    }
                }
                else if ($_GET['action'] == 'postList')
                {
                    $this->ctrlPostList->postList($content, $author, $idPost);
                }
                else if ($_GET['action'] == 'addComment')
                {
                	// Il faudra créer le système d'authentification afin que l'userId de l'auteur soit pris en fonction du compte avec lequel il est connécté !
                    // $author = $this->getParameter($_POST, 'userId');
                    $content = $this->getParameter($_POST, 'content');
                    $idPost = $this->getParameter($_POST, 'postId');
                    $this->ctrlPost->addComment($content, $userId, $postId);
                }
                else
                {
                    throw new Exception("Action non valide");
                }
            }
            else 
            {	// Aucune action définie : affichage de l'accueil
                $this->ctrlHome->home();
            }
        }
        catch (Exception $e) 
        {
            $this->error($e->getMessage());
        }
    }
    
    // Affiche une erreur
    private function error($msgError)
    {
        $view = new View("Error");
        $view->generate(array('msgError' => $msgError));
    }
    
    // Recherche un paramètre dans un tableau
    private function getParameter($tab, $name)
    {
        if (isset($tab[$name])) 
        {
            return $tab[$name];
        }
        else
        {
            throw new Exception("Paramètre '$name' absent");
        }
    }
    
}
