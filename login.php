<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		table{
			box-shadow: 0px 0px 20px #fff;

		}
		tr{
			height: 50px;
		}
		input{
			height: 20px;
			width: 200px;
			margin-right: 10px;
			border-radius: 5px;
			font-size: 15px;
			padding-left: 10px;
		}
		th,tr{
			padding: 20px;
			color: #000	;
		}
	</style>
</head>
<body>
		<?php include_once('php/header.php'); ?>
			<div style=" width: 500px; margin: 100px auto; padding: 20px;   border-radius: 20px;">
				<center>
					<form method="post" action="login_process.php">
					<table>
						<tr>
							<th>
								Username
							</th>
							<td>
								<input type="text" name="username" placeholder="Username">
							</td>
						</tr>
						<tr>
							<th>
								Password
							</th>
							<td>
								<input type="password" name="password" placeholder="Password">
							</td>
						</tr>
						<tr>
							<th>
							</th>
							<td>
								<input style="width: 100px; background: cadetblue; color: #fff; margin-bottom: 70px; height: 50px;" type="Submit" name="submit" value="Login">
								<br>
								<a href="signup.php">Create an account</a>
							</td>
								
						</tr>
									
						
					
					</table>
					</form>
				</center>
			</div>
</body>
</html>