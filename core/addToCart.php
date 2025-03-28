<?php
$fileCartData = '../assets/cart.json';
function getCartData(){
    $cart = file_exists($GLOBALS['fileCartData'])? json_decode(file_get_contents($GLOBALS['fileCartData']) , true) : [];
    return $cart;
}

function saveCartData($data){
    file_put_contents($GLOBALS['fileCartData'], json_encode($data , JSON_PRETTY_PRINT));

    header("Location: ../index.php");
}

function isExist($productData){
    $data = getCartData();
    $exist = [];
    foreach($data as &$d){
        if($d['userId'] == $productData['userId']){
            if($d['productId'] == $productData['productId']){
                ++$d['count'];
                $exist = $data;
                break;
            }
        }
    }
    return $exist;
}

function addToCar($productData){
    if(isExist($productData) == null){
        $data = getCartData();
        $id = 0;
        if(!empty($data))
        $id = max(array_column($data , 'id'));
        $productData += ['id' => ++$id , 'count' => 1];
        $data[] = $productData;
        saveCartData($data);
    }else{
        echo '<pre>';
        print_r(isExist($productData));
        echo '</pre>';
        saveCartData(isExist($productData));
    }
}