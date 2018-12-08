<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Blog MVC POO - Projet 5 de mon parcours Développeur d'application PHP / Symfony chez OpenClassrooms">
    <meta name="author" content="Alexandre Depraetere">
    <title><?= $title ?></title> <!-- Param -->
    <base href="<?= $rootWeb ?>"> <!-- Param -->

    <!-- Bootstrap core CSS -->
    <link href="Content/startbootstrap-clean-blog-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="Content/startbootstrap-clean-blog-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="Content/startbootstrap-clean-blog-gh-pages/css/clean-blog.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="Content/main.css" rel="stylesheet">
  </head>

  <body>
    <?php if(!empty($_SESSION['username'])) { ?>
        <div class="alert alert-success" style="position:fixed; left:0; bottom:0; z-index:100;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    	  Connecté en tant que <strong><?= $_SESSION['username'] . ' </strong><br />Vous êtes <strong>' . ucfirst($_SESSION['userType'])?></strong>
    	</div>
    <?php } ?>
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="home">Alex Depra</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="home">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="postList">Liste Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact">Contact</a>
            </li>
            <?php
            if(isset($_SESSION['userType']) && $_SESSION['userType'] === 'admin')
            {
            ?>  
            <li class="nav-item">
              <a class="nav-link" href="admin">Administration</a>
            </li>
            <?php 
            }
            ?>
            <?php
            if(!isset($_SESSION['userType']))
            {
            ?>  
            <li class="nav-item">
              <a class="nav-link" href="registration">Inscription</a>
            </li>
            <?php
            }
            ?>
            <?php
            if(!isset($_SESSION['userType']))
            {
            ?>  
            <li class="nav-item">
              <a class="nav-link" href="login">Connexion</a>
            </li>
            <?php
            }
            ?>
            <?php
            if(isset($_SESSION['userType']))
            {
            ?>  
            <li class="nav-item">
              <a class="nav-link" href="login/logout">Deconnexion</a>
            </li>
            <?php
            }
            ?>  
          </ul>
        </div>
      </div>
    </nav>

    <?= $content ?> <!-- Param -->

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="https://twitter.com/SorhaDesu" target="_blank">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.facebook.com/alex.depraetere.5" target="_blank">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://github.com/sorha" target="_blank">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; alexandre-depraetere.com/blog 2018</p>
            <?php
            if(isset($_SESSION['userType']) && $_SESSION['userType'] === 'admin')
            {
            ?>
              <p class="text-center"><a href="admin">Administration</a></p>
            <?php 
            }
            ?>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="Content/startbootstrap-clean-blog-gh-pages/vendor/jquery/jquery.min.js"></script>	
    <script src="Content/startbootstrap-clean-blog-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="Content/startbootstrap-clean-blog-gh-pages/js/clean-blog.min.js"></script>
    
    <!-- JQuery Bootstrap Form Validation Plugin -->
    <script src="Content/startbootstrap-clean-blog-gh-pages/js/jqBootstrapValidation.min.js"></script>
    <script src="Content/validation.js"></script>
  </body>
</html>