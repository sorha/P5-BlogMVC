<?php
//require_once 'Framework/Entity.php';
//TODO Vérification du type/formatage des données dans les setters.
class User extends Entity
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $activated;
    private $validationKey;
    private $userType;
    private $dateCreation;

    public function getId() { return $this->id; }
    public function getUsername() { return $this->username; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }
    public function getActivated() { return $this->activated; }
	public function getValidationKey() { return $this->validationKey; }
	public function getUserType() { return $this->userType; }
	public function getDateCreation() { return $this->getFormattedDateTime($this->dateCreation); }

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