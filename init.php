<?php
	//session_start();

	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname = "slp";

	$con = mysqli_connect($host, $username, $password);

	// Check connection
	if (!$con) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	mysqli_select_db($con, $dbname);
?>