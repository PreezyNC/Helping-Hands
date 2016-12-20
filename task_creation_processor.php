<?php
	require_once("inc/db_connect.php");
	
	$title = $_POST['title'];
	$description = $_POST['description'];
	
	$date = $_POST['date'];
	$time = $_POST['time'];
	$datetime = date('Y-m-d H:i:s', strtotime("$date $time"));
	
	$location = $_POST['location'];
	$people_needed = $_POST['people'];
	$materials_needed = $_POST['materials'];
	
	$sql = "INSERT INTO tasks (title, description, date, location, people_needed, materials_needed) 
			VALUES (:title, :description, :date, :location, :people_needed, :materials_needed)";
	$statement = $db->prepare($sql);
	$statement->bindValue(':title', $title);
	$statement->bindValue(':description', $description);
	$statement->bindValue(':date', $datetime);
	$statement->bindValue(':location', $location);
	$statement->bindValue(':people_needed', $people_needed);
	$statement->bindValue(':materials_needed', $materials_needed);
	
	$success = $statement->execute();
	$statement->closeCursor();
	
	header('Location: tasks.php');
?>