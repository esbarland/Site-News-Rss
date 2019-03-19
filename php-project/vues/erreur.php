<html>
    <head>
        <title>Page d'erreur</title>
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>

<body>

    <!-- Page d'erreur -->
    <div class="container">

        <h1>Vous avez été redirigé vers une page d'erreur</h1>

        <?php

        if (isset($dVueErreur)) {
            foreach ($dVueErreur as $value){
                echo "<h3>Erreur: " . $value . "</h3>";
            }
        }
        ?>

        <a class="btn btn-primary" href="index.php" >Retour à l'accueil</a>
    </div>

</body>
</html>