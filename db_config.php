<?php 		

		// connection details 
		$host="localhost";
		$user="titanUser";
		$password="t1t4n";

		$link = mysql_connect($host, $user, $password);

		if(!$link) {
			 echo "Unable to connect ";
			}
		$result = mysql_select_db("titantrackr");
			if(!$result) {
			  echo "No database";
			}
?>