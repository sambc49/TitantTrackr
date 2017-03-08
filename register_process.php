<?php

include_once 'db_connect.php';
include_once 'includes/functions.php';
include_once 'classes/user.php';
include_once 'classes/exercise.php';

sec_session_start(); // Our custom secure way of starting a PHP session.

$user = new User();

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['p'];
    $gender = $_POST['gender'];
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $address1 = $_POST['address1'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $county = $_POST['county'];
    $postcode = $_POST['postcode'];
    $dob = $_POST['dob'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $goal = $_POST['goal'];

    //create 3character sequence
    $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);

    $password = hash('sha512', $password . $random_salt);

    echo $password;

    //register the user
	if($user->registerUser($email, $username, $password, $random_salt, $gender, $firstname, $surname, $address1, $street, $city, $county, $postcode, $dob, $weight, $height, $goal, $mysqli) == true){
        echo "Insert true!";
    }

?>