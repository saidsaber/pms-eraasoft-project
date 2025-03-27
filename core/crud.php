<?php
$fileUsersData = '../assets/users.json';
function getUsersData(){
    $users = file_exists($GLOBALS['fileUsersData'])? json_decode(file_get_contents($GLOBALS['fileUsersData']) , true) : [];
    return $users;
}

function saveUsersData($usersData ,$userData){
    file_put_contents($GLOBALS['fileUsersData'], json_encode($usersData , JSON_PRETTY_PRINT));

    $_SESSION['user'] = ['name' => $userData['name'] , 'id' => $userData['id']];
    header("Location: ../index.php");
}

function creatUser($userData){
    $usersData = getUsersData();
    $id = 0;
    if(!empty($usersData))
        $id = max(array_column($usersData , 'id'));

    $userData += ['id' => ++$id];
    $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);
    $usersData[] = $userData;
    saveUsersData($usersData ,$userData);
}