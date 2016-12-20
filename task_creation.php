<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Helping Hands - New Project</title>
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
			<?php
				//Must be logged in
				if(!$_SESSION['is_admin'])
				{
					echo "You do not have permission to view this page.";
					exit();
				}
			?>
			<h1>Create New Project</h1>
			<form action="task_creation_processor.php" method="post">
				<label for="title">Title</label>
				<input type="text" name="title" id="title">
				
				<label for="date">Date</label>
				<input type="date" name="date" id="date">
				
				<label for="time">Time</label>
				<input type="time" name="time" id="time">
				
				<label for="location">Location</label>
				<input type="text" name="location" id="location">
				
				<label for="people">People Needed</label>
				<input type="number" name="people" id="people" value="1">
				
				<label for="materials">Materials Needed</label>
				<input type="text" name="materials" id="materials">
				
				<label for="description">Description</label>
				<textarea name="description" id="description"></textarea>
				
				<input type="submit" value="Create" id="submit">
			</form>
		</main>
	</body>
</html>