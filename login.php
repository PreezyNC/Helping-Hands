<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Helping Hands - Login</title>
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
			<h1>Log In</h1>
			<?php
				if(isset($_GET['new']))
				{
					echo '<span style="color: green;">Registration Successful!  Please log in.</span>';
				}
			?>			
			<form action="login_processor.php" method="post">
				<label for="username">Username</label>
				<input type="text" name="username" id="username">
				
				<label for="password">Password</label>
				<input type="password" name="password" id="password">
				
				<input type="submit" value="Login" id="submit">
			</form>
		</main>
	</body>
</html>

