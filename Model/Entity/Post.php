<?php

namespace BlogMVC\Model\Entity;

use Sorha\Framework\Entity;

class Post extends Entity
{
    private $id;
    private $title;
    private $chapo;
    private $dateCreation;
    private $dateUpdate;
    private $userId;
    private $content;
    private $username;

    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getChapo() { return $this->chapo; }
    public function getDateCreation() { return $this->dateCreation; }
    public function getDateUpdate() { return $this->dateUpdate; }
	public function getUserId() { return $this->userId; }
	public function getContent() { return $this->content; }
	
	public function getFormattedDateCreation() { return $this->getFormattedDateTime($this->dateCreation); }
	public function getFormattedDateUpdate() { return $this->getFormattedDateTime($this->dateUpdate); }
	
	public function getUsername() { return $this->username; }
	
	public function setUsername($username)
	{
	    $this->username = $username;
	}

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
