<?php
include("../dbcon.php");
session_start();

if(isset($_POST['submit']))
{
    extract($_POST);

$sql="UPDATE `contact` SET `reply`='$reply',`status`='1' WHERE id=$submit";
    if(mysqli_query($con,$sql))
    {
        $_SESSION['success']="Reply Sent Successfully"; 
        header("location:message.php");  
    }
    else
    {
        $_SESSION['error']="Problem in sending Reply"; 
        header("location:message.php");  
    }
}
?>
