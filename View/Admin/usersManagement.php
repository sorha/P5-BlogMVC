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
      
        <h2>Gestion des utilisateurs</h2>
        <p><i class="fas fa-search"></i> = Voir le profil</p>  
        <p><i class="fas fa-pen"></i> = Editer l'utilisateur</p>  
        <p><i class="fas fa-trash-alt"></i> = Supprimer l'utilisateur</p>
        <p><i class="fas fa-redo"></i> = Réinitialiser le mot de passe</p>                                                                    
        <div class="table-responsive">      
            <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>Id</th>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Compte activé</th>
                <th>Rôle</th>
                <th>Date inscription</th>
                <th>Opérations</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
              <tr>
                <td><?= $this->sanitize($user->getId()) ?></td>
                <td><?= $this->sanitize($user->getUsername()) ?></td>
                <td><?= $this->sanitize($user->getEmail()) ?></td>
                <td><?= $this->sanitize($user->getActivated()) ?></td>
                <td><?= $this->sanitize($user->getUserType()) ?></td>
                <td><?= $this->sanitize($user->getDateCreation()) ?></td>
                <td>
					<a class="btn btn-primary" href="post/index/<?= $this->sanitize($user->getId()) ?>" target="_blank">
						<i class="fas fa-search"></i>
					</a>
					<a class="btn btn-success" href="admin/postEdit/<?= $this->sanitize($user->getId()) ?>">
						<i class="fas fa-pen"></i>
					</a>
                	<a class="btn btn-danger" href="admin/deleteUser/<?= $this->sanitize($user->getId()) ?>" onclick="return confirm('Attention cette action supprimera également les commentaires et posts associés à cet utilisateur ! Êtes vous sûr ?')">
                		<i class="fas fa-trash-alt"></i>
                	</a>
                	<a class="btn btn-info" href="#" onclick="return confirm('Le mot de passe de cet utilisateur sera réinitialisé. Êtes vous sûr ?')">
                		<i class="fas fa-redo"></i>
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