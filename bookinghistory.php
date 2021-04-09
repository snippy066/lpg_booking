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
    <title>Booking History</title>
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
    <a class="nav-link " href="new_connection.php">New Connection</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="bookinghistory.php">Booking History</a>
  </li>
</ul>

</div>
<div class="col-lg-1 col-md-1 col-sm-1">
<a href="logout.php" class="btn btn-outline-warning float-right mr-4 my-3">logout</a></div>
</div>
</div>

<div class="row">
<div class="col-lg-1 col-md-1 col-sm-12 "></div>
<div class="col-lg-10 col-md-10 col-sm-12 p-4">
<table class="table table-bordered">
<tr><th>Booking Id</th><th>Gas Type</th><th>Booking Date</th><th>Status</th></tr>
<?php
$sql="select * from booking where regid=$id";
$x=mysqli_query($con,$sql);
while($r=mysqli_fetch_assoc($x))
{
?>
<tr><td><?=$r['id']?></td><td><?=$r['gastype']?></td><td><?=$r['bookingdate']?></td>
<td><?=$r['status']?></td></tr>
<?php
}
?>
</table>

</div>
<div class="col-lg-1 col-md-1 col-sm-12 "></div>
</div>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="files/boot.js"></script> 
    <script src="files/boot1.js"></script>
    <script src="files/boot2.js"></script>
     </body>
</html>
