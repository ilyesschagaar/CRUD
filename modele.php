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