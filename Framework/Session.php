<?php

namespace Sorha\Framework;

/**
 * Classe modélisant la session.
 * Encapsule la superglobale PHP $_SESSION.
 */
class Session
{
    /**
     * Constructeur.
     * Démarre ou restaure la session
     */
    public function __construct()
    {
        session_start();
    }
    /**
     * Détruit la session actuelle
     */
    public function destroy()
    {
        session_destroy();
    }
    /**
     * Ajoute un attribut à la session
     *
     * @param string $name Nom de l'attribut
     * @param string $value Valeur de l'attribut
     */
    public function setAttribute($name, $value)
    {
        $name = htmlspecialchars($name);
        $value = htmlspecialchars($value);
        $_SESSION[$name] = $value;
    }
    /**
     * Renvoie vrai si l'attribut existe dans la session
     *
     * @param string $name Nom de l'attribut
     * @return bool Vrai si l'attribut existe et sa valeur n'est pas vide
     */
    public function existsAttribute($name)
    {
        return (isset($_SESSION[$name]) && $_SESSION[$name] != "");
    }
    /**
     * Renvoie la valeur de l'attribut demandé
     *
     * @param string $name Nom de l'attribut
     * @return string Valeur de l'attribut
     * @throws \Exception Si l'attribut n'existe pas dans la session
     */
    public function getAttribute($name)
    {
        if ($this->existsAttribute($name)) 
        {
            return $_SESSION[$name];
        }
        else 
        {
            throw new \Exception("Attribut '$name' absent de la session");
        }
    }
}
