<?php 

include "db_config.php";

if(!empty($_POST)){
    $username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

// Need to check if posted data is empty, if it is, return success as 0.

	if($username == null){
		$response["success"]  = 0;
		$response["message"] = "Please enter a username";
		echo(json_encode($response));
	}
	else if($password == null){
		$response["success"]  = 0;
		$response["message"] = "Please enter a password";
		echo(json_encode($response));
	}

// Then check username against db and see if any rows are returned.
	//if they are, return response saying username taken.
	//otherwise insert the other data to database

	$usernameQuery = "SELECT * FROM user WHERE username = '$username'";
	$queryResult = mysql_query($usernameQuery);

	$numRows = mysql_num_rows($queryResult);
	if($numRows >0){
		$response["success"]  = 0;
		$response["message"] = "Sorry, this username is taken";
		echo(json_encode($response));
	}	
	else if($numRows == 0){
		//Hashing of password here, this will then be inserted into the database
		//create hash of password

        $originalPasswordHashed = hash('sha512', $password);

		//create 3character sequence
		$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
		$passwordHashed = hash('sha512', $originalPasswordHashed . $random_salt);

        //insert into members table
        $query = "INSERT into members (id, username, email, password, salt) VALUES (NULL, '$username','$email','$passwordHashed', '$random_salt')";
        $result = mysql_query($query);
        //also insert into members table, add nulls so user can complete profile later.
        $query2 = "INSERT into user (userID, email, username, password, salt, title, firstname, surname, address1, street, city, county, postcode, dob, weight, height, goal) VALUES (NULL, '$email','$username', '$passwordHashed', '$random_salt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
		$result2 = mysql_query($query2);
		$response["success"]  = 1;
		$response["message"] = $hash;
		echo(json_encode($response));
	}


}
?>