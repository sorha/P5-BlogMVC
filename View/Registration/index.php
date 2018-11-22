<?php $this->title = "Mon Blog - Inscription" ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('Content/startbootstrap-clean-blog-gh-pages/img/home-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Inscription</h1>
          <span class="subheading">Inscrivez-vous au site en complétant le formulaire ci-dessous</span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      
      <form method="post" action="registration/register" id="contactForm" novalidate>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Nom d'utilisateur</label>
            <input name="username" type="text" class="form-control" placeholder="Nom d'utilisateur" id="username" required data-validation-required-message="Please enter your username.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Email</label>
            <input name="email" type="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Please enter your email">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Mot de passe</label>
            <input name="password" type="password" class="form-control" placeholder="Mot de passe" id="password" required data-validation-required-message="Please enter your password.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Confirmation du mot de passe</label>
            <input name="confirmPassword" type="password" class="form-control" placeholder="Confirmation du mot de passe" id="confirmPassword" required data-validation-required-message="Please confirm your password.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        
        <br>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" name="submitted" class="btn btn-primary" value="submitted" id="sendMessageButton">Je m'inscris</button>
        </div>
      </form>
    </div>
  </div>
</div>