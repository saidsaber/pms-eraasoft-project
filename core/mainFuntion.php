<?php
function old($field){
    if(empty($session['user'])){
        if(!empty($_SESSION['error'][$field][1]))
            return $_SESSION['error'][$field][1];
    }
}

function showError($field){
    if(empty($session['user'])){
        if(!empty($_SESSION['error'][$field][0]))
            return $_SESSION['error'][$field][0];
    }else{
        return null;
    }
}

function displayError($field){
    if(empty($session['user'])){
        if(!empty($_SESSION['error'][$field][0]))
            return $_SESSION['error'][$field][0] == 1 ? 'none' : 'block';
        else    
            return 'none';
    }else{
        return "none";
    }

}

function setError(){
    if(empty($session['user'])){
        if(!empty($_SESSION['egnore']))
            return $_SESSION['egnore'];
        else
            return null;
    }
}

function showImageError(){
    if(empty($session['user'])){
        if(!empty($_SESSION['image']))
            return $_SESSION['image'];
        else{
            return null;
        }
    }
}