<?php
	include("init.php");
	
	if(($_POST['username'] == "") && ($_POST['email'] == "") 
		&& ($_POST['password'] == "")) {
		header("Location: index.php");
		die();
	}

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password');";
	
	if(!pg_connection_busy($dbconn)) {
		$query = pg_query($connection, $sql);
	}

	header("Location: index.php");
?>
