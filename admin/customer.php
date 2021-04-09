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
  <body>
  <div class="container-fluid">
<div class="row">
<div class="col-lg-3 col-md-3  col-sm-12"><h1 class="text-center">Welcome Admin</h1></div>
<div class="col-lg-8 col-md-8  col-sm-12">
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
<div class="col-lg-1 col-md-1  col-sm-12">
<a href="../logout.php" class="btn btn-outline-warning float-right btn-sm mr-4 my-3">logout</a></div>
</div>
</div>

<div class="row">
<div class="col-lg-3 col-md-3  col-sm-12">
<ul class="nav flex-column nav-pills">
  <li class="nav-item">
    <a class="nav-link " href="dashboard.php">Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="lpg.php">LPG</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="customer.php">Customer</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="booking.php">Booking</a>
  </li>
</ul>
</div>
<div class="col-lg-9 col-md-9  col-sm-12">
<table class="table table-bordered">
<tr><th>Name</th><th>Email</th><th>Mobile</th><th>Aadhar</th><th>Address</th>
<th colspan='3'>Action <a href="addcustomer.php" class="btn btn-success btn-sm ml-4">Add New Customer</a> </th></tr>
<?php
include("../dbcon.php");
$sql="select * from registration";
$x=mysqli_query($con,$sql);
while($r=mysqli_fetch_assoc($x))
{
?>
<tr><td><?php echo $r['name']?></td><td><?php echo $r['email']?></td>
<td><?php echo $r['mob']?></td><td><?php echo $r['adhar']?></td>
<td><?php echo $r['adress']?></td>
<td><a href="viewcustomer.php?id=<?php echo $r['id']?>" class="btn btn-info btn-sm">View</a></td>
<td><a href="editcustomer.php?id=<?php echo $r['id']?>" class="btn btn-primary btn-sm">Edit</a></td>
<td><a href="deletecustomer.php?id=<?php echo $r['id']?>" class="btn btn-danger btn-sm">Delete</a></td></tr>
<?php
}
?>
</table>
</div>
</div>
</div>

  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../files/boot.js"></script> 
    <script src="../files/boot1.js"></script>
    <script src="../files/boot2.js"></script>
     </body>
</html>

