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

    <title>dashboard</title>
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
<div class="col-lg-8 col-md-8  col-sm-12"></div>
<div class="col-lg-1 col-md-1  col-sm-12">
<a href="message.php" class="btn btn-outline-info ">Messages</a>
   
<a href="../logout.php" class="btn btn-outline-warning float-right btn-sm mr-4 my-3">logout</a></div>
</div>
</div>

<div class="row">
<div class="col-lg-3 col-md-3  col-sm-12">
<ul class="nav flex-column nav-pills">
  <li class="nav-item">
    <a class="nav-link active" href="dashboard.php">Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="lpg.php">LPG</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="customer.php">Customer</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="booking.php">Booking</a>
  </li>
</ul>
</div>
<div class="col-lg-3 col-md-3  col-sm-12">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Gas Booking</h5>
    <h6 class="card-subtitle mb-2 text-muted">Total No. of Booking</h6>
    <p class="card-text">
    <?php
    $date=date('d-M-Y');
    include("../dbcon.php");
    $sql="select * from booking where bookingdate='$date'";
    $x=mysqli_query($con,$sql);
    $num=mysqli_num_rows($x);
    echo "<h1 class='display-4'>".$num."</h1>";
    ?>
</p>
    <a href="booking.php" class="card-link">Go To Booking</a>

  </div>
</div>
</div>
<div class="col-lg-3 col-md-3  col-sm-12">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">LPG Gas</h5>
    <h6 class="card-subtitle mb-2 text-muted">Total No. of LPG Gas</h6>
    <p class="card-text">
    <?php
    include("../dbcon.php");
    
    $sql="select * from lpg where date='$date'";
    $x=mysqli_query($con,$sql);
    $r=mysqli_fetch_assoc($x);
    echo "<h1 class='display-4'>".$r['stock']."</h1>";
    ?>
</p>
    <a href="lpg.php" class="card-link">Go To LPG</a>

  </div>
</div>
</div>
<div class="col-lg-3 col-md-3  col-sm-12">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Customer</h5>
    <h6 class="card-subtitle mb-2 text-muted">Total No. of Customers</h6>
    <p class="card-text">
    <?php
    include("../dbcon.php");
    $sql="select * from registration";
    $x=mysqli_query($con,$sql);
    $num=mysqli_num_rows($x);
    echo "<h1 class='display-4'>".$num."</h1>";
    ?>
</p>
    <a href="customer.php" class="card-link">Go To Customer</a>

  </div>
</div></div>
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