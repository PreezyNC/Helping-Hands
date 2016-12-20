<?php
	require_once('inc/db_connect.php');

	session_start();
	
	$enrolled = 0;
	if(isset($_SESSION['id']))
	{
		$user_id = $_SESSION['id'];
		$task_id = $_POST['task_id'];
		$enrolled = $_POST['enrolled'];
	}
	else
	{
		echo 'Error: No user logged in';
	}

	if($enrolled == 1)
	{
		try
		{
			// sql to delete a record
			$sql = "DELETE FROM user_task WHERE user_id= $user_id";

			// use exec() because no results are returned
			$db->exec($sql);
			header('Location: details.php?id='.$task_id);
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
		$db = null;
	} 
	else 
	{
		try 
		{
			$sql = "INSERT INTO user_task (user_id, task_id) VALUES ('$user_id', '$task_id')";
			$db->exec($sql);
			header('Location: details.php?id='.$task_id);
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
		$db = null;
	}
?>
