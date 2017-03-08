<?php

include "db_config.php";

if(!empty($_POST)){

	$username = $_POST['username'];
	$password = $_POST['password'];



	$query = "SELECT email, password, salt FROM members WHERE email = '$username'";
	$result = mysql_query($query);
	$rows = mysql_num_rows($result);



	//if the usernames match
	if($rows > 0){
		$userData = mysql_fetch_array($result, MYSQL_ASSOC);

        $originalPasswordHashed = hash('sha512', $password);
		$password_hashed = hash('sha512', $originalPasswordHashed . $userData['salt']);
		if($password_hashed != $userData['password']) //incorrect password
		{
			$response["success"]  = 0;
			$response["message"] = $password_hashed;
			echo json_encode($response);
		}
		else {
			$response["success"]  = 1;
			$response["message"] = "Login Successful!";
			echo json_encode($response);
		}
	}
	else {
		$response["success"] = 0;
		$response["message"] = "Incorrect Login!";
		echo json_encode($response);
	}
}
?>