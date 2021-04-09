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
  <body style="background-image:linear-gradient( cyan ,silver)">
  <div class="container-fluid">
<div class="row my-2">
<div class="col-lg-11 col-md-11 col-sm-11"><h1>View Connection Application</h1></div>
<div class="col-lg-1 col-md-1 col-sm-1"><a href="lpg.php" class="btn btn-dark">BACK</a></div>
</div>
<div class="row">
<div class="col-lg-2 col-md-2 col-sm-12"></div>
<div class="col-lg-8 col-md-8 col-sm-12">
<?php
session_start();
include "../dbcon.php";
$id=$_GET['id'];
$sql="select * from connection where id=$id";
$x=mysqli_query($con,$sql);
if($r=mysqli_fetch_assoc($x))
{
?>
<table class="table table-bordered">
<tr><th>Id</th><td><?=$r['id']?></td><th>Name</th><td><?=$r['name']?></td></tr>
<tr><th>Email</th><td><?=$r['email']?></td><th>Mob</th><td><?=$r['mob']?></td></tr>
<tr><th>Gas Type</th><td><?=$r['gastype']?></td><th>Status</th><td><?=$r['status']?></td></tr>
<tr><td colspan="4"><embed src="../upload/<?=$r['proof']?>" type="" style="height:500px;width:100%"></td></tr>
</table>
<?php
}
?>

</div>
<div class="col-lg-2 col-md-2 col-sm-12"></div>
</div>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../files/boot.js"></script> 
    <script src="../files/boot1.js"></script>
    <script src="../files/boot2.js"></script>
     </body>
</html>

