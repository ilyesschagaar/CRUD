<?php
// On démarre une session

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du produit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Détails du produit <?= $produit['produit'] ?></h1>
                <p>ID : <?= $produit['id'] ?></p>
                <p>Produit : <?= $produit['produit'] ?></p>
                <p>Prix : <?= $produit['prix'] ?></p>
                <p>Nombre : <?= $produit['nombre'] ?></p>
                <p><a class="btn btn-primary" href="index.php">Retour</a> 
                <a class="btn btn-success" href="index.php?action=modifier&AMP;id=<?= $produit['id']?>">Modifier</a>
                <a class="btn btn-danger" href="index.php?action=supprimer&AMP;id=<?= $produit['id']?>">Supprimer</a></p>
            </section>
        </div>
    </main>
</body>
</html>