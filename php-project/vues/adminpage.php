<html>

<head>
    <title>Page d'authentification</title>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

    <!-- Formulaire de connexion pour admin -->
    <div class="container">

        <h2>Connexion Administrateur</h2>

        <hr>

        <form action="?action=connexion" method="post">
            <div class="form-group">
                <label>Nom d'utilisateur</label>
                <input name="user" type="text" class="form-control" placeholder="Utilisateur">
            </div>
            <div class="form-group">
                <label>Mot de passe</label>
                <input name="password" type="password" class="form-control" placeholder="Mot de passe">
            </div>
            <a class="btn btn-danger" href="index.php" >Annuler</a>
            <button type="submit" class="btn btn-primary">Connexion</button>
        </form>

    </div>

</body>



</html>
