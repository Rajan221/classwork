<?php
include('connect.php');

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE FROM goal WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        header('Location:../goal.php?msg=Successfully deleted');
        
    }
    else{
        header("Location:../goal.php?errmsg=".mysqli_error($conn));
    }
}


?>