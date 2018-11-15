<?php $this->title = "Mon Blog - Erreur" ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('Content/startbootstrap-clean-blog-gh-pages/img/home-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Une erreur est survenue</h1>
          <span class="subheading">En cas d'erreur récurrente, veuillez envoyer le message ci-dessous à un administrateur</span>
        </div>
      </div>
    </div>
  </div>
</header>

<!--  Content  -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <p><?= $this->sanitize($msgError) ?></p>
    </div>
  </div>
</div>