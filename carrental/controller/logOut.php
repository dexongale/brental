<?php

session_start() ;

if (isset($_POST["do_logout"])) {
	unset($_SESSION["email"]) ;
	echo "success";
}

?>