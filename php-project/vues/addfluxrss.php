<html>

<head>
    <title>Ajout Flux RSS</title>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

    <!-- Formulaire pour ajouter un flux rss -->
    <div class="container">

        <h2>Ajout Flux RSS</h2>

        <hr>

        <form action="?action=addfluxrss" method="post">
            <div class="form-group">
                <label>Site du flux RSS</label>
                <input name="site" type="text" class="form-control" placeholder="Site du flux RSS">
            </div>
            <div class="form-group">
                <label>Lien du flux RSS</label>
                <input name="lien" type="text" class="form-control" placeholder="Lien du flux RSS">
            </div>

            <a class="btn btn-danger" href="index.php" >Annuler</a>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>

</body>



</html>
