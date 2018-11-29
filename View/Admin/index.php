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
          <a type="button" class="btn btn-primary" href="admin/index">Ajouter un post</a>
          <a type="button" class="btn btn-secondary" href="admin/postsManagement">Gérer les posts</a>
          <a type="button" class="btn btn-success" href="admin/usersManagement">Gérer les utilisateurs</a>
          <a type="button" class="btn btn-danger" href="admin/commentsManagement">Modérer les commentaires</a>
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
        <div class="control-group error">
          <div class="form-group floating-label-form-group controls">
            <label>Titre</label>
            <input name="title" type="text" class="form-control" placeholder="Titre" id="titre" required data-validation-required-message="Veuillez renseigner ce champ.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        
        <div class="control-group error">
          <div class="form-group floating-label-form-group controls">
            <label>Chapo</label>
            <input name="chapo" type="text" class="form-control" placeholder="Chapo" id="chapo" required data-validation-required-message="Veuillez renseigner ce champ.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        
        <div class="control-group error">
          <div class="form-group floating-label-form-group controls">
            <label>Contenu</label>
            <textarea rows="10" name="content" type="text" class="form-control" placeholder="Contenu" id="content" required data-validation-required-message="Veuillez renseigner ce champ."></textarea>
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