<?php
	session_start();
	include("init.php");
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	// Database Query
	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password';";
	$query = pg_query($dbconn, $sql);
	$row = pg_fetch_assoc($query);
	if(!$row) {
		// Cannot find user in db
		header("Location: index.php");
	} else {
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		header("Location: home.php");
	}
	
?>
