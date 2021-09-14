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
?>