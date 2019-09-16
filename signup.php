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
	$query = pg_send_query($connection, $sql);
	
	header("Location: index.php");
?>
