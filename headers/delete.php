<?php
session_start();
include(realpath(__DIR__ . "/../core/deletFromCart.php"));
putANewCart($_GET['id']);
