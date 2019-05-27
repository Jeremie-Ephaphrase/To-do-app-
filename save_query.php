<?php
	require_once "class.php";
	$conn = new db_class();
	if(ISSET($_POST['signup'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$conn->save($username, $password, $firstname, $lastname);
		echo '<script>alert("Successfully saved!")</script>';
		echo '<script>window.location= "index.php"</script>';
	}	
?>