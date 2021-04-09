<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../files/boot.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">

    <title>customer</title>
    <style>
    .container-fluid {
        margin:0px;padding:0px;
    }

    body {
        overflow-x :hidden;
    }
    </style>
  </head>
  <body style="background-image:linear-gradient( cyan ,silver)">
  <div class="container-fluid">
<div class="row my-2">
<div class="col-lg-11 col-md-11 col-sm-11"><h1>Add Customer</h1>
<?php
session_start();
if(isset($_SESSION['success']))
{
  ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success Message</strong> <?php echo $_SESSION['success'] ?>
  <button type="button" class="close" data-dismiss="alert" ><span>&times;</span></button>
</div>
  <?php
  unset($_SESSION['success']);
}
?>
<?php
if(isset($_SESSION['error']))
{
  ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error Message</strong> <?php echo $_SESSION['error'] ?>
  <button type="button" class="close" data-dismiss="alert" ><span>&times;</span></button>
</div>
  <?php
  unset($_SESSION['error']);
}
?>
</div>
<div class="col-lg-1 col-md-1 col-sm-1"><a href="customer.php" class="btn btn-dark">BACK</a></div>
</div>
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-12"></div>
<div class="col-lg-4 col-md-4 col-sm-12">
<form action="" class="p-2 border border-danger shadow" method="post" enctype="multipart/form-data"  >
<table class="table table-borderless">
<tr><th>Name</th><td><input type="text" name="name" id="name" placeholder="Enter Name" class="form-control"></td></tr>
<tr><th>Email</th><td>
<input type="text" name="email" id="email" placeholder="Enter Email" class="form-control"></td></tr>
<tr><th>Mobile</th><td>
<input type="text" name="mob" id="mob" placeholder="Enter Mob" class="form-control"></td></tr>
<tr><th>Aadhar</th><td>
<input type="text" name="adhar" id="adhar" placeholder="Enter Aadhar" class="form-control"></td></tr>
<tr><th>Address</th><td>
<textarea name="address" id="address" placeholder="Enter Addresss" class="form-control"></textarea></td></tr>
<tr><th>Photo</th><td>
<input type="file" name="photo" id="photo" class="form-control"></td></tr>
<tr><td colspan="2" class="text-center"><button type="submit" name="submit" class="btn btn-success btn-sm">SUBMIT</button></td></tr>
</table>
</form>
</div>
<div class="col-lg-4 col-md-4 col-sm-12"></div>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../files/boot.js"></script> 
    <script src="../files/boot1.js"></script>
    <script src="../files/boot2.js"></script>
     </body>
</html>
<?php
include("../dbcon.php");
if(isset($_POST['submit']))
{
  extract($_POST);
  $query="select * from registration where email='$email'";
  $x=mysqli_query($con,$query);  
  if(mysqli_num_rows($x)>0)  
  {
   $_SESSION['error']="Something Went Wrong : Email Already Exists"; 
   header("location:addcustomer.php");  
  }
  else
  {
  $photo_tmp_name=$_FILES['photo']['tmp_name'];
  $photo_name=$_FILES['photo']['name'];
  $pswd=password_hash($mob,PASSWORD_BCRYPT);
  move_uploaded_file($photo_tmp_name,"../upload/".$photo_name);
  $sql="INSERT INTO `registration`(`name`, `email`, `mob`, `adhar`, `adress`, `photo`, `password`) 
  VALUES ('$name','$email','$mob','$adhar','$address','$photo_name','$pswd')";
   if(mysqli_query($con,$sql))
  {
     $_SESSION['success']="Customer Added Successfully.. "; 
     header("location:addcustomer.php"); 
  }
  else
  {
    $_SESSION['error']="Something Went Wrong"; 
    header("location:addcustomer.php");  
 }
}
}
?>