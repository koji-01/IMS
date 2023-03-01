<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<style>
		body {
			font-family: "Courier New";
			background-color: #f2f2f2;
		}
		
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		
		form {
			width: 500px;
			margin: 0 auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0,0,0,0.1);
		}
		
		label {
			display: block;
			margin-bottom: 5px;
			font-weight: bold;
		}
		
		input[type="text"],
		input[type="password"],
		input[type="email"] {
			width: 95%;
			padding: 10px;
			margin-bottom: 20px;
			border-radius: 5px;
			border: 1px solid #ccc;
			font-size: 16px;
		}
		
		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			font-family: "Courier New";
			font-size: 16px;
			cursor: pointer;
		}
		
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
		
		.error-message {
			color: red;
			margin-bottom: 10px;
			font-weight: bold;
		}

		a {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			font-family: "Courier New";
			font-size: 16px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<h1>Sign Up</h1>
	<form action="register.php" method="post">
		<label for="username">Username:</label>
		<input type="text" name="username" required>
		<label for="password">Password:</label>
		<input type="password" name="password" required>
		<label for="fullname">Full Name:</label>
		<input type="text" name="fullname" required>
		<label for="email">Email:</label>
		<input type="email" name="email" required>
		<input type="submit" value="Sign Up">
		<a href="index.php">Login</a>
		<?php if(isset($_GET['error'])) { ?>
			<p class="error-message"><?php echo $_GET['error']; ?></p>
		<?php } ?>
	</form>
</body>
</html>
