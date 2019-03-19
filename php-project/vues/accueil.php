<html lang="fr">
<head>
    <title>Site de News RSS</title>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

    <!-- Menu avec les différentes actions possibles -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=1">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="index.php?action=formulaireConnexion">Connexion</a>
                </li>

                <?php
                    if(ModeleAdmin::isAdmin()){
                        echo "<li class=\"nav-item\">
                                <a class=\"nav-link \" href=\"index.php?action=formulaireaddnews\">Ajouter News</a>
                                </li>";
                        echo "<li class=\"nav-item\">
                                <a class=\"nav-link \" href=\"index.php?action=formulaireremovenews\">Supprimer News</a>
                                </li>";
                        echo "<li class=\"nav-item\">
                                <a class=\"nav-link \" href=\"index.php?action=formulaireaddfluxrss\">Ajouter Flux RSS</a>
                                </li>";
                        echo "<li class=\"nav-item\">
                                <a class=\"nav-link \" href=\"index.php?action=formulaireremovefluxrss\">Supprimer Flux RSS</a>
                                </li>";
                        echo "<li class=\"nav-item\">
                                <a class=\"nav-link \" href=\"index.php?action=majfluxrss\">Mettre à jour le Flux RSS</a>
                                </li>";
                        echo "<li class=\"nav-item\">
                                <a class=\"nav-link \" href=\"index.php?action=deconnexion\">Déconnexion</a>
                                </li>";
                    }
                ?>
            </ul>
        </div>
        <span class="navbar-text">
            <?php
            $admin = ModeleAdmin::isAdmin();

                if(ModeleAdmin::isAdmin())
                    echo "Nom utilisateur: " . $admin->getLogin() . " | Rôle: " . $admin->getRole();
                else
                    echo "Rôle: Visiteur";
            ?>
        </span>
    </nav>

    <div class="container">

        <!-- Affichage des news -->
        <h1>Liste des News RSS:</h1>

        <?php

        if (isset($tab)) {

            foreach ($tab as $new) {
                echo "Titre: ";
                print($new->getTitre());
                echo "<br>";
                echo "Description: ";
                print($new->getDescription());
                echo "<br>";
                echo "Lien: ";
                echo "<a href=\"";
                print($new->getLien());
                echo "\" target=\"_blank\">Clique ici</a>";
                echo "<br>";
                echo "GUID: ";
                print($new->getGuid());
                echo "<br>";
                echo "Date: ";
                print($new->getDatePub());
                echo "<br>";
                echo "Catégorie: ";
                print($new->getCategorie());
                echo "<br>";
                echo "Site: ";
                print($new->getSite());
                echo "<br>";

                echo "<hr>";
            }

            //Traitement pour changer de page
            $p1=$page-1;
            $p2=$page+1;
            echo "<a class=\"btn btn-primary\" href=\"?page=" . $p1 ."\">Précédente</a>";
            echo "<a class=\"btn btn-primary\" href=\"?page=" . $p2 ."\">Suivante</a>";

        }else{
            echo "tableau de news pas déclaré";
        }

        ?>

    </div>

</body>
</html>

