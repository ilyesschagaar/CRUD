<?php
require("modele.php");

function affichage()
{
    $result = result();

    require("affichage.php");
}
function addProduct()
{
    $add = add();
    require("add.php");
}

function deleteProduct()
{
    $delete = delete();
}

function detailProduct()
{
    $produit = detail();
    require("details.php");
}

function modifierProduct()
{
    $produit=modifier();
    require("edit.php");
}
?>