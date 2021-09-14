<?php
require("modele.php");

function affichage()
{
    $result = result();

    require("affichage.php");
}
function addProduct()
{
    require("add.php");
}
?>