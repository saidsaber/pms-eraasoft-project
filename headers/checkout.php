<?php
include '../headers/viewCart.php';
include '../core/checkout.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name']) ){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $notes = $_POST['notes'];
    $checkOut = [
        'id' => 0,
        'name' => $name,
        'email' => $email,
        'address' => $address,
        'phone' => $phone,
        'notes' => $notes,
        'cartData' => getData(),
        'total' => getTotal()
    ];
    addCheckOut($checkOut);
}