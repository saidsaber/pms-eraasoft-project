<?php
include('validation.php');
include('mainFuntion.php');
include('crud.php');

function sendError(){
    header("Location: ../login.php");
    exit;
}

function errors($userData){
    $isError = false;

    $_SESSION['error'] = [];

    $_SESSION['error'] = ['email' => [isEmail($userData['email']) , $userData['email'] ]];
    $isError = isEmail($userData['email']) != 1 ? true : $isError;

    $_SESSION['error'] += ['phone' => [isNumber($userData['phone']) , $userData['phone'] ]];
    $isError = isNumber($userData['phone']) != 1 ? true : $isError;

    $_SESSION['error'] += ['name' => [length($userData['name'] , 'name') , $userData['name'] ]];
    $isError = length($userData['name'] ,'name') != 1 ? true : $isError;

    $_SESSION['error'] += ['password' => [length($userData['password'] , 'password') , $userData['password'] ]];
    $isError = length($userData['password'] ,'password') != 1 ? true : $isError;
    return $isError;
}

function isrequired($userData){
    $_SESSION['error'] = [];
    $isError = false;
    foreach($userData as $field => $value){
        $_SESSION['error'] += [$field => [required($value , $field) , $value]];
        $isError = required($value , $field) != 1 ? true : $isError;
    }
    return $isError;
}

function createUser($userData){
    if(!empty($_SESSION['user'])){
        if(isrequired($userData)){
            sendError();
        }
        if(errors($userData)){
            sendError();
        }
        if(!errors($userData) && !isrequired($userData)){
            creatUser($userData);
            return 1;
        }
    }else{
        header("Location: ../index.php");
        exit;
    }
}