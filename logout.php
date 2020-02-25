<?php
session_start();
	if($_SESSION["login"]=="true"){
		session_unset();
		session_destroy();
		header("location: login.php");
	}

?>