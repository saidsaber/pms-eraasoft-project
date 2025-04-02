<?php
session_start();
$said = 'said';
if(empty($_SESSION['user'])){
    require(realpath(__DIR__ . '/inc/login.php'));
}else{
    header("Location: index.php");
    exit;
}

?>