<?php
/**
 * Created by PhpStorm.
 * User: Gwilliam
 * Date: 06/04/14
 * Time: 11:34
 */
include_once 'db_connect.php';
include_once 'includes/functions.php';
include_once 'classes/user.php';
include_once 'classes/workout.php';

sec_session_start();
$user = new user();
$workout = new workout();

$workoutID = $_POST['workoutID'];

if($workout->removeWorkout($workoutID, $mysqli) == true){
    header("Location: workout.php");
}
else if($workout->removeWorkout($workoutID, $mysqli) == false){
    header("Location: workout.php");
}




