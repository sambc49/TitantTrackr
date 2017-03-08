<?php
/**
 * Created by PhpStorm.
 * User: Gwilliam
 * Date: 06/04/14
 * Time: 14:14
 */

include_once 'db_connect.php';
include_once 'includes/functions.php';
include_once 'classes/user.php';

sec_session_start();
$user = new user();

if(!isset($_POST['email'])){
	//email empty, return user to myaccount page
	header("Location: myaccount.php?success=0");
}
if(!isset($_POST['username'])){
	//username empty, return user to myaccount page
	header("Location: myaccount.php?success=0");
}
if(!isset($_POST['firstname'])){
	//firstname empty, return user to myaccount page
	header("Location: myaccount.php?success=0");
}
if(!isset($_POST['surname'])){
	//surname empty, return user to myaccount page
	header("Location: myaccount.php?success=0");
}
if(!isset($_POST['address1'])){
	//address1 empty, return user to myaccount page
	header("Location: myaccount.php?success=0");
}

if(!isset($_POST['street'])){
	//street empty, return user to myaccount page
	header("Location: myaccount.php?success=0");
}
if(!isset($_POST['city'])){
	//city empty, return user to myaccount page
	header("Location: myaccount.php?success=0");
}if(!isset($_POST['county'])){
	//county empty, return user to myaccount page
	header("Location: myaccount.php?success=0");
}
if(!isset($_POST['postcode'])){
	//postcode empty, return user to myaccount page
	header("Location: myaccount.php?success=0");
}
if(!isset($_POST['dob'])){
	//dob empty, return user to myaccount page
	header("Location: myaccount.php?success=0");
}
if(!isset($_POST['weight'])){
	//weight empty, return user to myaccount page
	header("Location: myaccount.php?success=0");
}

if(!isset($_POST['height'])){
	//height empty, return user to myaccount page
	header("Location: myaccount.php?success=0");
}


//define variables for posts
$email = $_POST['email'];
$username = $_SESSION['username'];
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

//check to see if email is a valid email
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //valid email 
//mysql_real_escape all variables
mysql_real_escape_string($email);
mysql_real_escape_string($username);
mysql_real_escape_string($gender);
mysql_real_escape_string($firstname);
mysql_real_escape_string($surname);
mysql_real_escape_string($address1);
mysql_real_escape_string($street);
mysql_real_escape_string($city);
mysql_real_escape_string($county);
mysql_real_escape_string($postcode);
mysql_real_escape_string($dob);
mysql_real_escape_string($weight);
mysql_real_escape_string($height);
mysql_real_escape_string($goal);



if($user->updateUser($email, $username, $gender, $firstname, $surname, $address1, $street, $city, $county, $postcode, $dob, $weight, $height, $goal, $mysqli) == true){
    header("Location: myaccount.php?success=1");
}
else if ($user->updateUser($email, $username, $gender, $firstname, $surname, $address1, $street, $city, $county, $postcode, $dob, $weight, $height, $goal, $mysqli) == false){
    header("Location: myaccount.php?success=0");
}    
}
else {
	//not valid email
	header("Location: myaccount.php?success=0");
}



