<?php
	session_start();
	$_SESSION['row']  = null;
	header('Location: ../login.php');
?>