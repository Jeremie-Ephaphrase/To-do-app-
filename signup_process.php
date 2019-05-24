<?php 
	//For signu
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	if($password == $cpassword){
		$password = $password ;
	}
	else{
		die("password not match!");
	}
?>
<?php
	require_once('php/db_connection.php');

	$query = "SELECT * FROM users WHERE username = '$username' LIMIT 1 ";
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("query failed in signupprocess.php line-23 ");
	}
	$uname_check = mysqli_num_rows($result);  //getting the number of rows in database table
	if($uname_check < 1){
		// to prevent from sql injection
		$username = stripcslashes($username);
		$password = stripcslashes($password);
	
		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);

		//adding to user table for registration
		$query = "INSERT INTO users (`username`, `password`)	
				VALUES ('$username', '$password')";
		$result = mysqli_query($connection, $query);
			if(!$result){
				die("query failed in signupprocess.php line-41 ");
			}
		echo "{$username} is created"; 
		echo "<a href='login.php'>Login</a>";
		
	}
	else{
		echo "user already exist";
		exit();
	}
?>