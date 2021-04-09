<?php
include("../dbcon.php");
session_start();
if(isset($_POST['submit']))
{
    $email=$_POST['email'];

    $password=$_POST['password'];
    $sql="select * from admin where email='$email'";
    $x=mysqli_query($con,$sql);
    if($r=mysqli_fetch_assoc($x))
    {
     $dbpswd=$r['password'];
     
     if($password==$dbpswd)
     {
         if(isset($_POST['remember']))
         {
            setcookie('email',$email,time()+60*60*24);

            setcookie('password',$password,time()+60*60*24);
        
            $_SESSION['id']=$id;
            header("location:dashboard.php");
         }
         else
         {
            $_SESSION['name']=$name;
            $_SESSION['id']=$id;
            header("location:dashboard.php");
         }
          }
     else
     {
        $_SESSION['error']="Something Went Wrong Password Invalid"; 
        header("location:index.php"); 
     }
}
    else
    {
        $_SESSION['error']="Something Went Wrong  Email is Invalid"; 
        header("location:index.php"); 
    }
    }
?>



