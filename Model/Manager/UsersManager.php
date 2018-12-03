<?php

namespace BlogMVC\Model\Manager;

use \Sorha\Framework\Model;
use \BlogMVC\Model\Entity\User;

class UsersManager extends Model
{
    public function login($username, $password)
    {
        $sql = "SELECT id, password FROM user WHERE username = ?";
        $user = $this->executeRequest($sql, array($username));
        if($user->rowCount() == 1)
        {
            $user = $user->fetch(\PDO::FETCH_ASSOC);
            // Renvoi vrai si le mdp correspond
            return (password_verify($password, $user['password']));
        }
    }
    
    public function getList()
    {
        $sql = 'SELECT id, username, email, password, activated, validation_key, user_type, date_creation FROM user ORDER BY date_creation DESC';
        $users = $this->executeRequest($sql);

        $usersTab = [];
        while ($data = $users->fetch(\PDO::FETCH_ASSOC)) // Tant qu'il y'a des lignes qui doivent �tre fetch, les placer dans $data.
        {
            $usersTab[] = new User($data); // Rajouter un nouvel objet User cr�e � partir des donnees dans le tableau $usersTab
        }

        return $usersTab; // Renvoi un tableau d'objet User
    }
    
    /**
     * Renvoi un objet User qui existe dans la base de données.
     * 
     * @param int $id
     * @throws \Exception Si aucune identifiant ne correspond un utilisateur dans la base de données
     * @return User
     */
    public function get($id)
    {
        $sql = 'SELECT id, username, email, password, activated, validation_key, user_type, date_creation FROM user WHERE id = ?';
        $user = $this->executeRequest($sql, array($id));
        
        if ($user->rowCount() == 1)
        {
            $data = $user->fetch(\PDO::FETCH_ASSOC);
            return new User($data);
        }
        else
        {
            throw new \Exception("Aucun utilisateur ne correspond à l'identifiant '$id'");
        }
    }
    
    public function getByUsername($username)
    {
        $sql = 'SELECT id, username, email, password, activated, validation_key, user_type, date_creation FROM user WHERE username = ?';
        $user = $this->executeRequest($sql, array($username));

        if ($user->rowCount() == 1)
        {
            $data = $user->fetch(\PDO::FETCH_ASSOC);
            return new User($data);
        }
        else
        {
            throw new \Exception("Aucun utilisateur ne correspond à l'username '$username'");
        }
    }
    
    public function getByEmail($email)
    {
        $sql = 'SELECT id, username, email, password, activated, validation_key, user_type, date_creation FROM user WHERE email = ?';
        $user = $this->executeRequest($sql, array($email));
        
        if ($user->rowCount() == 1)
        {
            $data = $user->fetch(\PDO::FETCH_ASSOC);
            return new User($data);
        }
        else
        {
            throw new \Exception("Aucun utilisateur ne correspond à l'email '$email'");
        }
    }

    public function add(User $user)
    {
        $sql = 'INSERT INTO user(username, email, password, activated, validation_key, user_type, date_creation) VALUES(?, ?, ?, ?, ?, ?, ?)';
        $this->executeRequest($sql, array($user->getUsername(), $user->getEmail(), $user->getPassword(), $user->getActivated(), $user->getValidationKey(), $user->getUserType(), $user->getDateCreation() ));
    }

    public function delete(User $user)
    {
        $sql = 'DELETE FROM user WHERE id = ?';
        $this->executeRequest($sql, array($user->getId() ));
    }

    public function update(User $user)
    {
        $sql = 'UPDATE user SET username = ?, email = ?, password = ?, activated = ?, validation_key = ?, user_type = ?, date_creation = ? WHERE id = ?';
        $this->executeRequest($sql, array($user->getUsername(), $user->getEmail(), $user->getPassword(), $user->getActivated(), $user->getValidationKey(), $user->getUserType(), $user->getDateCreation(), $user->getId() ));
    }
}
