<?php
//TODO Vérification du type/formatage des données dans les setters.
class User 
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $activated;
    private $validationKey;
    private $userType;
    private $dateCreation;

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
    public function getUsername() { return $this->username; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }
    public function getActivated() { return $this->activated; }
	public function getValidationKey() { return $this->validationKey; }
	public function getUserType() { return $this->userType; }
	public function getDateCreation() { return $this->dateCreation; }

    public function setId($id) 
    {
    	$this->id = $id;
    }

    public function setUsername($username) 
    {
    	$this->username = $username;
    }

    public function setEmail($email) 
    {
    	$this->email = $email;
    }

    public function setPassword($password) 
    {
    	$this->password = $password;
    }

    public function setActivated($activated) 
    {
    	$this->activated = $activated;
    }

    public function setValidationKey($validationKey)
    {
    	$this->validationKey = $validationKey;
    }

    public function setUserType($userType)
    {
    	$this->userType = $userType;
    }

    public function setDateCreation($dateCreation)
    {
    	$this->dateCreation = $dateCreation;
    }
}