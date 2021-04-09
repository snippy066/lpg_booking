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

    <title>Invoice</title>
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
<h1 class="text-center">Invoice</h1>

</div>
<div class="col-lg-1 col-md-1 col-sm-1">
<a href="profile.php" class="btn btn-outline-warning float-right mr-4 my-3">Back</a></div>
</div>
</div><div class="row mt-4">
<div class="col-lg-1 col-md-1 col-sm-1"></div>
<div class="col-lg-10 col-md-10 col-sm-10">
<?php
session_start();
include("dbcon.php");
$bookingid=$_SESSION['bookingid'];
$sql="select booking.name,booking.mob,booking.address,booking.gastype,booking.bookingdate,
payment.cardtype,payment.amount,payment.status from booking inner join payment on 
booking.id=payment.bookingid where booking.id=$bookingid";
$x=mysqli_query($con,$sql);
if($r=mysqli_fetch_assoc($x))
{
?>
<table class="table table-bordered">
<tr><th rowspan="2" colspan="2"><h1>LPG GAS BOOKING</h1></th>
<th>Date</th><td><?= $r['bookingdate']?></td></tr>
<tr><th>Booking id</th><td><?= $bookingid?></td></tr>
<tr><th>Customer Name</th><td><?= $r['name']?></td><th>Mobile</th><td><?= $r['mob']?></td></tr>
<tr><th>Address</th><td><?= $r['address']?></td><th>Status</th><td><?= $r['status']?></td></tr>
<tr><th colspan="2">Gas Type</th><th>Price</th><th>Subsidy</th></tr>
<tr style="height:160px"><td colspan="2"><?= $r['gastype']?></td><td>&#8377;<?= $_SESSION['price']?></td><td>&#8377;<?=$_SESSION['subsidy']?></td></tr>
<tr><th colspan="2">Total Price</th><td colspan="2" align="center">&#8377;<?=$r['amount']?></td></tr>
</table>
<?php
}
?>
</div>
<div class="col-lg-1 col-md-1 col-sm-1"></div>
</div>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 text-right">
<button class="btn btn-warning" onclick="window.print()">Print</button></div>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="files/boot.js"></script> 
    <script src="files/boot1.js"></script>
    <script src="files/boot2.js"></script>
     </body>
</html>