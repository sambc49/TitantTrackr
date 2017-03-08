<?php
			class User {
				/*private $username;
				private $firstname;
				private $lastname;
				private $userpass;
				private $dob; 
				private $target;

				// Assigning the values
				public function __construct($username, $userpass, $firstname, $surname, $dob, $target) {
					$this->username = mysql_real_escape_string($username);
					$this->userpass = mysql_real_escape_string($userpass);
					$this->firstname = mysql_real_escape_string($firstname);
					$this->surname = mysql_real_escape_string($surname);
					$this->dob = mysql_real_escape_string($dob);
					$this->target = mysql_real_escape_string($target);
				}

				public function__construct(){

				}
				

				public function greet() {
					echo "Hello, my name is " . $this->firstname . " " . $this->lastname . ". Nice to meet you! :-)";
				} */

				public function loginUser($username, $password){
					if(!empty($_POST)){
						$login_query = "SELECT userID, username, password, salt FROM user WHERE username = '$username'";
						$result = mysql_query($query);
						$rows = mysql_num_rows($result);
						//if username exists	
						if($rows > 1){
							$userData = mysql_fetch_array($result, MYSQL_ASSOC);
							$password_hashed = hash('sha512', $password . $userData['salt']);
								if($password_hashed != $userData['password']) //incorrect password
								{
									return false;
								}
								else {
									//login successful, add username and hashed password to sessions
									$userID = $userData['userID'];
									$username = $userData['username'];
									$user_id  = preg_replace("/[^0-9]+/", "", $userID);
									$user_name = preg_replace("/[^0-9]+/", "", $username);
									$_SESSION['userID'] = $user_id;
									$_SESSION['username'] = $user_name;
									return true;

								}
						}

					}
					else {
						return false;
					}

				}

				public function testThing(){
					return true;
				}
				/*
				public function isUsernameAvailable($username) {
					$query = "SELECT * FROM user where username = '$username'";
					$result = mysql_query($query);
					$num = mysql_numrows($result);
									
					if($num==1){
						return false;
					}
					else {
						return true;
					}
				}

				public function registerUser(){
					//Method that Inserts user data to database 
					mysql_query("INSERT INTO user (userID, username, password, firstname, surname, dob, target) VALUES (NULL, '$this->username', '$this->userpass', 'hello' '$this->firstname', '$this->surname', '$this->dob', '$this->target')");
				}

				public function checkUser(){

				}

				public function updateUser(){
					//Method to update user data once account has been created
				}

				//get and set methods for User class

				public function setUsername($newUsername){
					$this->username = $newUsername;
				}
				public function getUsername(){
					return $this->username;
				}
				public function setFirstname($newFirstname){
					$this->firstname = $newFirstname;
				}
				public function getFirstname(){
					return $this->firstname;
				}				
				public function setSurname($newSurname){
					$this->surname = $newSurname;
				}
				public function getSurname(){
					return $this->surname;
				}
				public function setDob($newDob){
					$this->dob = $newDob;
				}
				public function getDob(){
					return $this->dob;
				}				
				public function setTarget($newTarget){
					$this->target = $newTarget;
				}
				public function getTarget(){
					return $this->target;
				} */
			}

			class Exercise {
				public $exerciseName;
				public $muscleGroup;
				public $difficulty;

				public function completeSet($exerciseName){
					//method that stores data of when a user completes a set of a certain exercise
				}

				public function putExerciseIntoWorkout($username, $exerciseName){
					//method that adds exercise to a users workout
				}

			}

			class Workout {
				public $workoutName;
				public $exerciseList;


				public function getExerciseList($username, $workoutName){
					//Method that returns an array of exercises that are included in the workout
				}

				public function checkWorkoutCompleted($exerciseList, $workoutName){
					//method to check whether all exercises in workout have been completed
				}
			}
			?>