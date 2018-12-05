<?php $this->title = "Mon Blog - Administration" ?>

<?php include 'adminNav.php'?>

<!--  Content  -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
     <p class="help-block text-danger"><?= $errorMessage ?></p>
     <p class="help-block text-success"><?= $successMessage ?></p>     
        <h2>Gestion des utilisateurs</h2>
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
                <th>Rôle</th>
                <th>Opérations</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
              <tr>
                <td><?= $this->sanitize($user->getId()) ?></td>
                <td><?= $this->sanitize($user->getUsername()) ?></td>
                <td><?= $this->sanitize($user->getEmail()) ?></td>
                <td><?= $this->sanitize($user->getUserTypeString()) ?></td>
                <td>
					<a class="btn btn-success operation" href="admin/userEdit/<?= $this->sanitize($user->getId()) ?>">
						<i class="fas fa-pen"></i>
					</a>
                	<a class="btn btn-danger operation" href="admin/deleteUser/<?= $this->sanitize($user->getId()) ?>" onclick="return confirm('Attention cette action supprimera également les commentaires et posts associés à cet utilisateur ! Êtes vous sûr ?')">
                		<i class="fas fa-trash-alt"></i>
                	</a>
                	<a class="btn btn-info operation" href="admin/resetPassword/<?= $this->sanitize($user->getId()) ?>" onclick="return confirm('Le mot de passe de cet utilisateur sera réinitialisé. Êtes vous sûr ?')">
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