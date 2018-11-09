<?php

require_once 'Model/Manager/PostsManager.php';
require_once 'View/View.php';

class ControllerPostList
{
	private $postsManager;

	public function __construct()
	{
		$this->postsManager = new PostsManager();
	}
	
	// Affiche la liste de tous les posts du blog
	public function postList()
	{
		$posts = $this->postsManager->getList();
		$view = new View('PostList');
		$view->generate(array('posts' => $posts));
	}

}