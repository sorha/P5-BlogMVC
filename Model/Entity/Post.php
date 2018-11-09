<?php
//TODO Vérification du type/formatage des données dans les setters.
class Post 
{
    private $id;
    private $title;
    private $chapo;
    private $dateCreation;
    private $dateUpdate;
    private $userId;
    private $content;

    public function __construct(array $data)
    {
    	$this->hydrate($data);
    }

    public function hydrate(array $data)
    {
    	// Hydratation dynamique (Appel d'une méthode dont le nom n'est pas connu à l'avance).
		foreach ($data as $key => $value)
		{
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
    public function getTitle() { return $this->title; }
    public function getChapo() { return $this->chapo; }
    public function getDateCreation() { return $this->dateCreation; }
    public function getDateUpdate() { return $this->dateUpdate; }
	public function getUserId() { return $this->userId; }
	public function getContent() { return $this->content; }

    public function setId($id) 
    {
    	$this->id = $id;
    }

    public function setTitle($title) 
    {
    	$this->title = $title;
    }

    public function setChapo($chapo) 
    {
    	$this->chapo = $chapo;
    }

    public function setDateCreation($dateCreation) 
    {
    	$this->dateCreation = $dateCreation;
    }

    public function setDateUpdate($dateUpdate) 
    {
    	$this->dateUpdate = $dateUpdate;
    }

    public function setUserId($userId)
    {
    	$this->userId = $userId;
    }

    public function setContent($content)
    {
    	$this->content = $content;
    }
}