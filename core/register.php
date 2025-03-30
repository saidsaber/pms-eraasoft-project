<?php
include 'validation.php';
include 'mainFuntion.php';
include('crud.php');

function sendError(){
    header("Location: ../register.php");
    exit;
}



function isrequired($userData){
    $isError = false;
    $_SESSION['error'] = [];
    foreach($userData as $field => $value){
        $_SESSION['error'] += [$field => [required($value , $field) , $value]];
        $isError = required($value , $field) != 1 ? true : $isError;
    }
    return $isError;
}

function redirect($userData){
    $usersData = getUsersData();
    if(!empty($usersData)){
        foreach($usersData as $value){
            if($value['name'] == $userData['name']){
                if(password_verify($userData['password'] , $value['password'])){
                    $_SESSION['user'] = ['name' => $value['name'] , 'id' => $value['id']];
                    header("Location: ../index.php");
                    exit;
                }else{
                    $_SESSION['egnore'] = "The username or password is incorrect or missing.";
                    header("Location: ../register.php");
                    exit;
                }
            }
        }
        $_SESSION['egnore'] = "The username or password is incorrect or missing.";
        header("Location: ../register.php");
        exit;
    }else{
        $_SESSION['egnore'] = 'user name  or password is incorrect';
        header("Location: ../register.php");
        exit;
    }
}

function register($userData){
    if(empty($_SESSION['user'])){
        if(isrequired($userData))
            sendError();
        else
            redirect($userData);
    }else{
        header("Location: ../index.php");
        exit;
    }
}