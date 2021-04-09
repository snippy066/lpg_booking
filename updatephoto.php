<?php
include("dbcon.php");
session_start();
$id=$_SESSION['id'];
if(isset($_POST['submit']))
{
    $photo_tmp_name=$_FILES['photo']['tmp_name'];
    $photo_name=$_FILES['photo']['name'];
    move_uploaded_file($photo_tmp_name,"upload/".$photo_name);
    $sql="update registration set photo='$photo_name' where id=$id";
    if(mysqli_query($con,$sql))
    {
        $_SESSION['success']="Photo Updated Successfully"; 
        header("location:profile.php");  
    }
    else
    {
        $_SESSION['error']="Problem in Updation"; 
        header("location:profile.php");  
    }
}
?>