<?php

namespace BlogMVC\Model\Manager;

use \Sorha\Framework\Model;
use \BlogMVC\Model\Entity\Comment;

class CommentsManager extends Model
{
    public function getList($idPost)
    {
        $sql = 'SELECT comment.id, content, comment.date_creation, user_id, post_id, username, disabled FROM comment INNER JOIN user ON comment.user_id=user.id WHERE post_id = ? AND disabled = 0 ORDER BY comment.date_creation DESC';
        $comments = $this->executeRequest($sql, array($idPost));

        $commentsTab = [];
        while ($data = $comments->fetch(\PDO::FETCH_ASSOC)) // Tant qu'il y'a des lignes qui doivent �tre fetch, les placer dans $data.
        {
            $commentsTab[] = new Comment($data); // Rajouter un nouvel objet Comment cr�e � partir des donnees dans le tableau $commentsTab
        }

        return $commentsTab; // Renvoi un tableau d'objet Comment
    }
    
    public function getDisabledList()
    {
        $sql = 'SELECT comment.id, content, comment.date_creation, user_id, post_id, username, disabled FROM comment INNER JOIN user ON comment.user_id=user.id WHERE disabled = 1 ORDER BY comment.date_creation DESC';
        $comments = $this->executeRequest($sql, array());
        
        $commentsTab = [];
        while ($data = $comments->fetch(\PDO::FETCH_ASSOC)) // Tant qu'il y'a des lignes qui doivent �tre fetch, les placer dans $data.
        {
            $commentsTab[] = new Comment($data); // Rajouter un nouvel objet Comment cr�e � partir des donnees dans le tableau $commentsTab
        }
        
        return $commentsTab; // Renvoi un tableau d'objet Comment
    }

    public function get($id)
    {
        $sql = 'SELECT comment.id, content, comment.date_creation, user_id, post_id, username, disabled FROM comment INNER JOIN user ON comment.user_id=user.id WHERE comment.id = ?';
        $comment = $this->executeRequest($sql, array($id));

        if ($comment->rowCount() > 0)
        {
            $data = $comment->fetch(\PDO::FETCH_ASSOC);
            return new Comment($data);
        }
        else
        {
            throw new \Exception("Aucun commentaire ne correspond à l'identifiant '$id'");
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
        $sql = 'UPDATE comment SET content = ?, date_creation = ?, user_id = ?, post_id = ?, disabled = ? WHERE id = ?';
        $this->executeRequest($sql, array($comment->getContent(), $comment->getDateCreation(), $comment->getUserId(), $comment->getPostId(), $comment->getDisabled(), $comment->getId() ));
    }
    
    public function enable(Comment $comment)
    {
        $sql = 'UPDATE comment SET disabled = ? WHERE id= ?';
        $this->executeRequest($sql, array($comment->getDisabled(), $comment->getId() ));
    }
}
