<?php
include('../core/login.php');
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $userData = [
        "name" => $name,
        "email" => $email,
        "phone" => $phone,
        "password" => $password
    ];
    
    if(createUser($userData))
        echo 'done';
}