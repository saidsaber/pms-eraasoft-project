<?php
// session_start();

function getAllData(){
    $fileProductssData = 'assets/products.json';
    $products = file_exists($fileProductssData)? json_decode(file_get_contents($fileProductssData) , true) : [];
    return $products;
}

function ProductCount($id){
    // if(!empty($_SESSION['user'])){
        $count = 0;
        foreach(getAllData() as $product){
            if($product == $id){
                $count++;
            }
        }
        return $count;
    // }else{
        // return 2;
    // }
}