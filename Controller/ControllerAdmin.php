<?php

use \Sorha\Framework\ControllerSecured;
use \BlogMVC\Model\Manager\PostsManager;
use \BlogMVC\Model\Entity\Post;

/** Controleur des actions d'administration. Hérite de ControllerSecured afin de vérifier l'authentification */
class ControllerAdmin extends ControllerSecured
{
    private $postsManager;
    
    public function __construct()
    {
        $this->postsManager = new PostsManager();
    }
    
    public function index()
    {
        // Verification si la personne est admin déjà faîtes dans ControllerSecured
        $numberPosts = $this->postsManager->count();
        $username = $this->request->getSession()->getAttribute("username");
        $this->generateView(array('numberPosts' => $numberPosts, 'username' => $username));
    }
    
    public function addPost()
    {
        $title = $this->request->getParameter("title");
        $chapo = $this->request->getParameter("chapo");
        $userId = $this->request->getSession()->getAttribute("userId");
        $content = $this->request->getParameter("content");
        
        // Création d'un nouvel objet Comment
        $post = new Post(array('title' => $title, 'chapo' => $chapo, 'content' => $content, 'dateCreation' => date('Y-m-d H:i:s'), 'userId' => $userId));
        // Ajout de l'objet Post dans la base de données
        $this->postsManager->add($post);
        
        // Exécution de l'action par défaut pour réafficher le menu d'administration
        $this->executeAction("index");
    }
}
