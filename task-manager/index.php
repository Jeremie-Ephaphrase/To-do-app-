<?php
	//start session
	session_start();

	//crud with database connection
	include_once('Crud.php');

	$crud = new Crud();

	//fetch data
	$sql = "SELECT * FROM members";
	$result = $crud->read($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Task Manager</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
	<h1 class="page-header text-center">Task Manager</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<?php
				if(isset($_SESSION['message'])){
					?>
						<div class="alert alert-info text-center">
							<?php echo $_SESSION['message']; ?>
						</div>
					<?php

					unset($_SESSION['message']);
				}
			
			?>
			<a href="#add" data-toggle="modal" class="btn btn-primary">Add Task</a><br><br>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Tasks</th>
						<th>Discription</th>
						<th>Due Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($result as $key => $row) {
							?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['task']; ?></td>
								<td><?php echo $row['discription']; ?></td>
								<td><?php echo $row['date']; ?></td>
								<td><a href="#edit<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-success">Edit</a> | 
									<a href="#delete<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger">Delete</a>
								</td>
								<?php include('action_modal.php'); ?>
							</tr>
							<?php     
					    }
					?>
				</tbody>
			</table>

		</div>
		<a href= "../logout.php">Logout</a>
	</div>
</div>
<?php include('add_modal.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" rel="stylesheet"></script>
</body>
</html>
<style>

body{
	background: url(img/todo.jpg);
	background-size: cover;
}

h1 {
    display: block;
    font-size: 2em;
    margin-block-start: 0.67em;
    margin-block-end: 0.67em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
		color : white;
}

table {
    background-color: white;
}

a {
    color: #337ab7;
    text-decoration: none;
    border-style: solid;
    border-color: white;
    background: white;
    padding: 5px 4px;
    border-radius: 11px;
		text-decoration: none;
}

a :hover{
	color: white;
    text-decoration: none;
    border-style: solid;
    border-color: white;
    background: #337ab7;
    padding: 5px 4px;
    border-radius: 11px;
		text-decoration: none;
}
</style>