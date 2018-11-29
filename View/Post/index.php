<?php $this->title = "Mon Blog - " . $this->sanitize($post->getTitle()) ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('Content/startbootstrap-clean-blog-gh-pages/img/home-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-heading">
          <h1><?= $this->sanitize($post->getTitle()) ?></h1>
          <h2 class="subheading"><?= $this->sanitize($post->getChapo()) ?></h2>
          <span class="meta">Posté par
            <a href="#"><?= $this->sanitize($post->getUsername()) ?></a>
            le <time><?= $this->sanitize($post->getFormattedDateCreation()) ?></time>
            <br />Dernière mise à jour le <time><?= $this->sanitize($post->getFormattedDateUpdate()) ?></time>
          </span>
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

<?php 
    if(isset($_SESSION['userType']))
    {
?>
<!-- Ajout d'un commentaire -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <p>Ajouter un commentaire :</p>
      <form method="post" action="post/addComment" name="sentMessage" id="commentForm" novalidate>
        
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Votre commentaire</label>
            <textarea name="content" rows="3" class="form-control" placeholder="Votre commentaire" id="content" required data-validation-required-message="Veuillez renseigner ce champ."></textarea>
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <br>
        
        <input type="hidden" name="id" value="<?= $this->sanitize($post->getId()) ?>" required/>
        
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" value="submitted" class="btn btn-primary" id="sendMessageButton">Commenter</button>
        </div>
        
      </form>
    </div>
  </div>
</div>
<?php 
    }
    else 
    {
        
?>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <p>Veuillez vous connectez pour publier un commentaire</p>
    </div>
  </div>
</div>
<?php 
    }
?>
<hr />

<!--  Commentaires -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <p>Commentaires du post "<?= $this->sanitize($post->getTitle()) ?>" :</p>
        <!-- Affichage des commenaires -->
        <?php foreach ($comments as $comment): ?>
            <div class="card bg-light mb-3">
            	<div class="card-header">
            		<?= $this->sanitize($comment->getUsername()) ?> a commenté le <?= $this->sanitize($comment->getFormattedDateCreation()) ?> :
            	</div>
          		<div class="card-body">
                	<?= $this->sanitize($comment->getContent()) ?>
                </div>
            </div>
            <br />
        <?php endforeach; ?>
    </div>
  </div>
</div>