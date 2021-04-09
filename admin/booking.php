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

    <title>booking</title>
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
    <a class="nav-link" href="customer.php">Customer</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="booking.php">Booking</a>
  </li>
</ul>
</div>
<div class="col-lg-8 col-md-8  col-sm-12">
<?php
$date=date('d-M-Y');
echo "Booking Date : ".$date;
?>
<table class="table table-bordered">
<tr><th>Booking Id</th><th>Customer Id</th><th>Name</th><th>Mobile</th><th>Gas Type</th><th>Action</th></tr>
<?php
include("../dbcon.php");

$sql="select * from booking where bookingdate='$date' and status='not delivered'";
$x=mysqli_query($con,$sql);
while($r=mysqli_fetch_assoc($x))
{
?>
<tr><td><?=$r['id']?></td><td><?=$r['regid']?></td><td><?=$r['name']?></td>
<td><?=$r['mob']?></td><td><?=$r['gastype']?></td>
<td><a href="updatebooking.php?id=<?=$r['id']?>" class="btn btn-success btn-sm">UPDATE</a></td>

</tr>
<?php
}
?>
</table>



</div>
<div class="col-lg-1 col-md-1  col-sm-12"></div>
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