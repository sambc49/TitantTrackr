<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TitanTrackr | </title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="js/modernizr.js"></script>
    <?php
    include_once 'db_connect.php';
    include_once 'includes/functions.php';
    include_once 'classes/user.php';
    include_once 'classes/exercise.php';

    sec_session_start(); // Our custom secure way of starting a PHP session.
    $muscleGroupID = $_GET['m'];
    $_SESSION['muscleGroup'] = $muscleGroupID;


    $username = $_SESSION['username'];
    $user = new user();
    $exercise = new exercise();
    if($user->login_check($mysqli) == true){
        $logged = "in";
    }
    else {
        $logged = "out";
        header("Location: index.php");

    }

    if($_GET['AddExerciseSuccess'] == 1){
        ?>
        <script>$( document ).ready(function() {
                $('.successBox').fadeIn(1000).delay(5000).fadeOut(1000);
            });</script>
    <?php

    }
    if($_GET['AddExerciseSuccess'] == 'no'){
        $error_message = "Exercise already exists!"
        ?>
        <script>$( document ).ready(function() {
                $('.failureBox').fadeIn(1000).delay(5000).fadeOut(1000);
            });</script>
    <?php
    }
    if($_GET['AddExerciseSuccess'] == 'emptyworkout'){
        $error_message = "Select a workout!";
        ?>
        <script>$( document ).ready(function() {
                $('.failureBox').fadeIn(1000).delay(5000).fadeOut(1000);
            });</script>
    <?php
    }

    ?>
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
                                    echo "<img class='exclamation' src='images/icons/exclamation.png' />";
                                }?>
                                <span style="display:none;">&#x25BC;</span>
                            </a>
                            <div id="profile-content">
                                <ul>
                                    <li><a href="myaccount.php">My account</a></li>
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

        <div class="large-2 columns darkBlue">
            <div class="left_col">
                <ul>
                    <li><a href="home.php"><img src="images/icons/ic_action_home.png" />Home</a></li>
                    <li><a href="exercises.php"><img src="images/icons/dumbellIcon2.png" />Exercises</a></li>
                    <li><a href="workout.php"><img src="images/icons/ic_action_document.png" />Workouts</a></li>
                    <li><a href=""><img src="images/icons/ic_action_achievement.png" />Progress</a></li>
                    <li><a href=""><img src="images/icons/ic_action_users.png" />Social</a></li>
                </ul>
            </div>
        </div>

        <div class="large-10 columns white">
            <div class="main_content">
                <div class='successBox' style='display:none'><img src="images/icons/tick_icon.png" />Exercise successfully added</div>
                <div class='failureBox' style='display:none'><img src="images/icons/error_icon.png" /><?php echo $error_message; ?></div>
                <h2>Choose Muscle group</h2>
                    <?php $exercise->exerciseMuscleGroup($muscleGroupID, $username, $mysqli); ?>

            </div>
        </div>

</div>



</body>
</html>
