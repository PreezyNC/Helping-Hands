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
				require_once('inc/db_connect.php');
			
				$id = $_GET['id'];
			
				$sql = "SELECT * FROM tasks WHERE id = :id";
				$statement = $db->prepare($sql);
				$statement->bindValue(':id', $id);
				$success = $statement->execute();
				$result = $statement->fetch();
				$statement->closeCursor();
				
				if($result)
				{
					echo '<h1>'.$result['title'].'</h1>';
					echo '<b>Date:</b> '.date('m/j/Y - h:i A', strtotime($result['date']) ).'<br>';
					echo '<b>Location:</b> '.$result['location'].'<br>';
					echo '<b>People Needed:</b> '.$result['people_needed'].'<br>';
					echo '<b>Materials Needed:</b> '.$result['materials_needed'].'<br><br>';
					echo '<p>'.$result['description'].'</p>';
				}
				else
				{
					echo '<h1>Event Not Found</h1>';
				}
				
				//Get list of volunteers
				$sql = "SELECT users.username, user_task.task_id FROM users INNER JOIN user_task ON users.id=user_task.user_id WHERE user_task.task_id = :task_id ORDER BY users.username";
				$statement = $db->prepare($sql);
				$statement->bindValue(':task_id', $id);
				$success = $statement->execute();
				$results = $statement->fetchAll();
				
				echo '<h2>Current Volunteers</h2><ul class="stripes">';
				
				$is_enrolled = 0;
				
				if($results)
				{
					foreach ($results as $result)
					{
						echo '<li>'.$result['username'].'</li>';
						if(isset($_SESSION['id']))
						{
							if( strcmp($result['username'],$_SESSION['username']) == 0 )
							{
								$is_enrolled = 1;
							}
						}
					}
				}
				else
				{
					echo '<li>None</li>';
				}
				echo '</ul>';
				
				
				//If user is logged in
				if(isset($_SESSION['id']))
				{
					?>
					<form action="details_processor.php" method="post">
						<input type="hidden" name="task_id" value="<?php echo $_GET['id']; ?>">
						
						<?php
							if($is_enrolled)
							{
								echo '<input type="hidden" name="enrolled" value="1">
									  <input type="submit" value="Remove yourself from this project">';
							}
							else
							{
								echo '<input type="hidden" name="enrolled" value="0">
									  <input type="submit" value="Volunteer for this project">';	
							}
						?>
					</form>
					<?php
					
					if($_SESSION['is_admin'])
					{
						?>
						<br><br>
						<form action="details_admin_processor.php" method="post">
							<input type="hidden" name="task_id" value="<?php echo $_GET['id']; ?>">
							<input type="text" name="task_user" value="">
							<input type="submit" value="Add/Remove User">
						</form>
						<?php
					}
					
				}
			?>
		</main>
	</body>
</html>

