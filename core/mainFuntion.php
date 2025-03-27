<?php
function old($field){
    if(!empty($_SESSION['error']))
        return $_SESSION['error'][$field][1];
}

function showError($field){
    if(!empty($_SESSION['error']))
        return $_SESSION['error'][$field][0];
}

function displayError($field){
    if(!empty($_SESSION['error']))
        return $_SESSION['error'][$field][0] == 1 ? 'none' : 'block';
    else    
        return 'none';

}

function setError(){
    if(!empty($_SESSION['egnore']))
        return $_SESSION['egnore'];
    else
        return null;
}

function showImageError(){
    if(!empty($_SESSION['image']))
        return $_SESSION['image'];
    else{
        return null;
    }
}