<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "productive";

		$con = new mysqli($servername,$username,$password,$databasename);
		if ($con->connect_error) 
		{
			die("Could not Connect the Database".$con->error);
		}
		/*else
		{
		echo "Connection Successfully";
		}*/
?>