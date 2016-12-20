<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Volunteer tasks</title>
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
				if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'])
				{
					echo '<a href="task_creation.php">Add New Project</a><br><br>';
				}
			?>
			<h1>Current Volunteer Projects</h1>
			<ul class="stripes">
			<?php
				require_once('inc/db_connect.php'); //connects to database
				
				$sql = 'SELECT id,title FROM tasks ORDER BY title';
				$statement = $db->prepare($sql);
				$statement->execute();
				$tasks = $statement->fetchAll();
				$statement->closeCursor();
				foreach ($tasks as $task)
				{
					echo '<li><a href="details.php?id='.$task['id'].'">'.$task['title'].'</a></li>';
				}
			?>
			</ul>
		</main>
	</body>
</html>

