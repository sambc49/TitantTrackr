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
    include_once 'classes/workout.php';

    sec_session_start();
    $user = new user();
        if($user->login_check($mysqli) == true){
            $logged = "in";
        }
        else {
            $logged = "out";
            header("Location: index.php");
        }
    $username = $_SESSION['username'];
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
        $error_message = "Workout already exists!";
    }
        if($_GET['success'] == 'empty'){
        ?>
        <script>$( document ).ready(function() {
                $('.failureBox').fadeIn(1000).delay(5000).fadeOut(1000);
            });</script>
    <?php
    $error_message = "Enter a workout name!";
    }
 if($_GET['success'] == 'typeempty'){
        ?>
        <script>$( document ).ready(function() {
                $('.failureBox').fadeIn(1000).delay(5000).fadeOut(1000);
            });</script>
    <?php
    $error_message = "Select workout type!";
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
        })

            $(".del_workout").mouseover(function(){
                $(this).parent().find(".warning_box").show();

            });
            $(".del_workout").mouseout(function(){
                $("p").css("background-color","lightgray");
                $(".warning_box").hide();
            });

    });
</script>
  </head>

<body>


<div class="home_header_container">
    <header class="home_header">
        <div class="large-1 columns">
            <a href="home.php"><div class="home_logo"></div></a>
        </div>
        <div class="large-7 columns">
            <div class="home_siteTitle">
                <a href="home.php"><span class="home_siteTitleBlue">Titan</span><span class="home_siteTitleLightBlue">Trackr</span></a>
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

<div class="row no-margins">

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

            <div class='successBox' style='display:none'><img src="images/icons/tick_icon.png" />Workout successfully created!</div>
            <div class='failureBox' style='display:none'><img src="images/icons/error_icon.png" /><?php echo $error_message; ?></div>
            <h2>Your workouts</h2>
            <hr />
            <?php $workout = new workout();
            $workout->displayWorkouts($username, $mysqli); ?>


            <!--<div id='mask' class='close_modal'></div>

            <div id='first_window' class='modal_window'> -->

            <div class="large-8 columns">
                <div class="workout_form_container">
                    <div class="workout_form">
                        <form id="create_workout" action="workout_add.php" method="post">
                            <legend>Create a new workout</legend>
                            <div class="row">
                                <div class="large-5 columns">
                                    <label for="gender">Name:</label>
                                </div>
                                <div class="large-7 columns">
                                    <input type="text" name="workout_name" required placeholder="workout name" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-5 columns">
                                    <label for="type">Type:</label>
                                </div>
                                <div class="large-7 columns">
                                    <select required name="workout_type">
                                        <option value="">Select workout type:</option>
                                        <option value="Full Body Workout">Full Body Workout</option>
                                        <option value="Strength Training">Strength Training</option>
                                        <option value="Weight Loss">Weight Loss</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-5 columns">
                                </div>
                                <div class="large-7 columns">
                                    <input type="submit" value="Create" id="submit"  />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


</div>
</body>
</html>
