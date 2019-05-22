<?php
//connecting to json file 

$file = file_get_contents("task.json");
$json_a = json_decode($file, true);
$closed=0;
$havetasks = 0;
?>
<!DOCTYPE html>
<html><head>
<title>Task / Todo list </title>
<meta charset="UTF-8">
<meta name="description" content="" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" media="all" />                          
</head><body><a id="top-of-page"></a><div id="wrap" class="clearfix">
<div class="col_9">

	<?php
	//form create here 
	echo "<h2>Tasks</h2>";
	echo "<form name=\"edit\" action=\"action.php\" method=\"GET\">";
	echo "<input name=\"content\" type=\"text\" placeholder=\"Add new task...\" ></input>";
	echo "<input type=\"hidden\" name=\"action\" value=\"add\"></input>";
	echo "&nbsp; &nbsp; ";
	echo "<input type=\"submit\" name=\"submit\" value=\"Add Task\"></input>";
	echo "</form>";

	echo "<ul>";
	if(is_array($json_a)) {		
		foreach ($json_a as $item => $task) {
			if ($task['status'] == "open") {	
				$havetasks=1;
				echo "<li>";
				echo $task['task'];
				echo " <a href=\"action.php?id=" .$item. "&action=done\"><span class=\"icon small darkgray\" data-icon=\"C\"></span></a>";
				echo " [ <a href=\"action.php?id=" .$item. "&action=edit\"><span class=\"icon small darkgray\" data-icon=\"7\"></span></a>";
				echo " <a href=\"action.php?id=" .$item. "&action=delete\"><span class=\"icon small darkgray\" data-icon=\"T\"></span></a> ] ";
				echo "</li>";
			}	
		}
		if($havetasks == 0) {
			echo"No tasks. Add one first please.";	
		}
	} else { 
		echo"No tasks. Add one first please.";	
	}
	echo "</ul>";
//all the finished task goes here 
	echo"<h2>Finished Tasks</h2>";
	echo "<ul>";
		if(is_array($json_a)) {	
		foreach ($json_a as $item => $task) {
			if ($task['status'] == "closed") {
			$closed=1;
			echo "<li>";
			echo $task['task'];
			echo " [ <a href=\"action.php?id=" .$item. "&action=delete\"><span class=\"icon small darkgray\" data-icon=\"T\"></span></a> ] ";		
			echo "</li>";
			}	
		}

		if ($closed == 0) {
			echo"No finished tasks yet. Please finish a task first.";
		}
	} else { 
		echo"No tasks. Add one first please.";	
	}		
	echo "</ul>";
	?>
</div>



</div>

</div>
</body></html>
