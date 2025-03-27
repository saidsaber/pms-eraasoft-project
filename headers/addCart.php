<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!empty($_SESSION['user'])){
        echo $_GET['id'];
        echo $_SESSION['user']['id'];
    }else{
        $_SESSION['addCart'] = ['You must log in first.'];
        header("Location: ../index.php");
    }
}