<?php
session_start();
include("dbcon.php");
if(empty($_SESSION['name']) && empty($_SESSION['id']))
{
    $_SESSION['error']="Something Went Wrong Please Login First"; 
    header("location:login.php");    
}
$id=$_SESSION['id'];
$name=$_SESSION['name'];
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
    <title>Profile</title>
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
    <a class="nav-link active" href="profile.php">My Profile</a>
  </li>
  <?php
$sq="select * from connection where regid=$id and status='approved'";
$x=mysqli_query($con,$sq);
if(mysqli_num_rows($x)>0) {
?>
<li class="nav-item">
    <a class="nav-link" href="gas_booking">Gas Booking</a>
  </li>
  <?php }else{  ?>
  <li class="nav-item">
    <a class="nav-link" href="new_connection.php">New Connection</a>
  </li>
  <?php }  ?>
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
$id=$_SESSION['id'];
$sql="select * from registration where id=$id";
$x=mysqli_query($con,$sql);
if($r=mysqli_fetch_assoc($x))
{
?>
<div class="row">
<div class="col-lg-1 col-md-1 "></div>
<div class="col-lg-3 col-md-3 col-sm-12 p-4">
<img src="upload/<?php echo $r['photo']?>" alt="" class="img-thumbnail">
<form action="updatephoto.php" method="post" enctype="multipart/form-data">
<input type="file" name="photo" id="" class='form-control'>
<button type='submit' name='submit' class="btn btn-primary btn-sm btn-block">UPDATE</button>
</form>
</div>
<div class="col-lg-7 col-md-7 col-sm-12 p-4">
<table class="table table-bordered">
<tr><th>Name</th><td><?php echo $r['name']?></td></tr>
<tr><th>Email</th><td><?php echo $r['email']?></td></tr>
<tr><th>Mobile</th><td><?php echo $r['mob']?></td></tr>
<tr><th>Aadhar</th><td><?php echo $r['adhar']?></td></tr>
<tr><th>Address</th><td><?php echo $r['adress']?></td></tr>
<tr> <td colspan="2" class="text-right">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">
  Edit Profile
</button>
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#changepswd">
  Change Password
</button>
<button type="button" class="btn btn-info " data-toggle="modal" data-target="#feedback">
  Feedback From Admin
</button>
</td></tr>
</table>
<?php
}
?>
<?php
$sq="select * from connection where regid=$id";
$x=mysqli_query($con,$sq);
if($r=mysqli_fetch_assoc($x)) {
  $status=$r['status'];
?>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="h1">Connection Status</h1>
    <p class="lead">
    <?php
    if($status=="approved")
    {
      echo "<span class='text-success'>Your Application for New Gas Connection is Valid And Approved .. Congratulations!
       Now You May Procced For Booking</span>";
    }
    else if($status=="rejected")
    {
      echo "<span class='text-danger'>Your Application for New Connection is Invalid..So Rejected Please Recheck 
      Your Document And Then Apply</span>";
    }
    else
    {
      echo "<span class='text-warning'>Not Approved Yet.. Please Wait Until Your Application will Not Be Verify</span>";
    }
    ?>
    </p>
  </div>
</div>


  <?php }  ?>

</div>
<div class="col-lg-1 col-md-1 "></div>
</div>


<div class="modal fade" id="edit" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit">Update Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php $sql="select * from registration where id=$id";
$x=mysqli_query($con,$sql);
if($r=mysqli_fetch_assoc($x))
{
?>
<form action="updateprofile.php" method="post">
<div class="form-group">
<label for="name">Name</label>
<input type="text" name="name" id="name" value='<?php echo $r['name']?>' class="form-control">
</div>
<div class="form-group">
<label for="email">Email</label>
<input type="text" name="email" id="email" value='<?php echo $r['email']?>' class="form-control">
</div>
<div class="form-group">
<label for="mob">Mobile</label>
<input type="text" name="mob" id="mob" value='<?php echo $r['mob']?>' class="form-control">
</div>
<div class="form-group">
<label for="adhar">Aadhar</label>
<input type="text" name="adhar" id="adhar" value='<?php echo $r['adhar']?>' class="form-control">
</div>
<div class="form-group">
<label for="address">Address</label>
<textarea  name="address" id="address" class="form-control"><?php echo $r['adress']?>
</textarea>
</div>
<div class="form-group text-center">
<button type="submit" class="btn btn-primary" name="submit">Save changes</button>
      </div>
</form>
<?php
}
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
    </div>
  </div>
</div>
<!-- 
changepswd modal start -->
<div class="modal fade" id="changepswd" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <form action="changepswd.php" method="post">
<div class="form-group">
<label for="op">Old Password</label>
<input type="text" name="op" id="op" placeholder="Enter Old Password" class="form-control">
</div>
<div class="form-group">
<label for="np">New Password</label>
<input type="text" name="np" id="np" placeholder="Enter New Password" class="form-control">
</div>
<div class="form-group">
<label for="cp">Confirm Password</label>
<input type="text" name="cp" id="cp" placeholder="Enter Confirm Password" class="form-control">
</div>
<div class="form-group text-center">
<button type="submit" class="btn btn-primary" name="submit">Save changes</button>
      </div>
</form></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
    </div>
  </div>
</div>


<!-- feedback modal -->

<div class="modal fade" id="feedback" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit">Update Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered">
      <tr><th>Message</th><th>Reply From Admin</th></tr>
      <?php $sql="select * from contact where name='$name'";
$x=mysqli_query($con,$sql);
while($r=mysqli_fetch_assoc($x))
{
?>
<tr><td><?=$r['msg']?></td><td><?=$r['reply']?></td></tr>
<?php
}
?>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
    </div>
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