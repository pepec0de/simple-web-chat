<?php
	session_start();
	if ($_SESSION['username'] == "" || $_SESSION['username'] == null) {
		header("Location: index.php");
		exit();
	}
	include("init.php");
	header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="js/jquery-3.4.1.js"></script>
	</head>
	
	<body>
		<div id="main">
			<h1><?php echo $_SESSION['username']?> - Online</h1>
			<div id="output"></div>
			<form action="send.php" method="post">
				<textarea class="form-control" name="msg" placeholder="Write something..."></textarea><br>
				<input type="submit" value="Send"/>
			</form>
			<br>
			<form action="logout.php" method="post">
			<input style="width: 100%; background-color: #000000; color: #ffffff; font-size: 20px;" type="submit" value="Logout"/>
			</form>
		</div>
		<script>
			var div = document.getElementById('output');
			(function() {
			var getData = function() {
				$.ajax({
					url: "init.php",	
					success: function(data) {
						div.innerHTML = data;
					}
				}); 
                	};
			window.setInterval(getData, 1000);
			getData();})();
		</script>
	</body>
</html>
