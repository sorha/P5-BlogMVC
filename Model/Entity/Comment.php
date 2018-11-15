<?php
require_once 'Framework/Entity.php';
//TODO Vérification du type/formatage des données dans les setters.
class Comment extends Entity
{
    private $id;
    private $content;
    private $dateCreation;
    private $userId;
    private $postId;

    public function getId() { return $this->id; }
    public function getContent() { return $this->content; }
    public function getDateCreation() { return $this->getFormattedDateTime($this->dateCreation); }
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