# P5-BlogMVC
Projet 5 de mon parcours Développeur d'application PHP/Symfony chez OpenClassrooms.
Création d'un Blog via une architecture MVC Orienté objet.

## Informations
Les aggrégations ne sont volontairement pas indiquées sur le diagramme de classe UML de l'application pour gagner en lisibilité. Celui-ci me sert principalement d'aide visuel et n'est pas forcemment complet.

Le modèle MVC & Framework de ce projet est fortemment inspiré du [cours de Baptiste Pesquet](https://bpesquet.developpez.com/tutoriels/php/)evoluer-architecture-mvc/

La manipulation des données stockés (Hydratation : Entité/Manager) a été effectué en suivant [le cours de Victor Thuillier](https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php/1666289-manipulation-de-donnees-stockees)

Le thème Bootstrap utilisé est [Clean Blog](http://startbootstrap.com/template-overviews/clean-blog/) crée par [Start Bootstrap](http://startbootstrap.com/). [Plus d'informations](https://github.com/sorha/P5-BlogMVC/tree/master/Content/startbootstrap-clean-blog-gh-pages)

## Installation
__Etape 1__ : Transférer les fichiers dans le dossier web de votre serveur web (en général "www/").  
__Etape 2__ : Créer une base données sur votre SGDB (MySQL) et importer le fichier DB/p5blog.sql afin d'y créer les différentes tables  
__Etape 3__ : Remplisser le fichier Config/prod.ini ou Config/dev.ini selon votre environnement.  
Attention ! Supprimez dev.ini si vous souhaitez utiliser le fichier prod.ini !  
Veillez à bien remplir tout les champs avec vos informations de la même façon que celle fournit pour exemple ! 

* rootWeb = /NomDuDossierRacine/  
  * _Laisser un "/" si les fichiers se trouvent à la base de votre dossier web_  
* dsn = 'mysql:host=_AdresseBaseDeDonnées_;dbname=_NomBaseDeDonnées_;charset=_utf8_'  
* login = _utilisateurDeBaseDeDonnées_  
* password = _motDePasseDeBaseDeDonnées_  
* email = _'votreEmailDeReception@gmail.com'_  
* noreply = _'noreply@votredomaine.com'_  
* domain = _'http://votredomaine.com/NomDuDossierRacine/'_  
  * _Ne pas indiquer de NomDeDossierRacine/ si les fichiers se trouvent à la base de votre dossier web_  
* timezone = 'Europe/Paris'	
  * _A remplacer en fonction de votre zone horaire, voir [la liste des timezone](http://php.net/manual/fr/timezones.php)_  
__Etape 4__ : Votre blog est désormais fonctionnel ! Vous pouvez y créer un compte dans l'onglet "Inscription" sans oublier de cliquer sur le lien de validation de votre email. Ensuite, dans votre base de données et dans la table "user", modifier la colonne "usertype" de l'utilisateur que vous venez de créer et mettez y la valeur 2. Enregistrer, vous disposez désormais d'un compte administrateur qui vous permet de gérer votre blog via le menu "Administration"

