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

    <title>Login</title>
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
<div class="row mt-4">
<div class="col-lg-1 col-md-1 col-sm-1"><a href="registration.php" class="btn btn-outline-primary ml-4 my-3">Register</a>
</div>
<div class="col-lg-10 col-md-10 col-sm-10 mt-2">
<h1 class="text-center">Login Form</h1>
<?php
session_start();

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
</div><div class="row mt-4">
<div class="col-lg-1 col-md-1 col-sm-1"></div>
<div class="col-lg-5 col-md-5 col-sm-10">
<img src="image/GAS1.jpg" alt="" class="img img-fluid">
</div>
<div class="col-lg-5 col-md-5 col-sm-10">
<form action="login2.php" class="p-2 border border-danger shadow" method="post" >
<table class="table table-borderless">
<tr><th>Email</th><td>
<input type="text" name="email" id="email" required placeholder="Enter Email" class="form-control"
value="
<?php  if(isset($_COOKIE['email']))   {
    echo $_COOKIE['email'];
}      ?>
" ></td></tr>
<tr><td colspan="2" class="text-center">OR</td></tr>
<tr><th>Mobile</th><td>
<input type="text" name="mob" id="mob" placeholder="Enter Mob" class="form-control" 
value="
<?php  if(isset($_COOKIE['mob']))   {
    echo $_COOKIE['mob'];
}      ?>
" ></td></tr>
<tr><th>Password</th><td>
<input type="password" name="password" id="password" placeholder="Enter Password"
 class="form-control" 
value="
<?php  if(isset($_COOKIE['password']))   {
    echo $_COOKIE['password'];
}      ?>
" ></td></tr>
<tr><td class="text-right"><input type="checkbox" name='remember'></td><td>Remember Me</td></tr>
<tr><td colspan="2" class="text-center"><button type="submit" name="submit" class="btn btn-success btn-sm">LOGIN</button></td></tr>
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