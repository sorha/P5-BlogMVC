<?php

use \Sorha\Framework\Controller;
use \Sorha\Framework\Configuration;

class ControllerContact extends Controller
{
    
    public function __construct()
    {
        
    }
    
    public function index()
    {
        $this->generateView(array());
    }
    
    public function sendMessage()
    {
        $name = strip_tags(htmlspecialchars($this->request->getParameter("name")));
        $email = strip_tags(htmlspecialchars($this->request->getParameter("email")));
        $phone = strip_tags(htmlspecialchars($this->request->getParameter("phone")));
        $message = strip_tags(htmlspecialchars($this->request->getParameter("message")));
        $submitted = strip_tags(htmlspecialchars($this->request->getParameter("submitted")));
        
        if(isset($submitted))
        {
            // Check for empty fields
            if(empty($name)      ||
                empty($email)     ||
                empty($phone)     ||
                empty($message)   ||
                !filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                // Exécution de l'action par défaut pour réafficher le formulaire de contact
                $this->executeAction("index");
            }
            
            // Create the email and send the message
            $to = Configuration::get("email");
            $email_subject = "Blog Formulaire de contact:  $name";
            $email_body = "Vous avez reçu un nouveau message à partir du formulaire de contact du blog.\n\n"."Details :\n\nNom: $name\nEmail: $email\nTelephone: $phone\nMessage:\n$message";
            $headers = "From:" . Configuration::get("noreply") . "\n";
            $headers .= "Reply-To: $email";
            mail($to,$email_subject,$email_body,$headers);
        }
        
        // Exécution de l'action par défaut pour réafficher le formulaire de contact
        $this->executeAction("index");
    }
}
