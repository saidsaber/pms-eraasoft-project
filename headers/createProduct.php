<?php
include '../core/createProduct.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $productData = [
        "name" => $name,
        "price" => $price
    ];
    createPorduct($productData);
}