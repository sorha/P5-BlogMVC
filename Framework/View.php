<?php

class View 
{
    private $file;   // Nom du fichier associé à la vue
    private $title; // Titre de la vue (défini dans le fichier associé à la vue)
    
    public function __construct($action, $controller = "")
    {
        // Détermination du nom du fichier vue à partir de l'action et du contrôleur
        $file = "View/";
        if ($controller != "") 
        {
            // Chaque vue est stockée dans un sous-répertoire portant le nom du contrôleur associé à la vue
            $file = $file . $controller . "/";
        }
        // Chaque fichier vue ne contient plus le terme « view », mais porte directement le nom de l'action aboutissant à l'affichage de cette vue.
        $this->file = $file . $action . ".php";
    }
    
    // Génère et affiche la vue
    public function generate($data) 
    {
        // Génération de la partie spécifique de la vue
        $content = $this->generateFile($this->file, $data);
        // Génération du template commun utilisant la partie spécifique
        $view = $this->generateFile('View/template.php', array('title' => $this->title, 'content' => $content));

        echo $view; // Renvoi de la vue au navigateur
    }
    
    // Génère un fichier vue et renvoie le résultat produit
    private function generateFile($file, $data) 
    {
        if (file_exists($file)) 
        {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($data);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $file;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        else 
        {
            throw new Exception("Fichier '$file' introuvable");
        }
    }
}