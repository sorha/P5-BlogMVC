<?php

require_once 'Model/Model.php';

class UsersManager extends Model
{
    public function getList()
    {
        $sql = 'SELECT id, username, email, password, activated, validation_key, user_type, date_creation FROM user ORDER BY date_creation DESC';
        $users = $this->executeRequest($sql);

        $usersTab = [];
        while ($data = $users->fetch(PDO::FETCH_ASSOC)) // Tant qu'il y'a des lignes qui doivent être fetch, les placer dans $data.
        {
            $usersTab[] = new User($data); // Rajouter un nouvel objet User crée à partir des donnees dans le tableau $usersTab
        }

        return $usersTab // Renvoi un tableau d'objet User
    }

    public function get($id)
    {
        $sql = 'SELECT id, username, email, password, activated, validation_key, user_type, date_creation FROM user WHERE id = ?';
        $user = $this->executeRequest($sql, array($id));

        if ($user->rowCount() > 0)
        {
            $data = $user->fetch(PDO::FETCH_ASSOC);
            return new User($data);
        }
        else
        {
            throw new Exception("Aucun utilisateur ne correspond à l'identifiant '$id'");
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