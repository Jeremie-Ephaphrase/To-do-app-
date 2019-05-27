<?php
//start session
session_start();

//including the database connection file
include_once('Crud.php');

//getting the id
$id = $_GET['id'];
 
$crud = new Crud();
 
if(isset($_POST['edit'])) {    
    $task = $crud->escape_string($_POST['task']);
    $discription = $crud->escape_string($_POST['discription']);
    $date = $crud->escape_string($_POST['date']);
        
    //update data
    $sql = "UPDATE members SET task = '$task', discription = '$discription', date = '$date' WHERE id = '$id'";

    if($crud->execute($sql)){
        $_SESSION['message'] = 'Task updated successfully';
    }
    else{
        $_SESSION['message'] = 'Cannot update task';
    }
        
    header('location: index.php');
}
else{
    $_SESSION['message'] = 'Select task to edit first';
    header('location: index.php');
}
?>