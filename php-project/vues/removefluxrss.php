<html>

<head>
    <title>Supprission Flux RSS</title>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

    <!-- Formulaire pour supprimer un flux rss -->
    <div class="container">

        <h2>Suppression Flux RSS</h2>

        <hr>

        <form action="?action=removefluxrss" method="post">
            <div class="form-group">
                <label>Sélection flux RSS</label>
                <select class="form-control" name="siteselected">
                    <?php
                        if(isset($tab)){
                            foreach ($tab as $site){
                                echo "<option>$site</option>";
                            }
                        }else{
                            echo "liste de flux rss non déclarée";
                        }
                    ?>
                </select>
            </div>

            <a class="btn btn-danger" href="index.php" >Annuler</a>
            <button type="submit" class="btn btn-warning">Suppression</button>
        </form>
    </div>

</body>



</html>
