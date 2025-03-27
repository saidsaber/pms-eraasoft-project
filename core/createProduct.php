<?php
include('validation.php');

function sendError(){
    header("Location: ../createProduct.php");
    exit;
}

function createPorduct($productData){
    $isError = false;
    $_SESSION['error'] = [];

    if(isNumber($productData['price']) != 1 ){
        
        $_SESSION['error'] += ['price' => [isNumber($productData['price']) , $productData['price'] ]];
        $isError = isNumber($productData['price']) != 1 ? true : $isError;
    }else{
        $_SESSION['error'] += ['price' => [moreFour($productData['price']) , $productData['price'] ]];
        $isError = moreFour($productData['price']) != 1 ? true : $isError;
    }
    
    
    
    $_SESSION['error'] += ['name' => [required($productData['name'] ,'name') , $productData['name']]];
    $isError = required($productData['name'] , 'name') != 1 ? true : $isError;

    if($isError){
        sendError();
    }
    if(strlen($_FILES['image']['name']) == 0){
        $_SESSION['image'] = 'please uplaod image';
        sendError();
    }
    $_SESSION['error'] = null;
    saveImage($productData);
    sendError();
}

function saveImage($productData){
    $name = (rand() . $_FILES['image']['name']);
    $productData += ['path' => $name];
    if(is_uploaded_file($_FILES['image']['tmp_name'])){
        $result = move_uploaded_file($_FILES['image']['tmp_name'] , '../images/' . basename($name));
    }
    saveData($productData);
}

function saveData($productData){
    $fileProductssData = '../assets/products.json';
    $products = file_exists($fileProductssData)? json_decode(file_get_contents($fileProductssData) , true) : [];

    $id = 0;
    if(!empty($products))
        $id = max(array_column($products , 'id'));
        $productData +=['id' => ++$id];
    $products[] = $productData;
    file_put_contents($fileProductssData, json_encode($products , JSON_PRETTY_PRINT));
}