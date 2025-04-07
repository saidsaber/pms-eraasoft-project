<?php
include(realpath( __DIR__ . '/../core/register.php'));

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])){
    $name =  trim($_POST['name']);
    $password =  trim($_POST['password']);

    $userData = [
        "name" => $name,
        "password" => $password
    ];

    register($userData);
}