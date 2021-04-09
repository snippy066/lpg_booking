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

    <title>LPG GAS</title>
    <style>
    html {
      scroll-behavior:smooth
    }
    .container-fluid {
        margin:0px;padding:0px;
    }
    body 
    {
      overflow-x:hidden;
    }
    </style>
  </head>
  <body>
  <div class="container-fluid">
<!-- navbar start  -->

<nav class="navbar navbar-expand-lg navbar-dark bg-danger py-4 sticky-top">
  <a class="navbar-brand" href="#">Indane GAS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#features">Features</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Others
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Career</a>
          <a class="dropdown-item" href="#">News</a>
          <a class="dropdown-item" href="#">Blog</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contact">Contact Us</a>
      </li>
    </ul>
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="registration.php">Registration</a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="login.php">LOGIN</a>
      </li>
      </ul>
  </div>
</nav>
<!-- navbar end -->
<div class="row mt-5" >
<div class="col-lg-12 col-md-12 col-sm-12 ">
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
</div>
<div class="row my-5" id="home">
<div class="col-lg-6 col-md-6 col-sm-12">
<h1 class='display-1 text-center'>Indane Gas</h1>
<h1 class='display-4 text-center'>Instance Gas Booking <br>& </br>Deliver To Door Step</h1>
<h1 class='lead text-center mt-4'>An Initiative By Government Of India on Ujjawla Yojna</h1>
<center><button class="btn btn-outline-dark mt-4">Get Start</button></center>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 p-2">
<!-- slider start -->
<div id="carouselExampleIndicators" class="carousel slide mt-2" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/GAS1.jpg" class="d-block w-100" alt="..." style="height:400px">
    </div>
    <div class="carousel-item">
      <img src="image/indane.jpg" class="d-block w-100" alt="..." style="height:400px">
    </div>
    <div class="carousel-item">
      <img src="image/service.jpg" class="d-block w-100" alt="..." style="height:400px">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- slider end -->
</div>
</div>
<div class="row mt-5" >
<div class="col-lg-12 col-md-12 col-sm-12 bg-dark text-white py-3 text-center">
Features / Services
</div>
</div>
<div class="row my-5" id="features">
<div class="col-lg-3 col-md-3 col-sm-6  text-center">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Instant Booking</h5>
    <h6 class="card-subtitle mb-2 text-muted">Online Booking Web Portal</h6>
    <p class="card-text">Customer Can Online Booked Their LPG anytime-anywhere</p>
    </div>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6  text-center">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Safe Payment</h5>
    <h6 class="card-subtitle mb-2 text-muted">Online Pay For LPG</h6>
    <p class="card-text">Customer Can safely Pay Online through Credit & Debit Card</p>
    </div>
</div>

</div>
<div class="col-lg-3 col-md-3 col-sm-6  text-center">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Quick Delivery</h5>
    <h6 class="card-subtitle mb-2 text-muted">Fast Service Boys To Deliver</h6>
    <p class="card-text">LPG Deliver To Your Doorstep As Soon As Possible</p>
    </div>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6  text-center">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">History</h5>
    <h6 class="card-subtitle mb-2 text-muted">View History & Transaction</h6>
    <p class="card-text">Customer Can Check Their Booking History </p>
    </div>
</div>
</div>
</div>
<div class="row mt-5" >
<div class="col-lg-12 col-md-12 col-sm-12 bg-dark text-white py-3 text-center">
Contact Us /Query/ Complain
</div>
</div>
<div class="row my-5" id="contact">
<div class="col-lg-4 col-md-4 col-sm-12 text-center">
<span class="lead">Address :</span> 12, Tedi pulia, lucknow
</div>
<div class="col-lg-4 col-md-4 col-sm-12 text-center">
<span class="lead">Call :</span>9876543210, 1800-23232344
</div>
<div class="col-lg-4 col-md-4 col-sm-12 text-center">
<span class="lead">Email :</span>indane_lpg@gmail.com
</div>
</div>
<form action="contact.php" method="post">
<div class="row p-2" >
<div class="col-lg-6 col-md-6 col-sm-12 my-1">
<input type="text" name="name" placeholder="Enter Your Name" class=form-control>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 my-1">
<input type="text" name="mob" placeholder="Enter Your Mobile" class=form-control>
</div>
</div>
<div class="row p-2">
<div class="col-lg-12 col-md-12 col-sm-12">
<input type="text" name="sub" placeholder="Enter Subject" class=form-control>
</div>
</div>
<div class="row p-2" >
<div class="col-lg-12 col-md-12 col-sm-12">
<textarea name="msg" placeholder="Enter Message" class=form-control></textarea>
</div>
</div>
<div class="row p-2" >
<div class="col-lg-12 col-md-12 col-sm-12 text-center">
<button class="btn btn-outline-primary" name="submit">SUBMIT</button>
</div>
</form>
</div>
<div class="row mt-5" >
<div class="col-lg-12 col-md-12 col-sm-12 bg-dark text-white py-3 text-center">
&copy; www.indanegas.nic.in .All Rights Reserved GOI 
</div>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="files/boot.js"></script> 
    <script src="files/boot1.js"></script>
    <script src="files/boot2.js"></script>
     </body>
</html>