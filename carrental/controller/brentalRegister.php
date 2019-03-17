<?php

session_start(); 

if (isset($_POST["do_login"])){

	require_once("database.php") ;

	$email = $_POST["email"] ;
	$password = md5($_POST["password"]) ;
	$fname = $_POST["fname"] ;
	$lname = $_POST["lname"] ;
	$school = $_POST["school"] ;

	$sql = "INSERT INTO users (fname, lname, university, email, password, type)
			VALUES ('$fname', '$lname', '$school','$email','$password','user')";

if ($conn->query($sql) === TRUE) {
		$sql = "SELECT * FROM users WHERE email = '$email'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
   	 	// output data of each row
    		while($row = $result->fetch_assoc()) {
        			$_SESSION["ID"] = $row["id"] ;
        			echo "success";
        	}
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	}

?>