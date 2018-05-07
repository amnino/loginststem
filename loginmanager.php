<?php
//purifies the input you get
	function trimmer($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
		}
	$uid=trimmer($_POST['uid']);
	$pwd=trimmer($_POST['pwd']);
	if(empty($uid) or empty($pwd)){
		die("INVALID INPUT");
		}
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="loginsystem";
	//connecting to the database...
	$conn = new mysqli($servername,$username,$password,$dbname);
	if(!$conn){
		die('SERVER FAULT');
		}
	$queryy=mysqli_query($conn,"SELECT * FROM users WHERE uid='$uid'");
	$count=mysqli_num_rows($queryy);
	$result=mysqli_fetch_assoc($queryy);
	//check id the username and password has been found...
	if($count == 0){
		header("location:login.php");
		echo "unknown username";
		die();}
	else{
		if(password_verify($pwd,$result['pw'])){
		//here is the start of a session.....
		session_start();
		$_SESSION['using']=$uid;
				header("location:administration.php");
		}
		else{
		//direct back to the login area.
		echo "Unsucessful attempt.";
		}}
mysql_close($conn);
?>
