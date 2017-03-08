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
    include_once 'classes/gymactivity.php';

    sec_session_start(); // Our custom secure way of starting a PHP session.
    $user = new user();
    $gymactivity = new gymactivity();
        if($user->login_check($mysqli) == true){
            $logged = "in";
        }
        else {
            $logged = "out";
            header("Location: index.php");
        }

    $username = $_SESSION['username'];
    $reps = "25";

    ?>


      <script>
          $(document).ready(function(){
              $('#profile-trigger').click(function(){
                  $(this).next('#profile-content').slideToggle();
                  $(this).toggleClass('active');

                  if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
                  else $(this).find('span').html('&#x25BC;')
              })
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
              <div class="row no-margins">
                  <div class="large-12 columns"><h2>Your recent activity</h2></div>
              </div>
              <div class="row no-margins">
                  <div class="large-6 columns">
                      <h3>Latest exercise:</h3>
                      <?php $gymactivity->displayLatestExercise($_SESSION['username'], $mysqli)?>
                      <a href="https://twitter.com/home?status=I%20just%20logged:%20<?php echo $gymactivity->getExercise(); ?>,%20<?php echo $gymactivity->getRepititions(); ?>reps,%20<?php echo $gymactivity->getWeight();?>kg%20using%20titantrackr.%20Start%20logging%20your%20gym%20activity%20now%20www.titantrackr.co.uk"><img class="tweet-button" src="images/icons/tweet-button.png" alt="tweet button"/></a>

                <?php
                    $title=urlencode('TitanTrackr');
                    $url=urlencode('http://www.titantrackr.co.uk/home.php');
                    $summary=urlencode('I just completed 25 reps');
                    $image=urlencode('http://titantrackr.co.uk/images/logo_50x50.png');
                ?>
                <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)">
                  <img src="images/icons/facebook-share.png" class="facebook-share" alt="share on facebook" />
                </a>

                  </div>
                  <div class="large-6 columns"><img class="stats_img" src="images/content/cable_crossover_stats.png" /></div>
              </div>
              <div class="row no-margins">
                  <div class="row no-margins"><div class="large-12 columns"><h3>Your workout totals:</h3></div></div>
                  <?php $gymactivity->workoutTotals($username, $mysqli); ?>
              </div>
          </div>
      </div>

  </div>

  </div>
  </body>
</html>
