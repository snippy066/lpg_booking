<?php
session_start();
include("dbcon.php");
if(empty($_SESSION['name']) && empty($_SESSION['id']))
{
    $_SESSION['error']="Something Went Wrong Please Login First"; 
    header("location:login.php");    
}
$id=$_SESSION['id'];
?>
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
    <title>New Connection</title>
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
<div class="col-lg-1 col-md-1 col-sm-1">
</div>
<div class="col-lg-10 col-md-10 col-sm-10 mt-2">

<h1>Welcome <?php echo strtoupper($_SESSION['name']) ?></h1>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="profile.php">My Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="new_connection.php">New Connection</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="bookinghistory.php">Booking History</a>
  </li>
</ul>
<?php
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
<a href="logout.php" class="btn btn-outline-warning float-right mr-4 my-3">logout</a></div>
</div>
</div>
<?php
$sql="select * from registration where id=$id";
$x=mysqli_query($con,$sql);
if($r=mysqli_fetch_assoc($x))
{
?>
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-12 p-4"></div>
<div class="col-lg-4 col-md-4 col-sm-12 p-4">
<form action="" method="post" enctype='multipart/form-data'>
<div class="form-group">
<label for="">Name</label>
<input type="text" name="name" value="<?= $r['name']?>" class="form-control" readonly>
</div>
<div class="form-group">
<label for="">Email</label>
<input type="email" name="email" value="<?= $r['email']?>" class="form-control" readonly>
</div>
<div class="form-group">
<label for="">Mobile</label>
<input type="text" name="mob" value="<?= $r['mob']?>" class="form-control" readonly>
</div>
<div class="form-group">
<label for="">Gas Type</label>
<select name="gastype" id="" class="form-control">
<option value="household">Household</option>
<option value="commercial">commercial</option>
</select>
</div>
<div class="form-group">
<label for="">Address Proof (Aadhar or Registration Proof)</label>
<input type="file" name='proof' class="form-control">
</div>
<div class="form-group text-center">
<button type="submit" class="btn btn-primary" name="id" value="<?= $r['id']?>">SUBMIT</button>
</div>
</form>
</div>
<div class="col-lg-4 col-md-4 col-sm-12 "></div>
</div>
<?php
}
?>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="files/boot.js"></script> 
    <script src="files/boot1.js"></script>
    <script src="files/boot2.js"></script>
     </body>
</html>
<?php
include("dbcon.php");
if(isset($_POST['id']))
{
extract($_POST);
$proof_tmp_name=$_FILES['proof']['tmp_name'];
$proof_name=$_FILES['proof']['name'];
move_uploaded_file($proof_tmp_name,"upload/".$proof_name);
$sql="INSERT INTO `connection`(`regid`, `name`, `email`, `mob`, `gastype`, `proof`) 
VALUES ($id,'$name','$email','$mob','$gastype','$proof_name')";
if(mysqli_query($con,$sql))
{
    $_SESSION['success']="Connection Application Successfully Sent.."; 
     header("location:new_connection.php"); 
}
else{
    $_SESSION['error']="Something went Wrong.."; 
    header("location:new_connection.php"); 
}
}
?>