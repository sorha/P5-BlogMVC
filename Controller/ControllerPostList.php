<?php

//namespace BlogMVC\Controller;     Pas le droit de mettre de namespace sinon la creation dynamique de contrôleur dans le Router du Framework ne fonctionne plus

use \Sorha\Framework\Controller;
use \BlogMVC\Model\Manager\PostsManager;

class ControllerPostList extends Controller
{
	private $postsManager;

	public function __construct()
	{
		$this->postsManager = new PostsManager();
	}

	// Affiche la liste de tous les posts du blog
	public function index() 
	{
		$posts = $this->postsManager->getList();
		$this->generateView(array('posts' => $posts));
    }

}