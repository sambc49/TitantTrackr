<?php
/**
 * Created by PhpStorm.
 * User: Gwilliam
 * Date: 05/03/14
 * Time: 13:57
 */

class workout {
    private $workoutID;
    private $workoutName;
    private $workoutType;

    function __construct()
    {

    }

    public function createWorkout($name, $workoutType, $username, $mysqli){
    //check to see if workout already exists
    $sql="SELECT * FROM workout WHERE name='$name' AND username = '$username'";
    $rs=$mysqli->query($sql);

    $rows_returned = $rs->num_rows;
    if($rows_returned > 0){
        //workout exists
        return false;
    }
    else {
        //complete the insert query for workouts
        $ins_sql="INSERT into workout (workoutID, name, workoutType, username) VALUES (NULL, '$name','$workoutType','$username')";
        $rs2=$mysqli->query($ins_sql);
        return true;
    }


    }

    public function addExerciseWorkout($exerciseID, $workoutID, $mysqli){
        //function to add exercise to workout
        $sql="SELECT * FROM workoutExercise WHERE workoutID = '$workoutID' AND exerciseID = '$exerciseID'";
        $rs=$mysqli->query($sql);
        $rows_returned = $rs->num_rows;
        if($rows_returned > 0){
            //this exercise has already been added to the workout.
            //provide message
            return false;

        }
        else {
            //do the insert query
            $ins_sql="INSERT into workoutExercise (workoutID, exerciseID) VALUES ($workoutID, $exerciseID)";
            $mysqli->query($ins_sql);
            //query successful return true
            return true;
        }

    }

    public function displayWorkouts($username, $mysqli){
        $workoutCount = 0;
        $sql="SELECT * FROM workout WHERE username = '$username'";
        $rs=$mysqli->query($sql);

        //query to get workout data
        echo "<div class='row no-margins'>";
        while ($row = $rs->fetch_assoc()) {
            $workoutID = $row['workoutID'];

            //get exercises from workouts
            $sql2="SELECT we.workoutExerciseID, we.workoutID, we.exerciseID, e.name FROM workoutExercise we INNER JOIN exercise e on we.exerciseID=e.exerciseID WHERE workoutID = '$workoutID'";
            $rs2=$mysqli->query($sql2);


            $exc_list = "<ul>";
            $exc_list .= "<li style='border-bottom:1px solid #ccc;'>Exercises in this workout:</li>";
            //populate list of exercises
            while($row2 = $rs2->fetch_assoc()){
                $exc_list .= "<li>".$row2['name']."</li>";
            }
            $workoutCount ++;
            if ($workoutCount >2){
                echo "</div>";
                echo "<div class='row no-margins top-space'>";
            }
            echo "<div class='large-6 columns'><div class='work_exc_detail'><h3>".$row['name']."</h3>
            <form action='remove_workout.php' method='post'>
            <input type='image' alt='Submit' class='del_workout' src='images/icons/error_icon.png' />
            <div class='warning_box'><p>Remove this workout and all it's data.</p></div>
            <input type='hidden' name='workoutID' value=".$row['workoutID']." />
            </form>
            ".$exc_list."</ul>
            </div></div>";
        }
        echo "</div>";
    }

    public function removeWorkout($workoutID, $mysqli){
        //remove from workout table
        $sql="DELETE FROM workout WHERE workoutID = '$workoutID'";
        $rs=$mysqli->query($sql);

        //remove from workoutExercise
        $sql2="DELETE FROM workoutExercise WHERE workoutID = '$workoutID'";
        $rs2=$mysqli->query($sql);

        //check to see if result has been deleted
        $select_sql="SELECT * FROM workout WHERE workoutID = '$workoutID'";
        $select_rs=$mysqli->query($select_sql);

        $num_rows = $select_rs->num_rows;
        if($num_rows > 0){
            return false;
        }
        if($num_rows == 0){
            return true;
        }
    }
    /**
     * @param mixed $workoutID
     */
    public function setWorkoutID($workoutID)
    {
        $this->workoutID = $workoutID;
    }

    /**
     * @return mixed
     */
    public function getWorkoutID()
    {
        return $this->workoutID;
    }

    /**
     * @param mixed $workoutName
     */
    public function setWorkoutName($workoutName)
    {
        $this->workoutName = $workoutName;
    }

    /**
     * @return mixed
     */
    public function getWorkoutName()
    {
        return $this->workoutName;
    }

    /**
     * @param mixed $workoutType
     */
    public function setWorkoutType($workoutType)
    {
        $this->workoutType = $workoutType;
    }

    /**
     * @return mixed
     */
    public function getWorkoutType()
    {
        return $this->workoutType;
    }


} 