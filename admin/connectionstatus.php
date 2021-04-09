<?php

include("../dbcon.php");
$id=$_GET['id'];
$status=$_GET['status'];
$sql="update connection set status='$status' where id=$id";
if(mysqli_query($con,$sql))
{
    $_SESSION['success']="Successfully Updated Connection Request"; 
    header("location:lpg.php"); 
}
else
{
    $_SESSION['error']="Something Went Wrong Problem in Updation"; 
    header("location:lpg.php"); 
}

?>