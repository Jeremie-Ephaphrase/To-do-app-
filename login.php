<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8" name "viewport" content = "width-device=width, initial-scale=1"/>
		<title>OOPlogin</title>
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
	</head>
<body>
	
	
	<div class = "row">
		<div class = "col-md-4">
		</div>
		<div class = "col-md-4 well">
			<h4 class = "text-danger">Login</h4>
		
			<form method = "POST" action = "login_query.php">
				<div class="form-group">
					<input type = "text" placeholder = "Username"  name = "username" class = "form-control" required = "required"/>
				</div>
				<div class="form-group">
					<input type = "password" placeholder = "Password"  name = "password" class = "form-control" required = "required">
				</div>
				<button class = "btn btn-primary pull-left" name = "login"><span class = "glyphicon glyphicon-log-in"></span> Login</button>
				<label class = "pull-right">Don't have an account yet? <a href = "index.php"> Click here</a></label>
			</form>
		</div>
	</div>
</body>
</html>