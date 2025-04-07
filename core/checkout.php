<?php
include('validation.php');
include('mainFuntion.php');
include('deletFromCart.php');
$fileCheckOutData = '../assets/checkOut.json';
$fileCartData = realpath(__DIR__.'/../assets/cart.json');

function putCheckOutData($checkOut){
    $data = file_exists($GLOBALS['fileCheckOutData'])? json_decode(file_get_contents($GLOBALS['fileCheckOutData']) , true) : [];

    if(!empty($data)){
        $checkOut['id'] = max(array_column($data , 'id'));
    }

    $data[] = $checkOut;

    file_put_contents($GLOBALS['fileCheckOutData'], json_encode($data , JSON_PRETTY_PRINT));
    return true;
}



function isrequired($checkOut){
    $_SESSION['error'] = [];
    $isError = false;
    foreach($checkOut as $field => $value){
        if($field == 'id'){
            continue;
        }
        $_SESSION['error'] += [$field => [required($value , $field) , $value]];
        $isError = required($value , $field) != 1 ? true : $isError;
    }
    return $isError;
}

function Email($checkOut){
    $isError = false;
    $_SESSION['error'] = ['email' => [isEmail($checkOut['email']) , $checkOut['email'] ]];
    return $isError = isEmail($checkOut['email']) != 1 ? true : $isError;
}



function addCheckOut($checkOut){
    if(isrequired($checkOut)){
        header("Location: ../checkout.php");
        exit;
    }
    if(Email($checkOut)){
        header("Location: ../checkout.php");
        exit;
    }

    if(putCheckOutData($checkOut)){
        foreach($checkOut['cartData'] as $value){
            putANewCart($value['id']);
        }
        header("Location: ../cart.php");
    }
}