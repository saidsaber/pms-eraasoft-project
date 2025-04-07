<?php
session_start();
include realpath(__DIR__ . "/../core/addToCart.php");
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!empty($_SESSION['user'])){

        $productData = [
            'userId' => $_SESSION['user']['id'],
            'productId' => (int)$_GET['id'],
        ];
        addToCar($productData);
    }else{
        $_SESSION['addCart'] = ['You must log in first.'];
        header("Location: ../index.php");
    }
}