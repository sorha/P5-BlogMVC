<?php

require_once 'Framework/Model.php';

class CommentsManager extends Model
{
    public function getList($idPost)
    {
        $sql = 'SELECT id, content, date_creation, user_id, post_id FROM comment WHERE post_id = ? ORDER BY date_creation DESC';
        $comments = $this->executeRequest($sql, array($idPost));

        /*TODO Que faire si l'id du post existe mais qu'il n'y a aucun commentaire associé au post ?
        Renvoyer un tableau vide ? Crér une méthode qui verifie que le post existe ? */
        if ($comments->rowCount() > 0) // Si la requête a renvoyer au moins une ligne
        {
            $commentsTab = [];
            while ($data = $comments->fetch(PDO::FETCH_ASSOC)) // Tant qu'il y'a des lignes qui doivent être fetch, les placer dans $data.
            {
                $commentsTab[] = new Comment($data); // Rajouter un nouvel objet Comment crée à partir des donnees dans le tableau $commentsTab
            }

            return $commentsTab // Renvoi un tableau d'objet Comment
        }
        else
        {
            throw new Exception("Aucun post ne correspond à l'identifiant '$idPost'");
        }
    }

    public function get($id)
    {
        $sql = 'SELECT id, content, date_creation, user_id, post_id FROM comment WHERE id = ?';
        $comment = $this->executeRequest($sql, array($id));

        if ($comment->rowCount() > 0)
        {
            $data = $comment->fetch(PDO::FETCH_ASSOC);
            return new Comment($data);
        }
        else
        {
            throw new Exception("Aucun commentaire ne correspond à l'identifiant '$id'");
        }
    }

    public function add(Comment $comment)
    {
        $sql = 'INSERT INTO comment(content, date_creation, user_id, post_id) VALUES(?, ?, ?, ?)';
        $this->executeRequest($sql, array($comment->getContent(), $comment->getDateCreation(), $comment->getUserId(), $comment->getPostId() ));
    }

    public function delete(Comment $comment)
    {
        $sql = 'DELETE FROM comment WHERE id = ?';
        $this->executeRequest($sql, array($comment->getId() ));
    }

    public function update(Comment $comment)
    {
        $sql = 'UPDATE comment SET content = ?, date_creation = ?, user_id = ?, post_id = ? WHERE id = ?';
        $this->executeRequest($sql, array($comment->getContent(), $comment->getDateCreation(), $comment->getUserId(), $comment->getPostId(), $comment->getId() ));
    }
}