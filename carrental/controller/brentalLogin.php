<?php
session_start(); 

if (isset($_POST["do_login"])){

	require_once("database.php") ;

	$email = $_POST["email"] ;
	$password = md5($_POST["password"]) ;

	$sql = "SELECT * FROM users WHERE email = '$email'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
   	 // output data of each row
    	while($row = $result->fetch_assoc()) {
        	if ($password == $row["password"]) {
        			$_SESSION["ID"] = $row["id"] ;
        			echo "success";
        	}
        	else{
        			echo "fail" ;
        	}

	}

	} 
	else {
        			echo "fail" ;
		}
	

	$conn->close();
	exit() ;

	}



?>
