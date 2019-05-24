<?php 
	session_start();
	if(!isset($_SESSION['row'])){
		header('Location: login.php');
	}
	else{
	$row = $_SESSION['row'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>TO_DO_List</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<style type="text/css">
		#body{
		}
		#work{
			display: none;
			z-index: 1;
			position: fixed;
			margin-left: 370px;
			width: 550px;
			height: auto;
			padding-bottom: 20px;
			background: black;
			color: #fff;
			transition: 0.5s;
		}
		#work p{
			float: right;
			margin-right: 20px;
			cursor: pointer;
		}
		#work form{
		}
		#work textarea{
			width: 400px;
			height: 200px;
		}
		#work input{
			width: 400px;
			height: 24px;
			border-radius: 5px;
			margin-top: 10px;
		}
	</style>
	<script type="text/javascript">
				function hide(id){
					document.getElementById(id).style.display="none";
				}
				function disp(date){
					document.getElementById('work').style.display="block";	
					document.getElementById('workDate').setAttribute('value', date);


				}
				function dispPendWork(day){
					document.getElementById('PendingWork').style.display="block";
				}
			</script>
</head>
<body>
		<?php include_once('php/header.php'); ?>
		<div id = "body">		<!-- body -->
			<div id="body-left">		<!-- body left part -->
				<div class="form">
					<form>
						<input type="text" placeholder="Search Tasks" name="search">
					</form>
				</div>
				<div class="task">
					<table>
						<tr>
							<p style="font-size: 25px; color: #444; display: inline;">Today</p>
							<p style="display: inline; font-size: 12px; color: gray">
								&nbsp <?php $datetime = new DateTime('today'); echo $datetime->format('D j M'); ?> 
							</p>
							<p onclick="disp(this.id)" id=" <?php echo $datetime->format('D j M'); ?> " style="cursor: pointer; color: #E83A57; font-weight: bold;">+ Add Task</p>		
						</tr>
						<hr>
						<tr>
							<p style="font-size: 25px; color: #444; display: inline;">Tomorrow</p>
							<p style="display: inline; font-size: 12px; color: gray">
								&nbsp <?php $datetime = new DateTime('tomorrow');   echo $datetime->format('D j M');?>
							</p>
							<p onclick="disp(this.id)" id=" <?php echo $datetime->format('D j M'); ?> " style="cursor: pointer; color: #E83A57; font-weight: bold;">+ Add Task</p>	
						</tr>
						<hr>
						<tr>
							<p style="font-size: 25px; color: #444; display: inline;"></p>
							<p style="display: inline; font-size: 12px; color: gray">
								&nbsp <?php $datetime = new DateTime('sunday');   echo $datetime->format('D j M');?>
							</p>
							<p onclick="disp(this.id)" id=" <?php echo $datetime->format('D j M'); ?> " style="cursor: pointer; color: #E83A57; font-weight: bold;">+ Add Task</p>
						</tr>
						<hr>
					</table>
					
				</div>
			</div>
			<div id = "body-right">		<!-- body right part -->
				<div>
					<ul style="list-style: none;">
						<li>
							<p onclick="dispPendWork(this.id)" id="today" style="display: inline; cursor: pointer;"><i  class="material-icons">view task</i>  Today</p>
						</li> 
						<br> <br>
						<li>
							<p onclick="dispPendWork(this.id)" id="sevenday" style="display: inline;  cursor: pointer; "><i  class="material-icons">view task</i>  Next 7 Days</p>
						</li> 
					</ul>
				</div>
			</div>
		</div>

		<!-- for popup box of create work -->
		<center>
			<div id="work">
				<p onclick="hide('work')" >&times</p>
				<br>
				<br>
				<form action="" method="post">
					<table>
						<br>

						<tr>
							<th>Work</th>
						</tr>
						<tr>
							<td><input type="text" name="work"></td>
						</tr>
						<tr>
							<th>Description</th>
						</tr>
						<tr>
							<td><textarea type="tex" name="description"></textarea></td>
						</tr>
						<tr>
							<td><input id="workDate" type="hidden" name="time"></td>
						</tr>
						<tr>
							<td><input style="height: 30px; width: 100px; color: #fff; background:cadetblue;" type="submit" name="submit" value="Create"></td>
						</tr>
					</table>
				</form>
			</div>
			</center>

			<?php //to add work to the database
				require_once('php/db_connection.php');
				if(isset($_POST['submit'])){
					$work = $_POST['work'];
					$description = $_POST['description'];
					$time = $_POST['time'];
				// to prevent from sql injection
				$work = stripcslashes($work);
				$description = stripcslashes($description);
				$time = stripcslashes($time);
				
				$work = mysqli_real_escape_string($connection, $work);
				$description = mysqli_real_escape_string($connection, $description);
				$time = mysqli_real_escape_string($connection, $time);
				$row = $_SESSION['row'];
				$uid = $row['id'];
				
				
				// performin query
				$query = "INSERT INTO work (`uid`, `work`, `description`, `time`)  VALUES('$uid', '$work', '$description', '$time')";
				$result = mysqli_query($connection, $query);
				if(!$result){
					die("query failed in process.php line-26");
				}else{
					echo "<script>";
					echo "setTimeout(function(){ alert('Work Added'); }, 1000);";
					echo "</script>";
				}
				//mysqli_free_result($result);
			}
			?>


		<!-- table for pending works -->
		<div id="PendingWork">
			<table style="overflow-y: scroll;">
				<tr>
					<p onclick="hide('PendingWork');" style="float: right;  margin-right: 30px; color: #fff; cursor: pointer; font-size: 40px;">&times</p>
			
				</tr>
				<tr>
					<th>N</th>
					<th>Work</th>
					<th>Description</th>
					<th>Due Time</th>
				</tr>
				<?php
					include_once('php/db_connection.php');
					$row = $_SESSION['row'];
					$uid = $row['id'];
					$query = "SELECT * FROM work WHERE `uid` = '$uid' ";
					$result = mysqli_query($connection, $query);
					$counter = 0;
						while($list = mysqli_fetch_assoc($result)){
							$counter++;
							echo "<tr>";
							echo " <td>".$counter."</td>";
							echo " <td>".$list['work']."</td>";
							echo " <td>".$list['description']."</td>";
							echo " <td>".$list['time']."</td>";
							echo " </tr>";
						}

				?>
			</table>
		</div>
</body>
</html>