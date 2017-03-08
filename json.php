<?php

include "db_config.php";



if(!empty($_POST))
{
    $weID = $_POST['weID'];

	$response["success"]  = "Yes";
	echo json_encode($response);

    $workoutExerciseID = intval($weID);

	$username = $_POST['username'];
	$reps = $_POST['reps'];
	$weight = $_POST['weight'];
	$time = $_POST['time'];
	$query = "INSERT INTO gymactivity (gymactivityID, workoutExerciseID, username, repititions, weight, time) VALUES (null, '$workoutExerciseID', '$username', '$reps', '$weight', '$time')";
	$result = mysql_query($query);

}


/*

$json = $_GET['json'];

$data = json_decode($json, TRUE);
var_dump($data);

$userID = $_GET['userID'];
$reps = $_GET['reps'];
$weight = $_GET['weight'];
$time = $_GET['time'];

echo $userID;
echo $reps;
echo $weight;
echo $time;

echo $query;
*/
?>