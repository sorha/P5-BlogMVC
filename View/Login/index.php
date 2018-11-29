<?php $this->title = "Mon Blog - Connexion" ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('Content/startbootstrap-clean-blog-gh-pages/img/home-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Connexion</h1>
          <span class="subheading">Veuillez vous authentifier avec vos identifiants de connexion</span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
    <p class="help-block text-danger"><?= $errorMessage ?></p>
      
      <form method="post" action="login/login" id="contactForm" novalidate>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label for="username">Nom d'utilisateur</label>
            <input name="username" type="text" class="form-control" placeholder="Nom d'utilisateur" id="username" required data-validation-required-message="Veuillez renseigner ce champ.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label for="password">Mot de passe</label>
            <input name="password" type="password" class="form-control" placeholder="Mot de passe" id="password" required data-validation-required-message="Veuillez renseigner ce champ.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        
        <p><a href="login/resetEmail">Mot de passe oublié ?</a></p>
        
        <br>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" name="submitted" class="btn btn-primary" value="submitted">Connexion</button>
        </div>
      </form>
    </div>
  </div>
</div>