<?php
session_start();
include("../dbcon.php");
$id=$_GET['id'];
$sql="update booking set status='delivered' where id=$id";
if(mysqli_query($con,$sql))
{
$_SESSION['success']="Delivered Status Updated Successfully";
header("location:booking.php");
}




?>