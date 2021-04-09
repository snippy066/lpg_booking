<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="files/boot.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>LPG GAS</title>
    <style>
    .container-fluid {
        margin:0px;padding:0px;
    }

    body {
        overflow-x :hidden;
    }
    </style>
  </head>
  <body>
  <div class="container-fluid">
<!-- navbar start  -->
<div class="row">
<div class="col-lg-1 col-md-1 col-sm-1"><a href="login.php" class="btn btn-outline-primary ml-4 my-3">Login</a>
</div>
<div class="col-lg-10 col-md-10 col-sm-10 mt-2">
<h1 class="text-center">Registration Form</h1>
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
<div class="col-lg-1 col-md-1 col-sm-1">
<a href="index.php" class="btn btn-outline-warning float-right mr-4 my-3">Back</a></div>
</div>
</div><div class="row">
<div class="col-lg-1 col-md-1 col-sm-1"></div>
<div class="col-lg-5 col-md-5 col-sm-10">
<img src="image/GAS1.jpg" alt="" class="img img-fluid">
</div>
<div class="col-lg-5 col-md-5 col-sm-10">
<form action="registration2.php" class="p-2 border border-danger shadow" method="post" enctype="multipart/form-data"  >
<table class="table table-borderless">
<tr><th>Name</th><td><input type="text" name="name" id="name" placeholder="Enter Name" 
required pattern="[a-zA-Z\s]+" title="Only Characters Allowed in Name" class="form-control"></td></tr>
<tr><th>Email</th><td>
<input type="email" name="email" id="email" placeholder="Enter Email" class="form-control"
 pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Invalid Email " required></td></tr>
<tr><th>Mobile</th><td>
<input type="text" name="mob" id="mob" placeholder="Enter Mob" class="form-control" 
pattern="[6789][0-9]{9}" title="Enter Only 10 digit Number & Must Start with 6|7|8|9" required></td></tr>
<tr><th>Aadhar</th><td>
<input type="text" name="adhar" id="adhar" placeholder="Enter Aadhar" class="form-control"
 pattern="[0-9]{12}" title="Must be 12 digit " required></td></tr>
<tr><th>Address</th><td>
<textarea name="address" id="address" required placeholder="Enter Addresss" class="form-control"></textarea></td></tr>
<tr><th>Photo</th><td>
<input type="file" name="photo" id="photo" class="form-control" required></td></tr>
<tr><th>Password</th><td>
<input type="password" name="password" id="password" placeholder="Enter Password"
pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" 
required class="form-control"></td></tr>
<tr><td colspan="2" class="text-center"><button type="submit" name="submit" class="btn btn-success btn-sm">SUBMIT</button></td></tr>
</table>
</form>
</div>
<div class="col-lg-1 col-md-1 col-sm-1"></div>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="files/boot.js"></script> 
    <script src="files/boot1.js"></script>
    <script src="files/boot2.js"></script>
     </body>
</html>