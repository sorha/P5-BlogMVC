<?php

use \BlogMVC\Model\Manager\PostsManager;
use \BlogMVC\Model\Manager\UsersManager;
use \BlogMVC\Model\Manager\CommentsManager;
use \BlogMVC\Model\Entity\Post;
use \BlogMVC\Model\Entity\User;
use \BlogMVC\Model\Entity\Comment;


require_once 'ControllerSecured.php'; // Pas de namespace utilisé car sinon casse le système de création automatique de controller

/** Controleur des actions d'administration. Hérite de ControllerSecured afin de vérifier l'authentification */
class ControllerAdmin extends ControllerSecured
{
    private $postsManager;
    private $usersManager;
    private $commentsManager;
    
    public function __construct()
    {
        $this->postsManager = new PostsManager();
        $this->usersManager = new UsersManager();
        $this->commentsManager = new CommentsManager();
    }
    
    public function index()
    {
        // Verification si la personne est admin déjà faîtes dans ControllerSecured
        $numberPosts = $this->postsManager->count();
        $username = $this->request->getSession()->getAttribute("username");
        $this->generateView(array('numberPosts' => $numberPosts, 'username' => $username));
    }
    
    // Gestion des posts
    public function postsManagement()
    {
        // Verification si la personne est admin déjà faîtes dans ControllerSecured
        $numberPosts = $this->postsManager->count();
        $username = $this->request->getSession()->getAttribute("username");
        
        $posts = $this->postsManager->getList();
        $this->generateView(array('posts' => $posts, 'numberPosts' => $numberPosts, 'username' => $username));
    }
    
    public function postEdit()
    {
        $id = $this->request->getParameter("id");
        $post = $this->postsManager->get($id);
        $this->generateView(array('post' => $post));
    }
    
    public function updatePost()
    {
        $id = $this->request->getParameter("id");
        $title = $this->request->getParameter("title");
        $chapo = $this->request->getParameter("chapo");
        $content = $this->request->getParameter("content");
        
        // Création d'un nouvel objet Post
        $post = new Post(array('id' => $id, 'title' => $title, 'chapo' => $chapo, 'content' => $content));
        // Ajout de l'objet Post dans la base de données
        $this->postsManager->update($post);
        $this->redirect('admin', 'postsManagement');
    }
    
    public function deletePost()
    {
        $id = $this->request->getParameter("id");
        $post = new Post(array('id' => $id));
        $this->postsManager->delete($post);
        $this->redirect('admin', 'postsManagement');
    }
    
    public function addPost()
    {
        $title = $this->request->getParameter("title");
        $chapo = $this->request->getParameter("chapo");
        $userId = $this->request->getSession()->getAttribute("userId");
        $content = $this->request->getParameter("content");
        
        // Création d'un nouvel objet Post
        $post = new Post(array('title' => $title, 'chapo' => $chapo, 'content' => $content, 'dateCreation' => date('Y-m-d H:i:s'), 'userId' => $userId));
        // Ajout de l'objet Post dans la base de données
        $this->postsManager->add($post);
        
        // Exécution de l'action par défaut pour réafficher le menu d'administration
        $this->executeAction("index");
    }
    
    // Gestion des utilisateurs
    public function usersManagement()
    {
        $users = $this->usersManager->getList();
        $this->generateView(array('users' => $users));
    }
    
    public function deleteUser()
    {
        $id = $this->request->getParameter("id");
        $user = new User(array('id' => $id));
        $this->usersManager->delete($user);
        $this->redirect('admin', 'usersManagement');
    }
    
    // Gestion des commentaires
    public function commentsManagement()
    {
        $comments = $this->commentsManager->getDisabledList();
        $this->generateView(array('comments' => $comments));
    }
    
    public function enableComment()
    {
        $id = $this->request->getParameter("id");
        $comment = new Comment(array('id' => $id, 'disabled' => 0));
        $this->commentsManager->enable($comment);
        $this->redirect('admin', 'commentsManagement');
    }
    
    public function deleteComment()
    {
        $id = $this->request->getParameter("id");
        $comment = new Comment(array('id' => $id));
        $this->commentsManager->delete($comment);
        $this->redirect('admin', 'commentsManagement');
    }
}
