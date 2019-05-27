<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8" name "viewport" content = "width-device=width, initial-scale=1"/>
		<title>OOP PHP </title>
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
	</head>
<body>
	
	<br />
	<br />
	<br />
	<div class = "row">
		<div class = "col-md-4">
		</div>
		<div class = "col-md-4 well">
			<h4 class = "text-danger">Register</h4>
		
			<form method = "POST" action = "save_query.php">
				<div class="form-group">
					<input type = "text" placeholder = "Username"  name = "username" class = "form-control" required = "required"/>
				</div>
				<div class="form-group">
					<input type = "password" placeholder = "Password"  name = "password" class = "form-control" required = "required">
				</div>
				<div class="form-group">
					<input type = "text" placeholder = "Firstname"  name = "firstname" class = "form-control" required = "required"/>
				</div>
				<div class="form-group">
					<input type = "text" placeholder = "Lastname"  name = "lastname" class = "form-control" required = "required"/>
				</div>
				<button class = "btn btn-success puul-left" name = "signup"><span class = "glyphicon glyphicon-edit"></span> Sign up</button>
				<label class = "pull-right">Already have an account? <a href = "login.php"> Click here</a></label>
			</form>
		</div>
	</div>
</body>
</html>
<style>

body{
	background: url(../img/todo.jpg);
	background-size: cover;
}
</style>