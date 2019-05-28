<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8" name "viewport" content = "width-device=width, initial-scale=1"/>
		<title>OOP PHP Registrarion and Login Form Using MySQLi</title>
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
	</head>
<body>
	<nav class = "navbar navbar-default">
		<div class = "container-fluid">
			<a class = "navbar-brand" href = "https://www.sourcecodester.com">Sourcecodester</a>
		</div>
	</nav>
	<div class = "row">
		<div class = "col-md-4">
		</div>
		<div class = "col-md-4 well">
			<h4 class = "text-danger">OOP PHP Registration and Login Form Using MySQLi</h4>
			<hr style = "border-top:1px dotted #000;"/>
			<form method = "POST">
				<div class="form-group">
					<input type = "text" placeholder = "Username"  name = "username" class = "form-control"/>
				</div>
				<div class="form-group">
					<input type = "password" placeholder = "Password"  name = "password" class = "form-control">
				</div>
				<div class="form-group">
					<input type = "text" placeholder = "Firstname"  name = "firstname" class = "form-control"/>
				</div>
				<div class="form-group">
					<input type = "text" placeholder = "Lastname"  name = "lastname" class = "form-control"/>
				</div>
				<button class = "btn btn-success pull-left" name = "signup"><span class = "glyphicon glyphicon-log-in"></span> Sign up</button>
				<label class = "pull-right">Already have an account? <a href = "login.php">Click here</a></label>
			</form>
			<?php
				$conn = new mysqli("localhost", "root", "", "oop") or die(mysqli_error());
				if(ISSET($_POST['signup'])){
					$username = $_POST['username'];
					$password = $_POST['password'];
					$firstname = $_POST['firstname'];
					$lastname = $_POST['lastname'];
					$stmt = $conn->prepare("INSERT INTO `user` (username, password, firstname, lastname) VALUES(?, ?, ?,?)");
					$stmt->bind_param("ssss", $username, $password, $firstname, $lastname);
					$stmt->execute();
					$stmt->close();
					$conn->close();
				}
			?>
		</div>
	</div>
</body>
</html>