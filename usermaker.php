<html>
<?php
	session_start();
	if($_SESSION['using']==null){
			header("location:login.php");
		}
?>
<form action="usermaker.php" method="POST">
	<input type="text" name="uid" placeholder="username"><br>
	<input type="password" name="pw1" placeholder="password"><br>
	<input type="password" name="pw2" placeholder="confirm password"><br>
	<input type="submit" name="Create" value="Create">
<?php
	//function for input filter....

function trimmer($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
	}
	//input filter for safety....
	$us_name=trimmer($_POST['uid']);
	$pw1=trimmer($_POST['pw1']);
	$pw2=trimmer($_POST['pw2']);
	//checking if any of the input things is empty...
	if(empty($us_name) or empty($pw1) or empty($pw2)){
		echo "Empty field submission!";
		die();
		}
	//password verification....
	if($pw1!==$pw2){
		die('password verification failed');
		}
	//server connection requirements...
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="loginsystem";
	$conn= new mysqli($servername,$username,$password,$dbname);
	//test database connection...
	if(!$conn){
		die("Connection to database failed!");
		}
	//checking if the asked username already exists..
	//$sql="SELECT * FROM users WHERE us='$us_name'";
	$result=mysqli_query($conn,"SELECT * FROM users WHERE uid='$us_name'");
	if(!$result){
			echo "Username already exists!";
			die();}
	$pww=password_hash($pw1,PASSWORD_DEFAULT);
	//check for length of username and password...
	if(strlen($us_name)<4 or strlen($pww)<8){
		echo "Username is shorter than four characters or password is shorter than eight";
		die();
		}

	/* this does not run in php 7 versions... for older ones only
	$us_name=mysql_escape_string($us_name);
	$pww=mysql_escape_string($pww);*/
	mysqli_query($conn,"INSERT INTO users (uid,pw)
		VALUES ('$us_name','$pww')");
	if(mysqli_affected_rows($conn)>0){
		echo "Request Processed!";
		}
	else{
		echo "Request Unprocessed!";
		}
	mysql_close($conn);
?>
</form>
</html>
