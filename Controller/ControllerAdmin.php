<?php

use \BlogMVC\Model\Manager\PostsManager;
use \BlogMVC\Model\Manager\UsersManager;
use \BlogMVC\Model\Manager\CommentsManager;
use \BlogMVC\Model\Entity\Post;
use \BlogMVC\Model\Entity\User;
use \BlogMVC\Model\Entity\Comment;
use \Sorha\Framework\Configuration;

require_once 'ControllerSecured.php';

/** Controleur des actions d'administration. Hérite de ControllerSecured afin de vérifier l'authentification */
class ControllerAdmin extends ControllerSecured
{
    private $postsManager;
    private $usersManager;
    private $commentsManager;
    
    private $errorMessage = "";
    private $successMessage = "";
    
    public function __construct()
    {
        $this->postsManager = new PostsManager();
        $this->usersManager = new UsersManager();
        $this->commentsManager = new CommentsManager();
    }
    
    public function index()
    {
        // Verification si la personne est admin déjà faîtes dans ControllerSecured
        $username = $this->request->getSession()->getAttribute("username");
        $this->generateView(array('username' => $username, 'errorMessage' => $this->errorMessage ="", 'successMessage' => $this->successMessage));
    }
    
    //======================== Gestion des posts ======================
    public function postsManagement()
    {
        // Verification si la personne est admin déjà faîtes dans ControllerSecured
        $numberPosts = $this->postsManager->count();
        $username = $this->request->getSession()->getAttribute("username");
        
        $posts = $this->postsManager->getList();
        $this->generateView(array('posts' => $posts, 'numberPosts' => $numberPosts, 'username' => $username, 'errorMessage' => $this->errorMessage ="", 'successMessage' => $this->successMessage));
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
        
        $post = $this->postsManager->get($id);
        $post->setTitle($title);
        $post->setChapo($chapo);
        $post->setContent($content);
        
        $this->postsManager->update($post);
        
        $this->successMessage = "Post mise à jour avec succès !";
        $this->executeAction('postsManagement');
    }
    
    public function deletePost()
    {
        $id = $this->request->getParameter("id");
        $post = new Post(array('id' => $id));
        $this->postsManager->delete($post);
        
        $this->successMessage = "Post supprimé avec succès !";
        $this->executeAction('postsManagement');
    }
    
    public function addPost()
    {
        $title = $this->request->getParameter("title");
        $chapo = $this->request->getParameter("chapo");
        $userId = $this->request->getSession()->getAttribute("userId");
        $content = $this->request->getParameter("content");
        
        // Création d'un nouvel objet Post
        $post = new Post(array(
            'title' => $title, 
            'chapo' => $chapo, 
            'content' => $content, 
            'dateCreation' => date('Y-m-d H:i:s'), 
            'userId' => $userId
        ));
        // Ajout de l'objet Post dans la base de données
        $this->postsManager->add($post);
        
        // Exécution de l'action par défaut pour réafficher le menu d'administration
        $this->successMessage = "Post publié avec succès !";
        $this->executeAction("index");
    }
    
    //======================== Gestion des utilisateurs ======================
    public function usersManagement()
    {
        $users = $this->usersManager->getList();
        $this->generateView(array('users' => $users, 'errorMessage' => $this->errorMessage ="", 'successMessage' => $this->successMessage));
    }
    
    public function deleteUser()
    {
        $id = $this->request->getParameter("id");
        $user = new User(array('id' => $id));
        $this->usersManager->delete($user);
        
        $this->successMessage = "Utilisateur supprimé avec succès !";
        $this->executeAction('usersManagement');
    }
    
    public function userEdit()
    {
        $id = $this->request->getParameter("id");
        $user = $this->usersManager->get($id);
        $this->generateView(array('user' => $user));
    }
    
    public function updateUser()
    {
        $id = $this->request->getParameter("id");
        $username = $this->request->getParameter("username");
        $email = $this->request->getParameter("email");
        $userType = $this->request->getParameter("userType");
        
        $user = $this->usersManager->get($id);
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setUserType($userType);
        
        $this->usersManager->update($user);
        
        $this->successMessage = "Utilisateur mise à jour avec succès !";
        $this->executeAction('usersManagement');
    }
    
    public function resetPassword()
    {
        $id = $this->request->getParameter("id");
        $user = $this->usersManager->get($id);
        // On génére un nouveau token qu'on attribue à l'utilisateur
        $validationKey = md5(microtime(TRUE)*100000);
        $user->setValidationKey($validationKey);
        $this->usersManager->update($user);
        
        // Création et envoie de l'email
        $to = $user->getEmail();
        $email_subject = "Réinitialisation de votre mot de passe";
        $email_body = 'Blog de Alexandre Depraetere.\n\n'
                    . 'Bonjour ' . $user->getUsername()
                    . ', veuillez cliquer sur le lien ci-dessous afin de réinitialiser votre mot de passe.\n\n '
                    . Configuration::get("domain") . 'login/reset/' . urlencode($user->getUsername()) . '/' . urlencode($user->getValidationKey())
                    . '
                        ---------------
                       Ceci est un mail automatique, Merci de ne pas y répondre.';
        
        $headers = "From:" . Configuration::get("noreply") . "\n";
        $headers .= "Reply-To:" . $user->getEmail();
        mail($to,$email_subject,$email_body,$headers);
        
        $this->successMessage = "Mail de réinitialisation de mot de passe envoyé avec succès !";
        $this->executeAction('usersManagement');
    }
    
    //======================== Gestion des commentaires ======================
    public function commentsManagement()
    {
        $comments = $this->commentsManager->getDisabledList();
        $this->generateView(array('comments' => $comments, 'errorMessage' => $this->errorMessage ="", 'successMessage' => $this->successMessage));
    }
    
    public function enableComment()
    {
        $id = $this->request->getParameter("id");
        
        $comment = $this->commentsManager->get($id);
        $comment->setDisabled(0);
        
        $this->commentsManager->update($comment);
        
        $this->successMessage = "Commentaire activé avec succès !";
        $this->executeAction('commentsManagement');
    }
    
    public function deleteComment()
    {
        $id = $this->request->getParameter("id");
        $comment = new Comment(array('id' => $id));
        $this->commentsManager->delete($comment);
        
        $this->successMessage = "Commentaire supprimé avec succès !";
        $this->executeAction('commentsManagement');
    }
}
