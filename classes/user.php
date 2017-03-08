<?php
/**
 * Created by PhpStorm.
 * User: Gwilliam
 * Date: 05/03/14
 * Time: 13:39
 */

class user {
    private $userID;
    private $email;
    private $username;
    private $password;
    private $title;
    private $firstname;
    private $surname;
    private $address1;
    private $street;
    private $city;
    private $county;
    private $postcode;
    private $dob;


    private $weight;
    private $height;
    private $goal;



    function __construct(){

    }

    public function fillUser (){
        $this->userID = mysql_real_escape_string($this->$userID);
        $this->email = mysql_real_escape_string($this->$email);
        $this->username = mysql_real_escape_string($this->$username);
        $this->password = mysql_real_escape_string($this->password);
        $this->firstname = mysql_real_escape_string($this->firstname);
        $this->surname = mysql_real_escape_string($this->surname);
        $this->address1 = mysql_real_escape_string($this->address1);
        $this->street = mysql_real_escape_string($this->street);
        $this->city = mysql_real_escape_string($this->city);
        $this->county = mysql_real_escape_string($this->$county);
        $this->postcode = mysql_real_escape_string($this->postcode);
        $this->dob = mysql_real_escape_string($this->dob);
        $this->weight = mysql_real_escape_string($this->$weight);
        $this->height = mysql_real_escape_string($this->$height);
        $this->goal = mysql_real_escape_string($this->$goal);

    }

    public function login($email, $password, $mysqli) {
        $user_id="";
        $username="";
        $db_password="";
        $salt="";
        if ($stmt = $mysqli->prepare("SELECT id, username, password, salt FROM members WHERE email = ? LIMIT 1")) {
            $stmt->bind_param('s', $email);  // Bind "$email" to parameter.
            $stmt->execute();    // Execute the prepared query.
            $stmt->store_result();

            // get variables from result.
            $stmt->bind_result($user_id, $username, $db_password, $salt);
            $stmt->fetch();

            // hash the password with the unique salt.
            $password = hash('sha512', $password . $salt);
            if ($stmt->num_rows == 1) {
                // If the user exists check if the account is locked
                // from too many login attempts

                if (checkbrute($user_id, $mysqli) == true) {
                    // Account is locked
                    return false;
                } else {
                    // Check if the password in the database matches
                    // the password the user submitted.
                    if ($db_password == $password) {
                        // Password is correct!
                        //User login success
                        // Get the user-agent string of the user.
                        $user_browser = $_SERVER['HTTP_USER_AGENT'];
                        // XSS protection as we might print this value
                        $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                        $_SESSION['user_id'] = $user_id;
                        // XSS protection as we might print this value
                        $username = preg_replace("/[^a-zA-Z0-9_\-]+/",
                            "",
                            $username);
                        $_SESSION['username'] = $username;
                        $_SESSION['login_string'] = hash('sha512',
                            $password . $user_browser);
                        // Login successful.
                        return true;
                    } else {
                        // Password is not correct
                        // Record attempt in the database
                        $now = time();
                        $mysqli->query("INSERT INTO login_attempts(user_id, time) VALUES ('$user_id', '$now')");
                        return false;
                    }
                }
            } else {
                // No user exists.
                return false;
            }
        }
    }

    public function login_check($mysqli) {
        $password="";
        // Check if all session variables are set
        if (isset($_SESSION['user_id'],
        $_SESSION['username'],
        $_SESSION['login_string'])) {

            $user_id = $_SESSION['user_id'];
            $login_string = $_SESSION['login_string'];
            $username = $_SESSION['username'];

            // Get the user-agent string of the user.
            $user_browser = $_SERVER['HTTP_USER_AGENT'];

            if ($stmt = $mysqli->prepare("SELECT password FROM members WHERE id = ? LIMIT 1")) {
                // Bind "$user_id" to parameter.
                $stmt->bind_param('i', $user_id);
                $stmt->execute();   // Execute the prepared query.
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    // If the user exists get variables from result.
                    $stmt->bind_result($password);
                    $stmt->fetch();
                    $login_check = hash('sha512', $password . $user_browser);

                    if ($login_check == $login_string) {
                        // Logged In!!!!
                        return true;
                    } else {
                        // Not logged in
                        return false;
                    }
                } else {
                    // Not logged in
                    return false;
                }
            } else {
                // Not logged in
                return false;
            }
        } else {
            // Not logged in
            return false;
        }
    }

    public function isUserProfileComplete($username, $mysqli){
        //function to check whether user table details are filled in.

        $sql="SELECT * FROM user WHERE username = '$username'";
        $rs=$mysqli->query($sql);
        while($row = $rs->fetch_assoc()){
            if($row['title'] == NULL){
                return false;
            }
            if($row['firstname'] == NULL){
                return false;
            }
            if($row['surname'] == NULL){
                return false;
            }
            if($row['address1'] == NULL){
                return false;
            }
            if($row['street'] == NULL){
                return false;
            }
            if($row['city'] == NULL){
                return false;
            }
            if($row['county'] == NULL){
                return false;
            }
            if($row['postcode'] == NULL){
                return false;
            }
            if($row['dob'] == NULL){
                return false;
            }
            if($row['weight'] == NULL){
                return false;
            }
            if($row['height'] == NULL){
                return false;
            }
            if($row['goal'] == NULL){
                return false;
            }
            else {
                return true;
            }
        }
    }

    public function registerUser($email, $username, $password, $salt, $title, $firstname, $surname, $address1, $street, $city, $county, $postcode, $dob, $weight, $height, $goal, $mysqli) {
            $sql="INSERT INTO user (userID, email, username, password, salt, title, firstname, surname, address1, street, city, county, postcode, dob, weight, height, goal) VALUES (NULL, '$email', '$username', '$password', '$salt', '$title', '$firstname', '$surname', '$address1', '$street', '$city', '$county', '$postcode', '$dob', '$weight', '$height', '$goal')";
            $rs=$mysqli->query($sql);
            return true;
    }
    public function setUserDetails($username, $mysqli){
        $sql="SELECT * FROM user WHERE username = '$username'";
        $rs=$mysqli->query($sql);
        $test = "HELLO!";
        return $test;
    }

    public function fillUserDetails($username, $mysqli){
        $sql="SELECT * FROM user WHERE username = '$username'";
        $rs=$mysqli->query($sql);

        while($row = $rs->fetch_assoc()){
            $this->email = $row['email'];
            $this->weight = $row['weight'];
            $this->height = $row['height'];
            $this->title = $row['title'];
            $this->firstname = $row['firstname'];
            $this->surname = $row['surname'];
            $this->address1 = $row['address1'];
            $this->street = $row['street'];
            $this->city = $row['city'];
            $this->county = $row['county'];
            $this->postcode = $row['postcode'];
            $this->dob = $row['dob'];
            $this->goal = $row['goal'];
        }
    }

    public function updateUser($email, $username, $title, $firstname, $surname, $address1, $street, $city, $county, $postcode, $dob, $weight, $height, $goal, $mysqli){
        $sql="UPDATE user SET email='$email',username='$username',title='$title',firstname='$firstname',surname='$surname',address1='$address1',street='$street',city='$city',county='$county',postcode='$postcode',dob='$dob',weight='$weight',height='$height',goal='$goal' WHERE username='$username'";
        $rs=$mysqli->query($sql);
        return true;
    }

    public function updateUserPassword($username, $password, $salt, $mysqli){
        $sql="UPDATE members SET password='$password',salt='$salt' WHERE username='$username'";
        $rs=$mysqli->query($sql);
        $sql2="UPDATE user SET password='$password',salt='$salt' WHERE username='$username'";
    }

    /**
     * @param mixed $address1
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
    }

    /**
     * @return mixed
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $county
     */
    public function setCounty($county)
    {
        $this->county = $county;
    }

    /**
     * @return mixed
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $goal
     */
    public function setGoal($goal)
    {
        $this->goal = $goal;
    }

    /**
     * @return mixed
     */
    public function getGoal()
    {
        return $this->goal;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $postcode
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    /**
     * @return mixed
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
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
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
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
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $dob
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * @return mixed
     */
    public function getDob()
    {
        return $this->dob;
    }

} 