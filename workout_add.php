<?php
/**
 * Created by PhpStorm.
 * User: Gwilliam
 * Date: 17/03/14
 * Time: 19:02
 */

include_once 'db_connect.php';
include_once 'includes/functions.php';
include_once 'classes/user.php';
include_once 'classes/workout.php';

sec_session_start();
$user = new user();
$username = $_SESSION['username'];


$workout = new workout();
if($_POST['workout_name'] == ""){
	header("Location: workout.php?success=empty");
}
if($_POST['workout_type'] == ""){
	header("Location: workout.php?success=typeempty");	
}

else {
$workoutName = $_POST['workout_name'];

$type = $_POST['workout_type'];

$workout->setWorkoutName($workoutName);
$workout->setWorkoutType($type);


if($workout->createWorkout($workoutName, $type, $_SESSION['username'], $mysqli) == true){
    //insert query was successful return user to exercise page where they can begin adding exercises to their workout

   header("Location: workout.php?success=1");
}
else if($workout->createWorkout($workoutName, $type, $_SESSION['username'], $mysqli) == false){

    header("Location: workout.php?success=no");
}

}