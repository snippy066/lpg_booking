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

    <title>Bill & Payment</title>
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
<h1 class="text-center">Bill & Payment Form</h1>
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
<a href="profile.php" class="btn btn-outline-warning float-right mr-4 my-3">Back</a></div>
</div>
</div><div class="row mt-4">
<div class="col-lg-1 col-md-1 col-sm-1"></div>
<div class="col-lg-5 col-md-5 col-sm-10">
<?php
include("dbcon.php");
$date=date('d-M-Y');
$sql="select * from lpg where date='$date'";
$x=mysqli_query($con,$sql);
if($r=mysqli_fetch_assoc($x))
{
  $_SESSION['price']=$r['price'];
  $_SESSION['subsidy']=$r['subsidy'];
    $_SESSION['total']=$r['price']+$r['subsidy'];
$sq="select max(id) as maxid from booking";
$y=mysqli_query($con,$sq);
$result=mysqli_fetch_assoc($y);
$bookingid=$result['maxid'];
$_SESSION['bookingid']=$bookingid;

?>
<table class="table table-bordered">
<tr><th colspan="2"><h2>LPG Gas Booking</h2></td><th>Booking Id</th><td><?=$bookingid?></td></tr>
<tr><th>Customer Name</th><td><?= $_SESSION['name']?></td><th>Date</th><td><?=$date?></td></tr>
<tr><th>Customer Mobile</th><td><?= $_SESSION['mob']?></td><th>Address</th><td><?= $_SESSION['address']?></td></tr>
<tr><th>Price</th><td>&#8377; <?= $r['price']?></td><th>Subsidy</th><td>&#8377; <?= $r['subsidy']?></td></tr>
<tr><th>Total Price To Pay</th><td colspan="3" align="center"> &#8377;<?=$r['price']+$r['subsidy'] ?></td></tr>

</table>
<?php
}
?>
</div>
<div class="col-lg-5 col-md-5 col-sm-10">
<form action="" class="p-2 border border-danger shadow" method="post" >
<div class="form-group form-inline">
<label for="">Card Type</label>
<input type="radio" name="cardtype" value="credit" class="mx-4">Credit
<span class="mx-4">|</span>
<input type="radio" name="cardtype" value="debit" class="mx-4">debit
</div>
<div class="form-group">
<label for="">Card No</label>
<input type="text" name="cardno" class="form-control" placeholder="xxxx xxxx xxxx xxxx">
</div>
<div class="form-group">
<label for="">Name On Card </label>
<input type="text" name="nameoncard" class="form-control" placeholder="Ram Kumar">
</div>
<div class="form-group">
<label for="">Expiry </label>
<input type="month" name="expiry" class="form-control">
</div>
<div class="form-group form-inline">
<label for="">CVV </label>&nbsp;
<input type="password" name="cvv" class="form-control">
<span class="mx-3">|</span>
<label for="">Amount</label>&nbsp;
<input type="text" name="amount" class="form-control" readonly value="<?= $_SESSION['total']?>">
</div>
<div class="form-group text-center">
<button type="submit" name="submit" class="btn btn-outline-success btn-sm">SUBMIT</button>
</div>
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

<?php

if(isset($_POST['submit']))
{
  extract($_POST);
  $cvv_enc=password_hash($cvv,PASSWORD_BCRYPT);
  $query="INSERT INTO `payment`(`bookingid`, `cardtype`, `cardno`, `nameoncard`, `expiry`, `cvv`, `amount`, `status`)
   VALUES ('$bookingid','$cardtype','$cardno','$nameoncard','$expiry','$cvv_enc','$amount','paid')";
if(mysqli_query($con,$query))
{
  $_SESSION['success']="Payment Done Successfully .."; 
  header("location:bill.php"); 
}
else
{
  $_SESSION['error']="Something went Wrong.."; 
  header("location:payment.php"); 
}

}


?>