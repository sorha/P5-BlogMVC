<?php

// A pour rôle de modéliser une requête
class Request 
{

	// Paramètres de la requête
	private $parameters;

	public function __construct($parameters) 
	{
		$this->parameters = $parameters;
	}

	// Renvoie vrai si le paramètre existe dans la requête
	public function existsParameter($name) 
	{
		return (isset($this->parameters[$name]) && $this->parameters[$name] != "");
	}

	// Renvoie la valeur du paramètre demandé
	// Lève une exception si le paramètre est introuvable
	public function getParameter($name) 
	{
		if ($this->existsParameter($name)) 
		{
			return $this->parameters[$name];
		}
		else 
		{
			throw new Exception("Paramètre '$name' absent de la requête");
		}
	}
}