<?php
	session_start();
?>

<a href="index.php">Home</a>
<a href="about.php">About</a>
<a href="tasks.php">Volunteer</a>

<?php
	if(isset($_SESSION['id']))
	{
		?>
		<a href="logout.php">Logout</a>
		<?php
	}
	else
	{
		?>
		<a href="register.php">Register</a>
		<a href="login.php">Login</a>
		<?php
	}
?>