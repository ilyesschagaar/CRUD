<?php
require("model.php");

function viewProduct()
{
    $product = view();
    require("view.php");
}
function addProduct()
{
    add();
    require("add.php");
}

function deleteProduct()
{
    $delete = delete();
}

function detailProduct()
{
    $products = detail();
    require("details.php");
}

function updateProduct()
{
    $products = update();
    require("update.php");
}
?>