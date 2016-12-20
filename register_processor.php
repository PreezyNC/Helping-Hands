<?php
	require_once("inc/db_connect.php");
	
	if( strcmp($_POST['password1'], $_POST['password2']) == 0 )
	{
		$username = $_POST['username'];
		$password = sha1($_POST['password1']);
		
		$sql = "INSERT INTO users (admin, username, password) VALUES ('0', '$username', '$password')";
		$db->exec($sql);
		
		header('Location: login.php?new=1');
	}
	else
	{
		echo "Password confirmation did not match.";
	}
?>