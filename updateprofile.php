<?php
include("dbcon.php");
session_start();
$id=$_SESSION['id'];
if(isset($_POST['submit']))
{
    extract($_POST);
    $sql="UPDATE `registration` SET `name`='$name',`email`='$email',`mob`='$mob',`adhar`='$adhar',`adress`='$address' WHERE id=$id";
    if(mysqli_query($con,$sql))
    {
        $_SESSION['success']="Profile Updated Successfully"; 
        header("location:profile.php");  
    }
    else
    {
        $_SESSION['error']="Problem in Updation"; 
        header("location:profile.php");  
    }
}
?>
