<?php
/**
 * Created by PhpStorm.
 * User: Gwilliam
 * Date: 19/03/14
 * Time: 13:43
 */

class gymactivity {
    private $gymActivityID;
    private $workoutExerciseID;
    private $userID;
    private $exercise;
    private $repititions;
    private $weight;
    private $time;


    public function displayLatestExercise($username, $mysqli){
        $workoutExerciseID = 0;
        //query to retrieve latest workoutExerciseID where exercise ID can be retrieved.
        $sql="SELECT we.workoutExerciseID, we.workoutID, we.exerciseID, w.username, e.name, e.muscleGroupID, e.difficulty FROM workoutExercise we INNER JOIN workout w ON we.workoutID = w.workoutID INNER JOIN exercise e ON we.exerciseID=e.exerciseID WHERE username = '$username'";
        $rs=$mysqli->query($sql);

        while($row = $rs->fetch_assoc()){
            $row['workoutExerciseID'];

            //retrieve workoutExerciseID from gymactivity table
            $nfc_sql="SELECT * FROM gymactivity WHERE username = '$username'";
            $nfc_rs=$mysqli->query($nfc_sql);

            while($row2 = $nfc_rs->fetch_assoc()){
                //when the workoutExerciseID's match with those of the gym activity table, assign workoutID to a variable
                //once there is more than one workoutExerciseID it will select most recent.
                if($row['workoutExerciseID'] == $row2['workoutExerciseID']){
                   $workoutExerciseID = $row['workoutExerciseID'];

                }
            }
        }

        //output the exercise depending on the workoutExerciseID retrieved above
        $exe_sql="SELECT we.workoutExerciseID, we.workoutID, we.exerciseID, w.username, e.name, e.muscleGroupID, e.difficulty, e.pictureUrl FROM workoutExercise we INNER JOIN workout w ON we.workoutID = w.workoutID INNER JOIN exercise e ON we.exerciseID=e.exerciseID WHERE username = '$username' AND workoutExerciseID = '$workoutExerciseID'";
        $exe_rs=$mysqli->query($exe_sql);

        //query to retrieve exercise info from nfc table
        $stats_sql="SELECT * FROM gymactivity WHERE workoutExerciseID = '$workoutExerciseID' ORDER BY gymActivityID DESC LIMIT 1";
        $stats_rs=$mysqli->query($stats_sql);




        while($row3 = $exe_rs->fetch_assoc()){

            while($row4 = $stats_rs->fetch_assoc()){
                $this->repititions = $row4['repititions'];
                $this->weight = $row4['weight'];
                $this->time = $row4['time'];
                $this->exercise = $row3['name'];
            
            echo "<div class='large-12 columns latest-exercise'>
                <div class='row'>
                <div class='large-8 columns'><h5>".$row3['name']."</h5>
                <img src='".$row3['pictureUrl']."' /></div>
                <div class='large-4 columns exc_details'>
                <h5>Statistics</h5>
                <p><img src='images/icons/weight_icon.png' />".$row4['weight']."</p>
                <p><img src='images/icons/reps_icon.png' />".$row4['repititions']."</p>
                <p><img src='images/icons/clock_icon.png' />".gmdate('H:i:s', $row4['time'])."</p>

                </div>
                
            </div>";
            echo "</div>";
            }
        }

    }

    public function workoutTotals($username, $mysqli){
        //function to retrieve workout totals for user
        $reps_total = "";
        $weight_total ="";
        $time_total = "";

        //query to retrieve all records from gymactivity where username = username

        $sql="SELECT * FROM gymactivity where username = '$username'";
        $rs=$mysqli->query($sql);

        $rows_returned = $rs->num_rows;
        if($rows_returned < 1){
            //no workouts completed
            echo "<div class='large-12 columns'><h5>You have no workout information available</h5></div>";
        }
        else {
            while($row = $rs->fetch_assoc()){

                $reps_total +=$row['repititions'];
                $weight_total += $row['weight'];
                $time_total += $row['time'];
            }
            echo "<div class='large-12 columns'>

                <ul class='workout_totals'>
                    <li><img src='images/icons/weight_icon_large.png' />".$weight_total."<span class='totals-label'>kg</span></li>
                    <li><img src='images/icons/reps_icon_large.png' />".$reps_total."<span class='totals-label'>reps</span></li>
                    <li><img src='images/icons/clock_icon_large.png' />".gmdate('H:i:s', $time_total)."<span class='totals-label'>secs</span></li>
                </ul>
                <p></p>
                <p></p>
                <p></p>
            </div>";
        }
    }

    /**
     * @param mixed $gymActivityID
     */
    public function setGymActivityID($gymActivityID)
    {
        $this->gymActivityID = $gymActivityID;
    }

    /**
     * @return mixed
     */
    public function getGymActivityID()
    {
        return $this->gymActivityID;
    }

    /**
     * @param mixed $repititions
     */
    public function setRepititions($repititions)
    {
        $this->repititions = $repititions;
    }

    /**
     * @return mixed
     */
    public function getRepititions()
    {
        return $this->repititions;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $workoutExerciseID
     */
    public function setWorkoutExerciseID($workoutExerciseID)
    {
        $this->workoutExerciseID = $workoutExerciseID;
    }

    /**
     * @return mixed
     */
    public function getWorkoutExerciseID()
    {
        return $this->workoutExerciseID;
    }

    /**
     * @param mixed $Exercise
     */

    public function setExercise($exercise)
    {
        $this->exercise = $exercise;
    }

    /**
     * @return mixed
     */
    public function getExercise()
    {
        return $this->exercise;
    }

} 