<html>
<?php
session_start();
	if($_SESSION['using']!=null){
			echo "I do know you".$_SESSION['using'];
		}
	else{
			header("location:login.php");
			echo "login to continue";
		}
?>
	<body>
	<br>
	<br>
	<br>
	<a href="logout.php">logout</a>
	<a href="usermaker.php">Create new user</a>
	</body>
</html>
