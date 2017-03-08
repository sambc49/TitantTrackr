<?php

include_once 'db_connect.php';
include_once 'includes/functions.php';
include_once 'classes/user.php';

sec_session_start(); // Our custom secure way of starting a PHP session.
$user = new user();

//if username empty, return user
if($_POST['email'] == ""){
    header('Location: ../index.php?loginerror=2');
}
if($_POST['p'] == ""){
    header('Location: ../index.php?loginerror=3');
}

if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p']; // The hashed password.


    if ($user->login($email, $password, $mysqli) == true) {
        // Login success
        header('Location: ../home.php');
    } else {
        // Login failed
        header('Location: ../index.php?loginerror=1');
    }
} else {
    // The correct POST variables were not sent to this page.
    echo 'Invalid Request';
}



