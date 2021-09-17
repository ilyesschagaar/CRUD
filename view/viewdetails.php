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
                <h1>Détails du produit <?= $products['produit'] ?></h1>
                <p>ID : <?= $products['id'] ?></p>
                <p>Produit : <?= $products['produit'] ?></p>
                <p>Prix : <?= $products['prix'] ?></p>
                <p>Nombre : <?= $products['nombre'] ?></p>
                <p><a class="btn btn-primary" href="index.php">Retour</a> 
                <a class="btn btn-success" href="index.php?action=update&AMP;id=<?= $product['id']?>">Modifier</a>
                <a class="btn btn-danger" href="index.php?action=delete&AMP;id=<?= $product['id']?>">Supprimer</a></p>
            </section>
        </div>
    </main>
</body>
</html>