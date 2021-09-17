<?php
require("./model/model.php");
 
function viewProduct()
{
    $model = new Model;
    $product = $model->view();
    require("./view/view.php");
}
function addProduct()
{
    $model = new Model;
    $model->add();
    require("./view/viewadd.php");
}

function deleteProduct()
{
    $model = new Model;
    $delete =  $model->delete();
}

function detailProduct()
{
    $model = new Model;
    $products = $model-> detail();
    require("./view/viewdetails.php");
}

function updateProduct()
{
    $model = new Model;
    $products = $model-> update();
    require("./view/viewupdate.php");
}
?>