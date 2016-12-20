<?php
	$servername = "localhost";
	$username = "id291065_root";
	$password = "512d919e52";
	$dbname = "id291065_helping_hands";
	
	try
	{
		$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		
		//set the PDO error mode to exception
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>