<?php
//TODO Vérification du type/formatage des données dans les setters.
class Comment 
{
    private $id;
    private $content;
    private $dateCreation;
    private $userId;
    private $postId;

    public function __construct(array $data)
    {
    	$this->hydrate($data);
    }

    public function hydrate(array $data)
    {
    	// Hydratation dynamique (Appel d'une méthode dont le nom n'est pas connu à l'avance).
		foreach ($data as $key => $value)
		{
		    // Transformation de underscore_case vers camelCase
		    $key = lcfirst(str_replace('_', '', ucwords($key, '_')));
			// On récupère le nom du setter correspondant à l'attribut.
			$method = 'set'.ucfirst($key);

			// Si le setter correspondant existe.
			if (method_exists($this, $method))
			{
				// On appelle le setter.
				$this->$method($value);
			}
		}
    }

    public function getId() { return $this->id; }
    public function getContent() { return $this->content; }
    public function getDateCreation() { return $this->dateCreation; }
    public function getUserId() { return $this->userId; }
    public function getPostId() { return $this->postId; }

    public function setId($id) 
    {
    	$this->id = $id;
    }

    public function setContent($content) 
    {
    	$this->content = $content;
    }

    public function setDateCreation($dateCreation) 
    {
    	$this->dateCreation = $dateCreation;
    }

    public function setUserId($userId) 
    {
    	$this->userId = $userId;
    }

    public function setPostId($postId) 
    {
    	$this->postId = $postId;
    }
}