<?php

abstract class Model 
{
    private $db;

    protected function executeRequest($sql, $params = null)
    {
        if ($params == null)
        {
            $result = $this->getDb()->query($sql); // Exécution directe
        }
        else 
        {
            $result = $this->getDb()->prepare($sql);  // Requête préparée
            $result->execute($params);
        }

        return $result;
    }
    
    private function getDb()
    {
        if ($this->db == null)
        {
            // Connexion à la base de données
            $this->db = new PDO('mysql:host=localhost;dbname=p5blog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }

        return $this->db;
    }
}