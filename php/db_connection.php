<?php	//For login
	//connect to database for user
	define("DB_SERVER", "localhost");
	define("DB_USER", "jeremie");
	define("DB_PASSWORD", "1234");
	define("DB_NAME", "crud");
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
	if(!$connection){
		die("connection error");
	}
?>