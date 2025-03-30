<?php

$cart= realpath(__DIR__.'/../assets/cart.json');
function getUsersData(){
    $users = file_exists($GLOBALS['cart'])? json_decode(file_get_contents($GLOBALS['cart']) , true) : [];
    return $users;
}

function countCart($userId){
    $countCart = 0;
    if(getUsersData() == null){
        return $countCart;
    }
    return array_count_values(array_column(getUsersData() , 'userId'))[$userId] ?? 0 ;
}
