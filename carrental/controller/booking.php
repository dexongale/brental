<?php

session_start(); 

if (isset($_POST["booked"])){

	require_once("database.php") ;

	$bike = $_POST["bike"] ;
	$pick = $_POST["pickup"] ;
	$drop = $_POST["dropoff"] ;
	$user = $_SESSION["ID"] ;

	$sql = "INSERT INTO booking (bike, pickup, dropoff, status, user_id)
			VALUES ('$bike', '$pick', '$drop','pending','$user')";

if ($conn->query($sql) === TRUE) {
    echo "success"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	}

?>