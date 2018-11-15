<?php $this->title = "Mon Blog - " . $this->sanitize($post->getTitle()) ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('Content/startbootstrap-clean-blog-gh-pages/img/post-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-heading">
          <h1><?= $this->sanitize($post->getTitle()) ?></h1>
          <h2 class="subheading"><?= $this->sanitize($post->getChapo()) ?></h2>
          <span class="meta">Posté par
            <a href="#"><?= $this->sanitize($post->getUserId()) ?></a>
            le <time><?= $this->sanitize($post->getDateCreation()) ?></time> | Mise à jour le <time><?= $this->sanitize($post->getDateUpdate()) ?></time></span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Post Content -->
<article>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p><?= $this->sanitize($post->getContent()) ?></p>
      </div>
    </div>
  </div>
</article>

<!--  Commentaires -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <p>Réponses à "<?= $this->sanitize($post->getTitle()) ?>" :</p>
<!-- Affichage des commenaires -->
<?php foreach ($comments as $comment): ?>
    <p><?= $this->sanitize($comment->getUserId()) ?> a dit :</p>
    <p><?= $this->sanitize($comment->getContent()) ?></p>
<?php endforeach; ?>
    </div>
  </div>
</div>

<hr />

<!-- Ajout d'un commentaire -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <p>Ajouter un commentaire :</p>
      <form methode="post" action="post/addComment" name="sentMessage" id="contactForm" novalidate>
        
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Votre commentaire</label>
            <textarea name="content" rows="5" class="form-control" placeholder="Votre commentaire" id="message" required data-validation-required-message="Please enter a message."></textarea>
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <br>
        
        <input type="hidden" name="id" value="<?= $this->sanitize($post->getId()) ?>" required/>
        
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Commenter</button>
        </div>
        
      </form>
    </div>
  </div>
</div>