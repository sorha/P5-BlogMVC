<?php

use \Sorha\Framework\Controller;
use \Sorha\Framework\Configuration;

class ControllerContact extends Controller
{
    private $errorMessage = "";
    private $successMessage = "";
    
    public function index()
    {
        $this->generateView(array('errorMessage' => $this->errorMessage, 'successMessage' => $this->successMessage));
    }
    
    public function sendMessage()
    {
        $name = strip_tags(htmlspecialchars($this->request->getParameter("name")));
        $email = strip_tags(htmlspecialchars($this->request->getParameter("email")));
        $message = strip_tags(htmlspecialchars($this->request->getParameter("message")));
        $submitted = strip_tags(htmlspecialchars($this->request->getParameter("submitted")));
        
        if(isset($submitted))
        {
            if(empty($name) || empty($email) || empty($message) || !filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                $this->errorMessage = 'Un champs n\'a pas été rempli correctement !';
                $this->executeAction("index");
            }
            
            $to = Configuration::get("email");
            $email_subject = "Blog Formulaire de contact:  $name";
            $email_body = "Vous avez reçu un nouveau message à partir du formulaire de contact du blog.\n\n"."Details :\n\nNom: $name\nEmail: $email\nMessage:\n$message";
            $headers = "From:" . Configuration::get("noreply") . "\n";
            $headers .= "Reply-To: $email";
            mail($to,$email_subject,$email_body,$headers);
            
            $this->successMessage = 'Message envoyé avec succès !';
        }
        
        // Exécution de l'action par défaut pour réafficher le formulaire de contact
        $this->executeAction("index");
    }
}
