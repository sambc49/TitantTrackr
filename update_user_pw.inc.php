<?php 

include_once 'db_connect.php';
include_once 'psl-config.php';
include_once 'classes/user.php';
include_once 'includes/functions.php';
sec_session_start();
$user = new user();
$username = $_SESSION['username'];

$error_msg = "";


if (isset($_POST['p'])) {

	//if password is set
	$password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }

	if (empty($error_msg)) {
	        // Create a random salt
	        $salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));

	        // Create salted password
	        $password = hash('sha512', $password . $salt);   

	        $user->updateUserPassword($username, $password, $salt, $mysqli); 
	}
}
?>
