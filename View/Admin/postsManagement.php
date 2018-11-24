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
      
        <h2>Gestion des posts</h2>
        <p><i class="fas fa-search"></i> = Voir le post</p>  
        <p><i class="fas fa-pen"></i> = Editer le post</p>  
        <p><i class="fas fa-trash-alt"></i> = Supprimer le post</p>                                                                   
        <div class="table-responsive">      
            <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Date de création</th>
                <th>Date mise à jour</th>
                <th>Auteur</th>
                <th>Opérations</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($posts as $post): ?>
              <tr>
                <td><?= $this->sanitize($post->getId()) ?></td>
                <td><?= $this->sanitize($post->getTitle()) ?></td>
                <td><?= $this->sanitize($post->getDateCreation()) ?></td>
                <td><?= $this->sanitize($post->getDateUpdate()) ?></td>
                <td><?= $this->sanitize($post->getUsername()) ?></td>
                <td>
					<a class="btn btn-primary" href="post/index/<?= $this->sanitize($post->getId()) ?>" target="_blank">
						<i class="fas fa-search"></i>
					</a>
					<a class="btn btn-success" href="admin/postEdit/<?= $this->sanitize($post->getId()) ?>">
						<i class="fas fa-pen"></i>
					</a>
                	<a class="btn btn-danger" href="admin/deletePost/<?= $this->sanitize($post->getId()) ?>" onclick="return confirm('Attention cette action supprimera également les commentaires associés à ce post ! Êtes vous sûr ?')">
                		<i class="fas fa-trash-alt"></i>
                	</a>

                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
        </div>
      
    </div>
  </div>
</div>