<?php
include("connect.php");
if(isset($_POST['title'])&&
isset($_POST['description'])&&
isset($_POST['status'])
){  
    session_start();
    $user_id= $_SESSION['user_id'];
    $title = $_POST['title'];
    $description= $_POST['description'];
    $status = $_POST['status'];
    $today = $_POST['date'];

    $query = "INSERT INTO goal(goalTitle, goalAccomplishDate, description, status, user_id) VALUES ('$title','$today','$description','$status','$user_id')";
    
    if (mysqli_query($conn, $query)) {
        $msg = "Goal have been set";
        header('Location:../add-goal.php?msg='.$msg);
    }
}
else{
    die("data cannot be accessed");
}

?>