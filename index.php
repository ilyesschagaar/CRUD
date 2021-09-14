<?php
require('controler.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'affichage') {
        affichage();
    } elseif ($_GET['action'] == 'addProduct') {
        addProduct();
    }
} else {
    affichage();
}
?>
