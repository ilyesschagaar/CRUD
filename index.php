<?php
require('controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'view') {
        view();
    } elseif ($_GET['action'] == 'add') {
        addProduct();
    } elseif ($_GET['action'] == 'delete') {
        deleteProduct();
    } elseif ($_GET['action'] == 'detail') {
        detailProduct();
    }elseif ($_GET['action'] == 'update') {
        updateProduct();
    }
} else {
    view();
}
?>