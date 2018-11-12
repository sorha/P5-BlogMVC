<?php $this->title = "Mon Blog - " . $this->$post['title']; ?>

<article>
    <header>
        <h1 class="titreBillet"><?= $this->$billet['title'] ?></h1>
        <time><?= $post['dateCreation'] ?></time>
    </header>
    <p><?= $post['content'] ?></p>
</article>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $post['title'] ?></h1>
</header>
<?php foreach ($comments as $comment): ?>
    <p><?= $comment['userId'] ?> dit :</p>
    <p><?= $comment['content'] ?></p>
<?php endforeach; ?>
<hr />
<form method="post" action="post/addComment">
    <input id="auteur" name="author" type="text" placeholder="Votre pseudo" 
           required /><br />
    <textarea id="txtCommentaire" name="content" rows="4" 
              placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="id" value="<?= $post['id'] ?>" />
    <input type="submit" value="Comment" />
</form>