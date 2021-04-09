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
<div class="col-lg-11 col-md-11 col-sm-11"><h1>View Customer</h1></div>
<div class="col-lg-1 col-md-1 col-sm-1"><a href="customer.php" class="btn btn-dark">BACK</a></div>
</div>
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-12"></div>
<div class="col-lg-4 col-md-4 col-sm-12">
<?php
session_start();
include "../dbcon.php";
$id=$_GET['id'];
$sql="select * from registration where id=$id";
$x=mysqli_query($con,$sql);
if($r=mysqli_fetch_assoc($x))
{
?>
<table class="table table-bordered">
<tr><td colspan="2" class="text-center">
<img src="../upload/<?php echo $r['photo']?>" class="img-thumbnail" 
style="height:300px;width:250px" alt=""></td></tr>
<tr><th>Name</th><td><?= $r['name']?></td></tr>
<tr><th>Email</th><td><?= $r['email']?></td></tr>
<tr><th>Mobile</th><td><?= $r['mob']?></td></tr>
<tr><th>Aadhar</th><td><?= $r['adhar']?></td></tr>
<tr><th>Address</th><td><?= $r['adress']?></td></tr>
</table>
<?php
}
?>
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

