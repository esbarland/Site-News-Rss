<html>

<head>
    <title>Ajout News</title>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

    <!-- Formulaire pour ajouter une news -->
    <div class="container">

        <h2>Ajout News</h2>

        <hr>

        <form action="?action=addnews" method="post">
            <div class="form-group">
                <label>Titre</label>
                <input name="titre" type="text" class="form-control" placeholder="Titre">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input name="description" type="text" class="form-control" placeholder="Description">
            </div>
            <div class="form-group">
                <label>Lien</label>
                <input name="lien" type="text" class="form-control" placeholder="Lien">
            </div>
            <div class="form-group">
                <label>Date</label>
                <input name="date" type="date" class="form-control" placeholder="Date">
            </div>
            <div class="form-group">
                <label>Catégorie</label>
                <input name="categorie" type="text" class="form-control" placeholder="Catégorie">
            </div>
            <div class="form-group">
                <label>GUID</label>
                <input name="guid" type="text" class="form-control" placeholder="GUID">
            </div>

            <a class="btn btn-danger" href="index.php" >Annuler</a>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>

</body>



</html>
