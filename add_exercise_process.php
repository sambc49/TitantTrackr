<?php
/**
 * Created by PhpStorm.
 * User: Gwilliam
 * Date: 17/03/14
 * Time: 13:27
 */

include_once 'db_connect.php';
include_once 'includes/functions.php';
include_once 'classes/user.php';
include_once 'classes/exercise.php';
include_once 'classes/workout.php';

sec_session_start(); // Our custom secure way of starting a PHP session.
/*
do the method that will check to see if exercise already exists in workout
if return false (exercise exists) send back to exercise list with error message
if return true return to exercise list and pop up message saying exercise added successfully
*/

if($_POST['workout_list'] == ""){
	//Workout not selected, return user with error message
	header("Location: exerciselist.php?m=".$_SESSION['muscleGroup']."&AddExerciseSuccess=emptyworkout");
}
else {
$workoutID = $_POST['workout_list'];
$exerciseID = $_POST['exerciseID'];

$workout = new workout();

if($workout->addExerciseWorkout($exerciseID, $workoutID, $mysqli) == true){
    //workout successfully added
    header("Location: exerciselist.php?m=".$_SESSION['muscleGroup']."&AddExerciseSuccess=1");

}

else if($workout->addExerciseWorkout($exerciseID, $workoutID, $mysqli) == false){
    //workout not added successfully
    header("Location: exerciselist.php?m=".$_SESSION['muscleGroup']."&AddExerciseSuccess=no");
}
}

