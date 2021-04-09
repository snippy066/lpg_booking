<?php

include("dbcon.php");
session_start();
if(isset($_POST['submit']))
{
  extract($_POST);
  $query="select * from registration where email='$email'";
  $x=mysqli_query($con,$query);  // used to execute query
  if(mysqli_num_rows($x)>0)  // used to count rows
  {
   $_SESSION['error']="Something Went Wrong : Email Already Exists"; 
   header("location:registration.php");  
  }
  else
  {
  $photo_tmp_name=$_FILES['photo']['tmp_name'];
  $photo_name=$_FILES['photo']['name'];
  $pswd=password_hash($password,PASSWORD_BCRYPT);
  move_uploaded_file($photo_tmp_name,"upload/".$photo_name);
  $sql="INSERT INTO `registration`(`name`, `email`, `mob`, `adhar`, `adress`, `photo`, `password`) 
  VALUES ('$name','$email','$mob','$adhar','$address','$photo_name','$pswd')";
   if(mysqli_query($con,$sql))
  {
     $_SESSION['success']="Registration Successfully.. Welcome $name let's Begin After Login"; 
     header("location:registration.php"); 
  }
  else
  {
    $_SESSION['error']="Something Went Wrong"; 
    header("location:registration.php");  
 }
}
}
?>