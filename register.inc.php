<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
include_once 'classes/user.php';
$user = new user();
$error_msg = "";



if (isset($_POST['username'], $_POST['email'], $_POST['p'])) {
    

    // Sanitize and validate the data passed in
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= '<p class="error">The email address you entered is not valid</p>';
    }

    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }

    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //

    $prep_stmt = "SELECT id FROM members WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);

    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= '<p class="error">A user with this email address already exists.</p>';
        }
    } else {
        $error_msg .= '<p class="error">Database error</p>';
    }

    // TODO:
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.

    if (empty($error_msg)) {
        // Create a random salt
        $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));

        // Create salted password
        $password = hash('sha512', $password . $random_salt);

        //then process the checks for user details
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $goal = $_POST['goal'];
        $title = $_POST['title'];
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $address1 = $_POST['address1'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $county = $_POST['county'];
        $postcode = $_POST['postcode'];
        $dob = $_POST['dob'];

        mysql_real_escape_string($weight);
        mysql_real_escape_string($height);
        mysql_real_escape_string($goal);
        mysql_real_escape_string($title);
        mysql_real_escape_string($fistname);
        mysql_real_escape_string($surname);
        mysql_real_escape_string($address1);
        mysql_real_escape_string($street);
        mysql_real_escape_string($city);
        mysql_real_escape_string($county);
        mysql_real_escape_string($postcode);
        mysql_real_escape_string($dob);
    


        if($_POST['weight'] == ""){
            //no weight entered, return user to register form
            header('Location: register.php?err=weightempty');
        }
        if($_POST['height'] == ""){
            //no weight entered, return user to register form
            header('Location: register.php?err=heightempty');
        }
        if($_POST['goal'] == ""){
            //no weight entered, return user to register form
            header('Location: register.php?err=goalempty');
        }
        if($_POST['title'] == ""){
            //no weight entered, return user to register form
            header('Location: register.php?err=titleempty');
        }
        if($_POST['firstname'] == ""){
            //no weight entered, return user to register form
            header('Location: register.php?err=firstnameempty');
        }
        if($_POST['surname'] == ""){
            //no weight entered, return user to register form
            header('Location: register.php?err=surnameempty');
        }
        if($_POST['address1'] == ""){
            //no weight entered, return user to register form
            header('Location: register.php?err=address1empty');
        }
        if($_POST['street'] == ""){
            //no weight entered, return user to register form
            header('Location: register.php?err=street');
        }
        if($_POST['city'] == ""){
            //no weight entered, return user to register form
            header('Location: register.php?err=cityempty');
        }
        if($_POST['county'] == ""){
            //no weight entered, return user to register form
            header('Location: register.php?err=countyempty');
        }
        if($_POST['postcode'] == ""){
            //no weight entered, return user to register form
            header('Location: register.php?err=postcodeempty');
        }
        if($_POST['dob'] == ""){
            //no weight entered, return user to register form
            header('Location: register.php?err=dobempty');
        }
        
        else {
        //insert the new user into the user table
        $user->registerUser($email, $username, $password, $random_salt, $title, $firstname, $surname, $address1, $street, $city, $county, $postcode, $dob, $weight, $height, $goal, $mysqli);

        // Insert the new user into the members table
        if ($insert_stmt = $mysqli->prepare("INSERT INTO members (username, email, password, salt) VALUES (?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssss', $username, $email, $password, $random_salt);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
            }
        }
        header('Location: register_success.php');
    }
    }
} 