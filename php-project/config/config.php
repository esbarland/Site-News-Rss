<?php

//Racine du projets
$rep=__DIR__.'/../';

//Tableau pour stocker les erreurs
$dVueErreur = array();

//Identifiants de connexion à la base
$base="mysql:host=localhost;dbname=projet_php";
$login="root";
$mdp="";

//Raccourcis pour les vues
$vues['erreur']='vues/erreur.php';
$vues['accueil']='vues/accueil.php';
$vues['admin']='vues/adminpage.php';
$vues['addnews']='vues/addnews.php';
$vues['removenews']='vues/removenews.php';
$vues['addfluxrss']='vues/addfluxrss.php';
$vues['removefluxrss']='vues/removefluxrss.php';

//Nombre de news par page
$nbNewsParPage = 2;

?>