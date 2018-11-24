<?php $this->title = "Mon Blog - PostList"; ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('Content/startbootstrap-clean-blog-gh-pages/img/home-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Liste des posts</h1>
          <span class="subheading">Voici la liste des postes triés par date !</span>
        </div>
      </div>
    </div>
  </div>
</header>
    
<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

<?php foreach ($posts as $post):
    ?>
  <div class="post-preview">
    <a href="<?= "post/index/" . $this->sanitize($post->getId()) ?>">
      <h2 class="post-title">
        <?= $this->sanitize($post->getTitle()) ?>
      </h2>
      <h3 class="post-subtitle">
        <?= $this->sanitize($post->getChapo())  ?>
      </h3>
    </a>
    <p class="post-meta">Posté par
      <a href="#"><?= $this->sanitize($post->getUsername()) ?></a>
      le <time><?= $this->sanitize($post->getFormattedDateCreation()) ?></time>
      <br />Dernière mise à jour le <time><?= $this->sanitize($post->getFormattedDateUpdate()) ?></time>
    </p>
  </div>
  <hr>
<?php endforeach; ?>

      <!-- Pager -->
      <div class="clearfix">
        <a class="btn btn-primary float-right" href="#">Articles plus anciens &rarr;</a>
      </div>
    </div>
  </div>
</div>


