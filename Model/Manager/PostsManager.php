<?php

require_once 'Framework/Model.php';

class PostsManager extends Model
{
    public function getList()
    {
        $sql = 'SELECT id, title, chapo, date_creation, date_update, user_id, content FROM post ORDER BY date_creation DESC';
        $posts = $this->executeRequest($sql);

        return $posts;
    }

    public function get($idPost)
    {
        $sql = 'SELECT id, title, chapo, date_creation, date_update, user_id, content FROM post WHERE id = ?';
        $post = $this->executeRequest($sql, array($idPost));

        if ($post->rowCount() > 0)
        {
            $data = $post->fetch(PDO::FETCH_ASSOC); // Récupération du resultat de la requête en un tableau associatif.
            return new Post($data); // Renvoi un objet Post crée à partir des données.
        }
        else
        {
            throw new Exception("Aucun post ne correspond à l'identifiant '$idPost'");
        }
    }

    public function add(Post $post)
    {
        $sql = 'INSERT INTO post(title, chapo, date_creation, user_id, content) VALUES(?, ?, ?, ?, ?)';
        $this->executeRequest($sql, array($post->getTitle(), $post->getChapo(), $post->getDateCreation(), $post->getUserId(), $post->getContent() ));
    }

    public function delete(Post $post)
    {
        $sql = 'DELETE FROM post WHERE id = ?';
        $this->executeRequest($sql, array($post->getId() ));
    }

    public function update(Post $post)
    {
        $sql = 'UPDATE post SET title = ?, chapo = ?, date_creation = ?, user_id = ?, content = ? WHERE id = ?';
        $this->executeRequest($sql, array($post->getTitle(), $post->getChapo(), $post->getDateCreation(), $post->getUserId(), $post->getContent(), $post->getId() ));
    }
}