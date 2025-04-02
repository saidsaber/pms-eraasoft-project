<?php
session_start();
if(empty($_SESSION['user'])){
    require realpath(__DIR__ . '/inc/register.php');
}else{
    header("Location: index.php");
    exit;
}

?>