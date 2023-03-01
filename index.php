<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="login-box">
		<h2>Login</h2>
		<form action="login.php" method="POST">
			<label for="username">Username:</label>
			<input type="text" name="username" required>

			<label for="password">Password:</label>
			<input type="password" name="password" required>

			<button type="submit" name="login">Login</button>
		</form>
	</div>
</body>
</html>
