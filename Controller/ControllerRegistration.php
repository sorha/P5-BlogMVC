<?php

use Sorha\Framework\Configuration;
use Sorha\Framework\Controller;
use BlogMVC\Model\Manager\UsersManager;
use BlogMVC\Model\Entity\User;

class ControllerRegistration extends Controller
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
    
    public function register()
    {
        if ($this->request->existsParameter("username") 
            && $this->request->existsParameter("email") 
            && $this->request->existsParameter("password") 
            && $this->request->existsParameter("confirmPassword"))
        {
            $username = $this->request->getParameter("username");
            $email = $this->request->getParameter("email");
            $password = $this->request->getParameter("password");
            $confirmPassword = $this->request->getParameter("confirmPassword");
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                throw new Exception("L'email est invalide.");
            }
            
            if($password === $confirmPassword)
            {
                $password = password_hash($password, PASSWORD_BCRYPT);
                $validationKey = md5(microtime(TRUE)*100000);
                
                $user = new User(array(
                    'username' => $username, 
                    'email' => $email, 
                    'password' => $password, 
                    'activated' => 0, 
                    'validationKey' => $validationKey, 
                    'userType' => 1, 
                    'dateCreation' => date('Y-m-d H:i:s')
                ));
                
                $this->usersManager->add($user);
                
                // Envoi d'un mail avec la clé de validation
                $to = $email;
                $email_subject = "Activer votre comptre du blog de Alexandre Depraetere";
                // Le lien devra être adapté en fonction du nom de domaine.
                //http://localhost/P5-Blog/index.php?controller=registration&action=validation&username='.urlencode($username).'&key='.urlencode($validationKey)
                $email_body = 'Bienvenue sur le blog de Alexandre Depraetere,
                    
                               Pour activer votre compte, veuillez cliquer sur le lien ci dessous
                               ou copier/coller dans votre navigateur internet.
                               
                               '.Configuration::get("domain").'registration/validation/' . urlencode($username) . '/' . urlencode($validationKey).'
                
                                ---------------
                                Ceci est un mail automatique, Merci de ne pas y répondre.';
                $headers = "From:" . Configuration::get("noreply") . "\n";
                $headers .= "Reply-To: $email";
                
                mail($to,$email_subject,$email_body,$headers);
                
                $this->redirect("Login");
            }
            else 
            {
                throw new Exception("Le mot de passe de confirmation ne correspond pas.");
            }
        }
    }
    
    // Lorsque l'utilisateur clique sur le lien du mail, valide son compte.
    public function validation()
    {
        if($this->request->existsParameter("username") && $this->request->existsParameter("key"))
        {
            $username = $this->request->getParameter("username");
            $key = $this->request->getParameter("key");
            $user = $this->usersManager->getByUsername($username);
            // Si la clef de validation de la BDD est la même que celle du mail
            if($user->getValidationKey() === $key)
            {
                $user->setActivated(1);
                $this->usersManager->update($user);
                $this->generateView();
            }
            else
            {
                throw new Exception("Clé de validation incorrect !");
            }
        }
    }
}
