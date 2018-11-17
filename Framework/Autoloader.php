<?php

class Autoloader
{
    
    static private $dirToLoad = array(
        'Framework/',
        'Model/Manager/',
        'Model/Entity/',
        'Controller/'
    );
    
    static public function register()
    {
        // Appel une fonction dans une class. On lui passe un tableau avec nom de la classe et classe à appeler
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
    
    static public function autoload($className) // BlogMVC\Framework\methodTest
    {
        // Affichage des classes chargés pour debug
        //echo $className . ' - ';

        /* Test Grafikart
        if(strpos($className, __NAMESPACE__ . '\\') === 0 ) // Si commence par BlogMVC\Framework\
        {
            $className = str_replace(__NAMESPACE__ . '\\', '', $className); // methodTest()
            $className = str_replace('\\', '/', $className);
            require $className . '.php';
        }*/

        /* Test avec namespace
        function autoload($className)
        {
            echo $className . ' ';

            $file = str_replace('\\', '/', $className);
            $file = $className . '.php';
            if (file_exists($file))
            {
                require_once $file;
            }
        }*/
        foreach(self::$dirToLoad as $dir)
        {
            $file = $dir . $className . '.php';
            if (file_exists($file))
            {
                require_once $file;
            }
        }
    }

}