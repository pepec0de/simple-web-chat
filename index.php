<!DOCTYPE html>
<html>
	<head>
		<title>Chat</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	
	<body>
		<div id="main">
			<h2>Login</h2>
			<form action="login.php" method="post">
				<label><b>Username</b></label>
				<input type="text" name="username" placeholder="Username"><br><br>
				<label>Password</label>
				<input type="password" name="password" placeholder="Password"><br><br>
				<button stype="background-color: #ffffff; color: black;" type="submit"><b>Login</b></button>
			</form>
			
			<h2>Sign Up</h2>
			<form action="signup.php" method="post">
				<label><b>Username</b></label>
				<input type="text" name="username" placeholder="Username"><br><br>
				<label>Email Address</label>
				<input type="text" name="email" placeholder="Email Address"><br><br>
				<label>Password</label>
				<input type="password" name="password" placeholder="Password"><br><br>
				<button stype="background-color: #ffffff; color: black;" type="submit"><b>Sign Up</b></button>
			</form>
		</div>
	</body>
</html>
