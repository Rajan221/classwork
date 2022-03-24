<?php
if(!isset($_POST['title'])){
    die("can not edit the recored");
}
else{
    $title =$_POST['title'];
    $description =$_POST['description'];
    $date =$_POST['date'];
    $status =$_POST['status'];
    $id=$_POST['id'];

    include('connect.php');
    $query ="UPDATE goal SET goalTitle='$title',goalAccomplishDate='$date',description='$description',status='$status' WHERE id='$id'";
    
    if(mysqli_query($conn,$query)){
        header('location:../goal.php?msg=successfully updated');
    }else{
        
        header('location:../goal.php?msg=' .mysqli_error($conn));
    }
}



?>