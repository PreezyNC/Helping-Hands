<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Helping Hands - Register</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="style.css" rel="stylesheet">
		<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>
	<body>
		<header>
			<img src="helpinghands.png" alt="Helping Hands">
		</header>
		<nav>
			<?php require_once 'inc/nav.php'; ?>
		</nav>
		<main>
			<h1>Register an Account</h1>
			<form action="register_processor.php" method="post">
				<label for="username">Username</label>
				<input type="text" name="username" id="username">
				
				<label for="password1">Password</label>
				<input type="password" name="password1" id="password1">
				
				<label for="password2">Confirm Password</label>
				<input type="password" name="password2" id="password2">
				
				<input type="submit" value="Register" id="submit">
			</form>
		</main>
	</body>
</html>

