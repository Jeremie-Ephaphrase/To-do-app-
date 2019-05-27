<?php
//start session
session_start();

//including the database connection file
include_once('Crud.php');
 
$crud = new Crud();
 
if(isset($_POST['add'])) {    
    $task = $crud->escape_string($_POST['task']);
    $discription = $crud->escape_string($_POST['discription']);
    $date = $crud->escape_string($_POST['date']);
        
    //insert data to database
    $sql = "INSERT INTO members (task, discription, date) VALUES ('$task','$discription','$date')";

    if($crud->execute($sql)){
        $_SESSION['message'] = 'Member added successfully';
    }
    else{
        $_SESSION['message'] = 'Cannot add member';
    }
        
    header('location: index.php');
}
else{
    $_SESSION['message'] = 'Fill up add form first';
    header('location: index.php');
}
?>