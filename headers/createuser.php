<?php
include(realpath(__DIR__ .'/../core/login.php'));
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])){
    $name = trim($_POST['name']);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = trim($_POST['password']);
    $userData = [
        "name" => $name,
        "email" => $email,
        "phone" => $phone,
        "password" => $password
    ];
    
    if(createUser($userData))
        echo 'done';
}