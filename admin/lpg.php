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

    <title>LPG</title>
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
    <a class="nav-link active" href="lpg.php">LPG</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="customer.php">Customer</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="booking.php">Booking</a>
  </li>
</ul>
</div>
<div class="col-lg-8 col-md-8 col-sm-12">
<span class="h2">New Gas Connection Applications</span>
<!-- Button trigger modal updatestock -->
<button type="button" class="btn btn-primary ml-4 float-right" data-toggle="modal" data-target="#updatestock">
  Add Stock & Price
</button>
<table class="table table-bordered mt-3">
<tr><th>Application Id</th><th>Name</th><th>Email</th><th>Mobile</th><th>Type</th><th>Action</th></tr>
<?php
include("../dbcon.php");
$sql="select * from connection where status='not approved'";
$x=mysqli_query($con,$sql);
while($r=mysqli_fetch_assoc($x))
{
?>
<tr><td><?= $r['id']?></td><td><?= $r['name']?></td><td><?= $r['email']?></td>
<td><?= $r['mob']?></td><td><?= $r['gastype']?></td>
<td><a href="connectionview.php?id=<?= $r['id']?>" class="btn btn-info btn-sm">
View</a></td>
<td><a href="connectionstatus.php?id=<?= $r['id']?>&status=approved" class="btn btn-success btn-sm">
Approve</a></td>
<td><a href="connectionstatus.php?id=<?= $r['id']?>&status=rejected" class="btn btn-danger btn-sm">
Reject</a></td>
</tr>
<?php
}
?>
</table>
</div>
<div class="col-lg-1 col-md-1  col-sm-12">

<!-- Modal addstockprice-->
<div class="modal fade" id="updatestock">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add Stock & Price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
      <div class="form-group">
      <label for="">Gas Stock</label>
      <input type="text" name="stock" class="form-control">
      </div>
      <div class="form-group">
      <label for="">Vehicle Name</label>
<select name="vehiclename" id="" class="form-control">
<option value="truck">Truck</option>
<option value="tampo">Tampo</option>
<option value="pickup">PickUp</option>
</select>
      </div>
      <div class="form-group">
      <label for="">Vehicle No</label>
      <input type="text" name="vehicleno" class="form-control">
      </div>
      <div class="form-group">
      <label for="">Actual Price</label>
      <input type="text" name="price" class="form-control">
      </div>
      <div class="form-group">
      <label for="">Subsidy Amount</label>
      <input type="text" name="subsidy" class="form-control">
      </div>
      <div class="form-group text-center">
      <button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>
      </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!-- modal end -->

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

<?php
//Add price and stock
if(isset($_POST['submit']))
{
  extract($_POST);
$date=date('d-M-Y');
$sql="INSERT INTO `lpg`(`date`, `stock`, `vehiclename`, `vehicleno`, `price`, `subsidy`)
 VALUES ('$date','$stock','$vehiclename','$vehicleno','$price','$subsidy')";

 if(mysqli_query($con,$sql))
 {
  $_SESSION['success']="You Successfully Added Stock and Price."; 
  header("location:lpg.php"); 
 }
 else
 {
  $_SESSION['error']="Something went Wrong.."; 
  header("location:lpg.php"); 
 }
}
?>