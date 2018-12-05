<?php $this->title = "Mon Blog - Réinitialisation" ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('Content/startbootstrap-clean-blog-gh-pages/img/home-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Réinitialisation du mot de passe</h1>
          <span class="subheading">Veuillez choisir un nouveau mot de passe</span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      
      <form method="post" action="login/reset" novalidate>
      
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label for="password">Nouveau mot de passe</label>
            <input name="password" type="password" class="form-control" placeholder="Nouveau mot de passe" id="password" required data-validation-required-message="Veuillez renseigner ce champ.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label for="confirmPassword">Confirmer le nouveau mot de passe</label>
            <input name="confirmPassword" type="password" class="form-control" placeholder="Confirmer le nouveau mot de passe" id="confirmPassword" required data-validation-required-message="Veuillez renseigner ce champ." data-validation-match-match="password" data-validation-match-message="Pas identique au mot de passe">
            <p class="help-block text-danger"></p>
          </div>	
        </div>
        
        <input type="hidden" name="username" value="<?= $this->sanitize($user->getUsername()) ?>" required/>
        <input type="hidden" name="key" value="<?= $this->sanitize($user->getValidationKey()) ?>" required/>
        
        <br>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" name="resetSubmitted" class="btn btn-primary" value="submitted">Changer le mot de passe</button>
        </div>
      </form>
    </div>
  </div>
</div>