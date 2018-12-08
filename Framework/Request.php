<?php
namespace Sorha\Framework;

// A pour rôle de modéliser une requête
class Request 
{
	// Paramètres de la requête
	private $parameters;
	/** Objet session associé à la requête */
	private $session;

	public function __construct($parameters)
	{
		$this->parameters = $parameters;
		$this->session = new Session();
	}
	
	public function getSession()
	{
	    return $this->session;
	}

	// Renvoie vrai si le paramètre existe dans la requête
	public function existsParameter($name)
	{
		return (!empty($this->parameters[$name]));
	}

	// Renvoie la valeur du paramètre demandé
	public function getParameter($name)
	{
		if ($this->existsParameter($name))
		{
			return htmlspecialchars($this->parameters[$name]);
		}
		else 
		{
			throw new \Exception("Paramètre '$name' absent de la requête");
		}
	}
}