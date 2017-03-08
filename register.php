<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TitanTrackr | </title>
    <?php
    include_once 'db_connect.php';
    include_once 'includes/functions.php';
    include_once 'register.inc.php';
    include_once 'classes/user.php';
    include_once 'classes/exercise.php';

    sec_session_start(); // Our custom secure way of starting a PHP session.
    ?>
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/modernizr.js"></script>
    <script type="text/JavaScript" src="forms.js"></script>
    <script type="text/JavaScript" src="sha512.js"></script>

</head>

<body>
<div class="home_header_container">
    <div class="row">
        <header class="home_header">
            <div class="large-1 columns">
                <div class="home_logo"></div>
            </div>
            <div class="large-11 columns">
                <div class="home_siteTitle">
                    <span class="home_siteTitleBlue">Titan</span><span class="home_siteTitleLightBlue">Trackr</span>
                </div>
            </div>
        </header>
    </div>
</div>

<div class="row">
    <div class="large-6 columns">
        <div class="myacc_form_container">
            <div class="myacc_form">
                <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post">
                    <legend>1. Create your login details</legend>
                    <div class="row">
                        <div class="large-5 columns">
                            <label for="email">Email:</label>
                        </div>
                        <div class="large-7 columns">
                            <input type="email" required name="email" id="email" autofocus="true" placeholder="joebloggs@hotmail.com"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-5 columns">
                            <label for="username">Username:</label>
                        </div>
                        <div class="large-7 columns">
                            <input type="text" required name="username" id="username"  placeholder="joeBloggs123"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-5 columns">
                            <label for="password">Password:</label>
                        </div>
                        <div class="large-7 columns">
                            <input type="password" required name="password" id="password" placeholder="enter a password between 6-12 characters"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-5 columns">
                            <label for="confirmpw">Confirm:</label>
                        </div>
                        <div class="large-7 columns">
                            <input type="password" required name="confirmpw" id="confirmpw" placeholder="confirm your password"/>
                        </div>
                    </div>
            </div>
        </div>
        <div class="myacc_form_container">
            <div class="myacc_form">
                    <legend>2. Add your gym data</legend>
                    <div class="row">
                        <div class="large-5 columns">
                            <label for="weight">Weight (kg):</label>
                        </div>
                        <div class="large-7 columns">
                            <input type="number" required name="weight" autofocus="true" placeholder="55"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-5 columns">
                            <label for="height">Height (cm):</label>
                        </div>
                        <div class="large-7 columns">
                            <input type="number" required name="height" placeholder="170"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-5 columns">
                            <label for="goal">Goal</label>
                        </div>
                        <div class="large-7 columns">
                            <select required name="goal">
                                <option value="">Choose your goal:</option>
                                <option value="Strength Training">Strength Training</option>
                                <option value="Weight Loss">Weight Loss</option>
                                <option value="Rehabilitation">Rehabilitation</option>
                            </select>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="large-6 columns">
        <div class="myacc_form_container">
            <div class="myacc_form">
                    <legend>3. Add your personal information</legend>
                    <div class="row">
                        <div class="large-5 columns">
                            <label for="title">Title:</label>
                        </div>
                        <div class="large-7 columns">
                            <select required name="title">
                                <option value="">Select title:</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-5 columns">
                            <label for="firstname" >Firstname:</label>
                        </div>
                        <div class="large-7 columns">
                            <input type="text" required name="firstname" placeholder="Joe"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-5 columns">
                            <label for="surname" >Surname:</label>
                        </div>
                        <div class="large-7 columns">
                            <input type="text" required name="surname" placeholder="Bloggs"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-5 columns">
                            <label for="address1">Housename/number</label>
                        </div>
                        <div class="large-7 columns">
                            <input type="text" required name="address1" placeholder="Brookstone House"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-5 columns">
                            <label for="street">Street</label>
                        </div>
                        <div class="large-7 columns">
                            <input type="text" required name="street" placeholder="Aston Munslow"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-5 columns">
                            <label for="city">City</label>
                        </div>
                        <div class="large-7 columns">
                            <input type="text" required name="city" placeholder="Ludlow" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-5 columns">
                            <label for="county">County:</label>
                        </div>
                        <div class="large-7 columns">
                            <input type="text" required name="county" placeholder="Herefordshire"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-5 columns">
                            <label for="postcode">Postcode:</label>
                        </div>
                        <div class="large-7 columns">
                            <input type="text" required name="postcode" placeholder="ST16 3HT"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-5 columns">
                            <label for="date">Date of birth:</label>
                        </div>
                        <div class="large-7 columns">
                            <input type="date" required name="dob" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-5 columns">

                        </div>
                        <div class="large-7 columns">
                            <input type="submit" value="Register" id="register_btn" onclick="return submitFormHash(this.form,this.form.password,this.form.confirmpw);" />
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </form>
</div>




</body>
</html>
