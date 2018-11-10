<?php

require_once 'Configuration.php';

abstract class Model 
{
    private static $db;

    /**
     * Exécute une requête SQL
     * 
     * @param string $sql Requête SQL
     * @param array $params Paramètres de la requête
     * @return PDOStatement Résultats de la requête
     */
    protected function executeRequest($sql, $params = null)
    {
        if ($params == null)
        {
            $result = self::getDb()->query($sql); // Exécution directe
        }
        else 
        {
            $result = self::getDb()->prepare($sql);  // Requête préparée
            $result->execute($params);
        }

        return $result;
    }

    /**
     * Renvoie un objet de connexion à la BDD en initialisant la connexion au besoin
     * 
     * @return PDO Objet PDO de connexion à la BDD
     */
    private static function getDb()
    {
        if (self::db == null)
        {
            // Récupération des paramètres de configuration BD
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $password = Configuration::get("password");

            // Création de la connexion
            self::db = new PDO($dsn, $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));  
        }

        return self::db;
    }
}