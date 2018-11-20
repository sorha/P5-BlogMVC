<?php $this->title = "Mon Blog - Administration" ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('Content/startbootstrap-clean-blog-gh-pages/img/home-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Administration</h1>
          <span class="subheading">Que voulez-vous faire aujourd'hui ? 👷</span>
          <br>
          <button type="button" class="btn btn-primary">Ajouter un post</button>
          <button type="button" class="btn btn-secondary">Modifier un post</button>
          <button type="button" class="btn btn-success">Supprimer un post</button>
          <button type="button" class="btn btn-danger">Modérer les commentaires</button>
          <button type="button" class="btn btn-warning">Supprimer un compte</button>
          <button type="button" class="btn btn-info">Info</button>
          <button type="button" class="btn btn-light">Light</button>
          <button type="button" class="btn btn-dark">Dark</button>
        </div>
      </div>
    </div>
  </div>
</header>

<!--  Content  -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <p>Bienvenue, <?= $this->sanitize($username) ?> ! Ce blog contient <?= $this->sanitize($numberPosts) ?> posts.</p>

      <h2>Ajouter un post</h2>
      
      <form method="post" action="admin/addPost" id="addPostForm" novalidate>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Titre</label>
            <input name="title" type="text" class="form-control" placeholder="Titre" id="titre" required data-validation-required-message="Please enter your title">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Chapo</label>
            <input name="chapo" type="text" class="form-control" placeholder="Chapo" id="chapo" required data-validation-required-message="Please enter your chapo">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Contenu</label>
            <textarea rows="10" name="content" type="text" class="form-control" placeholder="Content" id="content" required data-validation-required-message="Please enter your content"></textarea>
            <p class="help-block text-danger"></p>
          </div>
        </div>
        
        <br>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" name="submitted" class="btn btn-primary" value="submitted" id="sendMessageButton">Publier le post</button>
        </div>
      </form>
      
    </div>
  </div>
</div>