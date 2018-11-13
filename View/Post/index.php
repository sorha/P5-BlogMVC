<?php $this->title = "Mon Blog - " . $this->sanitize($post['title']); ?>

<article>
    <header>
        <h1 class="titreBillet"><?= $this->sanitize($post['title']) ?></h1>
        <time><?= $this->sanitize($post['dateCreation']) ?></time>
    </header>
    <p><?= $this->sanitize($post['content']) ?></p>
</article>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $this->sanitize($post['title']) ?></h1>
</header>
<?php foreach ($comments as $comment): ?>
    <p><?= $this->sanitize($comment['userId']) ?> dit :</p>
    <p><?= $this->sanitize($comment['content']) ?></p>
<?php endforeach; ?>
<hr />
<form method="post" action="post/addComment">
    <input id="auteur" name="author" type="text" placeholder="Votre pseudo" 
           required /><br />
    <textarea id="txtCommentaire" name="content" rows="4" 
              placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="id" value="<?= $this->sanitize($post['id']) ?>" />
    <input type="submit" value="Comment" />
</form>