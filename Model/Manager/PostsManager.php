<?php

namespace BlogMVC\Model\Manager;

use \Sorha\Framework\Model;
use \BlogMVC\Model\Entity\Post;

//require_once 'Model/Entity/Post.php';

class PostsManager extends Model
{
    /**
     * 
     * @return array|Post
     */
    public function getList()
    {
        $sql = 'SELECT post.id, title, chapo, post.date_creation, post.date_update, user_id, content, user.username FROM post INNER JOIN user ON post.user_id=user.id ORDER BY date_creation DESC';
        $posts = $this->executeRequest($sql);
        $postsTab = [];
        while ($data = $posts->fetch(\PDO::FETCH_ASSOC))
        {
            array_push($postsTab, new Post($data));
        }
        return $postsTab;
    }
    
    public function get($idPost)
    {
        $sql = 'SELECT post.id, title, chapo, post.date_creation, post.date_update, user_id, content, user.username FROM post INNER JOIN user ON post.user_id=user.id WHERE post.id = ?';
        $post = $this->executeRequest($sql, array($idPost));

        if ($post->rowCount() == 1)
        {
            $data = $post->fetch(\PDO::FETCH_ASSOC); // Récupération du resultat de la requête en un tableau associatif.
            return new Post($data); // Renvoi un objet Post crée à partir des données.
        }
        else
        {
            throw new \Exception("Aucun post ne correspond à l'identifiant '$idPost'");
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
        $sql = 'UPDATE post SET title = ?, chapo = ?, content = ? WHERE id = ?';
        $this->executeRequest($sql, array($post->getTitle(), $post->getChapo(), $post->getContent(), $post->getId() ));
    }
    
    /** Renvoi le nombre de posts du site */
    public function count()
    {
        $sql = 'SELECT COUNT(*) as numberPosts FROM post';
        $result = $this->executeRequest($sql);
        $line = $result->fetch(); // Resultat comporte toujours une ligne
        
        return $line['numberPosts'];
    }
}
