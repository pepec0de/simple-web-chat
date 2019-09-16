<?php
	session_start();
	include("init.php");
	
	$username = $_SESSION['username'];
	$msg = $_POST['msg'];
	$current_time = exec('date +%R');	
	// Database query
	$sql = "INSERT INTO posts(username, msg, date) VALUES('$username','$msg', '$current_time');";
	$query = pg_query($dbconn, $sql);
	
	header("Location: home.php");
?>
