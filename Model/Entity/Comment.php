<?php

namespace BlogMVC\Model\Entity;

use \Sorha\Framework\Entity;

class Comment extends Entity
{
    private $id;
    private $content;
    private $dateCreation;
    private $userId;
    private $postId;
    private $username;
    private $disabled;

    public function getId() { return $this->id; }
    public function getContent() { return $this->content; }
    public function getDateCreation() { return $this->dateCreation; }
    public function getUserId() { return $this->userId; }
    public function getPostId() { return $this->postId; }
    
    public function getFormattedDateCreation() { return $this->getFormattedDateTime($this->dateCreation); }
    
    public function getUsername() { return $this->username; }
    public function getDisabled() { return $this->disabled; }
    
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;
    }

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
