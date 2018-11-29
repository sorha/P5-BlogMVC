<?php $this->title = "Mon Blog - Mot de passe oublié" ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('Content/startbootstrap-clean-blog-gh-pages/img/home-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Mot de passe oublié</h1>
          <span class="subheading">Insérer l'email de votre compte afin de recevoir un mail de réinitialisation</span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      
      <form method="post" action="login/resetPassword" id="contactForm" novalidate>
        
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Email</label>
            <input name="email" type="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Veuillez renseigner ce champ." data-validation-email-message="Adresse email invalide">
            <p class="help-block text-danger"></p>
          </div>
        </div>
                
        <br>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" name="submitted" class="btn btn-primary" value="submitted" id="sendMessageButton">Je réinitialise mon mot de passe</button>
        </div>
      </form>
    </div>
  </div>
</div>