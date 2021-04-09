<?php
session_start();
include "../dbcon.php";
$id=$_GET['id'];
$sql="delete from registration where id=$id";
if(mysqli_query($con,$sql))
{
    $_SESSION['success']="Successfully Deleted Customer Data"; 
    header("location:customer.php"); 
}
else
{
    $_SESSION['error']="Something Went Wrong Problem in deletion"; 
    header("location:customer.php"); 
}
?>