<?php
	require_once('php/db_connection.php');
	session_start();
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
	}
	
	// to prevent from sql injection
	$username = stripcslashes($username);
	$password = stripcslashes($password);
	
	$username = mysqli_real_escape_string($connection, $username);
	$password = mysqli_real_escape_string($connection, $password);
	
	
	// performin query
	$query = "SELECT * FROM users WHERE `username` = '$username' AND `password` = '$password' ";
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("query failed in process.php line-49");
	}else{
		$row = mysqli_fetch_array($result);
		if(mysqli_num_rows($result) > 0){
			$_SESSION['row'] = $row;	
			$_SESSION['username'] = $username;	
			$id = urldecode($row['id']);
			header("Location: index.php?id={$id}");
		}else{
			die("Wrong password");
		}
	}
	mysqli_free_result($result)
?>