<?php
session_start();
$fileCartData = realpath(__DIR__.'/../assets/cart.json');
function getCartData(){
    $cart = file_exists($GLOBALS['fileCartData'])? json_decode(file_get_contents($GLOBALS['fileCartData']) , true) : [];
    return $cart;
}

function deleteCart($cartData){
    foreach($cartData as $key => $value){
        if($value['id'] == $_GET['id']){
            if($value['userId'] == $_SESSION['user']['id']){
                unset($cartData[$key]);
                $cartData = array_values($cartData);
                return $cartData;
            }
        }
    } 
}
if(!empty($_SESSION['user'])){
    file_put_contents($GLOBALS['fileCartData'], json_encode(deleteCart(getCartData()) , JSON_PRETTY_PRINT));
    header("Location: ../cart.php");
}
