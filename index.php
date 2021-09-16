<?php
require('controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'affichage') {
        affichage();
    } elseif ($_GET['action'] == 'ajouter') {
        addProduct();
    } elseif ($_GET['action'] == 'supprimer') {
        deleteProduct();
    } elseif ($_GET['action'] == 'voir') {
        detailProduct();
    }elseif ($_GET['action'] == 'modifier') {
        modifierProduct();
    }
} else {
    affichage();
}
?>