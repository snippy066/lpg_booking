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
<div class="col-lg-11 col-md-11 col-sm-11"><h1>Edit Customer</h1></div>
<div class="col-lg-1 col-md-1 col-sm-1"><a href="customer.php" class="btn btn-dark">BACK</a></div>
</div>
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-12"></div>
<div class="col-lg-4 col-md-4 col-sm-12">
<?php
session_start();
include "../dbcon.php";
$id=$_GET['id'];
$sql="select * from registration where id=$id";
$x=mysqli_query($con,$sql);
if($r=mysqli_fetch_assoc($x))
{
?>
<form action="updatecustomer.php" method="post" class="border border-primary p-4 mb-4 shadow">
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
<button type="submit" class="btn btn-primary" value="<?php echo $id ?>"name="submit">Save changes</button>
      </div>
</form>
<?php
}
?>

</div>
<div class="col-lg-4 col-md-4 col-sm-12"></div>
</div>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../files/boot.js"></script> 
    <script src="../files/boot1.js"></script>
    <script src="../files/boot2.js"></script>
     </body>
</html>

