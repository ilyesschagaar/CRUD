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
// On démarre une session
session_start();
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

        header('Location: index.php');
    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}
}

function delete()
{
    // On démarre une session
    session_start();
// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){
    $db = connect();
    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `liste` WHERE `id` = :id;';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On récupère le produit
    $produit = $query->fetch();

    // On vérifie si le produit existe
    if(!$produit){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: index.php');
        die();
    }

    $sql = 'DELETE FROM `liste` WHERE `id` = :id;';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();
    $_SESSION['message'] = "Produit supprimé";
    header('Location: index.php');


}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: index.php');
}
}

function detail()
{
// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){
    $db = connect();

    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `liste` WHERE `id` = :id;';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On récupère le produit
    $produit = $query->fetch();
    return $produit;
    // On vérifie si le produit existe
    if(!$produit){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: index.php');
    }
}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: index.php');
}
}

function modifier()
{
    // On démarre une session
    session_start();

    if($_POST){
        if(isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['produit']) && !empty($_POST['produit'])
        && isset($_POST['prix']) && !empty($_POST['prix'])
        && isset($_POST['nombre']) && !empty($_POST['nombre'])){
            // On inclut la connexion à la base
            $db = connect();
    
            // On nettoie les données envoyées
            $id = strip_tags($_POST['id']);
            $produit = strip_tags($_POST['produit']);
            $prix = strip_tags($_POST['prix']);
            $nombre = strip_tags($_POST['nombre']);
    
            $sql = 'UPDATE `liste` SET `produit`=:produit, `prix`=:prix, `nombre`=:nombre WHERE `id`=:id;';
    
            $query = $db->prepare($sql);
    
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->bindValue(':produit', $produit, PDO::PARAM_STR);
            $query->bindValue(':prix', $prix, PDO::PARAM_STR);
            $query->bindValue(':nombre', $nombre, PDO::PARAM_INT);
    
            $query->execute();
    
            $_SESSION['message'] = "Produit modifié";
            require_once('close.php');
    
            header('Location: index.php');
        }else{
            $_SESSION['erreur'] = "Le formulaire est incomplet";
        }
    }
    
    // Est-ce que l'id existe et n'est pas vide dans l'URL
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $db = connect();
    
        // On nettoie l'id envoyé
        $id = strip_tags($_GET['id']);
    
        $sql = 'SELECT * FROM `liste` WHERE `id` = :id;';
    
        // On prépare la requête
        $query = $db->prepare($sql);
    
        // On "accroche" les paramètre (id)
        $query->bindValue(':id', $id, PDO::PARAM_INT);
    
        // On exécute la requête
        $query->execute();
    
        // On récupère le produit
        $produit = $query->fetch();
        return $produit;
        // On vérifie si le produit existe
        if(!$produit){
            $_SESSION['erreur'] = "Cet id n'existe pas";
            header('Location: index.php');
        }
    }else{
        $_SESSION['erreur'] = "URL invalide";
        header('Location: index.php');
    }
}