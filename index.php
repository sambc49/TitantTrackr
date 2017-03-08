<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TitanTrackr | </title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/modernizr.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
 <script type="text/JavaScript" src="forms.js"></script> 
 <script type="text/JavaScript" src="sha512.js"></script> 
  <script>
      $(document).ready(function(){
        $('#login-trigger').click(function(){
          $(this).next('#login-content').slideToggle();
          $(this).toggleClass('active');          
          
          if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
            else $(this).find('span').html('&#x25BC;')
          })
      });
  </script>
  		<?php
  			//include scripts
			include_once 'db_connect.php';
			include_once 'classes/user.php';
			include_once 'includes/functions.php';
      session_start();
		 

     if($_GET['loginerror'] == 1){
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
        <div class="row">
        <header class="home_header">
          <div class="large-1 columns">
            <a href="index.php"><div class="home_logo"></div></a>
          </div>
          <div class="large-4 columns">
            <div class="home_siteTitle">
              <a href="index.php"><span class="home_siteTitleBlue">Titan</span><span class="home_siteTitleLightBlue">Trackr</span></a>
            </div>
          </div>
          <div class="large-7 columns">
            <nav>
              <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Tour</a></li>
                <li id="login">
                  <a id="login-trigger" href="#">
                    Login <span style="display:none;">&#x25BC;</span>
                  </a>
                  <div id="login-content">
                    <form method="POST" action="login_process.php" id="index_login">
                        <input type="email" name="email" required id="email" placeholder="Your email address" />
                        <input type="password" name="password" required id="password" placeholder="Password" />
                        <input type="submit" id="index_submit" value="Login" onclick="formhash(this.form, this.form.password);" />
                    </form>
                  </div>                     
                </li>
                <li><a href="register.php">Register</a></li>
              </ul>
            </nav>          
          </div>
      </header>
      </div>
     </div>
      <div class="headerImage">
      <div class='failureBox' style='display:none'><img alt="error" src="images/icons/error_icon.png" class="error_icon" />Incorrect Login Details!</div>
          <img alt="header_image" src="images/content/headerImageNew.jpg" />
          <div id="headerImageContent"></div>
          <div id="headerImageText"><p>Revolutionise the way you workout</p></div>

      </div>
   

    <div class="row">
      <div class="icon_descriptions">
        <div class="large-3 columns">
          <div class="icon"><img alt="dumbell icon" src="images/dumbell_icon.png" />
              <h3>Exercise Database</h3>
              <p class="icon_desc">TitanTrackr has a wide range of exercises to choose from.</p>
          </div>
        </div>
        <div class="large-3 columns">
          <div class="icon"><img alt="workout icon" src="images/workout_icon.png" />
            <h3>Build Your Workout</h3>
            <p class="icon_desc">Build your own fully customizable workout designed for you.</p>
          </div>
        </div>
        <div class="large-3 columns">
          <div class="icon"><img alt="graph icon" src="images/graph_icon.png" />
            <h3>Track Your Progress</h3>
            <p class="icon_desc">Track all of your gym activity and watch as you progress.</p>
          </div>
        </div>
        <div class="large-3 columns">
          <div class="icon"><img alt="social icon" src="images/social_icon.png" />
            <h3>Conect With Friends</h3>
            <p class="icon_desc">Connect with your friends and compare yourself on leaderboards.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="middle_section">
      <div class="row">
        <div class="large-12 columns">
            <div class="large_text"><p class="middle_large_text">Better, Faster, Stronger.</p></div>
        </div>
      </div>
      <div class="row">
        <div class="multi_device_imgs">
          <div class="large-6 columns">
            <div class="device_image"><img alt="multi device image" src="images/multi_device1.png" /></div>
          </div>
          <div class="large-6 columns">
            <div class="device_image"><img alt="multi device image 2" src="images/multi_device2.png" /></div>
          </div>
        </div>
      </div>
     <div class="row">
        <div class="large-12 columns">
            <div class="large_text"><p class="middle_large_subtext">With a wide range of exercises and workouts, TitanTrackr is the best way to manage your gym experience.</p></div>
        </div>
      </div>  
    </div>
    <div class="middle_lower_section">
      <div class="row">
        <div class="large-12 columns">
          <div class="large_text"><p class="middle_large_text">Less distractions, more focus.</p></div>
        </div>
      </div>
      <div class="row">
        <div class="large-6 columns">
          <img alt="nfc image" src="images/nfc_scan.png" />
        </div>
        <div class="large-6 columns">
          <img alt="chest press image" src="images/nfc_scan2.png" />
        </div>
      </div>
      <div class="row">
        <div class="large-12 columns">
          <div class="large_text"><p class="middle_large_subtext">Automatically save your workout data to your profile by scanning gym equipment.</p></div>
        </div>
      </div>
    </div>  
    <div class="testimonials">
      <div class="row">
        <div class="large-6 columns">
          <h4>Testimonials</h4>
          <div class="testimonial">
            <div class="row">
              <div class="large-2 columns">
                <img alt="testimonial face" src="images/testimonial.png" />
              </div>
              <div class="large-10 columns">
                <p class="testimonial_text"><em>"This app changed my life! I was able to log my gym activity without being on my phone all the time"</em></p>
              </div>
            </div>
        </div>
          <div class="row">
            <div class="large-2 columns">
              <img alt="testimonial face 2" src="images/testimonial2.png" />
            </div>
            <div class="large-10 columns">
              <p class="testimonial_text"><em>"By using this app I find I can manage my workouts a lot easier and more efficiently"</em></p>
            </div>
          </div>      
          <div class="social">
            <div class="row">
              <div class="large-12 columns">
                    <img alt="google play icon" class="google_play_icon" src="images/google_play.png" />
                    <img alt="facebook icon" class="social_icons" src="images/fb_hover.png" />
                    <img alt="twitter icon" class="social_icons" src="images/twitter_hover.png" />
                    <img alt="google plus icon" class="social_icons" src="images/gplus_hover.png" />
                </div>
              </div>
          </div>    
        </div>
       <div class="large-6 columns">
          <h4>Get In Touch</h4>
          <div class="row">
            <div class="large-12 columns">
              <form id="contact_form">
                <input class="contactInput" type="text" placeholder="name"/><br />
                <input class="contactInput" type="text" placeholder="email" /><br />
                <textarea rows="4" cols="50" class="contactInput2" placeholder="message"></textarea><br />
                <input class="submitBtn" type="submit" value="send" />
              </form>
            </div>
          </div>        
        </div>        
      </div>
    </div>
      <footer>
      <div class="row">
          <div class="large-4 columns">
            <ul class="footer_links">
              <li><a class="footer_link" href="">About</a></li>
              <li>|</li>
              <li><a class="footer_link" href="">Privacy Policy</a></li>
            </ul>

        </div>
        <div class="large-8 columns">
          <p>TitanTrackr &copy; 2014. All rights reserved. Created by Sam Gwilliam
        </div>
      </div>
    </footer>

  </body>
</html>
