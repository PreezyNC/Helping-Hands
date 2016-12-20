<?php
	require_once('inc/db_connect.php');
	
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	
	$sql = "SELECT * FROM users WHERE username = :username AND password = :password";
	$statement = $db->prepare($sql);
	$statement->bindValue(':username', $username);
	$statement->bindValue(':password', $password);
	$success = $statement->execute();
	$results = $statement->fetch();
	$statement->closeCursor();
	
	if($results)
	{
		session_start();
		$_SESSION['id'] = $results['id'];
		$_SESSION['username'] = $results['username'];
		$_SESSION['is_admin'] = $results['admin'];
		
		header('Location: ./');
	}
	else
	{
		header('Location: login.php');
	}
?>