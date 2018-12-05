<?php $this->title = "Mon Blog  - Contact" ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('Content/startbootstrap-clean-blog-gh-pages/img/contact-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="page-heading">
          <h1>Contactez moi !</h1>
          <span class="subheading">Des questions ? J'ai les réponses.</span>
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
    <p class="help-block text-success"><?= $successMessage ?></p>
      <p>Voulez-vous entrer en contact? Remplissez le formulaire ci-dessous pour m'envoyer un message et je vous recontacterai dès que possible !</p>
      
      <form method="post" action="contact/sendMessage" name="sentMessage" id="contactForm" novalidate>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Nom</label>
            <input name="name" type="text" class="form-control" placeholder="Nom" id="name" required data-validation-required-message="Veuillez renseigner ce champ.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Email</label>
            <input name="email" type="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Veuillez renseigner ce champ." data-validation-email-message="Adresse email invalide">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Message</label>
            <textarea name="message" rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Veuillez renseigner ce champ."></textarea>
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <br>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" name="submitted" class="btn btn-primary" value="submitted" id="sendMessageButton">Envoyer</button>
        </div>
      </form>
      
    </div>
  </div>
</div>