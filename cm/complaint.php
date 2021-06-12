<?php
 session_start();
 //if session is not set or logged in is not true
 if( !isset( $_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
 header("location:index.php");
 exit;
}
?>
<!-- program  -->
<?php require 'partials/_nav1.php'?>
 <h1>welcome  <?php echo $_SESSION['username'];?> </h1>
<?php include 'server.php';?>
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $complaintent_name=$_POST["complaintent_name"];
  $complaintent_address=$_POST["complaintent_address"];
  $complaintent_phone_no=$_POST["complaintent_phone_no"];
  $comp_no=$_POST["comp_no"];
  $comp_type=$_POST["comp_type"];
  $police_id= $_POST["police_id"];

  $comp_no_check_query = "SELECT * FROM `complaint` where comp_no = '$comp_no' LIMIT 1";
 $result1=mysqli_query($mysqli,$comp_no_check_query);
 $no =mysqli_fetch_assoc($result1);

 $comp_no_check_query2 = "SELECT * FROM `police` where police_id = '$police_id' LIMIT 1";
 $result3=mysqli_query($mysqli,$comp_no_check_query2);
 $no3 =mysqli_fetch_assoc($result3); 

 if(($no3) == 0 )
  {
  echo'<script>alert("please register police details into police id")</script>';
  ?>
  <script>
  window.location.href='form.php';
  </script>
  <?php  
  }

 if(($no) > 0){
   if(strcasecmp($no['comp_no'],$comp_no) == 0){
   echo'<script>alert("complaint number already exists")</script>';
   ?>
   <script>
   window.location.href='complaint.php';
   </script>
   <?php
   die();  
  }
}else{
$sql = "INSERT INTO `complaint` (`comp_id`, `complaintent_name`, `complaintent_phone_no`, `complaintent_address`, `comp_no`, `comp_type`, `police_id`) VALUES (NULL, '$complaintent_name', '$complaintent_phone_no', '$complaintent_address', '$comp_no', '$comp_type', '$police_id')";
$result=mysqli_query($mysqli,$sql);
 header("location:view_complaint.php");
}
}
 ?>
 
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- background link -->
     <link rel="stylesheet" href="style3.css">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<div class="container"  >
  <h1 class="text-center"  >COMPLAINT</h1>
</div>
<div class="container col-md-6">
 <form action="complaint.php" method="post">

    <div class="form-group">
    <label for="complaintent_name">complaintent name</label>
    <input type="text" class="form-control" id="complaintent_name" name="complaintent_name" placeholder="Enter complaintent name" required> 
  </div>
  <div class="form-group ">
    <label for="complaintent_address">enter complaintent address</label>
    <input type="text" class="form-control" id="complaintent_address" aria-describedby="complaintent_address" name="complaintent_address" placeholder="Enter complaintent address" required>
  </div>
 
  <div class="form-group">
    <label for="complaintent_phone_no"> enter complaintent  phone number</label>
    <input type="text"   maxlength="10" name="complaintent_phone_no" class="form-control" id="complaintent_phone_no" placeholder="complaintent_phone_no" required>
  </div>

  <div class="form-group">
    <label for="comp_no"> enter complaintent no in the document filled</label>
    <input type="int"   maxlength="4" name="comp_no" class="form-control" id="comp_no" placeholder="comp_no" required>
  </div>

  <div class="form-group">
    <label for="police_id"> enter police id</label>
    <input type="int"   maxlength="4" name="police_id" class="form-control" id="police_id" placeholder="police_id" required>
  </div>

<div class="form-group ">
    <label for="comp_type">enter complaint type</label>
    <input type="text" class="form-control" id="comp_type" aria-describedby="comp_type" name="comp_type" placeholder="civil/criminal" required>
  </div>


<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
  </body>
</html>