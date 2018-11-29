<?php

use Sorha\Framework\Configuration;
use Sorha\Framework\Controller;
use BlogMVC\Model\Manager\UsersManager;

class ControllerLogin extends Controller
{
    private $usersManager;
    private $_errorMessage;
    
    public function __construct()
    {
        $this->_errorMessage ="";
        $this->usersManager = new UsersManager();
    }
    
    public function index()
    {
        $this->generateView(array('errorMessage' => $this->_errorMessage));
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
                $user = $this->usersManager->getByUsername($username);
                if ($user->getActivated() == '1')
                {
                    $this->request->getSession()->setAttribute("userId", $user->getId());
                    $this->request->getSession()->setAttribute("username", $user->getUsername());
                    if($user->getUserType() === '2')
                    {
                        $this->request->getSession()->setAttribute("userType", 'admin');
                        $this->redirect("Admin");
                    }
                    else
                    {
                        $this->request->getSession()->setAttribute("userType", 'member');
                        $this->redirect("Home");
                    }

                }
                else
                {
                    // Si le compte n'est pas activé
                    $this->_errorMessage = 'Compte non-activé : Veuillez activer votre compte via le mail qui vous a été envoyé.';
                    $this->executeAction("index");
                }
            }
            else 
            {
                // Si les identifiants sont incorrects
                $this->_errorMessage = 'Login ou mot de passe incorrects';
                $this->executeAction("index");
            }
        }
        else 
        {
            // Si un des champs est vide
            $this->_errorMessage = 'Login et/ou mot de passe non défini';
            $this->executeAction("index");
        }
    }
    
    public function logout()
    {
        $this->request->getSession()->destroy();
        $this->redirect("Home");
    }
    
    public function resetEmail()
    {
        $this->generateView();
    }
    
    public function resetPassword()
    {
        if($this->request->existsParameter("email"))
        {
            $email = $this->request->getParameter("email");
            $user = $this->usersManager->getByEmail($email);
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
                    $this->redirect('Login');
        }
    }
    
    public function reset()
    {
        if ($this->request->existsParameter("username") && $this->request->existsParameter("key"))
        {
            $username = $this->request->getParameter("username");
            $key = $this->request->getParameter("key");
            
            $user = $this->usersManager->getByUsername($username);
            // Si la clef de validation de la BDD est la même que celle du mail
            if($user->getValidationKey() === $key)
            {
                // Si le formulaire a été transmis
                if ($this->request->existsParameter("resetSubmitted"))
                {
                    $password = $this->request->getParameter("password");
                    $confirmPassword = $this->request->getParameter("confirmPassword");
                    if ($password === $confirmPassword)
                    {
                        $password = password_hash($password, PASSWORD_BCRYPT);
                        $user->setPassword($password);
                        // On change aussi la clef de validation
                        $validationKey = md5(microtime(TRUE)*100000);
                        $user->setValidationKey($validationKey);
                        
                        $this->usersManager->update($user);
                        $this->redirect("Login");
                    }
                    else { throw new \Exception("La confirmation du mot de passe ne correspondent pas !"); }
                }
                else
                {
                    // Sinon si les nouveaux password n'ont pas encore été transmis par formulaire :
                    $this->generateView(array('user' => $user));
                }
            }
            else
            {
                throw new \Exception("Clé de validation incorrect !");
            }
        }
        else
        {
            $this->redirect("Login");
        }
    }
}
