<?php

require_once 'Model/Manager/PostsManager.php';
require_once 'Model/Manager/CommentsManager.php';
require_once 'Model/Entity/Comment.php';
require_once 'View/View.php';

class ControllerPost
{
	private $postsManager;
	private $commentsManager;

	public function __construct()
	{
		$this->postsManager = new PostsManager();
		$this->commentsManager = new CommentsManager();
	}

	// Affiche les détails d'un post précis
	public function post($postId)
	{
		$post = $this->postsManager->get($postId);
		$comments = $this->commentsManager->getList($postId);
		$view = new View('Post');
		$view->generate(array('post' => $post, 'comments' => $comments));
	}

	// Ajoute un commentaire au post
	public function addComment($content, $userId, $postId)
	{
		// Création d'un nouvel objet Comment
		$comment = new Comment(array('content' => $content, 'dateCreation' => date('Y-m-d H:i:s'), 'userId' => $userId, 'postId' => $postId));
		// Ajout de l'objet Comment dans la base de données
		$this->commentsManager->add($comment);
	}
}