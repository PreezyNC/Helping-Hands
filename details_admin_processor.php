<?php
	require_once('inc/db_connect.php');

	session_start();
	
	if(isset($_SESSION['id']) && $_SESSION['is_admin'])
	{
		$username = $_POST['task_user'];
		
		$sql = "SELECT id FROM users WHERE username = :username";
		$statement = $db->prepare($sql);
		$statement->bindValue(':username', $username);
		$success = $statement->execute();
		$result = $statement->fetch();
		$statement->closeCursor();
		
		if($result['id'])
		{
			$user_id = $result['id'];
		}
		else
		{
			echo 'Error: User not found';
			exit();
		}
		
		$task_id = $_POST['task_id'];
	}
	else
	{
		echo 'Error: Admin access only';
		exit();
	}
	
	$sql = "SELECT id FROM user_task WHERE user_id = :user_id AND task_id = :task_id";
	$statement = $db->prepare($sql);
	$statement->bindValue(':user_id', $user_id);
	$statement->bindValue(':task_id', $task_id);
	$success = $statement->execute();
	$result = $statement->fetch();
	$statement->closeCursor();

	$enrolled = 0;
	if($result !== FALSE)
	{
		$enrolled = 1;
	}
	
	if($enrolled == 1)  //if already enrolled, remove them
	{
		try
		{
			$sql = "DELETE FROM user_task WHERE user_id = $user_id";
			$db->exec($sql);
			header('Location: details.php?id='.$task_id);
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
		$db = null;
	} 
	else //if not enrolled, add them
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
