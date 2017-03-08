<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TitanTrackr | </title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script type="text/JavaScript" src="forms.js"></script>
    <script type="text/JavaScript" src="sha512.js"></script>
    <?php

    include_once 'db_connect.php';
    include_once 'includes/functions.php';
    include_once 'classes/user.php';
    include_once 'classes/gymactivity.php';

    sec_session_start(); // Our custom secure way of starting a PHP session.
    $user = new user();

    if($user->login_check($mysqli) == true){
        $logged = "in";
    }
    else {
        $logged = "out";
        header("Location: index.php");
    }
    $username = $_SESSION['username'];

    $user->setUsername($username);
    $user->fillUserDetails($username, $mysqli);
    if($_GET['success'] == 1){
        ?>
        <script>$( document ).ready(function() {
                $('.successBox').fadeIn(1000).delay(5000).fadeOut(1000);
            });</script>
    <?php
    }
    if($_GET['success'] == 'no'){
        ?>
        <script>$( document ).ready(function() {
                $('.failureBox').fadeIn(1000).delay(5000).fadeOut(1000);
            });</script>
    <?php
    }
    ?>

    <script>
        $(document).ready(function(){
            $(".warning_box").hide();
            $('#profile-trigger').click(function(){
                $(this).next('#profile-content').slideToggle();
                $(this).toggleClass('active');

                if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
                else $(this).find('span').html('&#x25BC;')
            });

        });
    </script>


</head>

<body>
<div class="home_header_container">
    <header class="home_header">
        <div class="large-1 columns">
            <div class="home_logo"></div>
        </div>
        <div class="large-7 columns">
            <div class="home_siteTitle">
                <span class="home_siteTitleBlue">Titan</span><span class="home_siteTitleLightBlue">Trackr</span>
            </div>
        </div>
        <div class="large-4 columns">
            <div class="top_nav_icons">
                <div class="large-7 columns">
                    <ul class="headerIcons">
                        <li id="profile">welcome
                            <a id="profile-trigger" href="#">
                                <?php echo $_SESSION['username'];
                                if($user->isUserProfileComplete($_SESSION['username'], $mysqli) == false){
                                    echo "<img class='exclamation' src='images/icons/exclamation.png' />";
                                }
                                else if($user->isUserProfileComplete($_SESSION['username'], $mysqli) == true){
                                    
                                }?>
                                <span style="display:none;">&#x25BC;</span>
                            </a>
                            <div id="profile-content">
                                <ul>
                                    <li><a href="myaccount.php">Personal Details</a></li>
                                    <li><a href="accountdetails.php">Account Details</li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</div>



    <div class="main">
        <div class="row no-margins">
            <div class="large-2 columns darkBlue">
                <div class="left_col">
                    <ul>
                        <li><a href=""><img src="images/icons/ic_action_home.png" />Home</a></li>
                        <li><a href="exercises.php"><img src="images/icons/dumbellIcon2.png" />Exercises</a></li>
                        <li><a href="workout.php"><img src="images/icons/ic_action_document.png" />Workouts</a></li>
                        <li><a href=""><img src="images/icons/ic_action_achievement.png" />Progress</a></li>
                        <li><a href=""><img src="images/icons/ic_action_users.png" />Social</a></li>
                    </ul>
                </div>
            </div>

            <div class="large-10 columns white">
                <div class="main_content">
                    <div class='successBox' style='display:none'><img src="images/icons/tick_icon.png" />Profile successfully updated!</div>
                    <div class='failureBox' style='display:none'><img src="images/icons/error_icon.png" />Error updating!</div>
                    <div class="large-6 columns">
                        <div class="myacc_form_container">
                            <div class="myacc_form">
                                <form action="update_user.php" method="post">
                                    <legend>1. Edit your gym information</legend>
                                <div class="row">
                                    <div class="large-5 columns">
                                        <label for="weight">Weight (kg):</label>
                                    </div>
                                    <div class="large-7 columns">
                                        <input type="number" name="weight" required autofocus="true" value="<?php echo $user->getWeight(); ?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-5 columns">
                                        <label for="height">Height (cm):</label>
                                    </div>
                                    <div class="large-7 columns">
                                        <input type="number" name="height" min="60" max="300" required value="<?php echo $user->getHeight(); ?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-5 columns">
                                        <label for="goal">Goal</label>
                                    </div>
                                    <div class="large-7 columns">
                                            <?php
                                            if($user->getGoal() == "Strength Training"){
                                                $selected = "selected";
                                            }
                                            ?>
                                        <select name="goal">
                                            <option>Choose your goal:</option>
                                            <option <?php echo $selected; ?>>Strength Training</option>
                                            <option>Weight Loss</option>
                                            <option>Rehabilitation</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="myacc_form_container">
                            <div class="myacc_form">
                                <legend>2. Edit your account name</legend>
                                <div class="row">
                                        <div class="large-5 columns">
                                            <label for="email">Email:</label>
                                        </div>
                                        <div class="large-7 columns">
                                            <input type="email" name="email" id="email" required value="<?php echo $user->getEmail();?>"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-5 columns">
                                            <label for="username">Username:</label>
                                        </div>
                                        <div class="large-7 columns">
                                            <input type="text" name="username" id="username" required value="<?php echo $user->getUsername(); ?>"/>
                                        </div>
                                    </div>                                
                                
                            </div>
                        </div>                        
                    </div>
                    <div class="large-6 columns">
                        <div class="myacc_form_container">
                            <div class="myacc_form">
                                <legend>2. Edit your personal information</legend>
                                <div class="row">
                                    <div class="large-5 columns">
                                        <label for="title">Title:</label>
                                    </div>
                                    <div class="large-7 columns">
                                        <select name="title">
                                            <option value="mr">Mr</option>
                                            <option value="mrs">Mrs</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-5 columns">
                                        <label for="firstname" >Firstname:</label>
                                    </div>
                                    <div class="large-7 columns">
                                        <input type="text" name="firstname" required value="<?php echo $user->getFirstname(); ?>"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-5 columns">
                                        <label for="surname" >Surname:</label>
                                    </div>
                                    <div class="large-7 columns">
                                        <input type="text" name="surname" required value="<?php echo $user->getSurname(); ?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-5 columns">
                                        <label for="address1">Housename/number</label>
                                    </div>
                                    <div class="large-7 columns">
                                        <input type="text" name="address1" required value="<?php echo $user->getAddress1(); ?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-5 columns">
                                        <label for="street">Street</label>
                                    </div>
                                    <div class="large-7 columns">
                                        <input type="text" name="street" required value="<?php echo $user->getStreet(); ?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-5 columns">
                                        <label for="city">City</label>
                                    </div>
                                    <div class="large-7 columns">
                                        <input type="text" name="city" required value="<?php echo $user->getCity(); ?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-5 columns">
                                        <label for="county">County:</label>
                                    </div>
                                    <div class="large-7 columns">
                                        <input type="text" name="county" required value="<?php echo $user->getCounty(); ?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-5 columns">
                                        <label for="postcode">Postcode:</label>
                                    </div>
                                    <div class="large-7 columns">
                                        <input type="text" name="postcode" required value="<?php echo $user->getPostcode(); ?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-5 columns">
                                        <label for="date">Date of birth:</label>
                                    </div>
                                    <div class="large-7 columns">
                                        <input type="date" name="dob" required value="<?php echo $user->getDob(); ?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-5 columns">

                                    </div>
                                    <div class="large-7 columns">
                                        <input type="submit" value="Update" id="update_user" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                 </div>
            </div>

        </div>


    </div>






</body>
</html>
