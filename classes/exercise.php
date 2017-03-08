<?php
/**
 * Created by PhpStorm.
 * User: Gwilliam
 * Date: 05/03/14
 * Time: 13:53
 */

class exercise {

    private $exerciseID;
    private $name;
    private $muscleGroup;
    private $difficulty;
    private $pictureUrl;



    function __construct(){

    }

    public function fill(){
        $this->exerciseID = $this->$exerciseID;
        $this->name = $this->$name;
        $this->muscleGroup = $this->$muscleGroup;
        $this->difficulty = $this->$difficulty;
        $this->pictureUrl = $this->$pictureUrl;
    }

    public function displayMuscleGroups($mysqli){

        $sql="SELECT * FROM muscleGroup ORDER BY name";
        $rs=$mysqli->query($sql);

        if($rs === false) {
            trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $mysqli->error, E_USER_ERROR);
        } else {
            $rows_returned = $rs->num_rows;

        }

        while($row = $rs->fetch_assoc()){
            $musGroupID = $row['muscleGroupID'];

            $sql2="SELECT * FROM exercise WHERE muscleGroupID = $musGroupID";
            $rs2=$mysqli->query($sql2);

            echo "<div class='large-4 columns'><h3>" . $row['name'] . "</h3><a href='exerciselist.php?m=" .$row['muscleGroupID']. "'>
            <div class='muscleGroupHolder' style='background-color:white; height:330px;'><img src='" .$row['pictureUrl']. "' /></a>
            <div class='exerciseInfo'>
                <div class='numExercises'>
                    <div class='number'>".$rs2->num_rows."</div>
                 </div>
                <div class='exercise-label'>
                    exercises
                </div>
                <div class='browse'>
                    <a href='exerciselist.php?m=" .$row['muscleGroupID']. "'><button class='browse_btn'>Browse</button></a>
                </div>

            </div>
            </div></div>";
        }
    }


    public function exerciseMuscleGroup($muscleGroupId, $username, $mysqli){
        $row_count = 0;
        //function to list out exercises based on the muscle group selected
        $sql="SELECT * FROM exercise WHERE muscleGroupID = '$muscleGroupId'";
        $rs=$mysqli->query($sql);

        $sql2="SELECT * FROM workout WHERE username = '$username'";
        $rs2=$mysqli->query($sql2);

        if($rs === false){
            trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $mysqli->error, E_USER_ERROR);
        }
        else {
            $rows_returned = $rs->num_rows;
        }

        if($rs2 === false){
            trigger_error('Wrong SQL: ' . $sql2 . ' Error: ' . $mysqli->error, E_USER_ERROR);
        }
        else {
            $rows_returned2 = $rs2->num_rows;
        }



        $html = "<select required name='workout_list' id='workout_list' style='width:auto'>";
        $html .="<option value=''>Choose workout:</option>";
        while ($row2 = $rs2->fetch_assoc()) {
            $html .= "<option value='".$row2['workoutID']."'>" . $row2["name"] . "</option>";
        }
        $html .= "</select>";

        while($row = $rs->fetch_assoc()){

            $diff = "<img class='diff_icon' src='images/icons/beginner.png' />";
            if ($row['difficulty'] == 'Intermediate'){
                $diff .= "<img class='diff_icon_int' src='images/icons/beginner.png' />";
            }
            if($row['difficulty'] == 'Expert'){
                $diff .= "<img class='diff_icon_int' src='images/icons/beginner.png' /><img class='diff_icon_int' src='images/icons/beginner.png' />";
            }
            $row_count++;

            echo "<div class='row no-margins'>";
            echo "<div class='large-4 columns'><h3>".$row['name']."</h3>
            <form id='exercise_list_form' method='post' action='add_exercise_process.php'>
                <img src='".$row['pictureUrl']."' />
                <ul class='exercise_detail'>
                    <li class='exercise_desc_title'>Difficulty<span style='float:right'>".$diff."</span></li>
                    <li class='exercise_desc_title'>Type<span style='float:right'>".$row['type']."</span></li>
                    <li class='exercise_desc_title'>Force<span style='float:right'>".$row['force']."</span></li>
                    <li class='exercise_desc_title'>".$html."<button id='addToWorkout'>Add to workout</button></li>
                </ul>
                <input type='hidden' name='exerciseID' value='".$row['exerciseID']."'>
                </form>
                </div>";

            if($row_count == 3){
               echo "</div>";
               echo "<div class='row no-margins'>";
                $row_count = 0;
            }


            /*echo "<div class='large-4 columns exercise'><form method='post' action='add_exercise_process.php'>
            <h3>" . $row['name'] . "</h3><img src='" .$row['pictureUrl']. "' />
                <div class='large-6 columns'><p>Difficulty: </p></div><div class='large-6 columns'><p>".$diff."</p></div>
                <div class='large-6 columns'><p>Type: </p></div><div class='large-6 columns'><p>".$row['type']."</p></div>
                <div class='large-6 columns'><p>Force </p></div><div class='large-6 columns'><p>".$row['force']."</p></div>
                <input type='hidden' name='exerciseID' value='".$row['exerciseID']."'>
                <div class='large-6 columns'>" . $html . "</div><div class='large-6 columns'><button id='addToWorkout'>Add to workout</button></div>
                <div class='large-12 columns'></div></form>

            </div>"; */
        }
    }

    /**
     * @param mixed $difficulty
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;
    }

    /**
     * @return mixed
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * @param mixed $exerciseID
     */
    public function setExerciseID($exerciseID)
    {
        $this->exerciseID = $exerciseID;
    }

    /**
     * @return mixed
     */
    public function getExerciseID()
    {
        return $this->exerciseID;
    }

    /**
     * @param mixed $muscleGroup
     */
    public function setMuscleGroup($muscleGroup)
    {
        $this->muscleGroup = $muscleGroup;
    }

    /**
     * @return mixed
     */
    public function getMuscleGroup()
    {
        return $this->muscleGroup;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $pictureUrl
     */
    public function setPictureUrl($pictureUrl)
    {
        $this->pictureUrl = $pictureUrl;
    }

    /**
     * @return mixed
     */
    public function getPictureUrl()
    {
        return $this->pictureUrl;
    }


}
