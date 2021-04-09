<?php
include("dbcon.php");
session_start();
if(isset($_POST['submit']))
{
    extract($_POST);
    $sql="INSERT INTO `contact`(`name`, `mob`, `sub`, `msg`)
     VALUES ('$name','$mob','$sub','$msg')";
if(mysqli_query($con,$sql))
{
    $_SESSION['success']="Message Sent Successfully.."; 
    header("location:index.php"); 
}
else
{
    $_SESSION['error']="Something Went Wrong.."; 
    header("location:index.php");
}
}

?>