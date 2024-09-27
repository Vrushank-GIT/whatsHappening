<?php

// Function for making connection with database
function db_connect() {
	require_once 'serverLogin.php';
	
	$conn = new mysqli($db_hostname,$db_username,$db_password,$db_database);

	if ($conn->connect_error) { //using OO approach
	die("Connection failed!" . mysqli_connect_error());
	}

	return $conn;
}
?>