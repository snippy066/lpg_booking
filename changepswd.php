<?php
include("dbcon.php");
session_start();
$id=$_SESSION['id'];
if(isset($_POST['submit']))
{
    extract($_POST);
    $sql="select * from registration where id=$id";
    $x=mysqli_query($con,$sql);
    if($r=mysqli_fetch_assoc($x))
    {
        $dbpswd=$r['password'];
        if(password_verify($op,$dbpswd))
        {
         if($np==$cp)
         {
             $pswd=password_hash($np,PASSWORD_BCRYPT);
        $sq="update registration set password='$pswd' where id=$id"; 
        if(mysqli_query($con,$sq))
        {
            $_SESSION['success']="Password Successfully Changed";
            header("location:profile.php");
        }
        else
        {
            $_SESSION['error']="Something Went Wrong";
            header("location:profile.php");
        }
         }
         else
         {
            $_SESSION['error']="New & Confirm Password Does Not Match";
            header("location:profile.php");  
         }

        }
        else
        {
            $_SESSION['error']="Old Password Does Not Match";
            header("location:profile.php");
        }
    }
}

?>