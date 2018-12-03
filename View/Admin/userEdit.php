<?php $this->title = "Mon Blog - Administration" ?>

<?php include 'adminNav.php'?>

<!--  Content  -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <h2>Editer un utilisateur</h2>     
      <form method="post" action="admin/updateUser" id="updateUserForm" novalidate>
        <div class="control-group">
          <div class="form-group controls">
            <label for="username">Nom d'utilisateur</label>
            <input name="username" value="<?= $this->sanitize($user->getUsername()) ?>" type="text" class="form-control" placeholder="Nom d'utilisateur" id="username" required data-validation-required-message="Veuillez renseigner ce champ.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        
        <div class="control-group">
          <div class="form-group controls">
            <label for="email">Email</label>
            <input name="email" value="<?= $this->sanitize($user->getEmail()) ?>" type="text" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Veuillez renseigner ce champ." data-validation-email-message="Adresse email invalide">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        
        <div class="control-group">
          <div class="form-group">
            <label for="userType">Type d'utilisateur</label>
            <select name="userType" class="form-control" id="userType">
              <option value="1">Membre</option>
              <option value="2">Admin</option>
            </select>
          </div>
        </div>
        
        <input name="id" type="hidden" value="<?= $this->sanitize($user->getId()) ?>">
        
        <br>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" name="submitted" class="btn btn-primary" value="submitted" id="sendMessageButton">Modifier l'utilisateur</button>
        </div>
      </form>
      
    </div>
  </div>
</div>