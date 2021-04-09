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

    <title>customer message</title>
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
<div class="col-lg-11 col-md-11 col-sm-11"><h1>Messages From Customer</h1>
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
<div class="col-lg-1 col-md-1 col-sm-1"><a href="dashboard.php" class="btn btn-dark">BACK</a></div>
</div>
<div class="row">
<div class="col-lg-1 col-md-1 col-sm-12"></div>
<div class="col-lg-10 col-md-10 col-sm-12">
<table class="table table-bordered">
<tr><th>Customer Name</th><th>Mobile</th><th>Subject</th><th>Message</th><th>Action</th></tr>

<?php
include "../dbcon.php";

$sql="select * from contact where status='0'";
$x=mysqli_query($con,$sql);
while($r=mysqli_fetch_assoc($x))
{
?>
<tr><td><?=$r['name']?></td><td><?=$r['mob']?></td><td><?=$r['sub']?></td>
<td><?=$r['msg']?></td>
<td>
<form action="reply.php" method="post">
<textarea name="reply" id=""  class="form-control"></textarea>
<button class="btn btn-primary" name="submit" value="<?=$r['id']?>">SUBMIT</button>
</form>
</td>

</tr>

<?php
}
?>

</div>
<div class="col-lg-1 col-md-1 col-sm-12"></div>
</div>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../files/boot.js"></script> 
    <script src="../files/boot1.js"></script>
    <script src="../files/boot2.js"></script>
     </body>
</html>

