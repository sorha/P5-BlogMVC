<?php

//namespace BlogMVC\Controller;     Pas le droit de mettre de namespace sinon la creation dynamique de contrôleur dans le Router du Framework ne fonctionne plus

use \Sorha\Framework\Controller;
use \BlogMVC\Model\Manager\PostsManager;
use \BlogMVC\Model\Manager\CommentsManager;
use \BlogMVC\Model\Entity\Comment;

class ControllerPost extends Controller
{
	private $postsManager;
	private $commentsManager;

	public function __construct()
	{
		$this->postsManager = new PostsManager();
		$this->commentsManager = new CommentsManager();
	}

	// Ajoute un commentaire au post
	public function addComment()
	{
		$postId = $this->request->getParameter("id");
		$userId = $this->request->getSession()->getAttribute("userId");
        $content = $this->request->getParameter("content");

        // Création d'un nouvel objet Comment
		$comment = new Comment(array('content' => $content, 'dateCreation' => date('Y-m-d H:i:s'), 'userId' => $userId, 'postId' => $postId));
		// Ajout de l'objet Comment dans la base de données
        $this->commentsManager->add($comment);
        // Exécution de l'action par défaut pour réafficher la liste des billets
        $this->executeAction("index");
	}

	// Action par défaut : Affiche les détails d'un post précis par
	public function index()
	{
		$postId = $this->request->getParameter("id");
        $post = $this->postsManager->get($postId);
        $comments = $this->commentsManager->getList($postId);
        
        $this->generateView(array('post' => $post, 'comments' => $comments));
    }
}
