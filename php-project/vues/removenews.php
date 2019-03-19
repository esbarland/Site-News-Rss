<html>

<head>
    <title>Suppression News</title>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

    <!-- Formulaire pour supprimer une news -->
    <div class="container">

        <h2>Suppression News</h2>

        <hr>

        <form action="?action=removenews" method="post">
            <div class="form-group">
                <label>GUID</label>
                <input name="guid" type="text" class="form-control" placeholder="GUID">
            </div>

            <a class="btn btn-danger" href="index.php" >Annuler</a>
            <button type="submit" class="btn btn-warning">Supprimer</button>
        </form>
    </div>

</body>



</html>
