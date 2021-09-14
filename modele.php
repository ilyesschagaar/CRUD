<?php

function result()
{

$db = connect();

session_start();

$sql = 'SELECT * FROM `liste`';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);
return $result;


} 

function connect()
{
    try {
    // Connexion à la base
    $db = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
    $db->exec('SET NAMES "UTF8"');
    return $db;
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
    die();
}
}

function add()
{

if($_POST){
    if(isset($_POST['produit']) && !empty($_POST['produit'])
    && isset($_POST['prix']) && !empty($_POST['prix'])
    && isset($_POST['nombre']) && !empty($_POST['nombre'])){
        // On inclut la connexion à la base
        $db = connect();

        // On nettoie les données envoyées
        $produit = strip_tags($_POST['produit']);
        $prix = strip_tags($_POST['prix']);
        $nombre = strip_tags($_POST['nombre']);

        $sql = 'INSERT INTO `liste` (`produit`, `prix`, `nombre`) VALUES (:produit, :prix, :nombre);';

        $query = $db->prepare($sql);

        $query->bindValue(':produit', $produit, PDO::PARAM_STR);
        $query->bindValue(':prix', $prix, PDO::PARAM_STR);
        $query->bindValue(':nombre', $nombre, PDO::PARAM_INT);

        $query->execute();

        $_SESSION['message'] = "Produit ajouté";
        require_once('close.php');

        //header('Location: index.php');
    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}
}